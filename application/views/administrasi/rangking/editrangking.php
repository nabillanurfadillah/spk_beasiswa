<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart(); ?>
            <input type="hidden" name="id_rangking" value="<?= $rangking['id_rangking']; ?>">


            <div class="form-group row">
            <label for="alternatif" class="col-sm-3 col-form-label">Alternatif</label>
                <div class="col-sm-9">
                    <select name="alternatif" id="alternatif" class="form-control col-sm-9">
                        <?php foreach ($alternatif as $a) : ?>
                            <?php if ($a['id_alternatif'] == $rangking['id_alternatif']) : ?>
                                <option value="<?= $a['id_alternatif'] ?>" selected><?= $a['nama_alternatif'] ?></option>
                            <?php else : ?>
                             
                                <option value="<?= $a['id_alternatif'] ?>"><?=$a['nama_alternatif']?></option>
                               
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
            <label for="kriteria" class="col-sm-3 col-form-label">Kriteria</label>
                <div class="col-sm-9">
                    <select name="kriteria" id="kriteria" class="form-control col-sm-9">
                        <?php foreach ($kriteria as $k) : ?>
                            <?php if ($k['id_kriteria'] == $rangking['id_kriteria']) : ?>
                                <option value="<?= $k['id_kriteria'] ?>" selected><?= $k['nama_kriteria'] ?></option>
                            <?php else : ?>
                             
                                <option value="<?= $k['id_kriteria'] ?>"><?=$k['nama_kriteria']?></option>
                               
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
            <label for="nilai" class="col-sm-3 col-form-label">nilai</label>
                <div class="col-sm-9">
                    <select name="nilai" id="nilai" class="form-control col-sm-9">
                        <?php foreach ($nilai as $n) : ?>
                            <?php if ($n['jumlah_nilai'] == $rangking['nilai_rangking']) : ?>
                                <option value="<?= $n['jumlah_nilai'] ?>" selected><?= $n['keterangan_nilai'] ?></option>
                            <?php else : ?>
                             
                                <option value="<?= $n['jumlah_nilai'] ?>"><?=$n['keterangan_nilai']?></option>
                               
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group row justify-content-end">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Simpan</button>

                    <a href="<?= base_url('administrasi/rangking'); ?>" class="btn btn-danger">Kembali</a>
                </div>
            </div>

            </form>


        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->