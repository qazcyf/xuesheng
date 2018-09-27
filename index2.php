	<?php include("head.php");?>
	<div class="sui-container">
		<div class="sui-layout">
  		<div class="sidebar">
  			<!-- 左菜单 -->
			<?php include("menuleft.php")?>
  		</div>
  		<div class="content">
  			<ul id="xinwen">
        </ul>
  		</div>
</div>
<?php include("foot.php")?>
<script>
window.onload = function(){
    $.ajax({
    url     : "index2-ajax.php",
    type    : "POST",
    dataType: "json",
    success : function(data,textStatus){
      var str = "";
      for (var i=0; i < data.data.length; i++) { 
        str += "<li class='lis'><img src='"+ data.data[i].图片 + "'>" + "<a href='lanjie.php?biaoti=" + data.data[i].标题 + "&neirong=" + data.data[i].内容 + "&tupian=" + data.data[i].图片 + "'>" + data.data[i].标题 + "</a>" + "<a href='lanjie.php'>" + data.data[i].内容 + "</a>" + "<a href='lanjie.php'>" + data.data[i].发布时间 + "</a>" +"</li>";
      }
      $("#xinwen").html(str);
    },
    error   : function(XMLHttpRequest,textStatus,errorThrown){
      // 请求失败后调用此函数
      console.log("失败原因：" + errorThrown);
    }
  });
}
</script>

