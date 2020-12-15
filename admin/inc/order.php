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
          
            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />
            <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" /> 
            
          
          </div>
        </div>
      </div>




 <div id="live_data">

 </div>
 <script type="text/javascript">
   $(document).ready(function(){
    function fetch_data(){
        $.ajax({
            url:"inc/selectorder.php",
            method:"POST",
            success:function(data){
				$('#live_data').html(data);
            }
        });
    }

    fetch_data();

    // $(document).on('click', '.delbtn', function(){
    //     var id=$(this).data("id3");
    //     if(confirm("Are you sure you want to delete this?"))
    //     {
    //         $.ajax({
    //             url:"inc/deleteorder.php",
    //             method:"POST",
    //             data:{id:id},
    //             dataType:"text",
    //             success:function(data){
    //                 fetch_data();
    //             }
    //         });
    //     }
    // });
    $.datepicker.setDefaults({  
          dateFormat: 'yy-mm-dd'   
     });  
     $(function(){  
          $("#from_date").datepicker();  
          $("#to_date").datepicker();  
     });

     $('#filter').click(function(){  
          var from_date = $('#from_date').val();  
          var to_date = $('#to_date').val();
          
          if(from_date != '' && to_date != '')  
          {  
            $.ajax({  
                    url:"inc/selectorder.php",  
                    method:"GET",  
                    data:{from_date:from_date, to_date:to_date},  
                    success:function(data){  
                         $('#live_data').html(data);  
                    }  
               });  
          }  
          else{  
               alert("Please Select Date");  
          }  
     });  


   })
 </script>
<script type="text/javascript">
    $(document).ready(function(){  
     
});  
</script>