<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>

<!-- Slider Section -->
<section id="slider" class="slider">
    <div class="slider_overlay">
        <div class="container">
            <div class="row">
                <div class="main_slider text-center">
                    <div class="col-12">
                        <div class="main_slider_content wow zoomIn" data-wow-duration="1s">
                            <h1>Signature Cuisine</h1>
                            <p>Enjoy authentic flavors, warm service, and a welcoming atmosphere that turn every
                                meal into a memory</p>
                            <button class="btn-lg">Reserve Your Spot</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="abouts" class="abouts">
    <div class="container">
        <div class="row abouts_content">
            <div class="col-md-6">
                <div class="single_abouts_text text-center wow slideInLeft" data-wow-duration="1s">
                    <img src="/signature-cuisine/assets/images/ab.png" alt=""/>
                </div>
            </div>

            <div class="col-md-6">
                <div class="single_abouts_text wow slideInRight" data-wow-duration="1s">
                    <h4 class="mb-2">About us</h4>
                    <h3 class="mb-4">Signature Cuisine</h3>
                    <p>Welcome to Signature Cuisine, a renowned restaurant chain serving delicious culinary
                        experiences across Sri Lanka. With locations in multiple cities, we are committed to
                        delivering exceptional food and service rooted in both local and international flavors.
                    </p>

                    <p>Signature Cuisine blends tradition with innovation to offer an unforgettable dining
                        experience. Explore our diverse menu, discover your nearest branch, and enjoy the warm
                        hospitality that has made us a favorite among food lovers islandwide. Your perfect meal
                        awaits at Signature Cuisine.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="features">
    <div class="slider_overlay">
        <div class="container">
            <div class="row">
                <div class="main_features_content_area wow fadeIn" data-wow-duration="3s">
                    <div class="col-12">
                        <div class="main_features_content text-start">
                            <div class="col-md-6">
                                <div class="single_features_text">
                                    <h4 class="mb-2">Reserve Your Table</h4>
                                    <h3 class="mb-4">Experience the Taste of Elegance</h3>
                                    <p>Ready to indulge in an unforgettable dining experience? Book your table now and enjoy our chef's finest creations in a warm and inviting atmosphere.</p>
                                    <p>It can be a romantic dinner, a family gathering, or a special celebration with friends. Make your reservation today to secure your preferred time and setting.</p>
                                    <a href="reservation.php" class="btn btn-primary">Make a Reservation</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Menu-->
<?php require('partials/menu.php') ?>

<!--Footer-->
<?php require('partials/footer.php') ?>
