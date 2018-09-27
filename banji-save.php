<?php
	$bh = $_POST["bh"];
	$bz = $_POST["bz"];
	$js = $_POST["js"];
	$bzr = $_POST["bzr"];
	$bjkh = $_POST["bjkh"];
	//如果是录入页面提交,那么$action等于add;
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ($action == "add") {
		$str = "添加";
		$url = "banji-input.php";
		$sql1 = "insert into ban_ji(班号,班长,教室,班主任,班级口号) value('$bh','$bz','$js','$bzr','$bjkh')";
	}else if($action=="update"){
		$str = "更新";
		$url = "banji-list.php";
		$kid = $_POST["kid"];
	 	$sql1 = "update ban_ji set 班号 = '{$bh}',班长='{$bz}',教室 = '{$js}',班主任='{$bzr}',班级口号='{$bjkh}' where 班号='{$kid}'";
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