<?php
require 'config/db.php';
require 'include/core.php';

$admin = new core($conn);

$getProgramPage = $admin->programsPage();
$getPrograms = $admin->programs();

$pageTitle = 'Program - Swat Women Rise Initiative';

require 'header.php';
?>



    <!-- Page Header -->
    <!-- Page Header -->
<header class="bg-primary text-white py-5">
    <div class="container text-center">

        <h1 class="text-white">
            <?= $getProgramPage['title']; ?>
        </h1>

        <p class="lead">
            <?= $getProgramPage['subtitle']; ?>
        </p>

    </div>
</header>

    <!-- Programs List -->
<section class="section-padding">

<div class="container">

<?php foreach($getPrograms as $index => $program): ?>

<div class="row align-items-center mb-5 pb-5 
<?php if($index % 2 == 1) echo 'flex-lg-row-reverse'; ?>">


    <!-- Image -->
    <div class="col-lg-6">

        <img src="assets/img/<?= $program['image']; ?>" 
             alt="<?= $program['title']; ?>" 
             class="img-fluid rounded shadow">

    </div>


    <!-- Content -->
    <div class="col-lg-6 mt-4 mt-lg-0">

        <h2 class="text-primary">
            <?= $program['title']; ?>
        </h2>


        <p>
            <?= $program['description']; ?>
        </p>


        <ul class="list-unstyled">


            <?php if(!empty($program['feature_1'])): ?>

            <li>
                <i class="fas fa-check text-secondary me-2"></i>
                <?= $program['feature_1']; ?>
            </li>

            <?php endif; ?>


            <?php if(!empty($program['feature_2'])): ?>

            <li>
                <i class="fas fa-check text-secondary me-2"></i>
                <?= $program['feature_2']; ?>
            </li>

            <?php endif; ?>


            <?php if(!empty($program['feature_3'])): ?>

            <li>
                <i class="fas fa-check text-secondary me-2"></i>
                <?= $program['feature_3']; ?>
            </li>

            <?php endif; ?>


        </ul>


    </div>


</div>


<?php endforeach; ?>


</div>

</section>

  

 
<?php
require 'footer.php';
?>