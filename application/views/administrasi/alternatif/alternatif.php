<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-8">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>


            <?php endif; ?>
            <?php if ($this->session->flashdata('message')) : ?>

                <div class="flash-data-alternatif" data-flashdataalternatif="<?= $this->session->flashdata('message'); ?>"></div>
            <?php endif; ?>
            <a href="<?= base_url('administrasi/tambahalternatif'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Alternatif</th>
                        <th scope="col">Hasil Alternatif</th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($alternatif as $a) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $a['nama_alternatif']; ?></td>
                            <td><?= $a['hasil_alternatif']; ?></td>


                            <td>
                                <a href="<?= base_url() ?>administrasi/editalternatif/<?= $a['id_alternatif']; ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url() ?>administrasi/hapusalternatif/<?= $a['id_alternatif']; ?>" class="badge badge-danger tombolhapusa">delete</a>
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
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Alternatif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('administrator/alternatif'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">

                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Alternatif">
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