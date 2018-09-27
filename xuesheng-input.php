	<?php 
  include("head.php");
  include("conn.php");
  $sql = "select distinct 班号 from ban_ji";
  $result = mysqli_query($conn, $sql);
  ?>
	<div class="sui-container">
		<div class="sui-layout">
  		<div class="sidebar">
  		<!-- 左菜单 -->
			<?php include("menuleft.php")?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge">学生录入</p>
  			<form id="form1" action="xuesheng-save.php" method="post" class="sui-form form-horizontal sui-validate" enctype="multipart/form-data">
  			<div class="control-group">
    			<label class="control-label" for="inputEmail">学号：</label>
   				 <div class="controls">
     				 <input id="xsXhao" name="xsXhao" class="input-large input-fat" type="text" placeholder="请输入学号" data-rules="required|minlength=5|maxlength=5">
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">班号：</label>
   				 <div class="controls">
            <input type="hidden" value="" name="xsBhao" id="xsBhao">
     				 <select id="duoxuan">
            <?php
            if( mysqli_num_rows($result) > 0 ){
              while ( $row = mysqli_fetch_assoc($result) ) {
                echo "<option value='{$row['班号']}'>{$row['班号']}</option>";
              }
            }else{
              echo "<option value=''>请先添加班级信息</option>";
            }
             ?>       
           </select>
   				 </div>
 			</div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">姓名：</label>
           <div class="controls">
             <input id="xsXingming" name="xsXingming" class="input-large input-fat" type="text" placeholder="请输入姓名">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">照片：</label>
           <div class="controls">
             <input type="file" name="file" />
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">性别：</label>
           <div class="controls">
             <label class="radio-pretty inline checked danxuan">
              <input type="radio" value="1" checked="checked" name="xsXingbie"><span>男</span>
            </label>
            <label class="radio-pretty inline danxuan">
              <input type="radio" value="0" name="xsXingbie"><span>女</span>
            </label>
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">出生日期：</label>
           <div class="controls">
             <input id="kcTime" name="xsTime" class="input-large input-fat" type="text" placeholder="请输入课程时间">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">电话：</label>
           <div class="controls">
             <input id="xsDianhua" name="xsDianhua" class="input-large input-fat" type="text" placeholder="请输入电话" data-rules="required|minlength=11|maxlength=11">
             <span id="tishi"></span>
           </div>
      </div>
 			<div class="control-group">
 				<label class="control-label"></label>
 				<div class="controls">
 					<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary" id="tijiao">
 				</div>
 			</div>
  			</form>
  		</div>
</div>
	</div>
<?php include("foot.php")?>
<script>
  var xsBhao = document.getElementById('xsBhao');
  var duoxuan = document.getElementById('duoxuan');
  var xsDianhua = document.getElementById('xsDianhua');
  var tishi = document.getElementById('tishi');
  var reg1 = /(^1[3|5|8|4|7][0-9]{9}$)/g;
  xsBhao.value = duoxuan.value;
  duoxuan.onchange = function(){
    xsBhao.value = this.value.toUpperCase();
  }
  xsDianhua.onchange = function(){
    if (reg1.test(this.value)) {
      tishi.innerHTML = "号码正确";
    }else{
      tishi.innerHTML = "号码无效";
    }
  }
</script>

