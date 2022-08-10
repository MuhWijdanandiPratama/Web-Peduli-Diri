<?php
$id_catatan = $_GET['id_catatan'];

$no=0;
$data = file('catatan.txt', FILE_IGNORE_NEW_LINES);
foreach($data as $value){
    $no++;
    $saring = explode("|", $value);
    if ($saring['0']==$id_catatan) {
        $line = $no-1; //Mencari Urutan Baris
    }
}

$buka_file = file('catatan.txt'); //Untuk Membaca File catatan.txt

unset($buka_file[$line]);
file_put_contents('catatan.txt', implode("", $buka_file));

?>
<script type="text/javascript">
    alert('Data Berhasil Dihapus');
    window.location.assign('home.php');
</script>