<?php include("head2.php")?>
  <div id="top"><p><a href="index.php">用户注册</a></p><p class="gray"><a href="#">用户登录</a></p></div>
  <div id="box">
    <div id="bos">
      <form class="sui-form form-horizontal" id="form1" action="yonghu-denglu-save.php" method="post">
          <div class="control-group">
            <label class="control-label" for="inputEmail">用户邮件：</label>
             <div class="controls">
               <input id="youjian" name="youjian" class="input-large input-fat" type="text" placeholder="请输入用户邮件" data-rules="required">
               <span>用户ID不能重复</span>
             </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputEmail">密码：</label>
             <div class="controls">
               <input id="yonghuming" name="yonghuming" class="input-large input-fat" type="text" placeholder="请输入密码">
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
        <div class="control-group">
          <label class="control-label"></label>
          <div class="controls">
            <a href="wangji-mima.php">忘记密码</a>
          </div>
        </div>
      </form>
      <div id="dengluwancheng">
        成功登录
      </div>
    </div>
  </div>
<?php include("food2.php")?>
<script>
$("input[type=submit]").on("click",function(){
  $.ajax({
    url     : "login-save-ajax.php",
    type    : "POST",
    data    : $("#form1").serialize(),
    dataType: "json",
    /*beforeSend : function(XMLHttpRequest){
      // 发送前调用此函数，一般在此编写检测代码或者loading
    },
    complete: function(XMLHttpRequest,textStatus){
      // 请求完成后调用此函数(请求成功或失败都调用);
    },*/
    success : function(data,textStatus){
      // 请求成功后调用此函数
      if (data.code == 200) {
        $("#dengluwancheng").animate({"opacity":"1","border":"5px solid blue","font-size":"50px"},1000,function(){
          window.location.href = "index2.php";
        });
      }
      if (data.code == 20001) {
        alert(data.msg);
      }
      if (data.code == 20004) {
        alert(data.msg);
      }
    },
    error   : function(XMLHttpRequest,textStatus,errorThrown){
      // 请求失败后调用此函数
      console.log("失败原因：" + errorThrown);
    }
  });
  return false;
})
</script>