<?php
require 'config/db.php';
require 'include/core.php';

$admin = new core($conn);


$getNewsPage = $admin->newsPage();
$getNews = $admin->news();
$getEvents = $admin->events();
$getGallery = $admin->gallery();

$pageTitle = 'News - Swat Women Rise Initiative'; 

require 'header.php';
?>


    <!-- Page Header -->
<!-- Page Header -->
<header class="bg-primary text-white py-5">
<div class="container text-center">

<h1 class="text-white">
<?= $getNewsPage['title']; ?>
</h1>

<p class="lead">
<?= $getNewsPage['subtitle']; ?>
</p>

</div>
</header>




    <!-- Content -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="mb-4">Latest Events & News</h2>
                   

                    <!-- Latest News -->



<?php foreach($getNews as $news): ?>


<div class="card mb-4 border-0 shadow-sm overflow-hidden">

<div class="row g-0">


<div class="col-md-4">

<img src="assets/img/<?= $news['image']; ?>"
     class="img-fluid h-100 object-fit-cover"
     alt="<?= $news['title']; ?>">

</div>



<div class="col-md-8">

<div class="card-body">


<h5 class="card-title">
<?= $news['title']; ?>
</h5>


<p class="card-text">
<?= $news['description']; ?>
</p>


</div>

</div>


</div>

</div>


<?php endforeach; ?>

                   
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h4 class="mb-3">Upcoming Events</h4>


                       <ul class="list-unstyled">


                            <?php foreach($getEvents as $event): ?>


                            <li class="mb-3 border-bottom pb-2">


                            <p class="mb-1 fw-bold">
                            <?= $event['title']; ?>
                            </p>


                            <span class="text-muted small">

                            <?= date('d M Y', strtotime($event['event_date'])); ?>

                            </span>


                            </li>


                            <?php endforeach; ?>

                        </ul>


                    </div>

                   
                </div>
            </div>
        </div>
    </section>

    <!-- Photo Gallery Preview -->

<section class="section-padding bg-light">

<div class="container text-center">


<h2 class="mb-5">
Photo Gallery
</h2>



<div class="row g-3">


<?php foreach($getGallery as $photo): ?>


<div class="col-md-4">


<img src="assets/img/<?= $photo['image']; ?>"
     class="img-fluid rounded shadow-sm"
     alt="Gallery Image">


</div>


<?php endforeach; ?>


</div>


</div>

</section>

     
    
<?php
require 'footer.php';
?>