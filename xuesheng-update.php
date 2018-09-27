<?php include("head.php") ?> 
  <?php 
    $kid = empty($_GET['kid'])?"null":$_GET['kid'];
    if ($kid == "null") {
      die("请选择要修改的记录");
    }else{
      include("conn.php");
      // 找到课程编号是kid的这行代码
      $sql ="select * from xue_sheng where id = '{$kid}'";
      $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result) > 0 ) {
        // 将查询的结果转换为下列数组
        $row = mysqli_fetch_assoc($result);
      }else{
          echo "没有数据";
      }
      // 关闭数据库
      mysqli_close($conn);
      }
  ?>
    <div class="sui-layout">
      <div class="sidebar">
      <!-- 左菜单 -->
      <?php include("menuleft.php"); ?>  
      </div>
        <div class="content">
        <p class="sui-text-xxlarge" >学生修改</p>
       <form id="form1" action="xuesheng-save.php" method="post" class="sui-form form-horizontal sui-validate" enctype="multipart/form-data">
	       <!-- 曾加一个隐藏的div，用来区分新增数据还是修改数据 -->
	        <input type="hidden" value="update" name="action">
	        <input type="hidden" value="<?php echo $row['id']; ?>" name="kid">
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">班号：</label>
   				 <div class="controls">
     				 <input id="xsBhao" name="xsBhao" class="input-large input-fat" type="text" placeholder="请输入班号" value="<?php echo $row['班号']; ?>">
   				 </div>
 			</div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">姓名：</label>
           <div class="controls">
             <input id="xsXingming" name="xsXingming" class="input-large input-fat" type="text" placeholder="请输入姓名" value="<?php echo $row['姓名']; ?>">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">照片：</label>
           <div class="controls">
             <input type="file" name="file" />
             <input type="hidden" name="tupain" value="<?php echo $row['照片']; ?>">
             <img src="<?php echo $row['照片']; ?>" width="100px" height="120px">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">性别：</label>
           <div class="controls">
              <label class="radio-pretty inline <?php if($row['性别']=='1'){echo 'checked';}?>">
              <input type="radio" value="1" checked="checked" name="xsXingbie"><span>男</span>
            </label>
            <label class="radio-pretty inline <?php if($row['性别']=='0'){echo 'checked';}?>">
              <input type="radio" value="0" name="xsXingbie"><span>女</span>
            </label>
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">出生日期：</label>
           <div class="controls">
             <input id="kcTime" name="xsTime" class="input-large input-fat" type="text" placeholder="请输入课程时间" value="<?php echo $row['出生日期']; ?>">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">电话：</label>
           <div class="controls">
             <input id="xsDianhua" name="xsDianhua" class="input-large input-fat" type="text" placeholder="请输入电话" value="<?php echo $row['电话']; ?>" data-rules="required|minlength=11|maxlength=11">
             <span id="tishi"></span>
           </div>
      </div>
 			<div class="control-group">
 				<label class="control-label"></label>
 				<div class="controls">
 					<input type="submit" value="修改" name="" class="sui-btn btn-large btn-primary">
 				</div>
 			</div>
  			</form>
      </div>
</div>
  </div> 
<?php include("foot.php") ?>
<script>
  var xsBhao = document.getElementById("xsBhao");
  var xsDianhua = document.getElementById('xsDianhua');
  var tishi = document.getElementById('tishi');
  var reg1 = /(^1[3|5|8|4|7][0-9]{9}$)/g;
  xsBhao.onblur = function(){
    xsBhao.value = xsBhao.value.toUpperCase();
  }
  xsDianhua.onchange = function(){
    if (reg1.test(this.value)) {
      tishi.innerHTML = "号码正确";
    }else{
      tishi.innerHTML = "号码无效";
    }
  }
</script>
