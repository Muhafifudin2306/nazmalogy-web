<?php
if ($this->session->flashdata('success') != '') {
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
          title: 'Email Terkirim',
      })    
      </script>
      ";
} else if ($this->session->flashdata('error') != '') {
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
          title: 'Email Salah',
      })    
      </script>
      ";
} else if ($this->session->flashdata('end_session') != '') {
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
        icon: 'error',
        title: 'Akses Diblokir',
    })    
    </script>
    ";
}
?>
<!-- section 1 - Hero Section -->
<div class="d-flex">
    <div class="col-lg-8 col-12">
        <div class="d-grid justify-content-center align-items-center left-side-bg" style="background-image: url('<?= base_url('assets/img/bg_blank.png') ?>')">
            <div class="container col-10">
                <div class="py-5">
                    <div class="hero-content py-5" data-aos="fade-right" data-aos-duration="1500">
                        <h1 class="fw-bold fs-xl-1 lh-base text-white text-2">
                            Bersama <span class="text-orange-2">NaZMaLogy </span>
                            <br>
                            <span>Berinovasi Mewujudkan Mimpi</span>
                            <img width="50" src="<?= base_url('assets/img/comp1_new.png') ?>" alt="">
                        </h1>
                        <p class="text-white fs-6 w-75">
                            Ubah Impian Menjadi Kenyataan dengan Platform Pembelajaran Interaktif dan Inovatif.
                        </p>

                        <div class="w-25 bg-white rounded my-4 bg-ocean" style="height: 7px;"></div>
                        <a href="<?= site_url('front/listClass') ?>">
                            <button class="btn btn-warning btn-orange-1 mt-2 px-5 py-1 fw-bold">
                                <i class="bi bi-play-fill text-blue-1 fs-5"></i>
                                <span class="fw-bold ml-4 text-2"> Ayo Mulai</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 d-none d-lg-inline" style="padding-top:5rem">
        <div class="w-100" style="background-image: url('<?= base_url('assets/img/bg_side.png') ?>');background-size: cover;height:100%">
        </div>
    </div>
</div>
<!-- section 1 - Hero Section -->


<!-- section 2 - Partnership -->
<section id="partner-ship" class="bg-light-primary py-5">
    <div class="container col-md-10">
        <div class="title p-4 mt-3" data-aos="zoom-in" data-aos-duration="1000">
            <h2 class="fs-2 fw-bold text-center text-2">Mitra Kami</h2>
        </div>
        <div class="partner-group flex-wrap d-flex gap-3 gap-md-5 justify-content-between mt-1 mb-5 justify-content-md-center" data-aos="zoom-in" data-aos-duration="1000">
            <a class="d-flex align-items-center" href="https://sebangku.co.id/" target="_blank">
                <img width="140" class="object-fit-contain" src="<?= base_url('assets/images/landingpage/sebangku_logo_1.png') ?>" alt="">
            </a>
            <a class="d-flex align-items-center" href="https://www.selingkar.com/" target="_blank">
                <img width="140" class="object-fit-contain" src="<?= base_url('assets/images/landingpage/selingkar_logo.png') ?>" alt="" target="_blank">
                <a class="d-flex align-items-center" href="https://fitinline.com/" target="_blank">
                    <img width="140" class="object-fit-contain" src="<?= base_url('assets/images/landingpage/logo-fitinline.png') ?>" alt="">
                </a>
                <a class="d-flex align-items-center" href="https://www.markplusinstitute.com/" target="_blank">
                    <img width="140" class="object-fit-contain" src="<?= base_url('assets/images/landingpage/ukm_indonesia_2.jpg') ?>" alt="">
                </a>
                <a class="d-flex align-items-center" href="https://home.amikom.ac.id/" target="_blank">
                    <img width="145" class="object-fit-contain" src="<?= base_url('assets/images/landingpage/logo_amikom.jpg') ?>" alt="">
                </a>
                <a class="d-flex align-items-center" href="https://www.facebook.com/AseanCoaching/" target="_blank">
                    <img width="140" class="object-fit-contain" src="<?= base_url('assets/images/landingpage/ukm_indonesia_blank.png') ?>" alt="">
                </a>
                <a class="d-flex align-items-center" href="https://umkmnaikkelas.com/" target="_blank">
                    <img width="140" class="object-fit-contain" src="<?= base_url('assets/images/landingpage/umkmnaikkelas.jpg') ?>" alt="">
                </a>
                <a class="d-flex align-items-center" href="https://www.ukmindonesia.id/" target="_blank">
                    <img width="145" class="object-fit-contain" src="<?= base_url('assets/images/landingpage/logoukmindonesia.jpg') ?>" alt="">
                </a>
        </div>
    </div>
</section>
<!-- section 2 - Partnership -->


<!-- section 3 - Benefit -->
<section id="benefit" class="bg-blue-1 py-5">
    <div class="container">
        <div class="py-3">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-inline" data-aos="zoom-in" data-aos-duration="1500">
                    <img src="<?= base_url('assets/images/landingpage/benefit_image.png') ?>" alt="benefit" class="w-100 p-4">
                </div>
                <div class="col-lg-7" data-aos="zoom-in" data-aos-duration="1500">
                    <div class="my-lg-4">
                        <h2 class="fw-bold mb-5 text-white text-2">Yang Bisa Kami Berikan</h2>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="d-flex flex-column gap-2 bg-white p-3 rounded-2 w-100">

                                    <div class="mx-auto">
                                        <i class="bi bi-play-circle-fill text-orange-2 fs-1"></i>
                                    </div>
                                    <div class="benefit-content">
                                        <h6 class="text-blue-1 text-2 text-center">Video Learning</h6>
                                        <p class=" text-center fs-6">Pembelajaran Melalui Video</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="d-flex flex-column gap-2 bg-white p-3 rounded-2 w-100">

                                    <div class="mx-auto">
                                        <i class="bi bi-clock-history text-orange-2 fs-1"></i>
                                    </div>
                                    <div class="benefit-content">
                                        <h6 class="text-blue-1 text-2 text-center">Akses Tiap Saat</h6>
                                        <p class=" text-center fs-6">Akses belajar 24 jam setiap hari</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="d-flex flex-column gap-2 bg-white p-3 rounded-2 w-100">

                                    <div class="mx-auto">
                                        <i class="bi bi-people-fill text-orange-2 fs-1"></i>
                                    </div>
                                    <div class="benefit-content">
                                        <h6 class="text-blue-1 text-2 text-center">Mentoring</h6>
                                        <p class=" text-center fs-6">Forum diskusi bersama mentor</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section 3 - Benefit -->


<!-- section 4 - testimoni -->
<!-- ================== Testiomni =================== -->
<section id="testimoni" class="bg-orange-2 py-5">
    <div class="container">
        <div class="py-5">
            <h2 class="fw-bold pb-4 text-center text-white text-2" data-aos="zoom-in-up" data-aos-duration="1500">Testimoni</h2>
            <div class="row" data-aos="zoom-in-up" data-aos-duration="2000">
                <?php foreach ($testimonials as $item) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card-testimoni mb-3">
                            <div class="card-header p-4 bg-white border rounded-top">
                                <div class="d-flex">
                                    <div class="w-25">
                                        <img class="image-testimoni rounded-circle object-fit-cover" width="70" height="70" src="<?= base_url('assets/images/admin/testimony/' . $item->image) ?>" alt="">
                                    </div>
                                    <div class="w-75 d-grid" style="place-items: center start;">
                                        <h5 class="fw-bold px-2"><?= $item->author ?></h5>
                                        <h6 class="px-2"><?= $item->job ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content p-4 bg-white border border-top-0 rounded-bottom">
                                <p><?= $item->message ?></p>
                                <div class="p-2"></div>
                                <div class="star-group py-3 text-center">
                                    <?php for ($i = 0; $i < $item->rating; $i++) : ?>
                                        <i class="bi bi-star-fill fs-3 text-blue-1 <?= $i ?>"></i>
                                    <?php endfor ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<!-- section 4 - testimoni -->


<!-- section 5 - Subcribe -->
<section id="subscribe" class="py-5">
    <div class="container">
        <div class="email-area w-100 mt-md-3 py-md-5 pb-5" data-aos="zoom-in-up" data-aos-duration="1500">
            <div class="text-center">
                <div class="email-logo ">
                    <i class="bi bi-envelope text-warning py-3 px-4 rounded-circle bg-blue-1 fs-1"></i>
                </div>
                <div class="card-email mx-auto bg-blue-1 pt-5 p-4 rounded" style="margin-top:-30px">
                    <h3 class="fw-bold py-2 text-center text-white text-2">Mari Tetap Terkoneksi</h3>
                    <h6 class="text-white">bergabunglah dengan email kami untuk mendapat kabar spesial</h6>
                    <div class="form-email py-3">
                        <form action="<?= site_url('front/save_subscribe') ?>" method="post">
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="example@example.com">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <button type="submit" class="btn btn-warning w-100 btn-orange-1 fw-bold">Subscibe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section 5 - Subcribe -->