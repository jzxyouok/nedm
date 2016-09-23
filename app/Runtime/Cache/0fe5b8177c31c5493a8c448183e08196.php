<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>用户登录</title>
</head>
<body>


	<form action="__SELF__" method="post">
		<table>
			<tr>
				<td colspan="2">
					<h2>用户登录</h2>
				</td>
			</tr>

			<tr>
				<td>用户名</td>
				<td><input type="text" name="username" /></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="password" name="password" /></td>
			</tr>

			<tr>
				<td>验证码</td>
				<td><input type="text" name="verify" /><img src="verify.html">
				</td>
			</tr>


			<tr>
				<td colspan="2"><input type="submit" value="登录" /></td>
			</tr>
		</table>


		</table>
	</form>
</body>
</html>