<title>MOTF | About Us</title>

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
        <h1 class="font-weight-semi-bold text-uppercase mb-3">About Us</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="products.php">Shop Now</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">About Us</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- About Us Section Start -->
<div class="container my-5 bg-secondary">
    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-6 mt-5"> <!-- Change mt-12 to mt-5 or any other value available -->
            <h2 class="font-weight-bold mb-4 text-center">Our Story</h2>
            <p class="text-muted text-justify">At MOTF, we are dedicated to delivering top-notch products that embody excellence and innovation. Founded in 2024, our journey began with a vision to transform the way people experience clothing. Over the years, we have grown into a leader in clothing, consistently pushing boundaries and setting new standards.</p>
            <p class="text-muted text-justify">Our commitment to quality and customer satisfaction drives everything we do. From our rigorous selection process to our attention to detail, we strive to exceed expectations and build lasting relationships with our customers.</p>
        </div>
        <!-- Right Column -->
        <div class="col-lg-6 mt-5"> <!-- Change mt-12 to mt-5 or any other value available -->
            <h2 class="font-weight-bold mb-4 text-center">Our Mission & Values</h2>
            <ul class="list-unstyled text-justify">
                <li><strong>Mission:</strong> To innovate and deliver unparalleled quality in clothing, making a positive impact on the lives of our customers.</li>
                <li><strong>Core Values:</strong>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-angle-right mr-2"></i>Excellence: We pursue excellence in everything we do.</li>
                        <li><i class="fa fa-angle-right mr-2"></i>Integrity: We act with honesty and transparency.</li>
                        <li><i class="fa fa-angle-right mr-2"></i>Customer Focus: Our customers are at the heart of our decisions.</li>
                        <li><i class="fa fa-angle-right mr-2"></i>Innovation: We continuously seek innovative solutions to stay ahead.</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- Team Section -->
    <div class="text-center mt-5">
        <h2 class="font-weight-bold mb-4">Meet Our Team</h2>
        <p class="text-muted text-justify">Our team consists of dedicated professionals who are passionate about what they do. With a diverse range of expertise and a shared commitment to our mission, we work together to achieve great results.</p>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0">
                    <img src="assets/img/favicon.png" class="card-img-top" alt="Team Member Name">
                    <div class="card-body text-center">
                        <h5 class="card-title">Samia Joudar</h5>
                        <p class="card-text">CEO & Founder</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us Section End -->



<?php include("includes/footer.php") ?>