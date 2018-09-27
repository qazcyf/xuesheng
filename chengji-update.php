<?php include("head.php") ?>   

  <?php 
    $kid = empty($_GET['kid'])?"null":$_GET['kid'];
    if ($kid == "null") {
      die("请选择要修改的记录");
    }else{
      include("conn.php");
      // 找到课程编号是kid的这行代码
      $sql ="select * from xuan_xiu where 学号 = '{$kid}'";
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
      <p class="sui-text-xxlarge my-padd">课程修改</p>
      <form class="sui-form form-horizontal sui-validate" action="chengji-save.php" method="post" id="form1">
        <input type="hidden" value="update" name="action">
        <input name="cjXhao" type="hidden" placeholder="请输入学号" value="<?php echo $row['学号']; ?>" >
        <div class="control-group">
          <label class="control-label" for="inputEmail">课程编号：</label>
           <div class="controls">
             <input id="cjBhao" name="cjBhao" class="input-large input-fat" type="text" placeholder="请输入课程编号" value="<?php echo $row['课程编号']; ?>">
           </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputEmail">成绩：</label>
           <div class="controls">
             <input id="cjCj" name="cjCj" class="input-large input-fat" type="text" placeholder="请输入成绩" value="<?php echo $row['成绩']; ?>">
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
