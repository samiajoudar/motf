<title>MOTF | Register</title>

<?php
session_start();
if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You Are Already logged";
    header("Location: index.php");
    exit();
}
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
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Registration</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Register</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Customer Registration</span></h2>
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
                <form name="registerForm" id="registerForm" action="functions/authcode.php" method="post" class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-8 col-sm-10">
                            <div class="card shadow-sm border-light">
                                <div class="card-header bg-primary text-white text-center">
                                    <h3 class="mb-0">Register</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name"
                                            required="required" data-validation-required-message="Please enter your name" />
                                        <div class="invalid-feedback">Please enter your name.</div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="phoneCode" class="form-label">Phone Number</label>
                                        <div class="row">
                                            <div class="col-md-4 mb-3 mb-md-0">
                                                <select class="form-control" id="phoneCode" name="phoneCode" required="required" data-validation-required-message="Please select your phone code">
                                                    <option value="" disabled selected>Select your country</option>
                                                    <option value="+212">+212 Morocco</option>
                                                    <option value="+1">+1 United States / Canada</option>
                                                    <option value="+44">+44 United Kingdom</option>
                                                    <option value="+33">+33 France</option>
                                                    <option value="+49">+49 Germany</option>
                                                    <option value="+39">+39 Italy</option>
                                                    <option value="+34">+34 Spain</option>
                                                    <option value="+61">+61 Australia</option>
                                                    <option value="+55">+55 Brazil</option>
                                                    <option value="+91">+91 India</option>
                                                    <option value="+81">+81 Japan</option>
                                                    <option value="+86">+86 China</option>
                                                    <option value="+27">+27 South Africa</option>
                                                    <option value="+7">+7 Russia</option>
                                                    <option value="+52">+52 Mexico</option>
                                                    <option value="+46">+46 Sweden</option>
                                                    <option value="+47">+47 Norway</option>
                                                    <option value="+43">+43 Austria</option>
                                                    <option value="+98">+98 Iran</option>
                                                    <option value="+82">+82 South Korea</option>
                                                </select>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number"
                                                    required="required" data-validation-required-message="Please enter your phone number" />
                                                <div class="invalid-feedback">Please enter your phone number.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                                            required="required" data-validation-required-message="Please enter your email" />
                                        <div class="invalid-feedback">Please enter your email.</div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password"
                                            required="required" data-validation-required-message="Please enter your password" />
                                        <div class="invalid-feedback">Please enter your password.</div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="passwordconfirm" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="passwordconfirm" name="passwordconfirm" placeholder="Confirm your password"
                                            required="required" data-validation-required-message="Please confirm your password" />
                                        <div class="invalid-feedback">Please confirm your password.</div>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-primary py-2 px-4" type="submit" name="register_btn" id="register">Register</button>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <p class="mb-0">Already have an account? <a href="login.php" class="text-primary">Login here</a></p>
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