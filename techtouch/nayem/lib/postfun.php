<?php

include "db.php";
/**
 * 
 */
class postfun
{
	
	public function show_all_post()
	{
		 $sql = "SELECT cat_table.cat_name, techtouch_post.* FROM cat_table
                inner join techtouch_post on cat_table.id = techtouch_post.cat_id limit 10 ";
		 
		 $stmt= db::con()->prepare($sql);
		 $stmt->execute();
		 $result = $stmt->fetchAll();
		 
		 if($result){
		 	return $result;
		 }else{
		 	return false;
		 }
	}

	//show catagory id


  public function show_all_cat()
	{
		 $sql = "SELECT * from cat_table";		 
		 $stmt= db::con()->prepare($sql);
		 $stmt->execute();
		 $result = $stmt->fetchAll();
		 
		 if($result){
		 	return $result;
		 }else{
		 	return false;
		 }
	}

	//texts short
    
    public function textshort($value, $data){
    	 $text = substr($value,0, $data);
    	 $texts = substr($value, 0, strrpos($text, " "));
    	 return $texts;
    }

    //own validate

    public function ownvalidate($data){
      
      $owndata = stripslashes($data);
      $owndata = htmlspecialchars($owndata);
      $owndata = trim($owndata);
      return $owndata;
    }

    //insert post

    public function post_insert($title, $cat, $unique_image_name, $lead, $body, $author ,$tag){

    	 $sql = "INSERT into techtouch_post(cat_id, title, author, images, body, lead, tags) values(:cat_id, :title, :author, :images, :body, :lead, :tags)";
		 
		 $stmt= db::con()->prepare($sql);
		 $stmt->bindvalue(":cat_id", $cat);
		 $stmt->bindvalue(":title", $title);
		 $stmt->bindvalue(":author", $author);
		 $stmt->bindvalue(":images", $unique_image_name);
		 $stmt->bindvalue(":body", $body);
		 $stmt->bindvalue(":lead", $lead);
		 $stmt->bindvalue(":tags", $tag);
		 $result = $stmt->execute();		 
		 
		 if($result){
		 	return $result;
		 }else{
		 	return false;
		 }
    }

    //post delete

     public function delpost($sql, $id){
      $stmt= db::con()->prepare($sql);
      $stmt->bindparam(":id", $id);      
      $del = $stmt->execute();
      
      if($del){
      	return $del;      
      }else{
      	return false;
      }
     }

     public function unlinkimage($sql, $id){
      $stmt= db::con()->prepare($sql);
      $stmt->bindparam(":id", $id);      
      $stmt->execute();
      $img = $stmt->fetchAll();
      if($img){
      	return $img;      
      }else{
      	return false;
      }
     }

     //post edit function are herer

     public function showpostbyid($sql, $id){
     	$stmt = db::con()->prepare($sql);
     	$stmt->bindparam(":id", $id);
     	$stmt->execute();
     	$result = $stmt->fetchAll();

     if($result){
      	return $result;      
      }else{
      	return false;
      }

     }


     public function showcat($sql){
     	$stmt = db::con()->prepare($sql);
     	$stmt->execute();
     	$result = $stmt->fetchAll();
     	return $result;
     }



	//end class
}


?>