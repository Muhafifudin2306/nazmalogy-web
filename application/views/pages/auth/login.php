<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NaZMaLogy | Login Akun</title>

    <!-- Required Style Components -->
    <?php include(APPPATH . 'views/partials/member/style.php'); ?>
    <link href="<?= base_url('assets/css/pages/auth/style.css') ?>" rel="stylesheet">
</head>
<!-- Mobile Bar Partial -->
<?php $this->load->view('partials/member/mobile_bar'); ?>
<!-- Mobile Bar Partial -->

<!-- Content -->
<?php include(APPPATH . 'views/components/auth/login.php'); ?>
<!-- Content -->

<!-- Script -->
<?php include(APPPATH . 'views/partials/member/script.php'); ?>
<!-- Client Validation JS -->
<script>
    function validateForm() {
        var email = document.getElementById("email").value;

        // Validasi format email menggunakan ekspresi reguler
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            Swal.fire({
                icon: 'error',
                title: '<span class="text-black">' + 'Kesalahan' + '</span>',
                text: 'Kolom email harus berisi alamat email yang valid.'
            });
            return false;
        }

        return true;
    }
</script>
<!-- Client Validation JS -->
<script>
    //Show Password
    function showPassword() {
        let x = document.getElementById("passwordInput");

        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function errorLogin() {
        Swal.fire({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: 'error',
            title: 'Akun Tidak Terdeteksi',
        })
    }
</script>
<!-- Script -->

<body>

</body>

</html>