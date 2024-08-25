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
<form class="dokter" method="post" action="<?= base_url('JadwalDokter/tambahDataDokter') ?>">
    <div class="row">
        <div class="col">
            <select id="inputState" class="form-control" name="id">
                <?php foreach ($dokteronly as $d) : ?>
                    <option value="<?= $d['id_dokter']; ?>"><?= $d['nama_dokter']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Hari/Tanggal" id="jadwal" name="jadwal" required>
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Jam" id="jam" name="jam" required>
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
            <th scope="col">Jadwal</th>
            <th scope="col">Jam</th>
            <th scope="col">Edit</th>

        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($jadwal as $j) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $j['nama_dokter']; ?></td>
                <td><?= $j['jadwal']; ?></td>
                <td><?= $j['jam']; ?></td>
                <td><a type="button" class="btn btn-danger" href="<?php echo site_url('JadwalDokter/deleteDokter/' . $j['id_jadwal']); ?>">Delete</a>
                    <a type="button" class="btn btn-warning" href="<?php echo site_url('JadwalDokter/editDokter/' . $j['id_jadwal']); ?>">Edit</a>
                </td>

            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>

</div>
<!-- End of Main Content -->