<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Edit Testimony | NaZMaLogy </title>

    <!-- Required Style Components -->
    <?php include(APPPATH . 'views/partials/admin/general/style.php'); ?>
    <script src="<?php echo base_url('assets/node_modules/ckeditor/ckeditor.js'); ?>"></script>

</head>

<body id="body-pd">
    <!-- Header -->
    <?php include(APPPATH . 'views/layout/admin/header.php'); ?>
    <!-- Header -->

    <!-- Content -->
    <?php include(APPPATH . 'views/components/admin/superadmin/testimony/edit.php'); ?>
    <!-- Content -->

    <!-- Footer -->
    <?php include(APPPATH . 'views/layout/admin/footer.php'); ?>
    <!-- Footer -->

    <!-- Script -->
    <?php include(APPPATH . 'views/partials/admin/general/script.php'); ?>
    <script>
        // Inisialisasi CKEditor pada textarea dengan ID 'message'
        CKEDITOR.replace('message');
    </script>
    <!-- Script -->
</body>

</html>