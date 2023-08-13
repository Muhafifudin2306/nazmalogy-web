<header class="bg-white-custom">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top py-sm-3 py-xl-1 bg-white">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img width="150" src="<?= base_url('assets/images/logo/new_nazmalogy_logo.png') ?>" alt="NaZMalogy">
            </a>
            <button class="navbar-toggler d-none d-lg-none d-md-inline" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav gap-3 py-3">
                    <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->uri_string() === '' || $this->uri->uri_string() === 'front') ? 'active' : '' ?>" href="<?= site_url('front') ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        $listClassSegments = array("listClass", "listClassAsc", "listClassAZ", "listClassZA", "courseSearch", "course_filter_by_category");
                        $isListClassActive = in_array($this->uri->segment(2), $listClassSegments) ? 'active' : '';
                        ?>
                        <a class="nav-link <?= $isListClassActive ?>" href="<?= site_url('front/listClass') ?>">Kursus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(2) === "support") ? 'active' : '' ?>" href="<?= site_url('front/support') ?>">Bantuan</a>
                    </li>
                </ul>
            </div>

            <div class="d-flex gap-2 d-none d-md-inline">
                <?php if ($this->session->userdata('is_login')) : ?>
                    <?php if ($this->session->userdata('id_role') == 1) : ?>
                        <a href="<?= site_url('adminRoot/user/page') ?>">
                            <button type="button" class="fw-bold btn btn-warning btn-orange-1 px-4 rounded-5 text-2">Beranda</button>
                        </a>
                    <?php else : ?>
                        <a href="<?= site_url('userBranch/user/page') ?>">
                            <button type="button" class="fw-bold btn btn-warning btn-orange-1 px-4 rounded-5">Beranda</button>
                        </a>
                    <?php endif ?>
                <?php else : ?>
                    <a class="text-decoration-none" href="<?= site_url('auth/register_page') ?>">
                        <button type="button" class="fw-bold btn btn-primary btn-blue-1 px-4 rounded-5 text-2">Daftar</button>
                    </a>
                    <a class="text-decoration-none" href="<?= site_url('auth/login_page') ?>">
                        <button type="button" class="fw-bold btn btn-warning btn-orange-1 px-4 rounded-5 text-2">Login</button>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>