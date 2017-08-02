<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\AuthGroupModel;

class GameController extends AdminController{
	public function glist(){
		$cName       =   I('campName');
		$map['Status']  =   array('eq',0);
		//$map['agentID']=array('eq',7);
		
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
		->limit($Page->firstRow.','.$Page->listRows)->select();		
		
		$Page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$this->assign('_page',$Page->show());// 赋值分页输出

		int_to_string($list,array('Status'=>array(1=>'是',0=>'否',2=>'正在审核中')));              //数字转为字符串
		$this->assign('_list', $list);		

		$this->meta_title = '活动信息';
		$this->display();
		
	}
	
	public function detail(){
		$campID=I('get.campID',0);
		$map['onethink_lgame.campID']=$campID;

		$gname=trim(I('get.gameName'));
		if($gname)
			$map['onethink_lgame.gameName'] = array('like',"%{$gname}%");

		$lgame = M('Lgame');
		$page =new \Think\Page($lgame->count(),10);
		
		$list=$lgame
		->join('onethink_lcamp on onethink_lgame.campID=onethink_lcamp.campID')	
		->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		$page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$this->assign('_page',$page->show());
		
	    int_to_string($list,array('Status'=>array(1=>'是',0=>'否',2=>'正在审核中')));              //数字转为字符串 
		
		$this->assign('list',$list);

        $this->meta_title = '游戏列表列表';
        $this->display();
	
	}
	
	public function gupdate($campID=0){
		if(IS_POST){
		$camp=M('Lcamp');
	    $data=$camp->create();

	    if($data){
	    	$rst = $camp->save();
    			if($rst!== false){
    				// S('DB_CONFIG_DATA',null);
    				//记录行为
    				//action_log('update_agent', 'Lagent', $data['agentID'], UID);
    				// 记录当前列表页的cookie
    				Cookie('__forward__',$_SERVER['REQUEST_URI']);
    				$this->success('更新成功', Cookie('__forward__'));
    			} else {
    				$this->error('更新失败');
    			}
    		} else {
    			$this->error($camp->getError());
    		}
    	} else {   			
	    $info = array();
	    /* 获取数据 */
	    $info = M('Lcamp')->field(true)->find($campID);
	    $map['onethink_lcamp.campID']=$campID;
	    $camp=M('Lcamp');
	    $result=$camp
	    ->join('onethink_lbivouac on onethink_lbivouac.bivouacID=onethink_lcamp.bivouacID')
	    ->where($map)->find(); 
        $this->assign('result',$result);
      
	    if(false === $info){
	    	$this->error('获取营地信息错误');
	    }	    
	    
	    $this->assign('info', $info);
			$this->meta_title = '编辑营地信息'; 
			$this->display();
    	}
}

   public function gadd(){
   	if(IS_POST){
   		$camp = M('Lcamp');
   		$data = $camp->create();
   		if($data){
   			/* $map['onethink_lcamp.campName']=;
   			$rst=$camp
	        ->join('onethink_lbivouac on onethink_lbivouac.bivouacID=onethink_lcamp.bivouacID')
	        ->where($map)->find();  */
   			$campID = $camp->add();
   			if($campID){
   				// S('DB_CONFIG_DATA',null);
   				//记录行为
   				//action_log('update_agent', 'Agent', $agentID, UID);
   				$this->success('新增成功', Cookie('__forward__'));
   			} else {
   				$this->error('新增失败');
   			}
   		} else {
   			$this->error($camp->getError());
   		}
   	} else {   		
	    /* 获取数据 */
	    /* $info = M('Lcamp')->field(true)->find($campID);
	    $map['onethink_lcamp.campID']=$campID;
	    $camp=M('Lcamp');
	    $result=$camp
	    ->join('onethink_lbivouac on onethink_lbivouac.bivouacID=onethink_lcamp.bivouacID')
	    ->where($map)->find(); 
        $this->assign('result',$result);
	    $this->assign('info',$info); */
   		$this->assign('info',array('campID'=>I('campID')));
        // 记录当前列表页的cookie
       Cookie('__forward__',$_SERVER['REQUEST_URI']);
   		
   		$this->meta_title = '新增营地';
   		$this->display('gupdate');
   	}
   }
    
   public function edit($gameID=0){
   if(IS_POST){
            $game = M('lgame');
            $data = $game->create();
            
            if($data){
                if($game->save()!== false){
                    // S('DB_CONFIG_DATA',null);
                    //记录行为
                   // action_log('update_menu', 'lgame', $data['id'], UID);
                    $this->success('更新成功', Cookie('__forward__'));
                } else {
                    $this->error('更新失败');
                }
            } else {
                $this->error($game->getError());
            }
        } else {
        	$game=M('lgame');
        	$info=$game->where('gameID='.$gameID)->find();
        	
        	$gtype=M('lgtype');
        	$result=$gtype->select();
        	$this->assign('result',$result);
        	
            $this->assign('info',$info);
   		// 记录当前列表页的cookie
   		Cookie('__forward__',$_SERVER['REQUEST_URI']);
   		$this->meta_title = '编辑游戏信息';
   		$this->display('edit');

        }
   }
   
    public function add(){
    	if(IS_POST){
    		$game = M('lgame');
    		$data = $game->create();
    		if($data){
    			if($game->save()!== false){
    				// S('DB_CONFIG_DATA',null);
    				//记录行为
    				// action_log('update_menu', 'lgame', $data['id'], UID);
    				$this->success('新增成功', Cookie('__forward__'));
    			} else {
    				$this->error('新增失败');
    			}
    		} else {
    			$this->error($game->getError());
    		}
    	} else {
    		$game=M('lgame');
    		$info=$game->where('gameID='.$gameID)->find();
    		 
    		$gtype=M('lgtype');
    		$result=$gtype->select();
    		$this->assign('result',$result);
    		 
    		$this->assign('info',$info);
    		// 记录当前列表页的cookie
    		Cookie('__forward__',$_SERVER['REQUEST_URI']);
    		$this->meta_title = '编辑游戏信息';
    		$this->display('edit');
    	}	
    }
    
	public function gdelete(){
		$camp=M('Lcamp');
		$id = array_unique((array)I('campID',0));
		
		if(empty($id)){
		    $this->display("请选择要操作的数据！");	
		}
		
		$map=array('camp'=>array('in',$id));
		if (M('Lcamp')->where($map)->delete()){
			$this->success("删除成功！");
		}else{
			$this->error("删除失败");
		}
		
		$this->display();
	}
	
}