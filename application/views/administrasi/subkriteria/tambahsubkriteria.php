<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('administrasi/tambahsubkriteria'); ?>

            <div class="form-group row">
                <label for="id_kriteria" class="col-sm-3 col-form-label">Pilih Kriteria</label>
                <div class="col-sm-9">
                    <select name="id_kriteria" id="id_kriteria" class="form-control col-sm-9">
                        <?php foreach ($kriteria as $k) : ?>

                            <option value="<?= $k['id_kriteria'] ?>"><?= $k['nama_kriteria'] ?></option>

                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_subkriteria" class="col-sm-3 col-form-label">Nama Subkriteria</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="nama_subkriteria" name="nama_subkriteria" placeholder="Masukkan Nama Subkriteria" value="<?= set_value('nama_subkriteria'); ?>">
                    <?= form_error('nama_subkriteria', ' <small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="nilai_subkriteria" class="col-sm-3 col-form-label">Nilai</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="nilai_subkriteria" name="nilai_subkriteria" placeholder="Masukkan Nilai Subkriteria" value="<?= set_value('nilai_subkriteria'); ?>">
                    <?= form_error('nilai_subkriteria', ' <small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Tambah</button>

                    <a href="<?= base_url('administrasi/subkriteria'); ?>" class="btn btn-danger">Kembali</a>
                </div>
            </div>

            </form>


        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->