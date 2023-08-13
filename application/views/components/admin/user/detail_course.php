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
          title: 'Kelas Dimulai',
      })    
      </script>
      ";
} elseif ($this->session->flashdata('feedback') != '') {
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
        title: 'Feedback Terkirim',
    })    
    </script>
    ";
}
?>

<!--=============== Course Content ===============-->
<div class="space-top">
    <div class="d-flex justify-content-between align-items-center">
        <div class="title">
            <h3 class="text-2"><?= $course->title ?></h3>
            <p class="gray-text"><?= $course->instructor ?></p>
        </div>
        <a class="fw-bold gap-3 fs-5 d-none d-md-inline text-blue-1" href="<?= site_url('userBranch/classpath/listClass') ?>">
            <i class="bi bi-x-lg"></i>
        </a>
    </div>

    <div class="row pt-2">
        <div class="col-lg-7">
            <div class="video-panel">
                <div class="bg-white rounded border">
                    <div id="player"></div>
                    <div id="progressContainer" class="p-3 pb-1">
                        <div class="bg-secondary">
                            <div id="progressBar"></div>
                        </div>

                        <div id="progressText">00:00 / <?= $course->intro_duration ?>:00</div>
                    </div>
                    <div class="video-player d-flex justify-content-between p-3 pt-2">
                        <button title="Kualitas Terbaik Di Jaringan Saya" id="qualityButton" onclick="changeVideoQuality()" class="fw-bold btn btn-warning btn-orange-1">
                            HD
                        </button>
                        <div class="button-control d-flex gap-2">
                            <button id="speedDownButton" class="btn btn-primary btn-blue-1" title="mundur 5 detik">
                                <i class="bi bi-skip-start-fill"></i>
                            </button>
                            <button id="playPauseButton" onclick="togglePlayPause()" class="btn btn-warning btn-orange-1" title="Play/Stop">
                                <i class="bi bi-play-fill"></i>
                            </button>
                            <button id="speedUpButton" class="btn btn-primary btn-blue-1" title="maju 5 detik">
                                <i class="bi bi-skip-end-fill"></i>
                            </button>
                        </div>
                        <button id="fullscreenButton" onclick="toggleFullscreen()" class="btn btn-warning btn-orange-1" title="Fullscreen">
                            <i class="bi bi-fullscreen"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="tab-panel pt-2 mt-3 mb-5 bg-white p-2 border">

                <div class="d-flex gap-3 flex-wrap tab-hover">
                    <div id="detail1" class="p-3 tab-up" onclick="openCity('detail')" style="border-bottom:  2px solid #2c2f75;">
                        <span class="text-2">Pengantar</span>
                    </div>
                    <?php if ($has_relation) : ?>
                        <div id="profil1" class="p-3 tab-up" onclick="openCity('profil')">
                            <span class="text-2">Feedback</span>
                        </div>
                    <?php endif ?>
                    <?php if ($progress == 100) : ?>
                        <div id="mentoring1" class="p-3 tab-up" onclick="openCity('mentoring')">
                            <span class="text-2">Sertifikat</span>
                        </div>
                    <?php endif ?>
                </div>

                <div id="detail" class="city bg-white p-3">
                    <p><?= $course->summary ?></p>
                </div>
                <div id="profil" class="city bg-white p-3" style="display:none">
                    <?php if ($has_relation) : ?>
                        <?php if (empty($feedback->rating)) : ?>
                            <form action="<?= site_url('userBranch/classpath/save_feedback') ?>" method="post">
                                <input type="text" name="id_user" value="<?php echo $id_user ?>" hidden>
                                <input type="text" name="id_course" value="<?php echo $course->id ?>" hidden>
                                <div class="mb-3 p-2">
                                    <label for="rating" class="text-lg fw-bold form-label">Berikan Rating</label>

                                    <input name="rating" class="rating" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)" step="0.5" style="--value:0" type="range" value="0">
                                </div>
                                <div class="mb-3 p-2">
                                    <label for="feedback" class="text-lg fw-bold form-label">Berikan Masukan dan Saran</label>
                                    <textarea rows="4" name="feedback" class="form-control" placeholder="Leave a comment here"></textarea>
                                </div>
                                <button class="btn btn-primary btn-blue-1 fs-7 fw-bold w-100"> Kirim Feedback</button>
                            </form>
                        <?php elseif (!empty($feedback->rating)) : ?>
                            <div class="feedback p-2 p-md-3 border">
                                <div class="d-flex justify-content-between py-2">
                                    <h6 class="fw-bold">Tanggapan Saya </h6>
                                    <div class="action-btn">
                                        <button class="btn btn-primary btn-blue-1 fw-bold fs-7 p-1 px-3 text-white text-lg" data-bs-toggle="modal" data-bs-target="#FeedbackModal"> <i class="bi bi-pencil-square"></i> Edit</button>
                                    </div>
                                </div>

                                <input name="rating" class="rating my-3 fs-6" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)" step="0.5" style="--value:<?php echo $feedback->rating ?>" type="range" value="0" disabled>
                                <p class="py-3"><?php echo $feedback->feedback ?></p>
                            </div>

                        <?php endif ?>
                    <?php endif ?>
                </div>
                <div id="mentoring" class="city bg-white p-3" style="display:none">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
                    <div class="list-course pt-1">
                        <div class="bg-white rounded d-flex gap-2 p-3 border tab-hover" id="printButton">
                            <div class="course-progress w-100 d-flex justify-content-between block-center">
                                <div class=" icon-progress icon-center">
                                    <i class="text-center bi bi-file-earmark-medical fs-4 text-blue-1"></i>

                                    <span class="text-blue-1 fw-bold fs-7 mx-2"> Sertifikat Penyelesaikan Kursus <?= $course->title ?></span>

                                </div>
                                <div class="time-course w-15">
                                    <i class="bi bi-arrow-down-circle text-blue-1 fs-4 fw-bold"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        // Menambahkan event listener ke tombol cetak
                        document.getElementById('printButton').addEventListener('click', function() {
                            // Mengambil gambar dari URL dan mengubahnya menjadi data URL
                            function getBase64Image(url, callback) {
                                var img = new Image();
                                img.crossOrigin = 'Anonymous';
                                img.onload = function() {
                                    var canvas = document.createElement('canvas');
                                    canvas.width = this.width;
                                    canvas.height = this.height;
                                    var ctx = canvas.getContext('2d');
                                    ctx.drawImage(this, 0, 0);
                                    var dataURL = canvas.toDataURL('image/jpeg');
                                    callback(dataURL);
                                };
                                img.src = url;
                            }

                            getBase64Image('<?= base_url('assets/certificate/format_sertifikat.png') ?>', function(dataURL) {
                                var docDefinition = {
                                    pageOrientation: 'landscape',
                                    pageSize: 'A4',
                                    background: {
                                        image: dataURL,
                                        width: 845,
                                        height: 600,
                                        absolutePosition: {
                                            x: 0,
                                            y: 0
                                        }
                                    },
                                    content: [{
                                            text: '',
                                            fontSize: 40,
                                            bold: true,
                                            alignment: 'center',
                                            margin: [85, 85, 85, 85] // Atur margin atas untuk memposisikan teks
                                        },
                                        {
                                            text: '<?= $id_name ?>',
                                            fontSize: 40,
                                            bold: true,
                                            alignment: 'center',
                                            margin: [30, 30, 30, 30] // Atur margin atas untuk memposisikan teks
                                        },
                                        {
                                            text: '<?= $course->title ?>',
                                            fontSize: 18,
                                            alignment: 'center',
                                            margin: [0, 20, 0, 0] // Atur margin atas untuk memposisikan teks
                                        },
                                    ],
                                };

                                pdfMake.createPdf(docDefinition).download('Sertifikat_<?= $course->title ?>.pdf');
                            });
                        });
                    </script>
                </div>
            </div>
            <!-- 2 -->
        </div>
        <div class="col-lg-5">
            <div class="right-content mb-5 pb-5">
                <?php if (!$has_relation) : ?>
                    <div class="alert alert-warning fw-bold" role="alert">
                        Anda harus menonton video perkenalan kelas untuk membuka kelas lainnya!!
                    </div>
                    <h6 class="text-2 pt-3">Intro Kelas</h6>
                    <div class="list-course pt-1">
                        <div class="bg-white rounded d-flex justify-content-between p-3 border w-100">
                            <div class="playVideo d-flex">
                                <div class="icon-center">
                                    <i id="icon-<?= $course->id ?>" class="text-center bx bx-pause-circle text-orange-1 fs-4 "></i>
                                </div>
                                <div class="course-progress">
                                    <a href="<?= site_url('userBranch/classpath/detail_course/' . $course->id)  ?>" id="link-<?= $course->id ?>" class="video-ready text-orange-1 mx-2 fs-7 fw-bold">Intro Kelas</a>
                                </div>
                            </div>
                            <div class="time-course fs-7 fw-bold" id="duration">
                                <?= $course->intro_duration ?>min
                            </div>
                        </div>
                    </div>
                    <?php
                    $no = 1;
                    foreach ($playlists as $playlist) { ?>
                        <h6 class="text-2 pt-3"><?php echo $playlist->name; ?></h6>
                        <?php foreach ($playlist->videos as $video) { ?>
                            <div class="list-course pt-1 d-flex flex-column gap-3 kelas">
                                <div class="bg-white rounded d-flex justify-content-between p-3 border w-100">
                                    <div class="playVideo d-flex">
                                        <div class="icon-center">
                                            <i id="ready_icon" class="text-center bi bi-file-lock2 fs-5 text-secondary"></i>
                                        </div>
                                        <div class="course-progress">
                                            <a href="#" class="video-ready mx-2 fs-7 fw-bold text-secondary"><?= $video->title  ?></a>
                                        </div>
                                    </div>
                                    <div class="time-course fs-7 fw-bold">
                                        <?= $video->duration ?>min
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    <?php } ?>
                <?php else : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-2 mb-4">Perkembangan Belajar Anda</h6>
                            <div class="progress orange">
                                <?php
                                $width = $progress > 100 ? 100 : (int)($progress / 10) * 10; // Menghitung lebar progress bar

                                if ($width === 0) {
                                    $width = 0; // Atur lebar minimal jika progress = 0
                                }
                                ?>

                                <div class="progress-bar" id="progress" style="width:<?php echo $width; ?>%;background:#f7810e;">
                                </div>
                            </div>
                            <div class="progress-value fw-bold text-warning text-center"><span><?= round($progress)  ?></span>%</div>
                        </div>
                    </div>
                    <?php if (!$has_relation) : ?>
                        <h6 class="text-2 pt-3">Intro Kelas</h6>
                        <div class="list-course pt-1 d-flex flex-column gap-3 kelas">
                            <div class="bg-white rounded d-flex gap-2 p-3 border">
                                <div class="course-progress w-100 d-flex justify-content-between block-center">
                                    <div class="icon-progress icon-center">
                                        <i id="icon-<?= $course->id ?>" class="text-center bx bx-pause-circle fs-4 text-orange-1"></i>
                                        <a href="<?= site_url('userBranch/classpath/detail_course/' . $course->id)  ?>" id="link-<?= $course->id ?>" class="video-ready text-orange-1 mx-2 fs-7 fw-bold">Intro Kelas</a>
                                    </div>
                                    <div class="time-course fw-bold fs-7" id="duration">
                                        <?= $course->intro_duration ?>min
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <h6 class="text-2 pt-3">Intro Kelas</h6>
                        <div class="list-course pt-1 d-flex flex-column gap-3 kelas">
                            <div class="bg-white rounded d-flex gap-2 p-3 border">
                                <div class="course-progress w-100 d-flex justify-content-between block-center">
                                    <div class=" icon-progress icon-center">
                                        <i id="icon-<?= $course->id ?>" class="text-center bi bi-check2-circle fs-4 text-success"></i>
                                        <a href="<?= site_url('userBranch/classpath/detail_course/' . $course->id)  ?>" id="link-<?= $course->id ?>" class="video-ready text-success fw-bold fs-7 mx-2">Intro Kelas</a>
                                    </div>
                                    <div class="time-course w-15">
                                        <i class="bi bi-check-all text-success fs-4 fw-bold"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php
                    $no = 1;
                    foreach ($playlists as $playlist) { ?>
                        <h6 class="text-2 pt-3"><?php echo $playlist->name; ?></h6>
                        <?php foreach ($playlist->videos as $video) { ?>
                            <div class="list-course pt-1">
                                <div class="bg-white gap-2 rounded d-flex justify-content-between p-3 w-100 rounded border">
                                    <div class="playVideo d-flex">
                                        <?php if ($video->status == 1) : ?>
                                            <div class="icon-progress icon-center">
                                                <i id="ready_icon" class="text-center bi bi-check2-circle fs-4 text-success mx-2"></i>
                                            </div>
                                        <?php else : ?>
                                            <div class="icon-progress w-10 icon-center">
                                                <i id="ready_icon" class="text-center bx bx-pause-circle fs-4 text-orange-1 ready-icon mx-2"></i>
                                            </div>
                                        <?php endif ?>
                                        <div class="course-progress block-center">
                                            <?php if ($video->status == 1) : ?>
                                                <a href="<?= site_url('userBranch/classpath/detail_video_course/' . $course->id . "/" . $video->id)  ?>" class="video-ready text-success fs-7 fw-bold"><?= $video->title  ?></a>
                                            <?php else : ?>
                                                <a href="<?= site_url('userBranch/classpath/detail_video_course/' . $course->id . "/" . $video->id)  ?>" class="video-ready text-orange-1 fs-7 fw-bold"><?= $video->title  ?></a>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="time-course fw-bold fs-7 d-flex justify-content-end">
                                        <?php if ($video->status == 1) : ?>
                                            <i class="bi bi-check-all text-success fs-4 fw-bold"></i>
                                        <?php else : ?>
                                            <?= $video->duration ?>min
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Send Form -->
<?php if (!$has_relation) : ?>
    <form action="<?= site_url('userBranch/classpath/user_has_course') ?>" method="post" id="form-id-course" hidden>
        <input type="text" name="id_user" value="<?php echo $id_user ?>">
        <input type="text" name="id_course" value="<?php echo $course->id ?>">
        <input type="text" name="status" value="1">
    </form>
<?php endif ?>