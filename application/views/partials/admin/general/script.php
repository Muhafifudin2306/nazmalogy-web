<!--=============== External JS ===============-->
<script src="<?= base_url('assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/new_admin.js') ?>"></script>
<script src="<?= base_url('assets/node_modules/aos/dist/aos.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/search.js') ?>"></script>

<script>
    function SupportFunction() {
        window.location.href =
            "<?= site_url('front/support') ?>";
    }

    function LandingPage() {
        window.location.href =
            "<?= site_url('front') ?>";
    }
    // Logut Function
    function logOutFunction() {
        Swal.fire({
            title: "<h3 class='text-dark'> " + "Apakah anda ingin logout?" + "</h3>",
            text: "Aksi ini akan menutup sesi anda!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2c2f75",
            cancelButtonColor: "#d33",
            confirmButtonText: "Logout!",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    "<h3 class='text-dark'> " + "Logout Sukses!" + "</h3>",
                    "Anda telah keluar",
                    "success"
                ).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "<?php echo site_url('auth/logout'); ?>";
                    }
                });
            }
        });
    }
</script>

<script src="<?= base_url('assets/node_modules/aos/dist/aos.js') ?>"></script>
<script>
    AOS.init();
</script>
<script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function() {
            navigator.serviceWorker.register('service-worker.js')
                .then(function(registration) {
                    console.log('Service Worker registered with scope:', registration.scope);
                })
                .catch(function(error) {
                    console.log('Service Worker registration failed:', error);
                });
        });
    }

    self.addEventListener('install', (event) => {
        event.waitUntil(
            caches.open('my-cache').then((cache) => {
                return cache.addAll([
                    '/',
                    '/another/path/to/your/files'
                ]);
            })
        );
    });

    self.addEventListener('fetch', (event) => {
        event.respondWith(
            caches.match(event.request).then((response) => {
                return response || fetch(event.request);
            })
        );
    });
</script>