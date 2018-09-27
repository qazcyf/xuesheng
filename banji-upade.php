<?php include("head.php") ?>   

  <?php 
    $kid = empty($_GET['kid'])?"null":$_GET['kid'];
    if ($kid == "null") {
      die("请选择要修改的记录");
    }else{
      include("conn.php");
      // 找到课程编号是kid的这行代码
      $sql ="select * from ban_ji where 班号 = '{$kid}'";
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
      <p class="sui-text-xxlarge my-padd">班级修改</p>
      <form class="sui-form form-horizontal sui-validate" action="banji-save.php" method="post" id="form1">
        <input type="hidden" value="update" name="action">
        <input type="hidden" value="<?php echo $row['班号']; ?>" name="kid">
        <div class="control-group">
          <label class="control-label" for="inputEmail">班号：</label>
           <div class="controls">
             <input id="bh" name="bh" class="input-large input-fat" type="text" placeholder="请输入课程编号" value="<?php echo $row['班号']; ?>">
           </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputEmail">班长：</label>
           <div class="controls">
             <input id="bz" name="bz" class="input-large input-fat" type="text" placeholder="请输入班长" value="<?php echo $row['班长']; ?>">
           </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputEmail">教室：</label>
           <div class="controls">
             <input id="js" name="js" class="input-large input-fat" type="text" placeholder="请输入教室" value="<?php echo $row['教室']; ?>">
           </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputEmail">班主任：</label>
           <div class="controls">
             <input id="bzr" name="bzr" class="input-large input-fat" type="text" placeholder="请输入班主任" value="<?php echo $row['班主任']; ?>">
           </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputEmail">班级口号：</label>
           <div class="controls">
             <input id="bjkh" name="bjkh" class="input-large input-fat" type="text" placeholder="请输入班级口号" value="<?php echo $row['班级口号']; ?>">
           </div>
        </div>
        <div class="control-group">
          <label class="control-label"></label>
          <div class="controls">
            <input type="submit" value="修改" name="" class="sui-btn btn-large btn-primary">
          </div>
        </div>
        </div> 
      </form>
      </div>
    </div>    
<?php include("foot.php") ?>
