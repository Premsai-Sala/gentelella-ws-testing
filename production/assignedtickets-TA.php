<?php
require_once('authenticate.php');
if ($_SESSION["designation"]==1)
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
        </div>
        </div>
      <!-- /menu profile quick info -->
      <br />
      <!-- sidebar menu -->
      <?php
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
   <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Assigned Tickets</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                        <th>id</th>
                        <th>User Name</th>
                        <th>Item Name</th>
                        <th>Assign to</th>
                        <th>Priority</th>
                        <!-- <th>Status</th> -->
                        <th>Raised On</th>
                        <th>Problem</th>
                        <th>Description</th>
                        </tr>
                      </thead>
                      <form method="post">
                      <tbody>
                      <?php
                      $con = new mysqli('localhost' , 'itdb' , 'Itm@2018' , 'test');
                      $result = $con->query("SELECT * FROM issues WHERE status=\"Open\"AND assign IS NOT NULL AND assign<>\"\"");
                      while($row1 = $result->fetch_assoc())
                      {
                      echo "<tr>";
                      echo "<td>".$row1['id']."</td>";
                      echo "<td>".$row1['userid']."</td>";
                      echo "<td>".$row1['itemid']."</td>";
                      echo "<td>".$row1['assign']."</td>";
                      echo "<td>".$row1['priority']."</td>";
                      /*echo "<td>".$row1['status']."</td>";*/
                      echo "<td>".$row1['created_at']."</td>";
                        echo "<td>".$row1['problem']."</td>";
                        echo "<td>".$row1['comm']."</td>";
                      echo "</tr>";
                      }
                      ?> 
                      </tbody>
                      </form>
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