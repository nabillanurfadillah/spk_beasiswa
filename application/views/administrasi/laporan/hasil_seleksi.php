<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 mt-4 text-gray-800">Data Hasil Seleksi</h1>


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

            <h4>Nilai Alternatif</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>

                        <?php foreach ($kriteria as $k) : ?>
                            <th class="text-center" scope="col"><?= $k['nama_kriteria']; ?></th>

                        <?php endforeach; ?>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($alternatif as $a) : ?>
                        <tr>
                            <?php $ida = $a['id_alternatif']; ?>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $a['nama_alternatif']; ?></td>
                            <?php
                            $query1 = "SELECT nama_subkriteria from subkriteria join hitung on hitung.id_subkriteria=subkriteria.id_subkriteria
                            where hitung.id_alternatif=$ida";
                            $hasil1 = $this->db->query($query1)->result_array();
                            ?>
                            <?php foreach ($hasil1 as $h) : ?>


                                <td>
                                    <?= $h['nama_subkriteria']; ?>
                                </td>

                            <?php endforeach; ?>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>

            <h4>Konversi</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>

                        <?php foreach ($kriteria as $k) : ?>
                            <th class="text-center" scope="col"><?= $k['nama_kriteria']; ?></th>

                        <?php endforeach; ?>
                    </tr>
                </thead>
                <?php

                ?>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($alternatif as $a) : ?>
                        <?php $ida = $a['id_alternatif']; ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $a['nama_alternatif']; ?></td>
                            <?php
                            $query1 = "SELECT subkriteria.nilai_subkriteria from subkriteria join hitung on hitung.id_subkriteria=subkriteria.id_subkriteria
                            where hitung.id_alternatif=$ida";
                            $hasil1 = $this->db->query($query1)->result_array();
                            ?>
                            <?php foreach ($hasil1 as $h) : ?>


                                <td>
                                    <?= $h['nilai_subkriteria']; ?>
                                </td>

                            <?php endforeach; ?>




                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal -->