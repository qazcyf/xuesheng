<?php include("head.php") ?> 
<?php 
    $xingming = $_POST["xingming"];
	$xuehao = $_POST["xuehao"];
	$xuanze = empty($_POST["xingming"])?"student":"name";
	if ($xuanze == "name") {
		$sql1 = "select * from xue_sheng where 姓名 = '{$xingming}'";
	}else if($xuanze=="student"){
	 	$sql1 = "select * from xue_sheng where id = '{$xuehao}'";
	}else{
		die("请选择操作方法");
	}
    include("conn.php");
    $result = mysqli_query($conn,$sql1);
    mysqli_close($conn);
?>
	<div class="sui-container">
		<div class="sui-layout">
  		<div class="sidebar">
  		<!-- 左菜单 -->
			<?php include("menuleft.php")?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge">学生信息查询</p>
  			<table class="sui-table table-primary">
            <tr><th>id</th><th>学号</th><th>班号</th><th>姓名</th><th>性别</th><th>出生日期</th><th>电话</th><th>操作</th></tr>
<?php
  if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)){
      echo "<tr>
      <td>{$row['id']}</td>
      <td>{$row['学号']}</td>
      <td>{$row['班号']}</td>
      <td>{$row['姓名']}</td>
      <td>{$row['性别']}</td>
      <td>{$row['出生日期']}</td>
      <td>{$row['电话']}</td>
      <td><a class='sui-btn btn-small btn-warning' href='xuesheng-update.php?kid={$row['id']}'>修改</a>&nbsp;&nbsp;&nbsp;
      <a class='sui-btn btn-small btn-danger' href='xuesheng-del.php?kid={$row['id']}'>删除</a></td>
      </tr>";
    };
  }else{
    echo "没有记录";
  }
?>
        </table>
  		</div>
</div>
	</div>
<?php include("foot.php")?>