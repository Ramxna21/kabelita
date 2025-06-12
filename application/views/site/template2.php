<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="colorlib">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta charset="UTF-8">
  <title>PT. CRT KABELITA</title>
  <link rel="shortcut icon" href="img/fav.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/linearicons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/magnific-popup.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/jquery-ui.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/nice-select.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/animate.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.carousel.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main.css">
  <style>
    .dropdown-menu {
    background-color: #f8f9fa !important;
    color: #f8f9fa;
    overflow: hidden;
    width: 200px; /* Pastikan lebar dropdown tetap konsisten */
    padding: 10px; /* Tambahkan padding agar lebih rapi */
    border-radius: 5px; /* Tambahkan border radius agar lebih estetis */
    }

    .dropdown-menu:hover {
        overflow: visible;
    }

    .dropdown-item {
        padding: 12px 15px; /* Pastikan padding kiri dan kanan sama */
        width: 100%; /* Memastikan setiap item memenuhi lebar dropdown */
        box-sizing: border-box; /* Agar padding tidak mempengaruhi ukuran elemen */
        text-align: left; /* Pastikan teks tetap rata kiri */
    }

    .dropdown-item:hover {
        background-color:rgb(52, 69, 85);
        border-radius: 5px;
        color: rgb(252, 176, 13);
    }

    .slide-item {
      height: 100vh;
      position: relative;
      color: white;
    }
    .overlay-bg {
      background: rgba(0, 0, 0, 0.4);
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
    }
    body {
      background-color: #add8e6;
    }
    .container-fluid.main-menu {
      background-color: rgb(52, 69, 85);
    }
    .footer-area {
    background: rgb(52, 69, 85);
    }
  </style>
</head>
<body>
  <header id="header">
    <div class="container-fluid main-menu">
      <div class="row align-items-center justify-content-between d-flex">
        <div id="logo">
          <a href="<?= base_url('site'); ?>">
            <img src="<?= base_url('assets/img/logo.jpg'); ?>" alt="" title="" />
          </a>
        </div>
        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li><a href="<?= base_url('site');?>">Home</a></li>
            <li class="nav-item dropdown">
              <a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">ABOUT US</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?= base_url('site/about');?>">About Company</a></li>
                <li><a class="dropdown-item" href="<?= base_url('site/vision');?>">Company Outline</a></li>
                <li><a class="dropdown-item" href="<?= base_url('site/team');?>">Company History</a></li>
                <li><a class="dropdown-item" href="<?= base_url('site/quality');?>">Quality Control</a></li>
                <li><a class="dropdown-item" href="<?= base_url('site/mt');?>">Manpower & Training</a></li>
              </ul>
            </li>
            <li><a href="<?= base_url('site/service');?>">Product</a></li>
            <li><a href="<?= base_url('site/credibility');?>">Credibility</a></li>
            <li><a href="<?= base_url('site/gallery');?>">What's News</a></li>
            <li><a href="<?= base_url('site/contact');?>">Contact</a></li>
            <li><a href="<?= base_url('faq');?>">FAQ</a></li>
            <li><a data-toggle="modal" data-target="#login" href="#">Login</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalFormTitle">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php  
          echo validation_errors();                       
          echo form_open('login/auth_action'); 
        ?>
        <div class="modal-body">
          <div class="mb-3">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" name="username" required >
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" name="password" required >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <input type="submit" name="submit" class="btn btn-info btn-pill" value="Login">
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  <?=$contents?>
  <footer class="footer-area section-gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>PT. CRT KABELITA</h6>
            <p>---------------------</p>
          </div>
        </div>
      </div>
      <div class="row footer-bottom d-flex justify-content-between align-items-center">
        <p class="col-lg-8 col-sm-12 footer-text m-0">
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy; <script>document.write(new Date().getFullYear());</script> PT. CRT KABELITA
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>
    </div>
  </footer>
  <!-- End footer Area -->
  <script src="<?= base_url(); ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/vendor/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  <script src="<?= base_url(); ?>assets/js/jquery-ui.js"></script>
  <script src="<?= base_url(); ?>assets/js/easing.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/hoverIntent.js"></script>
  <script src="<?= base_url(); ?>assets/js/superfish.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery.ajaxchimp.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery.nice-select.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/owl.carousel.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/mail-script.js"></script>
  <script src="<?= base_url(); ?>assets/js/main.js"></script>
  <script>
    const navLinks = document.querySelectorAll('.nav-menu li');
    navLinks.forEach(link => {
      link.addEventListener('click', function() {
        navLinks.forEach(item => item.classList.remove('active'));
        this.classList.add('active');
      });
    });
  </script>
</body>
</html>
