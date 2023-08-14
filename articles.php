<?php
    include('admin/functions.php');
    $pdo = pdo_connect_mysql();
    $msg = '';

    $stmt = $pdo->prepare('SELECT * FROM articles ORDER BY id DESC');
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total = $pdo->query('SELECT * FROM articles')->rowCount();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- 
    - primary meta tags
  -->
  <title>Wren - Perosonal Blog Website</title>
  <meta name="title" content="Wren - Perosonal Blog Website">
  <meta name="description" content="This is a blog html template made by codewithsadee">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="./assets/images/hero-banner.png">
  <link rel="preload" as="image" href="./assets/images/pattern-2.svg">
  <link rel="preload" as="image" href="./assets/images/pattern-3.svg">

</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <img src="./assets/images/logo.svg" width="119" height="37" alt="Wren logo">
      </a>

      <nav class="navbar" data-navbar>

        <div class="navbar-top">
          <a href="#" class="logo">
            <img src="./assets/images/logo.svg" width="119" height="37" alt="Wren logo">
          </a>

          <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
            <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
          </button>
        </div>

        <ul class="navbar-list">

          <li>
            <a href="index.html" class="navbar-link hover-1" data-nav-toggler>Accueil</a>
          </li>

          <li>
            <a href="articles.html" class="navbar-link hover-1" data-nav-toggler>Actualités</a>
          </li>

          <li>
            <a href="#recent" class="navbar-link hover-1" data-nav-toggler>Guides/Tutoriels</a>
          </li>

          <li>
            <a href="#recent" class="navbar-link hover-1" data-nav-toggler>Cryptomonnaies</a>
          </li>

          <li>
            <a href="#" class="navbar-link hover-1" data-nav-toggler>Analyses/Critiques</a>
          </li>

          <li>
            <a href="#" class="navbar-link hover-1" data-nav-toggler>Contact</a>
          </li> 

        </ul>

        <div class="navbar-bottom" style="display: none;">

          <div class="profile-card">
            <img src="./assets/images/author-1.png" width="48" height="48" alt="Steven" class="profile-banner">

            <div>
              <p class="card-title">  Steven !</p>

              <p class="card-subtitle">
                You have 3 new messages
              </p>
            </div>
          </div>

          <ul class="link-list">

            <li>
              <a href="#" class="navbar-bottom-link hover-1">Profile</a>
            </li>

            <li>
              <a href="#" class="navbar-bottom-link hover-1">Articles Saved</a>
            </li>

            <li>
              <a href="#" class="navbar-bottom-link hover-1">Add New Post</a>
            </li>

            <li>
              <a href="#" class="navbar-bottom-link hover-1">My Likes</a>
            </li>

            <li>
              <a href="#" class="navbar-bottom-link hover-1">Account Setting</a>
            </li>

            <li>
              <a href="#" class="navbar-bottom-link hover-1">Sign Out</a>
            </li>

          </ul>

        </div>

        <p class="copyright-text">
          Copyright 2022 © Wren - Personal Blog Template.
          Developed by codewithsadee
        </p>

      </nav>

      <a href="#" class="btn btn-primary">Inscription</a>

      <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
      </button>

    </div>
  </header>





  <main>
    <article>

      <!-- 
        - #TOPICS
      -->
<br><br><br>
      <section class="topics" id="topics" aria-labelledby="topic-label">
        <div class="container">
        </div>
      </section><br><br>



      <section class="topics" id="topics" aria-labelledby="topic-label">
        <div class="container">

          <div class="card topic-card">

            <div class="card-content">

              <h2 class="headline headline-2 section-title card-title" id="topic-label">
                Opportunités
              </h2>

              <p class="card-text">
                Vous désirez gagner de l'argent ? nous vous proposons des plateformes/opportunités intéressantes qui ne demandent aucun investissement financier.
              </p>

              <div class="btn-group">
                <button class="btn-icon" aria-label="previous" data-slider-prev>
                  <ion-icon name="arrow-back" aria-hidden="true"></ion-icon>
                </button>

                <button class="btn-icon" aria-label="next" data-slider-next>
                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </button>
              </div>

            </div>

            <div class="slider" data-slider>
              <ul class="slider-list" data-slider-container>

                <li class="slider-item">
                  <a href="#" class="slider-card">

                    <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                      <img src="./assets/images/topic-1.png" width="507" height="618" loading="lazy" alt="Sport"
                        class="img-cover">
                    </figure>

                    <div class="slider-content">
                      <span class="slider-title">Sport</span>

                      <p class="slider-subtitle">38 Articles</p>
                    </div>

                  </a>
                </li>

                <li class="slider-item">
                  <a href="#" class="slider-card">

                    <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                      <img src="./assets/images/topic-2.png" width="507" height="618" loading="lazy" alt="Travel"
                        class="img-cover">
                    </figure>

                    <div class="slider-content">
                      <span class="slider-title">Travel</span>

                      <p class="slider-subtitle">63 Articles</p>
                    </div>

                  </a>
                </li>

                <li class="slider-item">
                  <a href="#" class="slider-card">

                    <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                      <img src="./assets/images/topic-3.png" width="507" height="618" loading="lazy" alt="Design"
                        class="img-cover">
                    </figure>

                    <div class="slider-content">
                      <span class="slider-title">Design</span>

                      <p class="slider-subtitle">78 Articles</p>
                    </div>

                  </a>
                </li>

                <li class="slider-item">
                  <a href="#" class="slider-card">

                    <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                      <img src="./assets/images/topic-4.png" width="507" height="618" loading="lazy" alt="Movie"
                        class="img-cover">
                    </figure>

                    <div class="slider-content">
                      <span class="slider-title">Movie</span>

                      <p class="slider-subtitle">125 Articles</p>
                    </div>

                  </a>
                </li>

                <li class="slider-item">
                  <a href="#" class="slider-card">

                    <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                      <img src="./assets/images/topic-5.png" width="507" height="618" loading="lazy" alt="Lifestyle"
                        class="img-cover">
                    </figure>

                    <div class="slider-content">
                      <span class="slider-title">Lifestyle</span>

                      <p class="slider-subtitle">78 Articles</p>
                    </div>

                  </a>
                </li>

              </ul>
            </div>

          </div>

        </div>
      </section>

      

      <!-- 
        - #FEATURED POST
      -->

      <section class="section feature" aria-label="feature" id="featured">
        <div class="container">

          <h2 class="headline headline-2 section-title">
            <span class="span">Tous Nos Articles</span>
          </h2>

          <p class="section-text">
            Toutes catégories confondues
          </p>

          
          <ul class="feature-list">

          <?php
            foreach($articles as $articles):
          ?>

            <li>
              <div class="card feature-card">

                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                  <img src="admin/images/<?= $articles['photo']?>" width="1602" height="903" loading="lazy"
                    alt="<?=$articles['titre'] ?>" class="img-cover">
                </figure>

                <div class="card-content">

                  <div class="card-wrapper">
                    <div class="card-tag">
                      <a href="#" class="span hover-2">#Travel</a>

                      <a href="#" class="span hover-2">#Lifestyle</a>
                    </div>

                    <div class="wrapper">
                      <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                      <span class="span">3 mins read</span>
                    </div>
                  </div>

                  <h3 class="headline headline-3">
                    <a href="article.php?id=<?= $articles['id'] ?>" class="card-title hover-2">
                      <?=$articles['titre'] ?>
                    </a>
                  </h3>

                  <div class="card-wrapper">

                    <div class="profile-card">
                      <img src="admin/images/<?= $articles['photo']?>" width="48" height="48" loading="lazy" alt="Joseph"
                        class="profile-banner">

                      <div>
                        <p class="card-title">Joseph</p>

                        <p class="card-subtitle">25 Nov 2022</p>
                      </div>
                    </div>

                    <a href="#" class="card-btn">Read more</a>

                  </div>

                </div>

              </div>
            </li>
          <?php endforeach; ?>
          </ul>
          

          <a href="#" class="btn btn-secondary">
            <span class="span">Afficher Plus d'Articles</span>

            <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
          </a>

        </div>

        <img src="./assets/images/shadow-3.svg" width="500" height="1500" loading="lazy" alt="" class="feature-bg">

      </section>





      <!-- 
        - #POPULAR TAGS
      -->

      <section class="tags" aria-labelledby="tag-label">
        <div class="container">

          <h2 class="headline headline-2 section-title" id="tag-label">
            <span class="span">Popular Tags</span>
          </h2>

          <p class="section-text">
            Most searched keywords
          </p>

          <ul class="grid-list">

            <li>
              <button class="card tag-btn">
                <img src="./assets/images/tag1.png" width="32" height="32" loading="lazy" alt="Travel">

                <p class="btn-text">Travel</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="./assets/images/tag2.png" width="32" height="32" loading="lazy" alt="Culture">

                <p class="btn-text">Culture</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="./assets/images/tag3.png" width="32" height="32" loading="lazy" alt="Lifestyle">

                <p class="btn-text">Lifestyle</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="./assets/images/tag4.png" width="32" height="32" loading="lazy" alt="Fashion">

                <p class="btn-text">Fashion</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="./assets/images/tag5.png" width="32" height="32" loading="lazy" alt="Food">

                <p class="btn-text">Food</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="./assets/images/tag6.png" width="32" height="32" loading="lazy" alt="Space">

                <p class="btn-text">Space</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="./assets/images/tag7.png" width="32" height="32" loading="lazy" alt="Animal">

                <p class="btn-text">Animal</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="./assets/images/tag8.png" width="32" height="32" loading="lazy" alt="Minimal">

                <p class="btn-text">Minimal</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="./assets/images/tag9.png" width="32" height="32" loading="lazy" alt="Interior">

                <p class="btn-text">Interior</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="./assets/images/tag10.png" width="32" height="32" loading="lazy" alt="Plant">

                <p class="btn-text">Plant</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="./assets/images/tag11.png" width="32" height="32" loading="lazy" alt="Nature">

                <p class="btn-text">Nature</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="./assets/images/tag12.png" width="32" height="32" loading="lazy" alt="Business">

                <p class="btn-text">Business</p>
              </button>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #RECENT POST
      -->
      <section class="section recent-post" id="recent" aria-labelledby="recent-label">
        
      </section>
    

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer>
    <div class="container">

      <div class="card footer">

        <div class="section footer-top">

          <div class="footer-brand">

            <a href="#" class="logo">
              <img src="./assets/images/logo.svg" width="119" height="37" loading="lazy" alt="Wren logo">
            </a>

            <p class="footer-text">
              When an unknown prnoto sans took a galley and scrambled it to make specimen book not only five When an
              unknown prnoto sans took a galley and scrambled it to five centurie.
            </p>

            <p class="footer-list-title">Address</p>

            <address class="footer-text address">
              123 Main Street <br>
              New York, NY 10001
            </address>

          </div>

          <div class="footer-list">

            <p class="footer-list-title">Categories</p>

            <ul>

              <li>
                <a href="#" class="footer-link hover-2">Action</a>
              </li>

              <li>
                <a href="#" class="footer-link hover-2">Business</a>
              </li>

              <li>
                <a href="#" class="footer-link hover-2">Adventure</a>
              </li>

              <li>
                <a href="#" class="footer-link hover-2">Canada</a>
              </li>

              <li>
                <a href="#" class="footer-link hover-2">America</a>
              </li>

              <li>
                <a href="#" class="footer-link hover-2">Curiosity</a>
              </li>

              <li>
                <a href="#" class="footer-link hover-2">Animal</a>
              </li>

              <li>
                <a href="#" class="footer-link hover-2">Dental</a>
              </li>

              <li>
                <a href="#" class="footer-link hover-2">Biology</a>
              </li>

              <li>
                <a href="#" class="footer-link hover-2">Design</a>
              </li>

              <li>
                <a href="#" class="footer-link hover-2">Breakfast</a>
              </li>

              <li>
                <a href="#" class="footer-link hover-2">Dessert</a>
              </li>

            </ul>

          </div>

          <div class="footer-list">

            <p class="footer-list-title">Newsletter</p>

            <p class="footer-text">
              Sign up to be first to receive the latest stories inspiring us, case studies, and industry news.
            </p>

            <div class="input-wrapper">
              <input type="text" name="name" placeholder="Your name" required class="input-field" autocomplete="off">

              <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
            </div>

            <div class="input-wrapper">
              <input type="email" name="email_address" placeholder="Emaill address" required class="input-field"
                autocomplete="off">

              <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
            </div>

            <a href="#" class="btn btn-primary">
              <span class="span">Subscribe</span>

              <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
            </a>

          </div>

        </div>

        <div class="footer-bottom">

          <p class="copyright">
            &copy; Developed by <a href="#" class="copyright-link">codewithsadee.</a>
          </p>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>

                <span class="span">Twitter</span>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>

                <span class="span">LinkedIn</span>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-instagram"></ion-icon>

                <span class="span">Instagram</span>
              </a>
            </li>

          </ul>

        </div>

      </div>

    </div>
  </footer>





  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="arrow-up-outline" aria-hidden="true"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>