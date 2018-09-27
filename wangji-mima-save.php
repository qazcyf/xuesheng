<?php
	$youjian = $_POST["youjian"];
	$wenti = $_POST["wenti"];
	$daan = $_POST["daan"];
	$url = "wangji-mima.php";
	$sql1 = "select * from user where email = '{$youjian}'";
	include("conn2.php");
	//执行SQL语句
	$result = mysqli_query($conn,$sql1);
	if (mysqli_num_rows($result) > 0 ) {
	    // 将查询的结果转换为下列数组
	    $row = mysqli_fetch_assoc($result);
	}else{
	    echo "没有数据";
	}
	//输出数据
	// var_dump($result);
	if ($row['question'] == $wenti && $row['answer'] == $daan) {
		echo "<script>alert('成功登录')
		document.cookie='youxiang=' + {$youjian};</script>";
		$url = "index2.php";
	 	header("Refresh:1;url={$url}");
	}else{
		echo "<script>alert('答案错误')</script>";
	 	header("Refresh:1;url={$url}");
	}
//关闭数据库
mysqli_close($conn);
?>