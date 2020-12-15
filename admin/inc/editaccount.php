<?php 
$con = mysqli_connect("localhost","root","","website");
$accountid = 0;
if(isset($_REQUEST["accountid"])){
  $accountid = $_REQUEST["accountid"];
}

$sql = "SELECT * FROM account WHERE id = '".$accountid."'";
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_array($run);

?>
<!--Forms-->
<h5 class="mt-2">Brand Edit</h5><a class="anchor" name="forms"></a>
<div class="row grid-responsive">
  <div class="column ">
    <div class="card">
      <div class="card-block">
        <form action="inc/xulyeditaccount.php" method="get">
            <input type="text" name="id" value="<?php echo"$accountid"; ?>" style="display: none;">
            <label for="username">Username</label>        
            <input type="text" name="username" required value="<?php echo $row['username']; ?>">
            <label for="password">Password</label>        
            <input type="password" name="password" required value="<?php echo $row['password']; ?>">
            
            <label for="role">Role</label>       

            <select id="role" name="role">
              <?php
              if ($row["role"] == 'admin') {
                  echo '<option value="admin" selected>Admin</option>';
                  echo '<option value="manager">Manager</option>';
                  echo '<option value="staff">Staff</option>';
                  echo '<option value="staff">Customer</option>';
              }
              if ($row["role"] == 'manager') {
                  echo '<option value="admin">Admin</option>';
                  echo '<option value="manager" selected>Manager</option>';
                  echo '<option value="staff">Staff</option>';
                  echo '<option value="staff">Customer</option>';
                }
               if ($row["role"] == 'staff') {
                  echo '<option value="admin">Admin</option>';
                  echo '<option value="manager">Manager</option>';
                  echo '<option value="staff" selected>Staff</option>';
                  echo '<option value="staff">Customer</option>';
                }
                if($row["role"] == 'customer') {
                  echo '<option value="admin">Admin</option>';
                  echo '<option value="manager">Manager</option>';
                  echo '<option value="staff">Staff</option>';
                  echo '<option value="customer" selected>Customer</option>';
                  

                }
              
                ?>           
            </select>

            <label for="fullname">Fullname</label>        
            <input type="text" name="fullname" required value="<?php echo $row['fullname']; ?>">

            <label for="email">Email</label>        
            <input type="email" name="email" required value="<?php echo $row['email']; ?>">

            <label for="address">Address</label>        
            <input type="text" name="address" required value="<?php echo $row['address']; ?>">

            <label for="phone">Phone</label>        
            <input type="text" name="phone" required value="<?php echo $row['phone']; ?>">

            <input style="display:block;" class="button-primary" type="submit" value="Send" name="submitAccount">
        </form>
      </div>
    </div>
  </div>
</div>


