<title>MOTF | Checkout</title>

<?php
session_start();
include_once("authenticate.php");
include_once("includes/header.php");
?>
<style>
    #header-carousel {
        display: none;
    }
</style>


<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Checkout</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Checkout Start -->
<?php
$items = getCartItems();
$subtotal = 0; // Initialize subtotal

foreach ($items as $item) {
    $itemTotal = $item['prod_qty'] * $item['selling_price'];
    $subtotal += $itemTotal;
}
?>
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Colonne Billing Address -->
        <div class="col-lg-6">
            <div class="mb-4">
                <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                <form method="POST" action="functions/placeorder.php">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Enter your full name" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="email" name="email" placeholder="example@email.com" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" name="phone" placeholder="+123 456 789" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" name="zipcode" placeholder="Enter your zip code" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" name="address" placeholder="123 Street" required>
                        </div>
                    </div>
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Payment</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="cod" value="cod">
                                    <label class="custom-control-label" for="cod">COD</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="paypal" value="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer" value="banktransfer">
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <button type="submit" name="placeOrderBtn" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Colonne Order Total -->
        <div class="col-lg-6">
            <div class="mb-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        <?php foreach ($items as $item) { ?>
                            <div class="d-flex justify-content-between">
                                <p><?= $item['name'] ?> (<?= $item['prod_qty'] ?>) </p>
                                <p><?= $item['prod_qty'] * $item['selling_price'] ?>Dh</p>
                            </div>
                        <?php } ?>
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium"><?= $subtotal ?> Dh</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">0 Dh</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold"><?= $subtotal ?> Dh</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>





<?php include("includes/footer.php") ?>