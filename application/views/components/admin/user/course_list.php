<?php
if ($this->session->flashdata('success_add') != '') {
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
          title: 'Kelas Tersimpan',
      })    
      </script>
      ";
}
?>
<!--=============== Course Content ===============-->
<div class="space-top">

    <!-- =============== Kelas Tersedia ================= -->
    <div class="mt-5 mb-1 p-2 d-flex justify-content-lg-start" data-aos="fade-up" data-aos-duration="700">
        <h5 class="text-2">Kelas Tersedia</h5>
    </div>


    <!-- Top Menu -->
    <div class="w-100 btn-filter d-inline d-md-none" data-aos="fade-up" data-aos-duration="700">
        <div class="filter-panel card-lg">
        </div>
        <div class="search-panel card-xxl p-side">
            <div class="d-flex justify-content-end">
                <button class="mx-2 pc-none btn btn-outline-secondary fs-7 fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Filter <i class="bx bx-filter"></i>
                </button>
            </div>
        </div>
    </div>


    <!-- Class List All Component -->
    <div class="row">
        <!-- PC dan Tab Filter -->
        <div class="col-lg-3 col-md-4 d-md-inline d-none" data-aos="fade-up" data-aos-duration="700">
            <div class="area-filter">
                <div class="card-filter border rounded">
                    <div class="py-3">
                        <div class="search-box">
                            <div class="search-icon"><i class="fa fa-search search-icon"></i></div>
                            <form action="<?= base_url('userBranch/classpath/classSearch') ?>" method="get">
                                <input name="searchTitle" type="text" placeholder="Cari Modul Pembelajaran" id="search" autocomplete="off" required value="<?= isset($_GET['searchTitle']) ? $_GET['searchTitle'] : '' ?>">
                            </form>
                            <svg class="search-border" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" viewBox="0 0 671 111" style="enable-background:new 0 0 671 111;" xml:space="preserve">
                                <path class="border" d="M335.5,108.5h-280c-29.3,0-53-23.7-53-53v0c0-29.3,23.7-53,53-53h280" />
                                <path class="border" d="M335.5,108.5h280c29.3,0,53-23.7,53-53v0c0-29.3-23.7-53-53-53h-280" />
                            </svg>
                            <div class="go-icon"><i class="bx bx-search"></i></div>
                        </div>

                        <div class="py-2">
                            <select class="form-select" aria-label="Default select example" id="my-select">
                                <?php
                                $options = [
                                    "Terbaru - Terlama" => "listClass",
                                    "Terlama - Terbaru" => "listClassAsc",
                                    "A - Z" => "listClassAZ",
                                    "Z - A" => "listClassZA"
                                ];

                                foreach ($options as $label => $value) {
                                    $selected = ($this->uri->segment(3) === $value) ? "selected" : "";
                                    echo "<option value='" . site_url('userBranch/classpath/' . $value) . "' $selected>$label</option>";
                                }
                                ?>
                            </select>
                        </div>


                        <h6 class="fw-bold ft-7 mx-3 mt-2">Kategori</h6>
                        <form action="<?php echo base_url('userBranch/classpath/filter_by_category'); ?>" method="post">
                            <?php foreach ($categories as $category) { ?>
                                <div class="form-check mt-2 mb-2">
                                    <input class="form-check-input" value="<?php echo $category->id; ?>" name="category[]" type="checkbox" <?php if (isset($selected_categories) && in_array($category->id, $selected_categories)) echo 'checked' ?>>
                                    <label class="form-check-label">
                                        <?= $category->name ?>
                                    </label>
                                </div>
                            <?php } ?>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-blue-1 fs-7 fw-bold"><i class="bx bx-filter px-1"></i>Filter</button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>



        <!-- Class List -->
        <div class="col-lg-9 col-md-8 pb-5 pt-2 mb-5">
            <div class="row">
                <?php
                $no = 1;
                foreach ($course as $data) { ?>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="card-class" data-aos="fade-up" data-aos-duration="700">
                            <div class="d-flex flex-column rounded border">
                                <div class="class-image">
                                    <img src="<?= base_url('assets/images/admin/course/' . $data->cover) ?>">
                                    <div class="marker"></div>
                                    <?php if ($data->has_relation) : ?>
                                        <div class="like-bottom my-auto mt-auto">
                                            <i class="position-absolute bx bxs-bookmark like_icon bg-white border text-orange-2">
                                            </i>
                                        </div>
                                    <?php else : ?>
                                        <form action="<?= site_url('userBranch/classpath/save_course') ?>" method="post" id="form-id-<?= $no++ ?>" hidden>
                                            <input type="text" name="id_user" value="<?php echo $id_user ?>">
                                            <input type="text" name="id_course" value="<?php echo $data->id ?>">
                                        </form>
                                        <div id="<?= $no++ ?>" style="cursor: pointer;" class="like-bottom my-auto mt-auto your-id">
                                            <i class="position-absolute bx bx-bookmark like_icon text-orange-2">
                                            </i>
                                        </div>

                                    <?php endif; ?>
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

                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Mobile Filter -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered d-flex justify-content-center align-items-center">
            <div class="modal-content">
                <div class="p-5">
                    <div class="search-box">
                        <div class="search-icon"><i class="fa fa-search search-icon"></i></div>
                        <form action="<?= base_url('userBranch/classpath/classSearch') ?>" method="get">
                            <input name="searchTitle" id="search" type="text" placeholder="Cari Modul Pembelajaran" autocomplete="off" value="<?= isset($_GET['searchTitle']) ? $_GET['searchTitle'] : '' ?>">
                        </form>
                        <svg class="search-border" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" viewBox="0 0 671 111" style="enable-background:new 0 0 671 111;" xml:space="preserve">
                            <path class="border" d="M335.5,108.5h-280c-29.3,0-53-23.7-53-53v0c0-29.3,23.7-53,53-53h280" />
                            <path class="border" d="M335.5,108.5h280c29.3,0,53-23.7,53-53v0c0-29.3-23.7-53-53-53h-280" />
                        </svg>
                        <div class="go-icon"><i class="bx bx-search"></i></div>
                    </div>
                    <div class="py-2">
                        <select class="form-select" aria-label="Default select example" id="my-select">
                            <?php
                            $options = [
                                "Terbaru - Terlama" => "listClass",
                                "Terlama - Terbaru" => "listClassAsc",
                                "A - Z" => "listClassAZ",
                                "Z - A" => "listClassZA"
                            ];

                            foreach ($options as $label => $value) {
                                $selected = ($this->uri->segment(3) === $value) ? "selected" : "";
                                echo "<option value='" . site_url('userBranch/classpath/' . $value) . "' $selected>$label</option>";
                            }
                            ?>
                        </select>
                    </div>


                    <h6 class="fw-bold ft-7 mx-3 mt-2">Kategori</h6>
                    <form action="<?php echo base_url('userBranch/classpath/filter_by_category'); ?>" method="post">
                        <?php foreach ($categories as $category) { ?>
                            <div class="form-check mt-2 mb-2">
                                <input class="form-check-input" value="<?php echo $category->id; ?>" name="category[]" type="checkbox" <?php if (isset($selected_categories) && in_array($category->id, $selected_categories)) echo 'checked' ?>>
                                <label class="form-check-label">
                                    <?= $category->name ?>
                                </label>
                            </div>
                        <?php } ?>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-blue-1 fs-7 fw-bold"><i class="bx bx-filter px-1"></i>Filter</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>