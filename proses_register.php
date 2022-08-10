<?php

$nik = $_POST['nik'];
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$no_telepon = $_POST['no_telepon'];

//cek apakah nik sudah terdaftar atau belum
$data = file("config.txt", FILE_IGNORE_NEW_LINES);
foreach($data as $value){
    $saring = explode("|", $value);
    if($nik==$saring['0']){
        $cek = true;
    }
}

if($cek){ //jika nik sudah terdaftar ?>
    <script type="text/javascript ">
        alert('NIK Sudah Tersedia');
        window.location.assign('register.php');
    </script>
<?php } else{ //jika data tidak ditemukan
    //buat format penyimpanan ke config.txt
    $format = "\n$nik|$nama_lengkap|$email|$no_telepon";

    $format2 = "\n$nik|$nama_lengkap";

    //buka file config.txt
    $file = fopen('config.txt','a');
    fwrite($file, $format);

    //tutup file
    fclose($file);

    //buka file data.txt
    $file = fopen('data.txt','a');
    fwrite($file, $format2);

    //tutup file
    fclose($file);

    ?>
    <script type="text/javascript ">
        alert('Pendaftaran Berhasil');
        window.location.assign('login.php');
    </script>
    <?php

}