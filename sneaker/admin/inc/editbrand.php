<!--Forms-->
<h5 class="mt-2">Brand Edit</h5><a class="anchor" name="forms"></a>
<div class="row grid-responsive">
  <div class="column ">
    <div class="card">
      <div class="card-block">
        <form action="inc/xulyedit.php" method="get">
            <label for="brandID">BrandID</label>
            <input type="text" id="brandID" value="<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>" name="id" readonly>
            <label for="brandName">Brand Name</label>
            <input type="text" id="brandName" value="<?php if(isset($_GET['name'])){echo $_GET['name'];} ?>" name="name">

            <input style="display:block;" class="button-primary" type="submit" value="Send" name="submitBrand">
        </form>
      </div>
    </div>
  </div>
</div>


