<html>
<body>
    
    <?php
        session_start();
        require('../includes/Connection.php');
        
        //connect to MySQL using PDO MySQL
        $pdo = pdo_connect_mysql();

        //Basic routing
        //Page is set to home by default so when the visitor visits that will be the page they see first.
        $page = isset($_GET['page']) && file_exists($_GET['page'] . 'php') ? $_GET['page'] : 'hero';
        //The code above checks if the GET request variable ($_GET['page']) exits. If not, the default page will be set to the home page whereas, if it exits, it will be the requested page
        include $page . '.php';
        
        //include the requested page:
        include_once ('header.php');
        include_once('hero.php');
    ?>

    <main id="main">
        <?php
        include_once './product.php';
        include_once './about.php';
        include_once './counts.php';
        include_once './Testimonials.php';
        include_once('contact.php');
        ?>
    </main>

    <?php 
        include_once('footer.php');
    ?>
    <div class="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



    <!-- Vendor JS Files -->
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>


     <!-- Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>
</html>