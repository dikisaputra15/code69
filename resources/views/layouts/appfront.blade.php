<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Coding santai dan asik</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('Mentor/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('Mentor/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('Mentor/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('Mentor/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('Mentor/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('Mentor/assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

 <!-- Header -->
@include('components.headerfront')


  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="{{ asset('Mentor/assets/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

      <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="100">Learning Today,<br>Leading Tomorrow</h2>
        <p data-aos="fade-up" data-aos-delay="200">We are team of talented designers making websites with Bootstrap</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="courses.html" class="btn-get-started">Get Started</a>
        </div>
      </div>

    </section><!-- /Hero Section -->

       <!-- Content -->
       @yield('main')

  </main>

 <!-- Footer -->
 @include('components.footerfront')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('Mentor/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('Mentor/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('Mentor/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('Mentor/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('Mentor/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('Mentor/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('Mentor/assets/js/main.js') }}"></script>

</body>

</html>
