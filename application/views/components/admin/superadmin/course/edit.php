<div class="space-top">
    <div class="row pb-5">
        <div class="col-md-12">
            <div class="bg-white p-5 border" data-aos="fade-up" data-aos-duration="700">
                <div class="d-flex justify-content-between py-2">
                    <h5 class="text-2">Edit Data Kursus</h5>
                    <a href="<?= base_url('adminRoot/course/class_admin') ?>"><i class="bi bi-x-lg text-black"></i></a>
                </div>
                <hr>
                <form method="post" action="<?php echo base_url('adminRoot/course/update_course/' . $course->id); ?>" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputname1" class="form-label fw-bold">Judul Kursus
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="title" class="form-control" id="exampleInputname1" value="<?php echo $course->title; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputname1" class="form-label fw-bold">Cover Kursus
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="file" name="cover" class="form-control" id="exampleInputname1" placeholder="Judul Kursus Saya">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputname1" class="form-label fw-bold">Instruktur
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="instructor" class="form-control" id="exampleInputname1" value="<?php echo $course->instructor; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputname1" class="form-label fw-bold">Link Intro Kelas
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="intro_link" class="form-control" id="exampleInputname1" value="<?= $course->intro_link ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputname1" class="form-label fw-bold">Durasi (Menit)
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="number" value="<?= $course->intro_duration ?>" name="intro_duration" class="form-control" id="exampleInputname1" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputname1" class="form-label fw-bold">Playlist Kursus
                                    <span class="text-danger">*</span>
                                </label>
                                <select style="width: 100%" class="js-example-basic-multiple" name="playlist[]" multiple aria-required="true">
                                    <?php foreach ($playlists as $row) { ?>
                                        <option value="<?php echo $row->id; ?>" <?php if (in_array($row->id, explode(',', $detail_playlist->playlist_ids))) echo 'selected'; ?>><?php echo $row->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="exampleInputname1" class="form-label fw-bold">Kategori Kursus
                                    <span class="text-danger">*</span>
                                </label>
                                <select style="width: 100%" class="js-example-basic-multiple" name="category[]" multiple aria-required="true">
                                    <?php foreach ($categories as $row) { ?>
                                        <option value="<?php echo $row->id; ?>" <?php if (in_array($row->id, explode(',', $detail_category->category_ids))) echo 'selected'; ?>><?php echo $row->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="mentoring_link" class="form-label fw-bold">Link WA Mentoring
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" value="<?= $course->mentoring_link ?>" name="mentoring_link" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputname1" class="form-label fw-bold">Ringkasan Kursus
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea id="summernote" name="summary"> <?php echo $course->summary ?></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-blue-1">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>