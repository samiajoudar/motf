<title>MOTF | Categories</title>

<?php
session_start();
include("includes/header.php");
include_once("functions/userfunctions.php");
?>
<!-- Categories Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Categories</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        <?php
        $categories = getAllActive("categories");
        if (mysqli_num_rows($categories) > 0) {
            foreach ($categories as $item) {
        ?>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                        <!-- <p class="text-right">15 Products</p> -->
                        <a href="products.php?category=<?= $item['slug']; ?>" class="cat-img position-relative overflow-hidden mb-3">
                            <img class="img-fluid" src="uploads/<?= $item['image']; ?>" alt="">
                        </a>
                        <h5 class="font-weight-semi-bold m-0"><?= $item['name']; ?></h5>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "No Data Available";
        } ?>
    </div>

</div>
<!-- Categories End -->
<?php include("includes/footer.php") ?>