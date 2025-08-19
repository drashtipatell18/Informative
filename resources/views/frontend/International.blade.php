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

    <section class="z_Domestic_hero z_International_hero pt-5">
        <div class="z_Domestic_hero_overlay">
            <div class="z_Domestic_hero_content">
                <h1 class="z_Domestic_hero_title">International</h1>
                <p class="z_Domestic_hero_breadcrumb"><a href="landingpage.html"
                        style="text-decoration:none;color:inherit;">Home</a> / International</p>
            </div>
        </div>
    </section>

    <!-- Destinations Section -->
    <section class="z_Domestic_destinations">
        <div class="z_Domestic_destinations_container">
            <div class="z_Domestic_destinations_grid">
                <!-- Destination Card 1 -->
                <a href="{{ route('information') }}" class="z_Domestic_destination_card">
                    <div class="z_Domestic_destination_image">
                        <img src="{{ asset('frontend/Image/Dubai.png') }}" alt="Dubai">
                        <div class="z_Domestic_destination_overlay">
                            <h3 class="z_Domestic_destination_title">Dubai</h3>
                            <p class="z_Domestic_destination_duration">13 Days</p>
                        </div>
                    </div>
                </a>

                <!-- Destination Card 2 -->
                <a href="{{ route('information') }}" class="z_Domestic_destination_card">
                    <div class="z_Domestic_destination_image">
                        <img src="{{ asset('frontend/Image/Malaysia.png') }}" alt="Malaysia">
                        <div class="z_Domestic_destination_overlay">
                            <h3 class="z_Domestic_destination_title">Malaysia</h3>
                            <p class="z_Domestic_destination_duration">07 Days</p>
                        </div>
                    </div>
                </a>

                <!-- Destination Card 3 -->
                <a href="{{ route('information') }}" class="z_Domestic_destination_card">
                    <div class="z_Domestic_destination_image">
                        <img src="{{ asset('frontend/Image/Singapore.png') }}" alt="Singapore">
                        <div class="z_Domestic_destination_overlay">
                            <h3 class="z_Domestic_destination_title">Singapore</h3>
                            <p class="z_Domestic_destination_duration">13 Days</p>
                        </div>
                    </div>
                </a>

                <!-- Destination Card 4 -->
                <a href="{{ route('information') }}" class="z_Domestic_destination_card">
                    <div class="z_Domestic_destination_image">
                        <img src="{{ asset('frontend/Image/Bali.png') }}" alt="Bali">
                        <div class="z_Domestic_destination_overlay">
                            <h3 class="z_Domestic_destination_title">Bali</h3>
                            <p class="z_Domestic_destination_duration">13 Days</p>
                        </div>
                    </div>
                </a>

                <!-- Destination Card 5 -->
                <a href="{{ route('information') }}" class="z_Domestic_destination_card">
                    <div class="z_Domestic_destination_image">
                        <img src="{{ asset('frontend/Image/Thailand.png') }}" alt="Thailand">
                        <div class="z_Domestic_destination_overlay">
                            <h3 class="z_Domestic_destination_title">Thailand</h3>
                            <p class="z_Domestic_destination_duration">10 Days</p>
                        </div>
                    </div>
                </a>

                <!-- Destination Card 6 -->
                <a href="{{ route('information') }}" class="z_Domestic_destination_card">
                    <div class="z_Domestic_destination_image">
                        <img src="{{ asset('frontend/Image/vietnam.png') }}" alt="Vietnam">
                        <div class="z_Domestic_destination_overlay">
                            <h3 class="z_Domestic_destination_title">Vietnam</h3>
                            <p class="z_Domestic_destination_duration">13 Days</p>
                        </div>
                    </div>
                </a>

                <!-- Destination Card 7 -->
                <a href="{{ route('information') }}" class="z_Domestic_destination_card">
                    <div class="z_Domestic_destination_image">
                        <img src="{{ asset('frontend/Image/Srilanka.png') }}" alt="Srilanka">
                        <div class="z_Domestic_destination_overlay">
                            <h3 class="z_Domestic_destination_title">Srilanka</h3>
                            <p class="z_Domestic_destination_duration">13 Days</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection
