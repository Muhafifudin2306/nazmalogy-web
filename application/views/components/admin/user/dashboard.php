<?php if ($this->session->flashdata('success_login') != '') { ?>
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
            title: 'Login Sukses',
        })
    </script>
<?php } ?>

<!--=============== Dashboard Content ===============-->
<div class="space-top">

    <h5 class="ft-7 mb-3 py-2 text-2" data-aos="fade-right" data-aos-duration="300">
        Dashboard Pengguna
    </h5>

    <div class="row">
        <div class="col-md-4 col-lg-3 mb-3">
            <div class="card-body border d-flex justify-content-between bg-white p-4 rounded-3" data-aos="fade-right" data-aos-duration="700">
                <div class="card-index">
                    <h6 class="py-1">Kelas</h6>
                    <h2 id="running_course" class="fw-bold py-1"><?php echo $course_count_user; ?></h2>
                </div>
                <div class="mt-2 image-card">
                    <i class="bx bx-library p-2 bx-tada fs-5 rounded-circle green-image"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 mb-3">
            <div class="card-body border d-flex justify-content-between bg-white p-4 rounded-3" data-aos="fade-right" data-aos-duration="700">
                <div class="card-index">
                    <h6 class="py-1">Kelas Selesai</h6>
                    <h2 id="finish_course" class="fw-bold py-1"><?php echo $course_finish; ?></h2>
                </div>
                <div class="mt-2 image-card">
                    <i class="bx bx-card p-2 bx-tada fs-5 rounded-circle blue-image"></i>
                </div>
            </div>
        </div>
    </div>


    <?php if (!empty($courses)) : ?>
        <div class="col-md-6 pb-5 mb-5">
            <?php if ($id_role != '1') : ?>
                <section class="splide" aria-label="Splide Basic HTML Example">
                    <div class="py-4" data-aos="fade-up" data-aos-duration="500">
                        <h5 class="text-2">Kelas Berjalan</h5>
                    </div>
                    <div class="splide__track" data-aos="fade-up" data-aos-duration="500">
                        <ul class="splide__list">
                            <?php foreach ($courses as $course) : ?>
                                <li class="splide__slide">
                                    <div class="gallery-card">
                                        <div class="card-gallery px-4">
                                            <div class="d-flex flex-column">
                                                <div class="course-image">
                                                    <img src="<?= base_url('assets/images/admin/course/' . $course->cover) ?>">
                                                    <div class="marker"></div>
                                                </div>
                                                <div class="gallery-content bg-white p-4 border rounded-bottom">
                                                    <h6 class="ft-7 p-2 text-center"><?= $course->title ?></h6>
                                                    <div class="">
                                                        <?php if (!empty($course->progress)) : ?>
                                                            <?php
                                                            $progress = $course->progress;
                                                            $width = ($progress >= 100) ? 100 : $progress; // Menghindari lebar yang melebihi 100%

                                                            ?>
                                                            <div class="progress" style="height: 10px;">
                                                                <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: <?= $width ?>%;" aria-valuenow="<?= $width ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <p class="text-lg text-center py-2"><?= round($progress) ?>%</p>
                                                        <?php else : ?>
                                                            <div class="progress" style="height: 10px;">
                                                                <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <p class="text-lg text-center py-2">0%</p>
                                                        <?php endif ?>
                                                    </div>

                                                    <a href="<?= base_url('userBranch/classpath/detail_course/' . $course->id) ?>">
                                                        <div class="course-detail">
                                                            <button class="btn btn-primary btn-orange-1 fw-bold fs-7 w-100 ft-7">Lanjutkan
                                                                Kelas</button>
                                                        </div>
                                                    </a>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </section>
            <?php endif; ?>
        </div>

        <!-- Footer -->
        <?php include(APPPATH . 'views/layout/admin/footer.php'); ?>
        <!-- Footer -->

    <?php endif; ?>
</div>