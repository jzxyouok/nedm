<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.min.js"></script>
<?php echo ($source); ?>

<style>
ol {
	float: left;
}

h2 {
	clear: both;
}

td {
	border: 1px solid #000;
	padding: 5px 20px;
	border-collapse: collapse;
}

tr {
	border-collapse: collapse;
}

table {
	border-collapse: collapse;
}
</style>

<title><?php echo ($title); ?></title>
</head>

<body>

	<ul>
		<ol>
			<li><a href="/Emgr/addemail.html">添加邮箱</a></li>
			<li><a href="/Emgr/open.html">更新打开过的邮箱 </a></li>
			<li><a href="/Emgr/reply.html"> 添加回复过的邮箱 </a></li>
			<li><a href="/Emgr/unscribe.html"> 添加退订邮箱</a></li>
			<li><a href="/Emgr/reject.html"> 添加退信</a></li>
			<li><a href="/Emgr/autoReply.html"> 添加自动回复</a></li>

		</ol>
		<ol>
			<li><a href="/Emgr/showreply.html">回复列表</a></li>
			<li><a href="/Emgr/showunscribe.html"> 退订列表</a></li>
			<li><a href="/Emgr/show_reject.html"> 反弹退信列表</a></li>
			<li><a href="/Emgr/show_auto_reply.html"> 自动回复列表</a></li>
		</ol>

		<ol>
			<li><a href="/Schmgr/uglist.html"> 可用镜像列表</a></li>
			<li><a href="/Schmgr/un_use_keyword.html"> 未使用的关键字</a></li>
			<li><a href="/Schmgr/add_ghost.html"> 添加新的镜像</a></li>
			<li><a href="/Schmgr/dolist.html"> 匹配域名</a></li>
		</ol>


		<ol>
			<li><a href="/Content/index.html"> 添加模板</a></li>
			<li><a href="/Content/manage.html"> 模板管理</a></li>
			<li><a href="/Content/sendmail.html">发送邮件 </a></li>
		</ol>

	</ul>
	<h2><?php echo ($title); ?></h2>



<div class="addemail">
<table>
<tbody>
<tr><td>序号</td> <td> 标题邮件地址 </td> <td>管理</td> </tr>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr> <td> <?php echo ($vo["id"]); ?> </td> <td> <?php echo ($vo["subject"]); ?> </td><td> <a href="edit/id/<?php echo ($vo["id"]); ?>.html">编辑</a>   <a href="javacript:void(0);" onclick="delcontent(<?php echo ($vo["id"]); ?>)"> 删除</a> </td> </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</tbody>
</table>

<script>
function delcontent(id){

	cfm=confirm('确认删除吗');
	if(cfm==true){
		url="del/id/"+id+"/html";
		window.open(url);			
	}
}
</script>

<p> <?php echo ($show); ?></p>
</div>
</body>
</html>