<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_tokoemha');

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($post)
{
    global $conn;

    $tgl_upload = time();
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    mysqli_query($conn, "INSERT INTO galeri VALUES('', '$gambar', '$tgl_upload')");

    return mysqli_affected_rows($conn);
}

function upload()
{
    $nameFile = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $error = $_FILES['gambar']['error'];


    if ($error === 4) {
        echo "<script>
            alert('tidak ada gambar yang diupload!');
        </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $nameFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('pilih ekstension jpg, jpeg, png');
        </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmp_name, 'images/uploads/' . $namaFileBaru);

    return $namaFileBaru;
}

function edit($post)
{
    global $conn;

    $id = $post["id"];
    $gambarLama = $post["gambarLama"];
    $tgl_upload = $post["tgl_upload"];

    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE galeri SET 
                gambar = '$gambar',
                tgl_upload = '$tgl_upload'
              WHERE
                id = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id, $hlmn)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM $hlmn WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// function daftar($post)
// {
//     global $conn;

//     $username = stripslashes(strtolower($post["username"]));
//     $password = mysqli_real_escape_string($conn, $post["password"]);
//     $password2 = mysqli_real_escape_string($conn, $post["password2"]);

//     $result = mysqli_query($conn, "SELECT username FROM admins WHERE username = '$username'");
//     if (mysqli_fetch_assoc($result)) {
//         echo "<script>
//             alert('username sudah terdaftar!');
//         </script>";
//         return false;
//     }

//     if ($password !== $password2) {
//         echo "<script>
//             alert('password tidak sesuai!');
//         </script>";
//         return false;
//     }

//     $password = password_hash($password, PASSWORD_DEFAULT);

//     mysqli_query($conn, "INSERT INTO admins VALUES('', '$username', '$password')");

//     return mysqli_affected_rows($conn);
// }
