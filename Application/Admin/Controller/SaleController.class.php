<?php
namespace Admin\Controller;
use Think\Controller;

class SaleController extends AdminController{
	public function index(){
		$this->display();
	}
	public function order(){
		$order=M('Lorder');
		$map['Status']  =   array('egt',0);

		$orderID=trim(I('orderID'));
		if($orderID)
			$map['orderID'] = array('like',"%{$orderID}%");

		$Page       = new \Think\Page($order->count(),10);

		$list = $order->join('onethink_lbivouac on onethink_lorder.bivouacID=onethink_lbivouac.bivouacID')
		->limit($Page->firstRow.','.$Page->listRows)->select();
	
		$Page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$this->assign('_page',$Page->show());// 赋值分页输出
		
		//int_to_string($list,array('Status'=>array(1=>'已处理',0=>'未处理',2=>'已退订')));              //数字转为字符串
		$this->assign('_list', $list);

		$this->meta_title = '订单信息';
		$this->display();
	}
	
	public function detail($orderID=0){	
		$lodetail=M('Lodetail'); 	
		$id=trim(I('ID'));
		if($id)
			$map['ID']=array('like','%{id}%');
		/* $Page       = new \Think\Page($lodetail->count(),10);
		
		$list = $lodetail->join('onethink_ucenter_member on onethink_lodetail.userID=onethink_ucenter_member.id')
		->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$Page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$this->assign('_page',$Page->show());// 赋值分页输出 */
	    /* 获取数据 */

    	$map['onethink_lodetail.orderID']=$orderID;
		$rst = $lodetail
		->join('onethink_ucenter_member on onethink_lodetail.userID=onethink_ucenter_member.id')
		->where($map)->select();
		int_to_string($rst,array('Status'=>array(1=>'已处理',0=>'未处理',2=>'已退款')));              //数字转为字符串
		$this->assign("_list",$rst);    

			$this->meta_title = '子订单信息'; 
			$this->display();
    	
	}
}