<!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Brand</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php 
                    $getListBrand = "SELECT * FROM brand WHERE id NOT IN (SELECT id FROM brand WHERE status='deleted')";
                    $runGetListBrand = mysqli_query($con, $getListBrand);
                    $i=1;
                    while ($row = mysqli_fetch_array($runGetListBrand)){
                        echo '
                            <div class="col-lg-3">
                                <div class="categories__item set-bg" data-setbg="img/categories/cat-'.$i.'.jpg">
                                    <h5><a href="shop.php?brand='.$row["id"].'">'.$row["name"].'</a></h5>
                                </div>
                            </div>
                        ';
                        $i++;   
                    }
                    ?>   
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->