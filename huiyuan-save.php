<?php
	$huYouxiang = $_POST["huYouxiang"];
	$hyName = $_POST["hyName"];
	$hyMima = $_POST["hyMima"];
	$hyMimawenti = $_POST["hyMimawenti"];
	$hyMimawenti = $_POST["hyMimawenti"];
	//如果是录入页面提交,那么$action等于add;
	$str = "更新";
	$url = "huiyuan-list.php";
	$kid = $_POST["kid"];
	$sql1 = "update user set email = '{$huYouxiang}',name='{$hyName}',password = '{$hyMima}',question='{$hyMimawenti}',answer='{$hyMimawenti}' where id='{$kid}'";
	include("conn.php");

	//执行SQL语句
	$result = mysqli_query($conn2,$sql1);

	//输出数据
	// var_dump($result);
	if ($result) {
		echo "<script>数据{$str}')</script>";
	 	header("Refresh:1;url={$url}");
	}else{
		echo "数据{$str}失败".mysqli_error($conn);
	}
//关闭数据库
mysqli_close($conn);
?>