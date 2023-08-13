<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Kursus Tersimpan | NaZMaLogy </title>

    <!-- Required Style Components -->
    <?php include(APPPATH . 'views/partials/admin/general/style.php'); ?>
    <link href="<?= base_url('assets/css/pages/admin/course_list/style.css') ?>" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-interactivity@latest/dist/lottie-interactivity.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body id="body-pd">
    <!-- Header -->
    <?php include(APPPATH . 'views/layout/admin/header.php'); ?>
    <!-- Header -->

    <!-- Content -->
    <?php include(APPPATH . 'views/components/admin/user/saved_class.php'); ?>
    <!-- Content -->

    <!-- Script -->
    <?php include(APPPATH . 'views/partials/admin/general/script.php'); ?>
    <script>
        var nodesSameClass = document.getElementsByClassName("card-class");

        for (let i = 1; i <= nodesSameClass.length * 2; i++) {
            if (i % 2 == 1) {
                document.getElementById(i + 1).addEventListener("click", function() {
                    document.getElementById("form-id-" + i).submit();
                });
            }
        }
    </script>
    <!-- Script -->
</body>

</html>