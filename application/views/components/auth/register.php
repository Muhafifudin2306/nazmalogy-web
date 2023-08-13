<?php
if ($this->session->flashdata('error') != '') {
    $errorMessage = $this->session->flashdata('error');
    echo '
        <script>
        Swal.fire({
            toast: true,
            position: "top-right",
            iconColor: "white",
            customClass: {
                popup: "colored-toast"
            },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "error",
            title: "' . $errorMessage . '"
        });
        </script>
        ';
}
?>

<div class="d-flex responsive-form pb-5 pb-md-0">
    <div class="side-left w-50 m-full">
        <div class="login_field">
            <div class="auth-form">
                <h2 class="text-center text-blue-1 py-3 ft-7">Daftar Akun</h2>
                <!-- Register Form -->
                <form onsubmit="return validateForm()" method="post" action="<?php echo base_url('auth/register_proccess'); ?>">
                    <div class="login__field">
                        <i class="bx bx-user login__icon"></i>
                        <input type="text" class="login__input" placeholder="Nama Lengkap" name="name" id="name" required>
                    </div>
                    <div class="login__field">
                        <i class="bx bx-envelope login__icon"></i>
                        <input id="emailInput" type="email" class="login__input" placeholder="example@example.com" name="email" required>
                    </div>
                    <div class="login__field">
                        <i class="bx bx-lock login__icon"></i>
                        <input id="passwordInput" type="password" name="password" class="login__input" name="password" placeholder="*******" required>
                    </div>
                    <div class="my-2 mx-1 form-check">
                        <input onclick="showPassword()" type="checkbox" class="form-check-input">
                        <label class="form-check-label">Tampilkan Kata Sandi</label>
                    </div>
                    <div class="p-2 d-flex flex-column gap-2">
                        <button type="submit" class="btn btn-primary btn-blue-1 fw-bold w-100"> Daftar Sekarang </button>
                    </div>
                </form>
                <!-- Register Form -->
                <div class="px-2">
                    <a href="<?= site_url('/') ?>">
                        <button type="submit" class="btn d-none d-sm-inline btn-warning btn-orange-1 fw-bold w-100"> Kembali
                        </button>
                    </a>
                </div>
                <p class="text-center pt-2 pb-5">Sudah punya akun ? <a class="text-blue-1 fw-bold" href="<?= site_url('auth/login_page') ?>">
                        Masuk sekarang</a> </p>
                <div class="spacer py-2 d-inline d-md-none"></div>
            </div>

        </div>
    </div>
    <div class="side-right w-50 m-none m-md-full">
        <div class="image-panel">
            <img src="<?= base_url('assets/img/background-auth.jpg') ?>" alt="">
            <div class="panel-cover"></div>
        </div>
        <div class="logo-panel">
            <img src="<?= base_url('assets/img/logo-white-blank.png') ?>" alt="">
        </div>
    </div>
</div>