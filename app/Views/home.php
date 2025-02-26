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


  <link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet">
</head>

<body class="index-page">
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success mt-3">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger mt-3">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>
<header id="header" class="header sticky-top">
  <div class="branding d-flex align-items-center">
    <div class="container position-relative d-flex align-items-center justify-content-between">
      <a href="<?= base_url('index.php') ?>" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Drop Of Life
        </h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Accueil</a></li>
          <li><a href="#about">Nous</a></li>
          <li class="dropdown"><a href="#"><span>Nos produits</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="/Auto/info">Votre plantes:</a></li>
           
            </ul>
          </li>
          
          <?php if ((session()->get('loggedIn') && session()->get('userRole') == 'client') || !session()->get('loggedIn')): ?>
            <li><a href="#contact">Contact</a></li>
          <?php endif; ?>

          
          <?php if (session()->get('loggedIn') && session()->get('userRole') == 'client'): ?>
            
            <!-- <li class="dropdown"><a href="#"><span>Auto</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
            
            </ul>
          </li> -->
           

            <li><a href="<?= base_url('/profil') ?>">Mon Compte</a></li>
            <li><a href="<?= base_url('logout') ?>">Se Déconnecter</a></li>

          <?php endif; ?>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <?php if (!session()->get('loggedIn')): ?>
   
    <a class="cta-btn d-none d-sm-block" href="login_client">Mon Espace</a>
    <!-- <a class="cta-btn d-none d-sm-block" href="admin/login">Interface d'administration</a> -->
<?php endif; ?>
    
    </div>
  </div>
</header>


  <main class="main">
    <section id="hero" class="hero section light-background">
      <img src="<?= base_url('assets/img/imageee.png') ?>" alt="" data-aos="fade-in">
      <div class="container position-relative">
        <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
        <h2 style="color:#FAFAFA">Bienvenue sur Drop Of Life</h2>  
<?php if (session()->get('loggedIn')): ?>  
    <?php if (session()->get('userRole') === 'admin'): ?>  
        <h1>Bienvenue, Admin <?= esc(session()->get('userName')) ?>!</h1>  
    <?php else: ?>  
        <h1>Bienvenue, <?= esc(session()->get('clientName')) ?>!</h1> <!-- Utilise clientName ici -->  
    <?php endif; ?>  
<?php else: ?>  
    <h1></h1>  
<?php endif; ?>

          <p style="color:black">Découvrez nos offres sur mesure pour mieux répondre à vos besoins!</p>
        </div>
        <div class="content row gy-4">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
              <h3>Pourquoi choisir DOL ?</h3>
              <p>DOL (Drop Of Life) est une application sert gérer votre l'eau et rencontrer votre besoines au niveau d'irrigation....</p>
              <div class="text-center">
                <a href="#about" class="more-btn"><span>En savoir plus </span> <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="d-flex flex-column justify-content-center">
              <div class="row gy-4">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                    <i class="bi bi-clipboard-data"></i>
                    <h4>Disponibilité des agents</h4>
                    <p >Nos agents sont disponibles pour vous guider dans vos démarches </p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                    <i class="bi bi-gem"></i>
                    <h4>Réponses rapides à vos messages</h4>
                    <p>Vous avez une question ou une demande particulière ? Nous nous engageons à répondre</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                    <i class="bi bi-inboxes"></i>
                    <h4>Accompagnement personnalisé</h4>
                    <p>Que ce soit pour un rendez-vous ou des informations complémentaires, </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

        
        <section id="about" class="about section">

<div class="container">

  <div class="row gy-4 gx-5">

    <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
      <img src="assets/img/télécharger.jpeg" class="img-fluid" alt="">
      <!-- <a href="https://www.youtube.com/watch?v=WZipC2ofBMw" class="glightbox pulsating-play-btn"></a> -->
    </div>

    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
      <h3>Apropos de Nous</h3>
      <!-- <p>
      Drop Of Life est une agence spécialisée dans la gestion des assurances automobiles, offrant des services adaptés aux besoins des conducteurs. Nous mettons l'accent sur la simplicité et la transparence pour accompagner nos clients tout au long du processus.
      </p> -->
      <ul>
        <li>
        <i class="fa-solid fa-shield"></i>
        <div>
            <h5>Des solutions adaptées à vos besoins</h5>
            <!-- <p>Nous proposons une large gamme de services d'assurance qui s'ajustent à votre style de vie et à vos objectifs.</p> -->
          </div>
        </li>
        <li>
        <i class="fa-solid fa-headset"></i>
        <div>
            <h5>Un service client réactif et fiable</h5>
            <!-- <p>Notre équipe est disponible pour vous accompagner à chaque étape avec rapidité et efficacité.</p> -->
          </div>
        </li>
        <li>
        <i class="fa-solid fa-handshake"></i>
        <div>
            <h5>Une confiance bâtie sur la transparence</h5>
            <!-- <p>Nous croyons en des relations durables fondées sur l'honnêteté et la transparence envers nos clients.</p> -->
          </div>
        </li>
</ul>

    </div>

  </div>

</div>


<section id="services" class="services section">









<section id="contact" class="contact section">


<div class="container section-title" data-aos="fade-up">
  <h2>Contact</h2>
  <p>Nous nous engageons à répondre rapidement à vos messages, par email .</p>
</div><

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row gy-4">

    <div class="col-lg-4">
      <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
        <i class="bi bi-geo-alt flex-shrink-0"></i>
        <div>
          <h3>Adresse</h3>
          <p>A108 Hay Salam, rue N 53022</p>
        </div>
      </div><!-- End Info Item -->

      <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
        <i class="bi bi-telephone flex-shrink-0"></i>
        <div>
          <h3>Tel </h3>
          <p>05 91730320</p>
        </div>
      </div>

      <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
        <i class="bi bi-envelope flex-shrink-0"></i>
        <div>
          <h3>Email </h3>
          <p>assuraman61@gmail.com</p>
        </div>
      </div>

    </div>

    <div class="col-lg-8">
      <form action="send_email.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
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
            <div class="sent-message">votre message est envoyer. Merci!</div>

            <button type="submit">Envoyer message</button>
          </div>

        </div>
      </form>
    </div>

  </div>

</div>

</section>

</main>

<footer id="footer" class="footer light-background">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">Drop Of Life</span>
                </a>
                <div class="footer-contact pt-2">
                    <p class="mt-3"><strong>Téléphone:</strong> <span>+212 5 91730320</span></p>
                    <p><strong>Email:</strong> <span>assuraman61@gmail.com</span></p>
                </div>
                <?php if (!session()->get('loggedIn')): ?>
   
   <!-- <a class="cta-btn d-none d-sm-block" href="login_client">Espace Client</a> -->
   <a class="cta-btn d-none d-sm-block" href="admin/login">Interface d'administration</a>
<?php endif; ?>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#about">Nous</a></li>
                    <li><a href="/Auto/info">Nos produits</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>

            <!-- Feedback Section -->
            <div class="col-lg-6 col-md-6 footer-feedback">
                <h4>Donnez votre avis</h4>
                <form id="feedbackForm" action="<?= base_url('/feedback/submit') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <textarea class="form-control" id="feedbackMessage" name="message" rows="3" placeholder="Écrivez votre avis ici..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <div id="stars" class="stars">
                            <i class="fas fa-star" data-value="1"></i>
                            <i class="fas fa-star" data-value="2"></i>
                            <i class="fas fa-star" data-value="3"></i>
                            <i class="fas fa-star" data-value="4"></i>
                            <i class="fas fa-star" data-value="5"></i>
                        </div>
                        <input type="hidden" id="feedbackRating" name="rating" value="0" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success mt-3">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger mt-3">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</footer>




<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


<div id="preloader"></div>
<script>
    // JavaScript pour la gestion des étoiles
    const stars = document.querySelectorAll('.stars i');
    const ratingInput = document.querySelector('#feedbackRating');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const rating = star.getAttribute('data-value');
            ratingInput.value = rating;

            // Colorier les étoiles en fonction de la note sélectionnée
            stars.forEach(s => {
                if (s.getAttribute('data-value') <= rating) {
                    s.classList.add('text-warning'); // Ajouter une couleur jaune
                } else {
                    s.classList.remove('text-warning');
                }
            });
        });
    });
</script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

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