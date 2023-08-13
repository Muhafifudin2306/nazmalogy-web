<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Daftar Kursus | NaZMaLogy </title>

    <!-- Required Style Components -->
    <?php include(APPPATH . 'views/partials/admin/general/style.php'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/pages/admin/course_list/style.css') ?>">
</head>

<body id="body-pd">
    <!-- Header -->
    <?php include(APPPATH . 'views/layout/admin/header.php'); ?>
    <!-- Header -->

    <!-- Content -->
    <?php include(APPPATH . 'views/components/admin/user/course_list.php'); ?>
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
    <script>
        const selectElement = document.getElementById('my-select');

        selectElement.addEventListener('change', () => {
            const selectedValue = selectElement.value;
            if (selectedValue) {
                window.location.href = selectedValue;
            }
        });

        const selectElementPhone = document.getElementById('my-select-phone');

        selectElementPhone.addEventListener('change', () => {
            const selectedValue = selectElementPhone.value;
            if (selectedValue) {
                window.location.href = selectedValue;
            }
        });
    </script>
    <!-- Script -->
</body>

</html>