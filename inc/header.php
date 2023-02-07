<?php
session_start();
?>
<html lang="en">
<head>
<?php include('functions.php');?>
    <title>Phoenix: Vemuri S Murthy</title>
    <link rel="stylesheet" href="inc/coustom.css"/>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--BOOTSTARTP3 START -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--BOOTSTARTP3 END -->

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  
<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" style="padding:0px !important;"><img border="0" alt="Crypto Analysis" src="logo.jpg" class="imgclass"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav" style="float: right !important;">


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Resources
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="pl_view.php">Project Links</a>
          <br/><br/>
          <a class="dropdown-item" href="cms_view.php">Mini CMS</a>
        </div>
      </li>



       <li class="nav-item"><a href="update_password.php"> Update Password</a></li>
            <li class="nav-item"><a href="logout.php"> Logout </a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php
if(!isset($_SESSION['CAuser'])){
header("Location: home.php");
}
?>
<div class="page_container">