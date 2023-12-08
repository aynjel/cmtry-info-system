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
    <link rel="stylesheet" href="<?= web_root; ?>/css/form.css">
</head>

<body>

  <div class="main-wrapper">
      <?php if ($q != 'details') { ?>
      <div class="header">
          <a class="logo" href="<?= web_root; ?>index.php">
            <img src="<?= web_root; ?>img/logo.jpg" alt="Logo">
          </a>
          <ul class="nav-menu">
              <li class="nav-item">
                <a class="nav-link <?= ($q == 'home') ? 'nav-link-active' : ''; ?>" href="<?= web_root; ?>index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($q == 'about') ? 'nav-link-active' : ''; ?>" href="<?= web_root; ?>index.php?q=about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($q == 'features') ? 'nav-link-active' : ''; ?>" href="<?= web_root; ?>index.php?q=features">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($q == 'contact') ? 'nav-link-active' : ''; ?>" href="<?= web_root; ?>index.php?q=contact">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($q == 'login') ? 'nav-link-active' : ''; ?>" href="<?= web_root; ?>index.php?q=login">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($q == 'register') ? 'nav-link-active' : ''; ?>" href="<?= web_root; ?>index.php?q=register">Register</a>
              </li>
          </ul>
      </div>
      <?php }?>
      
      <main>

        <!--DETAILS SECTION-->
        <?php if ($q == 'details' && isset($_GET['id']) && isset($_GET['graveno'])) { ?>
        <section class="details" id="details">
          <div class="details-content">
            <?php if (isset($_GET['location'])) { ?>
            <a class="back" href="index.php?q=search&location=<?= $_GET['location']; ?>#search">
              <i class="fas fa-arrow-left"></i> Back
            </a>
            <?php }else{ ?>
            <a class="back" href="index.php?q=search&search=<?= $_GET['name']; ?>#search">
              <i class="fas fa-arrow-left"></i> Back
            </a>
            <?php } ?>
            <img src="https://ui-avatars.com/api/?name=<?= $_GET['name']; ?>&background=random&color=000&rounded=true&size=32&bold=true&format=svg" alt="<?= $_GET['name']; ?>">
            <h2>
              <?= $_GET['name']; ?>
            </h2>
            <ul class="details-list">
              <li class="details-item">
                <p>
                  Location: <?= $_GET['location']; ?>
                </p>
              </li>
              <li class="details-item">
                <p>
                  Grave Number: <?= $_GET['graveno']; ?>
                </p>
              </li>
              <li class="details-item">
                <p>
                  Section: <?= $_GET['section']; ?>
                </p>
              </li>
              <li class="details-item">
                <p>
                  Birth: <?= $_GET['born']; ?>
                </p>
              </li>
              <li class="details-item">
                <p>
                  Died: <?= $_GET['died']; ?>
                </p>
              </li>
            </ul>
          </div>
          <div class="map-details-content">
            <?php include('../' . web_root . 'map.php'); ?>
          </div>
        </section>
        <?php } else{        
        if ($q == 'login') {
            include('../' . web_root . 'login.php');
        } elseif ($q == 'register') {
            include('../' . web_root . 'register.php');
        } else { ?>

        <!--HERO SECTION-->
        <?php if ($q == 'home' || $q == 'search') { ?>
        <section class="hero" id="hero">

          <img src="<?= web_root; ?>img/logo.jpg" alt="Logo" class="hero-logo">

          <h1>
            Cemetery Mapping and Information System
          </h1>
          <p>
            A cemetery mapping and information system for the people to easily locate the grave of their loved ones.
          </p>
          <?php
          if (isset($_GET['location'])) {
            echo '<a href="index.php?q=home#search" class="clear-location">';
            echo $_GET['location'];
            echo '<i class="fas fa-times"></i>';
            echo '</a>';
          }else{
            ?>
            <form method="POST">
              <input type="text" placeholder="Search" name="search" required>
              <button type="submit" name="submit-search" value="submit-search">
                <i class="fas fa-search"></i>
              </button>
            </form>
            <?php
          }
          ?>
          
          <ul class="locations">
            <li class="location-item">
              <a href="index.php?q=search&location=Sangi#search" class="location-item-link">
                <p>
                Sangi
                </p>
              </a>
            </li>
            <li class="location-item">
              <a href="index.php?q=search&location=Ibo#search" class="location-item-link">
                <p>
                Ibo
                </p>
              </a>
            </li>
            <li class="location-item">
              <a href="index.php?q=search&location=Dumlog#search" class="location-item-link">
                <p>
                Dumlog
                </p>
              </a>
            </li>
            <li class="location-item">
              <a href="index.php?q=search&location=Luray#search" class="location-item-link">
                <p>
                Luray
                </p>
              </a>
            </li>
            <li class="location-item">
              <a href="index.php?q=search&location=Canlumampao#search" class="location-item-link">
                <p>
                Canlumampao
                </p>
              </a>
            </li>
            <li class="location-item">
              <a href="index.php?q=search&location=Poog#search" class="location-item-link">
                <p>
                Poog
                </p>
              </a>
            </li>
            <li class="location-item">
              <a href="index.php?q=search&location=Bunga#search" class="location-item-link">
                <p>
                Bunga
                </p>
              </a>
            </li>
            <li class="location-item">
              <a href="index.php?q=search&location=Carmen#search" class="location-item-link">
                <p>
                Carmen
                </p>
              </a>
            </li>
          </ul>
          
        </section>
        
        <!--SEARCH RESULT SECTION-->
        <?php if (isset($_POST['submit-search']) || $q == 'search') {
          if (isset($_POST['submit-search'])) {
            $search = $_POST['search'];
            echo '<script>window.location.href = "index.php?q=search&search='.$search.'#search";</script>';
          }
          ?>
        <section class="search-result" id="search">
          <h2>
            Search Result
          </h2>
          <p class="p">
            Search result for "<?= (isset($_GET['location'])) ? $_GET['location'] : (isset($_GET['search']) ? $_GET['search'] : ''); ?>"
          </p>
          <div class="search-result-content">
            
            <?php
            // pagination
            $mydb->setQuery("SELECT * FROM tblpeople");
            $cur = $mydb->executeQuery();
            $total_count = $mydb->num_rows($cur);
            $per_page = 10;
            $num_pages = ceil($total_count/$per_page);
            $show_page = 1;
            if (isset($_GET['page']) && is_numeric($_GET['page'])) {
              $show_page = $_GET['page'];
              if ($show_page > 0 && $show_page <= $num_pages) {
                $start = ($show_page - 1) * $per_page;
                $end = $start + $per_page;
              }else{
                $start = 0;
                $end = $per_page;
              }
            }else{
              $start = 0;
              $end = $per_page;
            }
            
            if (isset($_GET['location'])) {
              $sql = "SELECT * FROM tblpeople WHERE LOCATION = '".$_GET['location']."' LIMIT $start, $end";
              $mydb->setQuery($sql);
              $cur = $mydb->executeQuery();
              $numrows = $mydb->num_rows($cur);//get the number of count
            }elseif (isset($_GET['search'])){
              $sql = "SELECT * FROM tblpeople WHERE FNAME LIKE '%".$_GET['search']."%' LIMIT $start, $end";
              $mydb->setQuery($sql);
              $cur = $mydb->executeQuery();
              $numrows = $mydb->num_rows($cur);//get the number of count
            }else{
              $sql = "SELECT * FROM tblpeople LIMIT $start, $end";
              $mydb->setQuery($sql);
              $cur = $mydb->executeQuery();
              $numrows = $mydb->num_rows($cur);//get the number of count
            }
            
            if ($numrows > 0) {
              while ($row = $mydb->fetch_array($cur)) {
                ?>
                <a class="search-result-item" href="index.php?q=details&id=<?= $row['PEOPLEID']; ?>&name=<?= $row['FNAME']; ?>&location=<?= $row['LOCATION']; ?>&graveno=<?= $row['GRAVENO']; ?>&section=<?= $row['CATEGORIES']; ?>&born=<?= $row['BORNDATE']; ?>&died=<?= $row['DIEDDATE']; ?>#details">
                  <img src="https://ui-avatars.com/api/?name=<?= $row['FNAME']; ?>&background=random&color=000&rounded=true&bold=true&format=svg" alt="<?= $row['FNAME']; ?>">
                  <div class="search-result-item-content">
                    <h3>
                      <?= $row['FNAME']; ?>
                    </h3>
                    <ul>
                      <li>
                        <!-- cross icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512"><path d="M176 0c-26.5 0-48 21.5-48 48v80H48c-26.5 0-48 21.5-48 48v32c0 26.5 21.5 48 48 48h80V464c0 26.5 21.5 48 48 48h32c26.5 0 48-21.5 48-48V256h80c26.5 0 48-21.5 48-48V176c0-26.5-21.5-48-48-48H256V48c0-26.5-21.5-48-48-48H176z"/></svg> <?= $row['DIEDDATE']; ?>
                      </li>
                      <li>
                        <!-- star icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg> <?= $row['BORNDATE']; ?>
                      </li>
                      <li>
                        <!-- hash icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><path d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z"/></svg> <?= $row['GRAVENO']; ?>
                      </li>
                      <li>
                        <!-- location icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> <?= $row['LOCATION']; ?>
                      </li>
                      <li>
                        <!-- section icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><path d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg> <?= $row['CATEGORIES']; ?>
                      </li>
                    </ul>
                  </div>
                </a>
                <?php
              }
            }else{
              ?>
              <div class="search-result-item">
                <p class="no-result">
                  No results found.
                </p>
              </div>
              <?php
            }
          ?>
          
          </div>
          <!--div for next and previous button-->
          <div class="next-prev-btn">
            <?php
            if(isset($_GET['location'])){
              $location = $_GET['location'];
              if ($show_page > 1) {
                $page = $show_page - 1;
                $prev = "<a href='index.php?q=search&page=$page&location=".$location."#search'>Prev</a>";
                echo $prev;
              } 
              if ($show_page < $num_pages) {
                $page = $show_page + 1;
                $next = "<a href='index.php?q=search&page=$page&location=".$location."#search'>Next</a>";
                echo $next;
              }
            }elseif (isset($_GET['search'])) {
              $search = $_GET['search'];
              if ($show_page > 1) {
                $page = $show_page - 1;
                $prev = "<a href='index.php?q=search&page=$page&search=".$search."#search'>Prev</a>";
                echo $prev;
              } 
              if ($show_page < $num_pages) {
                $page = $show_page + 1;
                $next = "<a href='index.php?q=search&page=$page&search=".$search."#search'>Next</a>";
                echo $next;
              }
            }else{
              if ($show_page > 1) {
                $page = $show_page - 1;
                $prev = "<a href='index.php?q=search&page=$page#search'>Prev</a>";
                echo $prev;
              } 
              if ($show_page < $num_pages) {
                $page = $show_page + 1;
                $next = "<a href='index.php?q=search&page=$page#search'>Next</a>";
                echo $next;
              }
            }
            ?>
          </div>
        </section>
        <?php } ?>
        <?php } ?>

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
        <?php if ($q == 'about') { ?>
        <section class="about" id="about">
          <div class="about-content">
            <h2>
              About
            </h2>
            <p>
              &emsp; &emsp; &emsp; &emsp; Truly a spectacular memorial garden at the sunset coast of Cebu Province - Toledo City. It reflects the traditional Filipino family setting inherent of our history and culture promotes the family centric tradition with its peaceful countryside environment complete with amenities for your convenience.
            </p>
            <p>
              &emsp; &emsp; &emsp; &emsp; Mission and Vision: Aims to be providers of preferred memorial gardens and integrated services, serving middle to high end market of every progressive town and city in Visayas and Mindanao Region.
              We perpetuate investments and nurture good relationships because shareholders and stakeholders are our “Clients for Life”.
              To do so, we strive to render top quality memorial developments and reliable services; and garner the best investment returns through: innovative corporate practices, professionalism, teamwork, and exemplary citizenship.
          </div>
          <div class="carousel">
            <div class="carousel-item">
              <img src="<?= web_root; ?>/img/hero-bg.jpeg" alt="">
            </div>
            <div class="carousel-item">
              <img src="<?= web_root; ?>/img/hero-bg-1.jpeg" alt="">
            </div>
            <div class="carousel-item">
              <img src="<?= web_root; ?>/img/hero-bg-2.jpg" alt="">
            </div>
          </div>
        </section>
        <?php } ?>

        <?php if ($q == 'features') { ?>
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
                Cemetery map for the user to easily locate the grave of their loved ones.
              </p>
            </div>
            <div class="feature">
              <i class="fas fa-search"></i>
              <h3>
                Search
              </h3>
              <p>
                Search for the cemetery of your loved ones.
              </p>
            </div>
            <div class="feature">
              <i class="fas fa-user"></i>
              <h3>
                User Management
              </h3>
              <p>
                User management for the administrator to manage the users of the system.
              </p>
            </div>
            <div class="feature">
              <i class="fas fa-file-alt"></i>
              <h3>
                Reports
              </h3>
              <p>
                Reports for the administrator to view the reports of the system.
              </p>
            </div>
          </div>
        </section>
        <?php } ?>

        <?php if ($q == 'contact') { ?>
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
        <?php } ?>
        <?php } ?>

        <!--FOOTER SECTION-->
        <footer class="footer">
          <?php
          if ($q == 'home') {
          ?>
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
            &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | Cemetery Mapping and Information System.
          </p>
          <?php
          }else{
          ?>
          <p>
            &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | Cemetery Mapping and Information System
          </p>
          <?php
          }
          ?>
        </footer>
        <?php } ?>
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