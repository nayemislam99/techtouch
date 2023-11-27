<?php

/**
 * 
 */
class db
{
	
	public static function con()
	{
		$dsn = "mysql:host=localhost; dbname=techtouch";
		$user = "nayem";
		$pass = "";
		$con;

		   try {
		   	 
		   	 	$con = new PDO($dsn, $user, $pass);
		   	 	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		   	 	//echo "successfully connect with databse";
		   	   	
		   } catch (PDOException $e) {
		   	   echo "Error:". $e->getMessage();
		   }
		   
		   return $con;
	}


  public function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


}

//$db = new db;
//db::con();





?>