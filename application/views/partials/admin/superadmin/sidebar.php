<!--=============== Sidebar Tab and Desktop ===============-->
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="<?= site_url('front') ?>" class="nav_logo">
                <img src="<?= base_url('assets/img/nazmalogy-small-extra.png') ?>" alt="">
                <span class="nav_logo-name">NaZMaLogy</span>
            </a>
            <div class="nav_list">
                <a href="<?= site_url('/adminRoot/user/page') ?>" class="nav_link <?= ($this->uri->segment(3) === "page") ? "active" : "" ?>">
                    <i class="bx bx<?= ($this->uri->segment(3) === "page") ? "s" : "" ?>-grid-alt nav_icon"></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <!-- Pengaturan Akses -->
                <a href="<?= site_url('/adminRoot/setting') ?>" class="nav_link <?= ($this->uri->segment(2) === "setting" || $this->uri->segment(3) === "edit_user") ? "active" : "" ?>">
                    <i class="bx bx<?= ($this->uri->segment(2) === "setting" || $this->uri->segment(3) === "edit_user") ? "s" : "" ?>-cog nav_icon"></i>
                    <span class="nav_name">Pengaturan Akses</span>
                </a>
                <!-- Pengaturan Kelas -->
                <a href="<?= site_url('/adminRoot/course/class_admin') ?>" class="nav_link <?= ($this->uri->segment(2) === "course") ? "active" : "" ?>">
                    <i class="bx bx<?= ($this->uri->segment(2) === "course") ? "s" : "" ?>-book-alt nav_icon"></i>
                    <span class="nav_name">Pengaturan Kelas</span>
                </a>
                <!-- Pengaturan Video -->
                <a href="<?= site_url('/adminRoot/playlist/video_admin') ?>" class="nav_link <?= ($this->uri->segment(2) === "playlist") ? "active" : "" ?>">
                    <i class="bx bxs-playlist nav_icon"></i>
                    <span class="nav_name">Control Video</span>
                </a>
            </div>

        </div>
    </nav>
</div>