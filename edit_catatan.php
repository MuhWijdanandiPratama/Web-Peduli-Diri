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
        <?php
        $data = file('catatan.txt', FILE_IGNORE_NEW_LINES);
        $id_catatan = $_GET['id_catatan'];
        foreach($data as $value){
            $saring = explode('|', $value);
            if ($saring['0']==$id_catatan) {
                ?>
        <form action="simpan_edit_catatan.php" method="post">
            <input type="hidden" name="id_catatan" value="<?= $saring['0']; ?>">
            <div class="form-group">
                <label>Pilih Tanggal</label>
                <input value="<?= $saring['3']; ?>" name="tanggal" type="date" required class="form-control" placeholder="Masukkan Tanggal">
            </div>
            <div class="form-group">
                <label>Pilih Jam</label>
                <input value="<?= $saring['4']; ?>" name="jam" type="time" required class="form-control" placeholder="Masukkan Jam">
            </div>
            <div class="form-group">
                <label>Pilih Lokasi</label>
                <input value="<?= $saring['5']; ?>" name="lokasi" type="teks" required class="form-control" placeholder="Masukkan Lokasi">
            </div>
            <div class="form-group">
                <label>Suhu Tubuh</label>
                <input value="<?= $saring['6']; ?>" name="suhu" type="teks" required class="form-control" placeholder="Masukkan Suhu Tubuh">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-warning"><i class="fa fa-trash"></i> Reset</button>
            </div>
        </form>
        <?php } } ?>
    </div>
</div>