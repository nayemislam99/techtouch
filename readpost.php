 <?php include"lib/header.php";   ?>
<!----navbar--->

<!----post--->

  <div class="container">
  	<div class="row py-5">
  		<div class="col-lg-8 pb-4">
          
          <?php
           $checkid = $_GET['id'];
  if(!isset($checkid) and $checkid == null){
             header("location:index.php");
          }
          else

          {

          $id= (int) $_GET['id'];
          $sql = "SELECT * from techtouch_post Where id=:id";
          $result = $modal->matchwithid($sql, $id);

           if($result){

             foreach ($result as $value){
             
               
          
        ?>
  			<div class="post" style="overflow: hidden;">
  				<img src="nayem/<?php echo $value['images']; ?>" class="img-fluid img-thumbnail">
  				<h2><?php echo $value['title']; ?></h2>
  				<p><?php echo $modal->mygettime($value['date']); ?>
          <span>
            <a href=""><?php echo $value['author']; ?></a>
          </span>
           </p>
  				<p><?php echo $value['body']; ?></p>  			  

  				 <hr> 
  			</div>
          
          

        <!--related post-->
         <div class="related-post">
           <h2 class="card-title bg-dark text-center px-4 text-white d-inline-block">Related Post</h2>

            <div class="row">
                   <?php 
                      
                      $sql = "SELECT cat_table.id, techtouch_post.* from cat_table inner join techtouch_post on cat_table.id=techtouch_post.cat_id order by rand() limit 2";
                      $related_post = $modal->relatedpost($sql);

                        if($related_post){
                          foreach ($related_post as $rpost) {
                    ?>
              <div class="w-50">
                <div class="col r-head">
                <a href="?id=<?php echo $rpost['id']; ?>"><img src="nayem/<?php echo $rpost['images']; ?>" class="img-fluid img-thumbnail"></a>
                
                  <a href="?id=<?php echo $rpost['id']; ?>"><h4><?php echo $rpost['title']; ?></h4>

                 
                  </div>
                </div>
                   <?php  } }else{  ?>
                    <h3 class="mx-auto">No related post are available</h3>
                    <?php } ?>
                 
     
                  </div>   
            
        <hr>
    
          
      
         </div>
           <?php  } } }  ?>
      
         <!--related post end-->

            <div class="my-disqus py-5">
                                 
                <div id="disqus_thread"></div>
                  <script>

                  /**
                  *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                  *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                  /*
                  var disqus_config = function () {
                  this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                  this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                  };
                  */
                  (function() { // DON'T EDIT BELOW THIS LINE
                  var d = document, s = d.createElement('script');
                  s.src = 'https://techtouch-3.disqus.com/embed.js';
                  s.setAttribute('data-timestamp', +new Date());
                  (d.head || d.body).appendChild(s);
                  })();
                  </script>
                  <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            </div>

  		</div>

  		<!----sidebar--->


  			<!--searach box end-->
             
             <!--Catagory box-->
            <?php include"lib/sidebar.php";   ?>
             <!----sidebar end div--->
             


           </div>

           <!----row end--->

  		</div>
          <!----container end--->
  	

<!----footer--->
 <?php include"lib/footer.php";   ?>
 <!----footer end--->