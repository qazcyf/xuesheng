<?php 
	session_start();
	if(empty($_SESSION['usname'])){
		header("Refresh:0;url=yonghu-denglu.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href=" http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" href=" http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<link rel="stylesheet" href="default.css" type="text/css" />
	<style>
		#box{
			width:1300px;
			height: 700px;
			margin:0 auto;
			border:1px solid;
			background-color: rgb(242,242,242);
		}
		.topnav{
			height: 55px;
			background-color: blue;
		}
		.text{
			width: 270px;
			height: 55px;
			margin:0 auto;
		}
		h1{
			color:#fff;
			font-family:宋体;
			line-height: 55px;
		}
		.sui-layout .content{
			width: 800px;
			margin-left: 404px;
		}
		.sui-container{
			margin-top: 50px;
		}
		.sui-layout{
			width: 1300px;
		}
		#xinwen{
			width: 100%;
			margin-left: -200px;
		}
		#xinwen li{
			float: left;
			margin-left: 100px;
		}
		#xinwen li img{
			width: 300px;
			height: 200px;
		}
		#xinwen li a{
			display: block;
		}
	</style>
</head>
<body>
<div id="box">
		<div class="topnav">
			<div class="text">
				<h1>学生信息统计系统</h1>
			</div>
		</div>

<h2><p id="ps">欢迎<span id="spas"><?php echo $_SESSION['usname']?></span>登录成功！</p><a href="yonghu-denglu.php">退出</a></h2>