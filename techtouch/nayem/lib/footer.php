
<!---sidebar end-->


 <!---jquery linkup here-->
  <script src="js/jquery.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="ckeditor/ckeditor.js"></script>
  
   <script>
   	CKEDITOR.replace("body");
   </script>

   <script>  	   		

   		function delconfirm(){
   			var con = confirm("Are you sure delete?");
   			if(con == true){
   				alert("Successfully Delete Post!");
   			}else{
   				alert("Post are save without delete!");
   			}
   		}
   </script>

 <!---jquery linkup end-->
	
</body>
</html>


