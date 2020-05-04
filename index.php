<?php
require 'functions.php';

$gambar = query("SELECT * FROM galeri");

if (isset($_POST["submit"])) {
    $pesan = htmlspecialchars($_POST["pesan"]);
    $tanggal = time();

    $result = mysqli_query($conn, "INSERT INTO kritiksaran VALUES('', '$pesan', '$tanggal')");
    if ($result) {
        $message = true;
    }
}

?>
<!doctype html>
<html lang="en" id="home">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/boostrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontawesome/all.min.css">
    <link rel="stylesheet" href="css/lightbox/lightbox.min.css">

    <title>TOKO EMHA</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand page-scroll" href="#home">TOKO EMHA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <li><a class="nav-item nav-link page-scroll active" href="#home">Home</a></li>
                    <li><a class="nav-item nav-link page-scroll" href="#tentang">Tentang Kami</a></li>
                    <li><a class="nav-item nav-link page-scroll" href="#galeri">Galeri</a></li>
                    <li><a class="nav-item nav-link page-scroll" href="#hubungi">Hubungi Kami</a></li>
                    <li><a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i></a></li>
                </div>
            </div>
        </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid text-center">

    </div>

    <!-- Tentang Kami -->
    <section class="tentang" id="tentang">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center">Tentang Kami</h3>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <p><strong>TOKO EMHA</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
                        maiores
                        ipsum tempora non facilis unde debitis eaque dolore nam, ipsam similique dignissimos ut
                        molestiae provident, sapiente alias! Ipsa, sequi beatae?</p>
                </div>
                <div class="col-lg-6">
                    <?php if (isset($message)) : ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            kritik dan saran berhasil dikirim.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <p class="mb-0"><strong>KRITIK DAN SARAN</strong></p>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="kritiksaran" class="text-danger">*silahkan tulis kritik dan sarannya</label>
                            <textarea class="form-control" name="pesan" id="kritiksaran" rows="3"></textarea>
                            <button type="submit" name="submit" class="btn btn-success mt-2">KIRIM</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri -->
    <section class="galeri" id="galeri">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3>Galeri</h3>
                    <hr>
                </div>
            </div>

            <div class="row justify-content-center">
                <?php foreach ($gambar as $gmb) : ?>
                    <div class="col-sm-4 mb-3">
                        <a href="images/uploads/<?= $gmb["gambar"] ?>" data-lightbox="mygallery" data-title="Diposting pada <?= date('d F Y', $gmb["tgl_upload"]) ?>">
                            <img src="images/uploads/<?= $gmb["gambar"] ?>" class="img-thumbnail shadow" alt="img">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Hubungi Kami -->
    <section class="hubungi" id="hubungi">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3>Hubungi Kami</h3>
                    <hr>
                </div>
            </div>
            <div class="embed-responsive embed-responsive-21by9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.5592699115127!2d109.3607142140363!3d-7.40317719465846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6559c5af0a4a91%3A0x7ecfef7b15740f6e!2sToko%20Emha!5e0!3m2!1sid!2sid!4v1586659490421!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>

            <div class="row mt-3">
                <div class="col-lg-4">
                    <h4><strong>Kontak</strong></h4>
                    <p class="mb-0"><i class="fas fa-phone-alt mr-2"></i>0813-9306-6185</p>
                    <p><i class="fas fa-envelope mr-2"></i>tokoemha@gmail.com</p>
                </div>
                <div class="col-lg-4">
                    <h4><strong>Alamat</strong></h4>
                    <p><i class="fas fa-map-marker-alt mr-2"></i>Jl. Soekarno Hatta, Karangmanyar, Kec. Kalimanah,
                        Kabupaten
                        Purbalingga, Jawa Tengah Kode Pos 53322</p>
                </div>
                <div class="col-lg-4">
                    <h4><strong>Jam Buka</strong></h4>
                    <p><i class="fas fa-clock mr-2"></i>Buka setiap hari pukul 06.00 - 22.00</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <p>&copy; copyright <?= date('Y') ?> | built with <i class="fas fa-heart"></i> by <a href="https://www.instagram.com/syafiqemha117/" target="_blank">Syafiq Fajrian
                            Emha</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
    </script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="js/fontawesome/all.min.js"></script>
    <script src="js/boostrap/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/lightbox/lightbox.min.js"></script>

</body>

</html>