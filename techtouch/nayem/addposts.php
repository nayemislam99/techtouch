 <?php
   include "lib/header.php";
   $post = new postfun();
 ?>
<!---sidebar-->
 <?php include "lib/sidebar.php";  ?>
<!---sidebar-->
<div class="col-md-9 py-3">
	<div class="row">
 
 <?php
   
   if(isset($_POST['posts']) and isset($_SERVER['REQUEST_METHOD']) == "post"  ){

   	 $title = $post->ownvalidate($_POST['title']); 
   	 $lead = $post->ownvalidate($_POST['lead']);
   	 $body = $_POST['body'];
   	 $author = $post->ownvalidate($_POST['author']);
   	 $tag = $post->ownvalidate($_POST['tag']);
   	 $cat = $_POST['cat'];

   	  $image = $_FILES['image']['name'];
   	  $image_size = $_FILES['image']['size'];
   	  $image_tmp_name = $_FILES['image']['tmp_name'];
   	  $image_type = $_FILES['image']['type'];

   	   $image_exploade = explode(".", $image);
   	   $image_divide = end($image_exploade);
   	   $extension_lower =strtolower($image_divide);
   	   $type_check = array("jpg", "jpeg", "png");

   	    $random_image_name = substr(md5(time()), 0, 11);
   	    $unique_image_name =$random_image_name.".".$extension_lower;
   	    $image_path = "images/".$unique_image_name;


   	  
   	if(empty($title) or empty($image) or empty($lead) or empty($body) or empty($author) or empty($tag) or empty($cat)){

   	echo "<span class='error mx-auto'>Field should not empty.</span>";
   	  }elseif($image > 1048576){
          echo "<span class='error mx-auto'>Images size must be less 1MB.</span>"; 
   	  }elseif(in_array($extension_lower, $type_check) === false){
         echo "<span class='error mx-auto'>Images extension must jpeg, jpg, png.</span>"; 
   	  }else{
      
      
   	  $post_insert = $post->post_insert($title, $cat, $image_path, $lead, $body, $author ,$tag);
   	  if($post_insert){
   	  	   move_uploaded_file($image_tmp_name, $image_path);
   	  	   echo "<span class='success mx-auto'>Post inserted successfully.</span>";
   	  }
   	  }
   }

 ?>
</div>

<form action="" enctype="multipart/form-data" method="post">
	
<table class="table table-borderless">

	<!---title-->
<div class="form-group">
	<tr>
		<td class="text-right" style="width:20%;"><label for="title"><h4>Title</h4></label></td>
		<td style="width:80%;">
<input class="form-control" type="text" id="title" name="title" placeholder="Posts title...">	
		</td>
	</tr>
</div>
<!---title-->



<!---catagory-->
	<div class="form-group">
	<tr>
		<td class="text-right"><label for="cat"><h4>Catagory</h4></label></td>
		<td>
         <select class="form-control" name="cat">
       <?php

         $show_cat = $post->show_all_cat();         
         if($show_cat){         	 
         	foreach ($show_cat as $value) {
         	        		
       
	  ?>
         	<option value="<?php echo $value['id'];  ?>"><?php echo $value['cat_name'];  ?></option>
         	<?php  } } ?>       	
         </select>
		</td>
	</tr>
</div>
<!---catagory-->


<!---imgage-->
<div class="form-group">
       <tr>
		<td class="text-right"><label for="image"><h4>Image</h4></label></td>
		<td>
<input class="form-control-file" type="file" id="image" name="image" >
<img src="upload/post-1.jpg" class="my-2" height="60px" width="100px" alt="post image">	
		</td>
		<td>
			
		</td>
       </tr>
</div>
     <!---imgage-->

     <!---lead-->
<div class="form-group mt-0">
		<tr>
	<td class="text-right"><label for="lead"><h4>Lead</h4></label></td>
		<td>
  <textarea name="lead" class="form-control" rows="2" id="lead"></textarea>
		</td>
	</tr>
		</div>
      <!---lead-->

      <!---Article-->

	<div class="form-group">
		<tr>
	<td class="text-right"><label for="body"><h4>Article</h4></label></td>
		<td>
  <textarea name="body" class="form-control" rows="5" id="body"></textarea>
		</td>
	</tr>
		</div>
	<!---Article-->

	<!---Author-->
<div class="form-group">
<tr>
	<td class="text-right"><label for="author"><h4>Author</h4></label></td>
	<td>
<input class="form-control" type="text" id="author" name="author" placeholder="Posts author...">	
	</td>
    </tr>
</div>
<!---Author-->

<!---tag-->

<div class="form-group">
<tr>
	<td class="text-right"><label for="tag"><h4>Tag & Keywords</h4></label></td>
	<td>
<input class="form-control" type="text" id="tag" name="tag" placeholder="Posts Tages and Keywords...">	
	</td>
    </tr>
</div>
<!---tag-->

<div class="form-group">
<tr>
	<td></td>
	<td>
<input type="submit" name="posts" value="Add Posts" class="btn btn-outline-dark">	
	</td>
    </tr>
</div>

		</table>
		

</form>
        
</div>
    </div>
   </div>
 </section>

 <?php
   include "lib/footer.php";
 ?>