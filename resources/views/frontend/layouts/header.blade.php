<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="{{ asset('frontend/Style/d_app.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/Style/x_app.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/Style/z_app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- slider -->
    <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- style -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>
<style>
    .invalid-feedback {
        display: block !important;
        color: #dc3545;
        font-size: 0.875em;
        margin-top: 0.25rem;
    }

    .form-check-label {
        color: #212529 !important;
        /* Bootstrap's default dark text */
    }

    /* Or if you want to target only the modal checkboxes */
    .d_EM_modal .form-check-label {
        color: #495057 !important;
    }
</style>

<body>
    <!-- Header Section -->
    <header class="d_header mb-5">
        <nav class="d_navbar navbar navbar-expand-md">
            <div class="container ">
                <!-- Logo -->
                <a class="d_logo navbar-brand" href="{{ route('index') }}">
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
                            <a class="d_nav_link nav-link" href="{{ route('about-us') }}">About Us</a>
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
                    <form id="enquiryForm">
                        <div class="row g-3">
                            <!-- Name -->
                            <div class="col-md-6">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control d_EM_input"
                                    placeholder="Enter your name">
                            </div>
                            <!-- Email -->
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control d_EM_input"
                                    placeholder="Enter your email">
                            </div>
                            <!-- Phone -->
                            <div class="col-md-6">
                                <label class="form-label">Phone No.</label>
                                <!-- <input type="tel" class="form-control d_EM_input" placeholder="Enter phone no."
                                    required> -->
                                <input type="tel" class="form-control d_EM_input" name="phone"
                                    placeholder="Enter phone no." maxlength="10" pattern="[0-9]{10}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            </div>
                            <!-- Travel Date -->
                            <div class="col-md-6">
                                <label class="form-label">Travel Date</label>
                                <input type="date" name="travel_date" class="form-control d_EM_input">
                            </div>
                            <!-- City -->
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control d_EM_input"
                                    placeholder="Enter your city">
                            </div>
                            <!-- Passenger -->
                            <div class="col-md-6">
                                <label class="form-label">Total Passenger</label>
                                <input type="number" name="total_passenger" class="form-control d_EM_input"
                                    placeholder="Enter total no of passenger">
                            </div>
                        </div>

                        <!-- Interests -->
                        <div class="mt-4">
                            <label class="form-label">Select your interest</label>
                            <div class="d-flex flex-wrap gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="select_your_interest[]"
                                        value="Beach Holidays">
                                    <label class="form-check-label">Beach Holidays</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="select_your_interest[]"
                                        value="Adventure Holidays">
                                    <label class="form-check-label">Adventure Holidays</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="select_your_interest[]"
                                        value="Nightlife Holidays">
                                    <label class="form-check-label">Nightlife Holidays</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="select_your_interest[]"
                                        value="Self Drive Holidays">
                                    <label class="form-check-label">Self Drive Holidays</label>
                                </div>
                            </div>
                        </div>


                        <!-- Message -->
                        <div class="mt-4">
                            <label class="form-label">Message</label>
                            <textarea rows="4" class="form-control d_EM_input" placeholder="Enter your message" name="message"></textarea>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- ADD JQUERY VALIDATION PLUGIN - THIS WAS MISSING -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slider -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
        $(document).ready(function() {
            $('#enquiryForm').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 255
                    },
                    phone: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    travel_date: {
                        required: true,
                        date: true
                    },
                    city: {
                        required: true,
                        minlength: 2,
                        maxlength: 100
                    },
                    total_passenger: {
                        required: true,
                        number: true,
                        min: 1,
                        max: 50
                    }
                },
                messages: {
                    name: {
                        required: "Name is required",
                        minlength: "Name must be at least 3 characters long",
                        maxlength: "Name must be less than 255 characters"
                    },
                    email: {
                        required: "Email is required",
                        email: "Please enter a valid email address",
                        maxlength: "Email must be less than 255 characters"
                    },
                    phone: {
                        required: "Phone number is required",
                        digits: "Phone number must contain only digits",
                        minlength: "Phone number must be exactly 10 digits",
                        maxlength: "Phone number must be exactly 10 digits"
                    },
                    travel_date: {
                        required: "Travel date is required",
                        date: "Please enter a valid date"
                    },
                    city: {
                        required: "City is required",
                        minlength: "City must be at least 2 characters long",
                        maxlength: "City must be less than 100 characters"
                    },
                    total_passenger: {
                        required: "Number of passengers is required",
                        number: "Please enter a valid number",
                        min: "At least 1 passenger is required",
                        max: "Maximum 50 passengers allowed"
                    }
                },
                errorElement: 'span',
                errorClass: 'invalid-feedback',
                validClass: 'is-valid',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    var container = element.closest('.col-md-6, .mt-4');
                    if (container.length) {
                        container.append(error);
                    } else {
                        element.parent().append(error);
                    }
                },
                highlight: function(element) {
                    if (element.type !== 'checkbox') {
                        $(element).addClass('is-invalid').removeClass('is-valid');
                        $(element).closest('.form-group, .mb-3').addClass('has-error');
                    }
                },
                unhighlight: function(element) {
                    if (element.type !== 'checkbox') {
                        $(element).addClass('is-valid').removeClass('is-invalid');
                        $(element).closest('.form-group, .mb-3').removeClass('has-error');
                    }
                },
                submitHandler: function(form) {
                    // Manual checkbox validation
                    var checkboxChecked = $('input[name="select_your_interest[]"]:checked').length > 0;

                    if (!checkboxChecked) {
                        $('.form-check .invalid-feedback').remove();
                        $('.form-check').append(
                            '<span class="invalid-feedback">Please select at least one interest</span>'
                        );
                        $('input[name="select_your_interest[]"]').addClass('is-invalid');
                        return false;
                    } else {
                        $('.form-check .invalid-feedback').remove();
                        $('input[name="select_your_interest[]"]').removeClass('is-invalid').addClass(
                            'is-valid');
                    }

                    var $submitBtn = $(form).find('button[type="submit"]');
                    var originalText = $submitBtn.text();

                    $submitBtn.prop('disabled', true).text('Processing...');

                    // AJAX form submission
                    $.ajax({
                        url: "{{ route('create.enquiry') }}",
                        type: "POST",
                        data: $(form).serialize(),
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            toastr.success('Enquiry submitted successfully!');
                            form.reset();

                            var modal = bootstrap.Modal.getInstance(document.getElementById(
                                'dEMEnquiryModal'));
                            if (modal) modal.hide();

                            $(form).find('.is-valid, .is-invalid').removeClass(
                                'is-valid is-invalid');
                            $(form).find('.invalid-feedback').remove();

                            $submitBtn.prop('disabled', false).text(originalText);
                        },
                        error: function(xhr) {
                            let errors = xhr.responseJSON?.errors;
                            if (errors) {
                                let messages = '';
                                for (let field in errors) {
                                    messages +=
                                        `<p style="color:red;">${errors[field][0]}</p>`;
                                }
                                toastr.error(messages);
                            } else {
                                toastr.error('Something went wrong.');
                            }

                            $submitBtn.prop('disabled', false).text(originalText);
                        }
                    });

                    return false; // Prevent default form submission
                },
                focusInvalid: true,
                focusCleanup: true,
                ignore: []
            });

            // Clear checkbox error on change
            $('input[name="select_your_interest[]"]').on('change', function() {
                if ($('input[name="select_your_interest[]"]:checked').length > 0) {
                    $('.form-check .invalid-feedback').remove();
                    $('input[name="select_your_interest[]"]').removeClass('is-invalid').addClass(
                        'is-valid');
                }
            });

            console.log('jQuery Validation initialized successfully');
        });
    </script>
    @stack('scripts')

</body>

</html>
