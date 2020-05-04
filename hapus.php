<?php
session_start();

if (!$_SESSION["login"]) {
    header("Location: login.php");
}

require 'functions.php';

$id = $_GET['id'];
$hlmn = $_GET['hlmn'];
$name = $_GET['name'];
$loc = $_GET['loc'];

if (hapus($id, $hlmn) > 0) {
    echo "<script>
            alert('$name berhasil dihapus!');
            document.location.href = '$loc';
        </script>";
} else {
    echo "<script>
            alert('$name gagal dihapus!');
            document.location.href = '$loc';
        </script>";
}
