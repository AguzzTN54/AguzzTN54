<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/css/all.min.css" />
  <link rel="stylesheet" href="style.css" />

  <title>Admin Panel || AGZ.DZ</title>

  <script src="assets/js/lottie.js"></script>
</head>

<body>
  <!-- Preloader -->
  <div id="preloader">
    <div style="position:relative; width:100%; height:100%">
      <div class="load">
        <img src="../assets/images/1173-sun-burst-weather-icon.gif" alt="Loading">
        <p>Matahari Bersinar Terang . . .</p>
      </div>
    </div>
  </div>

  <!-- Akhir Preloader -->

  <?php
  $navbar = '
  <!-- Navbar -->
  <nav id="header" class="navbar navbar-expand-lg navbar-light bg-dark text-white p-3 sticky-top">
    <div class="container">
      <a class="navbar-brand text-white" href="/agzdesign">
        AGZ DESIGN
      </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
		</button>
      <div class="main-nav collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item text-white nav-link" href="../'.$folderadmin.'"> Home</a>
          <a class="nav-item text-white nav-link" href="../graphic-design.php"> Graphic Design</a>
          <a class="nav-item text-white nav-link" href="../web-design.php"> Web Design</a>
          <a class="nav-item text-white nav-link" href="../'.$folderadmin.'/?logout"> Log Out</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->';

  $footer = '<div class="container mt-5"> <hr/>
    <div class="pt-2 pb-3 text-center">
      Agz Design &copy '.date('Y').' All Right Reserved
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/main.js"></script>
  <script>
  $(window).on("load resize ", function() {
    var scrollWidth = $(\'.tbl-content\').width() - $(\'.tbl-content table\').width();
    $(\'.tbl-header\').css({\'padding-right\':scrollWidth});
  }).resize();
  </script>
</body>

</html>';

?>