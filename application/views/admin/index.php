<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-4">
            <h4 class="text-center">Nilai Preferensi</h4>

            <div class="card">
                <div class="card-body">
                    <ol>
                        <?php foreach ($nilai as $n) : ?>

                            <li><?= $n['keterangan_nilai']; ?></li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h4 class="text-center">Kriteria-Kriteria</h4>

            <div class="card">
                <div class="card-body">
                    <ol>
                        <?php foreach ($kriteria as $k) : ?>

                            <li><?= $k['nama_kriteria']; ?></li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h4 class="text-center">Alternatif</h4>

            <div class="card">
                <div class="card-body">
                    <ol>
                        <?php foreach ($alternatif as $a) : ?>

                            <li><?= $a['nama_alternatif']; ?></li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->