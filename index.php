<?php
require "koneksi.php";

$queryDestinasi = mysqli_query($con, "SELECT objekID, namaObjek, harga, deskripsiObjek, fotoObjek FROM objekwisata LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Wisata</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "navbar.php"; ?>

    <!-- Banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>ExploreNTB</h1>
            <h3>Teman Travelingmu</h3>

            <div class="col-md-8 offset-md-2">
                <form method="get" action="destinasi.php">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Masukan Destinasi Tujuan Anda"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn warna1 text-white">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Highlight -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Destinasi Wisata</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlight-kategori kategori-budaya d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="no-decoration" href="destinasi.php?kategori=Budaya">
                                Wisata Budaya
                            </a>
                        </h4>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="highlight-kategori kategori-alam d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="no-decoration" href="destinasi.php?kategori=Alam">
                                Wisata Alam
                            </a>
                        </h4>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="highlight-kategori kategori-kuliner d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="no-decoration" href="destinasi.php?kategori=Kuliner">
                                Wisata Kuliner
                            </a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Us -->
    <div class="container-fluid warna2 py-5">
        <div class="container text-center text-white">
            <h3>Tentang Kami</h3>
            <p class="fs-5 mt-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus fuga nam, libero iure recusandae error
                amet est nihil eius ab, esse, iste nisi adipisci vel voluptas animi voluptate. Quos omnis consequatur
                cupiditate recusandae quibusdam mollitia libero, corporis, ea amet odio harum nulla animi fugit
                voluptatem officia fuga nesciunt natus placeat fugiat iste. Odit omnis quisquam repellendus laborum ut
                necessitatibus tenetur tempore veritatis consectetur? Cumque corrupti ex, mollitia dolor asperiores
                distinctio qui saepe, ratione dolorum quasi assumenda! Consequatur exercitationem mollitia hic.
            </p>
        </div>
    </div>

    <!-- Destinasi -->
    <div class="container-fluid py-5">
        <div class="containe text-center">
            <h3>Rekomendasi Destinasi</h3>

            <div class="row mt-5">
                <?php while ($data = mysqli_fetch_array($queryDestinasi)) { ?>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="image-box">
                                <img src="image/<?php echo $data['fotoObjek']; ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $data['namaObjek']; ?></h4>
                                <p class="card-text text-truncate"><?php echo $data['deskripsiObjek']; ?></p>
                                <p class="card-text text-harga">Rp. <?php echo $data['harga']; ?>/orang</p>
                                <a href="detail-destinasi.php?nama=<?php echo $data['namaObjek']; ?>"
                                    class="btn warna2 text-white">Lihat</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <a class="btn btn-outline-primary mt-3" href="destinasi.php">Lihat Selengkapnya</a>
        </div>
    </div>

    <!-- Footer -->
     <?php require "footer.php" ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>