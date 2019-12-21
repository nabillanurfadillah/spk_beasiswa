<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart(); ?>
            <input type="hidden" name="id" value="<?= $submenu['id']; ?>">

            <div class="form-group row">
                <label for="title" class="col-sm-3 col-form-label">Submenu Title</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="title" name="title" value="<?= $submenu['title']; ?>">
                    <?= form_error('title', ' <small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="selectmenu" class="col-sm-3 col-form-label">Select Menu</label>
                <div class="col-sm-6">
                    <select name="selectmenu" id="selectmenu" class="form-control">
                        <?php foreach ($menu as $m) : ?>
                            <?php if ($m['id'] == $submenu['id']) : ?>
                                <option value="<?= $m['id'] ?>" selected><?= $m['menu'] ?></option>
                            <?php else : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endif; ?>


                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="url" class="col-sm-3 col-form-label">Submenu url</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="url" name="url" value="<?= $submenu['url']; ?>">
                    <?= form_error('url', ' <small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="icon" class="col-sm-3 col-form-label">Submenu icon</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="icon" name="icon" value="<?= $submenu['icon']; ?>">
                    <?= form_error('icon', ' <small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <?php
                $aktif = $submenu['is_active']; ?>
                <label for="aktif" class="col-sm-3 col-form-label">Aktif</label>
                <div class="form-check form-check-inline pl-3">
                    <input type="radio" name="aktif" <?php if ($aktif == '1') {
                                                            echo 'checked';
                                                        } ?> value="1">
                    <label class="form-check-label" for="aktif">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="aktif" <?php if ($aktif == '0') {
                                                            echo 'checked';
                                                        } ?> value="0">
                    <label class="form-check-label" for="aktif">Tidak</label>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Edit</button>

                    <a href="<?= base_url('menu/submenu'); ?>" class="btn btn-danger">Batal</a>
                </div>
            </div>

            </form>


        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->