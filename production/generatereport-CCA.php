<?php
require_once('authenticate.php');
if ($_SESSION["designation"]==0 || $_SESSION["designation"]==1)
{
//session_start();
$des=$_SESSION["designation"];
$uname=$_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="images/favicon.ico" type="image/ico" />
<title>ITM! | </title>

<!-- Bootstrap -->
<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<!-- Ion.RangeSlider -->
<link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
<link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
<link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
<!-- Bootstrap Colorpicker -->
<link href="../vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

<link href="../vendors/cropper/dist/cropper.min.css" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="clearfix"></div>
        <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
            <span>Welcome,</span>
            <h2><?php echo $uname; ?></h2>
            </div>
          </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <?php
        include 'leftnav-CCA.php';
        ?>
        <!-- /sidebar menu -->
        </div>
    </div>
    <!-- top navigation -->
    <?php
    include 'topnav-common.php';
    ?>
    <!-- /top navigation -->
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title"></div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12">
            <div class="x_panel" style="">
              <div class="x_title">
                <h2>Generate Report<small>Date Wise</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="container">
                  
                  <form method="post" action="showreport-DW-CCA.php">

                    <div class="row">
                      <div class='control-label col-md-3 col-sm-3 col-xs-3'><label>From</label></div>
                      <div class='col-sm-6  '>
                        <div class="form-group">
                        <div class="input-group date" id="myDatepicker3">
                            <input type="text" class="form-control" readonly="readonly" name="dag">
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class='control-label col-md-3 col-sm-3 col-xs-3'><label>To</label></div>
                      <div class='col-sm-6'>
                        <div class="form-group">
                          <div class="input-group date" id="myDatepicker4">
                              <input type="text" class="form-control" readonly="readonly" name="day">
                              <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-success">Generate Report</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

          <div class="row">
          <div class="col-md-12">
            <div class="x_panel" style="">
              <div class="x_title">
                <h2>Generate Report<small>Technician Wise</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="container">
                  <?php
                      $con = new mysqli('localhost' , 'itdb' , 'Itm@2018' , 'test');
                      $query3 = "SELECT * FROM users where designation='2'";
                      $admindata = mysqli_query($con, $query3);
                      $admin = "";
                      while($row2 = mysqli_fetch_array($admindata))
                      {
                      $admin = $admin."<option value=$row2[1]>$row2[1]</option>";
                      }
                      ?>
                  <form method="post" action="showreport-CCA.php">

                    <div class="row">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Technician <span class="required">*</span>
                        <div></div></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control form-group " name="as">
                            <?php echo $admin;?>
                          <option selected="selected" value="SelectTechnician">SelectTechnician</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">From <span class="required">*</span>
                        <div></div></label>
                      <div class='col-sm-6  '>
                        <div class="form-group">
                        <div class="input-group date" id="myDatepicker2">
                            <input type="text" class="form-control" readonly="readonly" name="daf">
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">To <span class="required">*</span>
                        <div></div></label>
                      <div class='col-sm-6'>
                        <div class="form-group">
                          <div class="input-group date" id="myDatepicker1">
                              <input type="text" class="form-control" readonly="readonly" name="dat">
                              <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-success">Generate Report</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<div class="row">
          <div class="col-md-12">
            <div class="x_panel" style="">
              <div class="x_title">
                <h2>Generate Report<small>Complainant Wise</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="container">
                  <?php
                      $connect = new mysqli('localhost' , 'itdb' , 'Itm@2018' , 'test');
                      $query1 = "SELECT * FROM users";
                      $usersdata = mysqli_query($connect, $query1);// for method 2
                      @$users = "";
                      while($row2 = mysqli_fetch_array($usersdata))
                      {
                          if (isset($_POST['userid']))
                            {
                              if ($row2[1]==$_POST['userid']) $s="SELECTED"; else $s="";
                              //$users = $users."<option value=`$row2[0]`>$row2[1]</option>";
                              $users = $users."<option $s value=$row2[1]>$row2[1]</option>";
                            }
                            else
                              $users = $users."<option value=$row2[1]>$row2[1]</option>";
                      }
                      ?>

                  <form method="post" action="showreport-CW-CCA.php">

                    <div class="row">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Complainant <span class="required">*</span>
                        <div></div></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control form-group " name="as1">
                            <?php echo $users;?>
                          <option selected="selected" value="SelectTechnician">SelectComplainant</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">From <span class="required">*</span>
                        <div></div></label>
                      <div class='col-sm-6  '>
                        <div class="form-group">
                        <div class="input-group date" id="myDatepicker5">
                            <input type="text" class="form-control" readonly="readonly" name="daf1">
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">To <span class="required">*</span>
                        <div></div></label>
                      <div class='col-sm-6'>
                        <div class="form-group">
                          <div class="input-group date" id="myDatepicker6">
                              <input type="text" class="form-control" readonly="readonly" name="dat1">
                              <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-success">Generate Report</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        
    </div>
    <!-- /page content -->
    <!-- footer content -->
    <footer>
    <div class="pull-right">
    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="../vendors/moment/min/moment.min.js"></script>
  <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap-datetimepicker -->    
  <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  <!-- Ion.RangeSlider -->
  <script src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
  <!-- Bootstrap Colorpicker -->
  <script src="../vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <!-- jquery.inputmask -->
  <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
  <!-- jQuery Knob -->
  <script src="../vendors/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- Cropper -->
  <script src="../vendors/cropper/dist/cropper.min.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

  <!-- Initialize datetimepicker -->
  <script>
  
    $('#myDatepicker1').datetimepicker({
      format: 'YYYY-MM-DD',
      ignoreReadonly: true,
      allowInputToggle: true
    });

    $('#myDatepicker2').datetimepicker({
      format: 'YYYY-MM-DD',
      ignoreReadonly: true,
      allowInputToggle: true
    });

    $('#myDatepicker3').datetimepicker({
      format: 'YYYY-MM-DD',
      ignoreReadonly: true,
      allowInputToggle: true
    });

    $('#myDatepicker4').datetimepicker({
      format: 'YYYY-MM-DD',
      ignoreReadonly: true,
      allowInputToggle: true
    });

    $('#myDatepicker5').datetimepicker({
      format: 'YYYY-MM-DD',
      ignoreReadonly: true,
      allowInputToggle: true
    });

    $('#myDatepicker6').datetimepicker({
      format: 'YYYY-MM-DD',
      ignoreReadonly: true,
      allowInputToggle: true
    });

  </script>
</body>
</html>
<?php
}
else
{
echo "<h4 style=\"color:red; margin-left:300px; margin-top:150px\"> You are not the authorized user to access this page ! ! ! <a href=\"login.php\">GO TO LOGIN PAGE</a></h4>";
session_destroy();
}
?>
<!-- select * from issues WHERE created_at >= CAST('2018-11-14' AS DATE) AND created_at <= CAST('2018-11-15' AS DATE); -->
