<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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


<table class="mailcontent">
<form action="__SELF__" method="post" onSubmit="geteditor()">
<tbody>
<tr class="suject">
<td>标题</td>
<td><input type="text" name="title" value="<?php echo ($content["subject"]); ?>"  /> </td>
</tr>
<tr class="body">
<td>邮件内容</td>
<td>

<textarea id="editor_id" name="mail_body"  style="width:700px;height:300px;"><?php echo ($content["body"]); ?></textarea>
</td>
</tr>
<tr>
<td colspan="2">
<input type="submit" value="提交"  />
</td>
</tr>
</tbody>
</form>
</table>




<script charset="utf-8" src="/public/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="/public/kindeditor/lang/zh_CN.js"></script>
<script>
KindEditor.ready(function(K) {
   window.editor = K.create('#editor_id');
});

function geteditor(){
	html = editor.html();
	$('#editor_id').html(html);
	
	}
		

</script>
<body>
</body>
</html>