<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

<!-- ============== Splide Js =============== -->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<!-- <script>
    var widths = [0, 768, 992, 2000];

    function resizeFn() {
        if (window.innerWidth >= widths[0] && window.innerWidth < widths[1]) {
            var splide1 = new Splide('#first-splide', {
                type: 'loop',
                padding: '2rem',
            });
            var splide2 = new Splide('#second-splide', {
                type: 'loop',
                perPage: 1,
                perMove: 1,
            });

            splide1.mount();
            splide2.mount();

        } else if (window.innerWidth >= widths[1] && window.innerWidth < widths[2]) {
            var splide1 = new Splide('#first-splide', {
                type: 'loop',
                padding: '10rem',
            });
            var splide2 = new Splide('#second-splide', {
                type: 'loop',
                perPage: 2,
                perMove: 1,
            });

            splide1.mount();
            splide2.mount();
        } else if (window.innerWidth >= widths[2] && window.innerWidth < widths[3]) {
            var splide1 = new Splide('#first-splide', {
                type: 'loop',
                padding: '20rem',
            });
            var splide2 = new Splide('#second-splide', {
                type: 'loop',
                perPage: 4,
                perMove: 1,
            });

            splide1.mount();
            splide2.mount();
        } else {
            var splide1 = new Splide('#first-splide', {
                type: 'loop',
                padding: '25rem',
            });
            var splide2 = new Splide('#second-splide', {
                type: 'loop',
                perPage: 4,
                perMove: 1,
            });

            splide1.mount();
            splide2.mount();
        }
    }
    window.onresize = resizeFn;
    resizeFn();
</script> -->

<script type="text/javascript" src="<?= base_url('assets/js/search.js') ?>"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>