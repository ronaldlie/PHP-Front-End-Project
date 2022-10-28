<!DOCTYPE html>
<?php 
include "includes/config.php";

$query = mysqli_query($connection, "SELECT * FROM kategori");
$query1 = mysqli_query($connection, "SELECT * FROM destinasi");
$query2 = mysqli_query($connection, "SELECT * FROM area");

$destinasi = mysqli_query($connection, "SELECT * 
    FROM kategori, destinasi, fotodestinasi
    WHERE kategori.kategoriID = destinasi.kategoriID
    AND destinasi.destinasiID = fotodestinasi.destinasiID");

$sql = mysqli_query($connection, "SELECT * FROM destinasi");
$jumlah = mysqli_num_rows($sql);

$foto = mysqli_query($connection, "SELECT * FROM makanan");
$villa1 = mysqli_query($connection, "SELECT * FROM villa WHERE villaID = 'VL01'");
$villa2 = mysqli_query($connection, "SELECT * FROM villa WHERE villaID = 'VL02'");
$villa3 = mysqli_query($connection, "SELECT * FROM villa WHERE villaID = 'VL03'");
$villa4 = mysqli_query($connection, "SELECT * FROM villa WHERE villaID = 'VL04'");

$event = mysqli_query($connection, "SELECT * FROM kegiatan, kabupaten where kegiatan.kabupatenKODE = kabupaten.kabupatenID");
?>

<?php
    include "includes/config.php";

    if(isset($_POST['Simpan'])) {

        $sarannama = $_POST['inputnama'];
        $saranmasukan = $_POST['inputmasukan'];
        $saranrating = $_POST['inputrating'];

        mysqli_query($connection, "insert into saran values ('$sarannama', 
                        '$saranmasukan', '$saranrating')");
        
        header("location:frontend.php");
    }
        
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="icon" href="images/salt.png">

    <!-- Custom styles for this template-->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Events</title>
</head>
<body>

<!-- Nav bar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #38ada9;">
<a href="#scrollspyHeading1"><img src="images/Pesona.png" style="width: 80px; height:100%;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="frontend.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kategori
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if(mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query))
            {?>
              <a class="dropdown-item" href="#"><?php echo $row["kategorinama"]?></a>
          <?php } } ?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          destinasi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if(mysqli_num_rows($query1) > 0) {
            while ($row = mysqli_fetch_array($query1))
            {?>
              <a class="dropdown-item" href="#"><?php echo $row["destinasinama"]?></a>
          <?php } } ?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Area
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if(mysqli_num_rows($query2) > 0) {
            while ($row = mysqli_fetch_array($query2))
            {?>
              <a class="dropdown-item" href="#"><?php echo $row["areanama"]?></a>
          <?php } } ?>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="provinsifront.php">Provinsi</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="villaweb.php">Villa</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="culinary.php">Culinary</a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Events
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="event.php">Calender Event</a>
        </div>
      </li>

  </div>
      
  <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="background-color: #b8e994; color:#2f3640">Search</button>
    </form>
</nav>
<!-- Penutup Nav Bar -->
<br><br>

<div class="container">
    <div class="row">
        <div class="col-sm-1"></div>
            <div class="col-sm-8">
                <h2 style="font-family: 'Montserrat'; font-weight:bold">Calender Of Events</h2>
                <br>
           </div> 
            <?php while ($row = mysqli_fetch_array($event))
            {?>
            <div class="media">
                <div class="media-body">
                    <figure class="figure">
                        <img src="../frontend/images/<?php echo $row["eventPOSTER"]?>" class="figure-img img-fluid rounded" alt="Foto Tidak Ada" style="width:500px;height:300px;">
                        <figcaption class="figure-caption text-left">Source : <?php echo $row["eventSUMBER"]?></figcaption>
                    </figure>
                </div>
                    <div class="col-sm-8">
                        <h1 style="font-family: 'Montserrat';">Kabupaten: <?php echo $row["kabupatennama"]?></h1>
                        <hr class="my-4">
                        <h2 style="color: violet;" style="font-family: 'Montserrat';"><?php echo $row["eventNAMA"]?></h2>
                        <p> <?php echo $row["eventKET"]?></p>
                        Event on <?php echo $row["eventMULAI"]?> ~ <?php echo $row["eventSELESAI"]?>
                        <hr class="my-4">
                    </div>
            </div>
        <br><br>
            <?php } ?>
    </div>
</div>

<br>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</body>

<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-4 col-lg-5 col-xl-4 mx-auto mb-5">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>About This Website
          </h6>
          <p>
            Website ini dibuat oleh Ronald Lie. Tujuan pembuatan website ini, untuk memenuhi tugas project UAS yang telah diberikan.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            More About Me!
          </h6>
          <p>
            <a href="https://www.instagram.com/ronaldliee/?hl=en" class="text-reset">Instagram</a>
          </p>
          <p>
            <a href="https://www.youtube.com/channel/UCtQO0LW_PcTV6xrtyccYKMw" class="text-reset">Youtube</a>
          </p>
          <p>
            <a href="http://untar.ac.id/" class="text-reset">Kampus</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fas fa-home me-3"></i> Indonesia, Palu Sulawesi Tengah</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            ronald.825200011@stu.untar.ac.id
          </p>
          <p><i class="fas fa-phone me-3"></i>+6282259066635</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</html>