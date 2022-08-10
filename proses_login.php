<?php

$nik = $_POST['nik'];
$nama_lengkap = $_POST['nama_lengkap'];

$format = "$nik|$nama_lengkap";
$file = file('data.txt', FILE_IGNORE_NEW_LINES);
if (in_array($format, $file)) { //jika data ditemukan
    session_start();
    $_SESSION['nik'] = $nik;
    $_SESSION['nama_lengkap'] = $nama_lengkap;

    header("Location:home.php");
    
} else { //jika data tidak ditemukan ?>
    <script type="text/javascript">window
        alert('NIK atau Nama Lengkap Salah');
        window.location.assign('login.php');
    </script>
<?php }