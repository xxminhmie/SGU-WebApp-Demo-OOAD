<!-- Table -->

<?php
  $con = mysqli_connect("localhost", "root", "", "website");
  $output = '';
  $query = "SELECT * FROM orderdetail WHERE orderid = '".$_POST["id"]."'";
  $run = mysqli_query($con, $query);
  $output .= '
  <div class="row grid-responsive">
    <div class="column ">
      <div class="card">
        <div class="card-block">
          <table>
            <thead>
              <tr>
                <th>OrderID</th>
                <th>ProductID</th>
                <th>Quantity</th>
                <th>Price Unit(vnđ)</th>
                <th>Price(vnđ)</th>
                
              </tr>
            </thead>
  ';




  $rows = mysqli_num_rows($run);
  $totalQty = 0;
  if($rows > 0){
    while ($row = mysqli_fetch_array($run)) {
      $getPriceById = "SELECT price FROM product WHERE id = '".$row["productid"]."'";
      $runGetPriceById = mysqli_query($con, $getPriceById);
      $rowGetPriceById = mysqli_fetch_array($runGetPriceById);
      
      $totalQty += $row["quantity"];
      $output .= '
      <tr>
        <td>'.$row["orderid"].'</td>
        <td>'.$row["productid"].'</td>
        <td>'.$row["quantity"].'</td>
        <td>'.number_format($rowGetPriceById["price"]).'</td>
        <td>'.number_format($row["price"]).'</td>
        
        </tr>
      ';
    }
    
  }
  $getTotalPriceFromOrder = "SELECT * FROM `order` WHERE id = '".$_POST["id"]."'";
  $runGetTotalPriceFromOrder = mysqli_query($con, $getTotalPriceFromOrder);
  $rowGetTotalPriceFromOrder = mysqli_fetch_array($runGetTotalPriceFromOrder);
  $output .= '
    <tr>
        <td></td>
        <td></td>
        <td>Total:'.$totalQty.'</td>
        <td></td>
        <td style="color:;font-weight: bold">Total Price: '.number_format($rowGetTotalPriceFromOrder["totalprice"]).'</td>
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

