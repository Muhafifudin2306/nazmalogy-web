self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open('my-cache').then((cache) => {
      return cache.addAll([
        '/',
        // '/index.html',
        // '/css/style.css',
        // '/js/main.js',
        // '/images/logo.png'
      ]);
    })
  );
});