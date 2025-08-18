<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password</title>
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
                                    <h4 class="font-weight-bolder mb-0">Reset Password</h4>
                                </div>
                                <div class="card-body">
                                     <form method="POST" action="{{ route('post_reset', $token) }}" id="reset">
                                        @csrf
                                        <div class="mb-3">
                                            <div class="password-input-container">
                                                <input type="password" id="newpassword" name="newpassword"
                                                    class="form-control form-control-lg password-input"
                                                    placeholder="New Password" aria-label="New Password"
                                                    autocomplete="current-password">
                                                <button type="button" class="password-toggle"
                                                    aria-label="Toggle password visibility">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                            <div class="validation-message"></div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="password-input-container">
                                                <input type="password" id="confirmpassword" name="confirmpassword"
                                                    class="form-control form-control-lg password-input"
                                                    placeholder="Confirm Password" aria-label="Confirm Password"
                                                    autocomplete="current-password">
                                                <button type="button" class="password-toggle"
                                                    aria-label="Toggle password visibility">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                            <div class="validation-message"></div>
                                        </div>
                                       
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-primary w-100 mt-4 mb-0">
                                                <span class="button-text">Change Password</span>
                                                <span class="spinner-border spinner-border-sm d-none ms-2"
                                                    role="status" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </form>
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

            // Custom validation method for strong password
            $.validator.addMethod("strongPassword", function(value, element) {
                    return this.optional(element) ||
                        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/.test(value);
                },
                "Password must contain at least one lowercase letter, one uppercase letter, one number, and one special character"
            );

            // Initialize form validation
            $("#reset").validate({
               rules: {
                   newpassword: {
                    required: true,
                    minlength: 6,
                    maxlength: 50
                },
                confirmpassword: {
                    required: true,
                    equalTo: "#newpassword"
                }
                },
                messages: {
                    newpassword: {
                        required: "Please enter your new password",
                        minlength: "Password must be at least 6 characters long",
                        maxlength: "Password cannot exceed 50 characters"
                    },
                    confirmpassword: {
                        required: "Please confirm your password",
                        equalTo: "Passwords do not match"
                    }
                },
                errorPlacement: function(error, element) {
                    // Place error inside the validation-message div
                    element.closest('.password-input-container').next('.validation-message').html(error);
                },
                highlight: function(element) {
                    $(element).addClass('error').removeClass('valid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('error').addClass('valid');
                },
                submitHandler: function(form) {
                    const submitBtn = $(form).find('button[type="submit"]');
                    const originalText = submitBtn.text();
                    submitBtn.prop('disabled', true).text('Processing...');
                    form.submit();
                }
            });
            // Ensure the eye icon is visible after page load
            setTimeout(function() {
                const toggleBtn = $('.password-toggle');
                console.log('Toggle button found:', toggleBtn.length);
                console.log('Toggle button visible:', toggleBtn.is(':visible'));
                console.log('Toggle button CSS:', {
                    position: toggleBtn.css('position'),
                    zIndex: toggleBtn.css('z-index'),
                    display: toggleBtn.css('display')
                });
            }, 100);

            console.log('Form validation initialized');
        });
    </script>
</body>

</html>
