<!-- Header Phone -->
<header class="header-phone" id="header-phone">
    <nav class="nav__phone container">
        <div class="nav__menu bg-white" id="nav-menu">
            <ul class="nav__list">
                <?php
                $activeSegment = $this->uri->segment(3);
                $activePanel = $this->uri->segment(2);
                $activeClass = ($activeSegment === "page") ? "active-link" : "";
                $activeSetting = ($this->uri->segment(2) === "setting" || $this->uri->segment(3) === "edit_user") ? "active-link" : "";
                ?>
                <li class="nav__item">
                    <a href="<?= site_url('/adminRoot/user/page') ?>" class="nav__link <?= $activeClass ?>">
                        <i class="bx bx<?= ($activeSegment === "page") ? "s" : "" ?>-home-alt-2 nav__icon"></i>
                    </a>
                </li>
                <!-- Pengaturan Akses -->
                <?php
                $activeClass = ($activeSegment === "setting") ? "active-link" : "";
                ?>
                <li class="nav__item">
                    <a href="<?= site_url('/adminRoot/setting') ?>" class="nav__link <?= $activeSetting ?>">
                        <i class="bx bx<?= ($activeSegment === "setting") ? "s" : "" ?>-cog nav__icon"></i>
                    </a>
                </li>
                <!-- Pengaturan Kelas -->
                <?php
                $activeClass = ($activePanel === "course") ? "active-link" : "";
                ?>
                <li class="nav__item">
                    <a href="<?= site_url('/adminRoot/course/class_admin') ?>" class="nav__link <?= $activeClass ?>">
                        <i class="bx bx<?= ($activePanel === "class_admin") ? "s" : "" ?>-book-alt nav__icon"></i>
                    </a>
                </li>
                <!-- Pengaturan Video -->
                <?php
                $activeClass = ($activePanel === "playlist") ? "active-link" : "";
                ?>
                <li class="nav__item">
                    <a href="<?= site_url('/adminRoot/playlist/video_admin') ?>" class="nav__link <?= $activeClass ?>">
                        <i class="bx bxs-playlist nav__icon"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>