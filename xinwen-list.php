	<?php include("head.php")?>
  <?php
  include("conn.php");
  //执行SQL语句
  $sql = "select id,标题,发布时间 from news";
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
  			<p class="sui-text-xxlarge">新闻列表</p>
  			<table class="sui-table table-primary">
            <tr><th>id</th><th>标题</th><th>发布时间</th><th>操作</th></tr>
<?php
  if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)){
      echo "<tr>
      <td>{$row['id']}</td>
      <td>{$row['标题']}</td>
      <td>{$row['发布时间']}</td>
      <td><a class='sui-btn btn-small btn-warning' href='xinwen-update.php?kid={$row['id']}'>修改</a>&nbsp;&nbsp;&nbsp;
      <a class='sui-btn btn-small btn-danger' href='xinwen-del.php?kid={$row['id']}'>删除</a></td>
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

