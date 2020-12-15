<?php include './inc/header.php' ?>
<section>
    <div class="container">
        <div class="row">
            <?php include './inc/sidebar.php'; ?>
           	<div class="col-lg-9">
				<?php include './inc/search.php';?>
				<div id="pagination_data">
				
				</div>
				<div>
					<?php
						$con = mysqli_connect("localhost","root","","website");
						$page_query = "";
						if(isset($_REQUEST["brand"])){
							$page_query =
							 "SELECT DISTINCT id, brandid, name, color, price, image FROM product WHERE brandid = '".$_REQUEST["brand"]."' ORDER BY id DESC" ;
						}
						else{
							$page_query = "SELECT DISTINCT id, brandid, name, color, price, image FROM product ORDER BY id DESC";
						}
						//echo $page_query;
						$page_result = mysqli_query($con, $page_query);  
						$total_records = mysqli_num_rows($page_result);  
						$total_pages = ceil($total_records/9); 


						 ?>
	 
					<?php 
						$output ='';
						for($i=1; $i<=$total_pages; $i++){  
						      $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc; display:inline-block;' id='".$i."'>".$i."</span>";  
						} 
						 echo '
							<div style="margin-bottom: 10px;">'.$output.'</div>
						 ';

						 echo '
						 <p id="tongtrang" class="'.$total_pages.'" style="margin: 0; display:hidden;">Total Pages: '.$total_pages.' </p>
						 ';
					?>

				</div>
			</div>

        </div>
    </div>
</section>


<script>  
 $(document).ready(function(){  
      load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"productlist.php",  
                method:"POST",  
                data:{page:page,
                	brand:<?php if(!isset($_REQUEST["brand"])){
                		echo "0";
                	}else{
                		echo $_REQUEST["brand"];
                	} ?>},  
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

<?php include './inc/footer.php'; ?>
