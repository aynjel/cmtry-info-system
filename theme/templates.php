<?php
$q = isset($_GET['q']) ? $_GET['q'] : 'home';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title><?= $title; ?> | Cemetery Mapping and Information System</title>
    <link rel="shortcut icon" href="<?= web_root; ?>template/assets/img/favicon.png">
    <!-- <link rel="stylesheet" href="<?= web_root; ?>template/assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?= web_root; ?>template/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= web_root; ?>template/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= web_root; ?>/css/landing-page.css">
</head>

<body>

  <div class="main-wrapper">
      <div class="header">
          <a class="logo">
            CMTRY
          </a>
          <ul class="nav-menu">
              <li class="nav-item">
                  <a class="nav-link <?php echo ($q == 'login') ? 'nav-link-active' : ''; ?>" href="<?= web_root; ?>index.php?q=login">Login</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link <?php echo ($q == 'register') ? 'nav-link-active' : ''; ?>" href="<?= web_root; ?>index.php?q=register">Register</a>
              </li>
          </ul>
      </div>
      
      <main>
        <!--HERO SECTION-->
        <section class="hero" id="hero">
          <h1>
            Cemetery Mapping and Information System
          </h1>
          <p>
            A web-based cemetery mapping and information system for the City of San Fernando, La Union
          </p>
          <form>
            <input type="text" placeholder="Search">
            <button type="submit">
              <i class="fas fa-search"></i>
            </button>
          </form>
        </section>

        <!--SEARCH RESULT SECTION-->
        <section class="search-result" id="search-result">
          <h2>
            Search Result
          </h2>
          <div class="search-result-content">
            <div class="search-result-item">
              <div class="search-result-item-info">
                <h3>
                  San Fernando Memorial Park
                </h3>
                <p>
                  San Fernando City, La Union
                </p>
                <p>
                  09123456789
                </p>
                <p>
                  Active
                </p>
              </div>
            </div>
            <div class="search-result-item">
              <div class="search-result-item-info">
                <h3>
                  San Fernando Memorial Park
                </h3>
                <p>
                  San Fernando City, La Union
                </p>
                <p>
                  09123456789
                </p>
                <p>
                  Active
                </p>
              </div>
            </div>
            <div class="search-result-item">
              <div class="search-result-item-info">
                <h3>
                  San Fernando Memorial Park
                </h3>
                <p>
                  San Fernando City, La Union
                </p>
                <p>
                  09123456789
                </p>
                <p>
                  Active
                </p>
              </div>
            </div>
            <div class="search-result-item">
              <div class="search-result-item-info">
                <h3>
                  San Fernando Memorial Park
                </h3>
                <p>
                  San Fernando City, La Union
                </p>
                <p>
                  09123456789
                </p>
                <p>
                  Active
                </p>
              </div>
            </div>
            <div class="search-result-item">
              <div class="search-result-item-info">
                <h3>
                  San Fernando Memorial Park
                </h3>
                <p>
                  San Fernando City, La Union
                </p>
                <p>
                  09123456789
                </p>
                <p>
                  Active
                </p>
              </div>
            </div>
            <div class="search-result-item">
              <div class="search-result-item-info">
                <h3>
                  San Fernando Memorial Park
                </h3>
                <p>
                  San Fernando City, La Union
                </p>
                <p>
                  09123456789
                </p>
                <p>
                  Active
                </p>
              </div>
            </div>
            <div class="search-result-item">
              <div class="search-result-item-info">
                <h3>
                  San Fernando Memorial Park
                </h3>
                <p>
                  San Fernando City, La Union
                </p>
                <p>
                  09123456789
                </p>
                <p>
                  Active
                </p>
              </div>
            </div>
            <div class="search-result-item">
              <div class="search-result-item-info">
                <h3>
                  San Fernando Memorial Park
                </h3>
                <p>
                  San Fernando City, La Union
                </p>
                <p>
                  09123456789
                </p>
                <p>
                  Active
                </p>
              </div>
            </div>
            <div class="search-result-item">
              <div class="search-result-item-info">
                <h3>
                  San Fernando Memorial Park
                </h3>
                <p>
                  San Fernando City, La Union
                </p>
                <p>
                  09123456789
                </p>
                <p>
                  Active
                </p>
              </div>
            </div>
            <div class="search-result-item">
              <div class="search-result-item-info">
                <h3>
                  San Fernando Memorial Park
                </h3>
                <p>
                  San Fernando City, La Union
                </p>
                <p>
                  09123456789
                </p>
                <p>
                  Active
                </p>
              </div>
            </div>
            <div class="search-result-item">
              <div class="search-result-item-info">
                <h3>
                  San Fernando Memorial Park
                </h3>
                <p>
                  San Fernando City, La Union
                </p>
                <p>
                  09123456789
                </p>
                <p>
                  Active
                </p>
              </div>
            </div>
            <div class="search-result-item">
              <div class="search-result-item-info">
                <h3>
                  San Fernando Memorial Park
                </h3>
                <p>
                  San Fernando City, La Union
                </p>
                <p>
                  09123456789
                </p>
                <p>
                  Active
                </p>
              </div>
            </div>
          </div>
        </section>

        <!--TABLE SECTION-->
        <!-- <section class="table" id="table">
          <h2>
            Cemetery List
          </h2>
          <div class="table-content">
            <table>
              <thead>
                <tr>
                  <th>
                    Cemetery Name
                  </th>
                  <th>
                    Address
                  </th>
                  <th>
                    Contact Number
                  </th>
                  <th>
                    Status
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    San Fernando Memorial Park
                  </td>
                  <td>
                    San Fernando City, La Union
                  </td>
                  <td>
                    09123456789
                  </td>
                  <td>
                    Active
                  </td>
                </tr>
                <tr>
                  <td>
                    San Fernando Memorial Park
                  </td>
                  <td>
                    San Fernando City, La Union
                  </td>
                  <td>
                    09123456789
                  </td>
                  <td>
                    Active
                  </td>
                </tr>
                <tr>
                  <td>
                    San Fernando Memorial Park
                  </td>
                  <td>
                    San Fernando City, La Union
                  </td>
                  <td>
                    09123456789
                  </td>
                  <td>
                    Active
                  </td>
                </tr>
                <tr>
                  <td>
                    San Fernando Memorial Park
                  </td>
                  <td>
                    San Fernando City, La Union
                  </td>
                  <td>
                    09123456789
                  </td>
                  <td>
                    Active
                  </td>
                </tr>
                <tr>
                  <td>
                    San Fernando Memorial Park
                  </td>
                  <td>
                    San Fernando City, La Union
                  </td>
                  <td>
                    09123456789
                  </td>
                  <td>
                    Active
                  </td>
                </tr>
                <tr>
                  <td>
                    San Fernando Memorial Park
                  </td>
                  <td>
                    San Fernando City, La Union
                  </td>
                  <td>
                    09123456789
                  </td>
                  <td>
                    Active
                  </td>
                </tr>
                <tr>
                  <td>
                    San Fernando Memorial
                  </td>
                  <td>
                    San Fernando City, La Union
                  </td>
                  <td>
                    09123456789
                  </td>
                  <td>
                    Active
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </section> -->

        <!--ABOUT SECTION-->
        <section class="about" id="about">
          <div class="about-content">
            <h2>
              About
            </h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus dolorum veniam temporibus cum blanditiis illum ipsum laboriosam delectus perferendis quas? Adipisci, sint. Architecto officiis dicta doloremque voluptatibus vitae facilis magni! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus dolorum veniam temporibus cum blanditiis illum ipsum laboriosam delectus perferendis quas? Adipisci, sint. Architecto officiis dicta doloremque voluptatibus vitae facilis magni!
            </p>
          </div>
          <div class="carousel">
            <div class="carousel-item">
              <img src="<?= web_root; ?>/img/hero-bg.jpeg" alt="">
            </div>
            <div class="carousel-item">
              <img src="<?= web_root; ?>/img/hero-bg-1.jpeg" alt="">
            </div>
            <div class="carousel-item">
              <img src="<?= web_root; ?>/img/hero-bg.jpeg" alt="">
            </div>
          </div>
        </section>

        <!--FEATURES SECTION-->
        <section class="features" id="features">
          <h2>
            Features
          </h2>
          <div class="features-content">
            <div class="feature">
              <i class="fas fa-map-marked-alt"></i>
              <h3>
                Cemetery Mapping
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.
              </p>
            </div>
            <div class="feature">
              <i class="fas fa-search"></i>
              <h3>
                Search
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.
              </p>
            </div>
            <div class="feature">
              <i class="fas fa-user"></i>
              <h3>
                User Management
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.
              </p>
            </div>
            <div class="feature">
              <i class="fas fa-file-alt"></i>
              <h3>
                Reports
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.
              </p>
            </div>
          </div>
        </section>

        <!--CONTACT SECTION-->
        <section class="contact" id="contact">
          <h2>
            Contact
          </h2>
          <div class="contact-info">
            <div class="contact-item">
              <i class="fas fa-map-marker-alt"></i>
              <p>
                San Fernando City, La Union
              </p>
            </div>
            <div class="contact-item">
              <i class="fas fa-phone-alt"></i>
              <p>
                09123456789
              </p>
            </div>
            <div class="contact-item">
              <i class="fas fa-envelope"></i>
              <p>
                cmtry@gmail.com
              </p>
            </div>
          </div>
          <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125594.37589709257!2d123.60185079131196!3d10.355933947696727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a972ea07076fd7%3A0x110ff6cf2b076330!2sToledo%20City%2C%20Cebu!5e0!3m2!1sen!2sph!4v1701003479390!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div class="contact-social">
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
              <i class="fab fa-instagram"></i>
            </a>
          </div>
          <div class="contact-form">
            <h3>
              Send us a message
            </h3>
            <form>
              <input type="text" placeholder="Name">
              <input type="email" placeholder="Email">
              <textarea placeholder="Message"></textarea>
              <button type="submit">
                Send
              </button>
            </form>
          </div>
        </section>

        <!--FOOTER SECTION-->
        <footer class="footer">
          <ul class="footer-nav">
            <li class="footer-nav-item">
              <a href="#hero">Home</a>
            </li>
            <li class="footer-nav-item">
              <a href="#about">About</a>
            </li>
            <li class="footer-nav-item">
              <a href="#features">Features</a>
            </li>
            <li class="footer-nav-item">
              <a href="#contact">Contact</a>
            </li>
          </ul>
          <p>
            &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | Cemetery Mapping and Information System
          </p>
        </footer>
      </main>
  </div>
  
  <script src="<?= web_root; ?>template/assets/js/jquery-3.6.0.min.js"></script>
  <script src="<?= web_root; ?>template/assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?= web_root; ?>template/assets/js/feather.min.js"></script>
  <script src="<?= web_root; ?>template/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?= web_root; ?>template/assets/plugins/apexchart/apexcharts.min.js"></script>
  <script src="<?= web_root; ?>template/assets/plugins/apexchart/chart-data.js"></script>
  <script src="<?= web_root; ?>template/assets/js/script.js"></script>
</body>

</html>