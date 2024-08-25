<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

</div>
<!-- /.container-fluid -->
<?php if ($this->session->flashdata('category_success')) { ?>
    <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('category_error')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('category_error') ?> </div>
<?php } ?>
<?= form_open_multipart('Obat/tambahObat'); ?>
<div class="row">
    <div class="col">
        <input type="text" class="form-control" placeholder="Nama Obat" id="nama" name="nama" required>
    </div>
    <div class="col">
        <input type="text" class="form-control" placeholder="Stok" id="stok" name="stok" required>
    </div>
    <div class="col">
        <input type="text" class="form-control" placeholder="keterangan" id="keterangan" name="keterangan" required>
    </div>
    <div class="col">
        <input type="text" class="form-control" placeholder="harga" id="harga" name="harga" required>
    </div>
    <div class="col">
        <input type="file" class="custom-file-input" id="image" name="image" required>
        <label class="custom-file-label" for="image">Choose file</label>
    </div>
    <div class="col">
        <Button class="btn btn-success">Submit</Button>
    </div>
</div>
</form>
<table class="table">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama Obat</th>
            <th scope="col">stok</th>
            <th scope="col">Keterangan</th>
            <th scope="col">harga</th>
            <th scope="col">Gambar</th>
            <th scope="col">Edit</th>

        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($obat as $j) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $j['nama_obat']; ?></td>
                <td><?= $j['stok_obat']; ?></td>
                <td><?= $j['keterangan']; ?></td>
                <td><?= $j['harga']; ?></td>
                <td><a type="button" href="./upload/obat/<?= $j['gambar_obat']; ?>" class="btn btn-primary">Lihat Gambar</a></td>
                <td><a type="button" class="btn btn-danger" href="<?php echo site_url('Obat/deleteObat/' . $j['id_obat']); ?>">Delete</a>
                    <a type="button" class="btn btn-warning" href="<?php echo site_url('Obat/editObat/' . $j['id_obat']); ?>">Edit</a>
                </td>

            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>

</div>
<!-- End of Main Content -->