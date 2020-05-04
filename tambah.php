<?php
session_start();

if (!$_SESSION["login"]) {
    header("Location: login.php");
}

require 'functions.php';

if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('gambar berhasil ditambahkan!');
                document.location.href = 'admin.php';
            </script>";
    } else {
        echo "<script>
                alert('gambar gagal ditambahkan!');
                document.location.href = 'admin.php';
            </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/boostrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome/all.min.css">
    <link rel="stylesheet" href="css/login.css">

    <title>Tambah Gambar</title>
</head>

<body>

    <div class="formLogin">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h1 class="text-center mb-3">Tambah Gambar</h1>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" class="form-control" id="gambar">
                        </div>

                        <button type="submit" name="tambah" class="btn btn-primary btn-block">TAMBAH</button>
                        <a href="admin.php" class="btn btn-danger btn-block">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="js/boostrap/bootstrap.min.js"></script>
    <script src="js/fontawesome/all.min.js"></script>
</body>

</html>