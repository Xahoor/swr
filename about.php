<?php
require 'config/db.php';
require 'include/core.php';


$admin = new core($conn);
$homepage = $admin->homepage();

$getAboutPage = $admin->aboutpage();
$getObjectives = $admin->aboutpageTb('about_objectives');

$pageTitle= 'About - Swat Women Rise Initiative'; 

require 'header.php';
?>

  <!-- Page Header -->
    <header class="bg-primary text-white py-5">
        <div class="container text-center">
            <h1 class="text-white"><?= $getAboutPage['page_title']; ?></h1>
            <p class="lead"><?= $getAboutPage['page_subtitle']; ?></p>
        </div>
    </header>

    <!-- Our Story -->
    
    <!-- Our Story -->
<section class="section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="mb-4"><?= $getAboutPage['story_heading']; ?></h2>

                <p><?= $getAboutPage['story_paragraph1']; ?></p>

                <p><?= $getAboutPage['story_paragraph2']; ?></p>
            </div>

            <div class="col-lg-6">
                <img src="assets/img/<?= $getAboutPage['story_image']; ?>" 
                     alt="<?= $getAboutPage['page_title']; ?>" 
                     class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

    <!-- Vision & Mission Full -->
<!-- Vision & Mission -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row g-5">

            <div class="col-md-6">
                <div class="p-4 bg-white rounded shadow-sm h-100 border-top border-4 border-primary">
                    <h3><?= $homepage['vision_title']; ?></h3>
                    <p><?= $homepage['vision_description']; ?></p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="p-4 bg-white rounded shadow-sm h-100 border-top border-4 border-primary">
                    <h3><?= $homepage['mission_title']; ?></h3>
                    <p><?= $homepage['mission_description']; ?></p>
                </div>
            </div>

        </div>
    </div>
</section>

    <!-- Objectives -->
<!-- Objectives -->
<section class="section-padding">
    <div class="container">

        <h2 class="text-center mb-5">Our Objectives</h2>

        <div class="row g-4">

            <?php foreach($getObjectives as $objective): ?>

            <div class="col-md-4">
                <div class="d-flex mb-3">

                    <div class="text-primary fs-4 me-3">
                        <i class="fas fa-check-circle"></i>
                    </div>

                    <div>
                        <h5><?= $objective['title']; ?></h5>

                        <p><?= $objective['description']; ?></p>
                    </div>

                </div>
            </div>

            <?php endforeach; ?>

        </div>

    </div>
</section>

    <!-- Values -->
    <section class="section-padding bg-primary text-white">
        <div class="container">
            <h2 class="text-white text-center mb-5">Our Values</h2>
            <div class="row text-center g-4">
                <div class="col-6 col-md-2">
                    <i class="fas fa-balance-scale fs-1 mb-3"></i>
                    <p>Equality</p>
                </div>
                <div class="col-6 col-md-2">
                    <i class="fas fa-heart fs-1 mb-3"></i>
                    <p>Respect</p>
                </div>
                <div class="col-6 col-md-2">
                    <i class="fas fa-book-open fs-1 mb-3"></i>
                    <p>Education</p>
                </div>
                <div class="col-6 col-md-2">
                    <i class="fas fa-search fs-1 mb-3"></i>
                    <p>Transparency</p>
                </div>
                <div class="col-6 col-md-2">
                    <i class="fas fa-users fs-1 mb-3"></i>
                    <p>Community</p>
                </div>
                <div class="col-6 col-md-2">
                    <i class="fas fa-star fs-1 mb-3"></i>
                    <p>Leadership</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Registered Office -->
  
    <!-- Registered Office -->
<section class="section-padding">
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8 text-center">

                <h2 class="mb-4">
                    <?= $getAboutPage['office_heading']; ?>
                </h2>

                <div class="card p-4 border-0 shadow-sm bg-light">

                    <p class="mb-1">
                        <strong><?= $getAboutPage['office_name']; ?></strong>
                    </p>

                    <p class="mb-1">
                        <?= $getAboutPage['office_floor']; ?>
                    </p>

                    <p class="mb-1">
                        <?= $getAboutPage['office_nearby_location']; ?>
                    </p>

                    <p class="mb-1">
                        <?= $getAboutPage['office_road']; ?>
                    </p>

                    <p class="mb-1">
                        <?= $getAboutPage['office_city']; ?>
                    </p>

                </div>

            </div>

        </div>

    </div>
</section>



     
    
<?php
require 'footer.php';
?>