@extends('frontend.layouts.main')
@section('content')
    <!-- Hero Section -->
    <section class="z_contact_hero pt-5 ">
        <div class="z_contact_hero_overlay"></div>
        <div class="z_contact_hero_content">
            <h1 class="z_contact_hero_title">Contact Us</h1>
            <p class="z_contact_hero_breadcrumb"><a href="landingpage.html"
                    style="text-decoration:none;color:inherit;">Home</a> / Contact Us</p>
        </div>
    </section>

    <!-- Main Content Area -->
    <section class="z_contact_main">
        <div class="container">
            <div class="z_contact_section_header">
                <h2 class="z_contact_section_title">Let's Stay In Touch!</h2>
                <p class="z_contact_section_subtitle">Any question or remarks? just write us a message!</p>
            </div>

            <!-- Contact Form and Map Container -->
            <div class="z_contact_container">
                <div class="row">
                    <!-- Map Section -->
                    <div class="col-lg-5 col-md-12 mb-4">
                        <div class="z_contact_map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26430.393553120906!2d-118.43209796322542!3d34.09042349498231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bc04d6d147ab%3A0xd6c7c379fd081ed1!2sLos%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sin!4v1645000000000!5m2!1sen!2sin"
                                width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy">
                            </iframe>
                        </div>
                    </div>

                    <!-- Contact Form Section -->
                    <div class="col-lg-7 col-md-12 mb-4">
                        <div class="z_contact_form">
                            <form id="contactForm" novalidate action="{{ route('contactfstore')}}" method="POST">
                               @csrf
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="name" class="z_contact_form_label">Name</label>
                                        <input type="text" class="z_contact_form_input" id="name" name="name"
                                            placeholder="Enter your name" required minlength="2">
                                        <div class="invalid-feedback">Please enter your name (at least 2 characters).</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="z_contact_form_label">Email</label>
                                        <input type="email" class="z_contact_form_input" id="email" name="email"
                                            placeholder="Enter your email" required>
                                        <div class="invalid-feedback">Please enter a valid email address.</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="z_contact_form_label">Phone No.</label>
                                        <input type="tel" class="z_contact_form_input" id="phone" name="phone"
                                            placeholder="Enter your phone no" required >
                                        <div class="invalid-feedback">Please enter a valid phone number (10-15 digits).
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="city" class="z_contact_form_label">City</label>
                                        <input type="text" class="z_contact_form_input" id="city" name="city"
                                            placeholder="Enter your city" required>
                                        <div class="invalid-feedback">Please enter your city.</div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="z_contact_form_label">Message</label>
                                    <textarea class="z_contact_form_textarea" id="message" name="message" rows="4" placeholder="Enter your message"
                                        required minlength="5"></textarea>
                                    <div class="invalid-feedback">Please enter your message (at least 5 characters).</div>
                                </div>
                                <div class="z_contact_form_btn_parent">
                                    <button type="submit" class="z_contact_form_btn">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Information Cards -->
            <div class="z_contact_cards">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="z_contact_card">
                            <div class="z_contact_card_icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h3 class="z_contact_card_title">Address</h3>
                            <p class="z_contact_card_text">4140 Parker Rd. Allentown, New Mexico 31134</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="z_contact_card">
                            <div class="z_contact_card_icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h3 class="z_contact_card_title">Call Us</h3>
                            <p class="z_contact_card_text">(246) 565 1100<br>(246) 565 1109</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="z_contact_card">
                            <div class="z_contact_card_icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h3 class="z_contact_card_title">Email Us</h3>
                            <p class="z_contact_card_text">exampl@gmail.com<br>example@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@push('scripts')
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // Configure toastr options
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        // Show success message if exists
        @if(session('success'))
            console.log('Success session exists: {{ session('success') }}');
            if (typeof toastr !== 'undefined') {
                toastr.success('{{ session('success') }}');
            } else {
                alert('{{ session('success') }}');
            }
        @else
            console.log('No success session found');
        @endif

        // Show error message if exists
        @if(session('error'))
            console.log('Error session exists: {{ session('error') }}');
            if (typeof toastr !== 'undefined') {
                toastr.error('{{ session('error') }}');
            } else {
                alert('{{ session('error') }}');
            }
        @endif

        // Show validation errors
        @if ($errors->any())
            console.log('Validation errors exist');
            @foreach ($errors->all() as $error)
                if (typeof toastr !== 'undefined') {
                    toastr.error('{{ $error }}');
                } else {
                    alert('{{ $error }}');
                }
            @endforeach
        @endif
    </script>

    <script>
        // Load header and footer
        $(document).ready(function() {
            $("#header-placeholder").load("header.html");
            $("#footer-placeholder").load("footer.html");
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#header-placeholder").load("header.html", function() {
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
        $(document).ready(function() {
            $("#footer-placeholder").load("footer.html", function() {
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

    <script>
        $(document).ready(function() {
            // Contact form validation
            $('#contactForm').on('submit', function(e) {
                console.log('Form submitted!'); // Debug log

                var isValid = true;
                var name = $('#name');
                var email = $('#email');
                var phone = $('#phone');
                var city = $('#city');
                var message = $('#message');

                // Name validation
                if (name.val().trim().length < 2) {
                    name.addClass('is-invalid');
                    isValid = false;
                    console.log('Name validation failed');
                } else {
                    name.removeClass('is-invalid');
                }

                // Email validation
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(email.val().trim())) {
                    email.addClass('is-invalid');
                    isValid = false;
                    console.log('Email validation failed');
                } else {
                    email.removeClass('is-invalid');
                }

                // Phone validation - Made more flexible
                var phoneValue = phone.val().trim().replace(/\D/g, ''); // Remove non-digits
                if (phoneValue.length < 10 || phoneValue.length > 15) {
                    phone.addClass('is-invalid');
                    isValid = false;
                    console.log('Phone validation failed');
                } else {
                    phone.removeClass('is-invalid');
                }

                // City validation
                if (city.val().trim() === '') {
                    city.addClass('is-invalid');
                    isValid = false;
                    console.log('City validation failed');
                } else {
                    city.removeClass('is-invalid');
                }

                // Message validation
                if (message.val().trim().length < 5) {
                    message.addClass('is-invalid');
                    isValid = false;
                    console.log('Message validation failed');
                } else {
                    message.removeClass('is-invalid');
                }

                if (!isValid) {
                    e.preventDefault();
                    console.log('Form validation failed, preventing submission');
                    if (typeof toastr !== 'undefined') {
                        toastr.error('Please fill all required fields correctly.');
                    } else {
                        alert('Please fill all required fields correctly.');
                    }
                } else {
                    console.log('Form validation passed, submitting...');
                }
            });

            // Remove error on input
            $('#contactForm input, #contactForm textarea').on('input', function() {
                $(this).removeClass('is-invalid');
            });
        });
    </script>
@endpush
