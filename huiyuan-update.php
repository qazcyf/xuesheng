<?php include("head.php") ?>   
  
  <?php 
    $kid = empty($_GET['kid'])?"null":$_GET['kid'];
    echo $kid;
    if ($kid == "null") {
      die("请选择要修改的记录");
    }else{
      include("conn.php");
      // 找到课程编号是kid的这行代码
      $sql ="select * from user where id =".$kid;
      $result = mysqli_query($conn2,$sql);
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
      <p class="sui-text-xxlarge my-padd">会员修改</p>
      <form class="sui-form form-horizontal sui-validate" action="huiyuan-save.php" method="post" id="form1">
        <div class="control-group">
          <label for="inputEmail" class="control-label">邮箱：</label>

          <div class="controls">  
          <!-- 曾加一个隐藏的div，用来区分新增数据还是修改数据 -->
            <input type="hidden" value="<?php echo $row['id']; ?>" name="kid">

            <input type="text" value="<?php echo $row['email']; ?>" id="huYouxiang" name="huYouxiang" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=10">
          </div>
        </div>
        <div class="control-group">
          <label for="inputEmail" class="control-label">名字：</label>
          <div class="controls">
            <input type="text" id="hyName" name="hyName" class="input-large input-fat" placeholder="输入名字" value="<?php echo $row['name']; ?>">
          </div>
        </div> 
        <div class="control-group">
          <label for="inputEmail" class="control-label">密码：</label>
          <div class="controls">
            <input type="text" id="hyMima" name="hyMima" class="input-large input-fat" placeholder="输入名字" value="<?php echo $row['password']; ?>">
          </div>
        </div>  
        <div class="control-group">
          <label for="inputEmail" class="control-label">密码提示问题：</label>
          <div class="controls">
            <input type="text" id="hyMimawenti" name="hyMimawenti"  class="input-large input-fat"  placeholder="输入名字" value="<?php echo $row['question']; ?>">
          </div>
        </div>  
        <div class="control-group">
          <label for="inputEmail" class="control-label">忘记密码答案：</label>
          <div class="controls">
            <input type="text" id="hyMimawenti" name="hyMimawenti"  class="input-large input-fat"  placeholder="输入名字" value="<?php echo $row['answer']; ?>">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label"></label>
          <div class="controls">
            <input type="submit" value="修改" name="" class="sui-btn btn-large btn-primary">
          </div>
        </div>    
      </form>
      </div>
    </div>    
<?php include("foot.php") ?>
