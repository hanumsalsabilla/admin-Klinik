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
<?= form_open_multipart('Dokter/tambahDataDokter'); ?>
<div class="row">
    <div class="col">
        <input type="text" class="form-control" placeholder="Nama Dokter" id="nama" name="nama" required>
    </div>
    <div class="col">
        <input type="text" class="form-control" placeholder="Spesialis" id="spesialis" name="spesialis" required>
    </div>
    <div class="col">
        <input type="text" class="form-control" placeholder="Keterangan" id="keterangan" name="keterangan" required>
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
            <th scope="col">Nama Dokter</th>
            <th scope="col">Spesialis</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Foto</th>
            <th scope="col">Edit</th>

        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($jadwal as $j) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $j['nama_dokter']; ?></td>
                <td><?= $j['spesialis']; ?></td>
                <td><?= $j['keterangan']; ?></td>
                <td><a type="button" href="./upload/dokter/<?= $j['foto_dokter']; ?>" class="btn btn-primary">Lihat Foto</a></td>
                <td><a type="button" class="btn btn-danger" href="<?php echo site_url('Dokter/deleteDokter/' . $j['id_dokter']); ?>">Delete</a>
                    <a type="button" class="btn btn-warning" href="<?php echo site_url('Dokter/editDokter/' . $j['id_dokter']); ?>">Edit</a>
                </td>

            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>

</div>
<!-- End of Main Content -->