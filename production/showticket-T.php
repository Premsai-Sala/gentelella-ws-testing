<?php
require_once('authenticate.php');
if ($_SESSION["designation"]==2)
{
//session_start();
$des=$_SESSION["designation"];
$uname=$_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 200) {
          val.value = val.value.substring(0, 200);
        } else {
          $('#charNum').text(200 - len);
        }
      };
    </script>
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
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <!--  -->

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
            include 'leftnav-T.php';
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
        <div class="col-md-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ticket</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form method="post">

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Ticket ID</label>
                    <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                    	<input type="text" style="visibility: hidden; width: 0px;" readonly name="sid" value=<?php echo @$_POST['id']; ?>><?php echo @$_POST['id']; ?>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">User Name</label>
                    <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                    	<input type="text" style="visibility: hidden; width: 0px" readonly value=<?php echo @$_POST['unname']; ?>><?php echo @$_POST['unname']; ?>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Name</label>
                    <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                    	<input type="text" style="visibility: hidden; width: 0px" readonly value=<?php echo @$_POST['itemname']; ?>><?php echo @$_POST['itemname']; ?>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Problem</label>
                    <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                    	<input type="text" style="visibility: hidden; width: 0px" readonly value=<?php echo @$_POST['problem']; ?>><?php echo @$_POST['problem']; ?>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Comments</label>
                    <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                    	<textarea class="form-control readonly=readonly" readonly="readonly"> <?php echo @$_POST['comm']; ?> </textarea>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Priority</label>
                    <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                    	<input type="text" style="visibility: hidden; width: 0px" readonly name="spr" value=<?php echo @$_POST['pr']; ?>><?php echo @$_POST['pr']; ?>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Remarks</label>
                    <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                        <textarea class="form-control" name="rmk" placeholder="Put you Remarks. . .(200 charachers)" style="height:200px" onkeyup="countChar(this)"><?php 
                            if (isset($_POST['rmkss']))
                                echo $_POST['rmkss'];
                        ?></textarea>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Escalate</label>
                    <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                        <input type="checkbox" name="esc" value="1"><br>
                    </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Escalate / Close</button>
                    </div>
                    </div>

                    </form>
                    <a href="tickets-T.php"><button>Back</button></a>
					<?php
                    $t=@$_POST['sid'];
					$tt=@$_POST['esc'];
                    $ttt=@$_POST['spr'];
					$tttt=@$_POST['rmk'];
                    $con = new mysqli('localhost' , 'itdb' , 'Itm@2018' , 'test');
                    if($t!=`` && $ttt!=`` && $tt==``)
                    {
                        $con->query("UPDATE issues SET status=\"Close\", resolved_on=NOW(), remarks=\"$tttt\" WHERE id=$t");
                    }
                    elseif ($t!=`` && $ttt!=`` && $tt!=``) {
                        $con->query("UPDATE issues SET escalated_on=NOW(), remarks=\"$tttt\", escalated=$tt, escalated_by=\"$uname\" WHERE id=$t");
                    }
					?>
                  </div>
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
        ITM Group of Institutions <a href="https://www.itm.edu/">(Website)</a>
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
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