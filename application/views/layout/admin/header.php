<!-- Navbar PC and Tablet -->
<?php include(APPPATH . 'views/partials/admin/general/navbar.php'); ?>

<!-- Navbar Phone -->
<?php if ($id_role == '1') : ?>
    <?php include(APPPATH . 'views/partials/admin/superadmin/mobile_bar.php'); ?>
    <?php include(APPPATH . 'views/partials/admin/superadmin/sidebar.php'); ?>
<?php else : ?>
    <?php include(APPPATH . 'views/partials/admin/user/mobile_bar.php'); ?>
    <?php include(APPPATH . 'views/partials/admin/user/sidebar.php'); ?>
<?php endif ?>