
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
  include 'koneksi.php';
  include 'tema/atas.php';
?>


	 <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/css/carousel.css" rel="stylesheet">
</head>
<body>
    
<main class="container fade-in">
<!-- carausel/ slider -->
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true"><rect width="100%" height="100%" fill="#777"/></svg>
		<img src="images/mete11.jpg">	
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Example headline.</h1>
            <p>Some representative placeholder content for the first slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true"><rect width="100%" height="100%" fill="#777"/></svg>
		<img src="images/mete11.jpg">
        <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Some representative placeholder content for the second slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true"><rect width="100%" height="100%" fill="#777"/></svg>
		<img src="images/mete11.jpg">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>One more for good measure.</h1>
            <p>Some representative placeholder content for the third slide of this carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



  <div class="p-2 card">

    <h1>kategori</h1>
	<div class="row">
    <?php
                $kategori = mysqli_query($kon, "SELECT * FROM kategori ORDER BY idkategori DESC");
                if (mysqli_num_rows($kategori) > 0) {
                    while ($k = mysqli_fetch_array($kategori)) {
                ?>
    <div class="col-sm-2">
      <a class="card text-center" href="produk.php?kat=<?php echo $k['idkategori'] ?>">
      <div class="card header text-center">
        <div class="card bg-success text-white"><?php echo $k['namakategori'];?></div>
        <div data-feather="box" style="font-size: 55px;"><i class="fas <?php echo $k['ikon'];?>"></i></div>
       </a>
      </div>
    </div>
 <?php }
                } else { ?>
                    <p>Kategori tidak ada</p>
                <?php } ?>
  </div>
	</div>

<div class="row p-2">
 <div class="p-2 card bg-light">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-1 mb-2">
    <h1>Produk Terbaru</h1>
  </div>
	<div class="row">
    <?php
                $produk = mysqli_query($kon, "SELECT * FROM produk WHERE statusproduk = 1 ORDER BY idproduk DESC LIMIT 8");
                if (mysqli_num_rows($produk) > 0) {
                    while ($p = mysqli_fetch_array($produk)) {
                ?>
    <div class="col-sm-4">
      <div class="card header text-center">
       <a href="detailproduk.php?kd=<?php echo $p['idproduk'] ?>&&kt=<?php echo $p['idkategori'] ?>" class="card-body bg-light"><img src="admin/images/<?php echo $p['gambarproduk']?>" class="img-rounded" width="304" height="236" alt="Image">
        <div class="card bg-success text-white"><?php echo $p['namaproduk'];?></div>
        <div class="card-footer">Rp. <?php echo number_format($p['hargaproduk']); ?>,-</div>
        </a>
      </div>
    </div>
 <?php }
                } else { ?>
                    <p>Produk tidak ada</p>
                <?php } ?>
  </div>
  </div>
</main>


    <script src="assets/js/bootstrap.bundle.min.js"></script>

      
  </body>
  <?php 
    include 'tema/bawah.php';
  ?>
  </html>