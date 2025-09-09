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

    <section class="z_Domestic_hero z_International_hero pt-5">
        <div class="z_Domestic_hero_overlay">
            <div class="z_Domestic_hero_content">
                <h1 class="z_Domestic_hero_title">International</h1>
                <p class="z_Domestic_hero_breadcrumb"><a href="{{ route('index')}}"
                        style="text-decoration:none;color:inherit;">Home</a> / International</p>
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

                   <a href="{{ route('informationFront', $country->id) }}" class="z_Domestic_destination_card">
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
