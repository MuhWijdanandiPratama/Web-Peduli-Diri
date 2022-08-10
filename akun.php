<div class="card bg-secondary mx-xl-5 py-5" >
    <div class="card-body">
        <center><img class="" src="img/icons8-male-user-100_1.png" width="10%" alt=""></center>
    </div>
    <?php

        // $nik = $_GET['nik'];
        // $nama_lengkap = $_GET['nama_lengkap'];
        // $email = $_GET['email'];
        // $no_telepon = $GET['no_telepon'];

        // $no=0;
        // $format = "$nik|$nama_lengkap|$email|$no_telepon";
        // $data = file('config.txt', FILE_IGNORE_NEW_LINES);

        // foreach($data as $value){
        //     $no++;
        //     $saring = explode("|", $value);
        //     if ($saring['0']==$id_catatan) {
        //         $line = $no-1; //Mencari Urutan Baris
        //     }
        // }
        
        // $buka_file = file('config.txt');

                    $data = file('config.txt', FILE_IGNORE_NEW_LINES);
                    $user = $_SESSION['nik']."|".$_SESSION['nama_lengkap'];
                    foreach($data as $value){
                        $saring = explode("|", $value);
                        @$key = $saring['0']."|".$saring['1'];
                        if ($key==$user) {
                            
                    ?>

                        <h5 class='text-light text-center px-2'><?= $saring['1']; ?></h5>
                        <p class='text-light text-center px-2'> <?= $saring['0']; ?></p>
                        <p class='text-light text-center px-2'> <?= $saring['2']; ?></p>
                        <p class='text-light text-center px-2'> <?= $saring['3']; ?></p>
                        
                    <?php } } ?>
        
          
</div>