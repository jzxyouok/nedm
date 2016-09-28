<?php
class BannerWidget extends Widget {
	public function render($data) {
		$data ['banner'] = $this->banner = M ( 'Banner' )->field ( 'id,title,sort,link,photo' )->order ( 'sort' )->select ();
		$content = $this->renderFile ( 'banner', $data );
		return $content;
	}
}
?>