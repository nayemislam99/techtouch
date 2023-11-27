<?php

include_once "db.php";


class modal
{
	
  public function allselect($sql){   
   $stmt=db::connect()->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll();

    if($result){
    	return $result;
    }else{
    	return false;
    }
  }

  public function countcat($sql, $cat_id){
   $stmt=db::connect()->prepare($sql);
   $stmt->bindvalue(":id", $cat_id);
   $stmt->execute();
   $result = $stmt->rowCount();

    if($result){
    	return $result;
    }else{
    	return false;
    }
  }

   public function matchwithid($sql, $id){
   $stmt=db::connect()->prepare($sql);
   $stmt->bindvalue(":id", $id);
   $stmt->execute();
   $result = $stmt->fetchAll();

    if($result){
    	return $result;
    }else{
    	return false;
    }
  }


  public function mygettime($date){
    $mygetdate = date("F j Y g:i A", strtotime($date));
    return $mygetdate;
  }


  public function relatedpost($sql){
   $stmt=db::connect()->prepare($sql);
   //$stmt->bindvalue(":id", $id);
   $stmt->execute();
   $result = $stmt->fetchAll();

    if($result){
    	return $result;
    }else{
    	return false;
    }
  }


  public function mysearch($sql){
     $stmt=db::connect()->prepare($sql);
     $stmt->execute();
     $result = $stmt->fetchAll();
     if($result){
      return $result;
     }else{
      return false;
     }
  }

  /*validate function*/
  public function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
 /*author called*/
  public static function author($sql, $author){
     $stmt=db::connect()->prepare($sql);
     $stmt->bindparam(":writter", $author);
     $stmt->execute();
     $result = $stmt->fetchAll();
     if($result){
     return $result;
     }else{
      return false;
     }
  } 
  
 /*author end*/

}


?>