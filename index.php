<?php include("head2.php")?>
	<div id="top"><p class="gray"><a href="#">用户注册</a></p><p><a href="yonghu-denglu.php">用户登录</a></p></div>
	<div id="box">
		<div id="bos">
			<form class="sui-form form-horizontal sui-validate" id="form1" >
			  	<div class="control-group">
	    			<label class="control-label" for="inputEmail">用户邮件：</label>
	   				 <div class="controls">
	     				 <input id="youjian" name="youjian" class="input-large input-fat" type="text" placeholder="请输入用户邮件" data-rules="required" class="inputs">
	     				 <span id="chongfu"></span>
	   				 </div>
	 			</div>
	 			<div class="control-group">
	    			<label class="control-label" for="inputEmail">用户名：</label>
	   				 <div class="controls">
	     				 <input id="yonghuming" name="yonghuming" class="input-large input-fat" type="text" placeholder="请输入用户名" class="inputs">
	   				 </div>
	 			</div>
	 			<div class="control-group">
	    			<label class="control-label" for="inputEmail">密码：</label>
	   				 <div class="controls">
	     				 <input id="mima" name="mima" class="input-large input-fat" type="text" placeholder="请输入密码" class="inputs">
	   				 </div>
	 			</div>
	 			<div class="control-group">
	    			<label class="control-label" for="inputEmail">重复密码：</label>
	   				 <div class="controls">
	     				 <input id="congmima" name="congmima" class="input-large input-fat" type="text" placeholder="请输入密码">
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
	    			<label class="control-label" for="inputEmail">密码提示问题：</label>
	   				 <div class="controls">
	     				<select name="wenti" id="wenti" class="inputs">
	     					<option>你的小学在哪里上？</option>
	     					<option>你的最好朋友的姓名？</option>
	     					<option>你的最有纪念意义的日期？</option>
	           			</select>
	   				 </div>
	 			</div>
	 			<div class="control-group">
	    			<label class="control-label" for="inputEmail">密码答案：</label>
	   				 <div class="controls">
	     				 <input id="daan" name="daan" class="input-large input-fat" type="text" placeholder="请输入密码答案" class="inputs">
	   				 </div>
	 			</div>
	 			<div class="control-group">
	 				<label class="control-label"></label>
	 				<div class="controls">
	 					<input type="button" id="tijiao" value="提交" name="" class="sui-btn btn-large btn-primary">
	 				</div>
 				</div>
			</form>
		</div>
	</div>
<?php include("food2.php")?>
<script>
var email = document.getElementById('youjian');
var names = document.getElementById('yonghuming');
var password = document.getElementById('mima');
var question = document.getElementById('wenti');
var answer = document.getElementById('daan');
$(function(){
	$("#yzma").on("blur",function(){
		if (parseInt(this.value) == parseInt($("#yanzheng").text())) {
			$("#yanzhengs").text("输入正确");
		}else{
			$("#yanzhengs").text("输入错误");
		}
	})
	$("#youjian").on('blur',function(){
		$.ajax({
			url  : "register-save.php",
			type : "POST",
			data : $("#form1").serialize(),
			dataType:"json",
			beforeSend:function(){
				//发送前调用此函数。一般在此编写检测代码或者loading
			},
			complete : function(XMLHttpRequest,textStatus){
				//请求完成后调用此函数(请求成功或失败都调用)
			},
			success: function(data,textStatus){
				//请求成功后调用此函数
				$("#chongfu").html(data.data);
			},
			error : function(XMLHttpRequest,textStatus,errorThrown){
				//请求失败后调用此函数
				console.log("失败原因" + errorThrown);
			}

		})
	})
	$('#tijiao').on("click",function(){
		$.ajax({
			url  : "index-save.php",
			type : "POST",
			data : $("#form1").serialize(),
			dataType:"json",
			beforeSend:function(){
				//发送前调用此函数。一般在此编写检测代码或者loading
			},
			complete : function(XMLHttpRequest,textStatus){
				//请求完成后调用此函数(请求成功或失败都调用)
			},
			success: function(data,textStatus){
				//请求成功后调用此函数
				// $("#chongfu").html(data.data);
				if (data.code == 200) {
			        alert(data.data);
			        window.location.href = "yonghu-denglu.php";
			    }
			    if (data.code == 207) {
			        alert(data.data);
			    }
			}, 
			error : function(XMLHttpRequest,textStatus,errorThrown){
				//请求失败后调用此函数
				console.log("失败原因" + errorThrown);
			}

		})
	})
})
</script>