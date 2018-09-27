  <?php include("head.php")?>
  <div class="sui-container">
    <div class="sui-layout">
      <div class="sidebar">
      <!-- 左菜单 -->
      <?php include("menuleft.php")?>
      </div>
      <div class="content">
        <p class="sui-text-xxlarge">班级录入</p>
        <form  id="form2" class="sui-form form-horizontal sui-validate" action="xuesheng-xinxi-chaxun-save.php" method="post">
        <div class="control-group">
          <label class="control-label" for="inputEmail">姓名：</label>
           <div class="controls">
             <input id="xingming" name="xingming" class="input-large input-fat" type="text" placeholder="请输入姓名" data-rules="minlength=2|maxlength=5">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">学号：</label>
           <div class="controls">
             <input id="xuehao" name="xuehao" class="input-large input-fat" type="text" placeholder="请输入学号">
           </div>
      </div>
      <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
          <input type="submit" value="查询" name="" class="sui-btn btn-large btn-primary">
        </div>
      </div>
        </form>
      </div>
</div>
  </div>
<?php include("foot.php")?>