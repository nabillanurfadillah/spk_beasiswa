<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>


            <?php endif; ?>
            <?php if ($this->session->flashdata('message')) : ?>

                <div class="flash-data-rangking" data-flashdatarangking="<?= $this->session->flashdata('message'); ?>"></div>
            <?php endif; ?>
            <ul class="nav nav-pills mb-4">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Laporan Perangkingan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>administrasi/perangkingan/">Cetak Laporan 1 (PrintMe)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>administrasi/tambahrangking/">Cetak Laporan 2 (FPDF)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>administrasi/tambahrangking/">Cetak Laporan 3 (tableExport)</a>
                </li>

            </ul>
            <h4>Nilai Alternatif Kriteria</h4>
            <table class="table table-bordered table-hover" id="reminders">
                <thead>

                    <tr>

                        <th style="vertical-align : middle;text-align:center;" rowspan="2" scope="col">Alternatif</th>
                        <th class="text-center" colspan="3" scope="col">Kriteria</th>
                    </tr>
                    <tr>
                        <?php foreach ($kriteria as $k) : ?>
                            <th class="text-center" scope="col"><?= $k['nama_kriteria']; ?><br />(<?= $k['tipe_kriteria'] ?>)</th>

                        <?php endforeach; ?>


                    </tr>

                    <?php
                    $query = 'SELECT alternatif.nama_alternatif, rangking.nilai_normalisasi 
                    FROM alternatif
                    INNER JOIN rangking
                    ON alternatif.id_alternatif = rangking.id_alternatif';
                    $nilainormalisasi = $this->db->query($query)->result_array();
                    ?>
                </thead>
                <tbody>
                    <?php foreach ($alternatif as $a) : ?>
                        <tr>
                            <th scope="row"><?= $a['nama_alternatif']; ?></th>
                            <td>1</td>
                            <td>0.4</td>
                            <td>0.4</td>


                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h4>Normalisasi R</h4>
            <table class="table table-bordered table-hover">
                <thead>

                    <tr>

                        <th style="vertical-align : middle;text-align:center;" rowspan="2" scope="col">Alternatif</th>
                        <th class="text-center" colspan="3" scope="col">Kriteria</th>
                    </tr>
                    <tr>
                        <?php foreach ($kriteria as $k) : ?>
                            <th class="text-center" scope="col"><?= $k['nama_kriteria']; ?><br />(<?= $k['tipe_kriteria'] ?>)</th>

                        <?php endforeach; ?>




                    </tr>


                </thead>
                <tbody>
                    <?php foreach ($alternatif as $al) : ?>
                        <tr>
                            <td><?= $al['nama_alternatif']; ?></td>

                            <?php foreach ($kriteria as $k) : ?>
                                <?php
                                        $ida = $al['id_alternatif'];
                                        $idk = $k['id_kriteria'];
                                        $query = "SELECT rangking.*
                                        FROM rangking 
                                        WHERE id_alternatif = $ida
                                        AND id_kriteria = $idk ";
                                        $rang = $this->db->query($query);
                                        $rang2 = $this->db->query($query)->result_array();
                                        if ($rang->num_rows()) {
                                            foreach ($rang2 as $r) {
                                                $a = $r['nilai_normalisasi'];
                                            };
                                        } else {
                                            $a = '-';
                                        }
                                        ?>
                                <td>
                                    <?= $a; ?>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>

                    <tr>
                        <td><b>Bobot</b></td>
                    </tr>

                </tbody>
            </table>
            <h4>Hasil Akhir</h4>
            <table class="table table-bordered table-hover">
                <thead>

                    <tr>

                        <th style="vertical-align : middle;text-align:center;" rowspan="2" scope="col">Alternatif</th>
                        <th class="text-center" colspan="3" scope="col">Kriteria</th>
                        <th style="vertical-align : middle;text-align:center;" rowspan="2" scope="col">Hasil</th>
                    </tr>
                    <tr>
                        <?php foreach ($kriteria as $k) : ?>
                            <th class="text-center" scope="col"><?= $k['nama_kriteria']; ?><br />(<?= $k['tipe_kriteria'] ?>)</th>

                        <?php endforeach; ?>




                    </tr>


                </thead>
                <tbody>

                    <tr>
                        <th scope="row">Andi</th>
                        <td>1</td>
                        <td>0.4</td>
                        <td>0.4</td>
                        <td>5.8</td>


                    </tr>
                    <tr>
                        <th scope="row">Budi</th>

                        <td>0.666666667</td>
                        <td>1</td>
                        <td>1</td>
                        <td>9</td>




                    </tr>
                    <tr>
                        <th scope="row">Cinta</th>

                        <td>0.4</td>
                        <td>1</td>
                        <td>0.6</td>
                        <td>7.4</td>

                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal -->


<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Rangking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('administrator/rangking'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">


                        <select name="tipe" id="tipe" class="form-control col-sm-9">


                            <option>Alternatif</option>
                            <option value="">Andi</option>
                            <option value="">Budi</option>
                            <option value="">Cinta</option>


                        </select>

                    </div>
                    <div class="form-group">


                        <select name="tipe" id="tipe" class="form-control col-sm-9">


                            <option>Kriteria</option>
                            <option value="">Pendapatan Orang Tua</option>
                            <option value="">IPK Terakhir</option>
                            <option value="">Jumlah Saudara</option>


                        </select>

                    </div>
                    <div class="form-group">


                        <select name="tipe" id="tipe" class="form-control col-sm-9">


                            <option>Nilai</option>
                            <option value="">Sangat Layak</option>
                            <option value="">layak</option>
                            <option value="">Tidak Layak</option>


                        </select>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>