<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Dashboard Pengguna | NaZMaLogy </title>

    <!-- Required Style Components -->
    <?php include(APPPATH . 'views/partials/admin/general/style.php'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/pages/admin/dashboard/style.css') ?>">

    <!-- ============== Splide CSS ================= -->
    <link rel="stylesheet" href="<?= base_url('assets/node_modules/@splidejs/splide/dist/css/splide.min.css') ?>">
    <script src="<?= base_url('assets/node_modules/@splidejs/splide/dist/js/splide.min.js') ?>"></script>
</head>

<body id="body-pd">
    <!-- Header -->
    <?php include(APPPATH . 'views/layout/admin/header.php'); ?>
    <!-- Header -->

    <!-- Content -->
    <?php include(APPPATH . 'views/components/admin/user/dashboard.php'); ?>
    <!-- Content -->


    <!-- Script -->
    <?php include(APPPATH . 'views/partials/admin/general/script.php'); ?>


    <script>
        var splide = new Splide('.splide', {
            type: 'loop',
            perPage: 1,
            perMove: 1,
        });

        splide.mount();
    </script>

    <?php if ($course_count_user != 0 && $course_finish != 0) : ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                function animateValue(id, start, end, duration) {

                    var range = end - start;
                    var current = start;
                    var increment = end > start ? 1 : -1;
                    var stepTime = Math.abs(Math.floor(duration / range));

                    var timer = setInterval(function() {
                        current += increment;
                        document.getElementById(id).textContent = current;

                        if (current == end) {
                            clearInterval(timer);
                        }
                    }, stepTime);
                    var element = document.getElementById(id);
                }

                var CourseRunningElement = document.getElementById('running_course');
                var targetNumber1 = <?php echo $course_count_user; ?>;
                var FinishCourseElement = document.getElementById('finish_course');
                var targetNumber2 = <?php echo $course_finish; ?>;

                animateValue('running_course', 0, targetNumber1, 1000); // Angka awal 0, durasi 1000ms (1 detik)
                animateValue('finish_course', 0, targetNumber2, 1000); // Angka awal 0, durasi 1000ms (1 detik)

            });
        </script>
    <?php endif ?>
    <!-- Script -->
</body>

</html>