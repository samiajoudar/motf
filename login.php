<title>MOTF | Login</title>

<?php
session_start();
// if (isset($_SESSION['auth'])) {
//     $_SESSION['message'] = "You Are Already logged";
//     $_SESSION['message_type'] = "warning";
//     header("Location: index.php");
//     exit();
// }
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
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Login</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Login</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Customer Login</span></h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="contact-form bg-secondary p-4 rounded shadow-sm">
                <?php
                if (isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey !</strong> <?php echo $_SESSION["message"]; ?>
                    </div>
                <?php
                    unset($_SESSION["message"]);
                } ?>
                <form name="loginForm" id="loginForm" action="functions/authcode.php" method="post" class="container mt-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-8 col-sm-10">
                            <div class="card shadow-sm border-light">
                                <div class="card-header bg-primary text-white text-center">
                                    <h3 class="mb-0">Login</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                                            required="required" data-validation-required-message="Please enter your email" />
                                        <div class="invalid-feedback">Please enter your email.</div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password"
                                            required="required" data-validation-required-message="Please enter your password" />
                                        <div class="invalid-feedback">Please enter your password.</div>
                                    </div>
                                    <!-- <div class="d-flex justify-content-between mb-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember Me</label>
                                        </div>
                                        <a href="#" class="text-primary">Forgot Password?</a>
                                    </div> -->
                                    <div class="text-center">
                                        <button class="btn btn-primary py-2 px-4" type="submit" name="login_btn" id="login">Login</button>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <p class="mb-0">Don't have an account? <a href="register.php" class="text-primary">Register here</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Contact End -->
<?php include("includes/footer.php") ?>