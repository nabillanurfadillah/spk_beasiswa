<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('administrasi/tambahalternatif'); ?>


            <div class="form-group row">
                <label for="nama_alternatif" class="col-sm-3 col-form-label">Nama Alternatif</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_alternatif" name="nama_alternatif" placeholder="Masukkan Nama Alternatif" value="<?= set_value('nama_alternatif'); ?>">
                    <?= form_error('nama_alternatif', ' <small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>


            <div class="form-group row justify-content-end">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Tambah</button>

                    <a href="<?= base_url('administrasi/alternatif'); ?>" class="btn btn-danger">Kembali</a>
                </div>
            </div>

            </form>


        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->