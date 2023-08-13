<section class="bg-white-custom">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top py-sm-3 py-xl-1 bg-white">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img width="150" src="<?= base_url('assets/images/logo/new_nazmalogy_logo.png') ?>" alt="NaZMalogy">
            </a>
            <button class="navbar-toggler header-pc" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav gap-3 py-3">
                    <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->uri_string() === '' || $this->uri->uri_string() === 'front') ? 'active' : '' ?>" href="<?= site_url('front') ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        
                        <a class="nav-link <?= ($this->uri->segment(2) === "listClass" || $this->uri->segment(2) === "listClassAsc" || $this->uri->segment(2) === "listClassAZ" || $this->uri->segment(2) === "listClassZA" || $this->uri->segment(2) === "courseSearch" || $this->uri->segment(2) === "course_filter_by_category") ? 'active' : '' ?>" href="<?= site_url('front/listClass') ?>">Kursus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(2) === "support") ? 'active' : '' ?>" href="<?= site_url('front/support') ?>">Bantuan</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex gap-2 header-pc">
                <?php if ($this->session->userdata('is_login')) : ?>
                    <a href="<?= site_url('userBranch/user/page') ?>">
                        <button class="btn btn-primary btn-orange px-4 ft-btn border-orange">Beranda</button>
                    </a>
                <?php else : ?>
                    <a href="<?= site_url('auth/register_page') ?>">
                        <button class="btn btn-secondary bg-second px-4 ft-btn text-black">Daftar</button>
                    </a>
                    <a href="<?= site_url('auth/login_page') ?>">
                        <button class="btn btn-primary btn-orange px-4 ft-btn border-orange">Login</button>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

</section>