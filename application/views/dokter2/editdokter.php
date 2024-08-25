<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

</div>
<!-- /.container-fluid -->
<?= form_open_multipart('Dokter/editDokter2'); ?>
<div class="form-group">
    <input type="hidden" class="form-control" id="id_dokter" name="id_dokter" value="<?php echo $dokter['id_dokter'];  ?>">

    <label for="nama">Nama Obat</label>
    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $dokter['nama_dokter'];  ?>">
</div>
<div class="form-group">
    <label for="jadwal">Spesialis</label>
    <input type="text" class="form-control" id="spesialis" name="spesialis" value="<?php echo $dokter['spesialis'];  ?>">
</div>
<div class="form-group">
    <label for="jam">Keterangan</label>
    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $dokter['keterangan'];  ?>">
</div>

<div class="form-group">
    <a type="button" href="../../upload/dokter/<?= $dokter['foto_dokter']; ?>" class="btn btn-secondary">Lihat Foto Dokter</a>
    <input type="hidden" id="old_image" name="old_image" value="<?php echo $dokter['foto_dokter'];  ?>">
</div>
<div class="form-group">
    <label for="keterangan">Gambar</label>
    <input type="file" class="form-control" id="image" name="image">
</div>
<button type="submit" class="btn btn-primary">Edit</button>
</form>



</div>
<!-- End of Main Content -->