<?php
require_once('authenticate.php');
if ($_SESSION["designation"]==0 || $_SESSION["designation"]==1)
{
session_start();
$des=$_SESSION["designation"];
$uname=$_SESSION["username"];
/*require_once('authenticate.php');
include 'leftnav-CCA.html';
include 'topnav.html';*/
$hostname = "localhost";
$username = "itdb";
$password = "Itm@2018";
$databaseName = "test";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$query1 = "SELECT * FROM users";
$usersdata = mysqli_query($connect, $query1);// for method 2
$users = "";
while($row2 = mysqli_fetch_array($usersdata))
{
    if ($row2[1]==$_POST['userid']) $s="SELECTED"; else $s="";
    //$users = $users."<option value=`$row2[0]`>$row2[1]</option>";
    $users = $users."<option $s value=$row2[1]>$row2[1]</option>";
}
//$query2 = "SELECT * FROM itemtypes";
$ttt=$_POST['userid'];
$query2 = "SELECT typedesc from itemtypes JOIN items ON itemtypes.id=items.itemtypeid JOIN users ON items.userid=users.id where username=\"$ttt\"";
$itemdata = mysqli_query($connect, $query2);// for method 2
$items = "";
while($row2 = mysqli_fetch_array($itemdata))
{
    //$items = $items."<option value=`$row2[0]`>$row2[2]</option>";
    $items = $items."<option value=$row2[0]>$row2[0]</option>";
}

$query3 = "SELECT * FROM users where designation='0'";
$admindata = mysqli_query($connect, $query3);// for method 2
$admin = "";
while($row2 = mysqli_fetch_array($admindata))
{
    //$admin = $admin."<option value=`$row2[0]`>$row2[1]</option>";
    $admin = $admin."<option value=$row2[1]>$row2[1]</option>";
}
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
            if ($_SESSION["designation"]==0)
            {
            include 'leftnav-CCA.php';
          }
          else
            include 'leftnav-TA.php';
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
                    <h2>Raise Ticket</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form method="post" action="raiseticket-CCA.php">

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Complainant</label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                    <div class="input-group">
                    <select name="userid" id="mySelect" class="form-control" onchange="myFunction()">
                    <option value="0" selected="selected"> Select Complainant</option>
                    <?php echo $users;?>
                    </select>
                    <span class="input-group-btn">
                    <input type="submit" name="submit" class="btn btn-primary" value="Go!">
                    </span>
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Items</label>
                    <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                    <select style="margin-left: 10px" name="itemid" id="heard" class="form-control">
                    <option value="0" selected="selected"> Select Device</option>
                    <?php echo $items;?>
                    </select>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Issue</label>
                    <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                    <select style="margin-left: 10px" name="problem" id="heard" class="form-control">
                    <option value="0" selected="selected"> Select Issue</option>
                    <option value="Network Issue">Network Issue</option>
                    <option value="Device Not Working">Device Not Working</option>
                    <option value="Battery Issue">Battery Issue</option>
                    <option value="Screen is Blank">Screen is Blank</option>
                    <option value="Strange Noises">Strange Noises</option>
                    <option value="Strange Noises">Email</option>
                    </select>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Comments</label>
                    <div class="col-md-8 col-sm-8 col-xs-12 input-group">
                    <textarea style="margin-left: 10px" class="form-control" name="comments" placeholder="Put you comments. . ." style="height:200px"></textarea>
                    </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                    </form>
                      <?php
                      if ($_POST["userid"] != `` && $_POST["itemid"] != `` && $_POST["problem"] != `` && $_POST["userid"] != '0' && $_POST["itemid"] != '0' && $_POST["problem"] != '0') {
                      $row1= $_POST["userid"];
                      $row2= $_POST["itemid"];
                      $row3= $_POST["problem"];
                      $row4= $_POST["comments"];
                      /*$row5= $_POST["assign"];
                      $row6= $_POST["priority"];*/
                      $row5= "Open";
                      $row6= "0";

                      $sql="INSERT INTO issues (userid,itemid,problem,comm,status,assign_status,created_at) VALUES ('$row1', '$row2', '$row3', '$row4', '$row5', '$row6', NOW())";
                      $usersdata = mysqli_query($connect, $sql);
                      if($usersdata)
                          {
                            echo("<br>*Ticket raised successfully.");
                              header("Location: http://localhost/gentelella-ws/production/index.php");
                          } 
                          else
                          {
                              echo("<br>*Failed to raise ticket. Please try it after some time.");
                              header("Location: http://localhost/authenticate/index.php");
                            }
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
      <p id="demo"></p>
    </footer>
    <!-- /footer content -->
  </div>
</div>
    <script>
      function myFunction() 
        {
        var x = document.getElementById("mySelect").value;
        document.getElementById("demo").innerHTML = "You selected: " + x;
        }
    </script>
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
