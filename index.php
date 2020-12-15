
<?php
include './inc/header.php';
?>

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <?php include './inc/sidebar.php'; ?>
            <?php include './inc/content.php'; ?>
        </div>
    </div>
</section>

<?php 
	if(!isset($_REQUEST["brand"])){
		include './inc/brand.php'; 
		include './inc/feature.php';
	}
 ?>

<?php include './inc/footer.php'; ?>

    





