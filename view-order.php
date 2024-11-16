<title>MOTF | Order Details</title>

<?php
session_start();
include("authenticate.php");
include("includes/header.php");
if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];
    $result = checkTrackingNoValid($tracking_no);
    if (mysqli_num_rows($result) < 0) {
?>
        <h4>Something Went Wrong</h4>
    <?php
        die();
    }
} else {
    ?>
    <h4>Something Went Wrong</h4>
<?php
    die();
}
$data = mysqli_fetch_array($result);
?>
<style>
    #header-carousel {
        display: none;
    }

    .status-under-process {
        color: orange;
    }

    .status-completed {
        color: green;
    }

    .status-cancelled {
        color: red;
    }
</style>

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Order Details</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="my-orders.php">Orders</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Order Details</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->

<div class="container-fluid product_data pt-5">
    <div class="row px-xl-5">
        <div class="col-12 table-responsive mb-5">
            <table class="table table-bordered mb-0 w-100">
                <thead class="bg-secondary text-dark">
                    <tr class="bg-primary text-center">
                        <th colspan="8" class="py-3">Delivery Details</th>
                    </tr>
                    <tr class="text-center">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Tracking No</th>
                        <th>Address</th>
                        <th>Zip Code</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <tr>
                        <td class="align-middle text-center"><?= $data['name'] ?></td>
                        <td class="align-middle text-center"><?= $data['email'] ?></td>
                        <td class="align-middle text-center"><?= $data['phone'] ?></td>
                        <td class="align-middle text-center"><?= $data['tracking_no'] ?></td>
                        <td class="align-middle text-center"><?= $data['address'] ?></td>
                        <td class="align-middle text-center"><?= $data['zipcode'] ?></td>
                        <td class="align-middle text-center"><?= $data['payment_mode'] ?></td>
                        <td class="align-middle text-center">
                            <?php
                            $statusClass = '';
                            $statusText = '';

                            if ($data['status'] == 0) {
                                $statusClass = 'status-under-process';
                                $statusText = 'Under Process';
                            } else if ($data['status'] == 1) {
                                $statusClass = 'status-completed';
                                $statusText = 'Completed';
                            } else if ($data['status'] == 2) {
                                $statusClass = 'status-cancelled';
                                $statusText = 'Cancelled';
                            }
                            ?>
                            <span class="<?php echo $statusClass; ?>"><?php echo $statusText; ?></span>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col-12 table-responsive mb-5">
            <table class="table table-bordered mb-0 w-100">
                <thead class="bg-secondary text-dark">
                    <tr class="bg-primary text-center">
                        <th colspan="6" class="py-3">Order Details</th>
                    </tr>
                    <tr class="text-center">
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                    $user_id = $_SESSION['auth_user']['user_id'];
                    $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty ,p.* FROM orders o JOIN orders_items oi ON o.id = oi.order_id JOIN products p ON p.id = oi.prod_id WHERE o.user_id = '$user_id' AND o.tracking_no = '$tracking_no'";
                    $order_result = mysqli_query($con, $order_query);

                    $total_price = 0; // Initialize total price variable

                    if (mysqli_num_rows($order_result) > 0) {
                        while ($item = mysqli_fetch_assoc($order_result)) {
                            $item_total = $item['price'] * $item['orderqty'];
                            $total_price += $item_total;
                    ?>
                            <tr>
                                <td class="align-middle"><img src="uploads/<?= $item['image'] ?>" alt="" style="width: 50px;"> <?= $item['name'] ?></td>
                                <td class="align-middle text-center"><?= $item['price'] ?> Dh</td>
                                <td class="align-middle text-center"><?= $item['orderqty'] ?></td>
                                <td class="align-middle text-center"><?= $item['size'] ?></td>
                                <td class="align-middle text-center"><?= $item['color'] ?></td>
                                <td class="align-middle text-center"><?= $item_total ?> Dh</td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                    <tr class="bg-secondary text-dark text-center mb-2">
                        <th colspan="5" class="py-3">Total</th>
                        <td class="align-middle text-center"><?= $total_price ?> Dh</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>



<!-- Cart End -->

<?php include("includes/footer.php") ?>