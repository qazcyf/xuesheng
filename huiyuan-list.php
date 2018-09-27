	<?php include("head.php")?>
  <?php
  include("conn.php");
  //执行SQL语句
  $sql = "select * from user";
  $result = mysqli_query($conn2,$sql);
  //关闭数据库
  mysqli_close($conn2);
?>

	<div class="sui-container">
		<div class="sui-layout">
  		<div class="sidebar">
  		<!-- 左菜单 -->
			<?php include("menuleft.php")?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge">会员列表</p>
  			<table class="sui-table table-primary">
            <tr><th>id</th><th>邮件</th><th>名称</th><th>密码提示问题</th><th>操作</th></tr>
<?php
  if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)){
      echo "<tr>
      <td>{$row['id']}</td>
      <td>{$row['email']}</td>
      <td>{$row['name']}</td>
      <td>{$row['question']}</td>
      <td><a class='sui-btn btn-small btn-warning' href='huiyuan-update.php?kid={$row['id']}'>修改</a>&nbsp;&nbsp;&nbsp;
      <a class='sui-btn btn-small btn-danger' href='huiyuan-del.php?kid={$row['id']}'>删除</a></td>
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

