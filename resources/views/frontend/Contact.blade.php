@extends('frontend.layouts.main')
<link rel="stylesheet" href="{{ asset('frontend/Style/d_app.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/Style/x_app.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/Style/z_app.css') }}">
<style>
    .error {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: block;
    }

    .z_contact_form_input,
    .z_contact_form_textarea,
    .z_contact_form_input:focus,
    .z_contact_form_textarea:focus,
    .z_contact_form_input:invalid,
    .z_contact_form_textarea:invalid {
        color: #000 !important;
        /* Force black text */
        border-color: #ced4da !important;
        /* Normal border */
    }
</style>
@section('content')
    <!-- Hero Section -->
    <section class="z_contact_hero pt-5 ">
        <div class="z_contact_hero_overlay"></div>
        <div class="z_contact_hero_content">
            <h1 class="z_contact_hero_title">Contact Us</h1>
            <p class="z_contact_hero_breadcrumb"><a href="{{ route('index')}}"
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
                            <form id="contactForm" action="{{ route('contactfstore') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="name" class="z_contact_form_label">Name</label>
                                        <input type="text" class="z_contact_form_input" id="name" name="name"
                                            placeholder="Enter your name" value="{{ old('name') }}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="email" class="z_contact_form_label">Email</label>
                                        <input type="email" class="z_contact_form_input" id="email" name="email"
                                            placeholder="Enter your email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="z_contact_form_label">Phone No.</label>
                                        <input type="tel" class="z_contact_form_input" id="phone" name="phone"
                                            placeholder="Enter your phone no" value="{{ old('phone') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="city" class="z_contact_form_label">City</label>
                                        <input type="text" class="z_contact_form_input" id="city" name="city"
                                            placeholder="Enter your city" value="{{ old('city') }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="z_contact_form_label">Message</label>
                                    <textarea class="z_contact_form_textarea" id="message" name="message" rows="4" placeholder="Enter your message">{{ old('message') }}</textarea>
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
@push('scripts')
    <script>
        $(document).ready(function() {
            // Add debug flag to prevent multiple executions
            if (window.contactFormInitialized) {
                console.log('Contact form already initialized, skipping...');
                return;
            }
            window.contactFormInitialized = true;

            console.log('Initializing contact form...');

            // Configure toastr options
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true, // This should prevent duplicates
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

            // Custom validation methods
            $.validator.addMethod("phoneNumber", function(value, element) {
                return this.optional(element) || /^[\+]?[0-9\s\-\(\)]{10,15}$/.test(value);
            }, "Please enter a valid phone number (10-15 digits).");

            $.validator.addMethod("lettersOnly", function(value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
            }, "Please enter only letters and spaces.");

            // Initialize form validation
            $("#contactForm").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2,
                        maxlength: 50,
                        lettersOnly: true
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 100
                    },
                    phone: {
                        required: true,
                        phoneNumber: true
                    },
                    city: {
                        required: true,
                        minlength: 2,
                        maxlength: 50,
                        lettersOnly: true
                    },
                    message: {
                        required: true,
                        minlength: 5,
                        maxlength: 500
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your name",
                        minlength: "Name must be at least 2 characters long",
                        maxlength: "Name cannot exceed 50 characters"
                    },
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address",
                        maxlength: "Email cannot exceed 100 characters"
                    },
                    phone: {
                        required: "Please enter your phone number"
                    },
                    city: {
                        required: "Please enter your city",
                        minlength: "City must be at least 2 characters long",
                        maxlength: "City cannot exceed 50 characters"
                    },
                    message: {
                        required: "Please enter your message",
                        minlength: "Message must be at least 5 characters long",
                        maxlength: "Message cannot exceed 500 characters"
                    }
                },
                errorElement: "span",
                errorClass: "error",
                validClass: "valid",
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass(errorClass).removeClass(validClass);
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass(errorClass).addClass(validClass);
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    // Show loading message
                    toastr.info('Sending your message...', 'Please wait');

                    // Log form data for debugging
                    console.log('Form validation passed. Submitting form...');

                    // Submit the form
                    form.submit();
                }
            });

            // Real-time validation feedback
            $('#contactForm input, #contactForm textarea').on('keyup blur', function() {
                if ($("#contactForm").data('validator')) {
                    $(this).valid();
                }
            });

            // Show success message if exists (with debug)
            @if (session('success'))
                console.log('Success session found, showing toastr...');
                if (!window.successMessageShown) {
                    window.successMessageShown = true;
                    toastr.success('{{ session('success') }}');
                } else {
                    console.log('Success message already shown, skipping...');
                }
            @endif

            // Show error message if exists (with debug)
            @if (session('error'))
                console.log('Error session found, showing toastr...');
                if (!window.errorMessageShown) {
                    window.errorMessageShown = true;
                    toastr.error('{{ session('error') }}');
                } else {
                    console.log('Error message already shown, skipping...');
                }
            @endif
        });
    </script>
@endpush
