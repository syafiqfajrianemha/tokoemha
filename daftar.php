<!-- <?php
        require 'functions.php';

        if (isset($_POST["submit"])) {
            if (daftar($_POST) > 0) {
                echo "<script>
            alert('berhasil daftar!');
            document.location.href = 'daftar.php';
        </script>";
            } else {
                echo "<script>
            alert('gagal daftar!');
            document.location.href = 'daftar.php';
        </script>";
            }
        }

        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Konfirmasi Password</label>
                <input type="password" name="password2" id="password2">
            </li>
            <button type="submit" name="submit">Daftar</button>
        </ul>
    </form>
</body>

</html> -->