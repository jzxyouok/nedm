// JavaScript Document

//接收填写的条件参数, 并从服务器取回邮箱字符串
function getemail() {
	alert('正在获取邮箱当中请稍后');

	$.post("/Emgr/getemailist", {
		countsend : $("#countsend").val(),
		countop : $("#countop").val(),
		reply : $("#reply").val(),
		limit : $("#limit").val()

	}, function(data, status) {
		$("#getemail").html(data);
	});
}

//把邮箱字符串以逗号分割成数组并获取邮箱长度
function getlen() {
	maillist = $("#getemail").val();
	listarr = maillist.split(',');
	len = listarr.length;
	len = len - 1;
	alert("邮箱的数量是:" + len);
}

function getspeed() {

	speed = $("#speed").val()
	alert("发送间隔为" + speed + "毫秒")
}

i = 0

/*邮件发送主程序*/
function sendemail() {
	snum = i + 1
	$('#sendshow').html("第" + snum + "封邮件是" + listarr[i])

	$.post("/Send/send.html", {
		email : listarr[i],
		send_num : snum

	}, function(data, status) {
		showdata = data.substr(-130);
		//showdata = data
		$("#sendstatus").html(showdata);

	});
	i = i + 1
	if (i < len) {
		setTimeout("sendemail()", speed);
	}
}

function beforesend() {
	getlen();
	getspeed();
	sendmail();

}