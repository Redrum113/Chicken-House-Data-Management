<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
include("fusion_chart/fusioncharts.php");
//$yearThai = date("Y") + 543;
//$dateStart = date("d/m/") . $yearThai;
//$dateEnd = date("d/m/") . $yearThai;
//$dataChart = getAllDataChartReport($dateStart, $dateEnd);
//$allDataReport = getAllDataReport($dateStart, $dateEnd);

if (isset($_POST["submit"])) {
  $dataChart = getAllDataChartReport($_POST["start_date"], $_POST["end_date"]);
  $allDataReport = getAllDataReport($_POST["start_date"], $_POST["end_date"]);
}
?>
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js?cacheBust=56"></script>
<?php


$columnChart = new FusionCharts("bar2d", "myFirstChart", 800, 600, "chart-1", "json", $dataChart);

// Render the chart
$columnChart->render();

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

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <br>
                <form name="report_form" action="" method="post">
                  <table style="width:50%" align="center">
                    <tr>
                      <td style="text-align:center;">ตั้งแต่วันที่ </td>
                      <td><input type="text" class="form-control border-input" name="start_date" id="start_date" required></td>
                      <td style="text-align:center;">ถึงวันที่ </td>
                      <td><input type="text" class="form-control border-input" name="end_date" id="end_date" required></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;" colspan="4">
                        <input type="submit" name="submit" value="แสดงรายงาน" class="btn btn-danger">
                      </td>
                    </tr>
                  </table>
                </form>

                <br>

                <div id="chart-1" align="center"></div>
                <br><br>
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      <h4>โรงเรือน</h4>
                    </th>
                    <th>
                      <h4>รายละเอียด</h4>
                    </th>
                    <th>
                      <h4>ประเภทโรงเรือน</h4>
                    </th>
                    <th>
                      <h4>อาหาร</h4>
                    </th>
                    <th style="text-align: center;">
                      <h4>จำนวนที่เก็บไข่ได้ทั้งหมด</h4>
                    </th>
                  </thead>
                  <tbody>
                    <?php if (empty($allDataReport)) { ?>
                      <?php echo "<h3>ไม่พบข้อมูล</h3>"; ?>
                    <?php } else { ?>
                      <?php foreach ($allDataReport as $data) { ?>
                        <tr>
                          <td><?php echo $data["house_name"]; ?></td>
                          <td><?php echo $data["house_detail"]; ?></td>
                          <td><?php echo $data["age_name"]; ?></td>
                          <td><?php echo $data["food_type"]; ?></td>
                          
                          <td style="text-align: center;"><?php echo $data["amount_egg"]; ?></td>
                        </tr>
                      <?php } ?>
                    <?php } ?>


                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <script>
            $('#start_date').datetimepicker({
              lang: 'th',
              timepicker: false,
              format: 'd/m/Y'
            });
            $('#end_date').datetimepicker({
              lang: 'th',
              timepicker: false,
              format: 'd/m/Y'
            });
          </script>



        </div>
      </div>


</body>

</html>