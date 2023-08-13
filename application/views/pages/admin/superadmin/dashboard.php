<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Dashboard Admin NaZMaLogy </title>

    <!-- Required Style Components -->
    <?php include(APPPATH . 'views/partials/admin/general/style.php'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/pages/admin/dashboard/style.css') ?>">


</head>

<body id="body-pd">
    <!-- Header -->
    <?php include(APPPATH . 'views/layout/admin/header.php'); ?>
    <!-- Header -->

    <!-- Content -->
    <?php include(APPPATH . 'views/components/admin/superadmin/dashboard.php'); ?>
    <!-- Content -->

    <!-- Footer -->
    <?php include(APPPATH . 'views/layout/admin/footer.php'); ?>
    <!-- Footer -->

    <!-- Script -->
    <?php include(APPPATH . 'views/partials/admin/general/script.php'); ?>
    <script src="<?= base_url('assets/node_modules/charts/chart.js') ?>"></script>
    <!-- Analytics User Management Script -->
    <script>
        var ctx = document.getElementById('UserChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Super Admin', 'Instruktur', 'Murid'],
                datasets: [{
                    label: 'Statistik Jumlah Pengguna Berdasarkan Role',
                    data: [<?php echo $admin_count; ?>, <?php echo $instructor_count; ?>, <?php echo $member_count; ?>],
                    backgroundColor: [
                        'rgba(0, 0, 0, 0.58)',
                        'rgba(45, 47, 118, 0.39)',
                        'rgba(254, 129, 27, 0.5)'
                    ],
                    borderColor: [
                        'rgba(0, 0, 0, 0.89)',
                        'rgba(44, 47, 117, 1)',
                        'rgba(254, 129, 27, 1)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx = document.getElementById('VideoChart').getContext('2d');
        var videoCounts = <?php echo json_encode($video_counts); ?>;
        var labels = videoCounts.map(function(item) {
            return item.category_name;
        });
        var data = videoCounts.map(function(item) {
            return item.video_count;
        });

        var backgroundColors = [
            'rgba(45, 47, 118, 0.39)',
            'rgba(255, 99, 132, 0.39)',
            'rgba(54, 162, 235, 0.39)',
            // Tambahkan warna lainnya sesuai kebutuhan
        ];

        var borderColors = [
            'rgba(44, 47, 117, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            // Tambahkan warna lainnya sesuai kebutuhan
        ];

        var datasets = [{
            label: 'Statistik Jumlah Video Berdasarkan Kategori',
            data: data,
            backgroundColor: backgroundColors.slice(0, labels.length),
            borderColor: borderColors.slice(0, labels.length),
            borderWidth: 2
        }];

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: datasets
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    </script>

    <!-- Animation  count up -->
    <?php if ($course_count != 0 && $user_count != 0) : ?>
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

                var CourseCountElement = document.getElementById('course_count');
                var targetNumber3 = <?php echo $course_count; ?>;
                var UserCourseElement = document.getElementById('user_count');
                var targetNumber4 = <?php echo $user_count; ?>;

                animateValue('course_count', 0, targetNumber3, 1000); // Angka awal 0, durasi 1000ms (1 detik)
                animateValue('user_count', 0, targetNumber4, 1000); // Angka awal 0, durasi 1000ms (1 detik)
            });
        </script>
    <?php endif ?>
    <!-- Script -->
</body>

</html>