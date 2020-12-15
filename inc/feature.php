    <!-- Featured Section Begin -->

<?php 
$getListPro = "SELECT DISTINCT id, image, price, name FROM product ORDER BY RAND() LIMIT 8";
$runGetListPro = mysqli_query($con, $getListPro);
 ?>
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php 
                    while ($row = mysqli_fetch_array($runGetListPro)) {
                        echo '
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="featured__item">
                                    <div class="featured__item__pic set-bg" data-setbg="./admin/image/product/'.$row["image"].'">
                                        <ul class="featured__item__pic__hover">
                                            <li><a href="productdetail.php?productid='.$row["id"].'"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="productdetail.php?productid='.$row["id"].'">'.$row["name"].'</a></h6>
                                        <h5>'.number_format($row["price"]).'vnd</h5>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                 ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->