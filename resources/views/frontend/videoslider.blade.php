<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Carousel with Center Focus</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            /* background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
        }

        .d_carousel_container {
            width: 100%;
            padding: 2rem 0;
        }

        .d_video_carousel {
            position: relative;
        }

        .d_video_carousel .owl-item {
            -webkit-backface-visibility: hidden;
            -webkit-transform: translateZ(0) scale(1.0, 1.0);
            backface-visibility: hidden;
            transform: translateZ(0) scale(1.0, 1.0);
        }

        .d_video_item {
            opacity: 0.4;
            transition: all 0.4s ease;
            margin: 0 20px;
            transform: scale(0.8);
            position: relative;
        }

        .d_video_carousel .owl-item.active .d_video_item {
            opacity: 1;
            transform: scale(1);
        }

        .d_video_container {
            position: relative;
            /* border-radius: 15px; */
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            background: #000;
            height: 400px;
            width: 100%;
        }

        .d_video_element {
            width: 100%;
            height: 100%;
            max-width: 100%;
            display: block;
            object-fit: cover;
            border-radius: 0 !important;
        }

        /* Custom Play Button */
        .d_play_overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .d_play_button {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

       .d_play_button::before
 {
    content: '';
    width: 0;
    height: 0;
    border-left: 17px solid #004F11;
    border-top: 11px solid transparent;
    border-bottom: 11px solid transparent;
    margin-left: 5px;
}

        .d_play_button:hover {
            transform: scale(1.1);
            background: rgba(255, 255, 255, 1);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        }

        .d_video_element:not([poster]) + .d_play_overlay {
            display: none;
        }

        .d_video_playing .d_play_overlay {
            display: none;
        }

        /* Custom Navigation */
        .d_video_carousel .owl-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            z-index: 100;
        }

        .d_video_carousel .owl-nav button {
            position: absolute;
            background: rgba(255, 255, 255, 0.2) !important;
            border: 2px solid rgba(255, 255, 255, 0.3) !important;
            color: white !important;
            width: 60px !important;
            height: 60px !important;
            border-radius: 50% !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            cursor: pointer !important;
            transition: all 0.3s ease !important;
            backdrop-filter: blur(10px) !important;
            font-size: 20px !important;
            font-weight: bold !important;
        }

        .d_video_carousel .owl-nav button:hover {
            background: rgba(255, 255, 255, 0.3) !important;
            border-color: rgba(255, 255, 255, 0.6) !important;
            transform: scale(1.1) !important;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2) !important;
        }

        .d_video_carousel .owl-prev {
            left: 2rem !important;
        }

        .d_video_carousel .owl-next {
            right: 2rem !important;
        }

        /* Custom Dots */
        .d_video_carousel .owl-dots {
            text-align: center;
            margin-top: 2rem;
        }

        .d_video_carousel .owl-dot {
            display: inline-block;
            width: 20px !important;
            height: 2px !important;
            border-radius: 25% !important;
            background:  #8f8e8e47  !important;            
            margin: 0 6px !important;
            cursor: pointer !important;
            transition: all 0.3s ease !important;
            border: 2px solid transparent !important;
        }

        .d_video_carousel .owl-dot:hover {
            background: rgba(255, 255, 255, 0.6) !important;
            transform: scale(1.2) !important;
        }

        .d_video_carousel .owl-dot.active {
            background: #004F11 !important;
            transform: scale(1.3) !important;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5) !important;
        }

        /* Video Controls */
        .d_video_controls {
          display: none;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
            padding: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 5;
        }

        .d_video_container:hover .d_video_controls {
            opacity: 1;
        }

        .d_progress_bar {
            width: 100%;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 2px;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .d_progress_fill {
            height: 100%;
            background: #ff3b3b;
            width: 0%;
            transition: width 0.1s ease;
        }

        .d_video_time {
            color: white;
            font-size: 14px;
            text-align: center;
        }

        /* Responsive Design */
        @media (max-width: 1000px) {
            .d_video_item {
                margin: 0;
                transform: scale(0.9);
            }
            
            .d_video_container {
                height: 350px;
            }
        }

        @media (max-width: 768px) {
            .d_video_carousel .owl-nav button {
                width: 50px !important;
                height: 50px !important;
                font-size: 18px !important;
            }
            
            .d_video_carousel .owl-prev {
                left: 1rem !important;
            }
            
            .d_video_carousel .owl-next {
                right: 1rem !important;
            }
            
            .d_play_button {
                width: 60px;
                height: 60px;
            }
            
            .d_play_button::before {
                border-left-width: 20px;
                border-top-width: 12px;
                border-bottom-width: 12px;
            }
            
            .d_video_container {
                height: 300px;
            }
        }

        @media (max-width: 576px) {
            .d_video_carousel .owl-nav button {
                width: 45px !important;
                height: 45px !important;
                font-size: 16px !important;
            }
            
            .d_play_button {
                width: 50px;
                height: 50px;
            }
            
            .d_play_button::before {
                border-left-width: 15px;
                border-top-width: 10px;
                border-bottom-width: 10px;
            }
            
            .d_video_container {
                height: 250px;
            }
        }

        /* Loading Animation */
        .d_video_container::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: translateX(-100%);
            animation: d_shimmer 2s infinite;
            z-index: 1;
        }

        @keyframes d_shimmer {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }

        .d_video_container.d_loaded::before {
            display: none;
        }

        /* Pulse animation for play button */
        @keyframes d_pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(255, 255, 255, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
            }
        }

        .d_play_button {
            animation: d_pulse 2s infinite;
        }

        .d_play_button:hover {
            animation: none;
        }
    </style>
</head>
<body>
    <div class="d_carousel_container">
        <div class="owl-carousel d_video_carousel">
            <!-- Video 1 -->
            <div class="d_video_item">
                <div class="d_video_container">
                    <video class="d_video_element" preload="metadata" poster="https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80">
                        <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4">
                    </video>
                    <div class="d_play_overlay" onclick="d_playVideo(this)">
                        <button class="d_play_button"></button>
                    </div>
                    <div class="d_video_controls">
                        <div class="d_progress_bar">
                            <div class="d_progress_fill"></div>
                        </div>
                        <div class="d_video_time">0:00 / 0:00</div>
                    </div>
                </div>
            </div>

            <!-- Video 2 -->
            <div class="d_video_item">
                <div class="d_video_container">
                    <video class="d_video_element" preload="metadata" poster="https://images.unsplash.com/photo-1559827260-dc66d52bef19?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80">
                        <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4" type="video/mp4">
                    </video>
                    <div class="d_play_overlay" onclick="d_playVideo(this)">
                        <button class="d_play_button"></button>
                    </div>
                    <div class="d_video_controls">
                        <div class="d_progress_bar">
                            <div class="d_progress_fill"></div>
                        </div>
                        <div class="d_video_time">0:00 / 0:00</div>
                    </div>
                </div>
            </div>

            <!-- Video 3 -->
            <div class="d_video_item">
                <div class="d_video_container">
                    <video class="d_video_element" preload="metadata" poster="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80">
                        <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4" type="video/mp4">
                    </video>
                    <div class="d_play_overlay" onclick="d_playVideo(this)">
                        <button class="d_play_button"></button>
                    </div>
                    <div class="d_video_controls">
                        <div class="d_progress_bar">
                            <div class="d_progress_fill"></div>
                        </div>
                        <div class="d_video_time">0:00 / 0:00</div>
                    </div>
                </div>
            </div>

            <!-- Video 4 -->
            <div class="d_video_item">
                <div class="d_video_container">
                    <video class="d_video_element" preload="metadata" poster="https://images.unsplash.com/photo-1544551763-77ef2d0cfc6c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80">
                        <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4" type="video/mp4">
                    </video>
                    <div class="d_play_overlay" onclick="d_playVideo(this)">
                        <button class="d_play_button"></button>
                    </div>
                    <div class="d_video_controls">
                        <div class="d_progress_bar">
                            <div class="d_progress_fill"></div>
                        </div>
                        <div class="d_video_time">0:00 / 0:00</div>
                    </div>
                </div>
            </div>

            <!-- Video 5 -->
            <div class="d_video_item">
                <div class="d_video_container">
                    <video class="d_video_element" preload="metadata" poster="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80">
                        <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerFun.mp4" type="video/mp4">
                    </video>
                    <div class="d_play_overlay" onclick="d_playVideo(this)">
                        <button class="d_play_button"></button>
                    </div>
                    <div class="d_video_controls">
                        <div class="d_progress_bar">
                            <div class="d_progress_fill"></div>
                        </div>
                        <div class="d_video_time">0:00 / 0:00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        // Initialize Owl Carousel
        $(document).ready(function() {
            $('.d_video_carousel').owlCarousel({
                stagePadding: 200,
                loop: true,
                margin: 10,
                items: 1,
                nav: false,
                dots: true,
                center: true,
                autoplay: false,
                smartSpeed: 800,
                navText: ['‹', '›'],
                responsive: {
                    0: {
                        items: 1,
                        stagePadding: 60
                    },
                    600: {
                        items: 1,
                        stagePadding: 100
                    },
                    1000: {
                        items: 1,
                        stagePadding: 200
                    },
                    1200: {
                        items: 1,
                        stagePadding: 250
                    },
                    1400: {
                        items: 1,
                        stagePadding: 300
                    },
                    1600: {
                        items: 1,
                        stagePadding: 350
                    },
                    1800: {
                        items: 1,
                        stagePadding: 400
                    }
                }
            });

            // Pause all videos when carousel changes
            $('.d_video_carousel').on('translated.owl.carousel', function(event) {
                d_pauseAllVideos();
            });
        });

        // Video play functionality
        function d_playVideo(playOverlay) {
            const container = playOverlay.parentElement;
            const video = container.querySelector('.d_video_element');
            
            // Pause all other videos first
            d_pauseAllVideos();
            
            // Hide overlay and play video
            playOverlay.style.display = 'none';
            container.classList.add('d_video_playing');
            video.play();
            
            // Update progress
            d_updateVideoProgress(video, container);
            
            // Show overlay when video ends
            video.addEventListener('ended', function() {
                playOverlay.style.display = 'flex';
                container.classList.remove('d_video_playing');
            });
        }

        // Pause all videos
        function d_pauseAllVideos() {
            document.querySelectorAll('.d_video_element').forEach(video => {
                video.pause();
                const container = video.parentElement;
                const overlay = container.querySelector('.d_play_overlay');
                overlay.style.display = 'flex';
                container.classList.remove('d_video_playing');
            });
        }

        // Update video progress
        function d_updateVideoProgress(video, container) {
            const progressFill = container.querySelector('.d_progress_fill');
            const timeDisplay = container.querySelector('.d_video_time');
            
            video.addEventListener('timeupdate', function() {
                if (video.duration) {
                    const progress = (video.currentTime / video.duration) * 100;
                    progressFill.style.width = progress + '%';
                    
                    const currentMin = Math.floor(video.currentTime / 60);
                    const currentSec = Math.floor(video.currentTime % 60);
                    const totalMin = Math.floor(video.duration / 60);
                    const totalSec = Math.floor(video.duration % 60);
                    
                    timeDisplay.textContent = `${currentMin}:${currentSec.toString().padStart(2, '0')} / ${totalMin}:${totalSec.toString().padStart(2, '0')}`;
                }
            });
        }

        // Handle video loading
        document.addEventListener('DOMContentLoaded', function() {
            const videos = document.querySelectorAll('.d_video_element');
            videos.forEach(video => {
                video.addEventListener('loadeddata', function() {
                    video.parentElement.classList.add('d_loaded');
                });
                
                video.addEventListener('error', function() {
                    video.parentElement.classList.add('d_loaded');
                });
            });
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                $('.d_video_carousel').trigger('prev.owl.carousel');
            }
            if (e.key === 'ArrowRight') {
                $('.d_video_carousel').trigger('next.owl.carousel');
            }
            if (e.key === ' ') {
                e.preventDefault();
                const activeVideo = document.querySelector('.owl-item.active .d_play_overlay');
                if (activeVideo) {
                    d_playVideo(activeVideo);
                }
            }
        });
    </script>
</body>
</html>