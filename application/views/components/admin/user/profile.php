<?php
if ($this->session->flashdata('success_update') != '') {
    echo "
      <script>
      Swal.fire({
          toast: true,
          position: 'top-right',
          iconColor: 'white',
          customClass: {
              popup: 'colored-toast',
          },
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          icon: 'success',
          title: 'Update Data Sukses',
      })    
      </script>
      ";
} elseif ($this->session->flashdata('success_add') != '') {
    echo "
      <script>
      Swal.fire({
          toast: true,
          position: 'top-right',
          iconColor: 'white',
          customClass: {
              popup: 'colored-toast',
          },
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          icon: 'success',
          title: 'Tambah Data Sukses',
      })    
      </script>
      ";
} else if (form_error('email')) {
    echo "
      <script>
      Swal.fire({
          toast: true,
          position: 'top-right',
          iconColor: 'white',
          customClass: {
              popup: 'colored-toast',
          },
          showConfirmButton: false,
          timer: 6000,
          timerProgressBar: true,
          icon: 'error',
          title: 'Email telah digunakan, cari nama email lain',
      })    
      </script>
      ";
}
?>
<!--=============== Cover ===============-->
<div class="cover">
    <img class="image-cover w-100" src="<?= base_url('assets/img/background-profile.jpg') ?>" alt="">
    <div class="cover-profile">
    </div>
    <div class="d-flex">
        <div class="card-xl hero-title px-5" data-aos="fade-right" data-aos-duration="300">
            <h2 class="text-2">Halo <?= $user->name ?></h2>
            <p>Ini adalah laman profilmu. Anda dapat melihat data diri pribadimu di sini.
            </p>
            <a href="<?= site_url('userBranch/user/page') ?>"> <button class="btn btn-primary btn-blue-1 fw-bold fs-7">Dashboard Saya</button> </a>
        </div>
    </div>
</div>

<section class="information__section">
    <div class="all__information mb-5 pb-5">
        <div class="row justify-content-center p-2 gap-xl-3 flex-xl-row-reverse flex-md-row-reverse">
            <!-- Summary Information -->
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-duration="1000">
                <div class="d-flex flex-column gap-3">
                    <div class="summary__information">
                        <div class="info-card bg-white rounded border">
                            <!-- Profile Information -->
                            <div id="close__form__profile" class="info-card-content">
                                <div class="d-flex justify-content-center p- mt-5">
                                    <?php if (empty($member->image) || $member->image == "12_52923_image.png") : ?>
                                        <img width="300" height="200" class="px-5 rounded-circle" src="<?= base_url('assets/images/profile/12_52923_image.png') ?>" alt="">
                                    <?php else : ?>
                                        <img width="300" height="200" class="px-5 rounded-circle" src="<?= base_url('assets/images/profile/' . $member->image) ?>" alt="">
                                    <?php endif ?>
                                </div>
                                <div class="name-profile">
                                    <h5 class="text-2 pt-3 px-4 text-center"><?= $user->name ?></h5>
                                    <?php if (empty($member->job)) : ?>
                                        <p class="job text-center">Pekerjaan : - </p>
                                    <?php else : ?>
                                        <p class="job text-center"><?= $member->job ?> </p>
                                    <?php endif ?>

                                </div>
                                <div class="sosmed-profile px-4 py-3">
                                    <div class="d-flex gap-3 justify-content-center">
                                        <?php if (empty($member->instagram)) : ?>
                                        <?php elseif (!empty($member->instagram)) : ?>
                                            <a href="<?= $member->instagram ?>"><i class="bx bxl-instagram sosmed-logo fs-4 text-blue-1"></i></a>
                                        <?php endif ?>
                                        <?php if (empty($member->linkedin)) : ?>
                                        <?php elseif (!empty($member->linkedin)) : ?>
                                            <a href="<?= $member->linkedin ?>"><i class="bx bxl-linkedin sosmed-logo fs-4 text-blue-1"></i></a>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="summary-profile px-3 text-center">
                                    <?php if (empty($member->summary)) : ?>
                                        <p class="text-lg">Deskripsi Pengguna : -</p>
                                    <?php else : ?>
                                        <p class="text-lg"><?= $member->summary ?></p>
                                    <?php endif ?>

                                </div>
                                <div id="button__show__form__profile" onclick="openFormProfile()" class="edit-profile px-4 pb-3">
                                    <button class="btn btn-warning btn-orange-1 w-100 fs-7 fw-bold">
                                        <i class="bx bx-edit"></i>
                                        <?php if (empty($member)) : ?>
                                            Tambah Diri
                                        <?php else : ?>
                                            Edit Data Diri
                                        <?php endif ?>
                                    </button>
                                </div>
                            </div>
                            <!-- Form Edit Profile -->
                            <div id="show__form__profile" class="info-card-content p-4">
                                <?php if (empty($member)) : ?>
                                    <form action="<?= base_url('userBranch/profile/save_profile') ?>" method="post" enctype="multipart/form-data">
                                        <div class="mb-2 p-2 px-4">
                                            <input type="number" name="id_user" class="form-control" value="<?= $id_user ?>" hidden>
                                        </div>
                                        <div class="mb-2 p-2 px-4">
                                            <label for="image" class="form-label">Foto</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="mb-2 p-2 px-4">
                                            <label for="disabledTextInput" class="form-label">Nama Lengkap</label>
                                            <input type="text" name="name" class="form-control" value="<?= $user->name ?>">
                                        </div>
                                        <div class="mb-2 p-2 px-4">
                                            <label for="disabledTextInput" class="form-label">Pekerjaan</label>
                                            <input type="text" class="form-control" name="job" placeholder="Pekerjaan Saya">
                                        </div>
                                        <div class="mb-2 p-2 px-4">
                                            <label for="TextInput" class="form-label">Ringkasan Diri Saya</label>
                                            <textarea rows="5" class="form-control" name="summary" placeholder="Ringkasan Diri Anda" id="floatingTextareaDisabled"></textarea>
                                        </div>
                                        <div class="mb-2 p-2 px-4">
                                            <label for="disabledTextInput" class="form-label">Akun Instagram (link)</label>
                                            <input type="text" name="instagram" class="form-control" placeholder="@instagramsaya">
                                        </div>
                                        <div class="mb-2 p-2 px-4">
                                            <label for="disabledTextInput" class="form-label">Akun LinkedIn (link)</label>
                                            <input type="text" name="linkedin" class="form-control" placeholder="Linked-In-Saya">
                                        </div>
                                        <div class="px-4">
                                            <button class="btn btn-outline-warning btn-orange-1 w-100 fs-7 fw-bold"> Simpan Informasi
                                                Pribadi</button>
                                        </div>
                                    </form>
                                <?php else : ?>
                                    <form action="<?= base_url('userBranch/profile/update_profile/' . $id_user) ?>" method="post" enctype="multipart/form-data">
                                        <div class="mb-2 p-2 px-4">
                                            <input type="number" name="id_user" class="form-control" value="<?= $id_user ?>" hidden>
                                        </div>

                                        <div class="mb-2 p-2 px-4">
                                            <label for="image" class="form-label">Foto : <a target="_blank" href="<?= base_url('assets/images/profile/' . $member->image) ?>">Lihat File Foto</a> </label>
                                            <input class="form-control" type="file" id="image" value="<?= $member->image ?>" name="image" accept="image/*">
                                        </div>
                                        <div class="mb-2 p-2 px-4">
                                            <label for="disabledTextInput" class="form-label">Nama Lengkap</label>
                                            <input type="text" name="name" class="form-control" value="<?= $user->name ?>" required>
                                        </div>
                                        <div class="mb-2 p-2 px-4">
                                            <label for="disabledTextInput" class="form-label">Pekerjaan</label>
                                            <input type="text" class="form-control" name="job" value="<?= $member->job ?>">
                                        </div>

                                        <div class="mb-2 p-2 px-4">
                                            <label for="TextInput" class="form-label">Ringkasan Diri Saya</label>
                                            <textarea rows="5" class="form-control" name="summary" id="floatingTextareaDisabled"><?= $member->summary ?></textarea>
                                        </div>
                                        <div class="mb-2 p-2 px-4">
                                            <label for="disabledTextInput" class="form-label">Akun Instagram (link)</label>
                                            <input type="text" name="instagram" class="form-control" value="<?= $member->instagram ?>">
                                        </div>
                                        <div class="mb-2 p-2 px-4">
                                            <label for="disabledTextInput" class="form-label">Akun LinkedIn (link)</label>
                                            <input type="text" name="linkedin" class="form-control" value="<?= $member->linkedin ?>">
                                        </div>
                                        <div class="px-4">
                                            <button class="btn btn-outline-warning btn-orange-1 w-100 fs-7 fw-bold"> Edit Informasi
                                                Pribadi</button>
                                        </div>
                                    </form>
                                <?php endif ?>

                                <div class="px-4">
                                    <button id="button__close__form__profile" onclick="closeFormProfile()" class="btn btn-primary mt-2 btn-blue-1 w-100 fs-7 fw-bold">
                                        <i class="bx bx-x"></i>
                                        Batal Edit
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Personal Information -->
            <div class="col-lg-7 col-md-6 mb-3" data-aos="fade-up" data-aos-duration="1000">
                <div class="d-flex flex-column gap-3">
                    <div class="personal__information">
                        <div class="info-card bg-white border rounded">
                            <div class="info__card__head bg-light">
                                <div class="d-flex justify-content-between py-4 px-4">
                                    <h5 class="text-2 ">Akun Saya</h5>
                                    <button id="edit__button__info" onclick="openFormInfo()" class="btn btn-warning btn-orange-1 fw-bold fs-7">
                                        <i class="bx bx-edit"></i>
                                        Edit Informasi
                                    </button>
                                    <button id="show__button__info" onclick="closeFormInfo()" class="btn btn-primary btn-blue-1 fw-bold fs-7">
                                        <i class="bx bx-x text-xl"></i> Batal Edit
                                    </button>
                                </div>
                            </div>

                            <!-- Show Personal Information Form -->
                            <div id="display__info__content" class="info__card__content">
                                <h6 class="text-2 pt-4 px-4">Informasi Personal</h6>
                                <div class="personal-info-table px-4 pb-2">
                                    <div class="mb-2 p-2">
                                        <label for="disabledTextInput" class="form-label">Email Untuk Login</label>
                                        <input type="text" class="form-control" value="<?= $user->email ?>" s disabled>
                                    </div>
                                </div>
                                <div class="px-4">
                                    <hr class="dash-info">
                                </div>
                                <h6 class="text-2 pt-2 px-4">Informasi Alamat</h6>
                                <div class="personal-info-table px-4 pb-4 p-2">
                                    <div class="mb-2 p-2">
                                        <label for="disabledTextInput" class="form-label">Alamat Saya</label>
                                        <?php if (empty($member)) : ?>
                                            <textarea rows="4" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" disabled>Belum Terdata</textarea>
                                        <?php else : ?>
                                            <textarea rows="4" class="form-control" placeholder="Belum Terdata" id="floatingTextarea" disabled><?= $member->address ?></textarea>
                                        <?php endif ?>
                                    </div>
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <div class="mb-2 w-50 p-2">
                                            <label for="disabledTextInput" class="form-label">Kecamatan</label>
                                            <?php if (empty($member)) : ?>
                                                <input type="text" class="form-control" value="Belum Terdata" disabled>
                                            <?php else : ?>
                                                <input type="text" class="form-control" value="<?= $member->district ?>" disabled>
                                            <?php endif ?>

                                        </div>
                                        <div class="mb-2 w-50 p-2">
                                            <label for="disabledTextInput" class="form-label">Kabupaten/Kota</label>
                                            <?php if (empty($member)) : ?>
                                                <input type="text" class="form-control" value="Belum Terdata" disabled>
                                            <?php else : ?>
                                                <input type="text" class="form-control" value="<?= $member->region ?>" disabled>
                                            <?php endif ?>
                                        </div>
                                        <div class="mb-2 w-50 p-2">
                                            <label for="disabledTextInput" class="form-label">Provinsi</label>
                                            <?php if (empty($member)) : ?>
                                                <input type="text" class="form-control" value="Belum Terdata" disabled>
                                            <?php else : ?>
                                                <input type="text" class="form-control" value="<?= $member->province ?>" disabled>
                                            <?php endif ?>
                                        </div>
                                        <div class="mb-2 w-50 p-2">
                                            <label for="disabledTextInput" class="form-label">Kode Pos</label>
                                            <?php if (empty($member)) : ?>
                                                <input type="text" class="form-control" value="Belum Terdata" disabled>
                                            <?php else : ?>
                                                <input type="text" class="form-control" value="<?= $member->posCode ?>" disabled>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Edit Personal Information Form -->
                            <div id="edit__info__content" class="info__card__content">
                                <div class="personal-info-table px-4 py-4">
                                    <?php if (empty($member)) : ?>
                                        <form action="<?= site_url('userBranch/profile/save_address') ?>" method="post">
                                            <h6 class="text-2">Informasi Personal</h6>
                                            <div class="mb-2 p-2">
                                                <label for="disabledTextInput" class="form-label">Email Untuk Login</label>
                                                <input type="text" class="form-control" name="email" value="<?= $email ?>">
                                            </div>
                                            <div class="px-1 py-2">
                                                <hr class="dash-info">
                                            </div>
                                            <h6 class="text-2">Informasi Alamat</h6>
                                            <div class="mb-2 p-2 pt-3">
                                                <label for="TextInput" class="form-label">Alamat Saya</label>
                                                <textarea rows="4" class="form-control" name="address" placeholder="Alamat saya" required></textarea>
                                            </div>
                                            <div class="d-flex justify-content-between flex-wrap pb-2">
                                                <div class="mb-2 w-50 p-2">
                                                    <label for="TextInput" class="form-label">Kecamatan</label>
                                                    <input type="text" class="form-control" name="district" placeholder="Kecamatan Saya" required>
                                                </div>
                                                <div class="mb-2 w-50 p-2">
                                                    <label for="TextInput" class="form-label">Kabupaten/Kota</label>
                                                    <input type="text" class="form-control" name="region" placeholder="Kabupaten/Kota Saya" required>
                                                </div>
                                                <div class="mb-2 w-50 p-2">
                                                    <label for="TextInput" class="form-label">Provinsi</label>
                                                    <input type="text" class="form-control" name="province" placeholder="Provinsi Saya" required>
                                                </div>
                                                <div class="mb-2 w-50 p-2">
                                                    <label for="TextInput" class="form-label">Kode Pos</label>
                                                    <input type="text" class="form-control" name="posCode" placeholder="Kode Pos Saya" required>
                                                </div>
                                            </div>
                                            <div class="mb-2 p-2 px-4">
                                                <input type="number" name="id_user" class="form-control" value="<?= $id_user ?>" hidden>
                                            </div>
                                            <button type="submit" class="btn btn-outline-warning btn-orange-1 w-100 fs-7 fw-bold"> Simpan Informasi
                                                Pribadi</button>
                                        </form>
                                    <?php else : ?>
                                        <form action="<?= site_url('userBranch/profile/update_address/' . $id_user) ?>" method="post" enctype="multipart/form-data">
                                            <h6 class="text-2">Informasi Personal</h6>
                                            <div class="mb-2 p-2">
                                                <label for="disabledTextInput" class="form-label">Email Untuk Login</label>
                                                <input type="text" class="form-control" name="email" value="<?= $user->email ?>">
                                            </div>
                                            <div class="px-1 py-2">
                                                <hr class="dash-info">
                                            </div>
                                            <h6 class="text-2">Informasi Alamat</h6>
                                            <div class="mb-2 p-2 pt-3">
                                                <label for="TextInput" class="form-label">Alamat Saya</label>
                                                <textarea rows="4" class="form-control" name="address" value="<?= $member->address ?>"><?= $member->address ?></textarea>
                                            </div>
                                            <div class="d-flex justify-content-between flex-wrap pb-2">
                                                <div class="mb-2 w-50 p-2">
                                                    <label for="TextInput" class="form-label">Kecamatan</label>
                                                    <input type="text" class="form-control" name="district" value="<?= $member->district ?>" placeholder="Kecamatan Saya">
                                                </div>
                                                <div class="mb-2 w-50 p-2">
                                                    <label for="TextInput" class="form-label">Kabupaten/Kota</label>
                                                    <input type="text" class="form-control" name="region" value="<?= $member->region ?>" placeholder="Kabupaten/Kota Saya">
                                                </div>
                                                <div class="mb-2 w-50 p-2">
                                                    <label for="TextInput" class="form-label">Provinsi</label>
                                                    <input type="text" class="form-control" name="province" value="<?= $member->province ?>" placeholder="Provinsi Saya">
                                                </div>
                                                <div class="mb-2 w-50 p-2">
                                                    <label for="TextInput" class="form-label">Kode Pos</label>
                                                    <input type="text" class="form-control" name="posCode" value="<?= $member->posCode ?>" placeholder="Kode Pos Saya">
                                                </div>
                                            </div>
                                            <div class="mb-2 p-2 px-4">
                                                <input type="number" name="id_user" class="form-control" value="<?= $id_user ?>" hidden>
                                            </div>
                                            <button class="btn btn-outline-warning btn-orange-1 w-100 fs-7 fw-bold"> Simpan Informasi
                                                Pribadi</button>
                                        </form>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>