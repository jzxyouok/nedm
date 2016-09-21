<?php

class MailcontentModel extends Model {
	
	protected $_map = array(
		'title' =>'subject', // 把表单中title映射到数据表的subject字段
		'mail_body' =>'body', // 把表单中mail_bodye映射到数据表的body字段	
	);
	
	
    // 定义自动验证
	protected $_validate = array(
		array('subject','require','标题不能为空！',1), //默认情况下用正则进行验证式
		array('body','require','内容不能为空！',1), //默认情况下用正则进行验
	);
	
	

	

}