<!--=============== Header Tab and Desktop===============-->
<header class="header" id="header">
    <div class="d-flex justify-content-start">
        <!-- Menu Button -->
        <div class="header_toggle">
            <i class="bx bx-menu" id="header-toggle">
            </i>
        </div>
        <!-- Menu Button -->

        <!-- Back Button From Detail Course -->
        <?php
        $segment3 = $this->uri->segment(3);
        if ($segment3 === "detail_course" || $segment3 === 'detail_video_course') :
            $url = site_url('userBranch/classpath/listClass');
        ?>
            <a class="fw-bold gap-3 fs-5 d-inline d-md-none d-blue-1" href="<?= $url ?>">
                <i class="bi bi-chevron-left fw-bold fs-2 text-first"></i>
            </a>
        <?php endif; ?>
        <!-- Back Button From Detail Course -->

        <!-- Search Panel -->
        <div class="search_toggle">
            <div class="search-wrapper">
                <div class="input-holder">
                    <div class="search-box <?= ($id_role == '1' || $this->uri->segment(2) === "classpath") ? "d-none" : "" ?>">
                        <div class="search-icon"><i class="fa fa-search search-icon"></i></div>
                        <form action="<?= base_url('userBranch/classpath/classSearch') ?>" method="get">
                            <input name="searchTitle" type="text" placeholder="Cari Modul Pembelajaran" id="search<?php echo ($this->uri->segment(2) === 'classpath') ? 's' : ''; ?>" autocomplete="off" value="<?php echo isset($_GET['searchTitle']) ? $_GET['searchTitle'] : ''; ?>">
                        </form>
                        <svg class="search-border" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" viewBox="0 0 671 111" style="enable-background:new 0 0 671 111;" xml:space="preserve">
                            <path class="border" d="M335.5,108.5h-280c-29.3,0-53-23.7-53-53v0c0-29.3,23.7-53,53-53h280" />
                            <path class="border" d="M335.5,108.5h280c29.3,0,53-23.7,53-53v0c0-29.3-23.7-53-53-53h-280" />
                        </svg>
                        <div class="go-icon"><i class="bx bx-search"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Panel -->

    </div>
    <div class="user_panel">
        <div class="dropdown">
            <div class="profile"> <i class="bx bx-log-out fs-5 px-3"></i>
                <div class="dropdown-content">
                    <ul>
                        <li onclick="LandingPage()"><i class="bi bi-rocket-takeoff"></i><span>Landing Page</span></li>
                        <li onclick="SupportFunction()"><i class="bx bx-help-circle"></i><span>Bantuan</span></li>
                        <li onclick="logOutFunction()"><i class="bx bx-log-in-circle"></i><span>Keluar</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>