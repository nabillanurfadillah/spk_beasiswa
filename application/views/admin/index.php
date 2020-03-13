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
    <div class="container2">
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="text/javascript">
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                    if (count($graph) > 0) {
                        foreach ($graph as $data) {
                            echo "'" . $data->nama_alternatif . "',";
                        }
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Alternatif',
                    backgroundColor: '#ADD8E6',
                    borderColor: '##93C3D2',
                    data: [
                        <?php
                        if (count($graph) > 0) {
                            foreach ($graph as $data) {
                                echo $data->hasil_alternatif . ", ";
                            }
                        }
                        ?>
                    ]
                }]
            },
        });
    </script>
</div>
<!-- End of Main Content -->