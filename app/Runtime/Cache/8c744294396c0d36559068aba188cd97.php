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

<!--<form action="/Emgr/getemailist.html" method="post">-->
  <ol class="getemail">
    <li > <span>  发送次数</span>  <input type="text" id="countsend" name='countsend' value="0" ></input> </li>
    <li>  <span>   打开次数 </span> <input type="text" name='countop' id="countop" value="0" ></input> </li>
    <li>  <span>  回复次数 </span>   <input type="text" name='reply' id="reply" value="0" > </input> </li>
     <li> <span>  发送数量 </span>  <input type="text" id="limit" name='limit' value="0" ></input> </li>
  </ol>
  <div style="clear:both;"></div>
  <p> <input type="submit" value="获取邮箱" onClick="getemail()" /> </p>
<!--</form>-->

 <textarea id="getemail" rows="10" cols="20"> </textarea>
   <p><input id="speed" type="text" value="3650"/>  <input type="button" value="设置发送时间" onClick="beforesend()" /> </p>
   <p> <input type="button" value="开始发送" onclick="sendemail()"/>
 <p id="sendshow">发送顺序 </p>
 
 <div id="sendstatus">
 发送状态
 </div>
</body>
</html>