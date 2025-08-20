@extends('frontend.layouts.main')
 <link rel="stylesheet" href="{{ asset('frontend/Style/d_app.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/Style/x_app.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/Style/z_app.css') }}">
@section('content')
<section class="z_about_hero pt-5">
    <div class="z_about_hero_overlay"></div>
    <div class="z_about_hero_content">
        <h1 class="z_about_hero_title">About Us</h1>
        <p class="z_about_hero_breadcrumb"><a href="{{ route('index')}}" style="text-decoration:none;color:inherit;">Home</a>
            / About Us</p>
    </div>
</section>

<section class="intro-section">
    <div class="intro-container">
        <div class="intro-img-wrap">
            <img src="{{ asset('frontend/Image/about_2.png')}}" alt="Travelers hiking" class="intro-image">
            <div class="intro-bg-square"></div>
        </div>
        <div class="intro-content-card">
            <span class="intro-subtitle">INTRODUCTION</span>
            <h2 class="intro-title">We are the best agency</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is
                simply dummy text of the printing and typesetting industry.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is
                simply dummy text of the printing and typesetting industry.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="z_about_stats_section my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="z_about_stat_card">
                    <div class="z_about_stat_number">10+</div>
                    <div class="z_about_stat_label">YEARS OF EXPERIENCE</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="z_about_stat_card">
                    <div class="z_about_stat_number">15k+</div>
                    <div class="z_about_stat_label">HAPPY TRAVELERS</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="z_about_stat_card">
                    <div class="z_about_stat_number">100+</div>
                    <div class="z_about_stat_label">PLACES VISITED</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="z_about_stat_card">
                    <div class="z_about_stat_number">2k+</div>
                    <div class="z_about_stat_label">TRAVEL HISTORY</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us Content Section -->
<section class="z_about_content_section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="z_about_content_wrapper">
                    <span class="z_about_content_subtitle">ABOUT US</span>
                    <h2 class="z_about_content_title">We provide best tours</h2>
                    <div class="z_about_content_text">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book.</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        </p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="z_about_image_grid">
                    <div class="z_about_image_item">
                        <img src="{{ asset('frontend/Image/A1.png')}}" alt="Turquoise lake with green trees" class="z_about_grid_image">
                    </div>
                    <div class="z_about_image_item">
                        <img src="{{ asset('frontend/Image/A2.png')}}" alt="Wooden building on cliff" class="z_about_grid_image">
                    </div>
                    <div class="z_about_image_item">
                        <img src="{{ asset('frontend/Image/A3.png')}}" alt="Mountain lake with reflection" class="z_about_grid_image">
                    </div>
                    <div class="z_about_image_item">
                        <img src="{{ asset('frontend/Image/A4.png')}}" alt="Winding road through forest" class="z_about_grid_image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
@endpush
