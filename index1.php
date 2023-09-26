<?php
session_start();
//koneksi
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Angkringan Ceria</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index1.php">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <?php if (isset($_SESSION["pelanggan"])) : ?>

                        <li class="nav-item"><a class="nav-link" aria-current="page" href="config/riwayat.php">Riwayat Pemesanan</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="config/logout.php">Logout</a></li>

                    <?php else :  ?>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="config/login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="config/daftar.php">Daftar</a></li>
                    <?php endif ?>

                    <li class="nav-item"><a class="nav-link" aria-current="page" href="config/checkout.php">Checkout</a></li>

                </ul>
                <!-- <form class="d-flex"> -->
                <form action="config/pencarian.php" method="get" class="navbar-form navbar-right">

                    <input type="text" class="form-control" name="keyword">
                    <button class="btn btn-outline-dark">
                        Cari
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php $ambil = $conn->query("SELECT * FROM produk "); ?>
                <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="assets/foto_produk/<?php echo $perproduk['foto_produk']; ?>">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h3 class="fw-bolder"><?php echo $perproduk['nama_produk']; ?></h3>
                                    <span class="text-muted">Rp. <?php echo number_format($perproduk['harga_produk']); ?></span> <br>
                                    <a href="config/beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary mt-3">
                                        Beli</a>
                                    <a href="config/detail.php?id=<?php echo $perproduk["id_produk"]; ?>" class="btn btn-secondary mt-3">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>