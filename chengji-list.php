<?php include("head.php")?>
<?php
  include("conn.php");
  //执行SQL语句
  $sql = "select 学号,课程编号,成绩 from xuan_xiu";
  $result = mysqli_query($conn,$sql);
  //关闭数据库
  mysqli_close($conn);
?>

	<div class="sui-container">
		<div class="sui-layout">
  		<div class="sidebar">
  		<!-- 左菜单 -->
			<?php include("menuleft.php")?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge" >成绩列表</p>
  			<table class="sui-table table-primary">
            <tr><th>学号</th><th>课程编号</th><th>成绩</th><th>操作</th></tr>
<?php
  if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)){
      echo "<tr>
      <td>{$row['学号']}</td>
      <td>{$row['课程编号']}</td>
      <td>{$row['成绩']}</td>
      <td><a class='sui-btn btn-small btn-warning' href='chengji-update.php?kid={$row['学号']}'>修改</a>&nbsp;&nbsp;&nbsp;
      <a class='sui-btn btn-small btn-danger' href='chengji-del.php?kid={$row['学号']}'>删除</a></td>
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

