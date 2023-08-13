<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Pengaturan Website | NaZMaLogy </title>

    <!-- Required Style Components -->
    <?php include(APPPATH . 'views/partials/admin/general/style.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/datatables.net-dt/css/jquery.dataTables.css'); ?>">
    <script src="<?php echo base_url('assets/node_modules/datatables.net/js/jquery.dataTables.js'); ?>"></script>
</head>

<body id="body-pd">
    <!-- Header -->
    <?php include(APPPATH . 'views/layout/admin/header.php'); ?>
    <!-- Header -->

    <!-- Content -->
    <?php include(APPPATH . 'views/components/admin/superadmin/setting/index.php'); ?>
    <!-- Content -->

    <!-- Footer -->
    <?php include(APPPATH . 'views/layout/admin/footer.php'); ?>
    <!-- Footer -->

    <!-- Script -->
    <?php include(APPPATH . 'views/partials/admin/general/script.php'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var copyButtons = document.querySelectorAll('.copy-email');
            copyButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var email = this.getAttribute('data-email');
                    copyToClipboard(email);
                    Swal.fire({
                        icon: 'success',
                        title: '<h3 class="text-black fw-bold">' + 'Email Tersalin' + '</h3>',
                        text: 'Email ' + email + ' telah disalin!',
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
            });

            function copyToClipboard(text) {
                var textarea = document.createElement('textarea');
                textarea.value = text;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);
            }
        });
    </script>

    <script>
        function testimonyDeleteConfirmation(id) {
            Swal.fire({
                title: '<h3 class="fw-bold text-black">Konfirmasi</h3>',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#2c2f75',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke fungsi delete_testimony dengan ID sebagai parameter
                    window.location = '<?php echo site_url('adminRoot/setting/delete_testimony/'); ?>' + id;
                }
            });
        }
    </script>


    <script>
        function userDeleteConfirmation(id) {
            Swal.fire({
                title: '<h3 class="fw-bold text-black">Konfirmasi</h3>',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#2c2f75',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke fungsi delete_testimony dengan ID sebagai parameter
                    window.location = '<?php echo site_url('adminRoot/user/delete_user/'); ?>' + id;
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#example-testimony').DataTable({
                "pageLength": 3,
                "style": "font-size: 0.8rem;"
            });
            $('#example-user').DataTable({
                "pageLength": 3,
                "style": "font-size: 0.8rem;"
            });
            $(document).ready(function() {
                $('#example-subscribe').DataTable({
                    "pageLength": 3,
                    "info": false, // Menyembunyikan info jumlah data
                    "language": {
                        "paginate": {
                            "next": "&#8594;",
                            "previous": "&#8592;"
                        }
                    }
                }).draw();

                // Custom styling for label font size
                $('.dataTables_wrapper label').css('font-size', '0.8rem');
            });
        });
    </script>
    <!-- Script -->
</body>

</html>