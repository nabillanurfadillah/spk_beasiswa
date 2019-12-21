<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>


            <?php endif; ?>
            <?php if ($this->session->flashdata('message')) : ?>

                <div class="flash-data-rangking" data-flashdatarangking="<?= $this->session->flashdata('message'); ?>"></div>
            <?php endif; ?>
            <ul class="nav nav-pills mb-4">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Lihat Semua Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>administrasi/perangkingan/">Perangkingan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>administrasi/tambahrangking/">Tambah Data</a>
                </li>

            </ul>

            <table class="table table-hover" id="reminders">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Alternatif</th>
                        <th scope="col">Kriteria</th>
                        <th scope="col">Nilai</th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                $query = "SELECT keterangan_nilai,alternatif.nama_alternatif,kriteria.nama_kriteria, nilai.jumlah_nilai, id_rangking
                            FROM rangking INNER JOIN alternatif ON rangking.id_alternatif = alternatif.id_alternatif
                            INNER JOIN kriteria ON rangking.id_kriteria = kriteria.id_kriteria
                            INNER JOIN nilai ON rangking.nilai_rangking = nilai.jumlah_nilai 
                            ORDER BY nama_alternatif ASC";
                $datarangking = $this->db->query($query)->result_array();
                ?>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($datarangking as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $r['nama_alternatif']; ?></td>
                            <td><?= $r['nama_kriteria']; ?></td>
                            <td><?= $r['keterangan_nilai']; ?></td>


                            <td>
                                <a href="<?= base_url() ?>administrasi/editrangking/<?= $r['id_rangking']; ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url() ?>administrasi/hapusrangking/<?= $r['id_rangking']; ?>" class="badge badge-danger tombol-hapusr">delete</a>
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
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Rangking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('administrator/rangking'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">


                        <select name="tipe" id="tipe" class="form-control col-sm-9">


                            <option>Alternatif</option>
                            <option value="">Andi</option>
                            <option value="">Budi</option>
                            <option value="">Cinta</option>


                        </select>

                    </div>
                    <div class="form-group">


                        <select name="tipe" id="tipe" class="form-control col-sm-9">


                            <option>Kriteria</option>
                            <option value="">Pendapatan Orang Tua</option>
                            <option value="">IPK Terakhir</option>
                            <option value="">Jumlah Saudara</option>


                        </select>

                    </div>
                    <div class="form-group">


                        <select name="tipe" id="tipe" class="form-control col-sm-9">


                            <option>Nilai</option>
                            <option value="">Sangat Layak</option>
                            <option value="">layak</option>
                            <option value="">Tidak Layak</option>


                        </select>

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