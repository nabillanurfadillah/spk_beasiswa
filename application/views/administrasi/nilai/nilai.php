<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>


            <?php endif; ?>

            <?php if ($this->session->flashdata('message')) : ?>

                <div class="flash-data-nilai" data-datanilai="<?= $this->session->flashdata('message'); ?>"></div>
            <?php endif; ?>


            <a href="<?= base_url('administrasi/tambahnilai'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Keterangan Nilai</th>
                        <th scope="col">Jumlah Nilai</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($nilai as $n) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $n['keterangan_nilai']; ?></td>
                            <td><?= $n['jumlah_nilai']; ?></td>


                            <td>
                                <a href="<?= base_url() ?>administrasi/editnilai/<?= $n['id_nilai']; ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url() ?>administrasi/hapusnilai/<?= $n['id_nilai']; ?>" class="badge badge-danger hapusnilai">delete</a>
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