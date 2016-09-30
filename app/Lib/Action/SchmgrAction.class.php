<?php
// 搜索爬虫相关的域名,关键字和镜像搜索引擎管理
class SchmgrAction extends CommonAction {
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
		$db = M ( 'domain' );
		$condition['title_macth'] =1;
		$this->title = '匹配域名';				
		$count = $db->where ( $condition )->count (); // 查询满足要求的总记录数
		import ( 'ORG.Util.Page' );//引入page分页类
		$Page = new Page ( $count, 20 ); // 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show (); // 分页显示输出
		$list = $db->where ( $condition )->limit ( $Page->firstRow . ',' . $Page->listRows )->select();
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'show', $show ); // 赋值分页输出
		
		$this->display ();
	}
	
	//查看还有多多少关键字没有被使用
	public function un_use_keyword() {
		$db = M ( 'keyword' );
		$condition['usecount'] =0;
		$count = $db->where ( $condition )->count (); // 查询满足要求的总记录数
		import ( 'ORG.Util.Page' );//引入page分页类
		$Page = new Page ( $count, 20 ); // 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show (); // 分页显示输出
		
		$this->title = "未使用的关键字列表";		
		$list = $db->where ( $condition )->limit ( $Page->firstRow . ',' . $Page->listRows )->select();		
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'show', $show ); // 赋值分页输出
		
		
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