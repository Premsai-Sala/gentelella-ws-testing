<?php
$username = null;
$password = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if(!empty($_POST["username"]) && !empty($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $conn = mysqli_connect("localhost","itdb","Itm@2018","test");
    $query="SELECT * FROM users WHERE username='".$username."' AND pass='".$password."'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result);   
    $user=$row["username"];
    $pass=$row["pass"];
    $designation=$row["designation"];

    if($username == $user && $password == $pass) {
      session_start();
      $_SESSION["username"] = $user;
      $_SESSION["designation"] = $designation;
      $_SESSION["authenticated"] = 'true';
      header('Location: index.php');
    }
    else {
      header('Location: login.php');
    }
    
  } else {
    header('Location: login.php');
  }
} else {
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="login" method="post">
              <h1>Login Form</h1>
              <div>
                <input id="username" name="username" type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input id="password" name="password" type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input type="submit" value="Login">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <!-- <a href="#signup" class="to_register"> Create Account </a> -->
                  <h8>Please Contact IT Administrator</h8>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1> ITM</h1>
                  <p>©2018 All Rights Reserved. Privacy and Terms</p>
                </div>
              </d1iv>
            </form>
          </section>
        </div>

        <!-- <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form >
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div> -->
      </div>
    </div>
  </body>
</html>
<?php } ?>
