<?php
$con = mysqli_connect("sql12.freemysqlhosting.net","sql12382125","SFLxqit2c2","sql12382125");
$output = '';


$query = "SELECT * FROM product";
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
              <th>Brand</th>
              <th>Size</th>
              <th>Color</th>
              <th>Name</th>
              <th>Image</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Status</th>
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
      <td class="tdid">'.$row["brandid"].'</td>
      <td class="tdid">'.$row["size"].'</td>
      <td class="tdid">'.$row["color"].'</td>
      <td style="width: 24%" class="tdname">'.$row["name"].'</td>
      <td style="width: 24%" class="tdid">'.$row["image"].'</td>
      <td class="tdid">'.$row["quantity"].'</td>
      <td class="tdid">'.$row["price"].'</td>
      <td  class="tdid">'.$row["status"].'</td>



      <td><a href="?action=editproduct&id='.$row["id"].'"
      onclick="editBrand()"
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
                <td></td>
                <td></td>
                <td style="width: 16%;"><a id="btnadd" style="font-size: 18px; cursor: pointer;"  href="?action=insertproduct">ADD</a></td>
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


