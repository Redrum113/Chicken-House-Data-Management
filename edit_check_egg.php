<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<!-- jQuery library -->

<?php

$currentHouse = getCurrentHouse($_SESSION["house_id"]);
$yThai = date("Y") + 543;
$dateNow = $yThai . date("-m-d");

if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    foreach ($_SESSION["chair"] as $keys => $values) {
      if ($values == $_GET["id"]) {
        unset($_SESSION["chair"][$keys]);
        echo '<script>alert("ยืนยันการลบ")</script>';
        echo '<script>window.history.go(-1)</script>';
      }
    }
  }
}
if (isset($_GET['clear'])) {
  unset($_SESSION["chair"]);
  echo '<script>window.history.go(-1)</script>';
}
?>
<?php
//print_r($_SESSION['chair']);
//die();

if (isset($_POST["submit"])) {

  $coop_number = $_POST["coop_number"];
  $amount_egg = $_POST["amount_egg"];


  confirmKeepEgg($_POST["houses_id"], $coop_number, $amount_egg, $_POST["date_keep"], $_POST["users_keep_id"]);
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
          <form name="prduct_detail_form" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="houses_id" id="house_id" value="<?php echo $_SESSION['house_id']; ?>">
            <input type="hidden" class="form-control" name="date_keep" id="date_keep" value="<?php echo $dateNow; ?>">
            <input type="hidden" class="form-control" name="users_keep_id" id="users_keep_id" value="<?php echo $_SESSION['id']; ?>">
            <div class="row">

              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">รายละเอียดการเก็บ <?php echo $currentHouse["house_name"]; ?></h4>
                  </div>
                  <div class="card-body">

                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-condensed">
                          <thead>
                            <tr>
                              <td>รายการ</td>
                              <td>กรง</td>
                              <td>จำนวนไข่</td>
                              <td></td>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if (!empty($_SESSION["chair"])) {
                              $total = 0;
                              $i = 0;
                              $j = 1;
                              $a = 0;
                              $b = 0;
                              $total_price = 0;
                              foreach ($_SESSION["chair"] as $keys => $values) {

                            ?>
                                <tr>
                                  <td>
                                    <p><?php echo $j++; ?></p>
                                  </td>
                                  <td>
                                    <input type="hidden" class="form-control" name="coop_number[]" id="coop_number" value="<?php echo $values; ?>" >
                                    <?php echo $values; ?>
                                    <?php $ar = substr($values, 0, 1); ?>
                                  </td>
                                  <td class="cart_delete" style="text-align:center;">
                                    <input type="number" class="form-control" name="amount_egg[]" id="amount_egg" min="0" value="1" pattern="0-9" >
                                  </td>
                                  <td class="cart_delete" style="text-align:center;">
                                    <a href="?action=delete&id=<?php echo $values; ?>" class="cart_quantity_delete"><i class="fa fa-times"></i></a>
                                  </td>
                                </tr>
                                <?php $i++; ?>
                              <?php } ?>
                            <?php } ?>

                          </tbody>
                        </table>
                      </div>

                    </div>

                    <!--<div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Edited By </label>
                          
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"><?php //echo $currentEmployee["firstname"];
                                                            ?> <?php //echo $currentEmployee["lastname"];
                                                                                                          ?></label>
                          
                        </div>
                      </div>
                    </div>-->

                    <div class="clearfix"></div>
                    <div align="center">

                      <input type="submit" name="submit" class="btn btn-success btn-round" value="บันทึก">
                      <!--<input type="button" name="botton" class="btn btn-warning btn-round" onClick="javascript:history.go(-1)" value="Back">-->
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </form>

        </div>
      </div>



      <?php
      require_once("footer.php");
      ?>

    </div>
  </div>


</body>

</html>