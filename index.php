<?php
session_start();
include('inc/functions.php'); 

if(isset($_SESSION['CAuser'])){
header("Location: home.php");
}

if(isset($_POST['submit'])){
    
     
    $md5password = md5(trim($_POST['passinput']));
    if($getFileContent==$md5password){
        //1. authorize user by flagging a session variable.        
        //2. Redirect to admin home
        $_SESSION['CAuser'] = TRUE;
        header("Location: home.php");
        //exit();
		echo "correct password";
		
    }
    else
    {
        echo "Incorrect Password Entered. Please try again!";   
    }    
}

?> 
<html>
<head>
    <title>index paage </title>
    <link rel="stylesheet" href="inc/coustom.css"/>
    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<body>

<div class="login-form">
    <form action="index.php" method="POST">
       <center> <img src="logo.jpg" alt="my image"/> </center>
        <br/>
        <div class="form-group">
            <input type="password" class="form-control" name="passinput" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="submit">Log in</button>
        </div>        
    </form>
</div>
</body>
</html> 

