
<?php

// require 'config/db.php';
// require 'include/core.php';

// $admin = new core($conn);
$getContact = $admin->contactPage();

?>

    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5>Mission Statement</h5>
                    <p>Educating girls, empowering women, and building stronger communities through education, leadership, and collaboration.</p>
                    <div class="mt-4">
                        <a href="<?= $getContact['facebook_url']; ?>" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?= $getContact['instagram_url']; ?>" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="<?= $getContact['linkedin_url']; ?>" class="text-white me-3"><i class="fab fa-linkedin-in"></i></a>
                        <a href="<?= $getContact['youtube_url']; ?>" class="text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h5>Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="programs.php">Programs</a></li>
                        <li><a href="leadership.php">Leadership</a></li>
                        <li><a href="news.php">News</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5>Contact Info</h5>
                    <p><i class="fas fa-map-marker-alt me-2"></i> <?php echo $getContact['address']; ?></p>
                    <p><i class="fas fa-envelope me-2"></i> <?php echo $getContact['email']; ?></p>
                </div>
               
            </div>
            <hr class="mt-5 bg-secondary">
            <div class="text-center pb-2">
                <p>&copy; <?php echo date("Y"); ?> Swat Women Rise Initiative. All Rights Reserved. <b> Developed By </b> <a target="_blank" href='https://Xahoor.github.io'> DEVELOP ERS.COM</a></p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>
</html>