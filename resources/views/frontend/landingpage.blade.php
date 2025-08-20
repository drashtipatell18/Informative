<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travelsy - About Us</title>
    <!-- b & f -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        .d_TS_testimonial-container {
            margin: auto;
            background: white;
            border-radius: 20px;
            padding: 60px 40px;
            max-width: 900px;
            width: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .d_TS_testimonial-header {
            margin-bottom: 40px;
        }

        .d_TS_testimonial-label {
            color: #004F11;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .d_TS_testimonial-title {
            color: #333;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 30px;
            line-height: 1.2;
        }

        .d_TS_testimonial-content {
            margin-bottom: 40px;
            min-height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .d_TS_testimonial-text {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
            max-width: 600px;
            margin: 0 auto;
            position: absolute;
            width: 100%;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease;
        }

        .d_TS_testimonial-text.active {
            opacity: 1;
            transform: translateY(0);
            position: rela tive;
        }

        .d_TS_stars {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-bottom: 40px;
        }

        .d_TS_star {
            color: #ffc107;
            font-size: 30px;
        }

        .d_TS_slider-container {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding: 20px 0;
        }

        .d_TS_avatar-slider {
            display: flex;
            transition: transform 0.3s ease;
            gap: 20px;
            cursor: grab;
            user-select: none;
        }

        .d_TS_avatar {
            margin: 0 10px;
        }

        /* Corrected CSS to display clones, but with reduced opacity */
        .d_TS_avatar.clone {
            opacity: 0.7;
        }

        .d_TS_avatar-slider:active {
            cursor: grabbing;
        }

        .d_TS_avatar {
            flex-shrink: 0;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 3px solid transparent;
            position: relative;
        }

        .d_TS_avatar.active {
            transform: scale(1.2);
            border-color: #004F11;
            opacity: 1;
        }

        .d_TS_avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .d_TS_avatar-name {
            position: absolute;
            bottom: -30px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
            font-weight: 600;
            color: #333;
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .d_TS_avatar.active .d_TS_avatar-name {
            opacity: 1;
        }

        .d_TS_nav-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #004F11;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            z-index: 10;
        }

        .d_TS_nav-arrow:hover {
            background: #004F11;
            color: white;
            transform: translateY(-50%) scale(1.1);
        }

        .d_TS_nav-arrow.left {
            left: 20px;
        }

        .d_TS_nav-arrow.right {
            right: 20px;
        }

        @media (max-width: 768px) {
            .d_TS_testimonial-container {
                padding: 40px 20px;
            }

            .d_TS_testimonial-title {
                font-size: 24px;
            }

            .d_TS_testimonial-text {
                font-size: 16px;
            }

            .d_TS_avatar {
                width: 60px;
                height: 60px;
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- slider -->
    <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- style -->
    <link rel="stylesheet" href="../Style/d_app.css">
     <link rel="stylesheet" href="../Style/x_app.css">


</head>

<body>
    <!-- Header -->
    <div id="header-placeholder" ></div>
 <!-- Hero Section with Main Slider -->
  <!-- Hero Section with Main Slider -->
  <div class="x_hero_section">
    <div class="x_hero_content">
        <h1 class="x_hero_title">It's A Big World Out There,<br>Go Explore.</h1>
        <p class="x_hero_text">Lorem ipsum is simply dummy text of the printing and typesetting industry.Lorem ipsum
            has been the industry's stan</p>
        <a href="{{ route('information') }}"><button class="x_explore_btn">Explore More</button></a>
    </div>
    <div class="x_main">
        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper x_mySwiper2">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/Image/img1.png')}}" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/Image/img2.png')}}" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/Image/img3.png')}}" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/Image/img4.png')}}" />
                </div>

            </div>
            <!-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> -->
        </div>
    </div>

    <!-- Destination Cards Section (moved inside hero section) -->
    <div class="x_destinations">
        <div class="x_destination_cards_wrapper" style="overflow: hidden; position: absolute; right: -150px; bottom: 50px; z-index: 10; display: flex; width: 50%;">
            <div class="x_destination_card x_active" style="margin-bottom: 20px;">
                <img src="{{ asset('frontend/Image/img1.png')}}" alt="Beach" class="x_dest_img">
                <div class="x_dest_info">
                    <span class="x_dest_label">Get Beach</span>
                    <h3 class="x_dest_title">Lorem beach</h3>
                </div>
            </div>
            <div class="x_destination_card" style="margin-bottom: 20px;">
                <img src="{{ asset('frontend/Image/img2.png')}}" alt="Mountain" class="x_dest_img">
                <div class="x_dest_info">
                    <span class="x_dest_label">Get Lake</span>
                    <h3 class="x_dest_title">Lack ipsum</h3>
                </div>
            </div>
            <div class="x_destination_card" style="margin-bottom: 20px;">
                <img src="{{ asset('frontend/Image/img3.png')}}" alt="Desert" class="x_dest_img">
                <div class="x_dest_info">
                    <span class="x_dest_label">Dubai</span>
                    <h3 class="x_dest_title">Jumeira Burj</h3>
                </div>
            </div>
            <div class="x_destination_card">
                <img src="{{ asset('frontend/Image/img4.png')}}" alt="Desert" class="x_dest_img">
                <div class="x_dest_info">
                    <span class="x_dest_label">Dubai</span>
                    <h3 class="x_dest_title">Jumeira Burj</h3>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Landing Page Section -->
    <section class="d_LP_section ">
        <div class="container">
            <div class="row align-items-stretch pt-4 ">
                <!-- Left Column - Image Collage -->
                <div class="col-md-6 my-auto h-100">
                    <div class="d_LP_image_collage row">
                        <div class="col-6">
                            <!-- Left Images -->
                            <div class="d-flex flex-column gap-3">
                                <div class="d_LP_image_item d_LP_top_image">
                                    <img src="../Image/h (3).png" alt="Hot Air Balloons" class="d_LP_img">
                                </div>
                                <div class="d_LP_image_item d_LP_bottom_image">
                                    <img src="../Image/h (4).png" alt="Mountain View" class="d_LP_img">
                                </div>
                            </div>

                        </div>
                        <div class="col-6 ">
                            <!-- Right Image -->
                            <div class="d_LP_image_item d_LP_right_image">
                                <img src="{{ asset('frontend/Image/h(5).png')}}" alt="Girl in Yellow Dress" class="d_LP_img">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <div class="d_LP_enquiry_button">
                                <div class="d_LP_button_circle">
                                    <img src="{{ asset('frontend/Image/h(2).png')}}" alt="Enquiry Now"
                                        style="width: 100%; height: 100%; object-fit: contain;" />
                                </div>
                            </div>
                        </div>

                        <!-- Centered Image (h (2).png) -->

                    </div>
                </div>


                <!-- Right Column - Content -->
                <div class="col-md-6 h-100 ps-lg-5 ps-md-4 mt-md-0 mt-5">
                    <div class="d_LP_content">
                        <div class="d_LP_subtitle">ABOUT US</div>
                        <h2 class="d_LP_title">More About Travelsy</h2>
                        <div class="d_LP_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                officia deserunt mollit anim id est laborum.</p>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo.</p>
                        </div>
                       <a href="{{ route('about-us')}}"><button class="d_LP_read_more_btn">Read More</button></a>

                        <!-- Background Graphics -->
                        <div class="d_LP_bg_graphics">
                            <img src="{{ asset('frontend/Image/h(1).png')}}" alt="Couple reading map" class="d_LP_img">
                        </div>

                        <!-- Bottom Right Abstract Design -->

                    </div>
                </div>
            </div>

        </div>
        <div class="d_LP_abstract_design"></div>
    </section>


    <!-- OUR SERVICEs -->

    <section class="d_OS_services_section position-relative py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h6 class="d_OS_subtitle" style="color: #004F11;">OUR SERVICES</h6>
                <h2 class="d_OS_title fw-bold">We Offer Best Services</h2>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-6 col-lg-3">
                    <div class="d_OS_card text-center p-4 bg-white shadow-sm h-100 rounded-4 position-relative">
                        <div class="d_OS_icon_box position-relative mx-auto mb-4">
                            <div class="d_OS_icon_bg"></div>
                            <img src="{{ asset('frontend/Image/icon(1).png')}}" alt="Explore the world" class="d_OS_icon_positioned">
                        </div>
                        <h5 class="fw-bold">Explore the world</h5>
                        <p class="mb-0 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.</p>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="d_OS_card text-center p-4 bg-white shadow-sm h-100 rounded-4 position-relative">
                        <div class="d_OS_icon_box position-relative mx-auto mb-4">
                            <div class="d_OS_icon_bg"></div>
                            <img src="{{ asset('frontend/Image/icon(4).png')}}" alt="Explore the world" class="d_OS_icon_positioned">
                        </div>
                        <h5 class="fw-semibold">Best Flight Options</h5>
                        <p class="mb-0 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="d_OS_card text-center p-4 bg-white shadow-sm h-100 rounded-4 position-relative">
                        <div class="d_OS_icon_box position-relative mx-auto mb-4">
                            <div class="d_OS_icon_bg"></div>
                            <img src="{{ asset('frontend/Image/icon(3).png')}}" alt="Explore the world" class="d_OS_icon_positioned">
                        </div>
                        <h5 class="fw-semibold">Relax & have fun</h5>
                        <p class="mb-0 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="d_OS_card text-center p-4 bg-white shadow-sm h-100 rounded-4 position-relative">
                        <div class="d_OS_icon_box position-relative mx-auto mb-4">
                            <div class="d_OS_icon_bg"></div>
                            <img src="{{ asset('frontend/Image/icon(2).png')}}" alt="Explore the world" class="d_OS_icon_positioned">
                        </div>
                        <h5 class="fw-semibold">Cost Efficient</h5>
                        <p class="mb-0 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Left Background -->
        <img src="../Image/h (1).png" class="d_OS_bg_top_left" alt="bg top left" />
        <!-- Bottom Right Background -->
        <img src="../Image/plus.png" class="d_OS_bg_bottom_right" alt="bg bottom right" />
    </section>

    <section class="d_WC_section py-5">
        <div class="container">
            <div class="row align-items-center gy-5">
                <!-- Left Content -->
                <div class="col-md-6">
                    <div class="d_WC_content">
                        <h6 class="fw-semibold mb-2" style="color: #004F11;">WHY CHOOSE US</h6>
                        <h2 class="fw-bold d_WC_heading mb-3">Our Experiences Meet High<br>Quality Standards</h2>
                        <p class="text-muted mb-4">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>Lorem Ipsum
                        </p>

                        <div class="row">
                            <div class="col-6">
                                <ul class="list-unstyled d_WC_list mb-3">
                                    <li><i class="fa fa-check  me-2" style="color: #004F11;"></i>Best Services</li>
                                    <li><i class="fa fa-check  me-2" style="color: #004F11;"></i>Competitive Price</li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="list-unstyled d_WC_list mb-3">
                                    <li><i class="fa fa-check me-2" style="color: #004F11;"></i>Best Guide</li>
                                    <li class="d-flex gap-2"><i class="fa fa-check mt-1" style="color: #004F11;"></i><p class="mb-0">Best Travel Agency</p></li>
                                </ul>
                            </div>
                        </div>

                        <a href="{{ route('contact')}}"><button class="btn d_WC_btn_outline_success mt-2">Contact Us</button></a>
                    </div>
                </div>

                <!-- Right Images -->
                <div class="col-md-6">
                    <div class="d_WC_images position-relative">
                        <img src="{{ asset('frontend/Image/r1.png')}}" alt="Mountains" class="img-fluid ">
                        <div class="d_WC_img_front_wrapper ">
                            <!-- <img src="../Image/photo2.png" alt="Hiker" class="img-fluid d_WC_img_front"> -->
                            <button class="btn d_WC_btn_success">Explore More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    <section class="d_g_dest_section position-relative py-5">
        <div class="container">
          <!-- Section Heading -->
          <div class="text-center mb-5">
            <h6 class="text-success fw-semibold">DESTINATIONS</h6>
            <h2 class="fw-bold">Top Attraction Destinations</h2>
          </div>

          <div class="row g-4">
            <!-- Left Side: 2 Rows of 3 Cards -->
            <div class="col-lg-9">
              <div class="row g-4">
                <!-- Row 1 -->
                <div class="col-md-4">
                  <div class="d_g_card position-relative text-white rounded overflow-hidden">
                    <img src="../Image/g (1).png" class="img-fluid w-100 h-100 object-fit-cover" alt="Manali">
                    <div class="d_g_overlay p-3">
                      <h5 class="mb-1">Manali</h5>
                      <small>13 Days</small>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="d_g_card position-relative text-white rounded overflow-hidden">
                    <img src="../Image/g (1).jpg" class="img-fluid w-100 h-100 object-fit-cover" alt="Kashmir">
                    <div class="d_g_overlay p-3">
                      <h5 class="mb-1">Kashmir</h5>
                      <small>10 Days</small>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="d_g_card position-relative text-white rounded overflow-hidden">
                    <img src="../Image/g (5).png" class="img-fluid w-100 h-100 object-fit-cover" alt="Malaysia">
                    <div class="d_g_overlay p-3">
                      <h5 class="mb-1">Malaysia</h5>
                      <small>07 Days</small>
                    </div>
                  </div>
                </div>

                <!-- Row 2 -->
                <div class="col-md-6">
                  <div class="d_g_card position-relative text-white rounded overflow-hidden">
                    <img src="../Image/g (4).png" class="img-fluid w-100 h-100 object-fit-cover" alt="Bali">
                    <div class="d_g_overlay p-3">
                      <h5 class="mb-1">Bali</h5>
                      <small>13 Days</small>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="d_g_card position-relative text-white rounded overflow-hidden">
                    <img src="../Image/g (3).png" class="img-fluid w-100 h-100 object-fit-cover" alt="Thailand">
                    <div class="d_g_overlay p-3">
                      <h5 class="mb-1">Thailand</h5>
                      <small>20 Days</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Right Side: Single Tall Card (Gujarat) -->
            <div class="col-lg-3">
              <div class="d_g_card_vertical position-relative text-white rounded overflow-hidden h-100">
                <img src="../Image/g (2).png" class="img-fluid w-100 h-100 object-fit-cover" alt="Gujarat">
                <div class="d_g_overlay p-3">
                  <h5 class="mb-1">Gujarat</h5>
                  <small>10 Days</small>
                </div>
              </div>
            </div>
          </div>

          <!-- Backgrounds -->
          <img src="../Image/bg2.png" alt="Airplane" class="d_g_bg_airplane">
          <img src="../Image/plus.png" alt="Dots" class="d_g_bg_dots">
        </div>
      </section>


      <div class="d_TS_testimonial-container">
        <button class="d_TS_nav-arrow left"><i class="fa-solid fa-angle-left"></i></button>
        <button class="d_TS_nav-arrow right"><i class="fa-solid fa-chevron-right"></i></button>

        <div class="d_TS_testimonial-header">
            <div class="d_TS_testimonial-label">TESTIMONIAL</div>
            <h2 class="d_TS_testimonial-title">Hear From Our Happy Travelers</h2>
        </div>

        <div class="d_TS_testimonial-content">
            <div class="d_TS_testimonial-text active" id="activeTestimonial">
                I had the most incredible vacation experience thanks to the amazing team at XYZ Travel Agency! From the moment I contacted them, their friendly and knowledgeable staff helped me plan the perfect itinerary. They took care of every detail, from booking flights and accommodations to arranging local tours and activities.
            </div>
        </div>

        <div class="d_TS_stars">
            <span class="d_TS_star">★</span>
            <span class="d_TS_star">★</span>
            <span class="d_TS_star">★</span>
            <span class="d_TS_star">★</span>
            <span class="d_TS_star">★</span>
        </div>

        <div class="d_TS_slider-container">
            <div class="d_TS_avatar-slider" id="avatarSlider">
                <div class="d_TS_avatar clone" data-index="4">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&h=150&fit=crop&crop=face" alt="Klaus">
                    <div class="d_TS_avatar-name">Klaus</div>
                </div>
                <div class="d_TS_avatar clone" data-index="5">
                    <img src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?w=150&h=150&fit=crop&crop=face" alt="Bryan">
                    <div class="d_TS_avatar-name">Bryan</div>
                </div>
                <div class="d_TS_avatar clone" data-index="6">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&h=150&fit=crop&crop=face" alt="Emma">
                    <div class="d_TS_avatar-name">Emma</div>
                </div>

                <div class="d_TS_avatar" data-index="0">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b47c?w=150&h=150&fit=crop&crop=face" alt="Helen">
                    <div class="d_TS_avatar-name">Helen</div>
                </div>
                <div class="d_TS_avatar" data-index="1">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face" alt="Peter">
                    <div class="d_TS_avatar-name">Peter</div>
                </div>
                <div class="d_TS_avatar" data-index="2">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face" alt="Victor">
                    <div class="d_TS_avatar-name">Victor</div>
                </div>
                <div class="d_TS_avatar" data-index="3">
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face" alt="Nora Achola">
                    <div class="d_TS_avatar-name">Nora Achola</div>
                </div>
                <div class="d_TS_avatar" data-index="4">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&h=150&fit=crop&crop=face" alt="Klaus">
                    <div class="d_TS_avatar-name">Klaus</div>
                </div>
                <div class="d_TS_avatar" data-index="5">
                    <img src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?w=150&h=150&fit=crop&crop=face" alt="Bryan">
                    <div class="d_TS_avatar-name">Bryan</div>
                </div>
                <div class="d_TS_avatar" data-index="6">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&h=150&fit=crop&crop=face" alt="Emma">
                    <div class="d_TS_avatar-name">Emma</div>
                </div>
                <div class="d_TS_avatar" data-index="7">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&h=150&fit=crop&crop=face" alt="Emma">
                    <div class="d_TS_avatar-name">Emma</div>
                </div>

                <div class="d_TS_avatar clone" data-index="0">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b47c?w=150&h=150&fit=crop&crop=face" alt="Helen">
                    <div class="d_TS_avatar-name">Helen</div>
                </div>
                <div class="d_TS_avatar clone" data-index="1">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face" alt="Peter">
                    <div class="d_TS_avatar-name">Peter</div>
                </div>
                <div class="d_TS_avatar clone" data-index="2">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face" alt="Victor">
                    <div class="d_TS_avatar-name">Victor</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        class TestimonialSlider {
            constructor() {
                this.slider = document.getElementById('avatarSlider');
                this.allAvatars = document.querySelectorAll('.d_TS_avatar');
                this.originalAvatars = document.querySelectorAll('.d_TS_avatar:not(.clone)');
                this.testimonialElement = document.getElementById('activeTestimonial');
                this.leftArrow = document.querySelector('.d_TS_nav-arrow.left');
                this.rightArrow = document.querySelector('.d_TS_nav-arrow.right');

                this.testimonials = [
                    "I had the most incredible vacation experience thanks to the amazing team at XYZ Travel Agency! From the moment I contacted them, their friendly and knowledgeable staff helped me plan the perfect itinerary. They took care of every detail, from booking flights and accommodations to arranging local tours and activities.",
                    "Outstanding service from start to finish! The team went above and beyond to ensure our honeymoon was perfect. Every recommendation was spot-on, and the attention to detail was remarkable. We couldn't have asked for a better travel experience.",
                    "Professional, reliable, and incredibly helpful. Victor made our family vacation stress-free and memorable. The customized itinerary was exactly what we needed, and the 24/7 support during our trip gave us peace of mind.",
                    "Nora's expertise in European travel is unmatched! She crafted the perfect 10-day tour that exceeded all our expectations. Her local knowledge and connections made all the difference in creating an authentic travel experience.",
                    "Klaus provided exceptional service for our business trip. Everything was organized perfectly, from flights to accommodations to meeting venues. His attention to detail and professionalism made our corporate travel seamless.",
                    "Bryan helped us plan the adventure of a lifetime! His recommendations for off-the-beaten-path destinations were incredible. The entire trip was well-coordinated, and we felt supported throughout our journey.",
                    "Emma's creativity in designing our cultural tour was amazing! She understood exactly what we were looking for and delivered an experience that was both educational and enjoyable. Highly recommend her services!",
                    "Emma's creativity in designing our cultural tour was amazing! She understood exactly what we were looking for and delivered an experience that was both educational and enjoyable. Highly recommend her services!"
                ];

                this.currentIndex = 0;
                this.totalOriginalAvatars = this.originalAvatars.length;
                // Start with the first original avatar, which is at index 2 in the full list
                this.activeAvatarIndex = 3;
                this.isDragging = false;
                this.startX = 0;
                this.currentX = 0;
                this.initialTransform = 0;

                this.init();
            }

            init() {
                this.setInitialPosition();
                this.addEventListeners();
            }

            setInitialPosition() {
                this.allAvatars[this.activeAvatarIndex].classList.add('active');
                this.updateTestimonial();
                this.centerActiveAvatar();
            }

            addEventListeners() {
                this.allAvatars.forEach((avatar, index) => {
                    avatar.addEventListener('click', () => {
                        const dataIndex = parseInt(avatar.getAttribute('data-index'));
                        this.setActiveByDataIndex(dataIndex);
                    });
                });

                this.leftArrow.addEventListener('click', () => {
                    this.prev();
                });

                this.rightArrow.addEventListener('click', () => {
                    this.next();
                });

                this.slider.addEventListener('mousedown', this.handleStart.bind(this));
                this.slider.addEventListener('touchstart', this.handleStart.bind(this));

                document.addEventListener('mousemove', this.handleMove.bind(this));
                document.addEventListener('touchmove', this.handleMove.bind(this));

                document.addEventListener('mouseup', this.handleEnd.bind(this));
                document.addEventListener('touchend', this.handleEnd.bind(this));

                this.slider.addEventListener('contextmenu', (e) => e.preventDefault());
            }

            handleStart(e) {
                this.isDragging = true;
                this.startX = e.type === 'mousedown' ? e.clientX : e.touches[0].clientX;
                this.slider.style.transition = 'none';

                const style = window.getComputedStyle(this.slider);
                const matrix = new DOMMatrix(style.transform);
                this.initialTransform = matrix.m41;
            }

            handleMove(e) {
                if (!this.isDragging) return;

                e.preventDefault();
                this.currentX = e.type === 'mousemove' ? e.clientX : e.touches[0].clientX;
                const deltaX = this.currentX - this.startX;

                this.slider.style.transform = `translateX(${this.initialTransform + deltaX}px)`;
            }

            handleEnd() {
                if (!this.isDragging) return;

                this.isDragging = false;
                this.slider.style.transition = 'transform 0.3s ease';

                const deltaX = this.currentX - this.startX;
                const threshold = 50;

                if (Math.abs(deltaX) > threshold) {
                    if (deltaX > 0) {
                        this.prev();
                    } else {
                        this.next();
                    }
                } else {
                    this.centerActiveAvatar();
                }
            }

            setActiveByDataIndex(dataIndex) {
                this.currentIndex = dataIndex;
                this.updateActiveAvatar();
                this.updateTestimonial();
                this.centerActiveAvatar();
            }

            updateActiveAvatar() {
                this.allAvatars.forEach(avatar => avatar.classList.remove('active'));

                // Find all avatars with the current data-index and activate them
                this.allAvatars.forEach((avatar, index) => {
                    if (parseInt(avatar.getAttribute('data-index')) === this.currentIndex) {
                        avatar.classList.add('active');
                        // Set the activeAvatarIndex to the first non-cloned avatar with this data-index
                        if (!avatar.classList.contains('clone')) {
                             this.activeAvatarIndex = index;
                        }
                    }
                });
            }

            updateTestimonial() {
                this.testimonialElement.style.opacity = '0';
                this.testimonialElement.style.transform = 'translateY(20px)';

                setTimeout(() => {
                    this.testimonialElement.textContent = this.testimonials[this.currentIndex];
                    this.testimonialElement.style.opacity = '1';
                    this.testimonialElement.style.transform = 'translateY(0)';
                }, 250);
            }

            centerActiveAvatar() {
                const containerWidth = this.slider.parentElement.offsetWidth;
                const activeAvatar = this.allAvatars[this.activeAvatarIndex];

                const avatarCenter = activeAvatar.offsetLeft + activeAvatar.offsetWidth / 2;
                const containerCenter = containerWidth / 2;
                const transform = containerCenter - avatarCenter;

                this.slider.style.transform = `translateX(${transform}px)`;
            }

            next() {
                this.currentIndex = (this.currentIndex + 1) % this.totalOriginalAvatars;
                this.activeAvatarIndex++;

                // Check if we've moved to the end clones and need to "jump" back
                if (this.activeAvatarIndex >= this.allAvatars.length - 2) {
                    this.slider.style.transition = 'none';
                    this.activeAvatarIndex = 2; // Jump back to first original
                    this.centerActiveAvatar();
                    setTimeout(() => { this.slider.style.transition = 'transform 0.3s ease'; }, 50);
                }

                this.updateActiveAvatar();
                this.updateTestimonial();
                if (this.slider.style.transition !== 'none') {
                    this.centerActiveAvatar();
                }
            }

            prev() {
                this.currentIndex = (this.currentIndex - 1 + this.totalOriginalAvatars) % this.totalOriginalAvatars;
                this.activeAvatarIndex--;

                // Check if we've moved to the beginning clones and need to "jump" back
                if (this.activeAvatarIndex < 2) {
                    this.slider.style.transition = 'none';
                    this.activeAvatarIndex = this.allAvatars.length - 3; // Jump to last original
                    this.centerActiveAvatar();
                    setTimeout(() => { this.slider.style.transition = 'transform 0.3s ease'; }, 50);
                }

                this.updateActiveAvatar();
                this.updateTestimonial();
                if (this.slider.style.transition !== 'none') {
                    this.centerActiveAvatar();
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            new TestimonialSlider();
        });

        window.addEventListener('resize', () => {
            const slider = new TestimonialSlider(); // Re-initialize or get instance
            slider.centerActiveAvatar();
        });
    </script>

    <!-- Footer -->
    <div id="footer-placeholder"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- slider -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
     <!-- Initialize Swiper -->
     <script>
        // Wait for DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            var swiper2 = new Swiper(".x_mySwiper2", {
                spaceBetween: 0,
                effect: "fade",
                loop: true,

                // navigation: {
                //     nextEl: ".swiper-button-next",
                //     prevEl: ".swiper-button-prev",
                // },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });

            // Get all destination cards
            const destinationCards = document.querySelectorAll('.x_destination_card');

            // Sync destination cards with slider
            destinationCards.forEach(function(card, index) {
                card.addEventListener('click', function() {
                    // Remove active class from all cards
                    destinationCards.forEach(function(c) {
                        c.classList.remove('x_active');
                    });

                    // Add active class to clicked card
                    this.classList.add('x_active');

                    // Move active card to first position with smooth animation
                    const wrapper = document.querySelector('.x_destination_cards_wrapper');
                    const activeCard = this;

                    // Add transition for smooth movement
                    wrapper.style.transition = 'all 0.5s ease';

                    // Move the active card to the beginning
                    wrapper.insertBefore(activeCard, wrapper.firstChild);

                    // Change slide to match the card (accounting for loop)
                    swiper2.slideToLoop(index);
                });
            });

            // Update active card when slide changes
            swiper2.on('slideChange', function() {
                // Remove active class from all cards
                destinationCards.forEach(function(card) {
                    card.classList.remove('x_active');
                });

                // Add active class to card matching current slide
                const activeIndex = swiper2.realIndex;
                if (destinationCards[activeIndex]) {
                    const activeCard = destinationCards[activeIndex];
                    activeCard.classList.add('x_active');

                    // Move active card to first position
                    const wrapper = document.querySelector('.x_destination_cards_wrapper');
                    wrapper.style.transition = 'all 0.5s ease';
                    wrapper.insertBefore(activeCard, wrapper.firstChild);
                }
            });

            // Set initial active card based on first slide
            setTimeout(function() {
                destinationCards[0].classList.add('x_active');
            }, 100);
        });
    </script>
    <script>
        // Initialize testimonial slider
        const testimonialSwiper = new Swiper('.testimonial-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            //   autoplay: {
            //     delay: 5000,
            //     disableOnInteraction: false,
            //   },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            }
        });

        // Initialize avatar slider
        const avatarSwiper = new Swiper('.d_TS_avatar-swiper', {
            slidesPerView: 'auto',
            spaceBetween: 20,
            centeredSlides: true,
            loop: false,
            allowTouchMove: true,
            breakpoints: {
                320: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                480: {
                    slidesPerView: 5,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 7,
                    spaceBetween: 25,
                }
            }
        });

        // Sync the sliders
        testimonialSwiper.on('slideChange', function () {
            avatarSwiper.slideTo(testimonialSwiper.realIndex);
        });

        avatarSwiper.on('slideChange', function () {
            testimonialSwiper.slideTo(avatarSwiper.realIndex);
        });

        // Add click functionality to avatars
        document.querySelectorAll('.d_TS_avatar-item').forEach((avatar, index) => {
            avatar.addEventListener('click', () => {
                testimonialSwiper.slideTo(index);
                avatarSwiper.slideTo(index);
            });
        });
    </script>
     <script>
        // Load header and footer
        $(document).ready(function () {
            $("#header-placeholder").load("header.html");
            $("#footer-placeholder").load("footer.html");
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#header-placeholder").load("header.html", function () {
                const currentPage = window.location.pathname.split("/").pop();
                const navLinks = document.querySelectorAll('.d_nav_link');

                navLinks.forEach(link => {
                    if (link.getAttribute('href') === currentPage) {
                        link.classList.add('active');
                    }
                });
            });
        });
    </script>
<script>
    $(document).ready(function () {
        $("#footer-placeholder").load("footer.html", function () {
            const currentPage = window.location.pathname.split("/").pop();
            const footerLinks = document.querySelectorAll(".d_footer_link");

            footerLinks.forEach(link => {
                if (link.getAttribute("href") === currentPage) {
                    link.classList.add("active");
                }
            });
        });
    });
</script>

</body>

</html>
