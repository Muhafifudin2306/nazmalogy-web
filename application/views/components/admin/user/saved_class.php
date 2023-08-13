<?php
if ($this->session->flashdata('success_delete') != '') {
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
          title: 'Kelas Terhapus',
      })    
      </script>
      ";
}
?>

<div class="space-top">
    <?php if (empty($course)) : ?>
        <div class="d-flex justify-content-center">
            <lottie-player src="https://assets7.lottiefiles.com/temp/lf20_Celp8h.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
        </div>
        <h5 class="text-2 text-center">Kursus Tersimpan Kosong</h5>
    <?php else : ?>

        <!-- =============== Kelas Tersimpan ================= -->
        <div class="mt-5 mb-1 p-2 d-flex justify-content-lg-start" data-aos="fade-up" data-aos-duration="700">
            <h5 class="text-2">Kursus Tersimpan</h5>
        </div>

        <!-- Class List All Component -->
        <div class="d-flex">

            <!-- Class List -->
            <div class="w-100">
                <div class="row card-groups">
                    <?php
                    $no = 1;
                    foreach ($course as $data) { ?>
                        <?php if ($data->has_relation) : ?>
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card-class" data-aos="fade-up" data-aos-duration="700">
                                    <div class="d-flex flex-column rounded border">
                                        <div class="class-image">
                                            <img src="<?= base_url('assets/images/admin/course/' . $data->cover) ?>">
                                            <div class="marker"></div>
                                            <form action="<?= site_url('userBranch/classpath/delete_course') ?>" method="post" id="form-id-<?= $no++ ?>" hidden>
                                                <input type="text" name="id_user" value="<?php echo $id_user ?>">
                                                <input type="text" name="id_course" value="<?php echo $data->id ?>">
                                            </form>
                                            <div id="<?= $no++ ?>" style="cursor: pointer;" class="like-bottom my-auto mt-auto">
                                                <i class="position-absolute bx bxs-bookmark like_icon bg-white border text-orange-2 bg-danger">
                                                </i>
                                            </div>
                                        </div>
                                        <div class="p-2 pb-0 d-flex gap-1 flex-wrap">
                                            <?php
                                            $category = explode(',', $data->category);
                                            for ($i = 0; $i < min(count($category), 2); $i++) {
                                                echo "<span class='py-1 px-3 bg-orange-2 rounded text-white fs-9'>" . $category[$i] . "</span>";
                                            }
                                            ?>
                                        </div>
                                        <div class="class-title">
                                            <h6 class="fw-bold p-2">
                                                <?php
                                                $title = $data->title;
                                                if (strlen($title) > 80) {
                                                    $title = substr($title, 0, 80) . '...';
                                                }
                                                echo $title;
                                                ?>
                                            </h6>
                                        </div>
                                        <div class="class-action">
                                            <div class="d-flex justify-content-between">
                                                <div class="detail-bottom">
                                                    <?php if ($data->button_label == 'Lanjutkan') : ?>
                                                        <a href="<?= site_url('userBranch/classpath/detail_course/' . $data->id) ?>">
                                                            <button class='btn btn-primary btn-blue-2 fw-bold fs-7'><i class='bi bi-play-fill px-1'></i>Lanjutkan</button>
                                                        </a>
                                                    <?php else : ?>
                                                        <a href="<?= site_url('userBranch/classpath/detail_course/' . $data->id) ?>">
                                                            <button class='btn btn-primary btn-blue-1 fw-bold fs-7'><i class="bi bi-plus"></i> Ikuti</button>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="spacer py-5"></div>
    <?php endif ?>
</div>