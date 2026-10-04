<?php
require 'config/db.php';
require 'include/core.php';

$admin = new core($conn);

$getInvolved = $admin->getInvolvedHeader();

$pageTitle = 'Get Involved - Swat Women Rise Initiative'; 

require 'header.php';
?>

    <!-- Page Header -->
    <header class="bg-primary text-white py-5">
        <div class="container text-center">
            
                    <h1 class="text-white">
            <?= $getInvolved['page_title']; ?>
            </h1>

            <p class="lead">
            <?= $getInvolved['page_subtitle']; ?>
            </p>



        </div>
    </header>

    <!-- Participation Options -->
    <section class="section-padding">
        <div class="container">
            <div class="row g-4">
                <!-- Volunteer -->
                <div class="col-lg-6">
                    <div class="card h-100 p-4 border-0 shadow-sm">
                        <div class="icon-box"><i class="fas fa-hand-holding-heart"></i></div>
                     
                     <h3>
<?= $getInvolved['volunteer_heading']; ?>
</h3>

<p>
<?= $getInvolved['volunteer_description']; ?>
</p>
                      
                      
                      
                        <form class="mt-4" id="volunteerForm">
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>

                                <input type="text" 
                                name="full_name"
                                class="form-control" 
                                required>

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>


                                <input type="email" 
                                    name="email"
                                    class="form-control" 
                                    required>


                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>



                                <input type="tel"
                                    name="phone"
                                    class="form-control"
                                    required>



                            </div>
                            <div class="mb-3">
                                <label class="form-label">Your Skills</label>

                                <input type="text"
                                    name="skills"
                                    class="form-control"
                                    placeholder="e.g. Teaching, Marketing, IT"
                                    required>
                            
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Message</label>

                                <textarea name="message" class="form-control" rows="3"></textarea>


                            </div>
                            <button type="submit" class="btn btn-primary">Apply to Volunteer</button>

                            <div id="volunteerResponse" class="mt-3"></div>
                       
                        </form>
                    </div>
                </div>

                <!-- Partner -->
                <div class="col-lg-6">
                    <div class="card h-100 p-4 border-0 shadow-sm">
                        <div class="icon-box"><i class="fas fa-handshake"></i></div>
                                <h3>
                                <?= $getInvolved['partner_heading']; ?>
                                </h3>


                                <p>
                                <?= $getInvolved['partner_description']; ?>
                                </p>
                        
                        
                        <form class="mt-4" id="partnerForm">
                            <div class="mb-3">
                                <label class="form-label">Organization Name</label>

                                <input type="text"
                                name="organization_name"
                                class="form-control"
                                required>


                            </div>
                            <div class="mb-3">
                                <label class="form-label">Representative Name</label>

                                <input type="text"
                                name="representative_name"
                                class="form-control"
                                required>


                            </div>

                            

                            <div class="mb-3">
                                <label class="form-label">Message</label>

                                <textarea name="message" class="form-control" rows="6"></textarea>


                            </div>
                            <button type="submit" class="btn btn-primary">Submit Inquiry</button>

                            <div id="partnerResponse" class="mt-3"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script>

$("#volunteerForm").submit(function(e){

    e.preventDefault();

    let form = this;

    $.ajax({

        url:"include/routes.php",
        method:"POST",

        data: $(this).serialize()+"&action=volunteer",

        success:function(response){

            alert(response);

            form.reset();

            // remove validation state
            $(form).removeClass("was-validated");

        }

    });


});





$("#partnerForm").submit(function(e){

    e.preventDefault();

    let form = this;

    $.ajax({

        url:"include/routes.php",
        method:"POST",

        data: $(this).serialize()+"&action=partner",

        success:function(response){

            alert(response);

            form.reset();

            // remove validation state
            $(form).removeClass("was-validated");

        }

    });


});

</script>
  

<?php
require 'footer.php';
?>