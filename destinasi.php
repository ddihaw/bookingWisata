<?php
require "koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

if (isset($_GET['keyword'])) {
    $queryDestinasi = mysqli_query($con, "SELECT * FROM objekWisata WHERE namaObjek LIKE '%$_GET[keyword]%'");
} else if (isset($_GET['kategori'])) {
    $queryGetKategoriID = mysqli_query($con, "SELECT kategoriID FROM kategori WHERE namaKategori = '$_GET[kategori]'");
    $kategoriID = mysqli_fetch_array($queryGetKategoriID);

    $queryDestinasi = mysqli_query($con, "SELECT * FROM objekWisata WHERE kategoriID = '$kategoriID[kategoriID]'");
} else {
    $queryDestinasi = mysqli_query($con, "SELECT * FROM objekWisata");
}

$countData = mysqli_num_rows($queryDestinasi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "navbar.php" ?>

    <!-- Banner -->
    <div class="container-fluid banner2 d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">Destinasi</h1>
        </div>
    </div>

    <!-- Kategori Layout -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 mb-5">
                <h3>Kategori</h3>
                <ul class="list-group">
                    <?php while ($kategori = mysqli_fetch_array($queryKategori)) { ?>
                        <a class="no-decoration" href="destinasi.php?kategori=<?php echo $kategori['namaKategori']; ?>">
                            <li class="list-group-item"><?php echo $kategori['namaKategori']; ?></li>
                        </a>
                    <?php } ?>
                </ul>
            </div>

            <div class="col-lg-9">
                <h3 class="text-center mb-3"> Destinasi Wisata</h3>
                <div class="row">
                    <?php
                    if ($countData < 1) {
                        ?>
                        <h5 class="text-center my-4">Destinasi Tidak Ditemukan</h5>
                        <?php
                    }
                    ?>
                    <?php while ($destinasi = mysqli_fetch_array($queryDestinasi)) { ?>
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="image-box">
                                    <img src="image/<?php echo $destinasi['fotoObjek']; ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $destinasi['namaObjek']; ?></h4>
                                    <p class="card-text text-truncate"><?php echo $destinasi['deskripsiObjek']; ?></p>
                                    <p class="card-text text-harga">Rp. <?php echo $destinasi['harga']; ?>/orang</p>
                                    <a href="detail-destinasi.php?nama=<?php echo $destinasi['namaObjek']; ?>"
                                        class="btn warna2 text-white">Lihat</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <?php require "footer.php" ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>