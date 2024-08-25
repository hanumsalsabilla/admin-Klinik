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
            <th scope="col">Nama Pasien</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">No Hp</th>



        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($pasien as $j) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $j['nama']; ?></td>
                <td><?= $j['username']; ?></td>
                <td><?= $j['password']; ?></td>
                <td><?= $j['tgl_lahir']; ?></td>
                <td><?= $j['jenkel']; ?></td>
                <td><?= $j['alamat']; ?></td>
                <td><?= $j['no_hp']; ?></td>


            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>

</div>
<!-- End of Main Content -->