
<div class="wthree-dot editmodal" id="edit">
  <div class="profile">
    <div class="wrap">
      <div class="content-main">
        <div class="imgeditcontainer">
          <span onclick="document.getElementById('edit').style.display='none'" class="close" title="Close editmodal">&times;</span>
        </div>
        <div class="w3ls-subscribe w3ls-subscribe1" style=" margin-top: -2rem;">
          <h4><a style="color: white;cursor: pointer;" id="login">Sign up</a></h4>

          <div id="live_data_login"></div>

        </div>
      </div>
    </div>
  </div>
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
        url:"inc/signup.php",
        method:"POST",
        success:function(data){
      $('#live_data_login').html(data);
        }
    });
  }
  fetch_data();
});
</script>