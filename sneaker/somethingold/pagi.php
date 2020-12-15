<!-- 
<?php
include './inc/header.php';
if(!$con){
  echo 'erro' . mysqli_connect_error();
}
?> -->
<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="./css/flexboxgrid.css">
    <link rel="stylesheet" type="text/css" href="./css/styleindex.css">

    <script src="./js/jquery-3.4.1.js"></script>
	<script src="./js/jquery.min.js"></script>
	<script src="./admin/js/jquery-3.5.1.min.js" charset="utf-8"></script>
  </head>


<body>
	<div class="containner-fluid">
		<div class="container"> -->
			<div id="pagination_data">
				
			</div>
			<div>
				<?php
					$con = mysqli_connect("localhost","root","","website");
					$page_query = "SELECT * FROM product ORDER BY id DESC";
					$page_result = mysqli_query($con, $page_query);  
					$total_records = mysqli_num_rows($page_result);  
					$total_pages = ceil($total_records/6); 


					 ?>
 
				<?php 
					$output ='';
					for($i=1; $i<=$total_pages; $i++){  
					      $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
					}  
					 $output .= '</div><br /><br />';  
					 echo $output;
					 echo '
					 <p id="tongtrang" class="'.$total_pages.'" style="margin: 0">Total Pages: '.$total_pages.' </p>
					 ';
				?>

			</div>
<!-- 		</div>
	</div>
	
</body>
 --><!-- Pagination Ajax -->
<script>  
 $(document).ready(function(){  
      load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"productlist.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('#pagination_data').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){

           var page = $(this).attr("id");
           load_data(page);
           var tongtrang = parseInt($(document.getElementById("tongtrang")).attr("class"));

           for(var i=1; i<=tongtrang; i++){
	           	if(i == page){
	           		$(document.getElementById(page)).addClass("pagi-active");
	           	}else{
	           		$(document.getElementById(i)).removeClass("pagi-active");
	           	}
            }
           //alert(tongtrang+2);
           //


      });

      $(document.getElementById("1")).addClass("pagi-active"); 

 });  
 </script>  

<?php include ('./inc/footer.php'); ?>

 