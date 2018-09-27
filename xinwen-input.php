  <?php 
  include("head.php");
  include("conn.php");
  $sql = "select distinct * from newscolumn";
  $result = mysqli_query($conn, $sql);
  ?>
  <div class="sui-container">
    <div class="sui-layout">
      <div class="sidebar">
      <!-- 左菜单 -->
      <?php include("menuleft.php")?>
      </div>
      <div class="content">
        <p class="sui-text-xxlarge">新闻发布</p>
        <form id="form1" action="xinwen-save.php" method="post" class="sui-form form-horizontal sui-validate" enctype="multipart/form-data">
        <div class="control-group">
          <label class="control-label" for="inputEmail">标题：</label>
           <div class="controls">
             <input id="xwBiaoti" name="xwBiaoti" class="input-large input-fat" type="text" placeholder="请输入标题" data-rules="required">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">肩题：</label>
           <div class="controls">
             <input id="xwJianti" name="xwJianti" class="input-large input-fat" type="text" placeholder="请输入肩题">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">照片：</label>
           <div class="controls">
             <input type="file" name="file" />
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">内容：</label>
           <div class="controls">
             <textarea name="xwNeirong" id="" cols="30" rows="5"></textarea>
           </div>
      </div>
      <div class="control-group">
          <label for="inputEmail" class="control-label">发布时间：</label>
          <div class="controls">
            <input type="text" id="shiJian" name="shiJian" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入发布时间">
          </div>
      </div> 
      <div class="control-group">
          <label class="control-label" for="inputEmail">作者：</label>
          <div class="controls">
            <input type="text" readonly= "true" id="xwZuozhe" name="xwZuozhe" class="input-large input-fat" value="<?php echo $_SESSION['usname']?>" placeholder="输入发布时间">
          </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">栏目：</label>
           <div class="controls">
             <select id="lammuid" name="lammuid">
              <?php
              if( mysqli_num_rows($result) > 0 ){
                while ( $row = mysqli_fetch_assoc($result) ) {
                  echo "<option value='{$row['name']}'>{$row['name']}</option>";
                }
              }else{
                echo "<option value=''>请先添加班级信息</option>";
              }
               ?>       
             </select>
           </div>
      </div> 
      <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
          <input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary" id="tijiao">
        </div>
      </div>
        </form>
      </div>
</div>
  </div>
<?php include("foot.php")?>
<script>
  
  $("#xwZuozhe").on('click',function(){
    console.log($("#xwZuozhe").val());
  })
</script>

