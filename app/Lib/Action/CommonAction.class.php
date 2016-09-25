<?php
// 公共条用文档, 初始化登录, 图片上传模块 导航, 底部
class CommonAction extends Action {
	public function _initialize() {
		header ( "Content-Type:text/html; charset=utf-8" );
		if (! isset ( $_SESSION ['uid'] ) || ! isset ( $_SESSION ['username'] )) {
			$this->error ( '您尚未登录请先登录', '/Login/index' );
		}
	}
	
	//
	protected function uploadimg() {
		import ( 'ORG.Net.UploadFile' );
		$upload = new UploadFile ();
		$upload->allowExts = array (
				'jpg',
				'gif',
				'png',
				'jpeg',
				'bmp' 
		); // 设置附件上传类型
		$upload->savePath = '../Uploads/banner/'; // 不要修改
		
		if (! $upload->upload ()) {
			$this->error ( $upload->getErrorMsg () );
		} else {
			$info = $upload->getUploadFileInfo ();
			return $info;
		}
	}
	
	// 导航栏
	public function nav() {
		$this->display ();
	}
	
	// 头部
	public function header() {
		$this->display ();
	}
	
	// 底部
	public function footer() {
		$this->display ();
	}
}
