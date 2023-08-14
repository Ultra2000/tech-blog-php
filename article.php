<?php
  include('admin/functions.php');
  include('view.php');
  $pdo = pdo_connect_mysql();
  $msg = '';

  if(isset($_GET['id'])){
    $stmt = $pdo->prepare('SELECT * FROM articles WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC); 
  }

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

<style>
  .breadcrumb{
            
            padding: 8px 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .breadcrumb-item {
            display: inline-block;
        }

        .breadcrumb-item + .breadcrumb-item::before{
            
            margin: 0 5px;
        }

        .breadcrumb-item.active{
            font-weight: bold;
        }
</style>

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

      <section class="topics" id="topics" aria-labelledby="topic-label">
        <div class="container">
        </div>
      </section><br><br>

      



      <!-- 
        - #FEATURED POST
      -->

      <section class="section feature" aria-label="feature" id="featured">
        <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Accueil</a></li> |
            <li class="breadcrumb-item"><a href="#">Catégorie</a></li> |
            <li class="breadcrumb-item active" aria-current="page">Page actuelle</li>
          </ol>
        

          <p class="section-text">
            <h1 class="headline headline-3 section-title" style="text-align: center;">
              
                <?= $article['titre'] ?>
            </h1>
          </p><br>

          <ul class="feature-list">

            <li style="width: 125rem;">
              
              <div class="card feature-card">
              
                <figure class="card-banner img-holder" style="--width: 1602; --height: 803;">
                  <img src="admin/images/<?= $article['photo'] ?>" width="1602" height="903" loading="lazy"
                    alt="Self-observation is the first step of inner unfolding" class="img-cover">
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

                  <p class="headline headline-3" style="text-align: justify; line-height: 5rem;  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap'); font-family: poppins;">
                    <p href="#" class="card-title" style="font-size: 1.8rem;">
                      <?= $article['description'] ?>
                    </p>
                    
                  </p>

                  <div class="card-wrapper">

                    <div class="profile-card">
                      <img src="./assets/images/author-1.png" width="48" height="48" loading="lazy" alt="Joseph"
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

          </ul>


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