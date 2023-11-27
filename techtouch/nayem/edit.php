 <?php
   include "lib/header.php";
   $post = new postfun();
 ?>
<!---sidebar-->
 <?php include "lib/sidebar.php";  ?>
<!---sidebar-->
<div class="col-md-9 py-3">
	<div class="row">
 
 
</div>

<form action="" enctype="multipart/form-data" method="post">
	
<table class="table table-borderless">
   
   <?php

   
   if(!isset($_GET['action']) || $_GET['action'] == "update" ||  $_GET['updateid'] == null){

   	 $updateid = $_GET['updateid'];

   	  $sql = "SELECT * from techtouch_post where id=:id";
   	  $showpost = $post->showpostbyid($sql, $updateid);
   	   if($showpost){
   	   	foreach ($showpost as $value) {


 ?>
	<!---title-->
<div class="form-group">
	<tr>
		<td class="text-right" style="width:20%;"><label for="title"><h4>Title</h4></label></td>
		<td style="width:80%;">
<input class="form-control" type="text" name="title" value="<?php echo $value['title']; ?>">	
		</td>
	</tr>
</div>
<!---title-->



<!---catagory-->
	<div class="form-group">
	<tr>
		<td class="text-right"><label for="cat"><h4>Catagory</h4></label></td>
		<td>
         <select class="form-control" name="cat" value="<?php if($showpost == $showcat){
         	echo "selected=selected";
         } ?>">

         	<?php
                   
                   $sql = "SELECT * from cat_table";
                   $showcat = $post->showcat($sql);
         		if($showcat){ foreach ($showcat as $cat) { ?>

         	<option
                 
                 <?php
                   if($value['cat_id'] == $cat['id']){
                   	?>
                      selected="selected"
                   	<?php
                   }
                 ?>

         	value="<?php  echo $cat['id']; ?>">
              <?php  echo $cat['cat_name']; ?>
                
         		
         	</option>

         	<?php 	}
         		} ?>
     	    
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
<img src="<?php echo $value['images']; ?>" class="my-2" height="60px" width="100px" alt="post image">	
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
  <textarea name="lead" class="form-control" rows="2" id="lead">
  	<?php echo $value['lead']; ?>
  </textarea>
		</td>
	</tr>
		</div>
      <!---lead-->

      <!---Article-->

	<div class="form-group">
		<tr>
	<td class="text-right"><label for="body"><h4>Article</h4></label></td>
		<td>
  <textarea name="body" class="form-control" rows="5" id="body">
  	<?php echo $value['body']; ?>
  </textarea>
		</td>
	</tr>
		</div>
	<!---Article-->

	<!---Author-->
<div class="form-group">
<tr>
	<td class="text-right"><label for="author"><h4>Author</h4></label></td>
	<td>
<input class="form-control" type="text" id="author" name="author" value="<?php echo $value['author']; ?>">	
	</td>
    </tr>
</div>
<!---Author-->

<!---tag-->

<div class="form-group">
<tr>
	<td class="text-right"><label for="tag"><h4>Tag & Keywords</h4></label></td>
	<td>
<input class="form-control" type="text" id="tag" name="tag" value="<?php echo $value['tags']; ?>">	
	</td>
    </tr>
</div>
<!---tag-->

<div class="form-group">
<tr>
	<td></td>
	<td>
<input type="submit" name="posts" value="Update" class="btn btn-outline-dark">	
	</td>
    </tr>
</div>

		</table>
	<?php 
         	   		
   	   	}
   	   }

   	 }
	 ?>

</form>
        
</div>
    </div>
   </div>
 </section>

 <?php
   include "lib/footer.php";
 ?>