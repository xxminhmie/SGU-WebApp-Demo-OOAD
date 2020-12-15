
<?php
  $con = mysqli_connect("sql12.freemysqlhosting.net","sql12382125","SFLxqit2c2","sql12382125");
?>
<!--Forms-->
<h5 class="mt-2">Add New Account</h5><a class="anchor" name="forms"></a>
<div class="row grid-responsive">
  <div class="column ">
    <div class="card">
      <div class="card-block">
        <form action="inc/xulyinsertaccount.php" method="post" enctype="multipart/form-data">
            <!-- <label for="productID">ProductID</label>
            <input type="text" id="productID" value="<?php echo $thispro['id']; ?>" name="id"> -->
            
            <label for="username">Username</label>        
            <input type="text" name="username">
            <label for="password">Password</label>        
            <input type="password" name="password">
            
            <label for="role">Role</label>       
            <select id="role" name="role">
              <option selected value="admin">Admin</option>  
              <option value="manager">Manager</option>
              <option value="customer">Customer</option>
            </select> 

            <label for="fullname">Fullname</label>        
            <input type="text" name="fullname">

            <label for="email">Email</label>        
            <input type="email" name="email">

            <label for="address">Address</label>        
            <input type="text" name="address">

            <label for="phone">Phone</label>        
            <input type="text" name="phone">

            <input style="display:block;" class="button-primary" type="submit" value="Send" name="submitAccount">
        </form>
      </div>
    </div>
  </div>
</div>

<?php 
  mysqli_close($con);
 ?>

 <script type="text/javascript">
  $(document).on('click','#productID',function(){
    alert("This field is not editable!");
    document.getElementById("productID").disabled = true;
    })
</script>