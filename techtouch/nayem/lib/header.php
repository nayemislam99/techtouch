 <?php
   spl_autoload_register(function($class){
   include "lib/".$class.".php";
   //include "session.php";
   session::init();
   session::check();
   

 })
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TechTouch</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
</head>
<body>
<!---nav section first-->
 <nav class="navbar navbar-dark bg-dark text-white nav-first">
 	<div class="container-fluid top">
 		<div class="top-right">
 			<h2><a href="../index.php" class="navbar-brand" style="font-size:26px">techtouch.com</a></h2>
	 	    <small class="pt-0">It is your begain...</small>
 		</div>

 		<div class="top-left">

      <?php
          
          $id = session::get("id");
        if(isset($_GET['action']) and $_GET['action'] == "logout"){
            session::logout();
           }
            //logout==============
      ?>

  <span><i class="far fa-user"></i></i></span><span class="logout-text">Hello ! <?php

   $role = session::get('role');
    if($role)
    {
    echo $role;  
     } 
 ?>
   
 </span> | 
 <a class="btn-logout" href="?action=logout">Logout</a>


 		</div>
	 	 
 	 </div>
 </nav>
<!---nav section first end-->

<!---nav section second-->
<nav class="navbar navbar-expand-md navbar-dark bg-info">
	<div class="container-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fas fa-bars"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php" class="navbar-brand" ><i class="fas fa-border-all"></i>Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-user"></i>User Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-exchange-alt"></i>Change Password</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#"><i class="fas fa-user-edit"></i>Add User</a>
      </li>
       <li class="nav-item">
         <a class="nav-link disabled" href="#"><i class="far fa-envelope"></i>Inbox</a>
      </li>
    </ul>
  </div>
</div>
</nav>
<!---nav section second end-->

<?php

   $msg = session::get('logmsg');
    if($msg)
    {
    echo $msg;
      $msg = session::set('logmsg', null);
     } 
 ?>