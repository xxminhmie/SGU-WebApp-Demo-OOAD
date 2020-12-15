
<?php
  $con = mysqli_connect("localhost","root","","website");
?>
<!--Forms-->
<h5 class="mt-2">Add New Product</h5><a class="anchor" name="forms"></a>
<div class="row grid-responsive">
  <div class="column ">
    <div class="card">
      <div class="card-block">
        <form action="inc/xulyinsertproduct.php" method="post" enctype="multipart/form-data">
            <!-- <label for="productID">ProductID</label>
            <input type="text" id="productID" value="<?php echo $thispro['id']; ?>" name="id"> -->
            
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
            <input type="text" id="color" value="" name="color">

            <label for="name">Name</label>
            <input type="text" id="name" value="" name="name">

            <label for="image">Image</label>
            <!-- <img style="display: block;" src="./image/product/<?php echo $thispro['image']; ?>"> -->
            <input type="file" name="fileupload" id="fileupload" value="">

            <label for="quantity">Quantity</label>
            <input type="text" id="quantity" value="" name="quantity">

            <label for="price">Price</label>
            <input type="text" id="price" value="" name="price">

            <label for="status">Status</label>
            <input type="text" id="status" value="" name="status">

            <input style="display:block;" class="button-primary" type="submit" value="Send" name="submitProduct">
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