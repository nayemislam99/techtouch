<?php
  include "lib/db.php";
  include "lib/session.php";
  session::init();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Page</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="logpage">
	<div class="container" style="padding-top:10%">

	<div class="logpage-container w-50 mx-auto">
		  <?php
             
             if(isset($_POST['logchek'])){


             	 $user = db::validate($_POST['logid']);
             	 $pass = db::validate($_POST['logpass']);

             	 if($user == "" or $pass == ""){
             	 	echo "<span class='error'>Filed must not be empty.</span>";
             	 }else{
         

             	 $sql = "SELECT * from log_panle where user_name=:user and password=:pass";
             	 $stmt = db::con()->prepare($sql);
             	 $stmt->bindparam(":user", $user);
             	 $stmt->bindparam(":pass", $pass);
             	 $stmt->execute();
             	 $result = $stmt->fetch(PDO::FETCH_OBJ);

             	  if($result){
             	  	 
             	  	 session::set("loging", true);
             	  	 session::set("role", $result->role);
             	  	 session::set("id", $result->id);
             	  	 session::set("logmsg", "<script>alert('You are successfully login.');
                                                </script>
             	  	 	");

             	  	 header("location:index.php");
             	  	 
             	  }else{
             	  	  echo "<span class='error'>User name and passowrd does not be match.</span>";
             	  }

             }

         }

		 ?>
		<div class="row">

			<div class="col">
				<form action="" method="post">
				<div class="form-group">
					<span>User name</span><input type="text" name="logid" class="form-control d-inline">
				</div>
				<div class="form-group">
					<span>Password</span><input type="password" name="logpass" class="form-control">					
				</div>
				<input type="submit" class="btn btn-outline-dark" name="logchek" value="Login">
				</form>
			</div>
		</div>
	</div>
	</div>
	</div>
</body>
</html>