<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAVOY</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/spinner.css">
    <link rel="stylesheet" href="css/n.css">
    <script src="js/script.js" defer></script>
</head>
<body>

<header class="main-header">
    <div class="container">
      <div class="logo">
        <a href="/">
          <span class="SAV">SAV</span>
          <span class="best">OY</span>
        </a>
      </div>
      <nav>
        <nav>
          <ul>
          
            <li>
              <a class="nav-link" href="index.php">MOVIES</a>
            </li>
            <li>
              <a class="nav-link" href="contact.php">CONTACT</a>
            </li>
          </ul>
        </nav>
      </nav>
    </div>
  </header>

    <!-- Now Playing Section -->
    <section class="now-playing">

    <br>
    <br>

    <center>
    <h1>Now Playing</h1>
    </center>

    <div class="swiper">
      <div class="swiper-wrapper"></div>
    </div>
  </section>
    <!----- Featurd Categories--------->
    <div class="categories">
      <div class="small-container">
        <div class="row">
          <div class="col-3">
            <img src="./assets/images/01.jpg" alt="" />
          </div>
          <div class="col-3">
            <img src="./assets/images/02.jpg" alt="" />
          </div>
          <div class="col-3">
            <img src="./assets/images/03.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
  <!-- Search Movies -->
  <section class="search">
    <div class="container">
      <div id="alert"></div>
      <form action="search.php" class="search-form">
        <!-- movies and shows radio box -->
        <div class="search-radio">

        </div>
        <div class="search-flex">
          <input type="text" name="search-term" id="search-term" placeholder="Enter search term" />
          <button class="btn" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </form>
    </div>
  </section>
 

  <!-- Popular Movies -->
  <section class="container">
    <h2>Popular Movies</h2>
    <div id="popular-movies" class="grid"></div>
  </section>




<!----- Movies--------->
<div class="small-container">
      
      <div class="row">
        <div class="col-4">
          <a href="movies.php">
            <img src="./assets/images/ph/n1.jpg" alt=""
          /></a>
          <br>
          <br>
          <center><h4>KINGDOM OF THE PLANET OF THE APES</h4></center>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          
        </div>

        <div class="col-4">
          <a href="02.php">
          <img src="./assets/images/ph/n2.jpg" alt="" />
          </a>
          <br>
          <br>
          <center><h4>INSIDE OUT 2</h4></center>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
            <i class="fa fa-star-o"></i>
          </div>
          
        </div>

        <div class="col-4">
          <a href="03.php">
          <img src="./assets/images/ph/n3.jpg" alt="" />
          </a>
          <br>
          <br>
         <center><h4>UNDER PARIS</h4></center>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
          </div>
          
        </div>
        <div class="col-4">
          <a href="04.php">
          <img src="./assets/images/ph/n4.jpg" alt="" />
          </a>
          <br>
          <br>
          <center><h4>GODZILLA X KONG: THE NEW EMPIRE</h4></center>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
         
        </div>
      </div>

      <div class="row">
        <div class="col-4">
          <a href="05.php"><img src="./assets/images/ph/n5.jpg" alt="" />
        </a>
          <br>
          <br>
          <center><h4>IF</h4></center>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          
        </div>

        <div class="col-4">
          <a href="06.php">
          <img src="./assets/images/ph/n6.jpg" alt="" />
          </a>
          <br>
          <br>
          <center><h4>CIVIL WAR</h4></center>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
            <i class="fa fa-star-o"></i>
          </div>
          
        </div>

        <div class="col-4">
         <a href="07.php">
         <img src="./assets/images/ph/n7.jpg" alt="" />
         </a>
          <br>
          <br>
          <center><h4>THE ROUNDUP: NO WAY OUT</h4></center>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
          </div>
          
        </div>
        <div class="col-4">
          <a href="08.php">
          <img src="./assets/images/ph/n8.jpg" alt="" />
          </a>
          <br>
          <br>
          <center><h4> ULTRAMAN: RISING</h4></center>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <a href="09.php"><img src="./assets/images/ph/n9.jpg" alt="" />
        </a>
         <br>
         <br>
         <center> <h4>THE LAST KUMITE</h4></center>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          
        </div>

        <div class="col-4">
          <a href="10.php"><img src="./assets/images/ph/n10.jpg" alt="" />
        </a>
          <br>
          <br>
          <center><h4>THE WATCHERS</h4></center>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
            <i class="fa fa-star-o"></i>
          </div>
          
        </div>

        <div class="col-4">
          <a href="11.php"><img src="./assets/images/ph/n11.jpg" alt="" />
        </a>
          <br>
          <br>
          <center><h4>ATLAS</h4></center>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
          </div>
          
        </div>
        <div class="col-4">
          <a href="12.php"><img src="./assets/images/ph/n12.jpg" alt="" />
        </a>
          <br>
          <br>
          <center><h4>ALIENOID: RETURN TO THE FUTURE</h4></center>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          
        </div>
      </div>
    </div>

    <section>
      <footer class="bottom">
        <p class="copyright">© Created by 2024 / Achini nethmini </p>
        <div class="legal">
        </div>
      </footer>
    </section>



</body>
</html>