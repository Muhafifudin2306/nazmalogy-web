<body id="body-pd">
    <div class="space-top">
        <div class="row pb-5">
            <div class="col-md-12">
                <div class="bg-white p-5 border" data-aos="zoom-in-up" data-aos-duration="1000">
                    <div class="d-flex justify-content-between py-2">
                        <h5 class="text-2">Edit Data Testimoni</h5>
                        <a href="<?= base_url('adminRoot/setting') ?>"><i class="bi bi-x-lg text-black"></i></a>
                    </div>
                    <hr>
                    <form method="post" action="<?= base_url('adminRoot/setting/update_testimony/' . $testimony->id) ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold" for="author">Nama Pengguna<span class="text-danger">*</span></label>
                                    <input type="text" id="author" name="author" class="form-control <?= form_error('author') ? 'is-invalid' : '' ?>" value="<?= $testimony->author ?>" required>
                                    <div class="invalid-feedback">
                                        <?= form_error('author') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold" for="image">Foto Pengguna : <a target="_blank" href=<?= base_url('assets/images/admin/testimony/'. $testimony->image) ?>> File Foto</a> </label>
                                    <input type="file" id="image" name="image" class="form-control <?= form_error('image') ? 'is-invalid' : '' ?>" value="<?= $testimony->image ?>">
                                    <div class="invalid-feedback">
                                        <?= form_error('image') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold" for="job">Pekerjaan<span class="text-danger">*</span></label>
                                    <input type="text" id="job" name="job" class="form-control <?= form_error('job') ? 'is-invalid' : '' ?>" value="<?= $testimony->job ?>" required>
                                    <div class="invalid-feedback">
                                        <?= form_error('job') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold" for="rating">Rating<span class="text-danger">*</span></label>
                                    <select class="form-select <?= form_error('rating') ? 'is-invalid' : '' ?>" name="rating" aria-label="Default select example" required>
                                        <option value="<?= $testimony->rating ?>" selected><?= round($testimony->rating) ?></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= form_error('rating') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold" for="status">Status<span class="text-danger">*</span></label>
                                    <select class="form-select <?= form_error('status') ? 'is-invalid' : '' ?>" name="status" aria-label="Default select example" required>
                                        <?php if ($testimony->status == 0) : ?>
                                            <option value="0" selected>Non Aktif</option>
                                        <?php else : ?>
                                            <option value="1" selected>Aktif</option>
                                        <?php endif ?>
                                        <option value="0">Non Aktif</option>
                                        <option value="1">Aktif</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= form_error('status') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold" for="message">Pesan Testimoni<span class="text-danger">*</span></label>
                                    <textarea class="form-control <?= form_error('message') ? 'is-invalid' : '' ?>" id="message" name="message" rows="5" required><?= $testimony->message ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= form_error('message') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-blue-1">Edit Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>