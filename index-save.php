<?php
	$conn = mysqli_connect("localhost","root","");
	mysqli_select_db($conn,"user");
	mysqli_query($conn,"set names utf8");
	$email = $_REQUEST['youjian'];
	$name = $_REQUEST['yonghuming'];
	$password = $_REQUEST['mima'];
	$question = $_REQUEST['wenti'];
	$answer = $_REQUEST['daan'];
	$responseArr = array(
		"code"=>200,
		"data"=>"注册成功"
	);
	$sql = "insert into user(email,name,password,question,answer) value('$email','$name','$password','$question','$answer')";
	$result = mysqli_query($conn,$sql);
	if ($result) {
		
	}else{
		$responseArr["code"] = 207;
		$responseArr["data"] = "注册失败";
	}
	die(json_encode($responseArr));
//关闭数据库
mysqli_close($conn);
?>