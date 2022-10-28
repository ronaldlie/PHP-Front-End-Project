<!DOCTYPE html>
<?php 
include "includes/config.php";

$query = mysqli_query($connection, "SELECT * FROM kategori");
$query1 = mysqli_query($connection, "SELECT * FROM destinasi");
$query2 = mysqli_query($connection, "SELECT * FROM area");

$jumlahtampilan = 3;
  $halaman = (isset($_GET['page']))? $_GET['page'] : 1;
  $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

$destinasi = mysqli_query($connection, "SELECT * 
    FROM kategori, destinasi, fotodestinasi
    WHERE kategori.kategoriID = destinasi.kategoriID
    AND destinasi.destinasiID = fotodestinasi.destinasiID limit $mulaitampilan, $jumlahtampilan");

$sql = mysqli_query($connection, "SELECT * FROM villa");
$jumlahvilla = mysqli_num_rows($sql);

$sql1 = mysqli_query($connection, "SELECT * FROM destinasi");
$jumlahdestinasi = mysqli_num_rows($sql1);

$sql2 = mysqli_query($connection, "SELECT * FROM area");
$jumlaharea = mysqli_num_rows($sql2);

$sql3 = mysqli_query($connection, "SELECT * FROM kabupaten");
$jumlahkabupaten = mysqli_num_rows($sql3);

$sql4 = mysqli_query($connection, "SELECT * FROM kecamatan");
$jumlahkecamatan = mysqli_num_rows($sql4);

$sql5 = mysqli_query($connection, "SELECT * FROM kategori");
$jumlahkategori = mysqli_num_rows($sql5);

$sql6 = mysqli_query($connection, "SELECT * FROM tiket");
$jumlahtiket = mysqli_num_rows($sql6);


$foto = mysqli_query($connection, "SELECT * FROM fotodestinasi");
$villa1 = mysqli_query($connection, "SELECT * FROM villa WHERE villaID = 'VL01'");
$villa2 = mysqli_query($connection, "SELECT * FROM villa WHERE villaID = 'VL02'");
$villa3 = mysqli_query($connection, "SELECT * FROM villa WHERE villaID = 'VL03'");
$villa4 = mysqli_query($connection, "SELECT * FROM villa WHERE villaID = 'VL04'");
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
    <title>Wisata</title>
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
        <a class="nav-link" href="#scrollspyHeading2">Villa</a>
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

<!-- Slider Image -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/airterjun.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h1>Air Terjun</h1>
        <p>air mengalir sangat kencang</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/gunung.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h1>Gunung Salju</h1>
        <p>gunung yang di selimuti salju</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/hutan.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h1>Hutan</h1>
        <p>hutan siang hari dengan banyak pohon</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- Penutup Slider Image -->

<br><br>
<div class="container">
  <d  iv data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
    <div class="row" style="justify-content: center;">
      <h1 id="scrollspyHeading1"><span class="badge badge-secondary">WONDERFUL</span>INDONESIA</h1>
    </div>

  <br><br>

    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <p style="text-align: center;">Wonderful Indonesia merupakan wujud dan komitmen untuk mempromosikan berbagai destinasi bagi untuk wisatawan domestik dan internasional. Wonderful Indonesia dinobatkan sebagai "Best Creative Destination" di ajang Creative Tourism Awards 2020, mengalahkan 76 nominasi destinasi lainnya dari seluruh dunia. Creative Tourism Awards yang diselenggarakan Creative Tourism Network, bertujuan memberi penghargaan pada program dan destinasi di seluruh dunia yang menunjukkan komitmen mewujudkan pariwisata berbudi luhur. Wonderful Indonesia merupakan wujud dan komitmen untuk mempromosikan berbagai destinasi bagi untuk wisatawan domestik dan internasional. </p>
      </div>
    </div>
  </div>
</div>  

<br><br>

<div class="container">
     <div class="row">
      <div class="col-sm-4">
      <div class="media">
  <img class="mr-3" src="./bootstrap-icons-1.6.1/info-square.svg" alt="Generic placeholder image" style="width: 80px;">
  <div class="media-body">
    <h5 class="mt-0">Indonesia Care</h5>
    Indonesia CARE, sebuah simbol dukungan berupa panduan protokol kesehatan pariwisata yang mengedepankan usaha terbaik dalam mewujudkan kelestarian lingkungan destinasi pariwisata Indonesia.
  </div>
</div>
     </div>
     <div class="col-sm-4">
     <div class="media">
  <img class="mr-3" src="./bootstrap-icons-1.6.1/calendar-check.svg" alt="Generic placeholder image" style="width: 80px;">
  <div class="media-body">
    <h5 class="mt-0">Media heading</h5>
    Organisasi Pariwisata Dunia merayakan Hari Pariwisata Sedunia setiap tanggal 27 September. Hari ini dipilih karena pada hari yang sama tahun 1970, Anggaran Dasar UNWTO dirancang.
  </div>
</div>
     </div>
     <div class="col-sm-4">
     <div class="media">
  <img class="mr-3" src="./bootstrap-icons-1.6.1/book-half.svg" alt="Generic placeholder image" style="width: 80px;">
  <div class="media-body">
    <h5 class="mt-0">Informasi Umum</h5>
    Temukan semua yang perlu Kalian ketahui tentang cara menuju ke sini, peraturan apa yang harus diperhatikan, dan banyak hal penting lainnya dalam mengatur rencana perjalanan kalian ke wisata-wisata Indonesia.
  </div>
</div>
     </div>
   </div>
</div>

<br><br><br>

<div class="container">
  <div class="row">
    <div class="col-sm-1"></div>
      <div class="col-sm-6">
        <p>
        Indonesia memiliki pemandangan alam yang luar biasa yang tidak dimiliki oleh negara lain. Pegunungan-pegunungan yang terhampar dari Jawa sampai Sumatra memberikan pemandangan yang indah dan memiliki cerita sendiri.
        </p>

        <p>
        Gunung Merapi dengan kemisteriusan dan pertanian yang subur di sekitarnya. Gunung Lawu yang penuh dengan cerita dari zaman kerajaan Majapahit dengan burung jalaknya yang misterius, yang akan menggiringmu ketika tersesat, juga terdapat warung tertinggi se-Indonesia yang ada di Puncak Gunung Lawu. Gunung Bromo yang indah dengan hamparan pasirnya dan masih banyak gunung-gunung yang lain.
        </p>

      </div>
      <div class="col-sm-5">
      <img src="images/gunungasap.jpg" class="rounded float-left img-fluid">
      </div>
  </div>
</div>

<br><br><br>

<div class="container">
  <h2 style="text-align: center;">Galeri Image</h2>
  <p style="text-align: center;">Photo Destination</p>
<div class="row">

<?php while ($row = mysqli_fetch_array($foto))
{?>
<div class="col-sm-4">
<figure class="figure">
  <img src="../backend/images/<?php echo $row["fotofile"]?>" class="figure-img img-fluid rounded" alt="Foto Tidak Ada">
  <figcaption class="figure-caption text-center"><?php echo $row["fotonama"]?></figcaption>
</figure>
</div>
<?php } ?>

</div>
</div>

<br><br><br>

<?php
  $query6=mysqli_query($connection,"SELECT * FROM destinasi");
  $jumlahrecord = mysqli_num_rows($query6);
  $jumlahpage = ceil($jumlahrecord/$jumlahtampilan);
?>

<div class="container">
<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
     <div class="row">
      <div class="col-sm-8" >

<?php if(mysqli_num_rows($destinasi) > 0) {
  while ($row2 = mysqli_fetch_array($destinasi))
  { ?>      
      <div class="media col-sm-9">
  <div class="media-body">
    <h4 class="mt-0 mb-1" id="scrollspyHeading4"><?php echo $row2["destinasinama"]?></h4>
    <h5><?php echo $row2["destinasialamat"]?></h5>
    <p><?php echo $row2["kategoriketerangan"]?></p>
  </div>
  <img class="ml-3" style="width:200px; height:100%;" src="../backend/images/<?php echo $row2["fotofile"]?>" alt="Gambar Tidak Ada">
</div>
<br>
<?php } } ?>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="?page=<?php $nomorhal=1; echo $nomorhal?> #scrollspyHeading4">Previous</a></li>
    <?php for($nomorhal=1;$nomorhal<=$jumlahpage;$nomorhal++)
    {?>
  
    <li class="page-item">
      <?php
      if($nomorhal!=$halaman)
      {?>

      <a class="page-link" href="?page=<?php echo $nomorhal?> #scrollspyHeading4"><?php echo $nomorhal?></a>
    </li>
    <?php }
    else {?>
       <a class="page-link" href="?page=<?php echo $nomorhal?> #scrollspyHeading4"><?php echo $nomorhal?></a>
    
    <?php }?>
    <?php }?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $nomorhal-1?> #scrollspyHeading4">Next</a></li>
  </ul>
</nav>

      </div>
                
      <div class="col-sm-4">
        
      <div class="card" style="width: 25rem; right:15%;">
  <iframe class="card-img-top" width="560" height="315" src="https://www.youtube.com/embed/3grIIRIzpM0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <div class="card-body">
    <h5 class="card-title">Raja Ampat</h5>
    <p class="card-text">Sebuah Kabupaten dan merupakan bagian dari Provinsi Papua Barat. Suguhan alam yang ditawarkan begitu mengagumkan, hingga bisa membuat wisatawan enggan pulang.</p>
    <a href="https://www.youtube.com/watch?v=3grIIRIzpM0" class="btn btn-primary">Go Youtube</a>
  </div>
</div>
        </div>
     </div>
   </div>
   </div>
  
   <br><br>
<div class="container">
    <div class="row">
    <div class="col-sm-6">
    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
      <div class="jumbotron jumbotron-fluid" style="background-color: #38ada9; color:white;">
        <div class="container">
          <h1 class="display-4" id="scrollspyHeading3">Keep Us Improve!</h1>
        </div>
      </div>
      <form method="POST">
      <div class="form-group row">
        <label for="kodekategori" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="kodekategori" name="inputnama" placeholder="nama lengkap" required>
          </div>
      </div>

      <div class="form-group row">
        <label for="namakategori" class="col-sm-2 col-form-label">Masukan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="inputmasukan" id="namakategori" placeholder="saran/masukan">
          </div>
      </div>

      <div class="form-group row">
        <label for="saransaran" class="col-sm-2 col-form-label">Rate</label>
          <div class="col-sm-10">
            <select name="inputrating" class="form-control" id="saran">
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Normal">Normal</option>
              <option value="Buruk">Buruk</option>
              <option value="Sangat Buruk">Sangat Buruk</option>
            </select>
          </div>
      </div>
    </div>

            <div class="form-group row">
            <div class="col-sm-2"></div>
              <div class="col-sm-10">
                <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Submit
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                         <img src="./bootstrap-icons-1.6.1/exclamation-triangle-fill.svg" class="modal-title" id="exampleModalLongTitle">
                         
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        Apakah kamu yakin sudah mengisi dengan benar ?
                        </div>
                        <div class="modal-footer">
                        <input type="reset" class="btn btn-secondary" data-dismiss="modal" value="Batal" name="Batal">
                          <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan" href="#scrollspyHeading3">
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </form>
    </div>       
    
      <div class="col-sm-1"></div>
      <div class="col-sm-5">
          <ul class="list-group">
          <li class="list-group-item" style="background-color: #38ada9; color:white;" id="scrollspyHeading2">Daftar Villa <span class="badge badge-dark badge-pill"><?php echo $jumlahvilla?></span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php while ($row = mysqli_fetch_array($villa1))
            {?>
              <img src="../backend/images/<?php echo $row["villafoto"]?>" style="width: 100px;">
              <?php echo $row["villaname"]?>
              <br>
              <small class="text-muted">Last updated 1 Hours ago</small>
              <?php } ?>
              <span class="badge badge-primary badge-pill">New</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php while ($row = mysqli_fetch_array($villa2))
            {?>
            <img src="../backend/images/<?php echo $row["villafoto"]?>" style="width: 100px;">
            <?php echo $row["villaname"]?>
              <br>
              <small class="text-muted">Last updated  Hours ago</small>
              <span class="badge badge-primary badge-pill">New</span>
              <?php } ?>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php while ($row = mysqli_fetch_array($villa3))
            {?>
            <img src="../backend/images/<?php echo $row["villafoto"]?>" style="width: 100px;">
            <?php echo $row["villaname"]?>
              <br>
              <small class="text-muted">Last updated 3 days ago</small>
              <span class="badge badge-primary badge-pill">New</span>
              <?php } ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <a href="villaweb.php" class="btn btn-primary">Explore More!</a>
            </li>
          </ul>
      </div>
    </div>
</div>
<br><br>
        <div class="container">
          <div class="row">
            <div class="col-sm-7">
              <div class="card border-info mb-3" style="max-width: 35rem;">
                <div class="card-header"><iframe width="518" height="315" src="https://www.youtube.com/embed/RaTWq98hzF0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                <div class="card-body text-info">
                  <h5 class="card-title">Pulau Komodo</h5>
                  <p class="card-text">Pulau Komodo adalah sebuah pulau yang terletak di Kepulauan Nusa Tenggara, berada di sebelah timur Pulau Sumbawa, yang dipisahkan oleh Selat Sape.</p>
                </div>
              </div>
            </div>

            <div class="col-sm-5">
            <div id="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse"  data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" data-toggle="tooltip" data-placement="right" title="click to expand">
                      Jumlah Destinasi Wisata <span class="badge badge-primary badge-pill" style="background-color: #38ada9;"><?php echo $jumlahdestinasi?></span>
                    </button>
                  </h5>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                  <?php $nomor = 1;?>  
                  Nama Destinasi Wisata :
                  <br>
                  <?php while ($row = mysqli_fetch_array($sql1))
                  {?>
                    <?php echo $nomor?>.
                    <?php echo $row["destinasinama"]?>
                    <br>
                    <?php $nomor = $nomor + 1; ?>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"  data-toggle="tooltip" data-placement="right" title="click to expand">
                      Jumlah Area Wisata <span class="badge badge-primary badge-pill" style="background-color: #38ada9;"><?php echo $jumlaharea?></span>
                    </button>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    <?php $nomor = 1;?>  
                    Nama Area Wisata :
                    <br>
                    <?php while ($row = mysqli_fetch_array($sql2))
                    {?>
                      <?php echo $nomor?>.
                      <?php echo $row["areanama"]?>
                      <br>
                      <?php $nomor = $nomor + 1; ?>
                      <?php } ?>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" data-toggle="tooltip" data-placement="right" title="click to expand">
                      Jumlah Kabupaten Wisata <span class="badge badge-primary badge-pill" style="background-color: #38ada9;"><?php echo $jumlahkabupaten?></span>
                    </button>
                  </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    <?php $nomor = 1;?>  
                      Nama Kabupaten Wisata :
                      <br>
                      <?php while ($row = mysqli_fetch_array($sql3))
                      {?>
                        <?php echo $nomor?>.
                        <?php echo $row["kabupatennama"]?>
                        <br>
                        <?php $nomor = $nomor + 1; ?>
                        <?php } ?>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingFour">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" data-toggle="tooltip" data-placement="right" title="click to expand">
                      Jumlah Kecamatan Wisata <span class="badge badge-primary badge-pill" style="background-color: #38ada9;"><?php echo $jumlahkecamatan?></span>
                    </button>
                  </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                  <div class="card-body">
                    <?php $nomor = 1;?>  
                      Nama Kecamtan Wisata :
                      <br>
                      <?php while ($row = mysqli_fetch_array($sql4))
                      {?>
                        <?php echo $nomor?>.
                        <?php echo $row["kecamatannama"]?>
                        <br>
                        <?php $nomor = $nomor + 1; ?>
                        <?php } ?>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingFive">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" data-toggle="tooltip" data-placement="right" title="click to expand">
                      Jumlah Kategori Wisata <span class="badge badge-primary badge-pill" style="background-color: #38ada9;"><?php echo $jumlahkategori?></span>
                    </button>
                  </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                  <div class="card-body">
                    <?php $nomor = 1;?>  
                      Nama Kategori Wisata :
                      <br>
                      <?php while ($row = mysqli_fetch_array($sql5))
                      {?>
                        <?php echo $nomor?>.
                        <?php echo $row["kategorinama"]?>
                        <br>
                        <?php $nomor = $nomor + 1; ?>
                        <?php } ?>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingSix">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" data-toggle="tooltip" data-placement="right" title="click to expand">
                      Jumlah Tiket Wisata <span class="badge badge-primary badge-pill" style="background-color: #38ada9;"><?php echo $jumlahtiket?></span>
                    </button>
                  </h5>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                  <div class="card-body">
                    <?php $nomor = 1;?>  
                      Jenis dan Kelas Tiket Wisata :
                      <br>
                      <?php while ($row = mysqli_fetch_array($sql6))
                      {?>
                        <?php echo $nomor?>.
                        <?php echo $row["tiketwisata"]?>
                        <?php echo $row["tiketkelas"]?>
                        <br>
                        <?php $nomor = $nomor + 1; ?>
                        <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            </div>
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