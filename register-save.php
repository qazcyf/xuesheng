<?php 
	$conn = mysqli_connect("localhost","root","");
	if ($conn) {
		// echo "连接成功!";
	}else{
		// die("连接失败!".mysqli_connect_error() );
	}
	$responseArr = array(
		"code"=>200,
		"data"=>"可以使用"
	);
	//选择要操作的数据库
	mysqli_select_db($conn,"user");
	//设置读取数据库的编码,不然显示汉字为乱码
	mysqli_query($conn,"set names utf8");
	$email = $_REQUEST['youjian'];
	$sql = "select * from user where email='{$email}'";
	$result = mysqli_query($conn,$sql);
	// 如果查找的记录有一条，说明此email已经被注册过了
	if(mysqli_num_rows($result)>0){
		$responseArr["code"] = 207;
		$responseArr["data"] = "邮箱重复";
	}
	die(json_encode($responseArr));
	mysqli_close($conn);
?>