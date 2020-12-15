<?php
  $con = mysqli_connect("sql12.freemysqlhosting.net","sql12382125","SFLxqit2c2","sql12382125");
  $output = '';
  //$query = "SELECT * FROM brand";
  $query = "SELECT * FROM brand WHERE id NOT IN (SELECT id FROM brand WHERE status='deleted')";
  $run = mysqli_query($con, $query);
  $output .= '
  <div class="row grid-responsive">
    <div class="column ">
      <div class="card">
        <div class="card-title">
          	<h3>Brand List</h3>
        </div>
        <div class="card-block">
          <table>
            <thead>
              <tr>
                <th>BrandID</th>
                <th style="width: 56%;">Name</th>
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
        <td  style="width: 56%;" class="tdname">'.$row["name"].'</td>
        <td><a href="?action=editbrand&id='.$row["id"].'&name='.$row["name"].'"
        onclick="editBrand()"
         style="color:rgb(73, 75, 74); cursor:pointer;">Edit </a> ||
        <a data-id3="'.$row["id"].'" class="delbtn" style="color:rgb(207, 88, 88);cursor:pointer;"> Delete</a></td>
      ';
    }
    
  }
  $output .= '
             <tr>
                  <td></td>
                  <td id="newname" contenteditable style="color:#a7a7a7">Insert new Brand</td>
                  <td style="width: 16%;"><a id="btnadd" style="font-size: 18px; cursor: pointer;">ADD</a></td>
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
