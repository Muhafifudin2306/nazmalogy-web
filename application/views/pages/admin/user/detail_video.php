<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Video Learning | NaZMaLogy </title>

    <!-- Required Style Components -->
    <?php include(APPPATH . 'views/partials/admin/general/style.php'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/pages/admin/detail_course/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/star.css') ?>">
</head>

<body id="body-pd">
    <!-- Header -->
    <?php include(APPPATH . 'views/layout/admin/header.php'); ?>
    <!-- Header -->

    <!-- Content -->
    <?php include(APPPATH . 'views/components/admin/user/detail_video.php'); ?>
    <!-- Content -->

    <!-- Script -->
    <?php include(APPPATH . 'views/partials/admin/general/script.php'); ?>

    <script src="https://www.youtube.com/iframe_api"></script>

    <script>
        // Global variable untuk menyimpan objek pemutar video
        var player;
        var isPlaying = false;
        var progressBar;
        var progressText;

        // Fungsi untuk memuat ulang halaman secara otomatis
        function reloadPage() {
            location.reload();
        }
        // Fungsi untuk memanggil API YouTube dan membuat pemutar video
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                videoId: '<?= $id_video->link ?>', // Ganti VIDEO_ID dengan ID video YouTube yang ingin diputar
                playerVars: {
                    autoplay: 1,
                    controls: 0,
                    disablekb: 1,
                    modestbranding: 1,
                    rel: 0,
                    showinfo: 0,
                    fs: 1
                },
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange,
                    'onError': onPlayerError // Menambahkan penanganan kesalahan pada pemutar video
                }
            });
            progressBar = document.getElementById('progressBar');
        }

        function onPlayerReady(event) {
            // Mendapatkan elemen iframe
            var iframe = event.target.getIframe();
            // Mengatur ukuran pemutar YouTube sesuai kebutuhan
            iframe.style.width = '100%';
            iframe.style.height = '25rem';
            document.getElementById('playPauseButton').disabled = false;
            document.getElementById('fullscreenButton').disabled = false;
            progressText = document.getElementById('progressText');
        }

        // Fungsi penanganan kesalahan pada pemutar video
        function onPlayerError(event) {
            // Memeriksa apakah kesalahan terjadi pada pemanggilan API YouTube
            if (event.data === 2 || event.data === 5 || event.data === 100 || event.data === 101 || event.data === 150) {
                // Memuat ulang halaman setelah 3 detik
                setTimeout(reloadPage, 3000);
            }
        }

        function changeVideoQuality() {
            // Mendapatkan daftar kualitas video yang tersedia
            var availableQualities = player.getAvailableQualityLevels();

            // Misalnya, Anda dapat mengubah kualitas ke "medium" saat tombol diklik
            // Ganti "medium" dengan kualitas yang diinginkan
            player.setPlaybackQuality("hd720");
        }

        function toggleFullscreen() {
            var iframe = player.getIframe();
            if (iframe.requestFullscreen) {
                iframe.requestFullscreen();
            } else if (iframe.mozRequestFullScreen) {
                iframe.mozRequestFullScreen();
            } else if (iframe.webkitRequestFullscreen) {
                iframe.webkitRequestFullscreen();
            } else if (iframe.msRequestFullscreen) {
                iframe.msRequestFullscreen();
            }
        }

        function togglePlayPause() {
            if (isPlaying) {
                player.pauseVideo();
                document.getElementById('playPauseButton').innerHTML = '<i class="bi bi-play-fill text-white"></i>';
                isPlaying = false;
            } else {
                player.playVideo();
                document.getElementById('playPauseButton').innerHTML = '<i class="bi bi-pause-fill text-white"></i>';
                isPlaying = true;
            }
        }
        // Fungsi untuk menangani perubahan status pemutar video
        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING) {
                animateProgressBar();
                startDurationTimer();
                // showVideoDuration();
            } else if (event.data == YT.PlayerState.PAUSED) {
                // Video sedang dijeda
                stopDurationTimer();
            } else if (event.data == YT.PlayerState.ENDED) {
                document.getElementById("form-id-detail").submit();
                stopDurationTimer();
            } else {
                stopProgressBarAnimation();
            }
        }

        function animateProgressBar() {
            var duration = player.getDuration();
            var currentTime = player.getCurrentTime();

            var progressPercentage = (currentTime / duration) * 100;
            progressBar.style.width = progressPercentage + '%';
            progressText.textContent = formatTime(currentTime) + ' / ' + formatTime(duration);

            if (currentTime < duration) {
                setTimeout(animateProgressBar, 1000);
            }
        }

        function stopProgressBarAnimation() {
            progressBar.style.width = '0%';
            progressText.textContent = '';
        }

        function formatTime(time) {
            var minutes = Math.floor(time / 60);
            var seconds = Math.floor(time % 60);
            return pad(minutes) + ':' + pad(seconds);
        }

        function pad(value) {
            return value < 10 ? '0' + value : value;
        }


        function showVideoDuration() {
            // Mendapatkan durasi total video
            var duration = player.getDuration();

            // Memperbarui durasi video pada elemen HTML dengan id 'duration'
            var durationElement = document.getElementById('duration');
            durationElement.innerHTML = formatTime(duration);
        }

        function startDurationTimer() {
            // Memperbarui durasi video setiap detik
            timer = setInterval(updateDuration, 1000);
        }

        function stopDurationTimer() {
            // Menghentikan pembaruan durasi video
            clearInterval(timer);
        }

        function updateDuration() {
            // Mendapatkan waktu saat ini dalam video
            var currentTime = player.getCurrentTime();

            // Mendapatkan durasi total video
            var duration = player.getDuration();

            // Menghitung durasi yang tersisa
            var remainingTime = duration - currentTime;

            // Memperbarui durasi video pada elemen HTML dengan id 'duration'
            var durationElement = document.getElementById('duration');
            durationElement.innerHTML = formatTime(remainingTime);
        }

        function formatTime(time) {
            // Mengonversi waktu dalam detik menjadi format menit:detik
            var minutes = Math.floor(time / 60);
            var seconds = Math.floor(time % 60);
            return minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
        }

        function speedUpVideo(seconds) {
            var currentTime = player.getCurrentTime();
            var newTime = currentTime + seconds;
            player.seekTo(newTime, true);
        }

        function speedDownVideo(seconds) {
            var currentTime = player.getCurrentTime();
            var newTime = currentTime - seconds;
            player.seekTo(newTime, true);
        }


        function adjustPlayerSize() {
            var playerDiv = document.getElementById('player');

            if (window.innerWidth >= 768) {
                // Gaya untuk laptop
                playerDiv.style.width = '100%';
                playerDiv.style.height = '25rem';
            } else {
                // Gaya untuk layar hp
                playerDiv.style.width = '100%';
                playerDiv.style.height = '11.4rem';
            }
        }

        // Panggil fungsi saat halaman dimuat dan saat ukuran layar berubah
        window.addEventListener('load', adjustPlayerSize);
        window.addEventListener('resize', adjustPlayerSize);
    </script>

    <script>
        var speedUpButton = document.getElementById('speedUpButton');
        speedUpButton.addEventListener('click', function() {
            speedUpVideo(5); // Ganti angka 5 dengan jumlah detik yang Anda inginkan
        }, {
            passive: true
        });

        var speedDownButton = document.getElementById('speedDownButton');
        speedDownButton.addEventListener('click', function() {
            speedDownVideo(5); // Ganti angka 5 dengan jumlah detik yang Anda inginkan
        }, {
            passive: true
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.progress-value > span').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 1500,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        });
    </script>
    <!-- Script -->
</body>

</html>