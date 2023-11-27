 <?php
   include "lib/header.php";
   $post = new postfun();
 ?>
<!---sidebar-->
 <?php include "lib/sidebar.php";  ?>
<!---sidebar-->
<div class="col-md-9 py-3">

	<?php

if(isset($_GET['action']) and $_GET['action'] == "postdelete"){
  
  $id = (int) $_GET['id'];
  $sql = "SELECT * from techtouch_post where id=:id";
         $delimg = $post->unlinkimage($sql, $id);

    if($delimg){
	 	 foreach ($delimg as $img) {
                  $dbimg = $img['images'];
                  unlink($dbimg);
	 	 } 	 
	 	

	 }

	 	$sql = "DELETE from techtouch_post where id=:id";
	    $deletepost = $post->delpost($sql, $id);
	 //if($deletepost){
          //echo "<script>alert('Successfully delete post.');</script>";
 	      //echo "<script>window.location.href='showposts.php';</script>";
	 	 
	 	 //}
}//else{
	   //echo "<script>alert('Somethings is wrong.');</script>";
	 //echo "<script>window.location.href='showposts.php';</script>";
//}

//echo delete and images unlink code;
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	 
	 <table class="table table-borderd text-center">
	 <tr class="thead-dark">
	 	<th width="8%">Id</th>
	 	<th width="10%">Catagory</th>
	 	<th width="15%">Title</th>
	 	<th width="21%">Article</th>
	 	<th width="10%">Image</th>
	 	<th width="10%">Author</th>
	 	<th width="10%">Tags</th>
	 	<th width="16%">Action</th>
	 </tr>

	 <?php
         $i = 0;
        $show_post = $post->show_all_post();
         
         if($show_post){
         	 
         	foreach ($show_post as $value) {
         	 $i++;
         		
       
	  ?>
	 	<tr>
	 		<td><?php echo $i;  ?></td>
	 		<td><?php echo $value['cat_name'];  ?></td>
	 		<td><?php echo $value['title'];  ?></td>
	 		<td><?php echo $post->textshort($value['lead'], 46);  ?></td>
	 		<td><img src="<?php echo $value['images'];  ?>" width="80px" height="50px" alt="post imgage"></td>
	 		<td><?php echo $value['author'];  ?></td>
	 		<td><?php echo $value['tags'];  ?></td>
	 		<td>
	 		<a href="edit.php?action=update&updateid=<?php echo $value['id']; ?>" class="btn btn-success btn-sm">Edit</a> || 
	 		<a href="?action=postdelete&id=<?php echo $value['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete post?');">Delete</a>
	 		</td>
	 	</tr>
   <?php  
       }
         }
	  ?>
	 </table>
   

</form>
        
</div>


    </div>
   </div>
 </section>

 <?php
   include "lib/footer.php";
 ?>