<?php


/**
 * 
 */
/**
 * 
 */
class db
{
	
public static function connect(){
   $dsn   = "mysql:host=localhost; dbname=tech";
   $user  ="root";
   $pass   = "";
   $con = null;

   try {
   	 
   	 	$con = new PDO($dsn, $user, $pass);
   	 	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   	 	//echo "successfully connect with databse";
   	   	
   } catch (PDOException $e) {
   	   echo "Error:". $e->getMessage();
   }
   
   return $con;


	}
}


/*$con = new db;
//db::connect();
   $sql = "SELECT * from techtouch_post limit 4";
   $stmt=db::connect()->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll();

   foreach ($result as $value) {
   	 echo $value["title"];
   } 
   */

?>