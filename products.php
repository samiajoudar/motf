<?php
session_start();
include("includes/header.php");
include_once("functions/userfunctions.php");

// Get category and subcategory slugs from query parameters
$category_slug = isset($_GET['category']) ? $_GET['category'] : '';
$subcategory_slug = isset($_GET['subcategory']) ? $_GET['subcategory'] : '';

// Initialize category and subcategory IDs
$category_id = null;
$subcategory_id = null;

// Fetch category data if a category slug is provided
if ($category_slug) {
    $category_data = getSlugActive("categories", $category_slug);
    $category = mysqli_fetch_array($category_data);

    if ($category) {
        $category_id = $category['id'];
    }
}

// Fetch subcategory data if a subcategory slug is provided
if ($subcategory_slug) {
    $subcategory_data = getSlugActive("sous_categories", $subcategory_slug);
    $subcategory = mysqli_fetch_array($subcategory_data);

    if ($subcategory) {
        $subcategory_id = $subcategory['id'];
    }
}

// Fetch products based on category and/or subcategory
if ($category_id && $subcategory_id) {
    // Fetch products that match both category and subcategory
    $products = getProductsByCategoryAndSubcategory($category_id, $subcategory_id);
} elseif ($category_id) {
    // Fetch products that match category only
    $products = getProductsByCategory($category_id);
} else {
    // Fetch all active products if no category is specified
    $products = getAllActive("products");
}

?>

<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5">
            <span class="px-2">
                <?php
                if ($category_id) {
                    echo htmlspecialchars($category['name']);
                    if ($subcategory_id) {
                        echo " - " . htmlspecialchars($subcategory['name']);
                    }
                } else {
                    echo "All Products";
                }
                ?>
            </span>
        </h2>
    </div>
    <div class="row px-xl-5 pb-3">
        <?php
        if (mysqli_num_rows($products) > 0) {
            while ($item = mysqli_fetch_assoc($products)) {
                // Display each product
        ?>
                <div class="col-lg-2 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <a href="product-view.php?product=<?= urlencode($item['slug']); ?>" class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="uploads/<?= htmlspecialchars($item['image']); ?>" alt="<?= htmlspecialchars($item['name']); ?>">
                            </a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><?= htmlspecialchars($item['name']); ?></h6>
                            <div class="d-flex justify-content-center">
                                <h6><?= htmlspecialchars($item['selling_price']); ?> Dh</h6>
                                <h6 class="text-muted ml-2">
                                    <del><?= htmlspecialchars($item['original_price']); ?> Dh</del>
                                </h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="product-view.php?product=<?= urlencode($item['slug']); ?>" class="btn btn-sm text-dark p-0">
                                <i class="fas fa-eye text-primary mr-1"></i>View Detail
                            </a>
                            <a href="#" class="btn btn-sm text-dark p-0" data-product-id="<?= $item['id']; ?>" id="addToCartLink">
                                <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart
                            </a>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "No Data Available";
        }
        ?>
    </div>
</div>
<!-- Products End -->

<?php
include("includes/footer.php");
?>