<!-- Header Phone -->
<!--=============== Header Phone ===============-->
<header class="header-phone" id="header-phone">
    <nav class="nav__phone container">
        <div class="nav__menu bg-white" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="<?= site_url('/userBranch/user/page') ?>" class="nav__link <?= ($this->uri->segment(3) === "page") ? "active-link" : "" ?>">
                        <i class="bx bx<?= ($this->uri->segment(3) === "page") ? "s" : "" ?>-home-alt-2 nav__icon"></i>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="<?= site_url('/userBranch/classpath/listClass') ?>" class="nav__link <?= ($this->uri->segment(2) === "classpath") ? "active-link" : "" ?>">
                        <i class="bx bx-library nav__icon"></i>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="<?= base_url('/userBranch/user/savedClass') ?>" class="nav__link <?= ($this->uri->segment(3) === "savedClass") ? "active-link" : "" ?>">
                        <i class="bx bx<?= ($this->uri->segment(3) === "savedClass") ? "s" : "" ?>-heart nav__icon"></i>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="<?= site_url('/userBranch/profile') ?>" class="nav__link <?= ($this->uri->segment(2) === "profile") ? "active-link" : "" ?>">
                        <i class='bx bx<?= ($this->uri->segment(2) === "profile") ? "s" : "" ?>-user nav__icon'></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>