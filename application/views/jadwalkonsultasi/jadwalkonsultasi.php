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

<div class="row">

    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $jumlahkunjungan; ?></h5>
                <p class="card-text">Jumlah Kunjungan</p>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $jumlahkunjunganberhasil; ?></h5>
                <p class="card-text">Konsultasi Berhasil</p>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $jumlahselesai; ?></h5>
                <p class="card-text">Konsultasi Selesai</p>
            </div>
        </div>
    </div>
</div>


<table class="table">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Jadwal Konsultasi</th>
            <th scope="col">Jam</th>
            <th scope="col">Nama Dokter</th>
            <th scope="col">Kontak</th>
            <th scope="col">Status</th>

        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($konsultasi as $j) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $j['nama']; ?></td>
                <td><?= $j['jadwal']; ?></td>
                <td><?= $j['jam']; ?></td>
                <td><?= $j['nama_dokter']; ?></td>
                <td><?= $j['no_hp']; ?></td>


                <td>
                    <?php
                    if ($j['status'] == 0) {

                        echo '<a href="' . base_url('JadwalKonsultasi/selesai/') . $j['id_konsultasi'] . '" class="badge badge-success">Selesai</a>';
                        echo '<a href="' . base_url('JadwalKonsultasi/deleteKonsultasi/') . $j['id_konsultasi'] . '" class="badge badge-danger">Batal</a>';
                    } else {
                        echo '<a href="' . base_url('JadwalKonsultasi/pindahkan/') . $j['id_konsultasi'] . '" class="badge badge-success">Pindah ke tabel Selesai</a>';
                        echo '<a href="' . base_url('JadwalKonsultasi/kembali/') . $j['id_konsultasi'] . '" class="badge badge-danger">kembali</a>';
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