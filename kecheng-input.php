	<?php include("head.php")?>
	<div class="sui-container">
		<div class="sui-layout">
  		<div class="sidebar">
  		<!-- 左菜单 -->
			<?php include("menuleft.php")?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge">课程录入</p>
  			<form id="form1" action="kengcheng-save.php" method="post" class="sui-form form-horizontal sui-validate">
  			<div class="control-group">
    			<label class="control-label" for="inputEmail">课程名：</label>
   				 <div class="controls">
     				 <input id="kcname" name="kcname" class="input-large input-fat" type="text" placeholder="请输入课程名称" data-rules="required|minlength=2|maxlength=10">
   				 </div>
 			</div>
 			<div class="control-group">
          <label for="inputEmail" class="control-label">课程时间：</label>
          <div class="controls">
            <input type="text" id="kcTime" name="kcTime" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入课程时间">
          </div>
        </div> 
 			<div class="control-group">
 				<label class="control-label"></label>
 				<div class="controls">
 					<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
 				</div>
 			</div>
  			</form>
  		</div>
</div>
	</div>
<?php include("foot.php")?>

