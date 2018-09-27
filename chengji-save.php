<?php
	$cjXhao = $_POST["cjXhao"];
	$cjBhao = $_POST["cjBhao"];
	$cjCj = $_POST["cjCj"];
	//如果是录入页面提交,那么$action等于add;
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ($action == "add") {
		$str = "添加";
		$url = "chengji-input.php";
		$sql1 = "insert into xuan_xiu(学号,课程编号,成绩) value('$cjXhao','$cjBhao','$cjCj')";
	}else if($action=="update"){
		$str = "更新";
		$url = "chengji-list.php";
	 	$sql1 = "update xuan_xiu set 学号 = '{$cjXhao}',课程编号='{$cjBhao}',成绩='{$cjCj}' where 学号={$cjXhao}";
	 	echo $sql1;
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