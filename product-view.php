<title>MOTF | Product Details</title>

<?php
session_start();
include("includes/header.php");
include_once("functions/userfunctions.php");
?>
<style>
    #header-carousel {
        display: none;
    }
</style>

<?php
if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products", $product_slug);
    $product = mysqli_fetch_array($product_data);

    if ($product) {
        // Fetch sizes and colors for this product
        $product_id = $product['id'];

        // Fetch sizes
        $sizes_query = "SELECT size_id FROM product_sizes WHERE product_id = '$product_id'";
        $sizes_result = mysqli_query($con, $sizes_query);
        $sizes = array();
        while ($row = mysqli_fetch_assoc($sizes_result)) {
            $sizes[] = $row['size_id'];
        }

        // Fetch colors
        $colors_query = "SELECT color_id FROM product_colors WHERE product_id = '$product_id'";
        $colors_result = mysqli_query($con, $colors_query);
        $colors = array();
        while ($row = mysqli_fetch_assoc($colors_result)) {
            $colors[] = $row['color_id'];
        }
?>

        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3"><?= $product['name'] ?></h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="products.php">Products</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">Product Detail</p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Shop Detail Start -->
        <div class="container-fluid product_data py-5">
            <div class="row px-xl-5">
                <div class="col-lg-4 pb-5">
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner border">
                            <div class="carousel-item active">
                                <img class="w-100 h-100" src="uploads/<?= $product['image']; ?>" alt="Image">
                            </div>
                            <!-- You can add more carousel items here if needed -->
                        </div>
                        <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                            <i class="fa fa-2x fa-angle-left text-dark"></i>
                        </a>
                        <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                            <i class="fa fa-2x fa-angle-right text-dark"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-7 pb-5">
                    <h3 class="font-weight-semi-bold"><?= $product['name'] ?></h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                        </div>
                        <small class="pt-1">(<?= $product['qty'] ?>)</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <h3 class="font-weight-semi-bold mb-0"><?= $product['selling_price']; ?> Dh</h3>
                        <h6 class="font-weight-semi-bold mb-0 ml-4 text-muted">
                            <del><?= $product['original_price']; ?> Dh</del>
                        </h6>
                    </div>

                    <p class="mt-4 mb-4"><?= $product['small_description']; ?></p>

                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 150px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary text-center input-qty" value="1" disabled>
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-primary px-3 addToCartBtn" value="<?= $product['id']; ?>"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                    </div>

                    <!-- Display Sizes -->
                    <div class="d-flex mb-3">
                        <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                        <div id="sizes-container">
                            <?php
                            // Fetch sizes for the product
                            $sizes_query = "SELECT s.size_id, s.size_name FROM sizes s JOIN product_sizes ps ON s.size_id = ps.size_id WHERE ps.product_id = '$product_id'";
                            $sizes_result = mysqli_query($con, $sizes_query);

                            if (mysqli_num_rows($sizes_result) > 0) {
                                while ($size = mysqli_fetch_assoc($sizes_result)) {
                            ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="size_<?= $size['size_id'] ?>" name="size" value="<?= $size['size_name'] ?>">
                                        <label class="custom-control-label" for="size_<?= $size['size_id'] ?>"><?= $size['size_name'] ?></label>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "<p>No sizes available</p>";
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Display Colors -->
                    <div class="d-flex mb-3">
                        <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                        <div id="colors-container">
                            <?php
                            $colors_query = "SELECT c.color_id, c.color_name FROM colors c JOIN product_colors pc ON c.color_id = pc.color_id WHERE pc.product_id = '$product_id'";
                            $colors_result = mysqli_query($con, $colors_query);

                            if (mysqli_num_rows($colors_result) > 0) {
                                while ($color = mysqli_fetch_assoc($colors_result)) {
                            ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="color_<?= $color['color_id'] ?>" name="color" value="<?= $color['color_name'] ?>">
                                        <label class="custom-control-label" for="color_<?= $color['color_id'] ?>"><?= $color['color_name'] ?></label>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "<p>No colors available</p>";
                            }
                            ?>
                        </div>
                    </div>
                    <input type="hidden" id="selected-size" name="size" value="">
                    <input type="hidden" id="selected-color" name="color" value="">


                    <div class="d-flex pt-2">
                        <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p><?= $product['description']; ?></p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
                            <p><?= $product['description']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "Product Not Found";
    }
} else {
    echo "Something Went Wrong";
}

include("includes/footer.php");
?>