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
            <th scope="col">Nama Penerima</th>
            <th scope="col">Total</th>
            <th scope="col">Detail</th>
            <th scope="col">Alamat</th>
            <th scope="col">Status</th>
            <th scope="col">Edit</th>

        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($kurir as $j) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $j['nama']; ?></td>
                <td><?= $j['total']; ?></td>
                <td><?= $j['detail']; ?></td>
                <td><?= $j['alamat']; ?></td>
                <td><?php
                    if ($j['status'] == 1) {
                        echo "Terkirim";
                    } else {
                        echo "Belum terkirim";
                    } ?></td>
                <td>
                    <?php
                    if ($j['status'] == 0) {
                        echo '<a href="' . base_url('kurir/selesai/') . $j['id_pengiriman'] . '" class="badge badge-success">Selesai</a>';
                        echo '<a href="' . base_url('kurir/deletePengiriman/') . $j['id_pengiriman'] . '" class="badge badge-danger">Batal/Delete</a>';
                    } else {
                        echo '<a href="' . base_url('kurir/kembali/') . $j['id_pengiriman'] . '" class="badge badge-danger">Batal</a>';
                    }
                    ?>
                </td>

            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>

</div>
<!-- End of Main Content -->