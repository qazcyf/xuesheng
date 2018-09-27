<?php include("head2.php")?>
	<div id="tops">忘记密码页</div>
	<div id="box">
		<div id="bos">
			<form class="sui-form form-horizontal sui-validate" action="wangji-mima-save.php" method="post">
			  	<div class="control-group">
	    			<label class="control-label" for="inputEmail">用户邮件：</label>
	   				 <div class="controls">
	     				 <input id="youjian" name="youjian" class="input-large input-fat" type="text" placeholder="请输入用户邮件" data-rules="required">
	     				 <span>用户邮件不能重复</span>
	   				 </div>
	 			</div>
	 			<div class="control-group">
	    			<label class="control-label" for="inputEmail">密码提示问题：</label>
	   				 <div class="controls">
	     				<select name="wenti">
	     					<option>你的小学在哪里上？</option>
	     					<option>你的最好朋友的姓名？</option>
	     					<option>你的最有纪念意义的日期？</option>
	           			</select>
	   				 </div>
	 			</div>
	 			<div class="control-group">
	    			<label class="control-label" for="inputEmail">密码答案：</label>
	   				 <div class="controls">
	     				 <input id="daan" name="daan" class="input-large input-fat" type="text" placeholder="请输入密码答案">
	   				 </div>
	 			</div>
	 			<div class="control-group">
	    			<label class="control-label" for="inputEmail">验证码：</label>
	   				 <div class="controls">
	     				 <input id="yzma" name="yzma" class="input-mediuml input-fat" type="text" placeholder="请输入验证码">
	     				 <span id="yanzheng">
	     				 <?php
	     				 	echo rand(0,9);echo rand(0,9);echo rand(0,9);echo rand(0,9);
	     				 ?></span>
	     				 <span id="yanzhengs"></span>
	   				 </div>
	 			</div>
	 			<div class="control-group">
	 				<label class="control-label"></label>
	 				<div class="controls">
	 					<input type="submit" value="登录" name="" class="sui-btn btn-large btn-primary">
	 				</div>
	 			</div>
			</form>
		</div>
	</div>
</body>
<?php include("food2.php")?>
<script>
$(function(){
	$("#yzma").on("blur",function(){
		if (parseInt(this.value) == parseInt($("#yanzheng").text())) {
			$("#yanzhengs").text("输入正确");
		}else{
			$("#yanzhengs").text("输入错误");
		}
	})
})
</script>