<title>MOTF | My Orders</title>

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
        <h1 class="font-weight-semi-bold text-uppercase mb-3">My Orders</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="products.php">Products</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">My Orders</p>
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
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Tracking No</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                    $items = getOrders();
                    if (empty($items)) {
                        echo '<tr><td colspan="5" class="text-center">No orders found</td></tr>';
                    } else {
                        foreach ($items as $item) { ?>
                            <tr>
                                <td class="align-middle text-center"><?= $item['id'] ?></td>
                                <td class="align-middle text-center"><?= $item['tracking_no'] ?></td>
                                <td class="align-middle text-center"><?= $item['total_price'] ?> Dh</td>
                                <td class="align-middle text-center"><?= $item['created_at'] ?></td>
                                <td class="text-center">
                                    <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary">View Details</a>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- Cart End -->

<?php include("includes/footer.php") ?>