<script src="<?= base_url('assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
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