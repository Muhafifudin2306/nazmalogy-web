<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Edit Kursus | NaZMaLogy </title>

    <!-- Required Style Components -->
    <?php include(APPPATH . 'views/partials/admin/general/style.php'); ?>
    <script src="<?php echo base_url('assets/node_modules/ckeditor/ckeditor.js'); ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/node_modules/select2/dist/css/select2.min.css') ?>">


</head>

<body id="body-pd">
    <!-- Header -->
    <?php include(APPPATH . 'views/layout/admin/header.php'); ?>
    <!-- Header -->

    <!-- Content -->
    <?php include(APPPATH . 'views/components/admin/superadmin/course/edit.php'); ?>
    <!-- Content -->

    <!-- Script -->
    <?php include(APPPATH . 'views/partials/admin/general/script.php'); ?>
    <script src="<?= base_url('assets/node_modules/select2/dist/js/select2.min.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script>
        // Inisialisasi CKEditor pada textarea dengan ID 'summernote'
        CKEDITOR.replace('summernote');
    </script>
    <!-- Script -->
</body>

</html>