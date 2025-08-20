<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Informative
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
</head>
<style>
    .custom-btn {
        background-color: #344767 !important;
        color: white !important;
        border-radius: 0.375rem;
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .custom-btn:hover {
        background-color: #344767 !important;
        /* Ensure hover color matches the button */
        color: white !important;
        /* Ensure text color remains white on hover */
    }

    .pt-3 {
        padding-top: 35rem !important;
    }

    div.dataTables_wrapper div.dataTables_filter {
        text-align: right;
        margin-right: 25px !important;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        margin: 2px 31px !important;
        white-space: nowrap;
        justify-content: flex-end;
    }

    div.dataTables_wrapper div.dataTables_length select {
        width: 40% !important;
        display: inline-block;
    }

    .dataTables_length {
        margin-left: 20px !important;
    }

    div.dataTables_wrapper div.dataTables_info {
        padding-top: .85em;
        margin-left: 15px !important;
    }

    .page-link.active,
    .active>.page-link {
        background-color: #344767 !important;
        border-color: #344767 !important;
    }

    .page-item .page-link,
    .page-item span {
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ced0d2 !important;
        padding: 0;
        margin: 0 3px;
        border-radius: 50% !important;
        width: 36px;
        height: 36px;
        font-size: 0.875rem;
    }

    .dropdown-toggle::after {
        display: inline-block !important;
        margin-left: 0.5em;
        vertical-align: 0.255em;
        content: "";
        border-top: 0.3em solid;
        border-right: 0.3em solid transparent;
        border-bottom: 0;
        border-left: 0.3em solid transparent;
    }

    /* Alternative: Custom arrow with icon */
    .custom-arrow::after {
        content: "\f282" !important;
        /* Bootstrap chevron-down icon */
        font-family: "bootstrap-icons" !important;
        border: none !important;
        font-size: 0.8em;
        margin-left: 0.5em;
    }

    .dropdown-menu::before {
        display: none !important;
    }

    footer.footer {
        background-color: #f8f9fa;
        /* Light gray background */
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    @media (min-width: 992px) {
        .dropdown:not(.dropdown-hover) .dropdown-menu {
            margin-top: 10px !important;
        }
    }
</style>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-dark position-absolute w-100"></div>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
                target="_blank">
                <img src="{{ asset('assets/img/logo-ct-dark.png') }}" width="26px" height="26px"
                    class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Creative Tim</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="{{ url('/users') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('category*') ? 'active' : '' }}" href="{{ url('/category') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Category</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('service*') ? 'active' : '' }}" href="{{ url('/service') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-settings-gear-65 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Service</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ url('/contact') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-email-83 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Contact</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('enquiry*') ? 'active' : '' }}" href="{{ url('/enquiry') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-support-16 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Enquiry</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('testimonial*') ? 'active' : '' }}"
                        href="{{ route('testimonial') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-chat-round text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Testimonials</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('country*') ? 'active' : '' }}" href="{{ route('country') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-world-2 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Countries</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('information*') ? 'active' : '' }}"
                        href="{{ route('information') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Information</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('tour_details*') ? 'active' : '' }}"
                        href="{{ route('tour_details') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-briefcase-24 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Tour Details</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('slider*') ? 'active' : '' }}" href="{{ route('slider') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-image text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Slider</span>
                    </a>
                </li>

            </ul>
        </div>

    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb"></nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
                    <li class="nav-item dropdown d-flex align-items-center me-3">
                        <a href="#"
                            class="nav-link text-white font-weight-bold px-0 dropdown-toggle custom-arrow"
                            id="userDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-4"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown2">
                            <li><a class="dropdown-item" href="{{ 'logout' }}">Logout</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <!-- Main Content -->
        <main class="main-content">
            <div class="container-fluid">
                <div class="row"></div>
                <div class="col-lg-12 col-md-12">
                    @yield('content')
                </div>
            </div>
            <footer class="footer pt-3">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <div class="copyright text-center text-muted">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart text-danger"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">
                                    Creative Tim
                                </a>
                                for a better web.
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </main>

        <!--   Core JS Files   -->
        <script src="{{ asset('/assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('/assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ asset('/assets/js/plugins/chartjs.min.js') }}"></script>
        <script>
            var ctx1 = document.getElementById("chart-line").getContext("2d");

            var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

            gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
            gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
            gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
            new Chart(ctx1, {
                type: "line",
                data: {
                    labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Mobile apps",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#5e72e4",
                        backgroundColor: gradientStroke1,
                        borderWidth: 3,
                        fill: true,
                        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 6

                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                padding: 10,
                                color: '#fbfbfb',
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                color: '#ccc',
                                padding: 20,
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                    },
                },
            });
        </script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('assets/js/argon-dashboard.min.js?v=2.1.0') }}"></script>
        <!-- jQuery (if not already included) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <!-- DataTables JS -->
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        </script>

        @stack('scripts')
</body>

</html>
