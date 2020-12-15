<?php 
  if(isset($_SESSION["role"])){
    if($_SESSION["role"] == "staff" || $_SESSION["role"] == "admin"){
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
           url:"inc/selectproduct.php",
           method:"POST",
           success:function(data){
       $('#live_data').html(data);
           }
       });
   }

   fetch_data();
   //ADD new Product
   // $(document).on('click','#newname',function(){
   //   document.getElementById('newname').innerHTML = '';
   //   document.getElementById('newname').style.color = "black";
   // })
   // $(document).on('click','#btnadd',function(){
   //   var name = $('#newname').text();
   //   if(name == '' || name == 'Insert new Brand'){
   //         alert("Enter Brand Name");
   //         return false;
   //   }
   //   $.ajax({
   //     url:"inc/insertbrand.php",
   //     method:"POST",
   //     data:{name:name},
   //     dataType:"text",
   //     success:function(data){
   //       fetch_data();
   //     }
   //   })
   // })

   $(document).on('click', '.delbtn', function(){
       var id=$(this).data("id3");
       if(confirm("Are you sure you want to delete this?"))
       {
           $.ajax({
               url:"inc/deleteproduct.php",
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

