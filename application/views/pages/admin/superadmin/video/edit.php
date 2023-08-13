<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Edit Video | NaZMaLogy </title>

    <!-- Required Style Components -->
    <?php include(APPPATH . 'views/partials/admin/general/style.php'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/node_modules/select2/dist/css/select2.min.css') ?>">


</head>

<body id="body-pd">
    <!-- Header -->
    <?php include(APPPATH . 'views/layout/admin/header.php'); ?>
    <!-- Header -->

    <!-- Content -->
    <?php include(APPPATH . 'views/components/admin/superadmin/video/edit.php'); ?>
    <!-- Content -->

    <!-- Script -->
    <?php include(APPPATH . 'views/partials/admin/general/script.php'); ?>
    <script src="<?= base_url('assets/node_modules/select2/dist/js/select2.min.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('#mySelect').select2();
        });
    </script>
    <!-- Script -->
</body>

</html>