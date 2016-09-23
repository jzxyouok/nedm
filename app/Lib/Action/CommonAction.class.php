<?php
//公共条用文档, 导航, 底部
class CommonAction extends Action {
	
	//导航栏
    public function nav(){
	$this->display();
	}
	
	//头部
	public function header(){
		$this->display();
	}
	
	//底部
	public function footer(){
		$this->display();
	}
	
}
