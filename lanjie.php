<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="suoyou.css">
</head>
<body>
  <div class="box">
    <div class="header">
      <span class="maskFif"></span>
      <div class="inner">
        <h1 class="logo">
          <a href="#">
            <span class="cn"></span>
          </a>
        </h1>
        <div class="nav01">
          <a href="#">首页</a>
          <a href="#">师资队伍</a>
          <a href="#">专业设置</a>
          <a href="#">招生就业</a>
          <a href="#">北网新闻</a>
          <a href="#">走进北网</a>
          <a href="#">联系我们</a>
        </div>
      </div>
    </div>
    <div class="section08">
      <div class="wrap">
        <div class="breadBox">
          <h2>北网新闻</h2>
          <a href="index1.php">主页</a>
          <a href="index1.php">北网新闻</a>
        </div>
      </div>
    </div>
    <div class="section17">
      <div class="clearfix wrap">
        <div class="boxL">
          <div class="block26">
            <div class="tit06">
              <h4>
                <font color="#2052af">北网新闻</font>
                <font color="f7931e"></font>
              </h4>
            </div>
            <div class="innerBox">
              <h2><?php echo $_REQUEST['biaoti'];?></h2>
              <div class="other">
                <span class="d"><?php echo $_REQUEST['neirong'];?></span>
                <span class="tag"></span>
              </div>
              <div class="txt">
              <?php echo $_REQUEST['neirong'];?>
              <div style="text-align: center;">
                <img src="<?php echo $_REQUEST['tupian'];?>" style="width: 819px; height: 520px;">
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="boxR">
          <div class="block30">
            <div class="border"></div>
            <div class="inner">
              <div class="tit">
                <h2>最新资讯</h2>
              </div>
              <div class="tit">
                <h2>北京网络职业学院</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>