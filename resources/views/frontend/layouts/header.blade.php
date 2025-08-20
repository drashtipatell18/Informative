<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <!-- b & f -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- slider -->
    <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('frontend/Style/d_app.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/Style/x_app.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/Style/z_app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>

<body>
    <!-- Header Section -->
    <header class="d_header mb-5">
        <nav class="d_navbar navbar navbar-expand-md">
            <div class="container ">
                <!-- Logo -->
                <a class="d_logo navbar-brand" href="#">
                    LOGO
                </a>

                <!-- Mobile Toggle Button -->
                <button class="d_toggle navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Links -->
                <div class="d_nav collapse navbar-collapse justify-content-center align-items-center    "
                    id="navbarNav">
                    <ul class="d_nav_list navbar-nav mx-auto">
                        <li class="d_nav_item nav-item">
                            <a class="d_nav_link nav-link" href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="d_nav_item nav-item">
                            <a class="d_nav_link nav-link" href="{{ route('domestic') }}">Domestic</a>
                        </li>
                        <li class="d_nav_item nav-item">
                            <a class="d_nav_link nav-link" href="{{ route('international') }}">International</a>
                        </li>
                        <li class="d_nav_item nav-item">
                            <a class="d_nav_link nav-link" href="{{ route('about-us') }}">About us</a>
                        </li>
                        <li class="d_nav_item nav-item">
                            <a class="d_nav_link nav-link" href="{{ route('contactf') }}">Contact Us</a>
                        </li>
                    </ul>

                    <!-- Call to Action Button -->
                    <div class="d_cta">
                        <button class="d_enquiry_btn" data-bs-toggle="modal" data-bs-target="#dEMEnquiryModal">
                            Enquiry Now
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Enquiry Modal -->
    <div class="modal fade d_EM_modal" id="dEMEnquiryModal" tabindex="-1" aria-labelledby="dEMModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content p-lg-4 p-md-2 p-1">
                <div class="modal-header pt-0 border-0 pb-0">
                    <h5 class="modal-title fw-semibold" id="dEMModalLabel">Submit your Enquiry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr class="my-2" />
                <div class="modal-body pt-0">
                    <form>
                        <div class="row g-3">
                            <!-- Name -->
                            <div class="col-md-6">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control d_EM_input" placeholder="Enter your name"
                                    required>
                            </div>
                            <!-- Email -->
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control d_EM_input" placeholder="Enter your email"
                                    required>
                            </div>
                            <!-- Phone -->
                            <div class="col-md-6">
                                <label class="form-label">Phone No.</label>
                                <!-- <input type="tel" class="form-control d_EM_input" placeholder="Enter phone no."
                                    required> -->
                                <input type="tel" class="form-control d_EM_input" placeholder="Enter phone no."
                                    maxlength="10" pattern="[0-9]{10}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                            </div>
                            <!-- Travel Date -->
                            <div class="col-md-6">
                                <label class="form-label">Travel Date</label>
                                <input type="date" class="form-control d_EM_input" required>
                            </div>
                            <!-- City -->
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control d_EM_input" placeholder="Enter your city"
                                    required>
                            </div>
                            <!-- Passenger -->
                            <div class="col-md-6">
                                <label class="form-label">Total Passenger</label>
                                <input type="number" class="form-control d_EM_input"
                                    placeholder="Enter total no of passenger" required>
                            </div>
                        </div>

                        <!-- Interests -->
                        <div class="mt-4">
                            <label class="form-label">Select your interest</label>
                            <div class="d-flex flex-wrap gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label">Beach Holidays</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label">Adventure Holidays</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label">Nightlife Holidays</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label">Self Drive Holidays</label>
                                </div>
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="mt-4">
                            <label class="form-label">Message</label>
                            <textarea rows="4" class="form-control d_EM_input" placeholder="Enter your message" required></textarea>
                        </div>

                        <!-- Submit -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success px-5">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- slider -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Custom JavaScript for scroll effect and mobile menu -->
    <script>
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.d_header');
            if (window.scrollY > 50) {
                header.classList.add('d_scrolled');
            } else {
                header.classList.remove('d_scrolled');
            }
        });

        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const navbarToggler = document.querySelector('.d_toggle');
            const navbarCollapse = document.querySelector('.d_nav');
            const navLinks = document.querySelectorAll('.d_nav_link');

            // Close mobile menu when clicking on a link
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 768) {
                        const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                            hide: true
                        });
                    }
                });
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                const isClickInsideNav = navbarCollapse.contains(event.target);
                const isClickOnToggler = navbarToggler.contains(event.target);

                if (!isClickInsideNav && !isClickOnToggler && navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                        hide: true
                    });
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768 && navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                        hide: true
                    });
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentPage = window.location.pathname.split("/").pop();
            const navLinks = document.querySelectorAll('.d_nav_link');

            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPage) {
                    link.classList.add('active');
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const enquiryForm = document.querySelector('#dEMEnquiryModal form');

            enquiryForm.addEventListener('submit', function(event) {
                event.preventDefault(); // stop normal submission

                let isValid = true;
                let phoneInput = enquiryForm.querySelector('input[type="tel"]');
                let emailInput = enquiryForm.querySelector('input[type="email"]');

                // Check required fields
                enquiryForm.querySelectorAll('[required]').forEach(input => {
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });

                // Extra: validate phone number
                if (!/^\d{10}$/.test(phoneInput.value)) {
                    phoneInput.classList.add('is-invalid');
                    isValid = false;
                }

                // Extra: validate email format
                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
                    emailInput.classList.add('is-invalid');
                    isValid = false;
                }

                if (isValid) {
                    alert('Form submitted successfully!');
                    enquiryForm.reset();
                    bootstrap.Modal.getInstance(document.getElementById('dEMEnquiryModal')).hide();
                }
            });
        });
        @stack('scripts')
    </script>


</body>

</html>
