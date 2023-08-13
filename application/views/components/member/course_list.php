<section id="list-class" class="bg-light-primary">
    <div class="container">
        <div class="pt-3">
            <div class="mt-5 pt-5 d-flex justify-content-lg-start" data-aos="fade-up" data-aos-duration="700">
                <h5 class="text-2 text-black">Kelas Tersedia</h5>
            </div>
        </div>
        <!-- =============== Kelas Tersedia ================= -->

        <div class="mt-3">
            <!-- Top Menu -->
            <div class="d-flex justify-content-end btn-filter pb-3 d-inline d-lg-none" data-aos="fade-up" data-aos-duration="700">
                <div class="filter-panel card-lg">
                </div>
                <div class="search-panel card-xxl p-side">
                    <div class="d-flex m-js">
                        <button class="mx-2 pc-none btn btn-outline-secondary fs-7 fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Filter <i class="bx bx-filter px-1"></i>
                        </button>
                    </div>
                </div>
            </div>


            <!-- Class List All Component -->
            <div class="row">
                <!-- PC dan Tab Filter -->
                <div class="col-lg-3 col-md-4 d-none d-lg-inline col-mb-4" data-aos="fade-up" data-aos-duration="700">
                    <div class="bg-white border rounded p-4">
                        <div class="search-box">
                            <div class="search-icon"><i class="fa fa-search search-icon"></i></div>
                            <form action="<?= base_url('front/courseSearch') ?>" method="get">
                                <input name="searchTitle" type="text" placeholder="Cari Modul Pembelajaran" id="search" autocomplete="off" required value="<?= isset($_GET['searchTitle']) ? $_GET['searchTitle'] : '' ?>">
                            </form>
                            <svg class="search-border" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" viewBox="0 0 671 111" style="enable-background:new 0 0 671 111;" xml:space="preserve">
                                <path class="border" d="M335.5,108.5h-280c-29.3,0-53-23.7-53-53v0c0-29.3,23.7-53,53-53h280" />
                                <path class="border" d="M335.5,108.5h280c29.3,0,53-23.7,53-53v0c0-29.3-23.7-53-53-53h-280" />
                            </svg>
                            <div class="go-icon"><i class="bx bx-search"></i></div>
                        </div>
                        <div class="py-2">
                            <select class="form-select" aria-label="Default select example" id="my-select-phone">
                                <?php
                                $options = [
                                    "Terbaru - Terlama" => "listClass",
                                    "Terlama - Terbaru" => "listClassAsc",
                                    "A - Z" => "listClassAZ",
                                    "Z - A" => "listClassZA"
                                ];

                                foreach ($options as $label => $value) {
                                    $selected = ($this->uri->segment(2) === $value) ? "selected" : "";
                                    echo "<option value='" . site_url('front/' . $value) . "' $selected>$label</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <h6 class="ft-7 mx-3 mt-2 fw-bold">Kategori</h6>
                        <form action="<?php echo base_url('front/course_filter_by_category'); ?>" method="post">
                            <?php foreach ($categories as $category) { ?>
                                <div class="form-check mt-2 mb-2">
                                    <input class="form-check-input" value="<?php echo $category->id; ?>" name="category[]" type="checkbox" <?php if (isset($selected_categories) && in_array($category->id, $selected_categories)) echo 'checked' ?>>
                                    <label class="form-check-label">
                                        <?= $category->name ?>
                                    </label>
                                </div>
                            <?php } ?>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-blue-1 fw-bold fs-7"><i class="bx bx-filter px-1"></i>Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Class List -->
                <div class="col-lg-9 pb-5 mb-5" data-aos="fade-up" data-aos-duration="700">
                    <div class="row">
                        <?php
                        $no = 1;
                        foreach ($course as $data) { ?>
                            <div class="col-lg-4 col-md-6 pb-3 p-1 px-2">

                                <div class="card-class border rounded">
                                    <div class="d-flex flex-column">
                                        <div class="class-image">
                                            <img src="<?= base_url('assets/images/admin/course/' . $data->cover) ?>">
                                            <div class="marker"></div>
                                        </div>
                                        <div class="p-2 pb-0 d-flex gap-1 flex-wrap">
                                            <?php
                                            $category = explode(',', $data->category);
                                            foreach ($category as $kat) {
                                                echo "
                                                    <span class='py-1 px-3 bg-orange-2 rounded text-white fs-8'>" . $kat . "</span>";
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
                                                    <?php if ($this->session->userdata('is_login')) : ?>
                                                        <?php if ($data->button_label == 'Lanjutkan') : ?>
                                                            <a href="<?= site_url('userBranch/classpath/detail_course/' . $data->id) ?>">
                                                                <button class='btn btn-primary btn-blue-2 fw-bold fs-7'><i class='bi bi-play-fill fs-7 px-1'></i>Lanjutkan</button>
                                                            </a>
                                                        <?php else : ?>
                                                            <a href="<?= site_url('userBranch/classpath/detail_course/' . $data->id) ?>">
                                                                <button class='btn btn-primary btn-blue-1 fw-bold fs-7'><i class="bi bi-plus"></i> Ikuti</button>
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php else : ?>

                                                        <button id="myButton<?= $no++ ?>" class='btn btn-primary btn-blue-1 text-xl border-first'>+ Ikuti</button>

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
                    <div class="modal-content mx-5">
                        <div class="p-4">
                            <div class="search-box">
                                <div class="search-icon"><i class="fa fa-search search-icon"></i></div>
                                <form action="<?= base_url('front/courseSearch') ?>" method="get">
                                    <input name="searchTitle" id="search" type="text" placeholder="Cari Modul Pembelajaran" autocomplete="off" value="<?= isset($_GET['searchTitle']) ? $_GET['searchTitle'] : '' ?>">
                                </form>
                                <svg class="search-border" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" viewBox="0 0 671 111" style="enable-background:new 0 0 671 111;" xml:space="preserve">
                                    <path class="border" d="M335.5,108.5h-280c-29.3,0-53-23.7-53-53v0c0-29.3,23.7-53,53-53h280" />
                                    <path class="border" d="M335.5,108.5h280c29.3,0,53-23.7,53-53v0c0-29.3-23.7-53-53-53h-280" />
                                </svg>
                                <div class="go-icon"><i class="bx bx-search"></i></div>
                            </div>
                            <div class="py-2">
                                <select class="form-select" aria-label="Default select example" id="my-select-phone">
                                    <?php
                                    $options = [
                                        "Terbaru - Terlama" => "listClass",
                                        "Terlama - Terbaru" => "listClassAsc",
                                        "A - Z" => "listClassAZ",
                                        "Z - A" => "listClassZA"
                                    ];

                                    foreach ($options as $label => $value) {
                                        $selected = ($this->uri->segment(2) === $value) ? "selected" : "";
                                        echo "<option value='" . site_url('front/' . $value) . "' $selected>$label</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <h6 class="ft-7 fw-bold mx-3 mt-2">Kategori</h6>
                            <form action="<?php echo base_url('front/course_filter_by_category'); ?>" method="post">
                                <?php foreach ($categories as $category) { ?>
                                    <div class="form-check mt-2 mb-2">
                                        <input class="form-check-input" value="<?php echo $category->id; ?>" name="category[]" type="checkbox" <?php if (isset($selected_categories) && in_array($category->id, $selected_categories)) echo 'checked' ?>>
                                        <label class="form-check-label">
                                            <?= $category->name ?>
                                        </label>
                                    </div>
                                <?php } ?>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary btn-blue-1 fw-bold fs-7"><i class="bx bx-filter px-1"></i>Filter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>