<?php 
  if(isset($_SESSION["role"])){
    if($_SESSION["role"] == "admin"){
      echo "<script>window.open('./404.php','_self');</script>";
    }
    
  }
 ?>

<div class="row grid-responsive">
    <div class="column page-heading">
      <div class="large-card">
      	<h2>Report</h2>
        <div>
        	<h5>Choose time:</h5>
			<input type="radio" name="radio" id="rdate"> Date
			<input type="radio" name="radio" id="rmonth"> Month
			<input type="radio" name="radio" id="ryear"> Year

			<div id="Date" style="display: none;">
			 <input type="text" name="" id="date" class="form-control" placeholder="Date" /> 
			</div>

			<div id="Month" style="display: none;">
				<select id="month">
					  <?php 
					  	$m = 1;
					  	while ($m<13) {
					  		echo '<option value="'.$m.'">'.$m.'</option>';
					  		$m++;
					  	}
					   ?>
				</select>
				<select id="monthyear">
			  		<?php 
			  			$startyear=2019;
			  			while ($startyear<=date("Y")) {
			  				echo '<option value="'.$startyear.'">'.$startyear.'</option>';
			  				$startyear++;
			  			}
			  		 ?>
					
				</select>
			</div>

			<div id="Year" style="display: none;">
			  	<select id="year">
			  		<?php 
			  			$startyear=2019;
			  			while ($startyear<=date("Y")) {
			  				echo '<option value="'.$startyear.'">'.$startyear.'</option>';
			  				$startyear++;
			  			}
			  		 ?>
					
				</select>
			</div>
        </div>
        <div>
        	<h5>Choose brand:</h5>
        	<select id="brand">
        		<option value="0" selected>ALL</option>
        		<?php
        			$con = mysqli_connect("localhost","root","","website");
        			$getListBrand = "SELECT * FROM brand WHERE id NOT IN (SELECT id FROM brand WHERE status='deleted')";
        			$runGetListBrand = mysqli_query($con, $getListBrand);
        			if($runGetListBrand){
        				while ($row = mysqli_fetch_array($runGetListBrand)) {
        				echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
        			}
        		}else{

        		 echo "no";
        		}
        		?>
        	</select>
        </div>
        <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info"/> 
      </div>
    </div>
  </div>
  <div id="live_data">
  	
  </div>
<script type="text/javascript">
	$(document).ready(function(){
		$.datepicker.setDefaults({  
          dateFormat: 'yy-mm-dd'   
	     });  
	     $(function(){  
	          $("#date").datepicker();  
	     });
	     function fetch_data(){
	        $.ajax({
	            url:"inc/selectreport.php",
	            method:"POST",
	            success:function(data){
					$('#live_data').html(data);
	            }
	        });
	    }

    fetch_data();

	})
	


	$('#filter').click(function(){
		var date = "";
		var month = "";
		var monthyear = "";
		var year = "";
		// var time = "";
		if(document.getElementById('rdate').checked == true){
			// time = document.getElementById('date').value;
			date = document.getElementById('date').value;
		}
		if(document.getElementById('rmonth').checked == true){
			// var selectedM = $('#month').find(":selected").text();
			// if(selectedM < 10){
			// 	selectedM = "0"+selectedM;
			// }
			// var selectedY = $('#monthyear').find(":selected").text();
			// time = selectedY +"-"+ selectedM+"-00";
			month = $('#month').find(":selected").text();
			monthyear = $('#monthyear').find(":selected").text();
		}
		if(document.getElementById('ryear').checked == true){
			// var selectedY = $('#year').find(":selected").text();
			// time = selectedY+"-00-00";
			year = $('#year').find(":selected").text();
		}
		var brand = $('#brand').find(":selected").val();
		// alert(date);
		// alert(month);
		// alert(monthyear);
		// alert(year);
		// alert(brand);
        $.ajax({  
                url:"inc/selectreport.php",  
                method:"GET",  
                data:{date:date,
                	month:month,
                	monthyear:monthyear,
                	year:year,
                	brand:brand},  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
          
           
     });

	$('#rdate').click(function(){
		if(document.getElementById('rdate').checked == true){
			document.getElementById('Date').style.display = "block";
			document.getElementById('Month').style.display = "none";
			document.getElementById('Year').style.display = "none";
		}
	})
	$('#rmonth').click(function(){
		if(document.getElementById('rmonth').checked == true){
			document.getElementById('Month').style.display = "block";
			document.getElementById('Date').style.display = "none";
			document.getElementById('Year').style.display = "none";
		}
	})
	$('#ryear').click(function(){
		if(document.getElementById('ryear').checked == true){
			document.getElementById('Year').style.display = "block";
			document.getElementById('Month').style.display = "none";
			document.getElementById('Date').style.display = "none";
		}
	})
	
</script>
