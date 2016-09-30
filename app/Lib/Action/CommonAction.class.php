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
		$upload = new UploadFile (); // 实例化上传类
		$upload->maxSize = 3145728; // 设置附件上传大小
		$upload->allowExts = array ('jpg','gif','png','jpeg'); // 设置附件上传类型
		$upload->savePath = './Uploads/banner/'; // 设置附件上传目录
		if (! $upload->upload ()) { // 上传错误提示错误信息
			$this->$upload->getErrorMsg ();
		} else { // 上传成功 获取上传文件信息
			$info = $upload->getUploadFileInfo ();
			return  $info;
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
