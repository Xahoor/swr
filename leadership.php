<?php
require 'config/db.php';
require 'include/core.php';

$admin = new core($conn);


$getLeadershipPage = $admin->leadershipPage();
$getExecutive = $admin->leadershipTb('executive_committee');
$getBoard = $admin->leadershipTb('board_governance');

$pageTitle = 'Leadership - Swat Women Rise Initiative'; 

require 'header.php';
?>

<!-- Page Header -->
<header class="bg-primary text-white py-5">
    <div class="container text-center">

        <h1 class="text-white">
            <?= $getLeadershipPage['page_title']; ?>
        </h1>

        <p class="lead">
            <?= $getLeadershipPage['page_subtitle']; ?>
        </p>

    </div>
</header>


<!-- Founder Section -->
<section class="section-padding">
<div class="container">

<div class="row align-items-center">


<div class="col-lg-4 mb-4 mb-lg-0">

<div class="card border-0 shadow">

<img src="assets/img/<?= $getLeadershipPage['founder_image']; ?>"
     alt="<?= $getLeadershipPage['founder_name']; ?>"
     class="card-img-top rounded">


<div class="card-body text-center">

<h4>
<?= $getLeadershipPage['founder_name']; ?>
</h4>


<p class="text-primary fw-bold">
<?= $getLeadershipPage['founder_designation']; ?>
</p>


</div>

</div>

</div>



<div class="col-lg-8">

<h2 class="mb-4">
Founder's Message
</h2>


<p class="fst-italic mb-4">
"<?= $getLeadershipPage['founder_message']; ?>"
</p>


<h5>
Biography & Qualifications
</h5>

<p>
<?= $getLeadershipPage['founder_biography']; ?>
</p>



<h5>
Experience
</h5>

<p>
<?= $getLeadershipPage['founder_experience']; ?>
</p>


</div>


</div>

</div>
</section>



<!-- Executive Committee -->
<section class="section-padding bg-light">

<div class="container">


<h2 class="text-center mb-5">
Executive Committee
</h2>


<div class="row g-4">


<?php foreach($getExecutive as $member): ?>


<div class="col-md-3">

<div class="card h-100 text-center border-0 shadow-sm">


<div class="card-body">


<div class="mb-3">
<i class="fas fa-user-circle fs-1 text-muted"></i>
</div>


<h5>
<?= $member['position']; ?>
</h5>


<p class="text-muted small">
<?= $member['description']; ?>
</p>


</div>

</div>

</div>


<?php endforeach; ?>


</div>

</div>

</section>


    <!-- Board of Governors -->
    <section class="section-padding">
        <div class="container">
            <h2 class="text-center mb-5">Board of Governors</h2>
            <div class="table-responsive">
                <table class="table table-hover shadow-sm">
                    <thead class="table-primary">
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Occupation</th>
                        </tr>
                    </thead>


<tbody>

<?php foreach($getBoard as $board): ?>

<tr>

<td>
<?= $board['name']; ?>
</td>


<td>
<?= $board['role']; ?>
</td>


<td>
<?= $board['organization']; ?>
</td>


</tr>

<?php endforeach; ?>


</tbody>



                </table>
            </div>
        </div>
    </section>


       
    
<?php
require 'footer.php';
?>