<?php
session_start();
  use chillerlan\QRCode\QRCode;
  use chillerlan\QRCode\QROptions;
  
  require_once('vendor/autoload.php');
  
  $options = new QROptions(
    [
      'eccLevel' => QRCode::ECC_L,
      'outputType' => QRCode::OUTPUT_MARKUP_SVG,
      'version' => 5,
    ]
  );

// session_start();
// $nik = $_SESSION['nik'];
// $nama_lengkap = $_SESSION['nama_lengkap'];
// $tanggal = $_GET['tanggal'];
// $jam = $_GET['jam'];
// $lokasi = $_GET ['lokasi'];
// $suhu = $_GE['suhu'];
// $id_catatan = $_GET ['id_catatan'];

// $format = "\n$id_catatan|$nik|$nama_lengkap|$tanggal|$jam|$lokasi|$suhu";
// $qrcode = (new QRCode($options))->render($format);
$no=0;
$data = file('catatan.txt', FILE_IGNORE_NEW_LINES);
// $qrcode = (new QRCode($options))->render($data);
foreach($data as $value){
    $no++;
    $saring = explode("|", $value);

    if ($saring['0']) {

        $line = $no-1; //Mencari Urutan Baris
    }
}

// $data[$line] = $format;
$data = implode("\n", $data);
$qrcode = (new QRCode($options))->render($data);
file_put_contents('catatan.txt', $data);


?> 


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Generate QR Code</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user-md"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Peduli Diri</div>
            </a>
            <div class="d-flex justify-content-center mx-auto">
                <img src="img/icons8-male-user-100_1.png" width="100%" alt="">
            </div>
            <?php
                echo "<h5 class='text-light text-center px-2'>".$_SESSION['nama_lengkap']."</h5>";
                echo "<p class='text-light text-center px-2'>".$_SESSION['nik']."</p>";
            ?>
              
            
            <!-- Divider -->
            <hr class="sidebar-divider my-2">

            <!-- Nav Item - Logout -->
            <li class="nav-item" style="margin-top: 480px;">
                <a class="nav-link text-center" href="logout.php">
                    <i class="fas fa-fw fa-power-off"></i>
                    <span>Log Out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <a class="nav-link text-dark" href="home.php?url=tulis_catatan">
                        <i class="fas fa-fw fa-pen"></i>
                        <span>Tulis Catatan Perjalanan</span>
                    </a>

                    <a class="nav-link text-dark" href="home.php?url=catatan_perjalanan">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Catatan Perjalanan</span>
                    </a>

                    <a class="nav-link text-dark" href="home.php?url=akun">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Akun</span>
                    </a>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="h4 mb-4 text-gray-800">
                     
                       <img src='<?= $qrcode ?>' alt='QR Code' width='400' height='400'>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2022 Peduli Diri</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>