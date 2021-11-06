<?php
include 'assets/main/config.php';
error_reporting(0);

session_start(); 
if(isset($_SESSION['use']))  
 {
    header("Location:index"); 
 }
if(isset($_POST['login']))
{
     $user = $_POST['user'];
     $pass = $_POST['pass'];
      if($user == in_array($user, $username) && $pass == in_array($pass, $password))
         {                                   
          $_SESSION['use']=$user;
         echo '<script type="text/javascript"> window.open("index.php","_self");</script>';
        }
        else
        {
            $err = "Invalid Username or Password!";
        }
}
?>
<!doctype html>
<html>
<head>
    <!-- Basic Site Informations -->
    <title>CHK | AUTH</title>
    <meta name="description" content="Arceus CC Checker Auth">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/img/icon.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/links.css">
    <!-- Login -->
    <link rel="stylesheet" href="assets/css/login.css">
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/a7afa0cef6.js"></script>
</head>
    <!-- Contents -->
    <body style="background:#2c2e36">
    <div class="container mb-5 mt-5" id="container">
	<div style="margin-top: 100px;">
	<div class="col-md-12">
	<div id="content">
	<div class="form-group"><div id="card">
	<div class="card shadow-lg p-3 mb-6 bg-transparent" style="width:375px;background: rgba(0,0,0,0.2);">
    <div class="card-body">

    <form class="form-signin" role="form" method="post" autocomplete="off">
    <center>
    <div class="col-md-auto">
    </div>
    </center>
    <h4 class="card-title" style="text-align:center;color:#fff">BONTEN CHECKER</h4>
    <div id="glowing">A perfect credit card Checking solution for you.</div>
    <hr>
    <p style="text-align:center;color:#fff"><?php echo $err?></p>
    <div class="form-outline mb-4">
    <input type="text" name="user" id="user" id="form1Example1" style="color:#fff" class="form-control" required />
    <label class="form-label" for="form1Example1" style="color:#fff">Username</label>
    </div>

    <div class="form-outline mb-4">
    <input type="password" name="pass" id="pass" style="color:#fff" class="form-control" required/>
    <label class="form-label" for="form1Example2" style="color:#fff">Password</label>
    </div>

    <div class="row mb-4">
    <div class="col d-flex justify-content-center">

    <button type="SUBMIT" name="login" value="login" class="btn btn-primary btn-rounded">Sign in</button> 
    </form>

    <!-- JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.1.0/mdb.min.js"></script>

</body>
</html>
