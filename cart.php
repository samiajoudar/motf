<title>MOTF | Your Cart</title>

<?php
session_start();
include("authenticate.php");
include("includes/header.php");
?>
<style>
    #header-carousel {
        display: none;
    }
</style>

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="products.php">Products</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shopping Cart</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<?php
$items = getCartItems();
$subtotal = 0; // Initialize subtotal

foreach ($items as $item) {
    $itemTotal = $item['prod_qty'] * $item['selling_price'];
    $subtotal += $itemTotal;
}
?>

<div class="container-fluid product_data pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordere mb-0">
                <thead class="bg-secondary text-dark">
                    <tr class="text-center">
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php foreach ($items as $item) { ?>
                        <tr>
                            <td class="align-middle"><img src="uploads/<?= $item['image'] ?>" alt="" style="width: 50px;"> <?= $item['name'] ?></td>
                            <td class="align-middle text-center"><?= $item['selling_price'] ?> Dh</td>
                            <td class="align-middle text-center">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus-cart updateQty">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary input-qty text-center" value="<?= $item['prod_qty'] ?>">
                                    <input type="hidden" class="prodId" value="<?= $item['prod_id'] ?>">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus-cart updateQty">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-center"><?= $item['prod_qty'] * $item['selling_price'] ?> Dh</td>
                            <td class="align-middle text-center"><?= $item['size'] ?></td>
                            <td class="align-middle text-center"><?= $item['color'] ?></td>

                            <td class="align-middle text-center"><button class="btn btn-sm btn-primary deleteItem cart_id" value="<?= $item['cid'] ?>"><i class="fa fa-times"></i></button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <!-- <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form> -->
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium"><?= $subtotal ?> Dh</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">0</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold"><?= $subtotal ?> Dh</h5>
                    </div>
                    <a class="btn btn-block btn-primary my-3 py-3" href="checkout.php">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cart End -->

<?php include("includes/footer.php") ?>