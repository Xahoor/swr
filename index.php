<?php

require 'config/db.php';
require 'include/core.php';

$admin = new core($conn);


$homepage = $admin->homepage();

$focusAreas = $admin->homepageTb('focus_areas');

$benefits = $admin->homepageTb('benefits');


$pageTitle = $homepage['hero_title'];

$pageTitle= 'Swat Women Rise Initiative'; 
require 'header.php';
?>

<header class="hero-section">
    <!-- Background Image -->
    <img src="assets/img/<?php echo htmlspecialchars($homepage['hero_image']); ?>" alt="Hero Background" class="hero-bg">

    <!-- Overlay -->
    <div class="hero-overlay"></div>

    <!-- Content -->
    <div class="container hero-content text-center">
            <h1 class="display-3 mb-3">
            <?php echo htmlspecialchars($homepage['hero_title']); ?>
            </h1>


            <p class="lead mb-4">
            <?php echo htmlspecialchars($homepage['hero_subtitle']); ?>
            </p>


            <p class="mb-5">
            <?php echo htmlspecialchars($homepage['hero_description']); ?>
            </p>

        <div class="d-grid gap-2 d-md-block">
            <a href="get-involved.php" class="btn btn-primary btn-lg px-4 me-md-2">
                Join Us
            </a>
            <a href="about.php" class="btn btn-outline-light btn-lg px-4">
                Learn More
            </a>
        </div>
    </div>
</header>


    <!-- About Preview -->
    <section class="section-padding bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="mb-4">
                        <?php echo htmlspecialchars($homepage['about_heading']); ?>
                    </h2>
                    <p>
                    <?php echo nl2br(htmlspecialchars($homepage['about_paragraph1'])); ?>
                    </p>
                    <p>
                    <?php echo nl2br(htmlspecialchars($homepage['about_paragraph2'])); ?>
                    </p>
                    <a href="about.php" class="btn btn-primary">Read Our Story</a>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <img src="assets/img/<?php echo htmlspecialchars($homepage['about_image']); ?>"
                        class="img-fluid rounded shadow"> 
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission -->
    <section class="section-padding bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100 p-4 border-0 shadow-sm">
                        <div class="icon-box"><i class="fas fa-eye"></i></div>
                        <h3>
                        <?php echo htmlspecialchars($homepage['vision_title']); ?>
                        </h3>
                        <p>
                        <?php echo nl2br(htmlspecialchars($homepage['vision_description'])); ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 p-4 border-0 shadow-sm">
                        <div class="icon-box"><i class="fas fa-bullseye"></i></div>
                        <h3>
                        <?php echo htmlspecialchars($homepage['mission_title']); ?>
                        </h3>

                        <p>
                        <?php echo nl2br(htmlspecialchars($homepage['mission_description'])); ?>
                        </p>            
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Focus Areas -->
    <section class="section-padding bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Our Focus Areas</h2>
                <p class="text-muted">Key pillars of our initiative</p>
            </div>
            <div class="row g-4">
                
             <?php foreach($focusAreas as $focus): ?>


                <div class="col-md-4">

                <div class="card h-100 text-center p-4">


                <div class="icon-box mx-auto">

                
                <i class="fa-solid fa-bullseye"></i>

                </div>


                <h4>
                <?php echo htmlspecialchars($focus['title']); ?>
                </h4>


                </div>

                </div>


             <?php endforeach; ?>


            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="section-padding bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="assets/img/<?php echo htmlspecialchars($homepage['about_image']); ?>"
                    class="img-fluid rounded shadow">
                
                </div>
                <div class="col-lg-6">
                    <h2 class="mb-4">Why Choose Us</h2>
                    
                        <ul class="list-unstyled">


                        <?php foreach($benefits as $benefit): ?>


                        <li class="mb-3">

                        <i class="fas fa-check-circle text-primary me-2"></i>

                        <?php echo htmlspecialchars($benefit['benefit']); ?>


                        </li>


                        <?php endforeach; ?>


                        </ul>


                </div>
            </div>
        </div>
    </section>

    <!-- Call To Action -->
    <section class="section-padding bg-primary text-white text-center">
        <div class="container">
            <h2 class="text-white mb-4">Make a Difference Today</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="get-involved.php" class="btn btn-light btn-lg">Become a Volunteer</a>
                        <a href="get-involved.php" class="btn btn-outline-light btn-lg">Partner With Us</a>
                        <a href="contact.php" class="btn btn-accent btn-lg" style="background-color: var(--accent-color); border-color: var(--accent-color); color: white;">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


       
<?php
require 'footer.php';
?>