<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NaZMaLogy | Daftar Kursus</title>

    <!-- Required Style Components -->
    <?php include(APPPATH . 'views/partials/member/style.php'); ?>

    <!-- External CSS -->
    <link href="<?= base_url('assets/css/pages/member/course_list/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/search_front.css') ?>" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <?php include(APPPATH . 'views/layout/member/header.php'); ?>
    <!-- Header -->

    <!-- Content -->
    <?php include(APPPATH . 'views/components/member/course_list.php'); ?>
    <!-- Content -->

    <!-- Footer -->
    <?php include(APPPATH . 'views/layout/member/footer.php'); ?>
    <!-- Footer -->

    <!-- Script -->
    <script type="text/javascript" src="<?= base_url('assets/node_modules/jquery/dist/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/search.js') ?>"></script>
    <?php include(APPPATH . 'views/partials/member/script.php'); ?>

    <script>
        // Fungsi yang dipanggil saat tombol di klik
        function handleClick(buttonId) {

            // Pengguna belum memiliki akun, tampilkan SweetAlert dialog
            Swal.fire({
                title: '<h3 class="text-black fw-bold">' + 'Mulai Belajar Sekarang' + '</h3>',
                text: 'Apakah Anda sudah memiliki akun?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Login',
                cancelButtonText: 'Belum, Sign Up'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna memilih untuk login, arahkan ke halaman login
                    window.location.href = '<?= site_url('auth/login_page') ?>'; // Ganti dengan URL halaman login Anda
                } else {
                    // Jika pengguna memilih untuk sign up, arahkan ke halaman sign up
                    window.location.href = '<?= site_url('auth/register_page') ?>'; // Ganti dengan URL halaman sign up Anda
                }
            });

        }
        // Menampilkan hasil hitung pada elemen dengan ID "countResult"
        var countResult = document.getElementsByClassName('card-class').length;
        for (var i = 1; i <= countResult; i++) {
            var buttonId = 'myButton' + i;
            var button = document.getElementById(buttonId);

            // Menetapkan fungsi handleClick dengan argumen buttonId sebagai fungsi yang dipanggil saat tombol di klik
            button.onclick = function(id) {
                return function() {
                    handleClick(id);
                };
            }(buttonId);
        }
    </script>
    <!-- checkbox style after filtering data -->
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


<body>

</body>

</html>