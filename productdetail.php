
<?php include './inc/header.php' ?>

<?php 
$id = "";
if(isset($_REQUEST["productid"])){
    $id = $_REQUEST["productid"];
}
// else{
//     echo "<script>window.open('index.php','_self')</script>";
// }

$query = "SELECT * FROM product WHERE id = '$id' LIMIT 1";
$runGetProById = mysqli_query($con, $query);
$row = mysqli_fetch_array($runGetProById);

$getBrand = "SELECT name FROM brand WHERE id = '".$row["brandid"]."'";
$runGetBrand = mysqli_query($con, $getBrand);
$brand = mysqli_fetch_array($runGetBrand);

echo '
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="./admin/image/product/'.$row["image"].'" alt="">
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    
                    <h3 style="font-size: 32px;">'.$row["name"].'</h3>
                    <h4>'.$brand["name"].'</h4>
                    <h5 style="color: #AAAAAA">Color: '.$row["color"].'</h5>
                    
                    <div class="product__details__price">'.number_format($row["price"]).'vnd</div>
                    <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam
                        vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet
                        quam vehicula elementum sed sit amet dui. Proin eget tortor risus.</p>
                    
                    <div>
                        <p style="margin: 0;">Size: </p>
                        <form action="xulycart.php" method="get">
                        <input type="radio" name="psize" value="36" checked>36
                        <input type="radio" name="psize" value="37">37
                        <input type="radio" name="psize" value="38">38
                        <input type="radio" name="psize" value="39">39
                        <input type="radio" name="psize" value="40">40
                        <input type="radio" name="psize" value="41">41
                        <input type="radio" name="psize" value="42">42
                        <input type="radio" name="psize" value="43">43

                    </div>
                    <div class="product__details__quantity">
                        <p style="margin: 0;">Quantity: </p>
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="1" name="quantity">
                            </div>
                        </div>
                    </div>
                    
                        <input type="" name="pname" value="'.$row["name"].'" style="display: none;">
                        <input type="" name="pcolor" value="'.$row["color"].'" style="display: none;">
                        
                        <button href="#" type="submit" class="primary-btn">ADD TO CART</button>
                    </form>
                    
                    
                     
                    <ul>
                        <li><b>Availability</b> <span>'.$row["quantity"].'</span></li>
                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="404.php"><i class="fa fa-facebook"></i></a>
                                <a href="404.php"><i class="fa fa-twitter"></i></a>
                                <a href="404.php"><i class="fa fa-instagram"></i></a>
                                <a href="404.php"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>


';
?>
<!-- Product Details Section Begin -->

    <!-- Product Details Section End -->
    <?php include './inc/footer.php'; ?>    


