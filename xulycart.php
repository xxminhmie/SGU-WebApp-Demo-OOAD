<?php
include './inc/header.php';
$status="";
    if (isset($_GET['psize'])){
        $size= $_GET['psize'];
        $name = $_GET['pname'];
        $color = $_GET['pcolor'];
        $quantity = $_GET['quantity'];
        $result = mysqli_query($con, "SELECT * FROM product WHERE size = '$size' AND name = '$name' AND color = '$color' ");
        $row = mysqli_fetch_array($result);
        // echo '<script>alert('.$row["id"].');</script>';

        $cartArray = array(
            $row["id"] => array(
                'id'=>$row["id"],
                'quantity'=>$quantity)
        );

        if(empty($_SESSION["shopping_cart"])) {
            $_SESSION["shopping_cart"] = $cartArray;
            echo "<script>alert('Product is added to your cart!');</script>";
        }else{
            $array_keys = array_keys($_SESSION["shopping_cart"]);
            if(in_array($row["id"],$array_keys)) {
               echo "<script>alert('Product is already added to your cart!');</script>";
            } else {
                $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
                 echo "<script>alert('Product is added to your cart!');</script>";
            }
        }
    }
    echo '
              <script type="text/javascript">
                history.back();
                 </script>
              ';
 ?>