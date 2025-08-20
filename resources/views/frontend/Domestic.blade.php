@extends('frontend.layouts.main')
 <link rel="stylesheet" href="{{ asset('frontend/Style/d_app.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/Style/x_app.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/Style/z_app.css') }}">
@section('content')
    <style>
        .z_Domestic_destination_card {
    text-decoration: none;
    color: inherit;
    display: block;
    cursor: pointer;
}

    </style>
    <section class="z_Domestic_hero pt-5">
        <div class="z_Domestic_hero_overlay">
            <div class="z_Domestic_hero_content">
                <h1 class="z_Domestic_hero_title">Domestic</h1>
                <p class="z_Domestic_hero_breadcrumb"><a href="{{ route('index')}}" style="text-decoration:none;color:inherit;">Home</a> / Domestic</p>
            </div>
        </div>
    </section>

    <!-- Destinations Section -->
    <section class="z_Domestic_destinations">
        <div class="z_Domestic_destinations_container">
            <div class="z_Domestic_destinations_grid">
                @foreach($countries as $country)
                    @php
                        $images = is_array($country->images) ? $country->images : json_decode($country->images, true);
                        $firstImage = $images[0] ?? null;
                    @endphp

                    <a href="{{ route('information', $country->id) }}" class="z_Domestic_destination_card">
                        <div class="z_Domestic_destination_image">
                            <img src="{{ $firstImage 
                                ? asset('images/countries/' . $firstImage) 
                                : asset('images/countries/dummy_product.png') }}" 
                                alt="{{ $country->name }}">
                            
                            <div class="z_Domestic_destination_overlay">
                                <h3 class="z_Domestic_destination_title">{{ $country->name }}</h3>
                                <p class="z_Domestic_destination_duration">{{ $country->day }} Days</p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- slider -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
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
@endpush
