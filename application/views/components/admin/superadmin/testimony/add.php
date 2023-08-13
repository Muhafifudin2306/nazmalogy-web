<div class="space-top">
    <div class="row pb-5">
        <div class="col-md-12">
            <div class="bg-white p-5 border" data-aos="zoom-in-up" data-aos-duration="1000">
                <div class="d-flex justify-content-between py-2">
                    <h5 class="text-2">Tambah Data Testimoni</h5>
                    <a href="<?= site_url('adminRoot/setting') ?>"><i class="bi bi-x-lg text-black"></i></a>
                </div>
                <hr>
                <form method="post" action="<?= site_url('adminRoot/setting/save_testimony') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="author">Nama Pengguna<span class="text-danger">*</span></label>
                                <input type="text" id="author" name="author" class="form-control <?php echo form_error('author') ? 'is-invalid' : ''; ?>" placeholder="Nama Lengkap" value="<?php echo set_value('author'); ?>" required>
                                <div class="invalid-feedback">
                                    <?php echo form_error('author'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="image">Foto Pengguna<span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control <?= form_error('image') ? 'is-invalid' : '' ?>" id="image">
                                <?php if (form_error('image')) : ?>
                                    <div class="invalid-feedback">
                                        <?= form_error('image'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="job">Pekerjaan<span class="text-danger">*</span></label>
                                <input type="text" id="job" name="job" class="form-control <?php echo form_error('job') ? 'is-invalid' : ''; ?>" placeholder="Pekerjaan" value="<?php echo set_value('job'); ?>" required>
                                <div class="invalid-feedback">
                                    <?php echo form_error('job'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="rating">Rating<span class="text-danger">*</span></label>
                                <select class="form-select <?php echo form_error('rating') ? 'is-invalid' : ''; ?>" name="rating" aria-label="Default select example" required>
                                    <option selected>Pilih Rating</option>
                                    <option value="1" <?php echo set_select('rating', '1'); ?>>1</option>
                                    <option value="2" <?php echo set_select('rating', '2'); ?>>2</option>
                                    <option value="3" <?php echo set_select('rating', '3'); ?>>3</option>
                                    <option value="4" <?php echo set_select('rating', '4'); ?>>4</option>
                                    <option value="5" <?php echo set_select('rating', '5'); ?>>5</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('rating'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="status">Status<span class="text-danger">*</span></label>
                                <select class="form-select <?php echo form_error('status') ? 'is-invalid' : ''; ?>" name="status" aria-label="Default select example" required>
                                    <option selected>Pilih Status</option>
                                    <option value="0" <?php echo set_select('status', '0'); ?>>Non Aktif</option>
                                    <option value="1" <?php echo set_select('status', '1'); ?>>Aktif</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('status'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="message">Pesan Testimoni<span class="text-danger">*</span></label>
                                <textarea class="form-control <?php echo form_error('message') ? 'is-invalid' : ''; ?>" id="message" name="message" rows="5" required><?php echo set_value('message'); ?></textarea>
                                <div class="invalid-feedback">
                                    <?php echo form_error('message'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-blue-1">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>