<?php
	$kcname = $_POST["kcname"];
	$kcTime = $_POST["kcTime"];
	//如果是录入页面提交,那么$action等于add;
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ($action == "add") {
		$str = "添加";
		$url = "kecheng-input.php";
		$sql1 = "insert into ke_cheng(课程名,时间) value('$kcname','$kcTime')";
	}else if($action=="update"){
		$str = "更新";
		$url = "kecheng-list.php";
		$kid = $_POST["kid"];
		$sql1 = "update ke_cheng set 课程名 = '{$kcname}',时间='{$kcTime}' where 课程编号={$kid}";
	}else{
		die("请选择操作方法");
	}
	include("conn.php");

	//执行SQL语句
	$result = mysqli_query($conn,$sql1);

	//输出数据
	// var_dump($result);
	if ($result) {
		echo "<script>alert('数据{$str}成功')</script>";
		header("Refresh:1;url={$url}");
	}else{
		echo "数据{$str}失败".mysqli_error($conn);
	}
//关闭数据库
mysqli_close($conn);
?>