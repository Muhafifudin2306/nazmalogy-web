<div class="space-top">
    <div class="row pb-5">
        <div class="col-md-6">
            <div class="bg-white p-5 border" data-aos="fade-up" data-aos-duration="700">
                <div class="d-flex justify-content-between py-2">
                    <h5 class="text-2">Edit Data Kategori</h5>
                    <a href="<?= base_url('adminRoot/course/class_admin') ?>"><i class="bi bi-x-lg text-black"></i></a>
                </div>
                <hr>
                <form method="post" action="<?php echo base_url('adminRoot/course/update_category/' . $category->id); ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Nama Kategori
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" id="name" value="<?= $category->name ?>" name="name" class="form-control <?php echo form_error('name') ? 'is-invalid' : ''; ?>" required>
                        <div id="name-error" class="invalid-feedback">
                            <?= form_error('name'); ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-blue-1">Edit Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
