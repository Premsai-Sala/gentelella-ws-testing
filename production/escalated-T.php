<?php
require_once('authenticate.php');
require 'config-mysqli.php';
if ($_SESSION["designation"]==2)
{
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

    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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
        <!-- <h2>Call Center Agent</h2> -->
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
   <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Escalated Tickets</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                        <th>id</th>
                        <th>User Name</th>
                        <th>Item Name</th>
                        <th>Problem</th>
                        <th>Description</th>
                        <th>remark</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $query3 = "SELECT * FROM users where designation='2'";
                      $admindata = mysqli_query($connection, $query3);
                      $admin = "";
                      while($row2 = mysqli_fetch_array($admindata))
                      {
                      $admin = $admin."<option value=$row2[1]>$row2[1]</option>";
                      }
                      $result = $con->query("SELECT * FROM issues WHERE escalated_by=\"$uname\"");
                      while($row1 = $result->fetch_assoc())
                      {
                        ?>
                        <form method="post" action="showticket-T.php">
                        <tr>
                        <td><input type="text" style="visibility:hidden; border: 0px; height: 0px; width:0px;" name="id" value="<?php echo $row1['id'];?>"><?php echo $row1['id']; ?></td>
                        <td><input type="text" style="visibility:hidden; border: 0px; height: 0px; width:0px;" readonly name="unname" value="<?php echo $row1['userid'];?>"><?php echo $row1['userid']?></td>
                        <td><input type="text" style="visibility:hidden; border: 0px; height: 0px; width:0px;" readonly name="itemname" value="<?php echo $row1['itemid'];?>"><?php echo $row1['itemid']; ?></td>
                        <td><input type="text" style="visibility:hidden; border: 0px; height: 0px; width:0px;" readonly name="problem" value="<?php echo $row1['problem'];?>"><?php echo $row1['problem'];?></td>
                        <td><input type="text" style="visibility:hidden;border: 0px;height:25px; width:0px;" readonly name="comm" value="<?php echo $row1["comm"]?>"><?php echo $row1['comm']?></td>
                        <td><input type="text" style="visibility:hidden;border: 0px;height:25px; width:0px;" readonly name="rmkss" value="<?php echo $row1["remarks"]?>"><?php echo $row1['remarks']?></td>
                        </tr>
                        </form>
                        <?php
                      }
                      ?>
                      </tbody>
                    </table>
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

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

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
