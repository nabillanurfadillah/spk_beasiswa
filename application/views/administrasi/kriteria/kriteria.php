<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>


            <?php endif; ?>
            <?php if ($this->session->flashdata('message')) : ?>

                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
            <?php endif; ?>

            <a href="<?= base_url('administrasi/tambahkriteria'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kriteria</th>
                        <th scope="col">Tipe Kriteria</th>
                        <th scope="col">Bobot Kriteria</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                $query = "SELECT kriteria.nama_kriteria, kriteria.tipe_kriteria, nilai.jumlah_nilai, id_kriteria
                            FROM kriteria INNER JOIN nilai ON kriteria.id_nilai = nilai.id_nilai";
                $datakriteria = $this->db->query($query)->result_array();

                ?>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($datakriteria as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $k['nama_kriteria']; ?></td>
                            <td><?= $k['tipe_kriteria']; ?></td>
                            <td><?= $k['jumlah_nilai']; ?></td>


                            <td>
                                <a href="<?= base_url() ?>administrasi/editkriteria/<?= $k['id_kriteria']; ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url() ?>administrasi/hapuskriteria/<?= $k['id_kriteria']; ?>" class="badge badge-danger tombol-hapus">delete</a>
                            </td>

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


<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Nilai Preferensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('administrator/nilai'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">

                        <input type="text" class="form-control" id="nilai" name="nilai" placeholder="Keterangan Nilai">
                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control" id="nilai" name="nilai" placeholder="Jumlah Nilai">
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