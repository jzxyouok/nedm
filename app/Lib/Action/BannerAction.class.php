<?php
// 首页模块
class BannerAction extends Action {
	public function add() {
		if (IS_POST) {
			import ( 'ORG.Net.UploadFile' );
			$upload = new UploadFile (); // 实例化上传类
			$upload->maxSize = 13145728; // 设置附件上传大小
			$upload->allowExts = array (
					'jpg',
					'gif',
					'png',
					'jpeg' 
			); // 设置附件上传类型
			$upload->savePath = './upload/banner/'; // 设置附件上传目录
			if (! $upload->upload ()) { // 上传错误提示错误信息
				$this->error ( $upload->getErrorMsg () );
			} else { // 上传成功 获取上传文件信息
				$info = $upload->getUploadFileInfo ();
				dump($info);
			}
			// 保存表单数据 包括附件数据
// 			$banner = M ( "banner" ); // 实例化banner对象
// 			$banner->create (); // 创建数据对象
// 			$banner->path = $info [0] ['savename']; // 保存上传的照片根据需要自行组装
// 			$banner->add (); // 写入用户数据到数据库
// 			$this->success ( '数据保存成功！' );
		} else {
			$this->title = "添加图片";
			$this->display ();
		}
	}
}