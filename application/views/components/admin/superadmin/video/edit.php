<div class="space-top">
    <div class="row pb-5">
        <div class="col-md-6">
            <div class="bg-white p-5 border" data-aos="fade-up" data-aos-duration="700">
                <div class="d-flex justify-content-between py-2">
                    <h5 class="text-2">Edit Video</h5>
                    <a href="<?= base_url('adminRoot/playlist/video_admin') ?>"><i class="bi bi-x-lg text-black"></i></a>
                </div>
                <hr>
                <form method="post" action="<?php echo base_url('adminRoot/playlist/update_video/' . $video->id); ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Judul Video
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="title" class="form-control <?php echo form_error('title') ? 'is-invalid' : ''; ?>" id="title" value="<?= $video->title ?>" placeholder="Title Video" required>
                        <div id="name-error" class="invalid-feedback">
                            <?= form_error('title'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label fw-bold">Link Embed Youtube
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="link" class="form-control <?php echo form_error('link') ? 'is-invalid' : ''; ?>" id="link" value="<?= $video->link ?>" placeholder="www.example.com" required>
                        <div id="name-error" class="invalid-feedback">
                            <?= form_error('link'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label fw-bold">Durasi (Menit)
                            <span class="text-danger">*</span>
                        </label>
                        <input type="number" placeholder="3" name="duration" class="form-control  <?php echo form_error('duration') ? 'is-invalid' : ''; ?>" id="duration" value="<?= $video->duration ?>" required>
                        <div id="name-error" class="invalid-feedback">
                            <?= form_error('duration'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputname1" class="form-label fw-bold">Playlist
                            <span class="text-danger">*</span>
                        </label>
                        <select id="mySelect" class="form-select" aria-label="Default select example" aria-required="true" name="id_playlist">
                            <option value="<?= $video->playlist_id ?>" selected><?= $video->playlist_name ?></option>
                            <?php foreach ($playlists as $data) { ?>
                                <option value="<?= $data->id ?>"><?= $data->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-blue-1">Edit Data</button>
                </form>
            </div>
        </div>
    </div>