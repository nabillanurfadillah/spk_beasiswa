<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart(); ?>



            <div class="form-group row">
                <label for="nama_kriteria" class="col-sm-3 col-form-label">Nama Kriteria</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="<?= $kriteria['nama_kriteria']; ?>">
                    <?= form_error('nama_kriteria', ' <small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="tipe_kriteria" class="col-sm-3 col-form-label">Tipe Kriteria</label>
                <div class="col-sm-9">
                    <select name="tipe_kriteria" id="tipe_kriteria" class="form-control col-sm-9">
                        <?php foreach ($tipe_kriteria as $k) : ?>
                            <?php if ($k == $kriteria['tipe_kriteria']) : ?>
                                <option value="<?= $k; ?>" selected><?= $k; ?></option>
                            <?php else : ?>
                                <option value="<?= $k; ?>"><?= $k; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>





                    </select>
                </div>
            </div>
            <?php
            $query = "SELECT kriteria.nama_kriteria, kriteria.tipe_kriteria, nilai.jumlah_nilai, id_kriteria, kriteria.id_nilai
                            FROM kriteria INNER JOIN nilai ON kriteria.id_nilai = nilai.id_nilai
                            ";
            $datakriteria = $this->db->query($query)->result_array();
            // var_dump($datakriteria);
            // die;


            ?>
            <div class="form-group row">
                <label for="bobot_kriteria" class="col-sm-3 col-form-label">Bobot Kriteria</label>
                <div class="col-sm-9">
                    <select name="bobot_kriteria" id="bobot_kriteria" class="form-control col-sm-9">
                        <?php foreach ($nilai as $nl) : ?>
                            <?php if ($nl['id_nilai'] == $kriteria['id_nilai']) : ?>
                                <option value="<?= $nl['id_nilai'] ?>" selected><?= $nl['jumlah_nilai'] ?></option>
                            <?php else : ?>
                                <option value="<?= $nl['id_nilai'] ?>"><?= $nl['jumlah_nilai'] ?></option>
                            <?php endif; ?>


                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Ubah</button>

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