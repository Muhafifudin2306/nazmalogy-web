<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Profil Pengguna | NaZMaLogy </title>

    <!-- Required Style Components -->
    <?php include(APPPATH . 'views/partials/admin/general/style.php'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/pages/admin/profile/style.css') ?>">

</head>

<body id="body-pd">
    <!-- Header -->
    <?php include(APPPATH . 'views/layout/admin/header.php'); ?>
    <!-- Header -->

    <!-- Content -->
    <?php include(APPPATH . 'views/components/admin/user/profile.php'); ?>
    <!-- Content -->

    <!-- Footer -->
    <?php include(APPPATH . 'views/layout/admin/footer.php'); ?>
    <!-- Footer -->

    <!-- Script -->
    <?php include(APPPATH . 'views/partials/admin/general/script.php'); ?>
    <script type="text/javascript" src="<?= base_url('assets/js/form.js') ?>"></script>
    <!-- Script -->
</body>

</html>