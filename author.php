 <?php include"lib/header.php";   ?>
<!----navbar--->

<!----post--->

  <div class="container">
  	<div class="row py-5">
  		<div class="col-lg-8 pb-4">

        <?php
         if(!isset($_GET['writter']) or $_GET['writter'] == null){
           header("location:index.php");
         }else{
          $author = $_GET['writter'];
          $sql = "SELECT * from author where writter = :writter ";
          $result = modal::author($sql, $author);
          //$author_array[] = $result['name'];
           
          

           if($result){
             foreach ($result as $value) {
                  $divided = explode(",", $value["name"]);

        ?>

  			<div class="author" style="overflow: hidden;">
            <table class="table">
              <thead class="bg-dark text-white text-center">
                <tr>
                  <th colspan="2">About Writter</th>
                 
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php 
                       if($author == "Admin"){

                   ?>
                  <td><?php echo $value['name'];  ?></td>
                   <?php }else{ ?>
                  <td><?php echo $divided['0'];  ?></td>
                  <td><?php echo $divided['1'];  ?></td>
                   <?php } ?>
                </tr>

                <tr>

                    <?php 
                       if($author == "Admin"){

                   ?>
                  <td><?php echo $value['data'];  ?></td>
                  <?php }else{ ?>
                  <td><?php echo $value['data'];  ?></td>
                  <td><?php echo $value['data'];  ?></td>
                   <?php } ?>
                </tr>
              </tbody>
            </table>
  				
  			</div>
      <?php  } } } ?>

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