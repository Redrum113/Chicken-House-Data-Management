<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
if(isset($_POST["submit"])){
    checkLogin($_POST["username"],$_POST["password"]);
}
?>
<body class="">
  
  <div class="wrapper ">
    <?php
    require_once("menu.php");
    ?>
    <div class="main-panel">
      <?php
      require_once("nav.php");
      ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row" >
            <div class="col-md-6" style="margin-left:25%;">
              <div class="card">
                <div class="header">
                  <h4 class="title"></h4>
                  <p class="category"></p>
                </div>
                <div class="content">
                  <div class="content">
                    <form name="login-form" action="" method="post">
                      <div style="float:left;margin-left:30px;">
                        <img src="image/login.png" style="width:150px;height:150px;">
                      </div>

                      <div class="row" style="margin-left:230px;">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label>ชื่อผู้ใช้งาน <span style="color:red">*</span></label>
                            <input class="form-control border-input" placeholder="Username" value="" type="text" name="username" id="username">
                          </div>
                          <div class="form-group">
                            <label>รหัสผ่าน <span style="color:red">*</span></label>
                            <input class="form-control border-input" placeholder="Password" value="" type="password" name="password" id="password" invalid>
                          </div>
                          <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-info">เข้าสู่ระบบ</button>
                            
                          </div>

                        </div>
                      </div>
                      
                      <div class="clearfix"></div>
                    </form>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
      require_once("footer.php");
      ?>

    </div>
  </div>


</body>

</html>
