<?php
session_start();

if (!$_SESSION["login"]) {
    header("Location: login.php");
}

require 'functions.php';

$kritiksaran = query("SELECT * FROM kritiksaran");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Admin</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="css/fontawesome/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/admin/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Galeri</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="kritikDanSaran.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Kritik & Saran</span></a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a href="logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-white-400"></i>LOGOUT</a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Kritik & Saran</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pesan</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;
                                        foreach ($kritiksaran as $ks) : ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td>
                                                        <p><?= $ks["pesan"]; ?></p>
                                                    </td>
                                                    <td width="150"><?= date('d F Y', $ks['tanggal']); ?></td>
                                                    <td width="150">
                                                        <a href="hapus.php?id=<?= $ks['id']; ?>&hlmn=kritiksaran&name=Kritik Dan Saran&loc=kritikDanSaran.php" onclick="return confirm('yakin?');" class="badge badge-pill badge-danger">delete</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Bootstrap core JavaScript-->
                <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
                </script>
                <script src="js/boostrap/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="js/jquery.easing.1.3.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/admin/sb-admin-2.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="js/admin/demo/chart-area-demo.js"></script>
                <script src="js/admin/demo/chart-pie-demo.js"></script>
                <script src="js/fontawesome/all.min.js"></script>

</body>

</html>