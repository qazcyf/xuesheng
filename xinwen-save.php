<?php
	$xwBiaoti = $_POST["xwBiaoti"];
	$xwJianti = $_POST["xwJianti"];
	$xwNeirong = $_POST["xwNeirong"];
	$shiJian = $_POST["shiJian"];
	$xwZuozhe = $_POST["xwZuozhe"];
	$lammuid = $_POST["lammuid"];
	$time = time();
	//如果是录入页面提交,那么$action等于add;
	$action = empty($_POST["action"])?"add":$_POST["action"];
		if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/pjpeg"))
			|| ($_FILES["file"]["type"] == "video/mp4")
			&& ($_FILES["file"]["size"] < 10241000)){
			if ($_FILES["file"]["error"] > 0){
	  		echo "错误: " . $_FILES["file"]["error"] . "<br />";
	  	}else{
	  		// 重新给上传的文件命名，增加一个年月日时分秒，并且加上保存路径
			$filename = "upload/".date('YmdHis').$_FILES["file"]["name"];
			//move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
			move_uploaded_file($_FILES["file"]["tmp_name"],$filename);  
		}
	}else{
		$filename = $_POST["tupain"];
	}
	// echo $filename;
	if ($action == "add") {
		$str = "添加";
		$url = "xinwen-input.php";
		$sql1 = "insert into news(标题,肩题,图片,内容,发布时间,创建时间,userid,cloumnid) value('$xwBiaoti','$xwJianti','$filename','$xwNeirong','$shiJian','$time','$xwZuozhe','$lammuid')";
		echo $sql1;
	}else if($action=="update"){
		$str = "更新";
		$url = "xinwen-list.php";
		$kid = $_POST["kid"];
	 	$sql1 = "update news set 标题 = '{$xwBiaoti}',肩题='{$xwJianti}',图片='{$filename}',内容='{$xwNeirong}',发布时间='{$shiJian}',创建时间='{$time}',userid='{$xwZuozhe}',cloumnid='{$lammuid}' where id={$kid}";
	}else{
		die("请选择操作方法");
	}
	include("conn.php");

	//执行SQL语句
	$result = mysqli_query($conn,$sql1);

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