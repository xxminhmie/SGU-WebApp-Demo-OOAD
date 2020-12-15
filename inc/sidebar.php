<?php 
$getListBrand = "SELECT * FROM brand WHERE id NOT IN (SELECT id FROM brand WHERE status='deleted')";
$runGetListBrand = mysqli_query($con, $getListBrand);
 ?>
<div class="col-lg-2">
    <div class="hero__categories">
        <div class="hero__categories__all">
            
            <span>Brand</span>
        </div>
        <ul>
            <?php 
                while ($row = mysqli_fetch_array($runGetListBrand)) {
                    echo '
                        <li><a href="shop.php?brand='.$row["id"].'">'.$row["name"].'</a></li>
                    ';
                }
             ?>
            
        </ul>
    </div>
</div>