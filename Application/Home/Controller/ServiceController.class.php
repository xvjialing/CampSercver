<?php
namespace Home\Controller;
use User\Api\UserApi;

class ServiceController extends HomeController {
	/* 登录页面 */
	public function login()
	{
		$member=M('Member');
		if (IS_GET)
		{
			$username=I('username');
			$password=I('password');
			$user = new UserApi;
			$uid = $user->login($username, $password);
			if (0<$uid)
			{
				$response ["message"] = "1";
					
				echo $this->ajaxReturn ( $response, 'JSON' );
			}
			else 
			{
				$response ["message"] = "0";
					
				// echoing JSON response
				echo $this->ajaxReturn ( $response, 'JSON' );
			}
			
		}
		
	}

	
}