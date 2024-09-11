<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAVOY</title>
    <link rel="stylesheet" href="css/contact1.css">
    <link rel="stylesheet" href="css/contact2.css">

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

  
  <section id="contact-form" class="py-3">
    <div class="container">
      <br>
      <h1 class="l-heading"><span class="text-primary">Contact</span></h1>
      <br>
      <form action="proces.php">

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name">
        </div>
        <div class="form-group">
          <label for="lastname">Lastname</label>
          <input type="text" name="lastname" id="lastname">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="phone" name="phone" id="phone">
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea name="message" id="message">

                </textarea>
        </div>
        <button type="submit" class="btn">Submit</button>
      </form>
    </div>
  </section>


  <section id="contact-info" class="bg-darc">
    <div class="container">
      <div class="box ">
        <i class="fas fa-hotel fa-3x"></i>
        <h3>Location</h3>
        <p>12/2 - Colombo</p>
      </div>
      <div class="box ">
        <i class="fas fa-phone fa-3x"></i>
        <h3>PhoneNumber</h3>
        <p>011 236 8547 </p>
      </div>
      <div class="box ">
        <i class="fas fa-envelope fa-3x"></i>
        <h3>Email Adress</h3>
        <p>Savoymoviethearter@mail.com</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="main-footer">
    <div class="container">
      <div class="logo"><span>SAVOY THEATER</span></div>
      <p class="footer__copy">&#169;Created By 2024 / ...........</p>
      <div class="social-links">
        <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </footer>

  <div class="spinner"></div>

</body>
</html>