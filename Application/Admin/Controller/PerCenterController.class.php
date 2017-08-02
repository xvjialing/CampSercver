<?php
namespace Admin\Controller;
use Think\Controller;
use User\Api\UserApi;

class PerCenterController extends AdminController {
	public function person(){
		$member = M('UcenterMember');
		$user = $member->find(UID);
		$this->assign('user',$user);
		$this->display();
		
		Cookie('__forward__',$_SERVER['REQUEST_URI']);
	}
	
	/* public function pedit(){
		if(IS_POST){
			$Member = M('UcenterMember');
/* 			$Api    =   new UserApi();
			$res    =   $Api->updateInfo(UID, $password, $data);
			if($res['status']){
				$this->success('修改密码成功！');
			}else{
				$this->error($res['info']);
			} */
			
			/*$data = $Member->create();
			if($data){
				if($Member->save()!== false){
					// S('DB_CONFIG_DATA',null);
					//记录行为
					action_log('update_menu', 'UcenterMember', $data['id'], UID);
					$this->success('更新成功', Cookie('__forward__'));
				} else {
					$this->error('更新失败');
				}
			} else {
				$this->error($Member->getError());
			}
		} else {
			/* 获取数据 */
			/*$member = M('UcenterMember');
		    $user = $member->find(UID);
			if(false === $user){
				$this->error('获取后台菜单信息错误');
			}
			$this->assign('user', $user);
			$this->meta_title = '修改个人信息';
			$this->display();
		}*/
	/*} */
	
	 public function bivouac(){
	 	$bivName       =   I('bivName');
		$map['status']  =   array('egt',0);
		    
		if(is_numeric($bivName)){     // 检测变量是否为数字或数字字符串 ,是则返回ture,否则返回false
			$map['bivouac|bivName']=   array(intval($bivName),array('like','%'.$bivName.'%'),'_multi'=>true);
		}else{
			$map['bivName']    =   array('like', '%'.(string)$bivName.'%');
		}
		
		$list   = $this->lists('Lbivouac', $map);
		$list =M('Lbivouac')->join('onethink_ucenter_member on onethink_ucenter_member.id=onethink_lbivouac.agentID ')->select();
		
		int_to_string($list,array('Status'=>array(1=>'审核通过',0=>'审核未通过',2=>'未审核')));              //数字转为字符串
		$clist=D('clist');
		$sql='SELECT count(*) FROM  onethink_ucenter_member,onethink_lagent,onethink_lbivouac,onethink_loder WHERE onethink_ucenter_member.id='.UID.' AND '.UID.'=onethink_lagent.agentID  AND onethink_lagent.agentID=onethink_lbivouac.agentID AND onethink_lbivouac.bivouacID=onethink_loder.bivouacID';
		
		//$map['onethink_auth_access.group_id']=3;
		$voList = $clist->query($sql);	
		foreach($voList as $key=>$val){
			$this->assign('count',$val['count(*)']);
		} 
		
		$this->assign('_list', $list);

		// 记录当前列表页的cookie
		Cookie('__forward__',$_SERVER['REQUEST_URI']);		
		$this->meta_title = '营地信息';
	 	$this->display();
	 }
    
	 public function camp(){
	 	$cName       =   I('campName');
	 	$map['Status']  =   array('egt',0);
	 	
	 	if(is_numeric($cName)){     // 检测变量是否为数字或数字字符串 ,是则返回ture,否则返回false
	 		$map['camp|cName']=   array(intval($cName),array('like','%'.$cName.'%'),'_multi'=>true);
	 	}else{
	 		$map['cName']    =   array('like', '%'.(string)$cName.'%');
	 	}
	 	
	 	$Lcamp = M('Lcamp'); // 实例化User对象
	 	$Page       = new \Think\Page($Lcamp->count(),10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
	 	/* 	$map['onethink_lcamp.campID']=1;
	 	 $map['status']=0; */
	 	$list = $Lcamp->join('onethink_lbivouac on onethink_lcamp.bivouacID=onethink_lbivouac.bivouacID')
	 	->join('onethink_ucenter_member on onethink_lcamp.agentID=onethink_ucenter_member.id')
	 	->limit($Page->firstRow.','.$Page->listRows)->select();
	 	
	 	$Page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
	 	$this->assign('_page',$Page->show());// 赋值分页输出
	 	
	 	int_to_string($list,array('Status'=>array(1=>'审核通过',0=>'审核未通过',2=>'未审核')));              //数字转为字符串
	 	$this->assign('_list', $list);

	 	$this->meta_title = '活动信息';
	 	$this->display();
	 }
	 
	 public function index(){ 	
	 	$this->display();
	 }
	 
	 public function cdetail($campID=0){
	 	$info=M('Lcamp')->field(true)->find($campID);
	 	if(false === $info){
	 		$this->error('获取营地信息错误');
	 	}
	 	$this->assign('info', $info);	 	
	 	$this->display();
	 }
	 public function bivdetail(){
	 	$bivouacid     =   I('get.bivouacID','');
		
		/*获取一条记录的详细数据*/
		$lbivouac = D('Lbivouac');
		$this->assign('bivouacID',$bivouacid);
		$this->display();
	 }
	 public function bivdelete(){
	 	
	 }
	 public function cdelete(){
	 	
	 }
	 public function changeStatus(){
	 	$lbivouac= M('Lbivouac');
	 	$map['bivouacID']= I('get.bivouacID');
	 	$map['Status'] = 1;
	 	$rst = $lbivouac->save($map);
	 	if($rst === false){
	 		$this->error("出错了");
	 	}else{
	 		$this->success("审核通过!",U('bivouac'));
	 	}
	 }
}