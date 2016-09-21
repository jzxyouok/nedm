<?php
//添加和管理邮件模板, 并发送
class ContentAction  extends Action {
	
	public function index(){
		$this->title='添加模板';
		$this->display();	
	}
	
	public function add(){
		// 实例mailcontent模型
		$Content = D('Mailcontent');
			
		// 根据表单提交的POST数据创建数据对象
		if($data=$Content->create()){
			// 把创建的数据对象写入数据库
			if($Content->add()){
				$this->success('success','/Content/manage');
			}else{
		
				$this->error($Content->getError());
			}
		}else{	
	
			$this->error($Content->getError());
		}

	}
	
	public function manage(){
		$Content = M('Mailcontent');
		import('ORG.Util.Page');// 导入分页类
		$this->title="管理邮件模板";
		$count=$Content->count();// 查询满足要求的总记录数
		$Page = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$list=$Content->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('show',$show);// 赋值分页输出
		$this->display();	
	}
	
	public function edit(){
		$Content = D('Mailcontent');
		$id=$this->_get('id');
		if(IS_POST){
			$condition='id='.$id;
			if($Content->create()){
				if($Content->where($condition)->save()){
					$this->success('success','/Content/manage');
				}else{
					$this->error('no data change','/Content/manage');
				}
				
			}else{
				$this->error($Content->getError());
			}
		}else{
			
			$this->content=$Content->find($id);		
			$this->display();	
		}
	}
	
	public function del(){
		$Content = D('Mailcontent');
		$id=$this->_get('id');
		$condition='id='.$id;
		if($Content->where($condition)->delete()){
			$this->success('template delete success');
		}else{
			$this->success('can not delete');
		}
	}
	
	
	public function sendmail(){
		
		
		$this->source=' <script type="text/javascript" src="/app/Tpl/Common/sendemail.js"></script>';
		$this->title="发送邮件";
		$this->display();
	}
	
	
}