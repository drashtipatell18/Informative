<!--
=========================================================
* Argon Dashboard 3 - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Admin Login
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom validation styles -->
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .card-plain {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 1rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            width: 133%;
        }

        .error {
            color: #f56565 !important;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: block;
            font-weight: 500;
        }

        .form-control.error {
            border-color: #f56565 !important;
            box-shadow: 0 0 0 0.2rem rgba(245, 101, 101, 0.25) !important;
        }

        .form-control.valid {
            border-color: #68d391 !important;
            box-shadow: 0 0 0 0.2rem rgba(104, 211, 145, 0.25) !important;
        }

        .validation-message {
            min-height: 1.5rem;
            margin-top: 0.25rem;
        }

        /* Laravel validation errors */
        .invalid-feedback {
            color: #f56565 !important;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: block !important;
            font-weight: 500;
        }

        .is-invalid {
            border-color: #f56565 !important;
            box-shadow: 0 0 0 0.2rem rgba(245, 101, 101, 0.25) !important;
        }

        /* Fixed password toggle button styles */
        .password-input-container {
            position: relative !important;
            display: flex;
            align-items: center;
        }

        .password-toggle {
            position: absolute !important;
            right: 15px !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            border: none !important;
            background: none !important;
            color: #8898aa !important;
            cursor: pointer !important;
            z-index: 1000 !important;
            padding: 5px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 30px;
            height: 30px;
        }

        .password-toggle:hover {
            color: #525f7f !important;
        }

        .password-toggle i {
            font-size: 16px !important;
            pointer-events: none;
        }

        /* Ensure input has proper padding for the icon */
        .password-input {
            padding-right: 45px !important;
        }

        .form-control-lg {
            padding: 0.875rem 1rem;
            font-size: 1rem;
            border-radius: 0.5rem;
            border: 1px solid #d2d6da;
            transition: all 0.2s ease;
        }

        .form-control-lg:focus {
            border-color: #5e72e4;
            box-shadow: 0 0 0 0.2rem rgba(94, 114, 228, 0.25);
        }

        .btn-primary {
            background: linear-gradient(87deg, #5e72e4 0%, #825ee4 100%);
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            text-transform: none;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 7px 14px rgba(94, 114, 228, 0.4);
        }

        .text-primary {
            color: #5e72e4 !important;
        }

        .font-weight-bolder {
            font-weight: 700;
        }

        .card-header {
            border-bottom: none;
            padding: 1.5rem 1.5rem 0;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-footer {
            border-top: none;
            padding: 0 1.5rem 1.5rem;
        }

        .hero-section {
            background: linear-gradient(rgba(94, 114, 228, 0.8), rgba(94, 114, 228, 0.8)),
                url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
            background-size: cover;
            background-position: center;
            border-radius: 1rem;
            color: white;
            padding: 3rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        @media (max-width: 991.98px) {
            .hero-section {
                display: none;
            }
        }
    </style>
</head>

<body>
    <main class="main-content mt-0">
        <section>
            <div class="min-vh-100 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header text-start">
                                    <h4 class="font-weight-bolder mb-0">Sign In</h4>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="card-body">
                                    <form id="loginForm" role="form" action="{{ route('loginstore') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="email" id="email" name="email"
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                placeholder="Email" aria-label="Email" autocomplete="email"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="validation-message"></div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="password-input-container">
                                                <input type="password" id="password" name="password"
                                                    class="form-control form-control-lg password-input @error('password') is-invalid @enderror"
                                                    placeholder="Password" aria-label="Password"
                                                    autocomplete="current-password">
                                                <button type="button" class="password-toggle"
                                                    aria-label="Toggle password visibility">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="validation-message"></div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-primary w-100 mt-4 mb-0" id="submitBtn">
                                                <span class="button-text">Sign in</span>
                                                <span class="spinner-border spinner-border-sm d-none ms-2"
                                                    role="status" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <p class="mb-4 text-sm mx-auto">
                                        Don't have an account?
                                        <a href="javascript:;" class="text-primary font-weight-bold">Sign up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- jQuery (required for validation) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Login Form Validation Script -->
    <script>
        $(document).ready(function() {
            console.log('jQuery loaded:', typeof $ !== 'undefined');
            console.log('jQuery Validation loaded:', typeof $.fn.validate !== 'undefined');

            // Initialize form validation (frontend only - for immediate feedback)
            $("#loginForm").validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                        maxlength: 255
                    },
                    password: {
                        required: true,
                        minlength: 1 // Changed from 6 to 1 to let Laravel handle this
                    }
                },
                messages: {
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address",
                        maxlength: "Email must not exceed 255 characters"
                    },
                    password: {
                        required: "Please enter your password",
                        minlength: "Password is required"
                    }
                },
                errorElement: "span",
                errorClass: "error",
                validClass: "valid",
                errorPlacement: function(error, element) {
                    // Only show frontend validation if no Laravel errors exist
                    const hasLaravelError = element.siblings('.invalid-feedback').length > 0;
                    if (!hasLaravelError) {
                        if (element.attr('name') === 'password') {
                            error.appendTo(element.closest('.mb-3').find('.validation-message'));
                        } else {
                            error.appendTo(element.closest('.mb-3').find('.validation-message'));
                        }
                    }
                },
                highlight: function(element) {
                    // Don't add error class if Laravel already marked it invalid
                    if (!$(element).hasClass('is-invalid')) {
                        $(element).addClass('error').removeClass('valid');
                    }
                },
                unhighlight: function(element) {
                    // Don't remove error class if Laravel marked it invalid
                    if (!$(element).hasClass('is-invalid')) {
                        $(element).removeClass('error').addClass('valid');
                    }
                },
                // REMOVED submitHandler - let the form submit normally to Laravel
                onsubmit: true
            });

            // Handle form submission with loading state
            $('#loginForm').on('submit', function() {
                const submitBtn = $('#submitBtn');
                const buttonText = submitBtn.find('.button-text');

                // Show loading state
                buttonText.text('Signing in...');

                // Let the form submit normally - don't prevent default
                return true;
            });

            // Real-time validation feedback (but don't override Laravel errors)
            $('#email, #password').on('blur', function() {
                if (!$(this).hasClass('is-invalid')) {
                    $(this).valid();
                }
            });

            // Clear frontend validation on focus (but keep Laravel errors)
            $('#email, #password').on('focus', function() {
                if (!$(this).hasClass('is-invalid')) {
                    $(this).removeClass('error valid');
                    $(this).closest('.mb-3').find('.validation-message').empty();
                }
            });

            // Toggle password visibility
            $(document).on('click', '.password-toggle', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const passwordField = $('#password');
                const icon = $(this).find('i');

                if (passwordField.attr('type') === 'password') {
                    passwordField.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordField.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            console.log('Form validation initialized');
        });
    </script>
</body>

</html>
