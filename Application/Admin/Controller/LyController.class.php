<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Admin\Controller;
use Think\Controller;

/**
 * 后台用户控制器
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
class LyController extends AdminController {

    /**
     * 用户管理首页
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function index(){
        $agentName      =   I('agentname');
        $map['status']  =   array('egt',0);
        if(is_numeric($agentName)){
            $map['agentid|agentname']=   array(intval($agentName),array('like','%'.$agentName.'%'),'_multi'=>true);
        }else{
            $map['agentname']    =   array('like', '%'.(string)$agentName.'%');
        }
        Cookie('__forward__',$_SERVER['REQUEST_URI']);
        
        $list   = $this->lists('Lagent', $map);
        int_to_string($list);
       
        $this->assign("_list",$list);
        $this->meta_title = '代理人信息';
        $this->display();
    }
    //编辑
    public function update($agentID = 0){
    	if(IS_POST){
    		$Lagent = D('Lagent');
    		$data = $Lagent->create();
    		if($data){
    			if($Lagent->save()!== false){
    				// S('DB_CONFIG_DATA',null);
    				//记录行为
    				//action_log('update_agent', 'Lagent', $data['agentID'], UID);
    				$this->success('更新成功', Cookie('__forward__'));
    			} else {
    				$this->error('更新失败');
    			}
    		} else {
    			$this->error($Lagent->getError());
    		}
    	} else {
    		$info = array();
    		/* 获取数据 */
    		$info = M('Lagent')->field(true)->find($agentID);
    		
    		if(false === $info){
    			$this->error('获取后台菜单信息错误');
    		}
    		$this->assign('info', $info);
    		$this->meta_title = '编辑后台菜单';
    		$this->display();
    	}
    }
    

    //新增
    public function add(){
    	if(IS_POST){
    		$Agent = D('Lagent');
    		$data = $Agent->create();
    		
    		if($data){
    			$agentID = $Agent->add();
    			if($agentID){
    				// S('DB_CONFIG_DATA',null);
    				//记录行为
    				//action_log('update_agent', 'Agent', $agentID, UID);
    				$this->success('新增成功', Cookie('__forward__'));
    			} else {
    				$this->error('新增失败');
    			}
    		} else {
    			$this->error($Agent->getError());
    		}
    	} else {
    		$this->assign('info',array('agentID'=>I('agentID')));
    		
    		// 记录当前列表页的cookie
    		Cookie('__forward__',$_SERVER['REQUEST_URI']);
    		$this->meta_title = '新增菜单';
    		$this->display('update');
    	}
    }
    
    
    //删除
    public function del(){
    	$agentID = array_unique((array)I('agentID',0));
    
    	if ( empty($agentID) ) {
    		$this->error('请选择要操作的数据!');
    	}
    
    	$map = array('agentID' => array('in', $agentID) );
    	if(M('Lagent')->where($map)->delete()){
    		// S('DB_CONFIG_DATA',null);
    		//记录行为
    		action_log('update_menu', 'Lagent', $agentID, AID);
    		$this->success('删除成功');
    	} else {
    		$this->error('删除失败！');
    	}
    }
    
    //消费者信息列表
    public function uindex(){
    	$userName      =   I('userName');
    	if(is_numeric($userName)){
    		$map['userid|userName']=   array(intval($userName),array('like','%'.$userName.'%'),'_multi'=>true);
    	}else{
    		$map['userName']    =   array('like', '%'.(string)$userName.'%');
    	}
    	Cookie('__forward__',$_SERVER['REQUEST_URI']);
    
    	$list   = $this->lists('Luser', $map);
    	int_to_string($list);
    	$this->assign('_list', $list);
    	$this->meta_title = '消费者信息';
    	$this->display();
    }
    //消费者信息更新
    public function uedit($userID = 0){
    	if(IS_POST){
    		$Luser = D('Luser');
    		$data = $Luser->create();
    		if($data){
    			if($Luser->save()!== false){
    				// S('DB_CONFIG_DATA',null);
    				//记录行为
    				//action_log('update_agent', 'Lagent', $data['agentID'], UID);
    				$this->success('更新成功', Cookie('__forward__'));
    			} else {
    				$this->error('更新失败');
    			}
    		} else {
    			$this->error($Luser->getError());
    		}
    	} else {
    		$info = array();
    		/* 获取数据 */
    		$info = M('Luser')->field(true)->find($userID);
    
    		if(false === $info){
    			$this->error('获取后台菜单信息错误');
    		}
    		$this->assign('info', $info);
    		$this->meta_title = '编辑后台菜单';
    		$this->display();
    	}
    }
    

    //消费者新增
    public function uadd(){
    	if(IS_POST){
    		$User = D('Luser');
    		$data = $User->create();
    		if($data){
    			$userID = $User->add();
    			if($userID){
    				// S('DB_CONFIG_DATA',null);
    				//记录行为
    				//action_log('update_agent', 'Agent', $agentID, UID);
    				$this->success('新增成功', Cookie('__forward__'));
    			} else {
    				$this->error('新增失败');
    			}
    		} else {
    			$this->error($User->getError());
    		}
    	} else {
    		$this->assign('info',array('userID'=>I('userID')));
    
    		$this->meta_title = '新增菜单';
    		$this->display('uedit');
    	}
    }
    
    
    //删除
    public function delu(){
    	$userID = array_unique((array)I('userID',0));
    
    	if ( empty($userID) ) {
    		$this->error('请选择要操作的数据!');
    	}
    
    	$map = array('userID' => array('in', $userID) );
    	if(M('Luser')->where($map)->delete()){
    		// S('DB_CONFIG_DATA',null);
    		//记录行为
    		action_log('update_menu', 'Luser', $userID, UID);
    		$this->success('删除成功');
    	} else {
    		$this->error('删除失败！');
    	}
    }
    
    /**
     * 修改昵称初始化
     * @author huajie <banhuajie@163.com>
     */
    public function updateNickname(){
    	$nickname = M('Member')->getFieldByUid(UID, 'nickname');
    	$this->assign('nickname', $nickname);
    	$this->meta_title = '修改昵称';
    	$this->display();
    }
    /**
     * 修改昵称提交
     * @author huajie <banhuajie@163.com>
     */
    public function submitNickname(){
        //获取参数
        $nickname = I('post.nickname');
        $password = I('post.password');
        empty($nickname) && $this->error('请输入昵称');
        empty($password) && $this->error('请输入密码');

        //密码验证
        $User   =   new UserApi();
        $uid    =   $User->login(UID, $password, 4);
        ($uid == -2) && $this->error('密码不正确');

        $Member =   D('Member');
        $data   =   $Member->create(array('nickname'=>$nickname));
        if(!$data){
            $this->error($Member->getError());
        }

        $res = $Member->where(array('uid'=>$uid))->save($data);

        if($res){
            $user               =   session('user_auth');
            $user['username']   =   $data['nickname'];
            session('user_auth', $user);
            session('user_auth_sign', data_auth_sign($user));
            $this->success('修改昵称成功！');
        }else{
            $this->error('修改昵称失败！');
        }
    }

    /**
     * 修改密码初始化
     * @author huajie <banhuajie@163.com>
     */
    public function updatePassword(){
        $this->meta_title = '修改密码';
        $this->display();
    }

    /**
     * 修改密码提交
     * @author huajie <banhuajie@163.com>
     */
    public function submitPassword(){
        //获取参数
        $password   =   I('post.old');
        empty($password) && $this->error('请输入原密码');
        $data['password'] = I('post.password');
        empty($data['password']) && $this->error('请输入新密码');
        $repassword = I('post.repassword');
        empty($repassword) && $this->error('请输入确认密码');

        if($data['password'] !== $repassword){
            $this->error('您输入的新密码与确认密码不一致');
        }

        $Api    =   new UserApi();
        $res    =   $Api->updateInfo(UID, $password, $data);
        if($res['status']){
            $this->success('修改密码成功！');
        }else{
            $this->error($res['info']);
        }
    }

    /**
     * 用户行为列表
     * @author huajie <banhuajie@163.com>
     */
    public function action(){
        //获取列表数据
        $Action =   M('Action')->where(array('status'=>array('gt',-1)));
        $list   =   $this->lists($Action);
        int_to_string($list);
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->assign('_list', $list);
        $this->meta_title = '用户行为';
        $this->display();
    }

    /**
     * 新增行为
     * @author huajie <banhuajie@163.com>
     */
    public function addAction(){
        $this->meta_title = '新增行为';
        $this->assign('data',null);
        $this->display('editaction');
    }

    /**
     * 编辑行为
     * @author huajie <banhuajie@163.com>
     */
    public function editAction(){
        $id = I('get.id');
        empty($id) && $this->error('参数不能为空！');
        $data = M('Action')->field(true)->find($id);

        $this->assign('data',$data);
        $this->meta_title = '编辑行为';
        $this->display();
    }

    /**
     * 更新行为
     * @author huajie <banhuajie@163.com>
     */
    public function saveAction(){
        $res = D('Action')->update();
        if(!$res){
            $this->error(D('Action')->getError());
        }else{
            $this->success($res['id']?'更新成功！':'新增成功！', Cookie('__forward__'));
        }
    }

    /**
     * 会员状态修改
     * @author 朱亚杰 <zhuyajie@topthink.net>
     */
    public function changeStatus($method=null){
        $agentID = array_unique((array)I('agentID',0));
        if( in_array(C('USER_ADMINISTRATOR'), $agentID)){
            $this->error("不允许对超级管理员执行该操作!");
        }
        $agentID = is_array($agentID) ? implode(',',$agentID) : $agentID;
        if ( empty($agentID) ) {
            $this->error('请选择要操作的数据!');
        }
        $map['agentID'] =   array('in',$agentID);
        switch ( strtolower($method) ){
            case 'forbiduser':
                $this->forbid('Lagent', $map );
                break;
            case 'resumeuser':
                $this->resume('Lagent', $map );
                break;
            case 'deleteuser':
                $this->delete('Lagent', $map );
                break;
            default:
                $this->error('参数非法');
        }
    }

   

    /**
     * 获取用户注册错误信息
     * @param  integer $code 错误编码
     * @return string        错误信息
     */
    private function showRegError($code = 0){
        switch ($code) {
            case -1:  $error = '用户名长度必须在16个字符以内！'; break;
            case -2:  $error = '用户名被禁止注册！'; break;
            case -3:  $error = '用户名被占用！'; break;
            case -4:  $error = '密码长度必须在6-30个字符之间！'; break;
            case -5:  $error = '邮箱格式不正确！'; break;
            case -6:  $error = '邮箱长度必须在1-32个字符之间！'; break;
            case -7:  $error = '邮箱被禁止注册！'; break;
            case -8:  $error = '邮箱被占用！'; break;
            case -9:  $error = '手机格式不正确！'; break;
            case -10: $error = '手机被禁止注册！'; break;
            case -11: $error = '手机号被占用！'; break;
            default:  $error = '未知错误';
        }
        return $error;
    }

}
