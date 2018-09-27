	<?php include("head.php")?>
	<div class="sui-container">
		<div class="sui-layout">
  		<div class="sidebar">
  		<!-- 左菜单 -->
			<?php include("menuleft.php")?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge" >学生列表</p>
  			<table class="sui-table table-primary" id="studentlist">
            <tr><th>id</th><th>学号</th><th>班号</th><th>姓名</th><th>性别</th><th>出生日期</th><th>电话</th><th>操作</th></tr>
          </tahead>

<?php
  /*if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)){
      $row1 = $row['性别']==1?'男':'女';
      echo "<tr>
      <td>{$row['id']}</td>
      <td>{$row['学号']}</td>
      <td>{$row['班号']}</td>
      <td>{$row['姓名']}</td>
      <td>{$row1}</td>
      <td>{$row['出生日期']}</td>
      <td>{$row['电话']}</td>
      <td><a class='sui-btn btn-small btn-warning' href='xuesheng-update?kid={$row['id']}'>修改</a>&nbsp;&nbsp;&nbsp;
      <a class='sui-btn btn-small btn-danger' href='xuesheng-del.php?kid={$row['id']}'>删除</a></td>
      </tr>";
    };
  }else{
    echo "没有记录";
  }*/
?>
        </table>
  		</div>
</div>
	</div>
<?php include("foot.php")?>
<script>
window.onload = function(){
  $.ajax({
    url:"api.php",
    type    : "POST",
    dataType: "json",
    data:{
      "action":"xue_sheng"
    },
    beforeSend : function(XMLHttpRequest){
      $("#studentlist").html("<tr><th>id</th><th>学号</th><th>班号</th><th>姓名</th><th>性别</th><th>出生日期</th><th>电话</th><th>操作</th></tr><tr><td>正在查询，请稍后...</d></tr>");
    },
    success : function(data,textStatus){
      if(data.code == 200){
        var str = ""
        for (var i=0; i < data.data.length; i++) { 
          
          str += "<tr>";
          for(var key in data.data[i]) { 
            if(key == "照片"){
              continue;
            }
            str += "<td>" + data.data[i][key] + "</td>";
          }
          var c = data.data[i].id;
          str += "<td><a class='sui-btn btn-small btn-warning' href='xuesheng-update?kid=" + c + "'>修改</a>&nbsp;&nbsp;&nbsp;<a class='sui-btn btn-small btn-warning' href='xuesheng-del.php?kid=" + c + "'>删除</a></td></tr>";
        }
        // console.log(str);
          $("#studentlist").html( "<tr><th>id</th><th>学号</th><th>班号</th><th>姓名</th><th>性别</th><th>出生日期</th><th>电话</th><th>操作</th></tr>" + str );
      }
    },
    error   : function(XMLHttpRequest,textStatus,errorThrown){
      // 请求失败后调用此函数
      console.log("失败原因：" + errorThrown);
    }
  });
}
</script>