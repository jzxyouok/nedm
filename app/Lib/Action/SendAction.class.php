<?php
class SendAction extends Action {
	public function send() {
		import('ORG.Net.Smtp');//引入邮件发送类库
		$smtp = new Smtp();
		dump($smtp);
		$to = $this->_post ( 'email' );//获取需要营销的邮箱
		$send_num = $this->_post ( 'send_num' );//发送邮箱的顺序号
		$MailContent=M('mailcontent');//实例化邮件模板对象
		$Edm=M('edm_email_list');
		$TotalNum=$MailContent->count();//计算模板总数
		
		
		/*
		 * 随机生成字数, 在总数范围内
		 * 获取邮件模板subject数组
		 * 获取随机邮件模板 body 内容
		 */
		$BodyNum=rand(1,$TotalNum);
		$bodyarr=$MailContent->field('body')->find($BodyNum);
		$body=$bodyarr['body'];
		
		/*
		 * 随机生成字数, 在总数范围内
		 * 获取邮件模板subject数组
		 * 获取随机邮件模板 标题subject 内容
		 */
		$subjectNum=rand(1,$TotalNum);
		$subjectArr=$MailContent->field('body')->find($subjectNum);
		$AcctNum=rand(1,9);
		
		
		/*
		 *随机生成发送帐号 
		 */
		$AcctNum=rand(1,9);
		$account= "sales" . $AcctNum . "@mooqing.com";
		
		$smtpaccount="mail.mooqing.com";//smtp帐号
		$password="Olp9$%099!0S4rfd";//邮箱统一密码
		$port=25;//发送邮箱的SMTP端口
	
		$this->postmail($to,$subject,$body,$smtpaccount,$account,$password,$port,$ContentNum);
		echo '第'.$send_num.'封邮件';
	}
	
	
	private function postmail($to, $subject, $body, $smtpaccount, $account, $password, $port,$AcctNum) {
		
		$smtpserver = $smtpaccount; // SMTP服务器
		$smtpserverport = $port; // SMTP服务器端口		
		$smtpusermail = "sales" . $AcctNum . "@mooqing.com"; // SMTP服务器的用户邮箱
		$smtpemailto = $to; // 发送给谁
		$smtpuser = $account; // SMTP服务器的用户帐号
		$smtppass = $password; // SMTP服务器的用户密码
		$mailtitle = $subject; // 邮件主题
		$mailcontent = $body; // 邮件内容
		$mailtype = "HTML"; // 邮件格式（HTML/TXT）,TXT为文本邮件
		                    // ************************ 配置信息 ****************************
		$smtp = new Smtp ( $smtpserver, $smtpserverport, true, $smtpuser, $smtppass ); // 这里面的一个true是表示使用身份验证,否则不使用身份验证.
		$smtp->debug = ture; // 是否显示发送的调试信息
		$state = $smtp->sendmail ( $smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype );
		
		$Edm=M('edm_email_list');
		$condition='email="'.$to.'"';
		$Edm->where($condition)->setInc('send_count',1); //更新新发送次数
		if ($state == "") {
			echo '<p>利用账号 ' . $account . '发送给' . $to . ' 失败</p>';
			$Edm->where($condition)->setInc('send_fall',1); //更新新发送失败次数
		} else {
			echo '<p>利用账号 ' . $account . '发送给' . $to . ' 成功啦！！！</p>';
			$Edm->where($condition)->setInc('send_success',1); //更新新发送失败次数
		}
	}
}