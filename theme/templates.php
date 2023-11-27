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
      <div class="header">
          <a class="logo" href="<?= web_root; ?>index.php">
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
        <?php if ($q == 'details' && isset($_GET['id']) && isset($_GET['graveno'])) { ?>
        <!--DETAILS SECTION-->
        <section class="details" id="details">
          <div class="details-content">
            <img src="https://ui-avatars.com/api/?name=<?php echo $_GET['name']; ?>&background=random&color=000&rounded=true&size=32&bold=true&format=svg" alt="<?php echo $_GET['name']; ?>">
            <h2>
              <?php echo $_GET['name']; ?>
            </h2>
            <ul class="details-list">
              <li class="details-item">
                <p>
                  Location: <?php echo $_GET['location']; ?>
                </p>
              </li>
              <li class="details-item">
                <p>
                  Grave No.: <?php echo $_GET['graveno']; ?>
                </p>
              </li>
              <li class="details-item">
                <p>
                  Section: <?php echo $_GET['section']; ?>
                </p>
              </li>
              <li class="details-item">
                <p>
                  Birth: <?php echo $_GET['born']; ?>
                </p>
              </li>
              <li class="details-item">
                <p>
                  Died: <?php echo $_GET['died']; ?>
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
        } else {
        ?>
        <!--HERO SECTION-->
        <section class="hero" id="hero">
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

        <?php if ($q == 'search' || isset($_POST['submit-search'])) {
          ?>
        <!--SEARCH RESULT SECTION-->
        <section class="search-result" id="search">
          <h2>
            Search Result
          </h2>
          <p>
            Search result for "<?= (isset($_GET['location'])) ? $_GET['location'] : (isset($_POST['search']) ? $_POST['search'] : ''); ?>"
          </p>
          <div class="search-result-content">
            
            <?php
              if (isset($_GET['location'])) {
              # code...
              if (isset($_GET['search'])) {
                # code...
                $sql = "SELECT * FROM tblpeople WHERE LOCATION='".$_GET['location']."' AND GRAVENO = '".$_GET['graveno']."' AND FNAME ='".$_GET['search']."'";
                $mydb->setQuery($sql);
                $cur = $mydb->executeQuery();
                $numrows = $mydb->num_rows($cur);//get the number of count
              }else{
                $sql = "SELECT * FROM tblpeople WHERE LOCATION='".$_GET['location']."'";
                $mydb->setQuery($sql);
                $cur = $mydb->executeQuery();
                $numrows = $mydb->num_rows($cur);//get the number of count
              }
            
            }elseif (isset($_POST['search'])){
              $sql = "SELECT * FROM tblpeople WHERE FNAME LIKE '%".$_POST['search']."%'";
              $mydb->setQuery($sql);
              $cur = $mydb->executeQuery();
              $numrows = $mydb->num_rows($cur);//get the number of count
            }else{
              $sql = "SELECT * FROM tblpeople";
              $mydb->setQuery($sql);
              $cur = $mydb->executeQuery();
              $numrows = $mydb->num_rows($cur);//get the number of count
            }
          
          # code...
          if ($numrows > 0) {
            # code... 
            $cur = $mydb->loadResultList();

            foreach ($cur as $res) {
              echo '<a href="index.php?q=details&id='.$res->PEOPLEID.'&graveno='.$res->GRAVENO.'&name='.$res->FNAME.'&location='.$res->LOCATION.'&born='.$res->BORNDATE.'&died='.$res->DIEDDATE.'&section='.$res->CATEGORIES.'" class="search-result-item">';
              echo '<div class="search-result-item-info">';
              echo '<h4>'.$res->FNAME.'</h4>';
              echo '<h5>'.$res->LOCATION.'</h5>';
              echo '<p>Birth: '.$res->BORNDATE.'</p>';
              echo '<p>Died: '.$res->DIEDDATE.'</p>';
              echo '<p>Plot No: '.$res->GRAVENO.'</p>';
              echo '<p>Section: '.$res->CATEGORIES.'</p>';
              echo '</div>';
              echo '</a>';

            }

          }else{
              echo '<tr>'; 
              echo '<td colspan="5" style="text-align:center">No Record Found!</td>'; 
              echo '</tr>'; 
          }
          ?>
          </div>
        </section>
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