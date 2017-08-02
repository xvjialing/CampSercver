<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\AuthGroupModel;

class AgCampController extends AdminController{
	public function clist(){
		$bivName       =   I('bivName');
		//$map['status']  =   array('egt',0);
		$map['agentID']  =   array('eq',7);
		    
		if(is_numeric($bivName)){     // 检测变量是否为数字或数字字符串 ,是则返回ture,否则返回false
			$map['bivouac|bivName']=   array(intval($bivName),array('like','%'.$bivName.'%'),'_multi'=>true);
		}else{
			$map['bivName']    =   array('like', '%'.(string)$bivName.'%');
		}
		
		$list   = $this->lists('Lbivouac', $map);
		int_to_string($list,array('Status'=>array(1=>'是',0=>'否',2=>'正在审核中')));              //数字转为字符串
		$clist=D('clist');
		$sql='SELECT count(*) FROM  onethink_ucenter_member,onethink_lagent,onethink_lbivouac,onethink_loder WHERE onethink_ucenter_member.id='.UID.' AND '.UID.'=onethink_lagent.agentID  AND onethink_lagent.agentID=onethink_lbivouac.agentID AND onethink_lbivouac.bivouacID=onethink_loder.bivouacID';
		
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
    /* public function toogleSta($bivouacID,$value = 1){
    	$this->editRow('Lbivouac', array('Status'=>$value), array('bivouacID'=>$bivouacID));
    } */
	public function cadd(){
	if(IS_POST){
    		$biv = M('Lbivouac');
    		$data = $biv->create();
   
    		if($data){
    			$bivouacID = $biv->add();
    			
    			if($bivouacID){
    				// S('DB_CONFIG_DATA',null);
    				//记录行为
    				//action_log('update_agent', 'Agent', $agentID, UID);
    				$this->success('新增成功', U('clist'));
    			} else {
    				$this->error('新增失败');
    			}
    		} else {
    			$this->error($biv->getError());
    		}
    	} else {
    		//$this->assign('info',array('bivouacID'=>I('bivouacID')));
    		$info = array();
    		/* 获取数据 */
    		$info = M('Lbivouac')->field(true)->find($bivouacID);
    		// 记录当前列表页的cookie
    		Cookie('__forward__',$_SERVER['REQUEST_URI']);
    		
    		$this->meta_title = '新增菜单';
    		$this->display('cupdate');
    	}
	}
	public function cdelete($bivouacID){
		$biv=M('Lbivouac');
		$id = array_unique((array)I('bivouacID',0));
		
		if ( empty($id) ) {
			$this->error('请选择要操作的数据!');
		}
		
		$map = array('bivouacID' => array('in', $id) );

		if(M('Lbivouac')->where($map)->delete()){
			// S('DB_CONFIG_DATA',null);
			//记录行为
			//action_log('update_menu', 'Menu', $id, UID);
			$this->success('删除成功');
		} else {
			$this->error('删除失败！');
		}
	}
	
	public function cupdate($bivouacID = 0){
    if(IS_POST){
		$biv=M('Lbivouac');
	    $data=$biv->create();

	    if($data){
	    	$rst = $biv->save();
    			if($rst!== false){
    				// S('DB_CONFIG_DATA',null);
    				//记录行为
    				//action_log('update_agent', 'Lagent', $data['agentID'], UID);
    				$this->success('更新成功', Cookie('__forward__'));
    			} else {
    				$this->error('更新失败');
    			}
    		} else {
    			$this->error($biv->getError());
    		}
    	} else {
    			/* $info = array();
    		/* 获取数据 
    		$info = M('Lbivouac')->field(true)->find($bivouacID);
            
    		if(false === $info){
    			$this->error('获取后台菜单信息错误');
    		}
    		$this->assign('info', $info); */
    		/* $this->meta_title = '编辑营地信息';
	    $this->display(); */
	    
	    
	    //获取左边菜单
	   // $this->getMenu();
	    /* 
	    $id     =   I('get.bivouacID','');
	   
	    if(empty($id)){
	    	$this->error('参数不能为空！'); 
	    }
	    
	    /*获取一条记录的详细数据*/
	    /* $Document = D('Lbivouac');
	    $data = $Document->find($id); */
// 	    var_dump($data);
	   /*  if(!$data){
	    	$this->error($Document->getError());
	    } */
	    
	    /* if($data['pid']){
	    	// 获取上级文档
	    	$article        =   M('Document')->field('id,title,type')->find($data['pid']);
	    	$this->assign('article',$article);
	    } */
	    /* $this->assign('data', $data);
	    $this->assign('model_id', $data['model_id']);
	    
	    /* 获取要编辑的扩展模型模板 
	    $model      =   get_document_model($data['model_id']);
	    $this->assign('model',      $model);

	    //获取表单字段排序
	    $fields = get_model_attribute($model['id']);
	    $this->assign('fields',     $fields);
	    
	    //获取当前分类的文档类型
	    $this->assign('type_list', get_type_bycate($data['category_id']));
	    $this->meta_title   =   '编辑文档'; */
	
	    $info = array();
	    /* 获取数据 */
	    $info = M('Lbivouac')->field(true)->find($bivouacID);
	    
	    if(false === $info){
	    	$this->error('获取营地信息错误');
	    }
	    $this->assign('info', $info);
	    $this->meta_title = '编辑营地信息';
    	$this->display();
	   
      }
	}
}