<?php 
  if(isset($_SESSION["role"])){
    if($_SESSION["role"] == "staff"){
      echo "<script>window.open('./404.php','_self');</script>";
    }
    
  }
 ?>

<div id="live_data">

</div>
<script type="text/javascript">
  $(document).ready(function(){
    function fetch_data(){
       $.ajax({
           url:"inc/selectaccount.php",
           method:"POST",
           success:function(data){
       $('#live_data').html(data);
           }
       });
   }

   fetch_data();
   

   $(document).on('click', '.delbtn', function(){
       var id=$(this).data("id3");
       if(confirm("Are you sure you want to delete this?"))
       {
           $.ajax({
               url:"inc/deleteaccount.php",
               method:"POST",
               data:{id:id},
               dataType:"text",
               success:function(data){
                   fetch_data();
               }
           });
       }
   });


  })
</script>
