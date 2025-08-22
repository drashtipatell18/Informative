    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Infomative</title>
        <!-- Bootstrap & Font Awesome -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

        <!-- slider -->
        <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
        <!-- style -->
        <link rel="stylesheet" href="{{ asset('frontend/Style/d_app.css') }}">

    </head>

    <body>

        <!-- Footer Section -->
        <footer class="d_footer">
            <div class="d_footer_main">
                <div class="container">
                    <div class="row">
                        <!-- LOGO Column -->
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="d_footer_column">
                                <a href="landingpage.html" class="d_footer_heading d_footer_logo_link">LOGO</a>
                                <p class="d_footer_text">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's stan
                                </p>
                                <div class="d_social_icons">
                                    <a href="https://twitter.com" class="d_social_icon" target="_blank"
                                        rel="noopener noreferrer">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="https://instagram.com" class="d_social_icon" target="_blank"
                                        rel="noopener noreferrer">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="https://youtube.com" class="d_social_icon" target="_blank"
                                        rel="noopener noreferrer">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Support Column -->
                        <div class="col-lg-2 col-md-3 col-6 text-center">
                            <div class="d_footer_column">
                                <h3 class="d_footer_heading">Support</h3>
                                <ul class="d_footer_links">
                                    <li><a href="{{ route('about-us') }}" class="d_footer_link">About Us</a></li>
                                    <li><a href="{{ route('contactf') }}" class="d_footer_link">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Category Column -->
                        <div class="col-lg-2 col-md-3 col-6 text-center">
                            <div class="d_footer_column">
                                <h3 class="d_footer_heading">Category</h3>
                                <ul class="d_footer_links">
                                    <li><a href="{{ route('domestic') }}" class="d_footer_link">Domestic</a></li>
                                    <li><a href="{{ route('international') }}" class="d_footer_link">International</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Newsletter Column -->
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="d_footer_column">
                                <h3 class="d_footer_heading">Newsletter</h3>
                                <div class="d_newsletter_form">
                                    <div class="d_input_group">
                                        <input type="email" class="d_newsletter_input"
                                            placeholder="Your email here...">
                                        <button class="d_subscribe_btn">Subscribe</button>
                                    </div>
                                    <p class="d_newsletter_text">
                                        Be the first to know about our latest travel deals and updates, Subscribe Now
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright Section -->
            <div class="d_footer_bottom">
                <div class="container">
                    <div class="d_copyright_text">
                        All Right Reserved © 2024
                    </div>
                </div>
            </div>

            <!-- Background Images -->
            <div class="d_footer_bg_images">
                <div class="d_travel_items"></div>
                <div class="d_mountain_illustration"></div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- slider -->
        <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script>
            // Wait for DOM to be fully loaded
            document.addEventListener('DOMContentLoaded', function() {
                var swiper2 = new Swiper(".x_mySwiper2", {
                    spaceBetween: 0,
                    effect: "fade",
                    loop: true,
                    //autoplay: {
                    //    delay: 3000,
                    //    disableOnInteraction: false,
                    //},
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
        @stack('scripts');

    </body>

    </html>
