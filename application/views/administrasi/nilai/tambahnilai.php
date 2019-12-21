<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('administrasi/tambahnilai'); ?>


            <div class="form-group row">
                <label for="keterangan_nilai" class="col-sm-3 col-form-label">Keterangan Nilai</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="keterangan_nilai" name="keterangan_nilai" placeholder="Masukkan Keterangan Nilai" value="<?= set_value('keterangan_nilai'); ?>">
                    <?= form_error('keterangan_nilai', ' <small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="jumlah_nilai" class="col-sm-3 col-form-label">Jumlah Nilai</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="jumlah_nilai" name="jumlah_nilai" placeholder="Masukkan Jumlah Nilai" value="<?= set_value('jumlah_nilai'); ?>">
                    <?= form_error('jumlah_nilai', ' <small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Tambah</button>

                    <a href="<?= base_url('administrasi/nilai'); ?>" class="btn btn-danger">Kembali</a>
                </div>
            </div>

            </form>


        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->