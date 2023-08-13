<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Pengaturan Kursus | NaZMaLogy </title>

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
    <?php include(APPPATH . 'views/components/admin/superadmin/course/index.php'); ?>
    <!-- Content -->

    <!-- Footer -->
    <?php include(APPPATH . 'views/layout/admin/footer.php'); ?>
    <!-- Footer -->

    <!-- Script -->
    <?php include(APPPATH . 'views/partials/admin/general/script.php'); ?>
    <script>
        function categoryDeleteConfirmation(id) {
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
                    window.location = '<?php echo site_url('adminRoot/course/delete_category/'); ?>' + id;
                }
            });
        }
    </script>


    <script>
        function courseDeleteConfirmation(id) {
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
                    window.location = '<?php echo site_url('adminRoot/course/delete_course/'); ?>' + id;
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
        $(document).ready(function() {
            $('#example2').DataTable();
        });
        $(document).ready(function() {
            $('#example3').DataTable();
        });
        $(document).ready(function() {
            $('#example4').DataTable();
        });
    </script>
    <!-- Script -->
</body>

</html>