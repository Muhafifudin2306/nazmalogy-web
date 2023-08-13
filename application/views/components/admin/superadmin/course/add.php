<div class="space-top">
    <div class="row pb-5">
        <div class="col-md-12">
            <div class="bg-white p-5 border" data-aos="fade-up" data-aos-duration="700">
                <div class="d-flex justify-content-between py-2">
                    <h5 class="text-2">Tambah Data Kursus</h5>
                    <a href="<?= base_url('adminRoot/course/class_admin') ?>"><i class="bi bi-x-lg text-black"></i></a>
                </div>
                <hr>
                <form method="post" action="<?= base_url('adminRoot/course/save_course') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold">Judul Kursus
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="title" class="form-control <?php echo form_error('title') ? 'is-invalid' : ''; ?>" id="title" value="<?php echo set_value('title'); ?>" placeholder="Judul Kursus Saya" required>
                                <div id="name-error" class="invalid-feedback">
                                    <?= form_error('title'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="cover" class="form-label fw-bold">Cover Kursus
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="file" name="cover" class="form-control <?= form_error('cover') ? 'is-invalid' : '' ?>" id="cover" required>
                                <?php if (form_error('cover')) : ?>
                                    <div class="invalid-feedback">
                                        <?= form_error('cover'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="instructor" class="form-label fw-bold">Instruktur
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="instructor" class="form-control <?php echo form_error('instructor') ? 'is-invalid' : ''; ?>" value="<?php echo set_value('instructor'); ?>" id="instructor" placeholder="Nama Instruktur" required>
                                <div id="name-error" class="invalid-feedback">
                                    <?= form_error('instructor'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="intro_link" class="form-label fw-bold">Link Intro Kelas
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="intro_link" class="form-control <?php echo form_error('intro_link') ? 'is-invalid' : ''; ?>" value="<?php echo set_value('intro_link'); ?>" id="intro_link" placeholder="www.example.com" required>
                                <div id="name-error" class="invalid-feedback">
                                    <?= form_error('intro_link'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="duration" class="form-label fw-bold">Durasi (Menit)
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="number" placeholder="3" name="intro_duration" class="form-control <?php echo form_error('intro_duration') ? 'is-invalid' : ''; ?>" value="<?php echo set_value('intro_duration'); ?>" id="duration" required>
                                <div id="name-error" class="invalid-feedback">
                                    <?= form_error('intro_duration'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="mentoring_link" class="form-label fw-bold">Link Gabung Ment
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" placeholder="bit.ly/joinGroupKulWA" name="mentoring_link" class="form-control" id="mentoring_link" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="playlist" class="form-label fw-bold">Playlist Kursus
                                    <span class="text-danger">*</span>
                                </label>
                                <select style="width: 100%" class="js-example-basic-multiple" name="playlist[]" multiple aria-required="true">
                                    <?php foreach ($playlist as $row) { ?>
                                        <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label fw-bold">Kategori Kursus
                                    <span class="text-danger">*</span>
                                </label>
                                <select style="width: 100%" class="js-example-basic-multiple" id="category" name="category[]" multiple aria-required="true">
                                    <?php foreach ($categories as $row) { ?>
                                        <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="summernote" class="form-label fw-bold">Ringkasan Kursus
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea id="summernote" placeholder="Ringkasan Kursus" name="summary"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-blue-1">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>