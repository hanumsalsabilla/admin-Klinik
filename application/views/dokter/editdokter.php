<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

</div>
<!-- /.container-fluid -->
<form class="dokter" method="post" action="<?= base_url('JadwalDokter/editDokter2') ?>">
    <div class="form-group">
        <input type="hidden" class="form-control" id="id_jadwal" name="id_jadwal" value="<?php echo $dokter['id_jadwal'];  ?>">

        <select id="inputState" class="form-control" name="id_dokter">
            <?php
            foreach ($dokteronly as $j) {
                if ($j['id_dokter'] == $dokter['id_dokter']) {
                    echo "<option value='" . $j['id_dokter'] . "' selected>" . $j['nama_dokter'] . "</option>";
                } else {
                    echo "<option value='" . $j['id_dokter'] . "'>" . $j['nama_dokter'] . "</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="jadwal">Jadwal</label>
        <input type="text" class="form-control" id="jadwal" name="jadwal" value="<?php echo $dokter['jadwal'];  ?>" required>
    </div>
    <div class="form-group">
        <label for="jam">Jam</label>
        <input type="text" class="form-control" id="jam" name="jam" value="<?php echo $dokter['jam'];  ?>" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Edit</button>
</form>


</div>
<!-- End of Main Content -->