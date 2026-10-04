<?php
require 'config/db.php';
require 'include/core.php';

$admin = new core($conn);

$getContact = $admin->contactPage();

$pageTitle = 'Contact - Swat Women Rise Initiative'; 

require 'header.php';
?>

    <!-- Page Header -->
    <header class="bg-primary text-white py-5">
        <div class="container text-center">
           
        <h1 class="text-white">
<?= $getContact['page_title']; ?>
</h1>

<p class="lead">
<?= $getContact['page_subtitle']; ?>
</p>
        </div>


    </header>

    <!-- Contact Info & Form -->
    <section class="section-padding">
        <div class="container">
            <div class="row g-5">
                <!-- Contact Information -->
                <div class="col-lg-5">
                    <h2 class="mb-4">Contact Information</h2>
                    <div class="d-flex mb-4">
                        <div class="text-primary fs-3 me-3"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <h5>Address</h5>
                            <p>
<?= $getContact['address']; ?>
</p>
                        
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="text-primary fs-3 me-3"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h5>Email</h5>
                            <p>
<?= $getContact['email']; ?>
</p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="text-primary fs-3 me-3"><i class="fas fa-clock"></i></div>
                        <div>
                            <h5>Office Hours</h5>
                            <p>Monday - Friday: 9:00 AM - 5:00 PM<br>Saturday: 10:00 AM - 2:00 PM</p>
                        </div>
                    </div>
                    
                    <h4 class="mt-5 mb-3">Follow Us</h4>
                    <div class="d-flex gap-3">
                        <a href="<?= $getContact['facebook_url']; ?>" 
class="btn btn-outline-primary rounded-circle"
target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?= $getContact['instagram_url']; ?>" 
class="btn btn-outline-primary rounded-circle"
target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="<?= $getContact['linkedin_url']; ?>" 
class="btn btn-outline-primary rounded-circle"
target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a href="<?= $getContact['youtube_url']; ?>" 
class="btn btn-outline-primary rounded-circle"
target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-7">
                    <div class="card p-4 border-0 shadow-sm">
                        <h2 class="mb-4">Send a Message</h2>
                        <form id="contactForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text"
name="full_name"
class="form-control"
placeholder="Your Name"
required>
                                
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email"
name="email"
class="form-control"
placeholder="Your Email"
required>
                               
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Subject</label>
                                    <input type="text"
name="subject"
class="form-control"
placeholder="Subject"
required>
                               
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Message</label>
                                    <textarea name="message"class="form-control" rows="5" required></textarea>
                            
                            
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">Send Message</button>
                                </div>
                                <div id="contactResponse" class="mt-3"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <script>

$("#contactForm").submit(function(e){

    e.preventDefault();


    let form = this;


    $.ajax({

        url:"include/routes.php",
        method:"POST",

        data:$(this).serialize()+"&action=contact",


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