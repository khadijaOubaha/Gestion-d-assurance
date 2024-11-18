<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Medilab</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="<?= base_url('assets/img/family.jpg') ?>" rel="icon">
  <link href="<?= base_url('assets/img/familyy.jpg') ?>" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/aos/aos.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">
    <div class="branding d-flex align-items-center">
      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="<?= base_url('index.php') ?>" class="logo d-flex align-items-center me-auto">
          <h1 class="sitename">Medilab</h1>
        </a>
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#hero" class="active">Accueil</a></li>
            <li><a href="#about">Nous</a></li>
            <li class="dropdown"><a href="#"><span>Nos produits</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="#">Véhicule</a></li>
                <li><a href="#">Santé</a></li>
                <li><a href="#">Home</a></li>
              </ul>
            </li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <a class="cta-btn d-none d-sm-block" href="#appointment">Espace Client</a>
      </div>
    </div>
  </header>

  <main class="main">
    <section id="hero" class="hero section light-background">
      <img src="<?= base_url('assets/img/familyy.jpg') ?>" alt="" data-aos="fade-in">
      <div class="container position-relative">
        <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
          <h2>WELCOME TO MEDILAB</h2>
          <p>We are a team of talented designers making websites with Bootstrap</p>
        </div>
        <div class="content row gy-4">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
              <h3>Why Choose Medilab?</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
              <div class="text-center">
                <a href="#about" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="d-flex flex-column justify-content-center">
              <div class="row gy-4">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                    <i class="bi bi-clipboard-data"></i>
                    <h4>Corporis voluptates officia eiusmod</h4>
                    <p>Consequuntur sunt aut quasi enim aliquam...</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                    <i class="bi bi-gem"></i>
                    <h4>Ullamco laboris ladore pan</h4>
                    <p>Excepteur sint occaecat cupidatat non proident...</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                    <i class="bi bi-inboxes"></i>
                    <h4>Labore consequatur incidid dolore</h4>
                    <p>Aut suscipit aut cum nemo deleniti aut omnis...</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

        <!-- About Section -->
        <section id="about" class="about section">

<div class="container">

  <div class="row gy-4 gx-5">

    <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
      <img src="assets/img/about.jpg" class="img-fluid" alt="">
      <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
    </div>

    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
      <h3>About Us</h3>
      <p>
        Dolor iure expedita id fuga asperiores qui sunt consequatur minima. Quidem voluptas deleniti. Sit quia molestiae quia quas qui magnam itaque veritatis dolores. Corrupti totam ut eius incidunt reiciendis veritatis asperiores placeat.
      </p>
      <ul>
        <li>
          <i class="fa-solid fa-vial-circle-check"></i>
          <div>
            <h5>Ullamco laboris nisi ut aliquip consequat</h5>
            <p>Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade</p>
          </div>
        </li>
        <li>
          <i class="fa-solid fa-pump-medical"></i>
          <div>
            <h5>Magnam soluta odio exercitationem reprehenderi</h5>
            <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi</p>
          </div>
        </li>
        <li>
          <i class="fa-solid fa-heart-circle-xmark"></i>
          <div>
            <h5>Voluptatem et qui exercitationem</h5>
            <p>Et velit et eos maiores est tempora et quos dolorem autem tempora incidunt maxime veniam</p>
          </div>
        </li>
      </ul>
    </div>

  </div>

</div>

</section><!-- /About Section -->

<!-- Stats Section -->
<section id="stats" class="stats section light-background">

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row gy-4">

    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
      <i class="fa-solid fa-user-doctor"></i>
      <div class="stats-item">
        <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1" class="purecounter"></span>
        <p>Doctors</p>
      </div>
    </div><!-- End Stats Item -->

    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
      <i class="fa-regular fa-hospital"></i>
      <div class="stats-item">
        <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1" class="purecounter"></span>
        <p>Departments</p>
      </div>
    </div><!-- End Stats Item -->

    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
      <i class="fas fa-flask"></i>
      <div class="stats-item">
        <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter"></span>
        <p>Research Labs</p>
      </div>
    </div><!-- End Stats Item -->

    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
      <i class="fas fa-award"></i>
      <div class="stats-item">
        <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter"></span>
        <p>Awards</p>
      </div>
    </div><!-- End Stats Item -->

  </div>

</div>

</section><!-- /Stats Section -->

<!-- Services Section -->
<section id="services" class="services section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Services</h2>
  <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
</div><!-- End Section Title -->

<div class="container">

  <div class="row gy-4">

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
      <div class="service-item  position-relative">
        <div class="icon">
          <i class="fas fa-heartbeat"></i>
        </div>
        <a href="#" class="stretched-link">
          <h3>Nesciunt Mete</h3>
        </a>
        <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
      </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
      <div class="service-item position-relative">
        <div class="icon">
          <i class="fas fa-pills"></i>
        </div>
        <a href="#" class="stretched-link">
          <h3>Eosle Commodi</h3>
        </a>
        <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
      </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
      <div class="service-item position-relative">
        <div class="icon">
          <i class="fas fa-hospital-user"></i>
        </div>
        <a href="#" class="stretched-link">
          <h3>Ledo Markt</h3>
        </a>
        <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
      </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
      <div class="service-item position-relative">
        <div class="icon">
          <i class="fas fa-dna"></i>
        </div>
        <a href="#" class="stretched-link">
          <h3>Asperiores Commodit</h3>
        </a>
        <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
        <a href="#" class="stretched-link"></a>
      </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
      <div class="service-item position-relative">
        <div class="icon">
          <i class="fas fa-wheelchair"></i>
        </div>
        <a href="#" class="stretched-link">
          <h3>Velit Doloremque</h3>
        </a>
        <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>
        <a href="#" class="stretched-link"></a>
      </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
      <div class="service-item position-relative">
        <div class="icon">
          <i class="fas fa-notes-medical"></i>
        </div>
        <a href="#" class="stretched-link">
          <h3>Dolori Architecto</h3>
        </a>
        <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
        <a href="#" class="stretched-link"></a>
      </div>
    </div><!-- End Service Item -->

  </div>

</div>

</section><!-- /Services Section -->


<!-- Departments Section -->
<section id="departments" class="departments section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Departments</h2>
  <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row">
    <div class="col-lg-3">
      <ul class="nav nav-tabs flex-column">
        <li class="nav-item">
          <a class="nav-link active show" data-bs-toggle="tab" href="#departments-tab-1">Cardiology</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-2">Neurology</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-3">Hepatology</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-4">Pediatrics</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-5">Eye Care</a>
        </li>
      </ul>
    </div>
    <div class="col-lg-9 mt-4 mt-lg-0">
      <div class="tab-content">
        <div class="tab-pane active show" id="departments-tab-1">
          <div class="row">
            <div class="col-lg-8 details order-2 order-lg-1">
              <h3>Cardiology</h3>
              <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
              <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
            </div>
            <div class="col-lg-4 text-center order-1 order-lg-2">
              <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="tab-pane" id="departments-tab-2">
          <div class="row">
            <div class="col-lg-8 details order-2 order-lg-1">
              <h3>Et blanditiis nemo veritatis excepturi</h3>
              <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
              <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>
            </div>
            <div class="col-lg-4 text-center order-1 order-lg-2">
              <img src="assets/img/departments-2.jpg" alt="" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="tab-pane" id="departments-tab-3">
          <div class="row">
            <div class="col-lg-8 details order-2 order-lg-1">
              <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
              <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
              <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>
            </div>
            <div class="col-lg-4 text-center order-1 order-lg-2">
              <img src="assets/img/departments-3.jpg" alt="" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="tab-pane" id="departments-tab-4">
          <div class="row">
            <div class="col-lg-8 details order-2 order-lg-1">
              <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
              <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
              <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
            </div>
            <div class="col-lg-4 text-center order-1 order-lg-2">
              <img src="assets/img/departments-4.jpg" alt="" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="tab-pane" id="departments-tab-5">
          <div class="row">
            <div class="col-lg-8 details order-2 order-lg-1">
              <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
              <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
              <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
            </div>
            <div class="col-lg-4 text-center order-1 order-lg-2">
              <img src="assets/img/departments-5.jpg" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

</section><!-- /Departments Section -->


<!-- Faq Section -->
<section id="faq" class="faq section light-background">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Frequently Asked Questions</h2>
  <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
</div><!-- End Section Title -->

<div class="container">

  <div class="row justify-content-center">

    <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

      <div class="faq-container">

        <div class="faq-item faq-active">
          <h3>Non consectetur a erat nam at lectus urna duis?</h3>
          <div class="faq-content">
            <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item">
          <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
          <div class="faq-content">
            <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item">
          <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
          <div class="faq-content">
            <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item">
          <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
          <div class="faq-content">
            <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item">
          <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
          <div class="faq-content">
            <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item">
          <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
          <div class="faq-content">
            <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed in suscipit sequi. Distinctio ipsam dolore et.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

      </div>

    </div><!-- End Faq Column-->

  </div>

</div>

</section><!-- /Faq Section -->



<!-- Contact Section -->
<section id="contact" class="contact section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Contact</h2>
  <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row gy-4">

    <div class="col-lg-4">
      <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
        <i class="bi bi-geo-alt flex-shrink-0"></i>
        <div>
          <h3>Location</h3>
          <p>A108 Adam Street, New York, NY 535022</p>
        </div>
      </div><!-- End Info Item -->

      <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
        <i class="bi bi-telephone flex-shrink-0"></i>
        <div>
          <h3>Call Us</h3>
          <p>+1 5589 55488 55</p>
        </div>
      </div><!-- End Info Item -->

      <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
        <i class="bi bi-envelope flex-shrink-0"></i>
        <div>
          <h3>Email Us</h3>
          <p>info@example.com</p>
        </div>
      </div><!-- End Info Item -->

    </div>

    <div class="col-lg-8">
      <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
        <div class="row gy-4">

          <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
          </div>

          <div class="col-md-6 ">
            <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
          </div>

          <div class="col-md-12">
            <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
          </div>

          <div class="col-md-12">
            <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
          </div>

          <div class="col-md-12 text-center">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>

            <button type="submit">Send Message</button>
          </div>

        </div>
      </form>
    </div><!-- End Contact Form -->

  </div>

</div>

</section><!-- /Contact Section -->

</main>

<footer id="footer" class="footer light-background">

<div class="container footer-top">
<div class="row gy-4">
  <div class="col-lg-4 col-md-6 footer-about">
    <a href="index.html" class="logo d-flex align-items-center">
      <span class="sitename">Medilab</span>
    </a>
    <div class="footer-contact pt-3">
      <p>A108 Adam Street</p>
      <p>New York, NY 535022</p>
      <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
      <p><strong>Email:</strong> <span>info@example.com</span></p>
    </div>
    <div class="social-links d-flex mt-4">
      <a href=""><i class="bi bi-twitter-x"></i></a>
      <a href=""><i class="bi bi-facebook"></i></a>
      <a href=""><i class="bi bi-instagram"></i></a>
      <a href=""><i class="bi bi-linkedin"></i></a>
    </div>
  </div>

  <div class="col-lg-2 col-md-3 footer-links">
    <h4>Useful Links</h4>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">About us</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Terms of service</a></li>
      <li><a href="#">Privacy policy</a></li>
    </ul>
  </div>

  <div class="col-lg-2 col-md-3 footer-links">
    <h4>Our Services</h4>
    <ul>
      <li><a href="#">Web Design</a></li>
      <li><a href="#">Web Development</a></li>
      <li><a href="#">Product Management</a></li>
      <li><a href="#">Marketing</a></li>
      <li><a href="#">Graphic Design</a></li>
    </ul>
  </div>

  <div class="col-lg-2 col-md-3 footer-links">
    <h4>Hic solutasetp</h4>
    <ul>
      <li><a href="#">Molestiae accusamus iure</a></li>
      <li><a href="#">Excepturi dignissimos</a></li>
      <li><a href="#">Suscipit distinctio</a></li>
      <li><a href="#">Dilecta</a></li>
      <li><a href="#">Sit quas consectetur</a></li>
    </ul>
  </div>

  <div class="col-lg-2 col-md-3 footer-links">
    <h4>Nobis illum</h4>
    <ul>
      <li><a href="#">Ipsam</a></li>
      <li><a href="#">Laudantium dolorum</a></li>
      <li><a href="#">Dinera</a></li>
      <li><a href="#">Trodelas</a></li>
      <li><a href="#">Flexo</a></li>
    </ul>
  </div>

</div>
</div>

<div class="container copyright text-center mt-4">
<p>© <span>Copyright</span> <strong class="px-1 sitename">Medilab</strong> <span>All Rights Reserved</span></p>
<div class="credits">
  Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
</div>
</div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/php-email-form/validate.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/aos/aos.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/glightbox/js/glightbox.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/purecounter/purecounter_vanilla.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/swiper/swiper-bundle.min.js'); ?>"></script>

<!-- Main JS File -->
<script src="<?= base_url('assets/js/main.js'); ?>"></script>


</body>

</html>