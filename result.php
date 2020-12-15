<?php include './inc/header.php' ?>
<?php
$str = "";
if(isset($_REQUEST["search"])){
	$str = $_REQUEST["search"];
}
?>
<section>
    <div class="container">
        <div class="row">
            <?php include './inc/sidebar.php'; ?>
           	<div class="col-lg-9">
				<?php include './inc/search.php';?>
				<div id="paginationdata">
				
				</div>
				<div>
					<?php
						$page_query = "";
						$page_query = "SELECT DISTINCT id, brandid, name, color, price, image FROM product WHERE name like '%".$str."%' ORDER BY id DESC";
						
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
      
      function load(page)  
      {  
           $.ajax({  
                url:"resultlist.php",  
                method:"POST",  
                data:{page:page,
                	str:"<?php if(!isset($_REQUEST["search"])){
                		echo "0";
                	}else{
                		echo $_REQUEST["search"];
                	} ?>"},  
                success:function(data){  
                     $('#paginationdata').html(data);  
                }  
           })  
      } 
      load();  
      $(document).on('click', '.pagination_link', function(){

           var page = $(this).attr("id");
           load(page);
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
