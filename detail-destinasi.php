<?php
require "koneksi.php";

$nama = htmlspecialchars($_GET['nama']);

$queryDestinasi = mysqli_query($con, "SELECT * FROM objekWisata WHERE namaObjek = '$nama'");
$destinasi = mysqli_fetch_array($queryDestinasi);

$queryRelevan = mysqli_query($con, "SELECT * FROM objekWisata WHERE kategoriID = '$destinasi[kategoriID]' AND objekID != '$destinasi[objekID]' LIMIT 4");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore NTB | Destinasi</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "navbar.php" ?>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-3">
                    <img src="image/<?php echo $destinasi['fotoObjek']; ?>" class="w-100" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1><?php echo $destinasi['namaObjek']; ?></h1>
                    <h4><?php echo $destinasi['lokasiObjek']; ?></h4>
                    <h4>Rp. <?php echo $destinasi['harga']; ?>/orang</h4>
                    <h3 class="py-1">Deskripsi</h2>
                        <p class="fs-5"><?php echo $destinasi['deskripsiObjek']; ?></p>
                        <h3 class="py-1">Fasilitas</h3>
                        <p class="fs-5"><?php echo $destinasi['fasilitas']; ?></p>
                        <p class="fs-5">Ketersediaan = <strong><?php echo $destinasi['ketersediaan']; ?></strong></p>
                        <a class="btn btn-outline-success mt-3 d-flex justify-content-center form-control"
                            href="reservasi.php" >Reservasi</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Suggestions -->
    <div class="container-fluid py-5 warna2">
        <div class="container">
            <h2 class="text-center text-white mb-5">Relevan</h2>

            <div class="row d-flex justify-content-center">
                <?php while ($relevan = mysqli_fetch_array($queryRelevan)) { ?>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <a href="detail-destinasi.php?nama=<?php echo $relevan['namaObjek']; ?>">
                            <img src="image/<?php echo $relevan['fotoObjek']; ?>"
                                class="img-fluid img-thumbnail img-relevan" alt="">
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php require "footer.php" ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>