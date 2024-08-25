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




<table class="table">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">ID Pasien</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Jadwal Konsultasi</th>
            <th scope="col">Jam</th>
            <th scope="col">Nama Dokter</th>
            <th scope="col">Kontak</th>

        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($selesai as $j) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $j['id_pasien']; ?></td>
                <td><?= $j['nama_pasien']; ?></td>
                <td><?= $j['jadwal']; ?></td>
                <td><?= $j['jam']; ?></td>
                <td><?= $j['nama_dokter']; ?></td>
                <td><?= $j['no_hp']; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>

</div>
<!-- End of Main Content -->