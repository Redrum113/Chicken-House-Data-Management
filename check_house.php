<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php

$currentHouse = getCurrentHouse($_GET["houses_id"]);
$yThai = date("Y") + 543;
$dateNow = $yThai . date("-m-d");
$showtime = date("d/m/") . $yThai;
$dateshow = date("d/m/") . $yThai;

if (isset($_POST["submit"])) {
  $chair = $_POST["chair"];
  //print_r($chair);
  //die();
  $_SESSION["house_id"] = $_POST["house_id"];
  $_SESSION["chair"] = $chair;
  echo ("<script language='JavaScript'>
    window.location.href='edit_check_egg.php';
    </script>");
  //editProfile($_POST["id"],$_POST["firstname"],$_POST["lastname"],$_POST["address"],$_POST["gender"],$_POST["telephone"],$_POST["email"],$_POST["status"],$_POST["username"],$_POST["password"],$_FILES["profile"]["name"]);


}


?>
<style>
  .nopad {
    padding-left: 0 !important;
    padding-right: 0 !important;
  }

  /*image gallery*/
  .image-checkbox {
    cursor: pointer;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    border: 4px solid transparent;
    margin-bottom: 0;
    outline: 0;
  }

  .image-checkbox input[type="checkbox"] {
    display: none;
  }

  .image-checkbox-checked {
    border-color: #4783B0;
    width: 60px;
    height: 60px;
  }

  .image-checkbox .fa {
    position: absolute;
    color: #4A79A3;
    background-color: #fff;
    padding: 10px;
    top: 0;
    right: 0;
  }

  .image-checkbox-checked .fa {
    display: block !important;
  }

  .dot1 {
    height: 25px;
    width: 25px;
    border-style: solid;
    background-color: #5FFF49;
    border-radius: 50%;
    display: inline-block;
  }

  .dot2 {
    height: 25px;
    width: 25px;
    border-style: solid;
    background-color: #EBF055;
    border-radius: 50%;
    display: inline-block;
  }

  .dot3 {
    height: 25px;
    width: 25px;
    border-style: solid;
    background-color: #F71B1B;
    border-radius: 50%;
    display: inline-block;
  }
</style>

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
            <input type="hidden" class="form-control" name="house_id" value="<?php echo $_GET["houses_id"]; ?>">
            <div class="row">

              <div class="col-md-9">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h3 class="card-title">โรงเรือนที่ : <?php echo $currentHouse["house_name"]; ?></h3>
                    <h5>วันที่ : <?php echo $dateshow; ?></h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12" align="left">
                        <h3>วันที่ : <?php echo $showtime; ?></h3>
                      </div>
                      <div class="col-md-12" align="right">
                        <table>
                          <tr>
                            <td><span class="dot1"></span> กรงที่มีไก่</td>
                          </tr>
                          <tr>
                            <td><span class="dot2"></span> กรงที่ว่าง</td>
                          </tr>
                          <tr>
                            <td><span class="dot3"></span> กรงที่เก็บไข่ไปแล้ว</td>
                          </tr>
                        </table>
                      </div>
                    </div>

                    <br>

                    <div class="row">

                      <div class="col-md-12" align="center">
                        <table style="width:100%">
                          <!-- แถวแรก -->
                          <tr>
                            <?php for ($a = 1; $a <= 5; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>

                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>



                            <?php } ?>

                            <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                            <?php for ($a = 6; $a <= 10; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>
                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>

                            <?php } ?>
                          </tr>
                          <!-- แถวแรก -->
                          <!-- แถวแรก -->
                          <tr>
                            <?php for ($a = 11; $a <= 15; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>
                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>
                            <?php } ?>

                            <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                            <?php for ($a = 16; $a <= 20; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>
                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>

                            <?php } ?>
                          </tr>
                          <!-- แถวแรก -->
                          <!-- แถวแรก -->





                          <tr>
                            <?php for ($a = 21; $a <= 25; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>
                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>
                            <?php } ?>

                            <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                            <?php for ($a = 26; $a <= 30; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>
                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>

                            <?php } ?>


                          </tr>
                          <!-- แถวแรก -->



                          <tr>
                            <?php for ($a = 31; $a <= 35; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>

                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>
                            <?php } ?>

                            <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                            <?php for ($a = 36; $a <= 40; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>
                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>

                            <?php } ?>
                          </tr>


                          <tr>
                            <?php for ($a = 41; $a <= 45; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>

                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>
                            <?php } ?>

                            <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                            <?php for ($a = 46; $a <= 50; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>
                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>

                            <?php } ?>
                          </tr>




                          <tr>
                            <?php for ($a = 51; $a <= 55; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>

                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>
                            <?php } ?>

                            <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                            <?php for ($a = 56; $a <= 60; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>
                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>

                            <?php } ?>
                          </tr>



                          <tr>
                            <?php for ($a = 61; $a <= 65; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>

                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>
                            <?php } ?>

                            <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                            <?php for ($a = 66; $a <= 70; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>
                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>

                            <?php } ?>
                          </tr>


                          <tr>
                            <?php for ($a = 71; $a <= 75; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>

                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>
                            <?php } ?>

                            <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                            <?php for ($a = 76; $a <= 80; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>
                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>

                            <?php } ?>
                          </tr>



                          <tr>
                            <?php for ($a = 81; $a <= 85; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>

                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>
                            <?php } ?>

                            <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                            <?php for ($a = 86; $a <= 90; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>
                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>

                            <?php } ?>
                          </tr>



                          <tr>
                            <?php for ($a = 91; $a <= 95; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>

                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>
                            <?php } ?>

                            <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                            <?php for ($a = 96; $a <= 100; $a++) { ?>
                              <?php $checkKeepEgg = getCheckKeepEgg($_GET["houses_id"], $a, $dateNow); ?>
                              <?php $checkCoopEmpty = getCheckCoopEmpty($_GET["houses_id"], $a); ?>
                              <td>
                                <?php if ($checkCoopEmpty["numCount"] != 0 && $checkCoopEmpty["status"] != 2) { ?>
                                  <?php if ($checkKeepEgg["numCount"] == 0) { ?>
                                    <label class="image-checkbox checkbox_e" id="e_<?php echo $i; ?>">
                                      <img class="img-responsive" src="image/shop_empty.png" style="width:60px;height:60px;" onClick="checkCoop(<?php echo $_GET["houses_id"]; ?>,<?php echo $a; ?>);" />
                                      <input type="checkbox" name="chair[]" value="<?php echo $a; ?>" id="a_<?php echo $a; ?>" />
                                    </label>

                                  <?php } else{ ?>
                                    <label id="e_<?php echo $a;?>">
                                      <img class="img-responsive" src="image/shop_notempty.png" style="width:60px;height:60px;"/>
                                    </label>
                                  <?php } ?>
                                <?php } else { ?>

                                  <label id="e_<?php echo $a; ?>">
                                    <img class="img-responsive" src="image/shop_empty2.png" style="width:60px;height:60px;" />
                                  </label>
                                <?php } ?>
                                <?php echo $a; ?>
                              </td>

                            <?php } ?>
                          </tr>

                        </table>
                      </div>


                    </div>


                    <div class="clearfix"></div>

                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card card-profile">
                  <div class="card-avatar">
                    <a href="#pablo">
                      <img class="img" src="image/ico_emp.png" />
                    </a>
                  </div>
                  <div class="card-body">
                    <table style="width:100%">

                      <tr>
                        <td>กรงที่ : </td>
                        <td><label id="coop_txt"></label></td>
                      </tr>
                      <tr>
                        <td>รหัสไก่ : </td>
                        <td><label id="chic_number_txt"></label></td>
                      </tr>
                      <tr>
                        <td>สายพันธุ์ : </td>
                        <td><label id="breed_txt"></label></td>
                      </tr>
                      <tr>
                        <td>สายพันธุ์ : </td>
                        <td><label id="age_txt"></label></td>
                      </tr>

                    </table>
                    <input type="submit" name="submit" class="btn btn-primary btn-round" value="บันทึก">
                    <input type="button" name="botton" class="btn btn-primary btn-round" onClick="javascript:history.go(-1)" value="ย้อนกลับ">

                  </div>
                </div>
              </div>

            </div>
          </form>

        </div>
      </div>

      <script>
        $(".image-checkbox").each(function() {
          if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
            $(this).addClass('image-checkbox-checked');

          } else {
            $(this).removeClass('image-checkbox-checked');
            //alert($(this).attr('id'));



          }
        });

        // sync the state to the input
        $(".image-checkbox").on("click", function(e) {
          $(this).toggleClass('image-checkbox-checked');
          var $checkbox = $(this).find('input[type="checkbox"]');
          $checkbox.prop("checked", !$checkbox.prop("checked"))
          //alert($(this).attr('id'));
          if (!$checkbox.prop("checked")) {
            var su = 0;
            //alert($(this).attr('id'));
            var id = $(this).attr('id');
            //แถว
            var sub_row = id.substring(0, 1);
            var sub_id_row = id.substring(0, 5);
            //ราคาแถวที่นั่ง



          }
          e.preventDefault();
        });
      </script>
      <script>
        $('#date_show').datetimepicker({
          lang: 'th',
          timepicker: false,
          format: 'd/m/Y'

        });
      </script>


      <script>
        function checkCoop(houses_id, coop_id) {
          //alert(houses_id);

          $.get("api/api.php?load=chickenData&houses_id=" + houses_id + "&coop_id=" + coop_id, function(data) {

            data_chicken = $.parseJSON(data);
            for (var key2 in data_chicken) {

              if (data_chicken.hasOwnProperty(key2)) {
                $("#chic_number_txt").text(data_chicken[key2].chicken_number);
                $("#coop_txt").text(data_chicken[key2].coop_id);
                $("#breed_txt").text(data_chicken[key2].breed_name);
                $("#age_txt").text(data_chicken[key2].age_name);
              }
            }

          });
        }
      </script>>


      <?php
      require_once("footer.php");
      ?>

    </div>
  </div>



</body>

</html>