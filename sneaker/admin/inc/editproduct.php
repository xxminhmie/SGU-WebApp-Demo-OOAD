
<?php
  $con = mysqli_connect("localhost","root","","website");
  if(isset($_GET['id'])){
    $query = "SELECT * FROM product WHERE id = '".$_GET['id']."'";
    $getthispro = mysqli_query($con, $query);
    //mysqli_close($con);
    $thispro = mysqli_fetch_array($getthispro);
  //}
  //mysqli_close($con);
?>
<!--Forms-->
<h5 class="mt-2">Product Edit</h5><a class="anchor" name="forms"></a>
<div class="row grid-responsive">
  <div class="column ">
    <div class="card">
      <div class="card-block">
        <form action="inc/xulyeditproduct.php" method="post" enctype="multipart/form-data">
            <label for="productID">ProductID</label>
            <input readonly type="text" id="productID" value="<?php echo $thispro['id']; ?>" name="id">
            
            <label for="brandid">BrandID</label>        
            <select id="brandid" name="brandid">
              <?php  
                    
                    $selectbrand = "SELECT * FROM brand";
                    $getlistbrand = mysqli_query($con, $selectbrand);
                    //echo '<script type="text/javascript">alert("'.$thispro["brandid"].'");</script>';
                    while ($rowbrand =  mysqli_fetch_assoc($getlistbrand)) {
                      if ($thispro["brandid"] == $rowbrand["id"]) {
                        echo '<option selected value="'.$rowbrand["id"].'">'.$rowbrand["name"].'</option>';
                      }else{
                        echo '<option value="'.$rowbrand["id"].'">'.$rowbrand["name"].'</option>';
                      } 
                    }
                ?>           
            </select>

            <label for="size">Size</label>
            <select id="size" name="size">
              <?php
                $i = 36;
                while ($i<44) {
                  if($i == $thispro["size"]){
                    echo '<option selected value="'.$i.'">'.$i.'</option>';
                  }else{
                    echo '<option value="'.$i.'">'.$i.'</option>';
                  }
                  $i++;
                }
              ?>           
            </select>

            <label for="color">Color</label>
            <input type="text" id="color" value="<?php echo $thispro['color']; ?>" name="color">

            <label for="name">Name</label>
            <input type="text" id="name" value="<?php echo $thispro['name']; ?>" name="name">

            <label for="image">Image</label>
            <img style="display: block; width: 200px;height: 200px;" src="./image/product/<?php echo $thispro['image']; ?>">
            <input type="file" name="fileupload" id="fileupload" value="<?php echo $thispro['image']; ?>">

            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" value="<?php echo $thispro['quantity']; ?>" name="quantity" min="0">

            <label for="price">Price</label>
            <input type="number" id="price" value="<?php echo $thispro['price']; ?>" name="price" min="0">

            <!-- <label for="status">Status</label>
            <input type="text" id="status" value="<?php echo $thispro['status']; ?>" name="status"> -->

            <input style="display:block;" class="button-primary" type="submit" value="Send" name="submitProduct">
        </form>
      </div>
    </div>
  </div>
</div>

<?php }
  mysqli_close($con);
 ?>
<!-- 
 <script type="text/javascript">
  $(document).on('click','#productID',function(){
    alert("This field is not editable!");
    document.getElementById("productID").disabled = true;
    })
</script> -->
<script type="text/javascript">
  function xulysubmit(){
    var color = document.getElementById("color");
    var colorVal = document.getElementById("color").value.trim();
    var name = document.getElementById("name");
    var nameVal = document.getElementById("name").value.trim();
    var quantity = document.getElementById("quantity");
    var quantityVal = document.getElementById("quantity").value.trim();
    var price = document.getElementById("price");
    var priceVal = document.getElementById("price").value.trim();

    if(!colorVal){
    setErrorFor(color,'Cannot cannot be blank');
    fullname.focus();
    return false;
    }

  }
  function setErrorFor(input,message) {
  const formControl = input.parentElement;
  const small = formControl.querySelector('small');
  small.innerText = message;
  formControl.className = 'form-control error'
}
</script>