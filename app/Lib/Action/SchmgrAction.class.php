<?php
// 搜索爬虫相关的域名,关键字和镜像搜索引擎管理
class SchmgrAction extends Action {
	public function __construct() {
		// 调用父类的构造方法
		parent::__construct ();
		// 验证是否登录
		if (! $_SESSION ['username']) {
			$this->error ( '您尚未登录, 请登录后操作！', '/Login/index.html' );
		}
	}
	
	/*
	 * 
	 * 获取谷歌镜像列表*/
	public function uglist() {
		$glist = M ( 'googlelist' );
		$condition = 'succeed_count>0 and fail_count<19';
		$this->count = $glist->where ( $condition )->count ();
		$this->glist = $glist->where ( $condition )->select ();
		$this->title = '可用谷歌镜列表';
		$this->display ();
	}
	
	//查看获取总共有多少个匹配域名
	public function dolist() {
		$dlist = M ( 'domain' );
		$condition = 'title_macth=1';
		$this->count = $dlist->where ( $condition )->count ();
		$this->dlist = $dlist->where ( $condition )->select ();
		$this->title = '匹配域名';
		$this->display ();
	}
	
	//查看还有多多少关键字没有被使用
	public function un_use_keyword() {
		$klist = M ( 'keyword' );
		$condition = 'usecount=0';
		$this->title = "未使用的关键字列表";
		$this->count = $klist->where ( $condition )->count ();
		$this->klist = $klist->where ( $condition )->select ();
		$this->title = '可用谷歌镜列表';
		$this->display ();
	}
	
	
	//添加谷歌镜像列表
	public function add_ghost() {
		if (IS_POST) {
			header ( "Content-type:text/html;charset=utf-8" );
			$google = M ( '' );
			$list = $this->_post ( 'list' );
			$gls = explode ( "\n", $list );
			foreach ( $gls as $gl ) {
				$gl = trim ( $gl );
				$addsql = "insert into googlelist(sites) values('" . $gl . "')";
				$result = $google->query ( $addsql );
				if ($result) {
				}
				$upsql = "update googlelist set succeed_count=succeed_count+1, fail_count=0 where sites='" . $gl . "'";
				$up_result = $google->query ( $upsql );
			}
			echo "操作完成<br/>";
		} else {
			$this->title = "更新镜像列表";
			$this->display ();
		}
	}
}