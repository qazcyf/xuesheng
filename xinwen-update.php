<?php include("head.php") ?>   
  
  <?php 
    $kid = empty($_GET['kid'])?"null":$_GET['kid'];
    echo $kid;
    if ($kid == "null") {
      die("请选择要修改的记录");
    }else{
      include("conn.php");
      // 找到课程编号是kid的这行代码
      $sql ="select * from news where id =".$kid;
      $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result) > 0 ) {
        // 将查询的结果转换为下列数组
        $row = mysqli_fetch_assoc($result);
      }else{
          echo "没有数据";
      }
      $sql2 = "select distinct * from user";
      $result2 = mysqli_query($conn2, $sql2);
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
      <p class="sui-text-xxlarge my-padd">新闻修改</p>
      <form class="sui-form form-horizontal sui-validate" action="xinwen-save.php" method="post" id="form1" enctype="multipart/form-data">
        <div class="control-group">
          <label for="inputEmail" class="control-label">标题：</label>

          <div class="controls">  
          <!-- 曾加一个隐藏的div，用来区分新增数据还是修改数据 -->
            <input type="hidden" value="update" name="action">

            <input type="hidden" value="<?php echo $row['id']; ?>" name="kid">

            <input type="text" value="<?php echo $row['标题']; ?>" id="xwBiaoti" name="xwBiaoti" class="input-large input-fat" placeholder="输入课程名称" data-rules="required">
          </div>
        </div>
        <div class="control-group">
          <label for="inputEmail" class="control-label">肩题：</label>
          <div class="controls">
            <input type="text" id="xwJianti" name="xwJianti" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入肩题" value="<?php echo $row['肩题']; ?>">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputEmail">照片：</label>
           <div class="controls">
             <input type="file" name="file" />
             <input type="hidden" name="tupain" value="<?php echo $row['图片']; ?>">
             <img src="<?php echo $row['图片']; ?>" width="100px" height="120px">
           </div>
        </div> 
        <div class="control-group">
         <label class="control-label" for="inputEmail">内容：</label>
          <div class="controls">
            <textarea name="xwNeirong" id="" cols="30" rows="5" value=""><?php echo $row['内容']; ?></textarea>
          </div>
        </div>  
       <div class="control-group">
          <label for="inputEmail" class="control-label">发布时间：</label>
          <div class="controls">
            <input type="text" id="shiJian" name="shiJian" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入发布时间" value="<?php echo $row['发布时间']; ?>">
          </div>
        </div>   
        <div class="control-group">
          <label class="control-label" for="inputEmail">作者：</label>
           <div class="controls">
             <input type="text" readonly= "true" id="xwZuozhe" name="xwZuozhe" class="input-large input-fat" value="<?php echo $_SESSION['usname']?>" placeholder="输入发布时间">
          </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputEmail">栏目</label>
             <div class="controls">
               <input id="lammuid" name="lammuid" class="input-large input-fat" type="text" placeholder="请输入栏目id" value="<?php echo $row['cloumnid']; ?>">
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
