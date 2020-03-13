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

                <div class="flash-data-subkriteria" data-flashdatasubkriteria="<?= $this->session->flashdata('message'); ?>"></div>
            <?php endif; ?>
            <div class="form-group row">
                <label for="kriteria" class="col-sm-2 col-form-label"><b>Pilih Kriteria</b></label>
                <div class="col-sm-4">
                    <select name="kriteria" id="kriteria" class="form-control col-sm-9">
                        <?php foreach ($kriteria as $k) : ?>

                            <option value="<?= $k['id_kriteria'] ?>"><?= $k['nama_kriteria'] ?></option>

                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <a href="<?= base_url('administrasi/tambahsubkriteria'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kriteria</th>
                        <th scope="col">Nama Subkriteria</th>
                        <th scope="col">Nilai Subkriteria</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                $query = "SELECT subkriteria.id_subkriteria,kriteria.id_kriteria, subkriteria.nama_subkriteria, subkriteria.nilai_subkriteria, kriteria.nama_kriteria FROM subkriteria INNER JOIN kriteria ON subkriteria.id_kriteria = kriteria.id_kriteria";
                $datasubkriteria = $this->db->query($query)->result_array();

                ?>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($datasubkriteria as $sk) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $sk['nama_kriteria']; ?></td>
                            <td><?= $sk['nama_subkriteria']; ?></td>
                            <td><?= $sk['nilai_subkriteria']; ?></td>



                            <td>
                                <a href="<?= base_url() ?>administrasi/editsubkriteria/<?= $sk['id_subkriteria']; ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url() ?>administrasi/hapussubkriteria/<?= $sk['id_subkriteria']; ?>" class="badge badge-danger tombol-hapus-subkriteria">delete</a>
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