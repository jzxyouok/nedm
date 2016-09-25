<?php
// 首页模块
class BannerAction extends CommonAction {
	public function add() {
		$this->title = "添加图片";
		$this->display ();
	}
	public function upload() {
		$db = D ( 'banner' );
		$info = $this->uploadimg ();
		dump($info);
		$this->display();
	}
}