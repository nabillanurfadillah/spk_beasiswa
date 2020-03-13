<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('administrasi/tambahkriteria'); ?>


            <div class="form-group row">
                <label for="nama_kriteria" class="col-sm-3 col-form-label">Nama Kriteria</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" placeholder="Masukkan Nama Kriteria" value="<?= set_value('nama_kriteria'); ?>">
                    <?= form_error('nama_kriteria', ' <small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="tipe_kriteria" class="col-sm-3 col-form-label">Tipe Kriteria</label>
                <div class="col-sm-9">
                    <select name="tipe_kriteria" id="tipe_kriteria" class="form-control col-sm-9">

                        <option value="Cost">Cost</option>
                        <option value="Benefit">Benefit</option>


                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="bobot_kriteria" class="col-sm-3 col-form-label">Bobot Kriteria</label>
                <div class="col-sm-9">
                    <select name="id_nilai" id="id_nilai" class="form-control col-sm-9">
                        <?php foreach ($nilai as $nl) : ?>

                            <option value="<?= $nl['id_nilai'] ?>"><?= $nl['jumlah_nilai'] ?></option>

                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Tambah</button>

                    <a href="<?= base_url('administrasi/kriteria'); ?>" class="btn btn-danger">Kembali</a>
                </div>
            </div>

            </form>


        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->