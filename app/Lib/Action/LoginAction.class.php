<?php
// 公共条用文档, 导航, 底部
class LoginAction extends Action {
	public function index() {
		if (IS_POST) {
			if($_SESSION['verify'] != md5($_POST['verify'])) {
				$this->error('验证码错误！');
			}
			$User = M ( 'User' );
			$data ['uname'] = $this->_post ( 'username' );
			$data ['up'] = md5 ( $this->_post ( 'password' ) );
			if ($username = $User->where ( $data )->find ()) {
				session('username',$username['uname']);
				session('uid',$username['id']);
				$this->success('登录成功','/Index');
			} else {
				$this->error('帐号或密码错误请重新输入');
			}
		} else {
			$this->display ();
		}
	}
	
	public function Logout(){
		session('username',null);
		session('uid',null);
		$this->success('退出登录成功');
	}
	
	Public function verify() {
		import ( 'ORG.Util.Image' );
		Image::buildImageVerify ();
	}
}