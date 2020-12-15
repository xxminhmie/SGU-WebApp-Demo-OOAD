<?php
$con = mysqli_connect("sql12.freemysqlhosting.net","sql12382125","SFLxqit2c2","sql12382125");
$output = '';


$query = "SELECT * FROM account ";
$run = mysqli_query($con, $query);
$output .= '
<div class="row grid-responsive">
  <div class="column ">
    <div class="card">
      <div class="card-title">
        	<h3>Product List</h3>
      </div>
      <div class="card-block">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Role</th>
              <th>Fullname</th>
              <th>Email</th>
              <th>Address</th>
              <th>Phone</th>
              
              <th></th>
            </tr>
          </thead>
';
$rows = mysqli_num_rows($run);
if($rows > 0){
  while ($row = mysqli_fetch_array($run)) {
    $output .= '
    <tr>
      <td class="tdid">'.$row["id"].'</td>
      <td class="tdid">'.$row["username"].'</td>
      <td class="tdid">'.$row["role"].'</td>
      <td class="tdid">'.$row["fullname"].'</td>
      <td class="tdid">'.$row["email"].'</td>
      <td class="tdid">'.$row["address"].'</td>
      <td  class="tdid">'.$row["phone"].'</td>



      <td><a href="?action=editaccount&accountid='.$row["id"].'"
      onclick="editAccount()"
       style="color:rgb(73, 75, 74); cursor:pointer;">Edit </a> ||
      <a data-id3="'.$row["id"].'" class="delbtn" style="color:rgb(207, 88, 88);cursor:pointer;"> Delete</a></td>
    ';
  }
  
}
$output .= '
           <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
                <td style="width: 16%;"><a id="btnadd" style="font-size: 18px; cursor: pointer;"  href="?action=insertaccount">ADD</a></td>
           </tr>
      ';
$output .= '
</tbody>
</table>
</div>
</div>
</div>
</div>
';

echo $output;
mysqli_close($con);

 ?>
