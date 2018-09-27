<?php include("head.php") ?> 
<?php 
  $xingMing = $_POST["xingMing"];
  $xueHao = $_POST["xueHao"];
	$keCheng = $_POST["keCheng"];
	$xuanze = empty($_POST["xingMing"])?"student":"name";
	if ($xuanze == "name") {
		$sql1 = "SELECT * FROM xuan_xiu AS x LEFT JOIN ke_cheng AS k ON x.课程编号=k.课程编号 LEFT JOIN xue_sheng as s ON x.学号=s.学号 WHERE s.姓名 = '{$xingMing}' AND k.课程编号 = '{$keCheng}'";
	}else if($xuanze=="student"){
	 	$sql1 = "SELECT * FROM xuan_xiu AS x LEFT JOIN ke_cheng AS k ON x.课程编号=k.课程编号 LEFT JOIN xue_sheng as s ON x.学号=s.学号 WHERE x.学号 = '{$xueHao}' AND x.课程编号 = '{$keCheng}'";
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
            <tr><th>学号</th><th>姓名</th><th>课程名</th><th>成绩</th><th>操作</th></tr>
<?php
  if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)){
      echo "<tr>
      <td>{$row['学号']}</td>
      <td>{$row['姓名']}</td>
      <td>{$row['课程名']}</td>
      <td>{$row['成绩']}</td>
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