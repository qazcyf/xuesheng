  <?php 
  include("head.php");
  include("conn.php");
  $sql = "select distinct * from ke_cheng";
  $result = mysqli_query($conn, $sql);
  ?>
  <div class="sui-container">
    <div class="sui-layout">
      <div class="sidebar">
      <!-- 左菜单 -->
      <?php include("menuleft.php")?>
      </div>
      <div class="content">
        <p class="sui-text-xxlarge">成绩查询</p>
        <form id="form1" action="xuesheng-xinxi-chaxun-upade.php" method="post" class="sui-form form-horizontal sui-validate">
        <div class="control-group">
          <label class="control-label" for="inputEmail">姓名：</label>
           <div class="controls">
             <input id="xingMing" name="xingMing" class="input-large input-fat" type="text" placeholder="请输入学号" data-rules="minlength=2|maxlength=10">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">学号：</label>
           <div class="controls">
             <input id="xueHao" name="xueHao" class="input-large input-fat" type="text" placeholder="请输入学号" data-rules="minlength=2|maxlength=10">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">课程名</label>
           <div class="controls">
             <select id="keCheng" name="keCheng">
            <?php
            if( mysqli_num_rows($result) > 0 ){
              while ( $row = mysqli_fetch_assoc($result) ) {
                echo "<option value='{$row['课程编号']}'>{$row['课程名']}</option>";
              }
            }else{
              echo "<option value=''>请先添加课程信息</option>";
            }
             ?>       
           </select>
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
