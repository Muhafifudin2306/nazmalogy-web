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
        Dashboard Admin
    </h5>

    <div class="row">
        <div class="col-md-4 col-lg-3 mb-3">
            <div class="card-body border d-flex justify-content-between bg-white p-4 rounded-3" data-aos="fade-right" data-aos-duration="700">
                <div class="card-index">
                    <h6 class="py-1">Pengguna</h6>
                    <h2 id="user_count" class="fw-bold py-1"><?php echo $user_count; ?></h2>
                </div>
                <div class="mt-2 image-card">
                    <i class="bx bx-user p-2 bx-tada fs-5 rounded-circle green-image"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-3 mb-3">
            <div class="card-body border d-flex justify-content-between bg-white p-4 rounded-3" data-aos="fade-right" data-aos-duration="700">
                <div class="card-index">
                    <h6 class="py-1">Kelas</h6>
                    <h2 id="course_count" class="fw-bold py-1"><?php echo $course_count; ?></h2>
                </div>
                <div class="mt-2 image-card">
                    <i class="bx bx-library p-2 bx-tada fs-5 rounded-circle blue-image"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Cannot see the Analytics User When User Auth is not admin role -->
    <section id="analytics">
        <div class="mb-5 pb-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="py-4" data-aos="fade-up" data-aos-duration="500">
                        <h5 class="text-2">Statistik Pengguna</h5>
                    </div>
                    <div class="px-3">
                        <canvas id="UserChart" data-aos-duration="500"></canvas>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="py-4" data-aos="fade-up" data-aos-duration="500">
                        <h5 class="text-2">Statistik Video</h5>
                    </div>
                    <div class="px-3">
                        <canvas id="VideoChart" data-aos-duration="500"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Cannot see the Analytics User When User Auth is not admin role -->
</div>