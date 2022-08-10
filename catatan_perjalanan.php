<div class="card">
    <div class="card-header">
        <a href="home.php" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                        <th>Suhu Tubuh</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                        <!-- <th>Generate</th> -->
                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                        <th>Suhu Tubuh</th>
                    </tr>
                </tfoot> -->
                <tbody>
                    <?php
                    $no=1;
                    $data = file('catatan.txt', FILE_IGNORE_NEW_LINES);
                    $user = $_SESSION['nik']."|".$_SESSION['nama_lengkap'];
                    foreach($data as $value){
                        $saring = explode("|", $value);
                        @$key = $saring['1']."|".$saring['2'];
                        if ($key==$user) {
                            
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $saring['3']; ?></td>
                        <td><?= $saring['4']; ?></td>
                        <td><?= $saring['5']; ?></td>
                        <td><?= $saring['6']; ?></td>
                        <td>
                            <a href="?url=edit_catatan&id_catatan=<?= $saring['0'] ?>" class="btn btn-warning">
                                <i class="fa fa-pen"></i> Edit
                            </a>
                        </td>
                        <td>
                            <a onclick="return confirm('Delete')" href="hapus_catatan.php?id_catatan=<?= $saring['0'] ?>" class="btn btn-danger">
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                        </td>
                        <!-- <td>
                            <a href="generate.php" class="btn btn-success">
                                <i class="fa fa-qrcode"></i> QR Code
                            </a>
                        </td> -->
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>