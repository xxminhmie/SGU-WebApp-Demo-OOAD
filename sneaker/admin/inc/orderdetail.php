<!-- Form -->

<div id="edit" class="editmodal">
  <form class="editmodal-content animate" action="inc/xulyorder.php" method="post">
    <div class="imgeditcontainer">
      <span onclick="document.getElementById('edit').style.display='none'" class="close" title="Close editmodal">&times;</span>
    </div>

    <div class="editcontainer">
      <div id="abcd" class="">
        <h3>Order Detail</h3>
      </div>
      
      <!-- table get from select orderdetail -->
      <div id="live_data_orderdetail"></div>
      <input type="text" name="orderid" style="display: none;" value="<?php echo $_GET['id']; ?>">
      <button id="confirm" name="confirm" type="submit" class="button">Confirm</button>
    </div>
  </form>
</div>

<script>
// Get the editmodal
var editmodal = document.getElementById('edit');
$(document).ready(function(){
      editmodal.style.display = "block";
});


// When the user clicks anywhere outside of the editmodal, close it
window.onclick = function(event) {
    if (event.target == editmodal) {
        editmodal.style.display = "none";
    }
}
</script>


<script type="text/javascript">
   $(document).ready(function(){
     function fetch_data(){
        $.ajax({
            url:"inc/selectorderdetail.php",
            method:"POST",
            data:{id:<?php echo $_GET["id"]; ?>},
            success:function(data){
        $('#live_data_orderdetail').html(data);
            }
        });
    }

    fetch_data();

    $(document).on('click', '#confirm', function(){
        
    });


   })


 </script>
