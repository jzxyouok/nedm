<?php
// 首页模块
class BannerAction extends CommonAction {
	public function add() {
		$this->title = "添加图片";
		$this->display ();
	}
	public function upload() {
		$info=$this->uploadimg();
		
		
		$db = M ( 'banner' );
		$db->create ();
		$db->photo = $info [0] ['savename'];
		$db->type = 1;
		if (! $db->add ()) {
			$db->getError ();
		} else {
			$this->success ( '图片保存成功' );
		}
	}
	
	// 管理页面
	public function edit() {
		$db = M ( 'banner' );
		$this->data = $db->order ( 'sort desc' )->select ();
		$this->display ();
	}
	
	// 更新图片
	public function update() {
		$db = M ( 'banner' );
		$id = $this->_param ( 'id','intval' );
		if (IS_POST) {
			if($data=$db->create()){
				if($id){
					$info=$this->uploadimg();
					$data['photo']=$info[0]['savename'];
				}
				if($db->data($data)->save()){
					$this->success('修改广告成功',U('Flash/index'));
				}else{
					$this->error('修改失败或没有修改任何数据');
				}
			}else{
				$this->error($db->getError());
			}
		
		}else{
			
			$this->data=$db->field('id,title,sort,link,photo,type')->find($id);
			$this->display();
		}
	}
	
	//删除图片
	public function del(){
		$db = M ( 'banner' );
		$id = $this->_get ( 'id','intval' );
		if ($db->delete($id)){
			$this->success('删除成功');
		}else{
			$db->getError();
		}
	}
}