<?php
  $con = mysqli_connect("sql12.freemysqlhosting.net","sql12382125","SFLxqit2c2","sql12382125");
  $output = '';

  if(isset($_REQUEST["from_date"], $_REQUEST["to_date"])){
    $query = "  
           SELECT * FROM `order`
           WHERE "."date"." BETWEEN '".$_REQUEST["from_date"]."' AND '".$_REQUEST["to_date"]."' ORDER BY id DESC
      ";
    $run = mysqli_query($con, $query);
  }else{
    $query = "SELECT * FROM `order` ORDER BY id DESC";
    $run = mysqli_query($con, $query);
  }


  
  
  
  $output .= '
      
      
  <div class="row grid-responsive">
    <div class="column ">
      <div class="card">
        <div class="card-title">
          	<h3>Order List</h3>
        </div>
        <div class="card-block">
          <table>
            <thead>
              <tr>
                <th>OrderID</th>
                <th>AccountID</th>
                <th>Date</th>
                <th>Total Price</th>
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
        <td class="tdname">'.$row["accountid"].'</td>
        <td class="tdname">'.$row["date"].'</td>
        
        <td class="tdname">'.number_format($row["totalprice"]).'</td>
        <td class="tdname">'.$row["status"].'</td>
        <td style="width: 8%;"><button onclick="abc('.$row["id"].')" class="button button-outline" style="border-radius: 0;margin-bottom: 0;padding: 0 12px;">Detail</button></td>
        
      ';
    }
    
  }
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
 <div id="placeorderdetail">
   
 </div>
<script type="text/javascript">
  function abc(id){
    $.ajax({
      url:"inc/orderdetail.php",
      method:"GET",
      data:{id:id},
      success:function(data){
        $("#placeorderdetail").html(data);
      }
    });
                
  }

  
</script>
