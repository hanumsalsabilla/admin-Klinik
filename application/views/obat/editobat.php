<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

</div>
<!-- /.container-fluid -->
<?= form_open_multipart('Obat/editObat2'); ?>
<div class="form-group">
    <input type="hidden" class="form-control" id="id_obat" name="id_obat" value="<?php echo $dokter['id_obat'];  ?>">

    <label for="nama">Nama Obat</label>
    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $dokter['nama_obat'];  ?>">
</div>
<div class="form-group">
    <label for="jadwal">Stok</label>
    <input type="text" class="form-control" id="stok" name="stok" value="<?php echo $dokter['stok_obat'];  ?>">
</div>
<div class="form-group">
    <label for="jam">Keterangan</label>
    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $dokter['keterangan'];  ?>">
</div>
<div class="form-group">
    <label for="keterangan">Harga</label>
    <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $dokter['harga'];  ?>">
</div>
<div class="form-group">
    <a type="button" href="../../upload/obat/<?= $dokter['gambar_obat']; ?>" class="btn btn-secondary">Lihat Gambar Obat</a>
    <input type="hidden" id="old_image" name="old_image" value="<?php echo $dokter['gambar_obat'];  ?>">
</div>
<div class="form-group">
    <label for="keterangan">Gambar</label>
    <input type="file" class="form-control" id="image" name="image">
</div>
<button type="submit" class="btn btn-primary">Edit</button>
</form>


</div>
<!-- End of Main Content -->