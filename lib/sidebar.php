
<div class="col-lg-4">

<!--searach box-->
<div class="search-bar">
  <h2 class="card-title text-center bg-dark text-white py-1">Search</h2>            
    <div class="card">            
      <div class="card-body text-center" >  
   
          <form action="search.php" class="form-inline" method="get">

   
          <div class="input-group">             
            <input type="search" class="form-control" name="search">               
          <div class="input-group-prepend">
          <input type="submit" class="btn btn-outline-dark" value="Search" name="blog">
          </div>
          </div>
          </form>
      </div>
    </div>
</div>

<!--searach box end-->

<div class="catagory py-4">
  <h2 class="card-title text-center bg-dark text-white py-1">Catagory</h2>
    <div class="card text-left">   		
    	<ul class="list-group list-group-flush pt-0">
          <?php

          $sql = "SELECT * from cat_table";
          $result = $modal->allselect($sql);

           if($result){
             foreach ($result as $value) {
               
          
        ?>
    		<li class="list-group-item list-group-item-action d-flex align-items-center ">
    			<a href="posts.php?catagoryid=<?php echo $value['id']; ?>" style="width:80%"><?php echo $value['cat_name']; ?></a>

        <?php
          $cat_id = $value["id"];
          $sql = "SELECT * from techtouch_post where cat_id = :id ";
          $count = $modal->countcat($sql, $cat_id);                     
               
        ?>
    			<span class="badge badge-info" style="width:5%; text-align: center;">
            <?php 
              if(isset($count)){
                echo $count; }
              ?>
           </span>
         
    		</li>

      <?php } } else{
        echo "No catagory create.";
      } ?>

    		
    	</ul>
    </div>
</div>
<!--Catagory box end-->


<!--recent post-->

<div class="recent-post">
	<h2 class="card-title text-center bg-dark text-white py-1">Latest Post</h2>
	 <div class="card list-group list-group-flush">
               <?php
          $sql = "SELECT * from techtouch_post order by id desc limit 4";
          $result = $modal->allselect($sql);

           if($result){
             foreach ($result as $value) {
               
          
        ?>
	 	  <div class="latest-post list-group-item list-group-item-action" >

	 	  	<a href="readpost.php?id=<?php echo $value['id'];  ?>"><img src="nayem/<?php echo $value['images']; ?>" class="img-fluid img-thumbnail"></a>
	 	  	<a href="readpost.php?id=<?php echo $value['id'];  ?>" style="text-decoration: none; color:#000;"><h2><?php echo $value['title']; ?></h2></a>
	 	  	<p><?php echo $value['lead']; ?></p>
	 	  </div>
       <?php } } ?>

	 </div>
	 </div>
	  <!--recent post-->

	   <!--latest post video-->
   <div class="post-video py-4">
   	<h2 class="card-title text-center text-white bg-dark">Latest Video</h2>
    <div class="card">
    	<video style="width:100%" height="240" controls>

    		<source src="images/myvideo.mp4" type="video/mp4">
    			your browser dose not support video
    	<p><a href="/media/video.oga">Download this video file.</a></p>         	
    	</video>
    </div>
   </div>
	    <!--latest post video-->

</div>