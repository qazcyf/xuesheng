  <?php 
  include("head.php");
  include("conn.php");
  $sql = "select distinct 课程编号 from ke_cheng";
  $result = mysqli_query($conn, $sql);
  ?>
  <div class="sui-container">
    <div class="sui-layout">
      <div class="sidebar">
      <!-- 左菜单 -->
      <?php include("menuleft.php")?>
      </div>
      <div class="content">
        <p class="sui-text-xxlarge">成绩录入</p>
        <form id="form1" action="chengji-save.php" method="post" class="sui-form form-horizontal sui-validate">
        <div class="control-group">
          <label class="control-label" for="inputEmail">学号：</label>
           <div class="controls">
             <input id="cjXhao" name="cjXhao" class="input-large input-fat" type="text" placeholder="请输入学号" data-rules="required|minlength=2|maxlength=10">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">课程编号：</label>
           <div class="controls">
            <input type="hidden" value="" name="cjBhao" id="cjLuru">
             <select id="duoxuan">
            <?php
            if( mysqli_num_rows($result) > 0 ){
              while ( $row = mysqli_fetch_assoc($result) ) {
                echo "<option value='{$row['课程编号']}'>{$row['课程编号']}</option>";
              }
            }else{
              echo "<option value=''>请先添加课程编号</option>";
            }
             ?>       
           </select>
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">成绩：</label>
           <div class="controls">
             <input id="cjCj" name="cjCj" class="input-fat" type="text" placeholder="请输入成绩">
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
<script>
  var cjLuru = document.getElementById('cjLuru');
  var duoxuan = document.getElementById('duoxuan');
  var danxuan = document.getElementsByClassName("danxuan");
  cjLuru.value = duoxuan.value;
  duoxuan.onchange = function(){
    cjLuru.value = this.value.toUpperCase();
  }
</script>

