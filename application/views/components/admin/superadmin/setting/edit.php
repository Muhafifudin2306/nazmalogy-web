<div class="space-top">
    <div class="row pb-5">
        <div class="col-md-6" data-aos="zoom-in-up" data-aos-duration="700">
            <div class="bg-white p-5 border">
                <div class="d-flex justify-content-between py-2">
                    <h5 class="text-2">Edit Data Pengguna</h5>
                    <a href="<?= base_url('adminRoot/setting') ?>"><i class="bi bi-x-lg text-black"></i></a>
                </div>
                <hr>
                <form method="post" action="<?php echo base_url('adminRoot/user/update_user/' . $user->id); ?>">
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email<span class="text-danger">*</span></label>
                        <input type="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo $user->email ?>" required>
                        <div class="invalid-feedback">
                            <?= form_error('email') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Nama Lengkap<span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control <?php echo form_error('name') ? 'is-invalid' : ''; ?>" id="name" value="<?php echo $user->name ?>" required>
                        <div class="invalid-feedback">
                            <?= form_error('name') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="id_role" class="form-label fw-bold">Role<span class="text-danger">*</span></label>
                        <select class="form-select <?php echo form_error('id_role') ? 'is-invalid' : ''; ?>" id="id_role" aria-required="true" name="id_role">
                            <option value="<?= $user->id_role ?>" selected><?= $user->roles_name ?></option>
                            <option value="1">Super Admin</option>
                            <option value="2">Instruktur</option>
                            <option value="3">Murid</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('id_role') ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-blue-1">Edit Data</button>
                </form>
            </div>
        </div>
    </div>
</div>