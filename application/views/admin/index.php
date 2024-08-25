<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>






</div>
<!-- /.container-fluid -->


<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Jumlah Dokter</h5>
                <p class="card-text">Jumlah Dokter Yang Terdaftar Ada Sebanyak: <?php echo $dokter; ?></p>
                <a href="<?= base_url('Dokter'); ?>" class="btn btn-primary">Go Dokter</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Jumlah Konsultasi</h5>
                <p class="card-text">Jumlah Konsultasi Yang Terdaftar Ada Sebanyak : <?php echo $konsultasi; ?></p>
                <a href="<?= base_url('JadwalKonsultasi'); ?>" class="btn btn-primary">Go Jadwal Konsultasi</a>
            </div>
        </div>
    </div>
</div>








</div>
<!-- End of Main Content -->