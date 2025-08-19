@extends('frontend.layouts.main')
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
                <!-- Destination Card 1 -->
                <a href="{{ route('information')}}" class="z_Domestic_destination_card">
                    <div class="z_Domestic_destination_image">
                        <img src="{{ asset('frontend/Image/Manali.png')}}" alt="Manali">
                        <div class="z_Domestic_destination_overlay">
                            <h3 class="z_Domestic_destination_title">Manali</h3>
                            <p class="z_Domestic_destination_duration">13 Days</p>
                        </div>
                    </div>
                </a>
                <!-- Destination Card 2 -->
                <a href="{{ route('information')}}" class="z_Domestic_destination_card">
                    <div class="z_Domestic_destination_image">
                        <img src="{{ asset('frontend/Image/KAshmir.png')}}" alt="Kashmir">
                        <div class="z_Domestic_destination_overlay">
                            <h3 class="z_Domestic_destination_title">Kashmir</h3>
                            <p class="z_Domestic_destination_duration">10 Days</p>
                        </div>
                    </div>
                </a>

                <!-- Destination Card 3 -->
                <a href="{{ route('information')}}" class="z_Domestic_destination_card">
                    <div class="z_Domestic_destination_image">
                        <img src="{{ asset('frontend/Image/Darjeeling.png')}}" alt="Darjeeling">
                        <div class="z_Domestic_destination_overlay">
                            <h3 class="z_Domestic_destination_title">Darjeeling</h3>
                            <p class="z_Domestic_destination_duration">13 Days</p>
                        </div>
                    </div>
                </a>

                <!-- Destination Card 4 -->
               <a href="{{ route('information')}}" class="z_Domestic_destination_card">
                    <div class="z_Domestic_destination_image">
                        <img src="{{ asset('frontend/Image/Kerala.png')}}" alt="Kerala">
                        <div class="z_Domestic_destination_overlay">
                            <h3 class="z_Domestic_destination_title">Kerala</h3>
                            <p class="z_Domestic_destination_duration">13 Days</p>
                        </div>
                    </div>
                </a>

                <!-- Destination Card 5 -->
               <a href="{{ route('information')}}" class="z_Domestic_destination_card">
                    <div class="z_Domestic_destination_image">
                        <img src="{{ asset('frontend/Image/Coorg Ooty.png')}}" alt="Coorg Ooty">
                        <div class="z_Domestic_destination_overlay">
                            <h3 class="z_Domestic_destination_title">Coorg Ooty</h3>
                            <p class="z_Domestic_destination_duration">10 Days</p>
                        </div>
                    </div>
                </a>

                <!-- Destination Card 6 -->
                <a href="{{ route('information')}}" class="z_Domestic_destination_card">
                    <div class="z_Domestic_destination_image">
                        <img src="{{ asset('frontend/Image/Rajasthan.png')}}" alt="Rajasthan">
                        <div class="z_Domestic_destination_overlay">
                            <h3 class="z_Domestic_destination_title">Rajasthan</h3>
                            <p class="z_Domestic_destination_duration">13 Days</p>
                        </div>
                    </div>
                </a>

                <!-- Destination Card 7 -->
               <a href="{{ route('information')}}" class="z_Domestic_destination_card">
                    <div class="z_Domestic_destination_image">
                        <img src="{{ asset('frontend/Image/Pachmarhi.png')}}" alt="Pachmarhi">
                        <div class="z_Domestic_destination_overlay">
                            <h3 class="z_Domestic_destination_title">Pachmarhi</h3>
                            <p class="z_Domestic_destination_duration">13 Days</p>
                        </div>
                    </div>
                </a>

                <!-- Destination Card 8 -->
               <a href="{{ route('information')}}" class="z_Domestic_destination_card">
                    <div class="z_Domestic_destination_image">
                        <img src="{{ asset('frontend/Image/Gujrat.png')}}" alt="Gujarat">
                        <div class="z_Domestic_destination_overlay">
                            <h3 class="z_Domestic_destination_title">Gujarat</h3>
                            <p class="z_Domestic_destination_duration">10 Days</p>
                        </div>
                    </div>
                </a>
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
