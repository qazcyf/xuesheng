<?php 
	session_start();
	include("conn2.php");
		// 邮箱
		$mali = empty($_REQUEST['youjian']) ? "null":strtolower($_REQUEST['youjian']);
	    // 密码
	    $password = empty($_REQUEST['yonghuming']) ? "null":$_REQUEST['yonghuming'];
	    $responseArr = array(
	    	"code"=>200,
	    	"msg"=>"登陆成功"
	    );
	    // 首先根据用户提交的邮件查询，如果至少一条记录，则邮件正确，否则邮箱不正确
	    $sql="select email,name,password,question,answer from user where email = '{$mali}'";
	    $result = mysqli_query($conn,$sql);
	    if (mysqli_num_rows($result)>0) {
	    	// 提示邮箱正确
	    	// 如果邮箱正确，在判断用户提交的密码和上一步查询到密码是否能否相等，否则密码不正确
	    	$arr = mysqli_fetch_assoc($result);
	    	if ($password == $arr["password"]) {
	    		// 密码正确
	    		// 创建一个session，键为usname，值为$mail；
	    		$_SESSION["usemail"] = $arr['email'];
	    		$_SESSION["usname"] = $arr['name'];
	    		// $_SESSION["usid"] = $arr['id'];
	    	}else{
	    		$responseArr["code"] = 20001;
	    		$responseArr["msg"] = "密码错误";
	    	}
	    }else{
	    	// 邮箱不存在
	    	$responseArr["code"] = 20004;
	    	$responseArr["msg"] = "邮件不存在";
	    }
	    // print_r($arr);
	    // print_r($responseArr);
	    echo json_encode($responseArr);
	mysqli_close($conn);
 ?>