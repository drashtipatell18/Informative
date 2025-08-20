@extends('frontend.layouts.main')
<link rel="stylesheet" href="{{ asset('frontend/Style/d_app.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/Style/x_app.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/Style/z_app.css') }}">
@section('content')
    @php
        $images = is_array($country->images) ? $country->images : json_decode($country->images, true);
        $firstImage = $images[0] ?? null;
        $backgroundImage = $firstImage 
            ? asset('images/countries/' . $firstImage) 
            : asset('images/countries/dummy_product.png');
    @endphp
    <section class="z_infor_hero" style="background: url('{{ $backgroundImage }}') center center/cover no-repeat;">
        <div class="z_infor_hero_overlay"></div>
        <div class="z_infor_hero_content">
            <h1 class="z_infor_hero_title">{{ $country->name }}</h1>
            <div class="z_infor_details_row">
                <span class="z_infor_detail">
                   
                    <svg width="22" height="20" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21.0497 1.55832H19.3781V0.937694C19.3781 0.738781 19.2991 0.548016 19.1585 0.407364C19.0178 0.266711 18.827 0.187694 18.6281 0.187694C18.4292 0.187694 18.2384 0.266711 18.0978 0.407364C17.9571 0.548016 17.8781 0.738781 17.8781 0.937694V1.55832H12.75V0.937694C12.75 0.738781 12.671 0.548016 12.5303 0.407364C12.3897 0.266711 12.1989 0.187694 12 0.187694C11.8011 0.187694 11.6103 0.266711 11.4697 0.407364C11.329 0.548016 11.25 0.738781 11.25 0.937694V1.55832H6.12187V0.937694C6.12438 0.837656 6.10683 0.738129 6.07028 0.644975C6.03372 0.551821 5.9789 0.466924 5.90903 0.395286C5.83916 0.323647 5.75566 0.266715 5.66345 0.227843C5.57124 0.188971 5.47218 0.168945 5.37211 0.168945C5.27204 0.168945 5.17298 0.188971 5.08077 0.227843C4.98856 0.266715 4.90506 0.323647 4.83519 0.395286C4.76532 0.466924 4.71049 0.551821 4.67394 0.644975C4.63738 0.738129 4.61984 0.837656 4.62234 0.937694V1.55832H2.95078C2.29286 1.55894 1.66205 1.82051 1.19674 2.28564C0.731426 2.75078 0.469619 3.38149 0.46875 4.03941V19.331C0.469494 19.9889 0.731183 20.6197 1.1964 21.0849C1.66163 21.5501 2.29239 21.8118 2.95031 21.8125H21.0492C21.7071 21.8118 22.3379 21.5501 22.8031 21.0849C23.2683 20.6197 23.53 19.9889 23.5308 19.331V4.03941C23.53 3.38149 23.2683 2.75073 22.8031 2.28551C22.3379 1.82028 21.7071 1.55859 21.0492 1.55785L21.0497 1.55832ZM2.95078 3.05832H4.62187V3.67848C4.62187 3.87739 4.70089 4.06815 4.84154 4.20881C4.9822 4.34946 5.17296 4.42848 5.37187 4.42848C5.57079 4.42848 5.76155 4.34946 5.9022 4.20881C6.04286 4.06815 6.12187 3.87739 6.12187 3.67848V3.05832H11.25V3.67848C11.2475 3.77851 11.265 3.87804 11.3016 3.97119C11.3382 4.06435 11.393 4.14925 11.4628 4.22088C11.5327 4.29252 11.6162 4.34945 11.7084 4.38833C11.8006 4.4272 11.8997 4.44722 11.9998 4.44722C12.0998 4.44722 12.1989 4.4272 12.2911 4.38833C12.3833 4.34945 12.4668 4.29252 12.5367 4.22088C12.6066 4.14925 12.6614 4.06435 12.6979 3.97119C12.7345 3.87804 12.752 3.77851 12.7495 3.67848V3.05832H17.8777V3.67848C17.8777 3.87739 17.9567 4.06815 18.0973 4.20881C18.238 4.34946 18.4287 4.42848 18.6277 4.42848C18.8266 4.42848 19.0173 4.34946 19.158 4.20881C19.2986 4.06815 19.3777 3.87739 19.3777 3.67848V3.05832H21.0492C21.5906 3.05832 22.0312 3.49894 22.0312 4.03988V6.56176H1.96875V4.03988C1.96875 3.49848 2.40937 3.05832 2.95078 3.05832ZM21.0497 20.313H2.95078C2.69049 20.3128 2.44092 20.2093 2.25682 20.0253C2.07272 19.8413 1.96912 19.5917 1.96875 19.3314V8.06129H22.0312V19.3314C22.0312 19.8729 21.5911 20.313 21.0497 20.313Z"
                            fill="white" />
                        <path
                            d="M7.26484 9.94922H5.06641C4.86749 9.94922 4.67673 10.0282 4.53608 10.1689C4.39542 10.3095 4.31641 10.5003 4.31641 10.6992C4.31641 10.8981 4.39542 11.0889 4.53608 11.2295C4.67673 11.3702 4.86749 11.4492 5.06641 11.4492H7.26484C7.46376 11.4492 7.65452 11.3702 7.79517 11.2295C7.93583 11.0889 8.01484 10.8981 8.01484 10.6992C8.01484 10.5003 7.93583 10.3095 7.79517 10.1689C7.65452 10.0282 7.46376 9.94922 7.26484 9.94922ZM7.26484 13.5141H5.06641C4.86749 13.5141 4.67673 13.5931 4.53608 13.7337C4.39542 13.8744 4.31641 14.0652 4.31641 14.2641C4.31641 14.463 4.39542 14.6537 4.53608 14.7944C4.67673 14.935 4.86749 15.0141 5.06641 15.0141H7.26484C7.46376 15.0141 7.65452 14.935 7.79517 14.7944C7.93583 14.6537 8.01484 14.463 8.01484 14.2641C8.01484 14.0652 7.93583 13.8744 7.79517 13.7337C7.65452 13.5931 7.46376 13.5141 7.26484 13.5141ZM7.26484 17.0794H5.06641C4.86749 17.0794 4.67673 17.1584 4.53608 17.299C4.39542 17.4397 4.31641 17.6305 4.31641 17.8294C4.31641 18.0283 4.39542 18.2191 4.53608 18.3597C4.67673 18.5004 4.86749 18.5794 5.06641 18.5794H7.26484C7.46376 18.5794 7.65452 18.5004 7.79517 18.3597C7.93583 18.2191 8.01484 18.0283 8.01484 17.8294C8.01484 17.6305 7.93583 17.4397 7.79517 17.299C7.65452 17.1584 7.46376 17.0794 7.26484 17.0794ZM13.0605 9.94922H10.862C10.6631 9.94922 10.4724 10.0282 10.3317 10.1689C10.191 10.3095 10.112 10.5003 10.112 10.6992C10.112 10.8981 10.191 11.0889 10.3317 11.2295C10.4724 11.3702 10.6631 11.4492 10.862 11.4492H13.0605C13.2594 11.4492 13.4501 11.3702 13.5908 11.2295C13.7314 11.0889 13.8105 10.8981 13.8105 10.6992C13.8105 10.5003 13.7314 10.3095 13.5908 10.1689C13.4501 10.0282 13.2594 9.94922 13.0605 9.94922ZM13.0605 13.5141H10.862C10.6631 13.5141 10.4724 13.5931 10.3317 13.7337C10.191 13.8744 10.112 14.0652 10.112 14.2641C10.112 14.463 10.191 14.6537 10.3317 14.7944C10.4724 14.935 10.6631 15.0141 10.862 15.0141H13.0605C13.2594 15.0141 13.4501 14.935 13.5908 14.7944C13.7314 14.6537 13.8105 14.463 13.8105 14.2641C13.8105 14.0652 13.7314 13.8744 13.5908 13.7337C13.4501 13.5931 13.2594 13.5141 13.0605 13.5141ZM13.0605 17.0794H10.862C10.6631 17.0794 10.4724 17.1584 10.3317 17.299C10.191 17.4397 10.112 17.6305 10.112 17.8294C10.112 18.0283 10.191 18.2191 10.3317 18.3597C10.4724 18.5004 10.6631 18.5794 10.862 18.5794H13.0605C13.2594 18.5794 13.4501 18.5004 13.5908 18.3597C13.7314 18.2191 13.8105 18.0283 13.8105 17.8294C13.8105 17.6305 13.7314 17.4397 13.5908 17.299C13.4501 17.1584 13.2594 17.0794 13.0605 17.0794ZM18.8566 9.94922H16.6581C16.4592 9.94922 16.2684 10.0282 16.1278 10.1689C15.9871 10.3095 15.9081 10.5003 15.9081 10.6992C15.9081 10.8981 15.9871 11.0889 16.1278 11.2295C16.2684 11.3702 16.4592 11.4492 16.6581 11.4492H18.8566C19.0555 11.4492 19.2462 11.3702 19.3869 11.2295C19.5275 11.0889 19.6066 10.8981 19.6066 10.6992C19.6066 10.5003 19.5275 10.3095 19.3869 10.1689C19.2462 10.0282 19.0555 9.94922 18.8566 9.94922ZM18.8566 13.5141H16.6581C16.4592 13.5141 16.2684 13.5931 16.1278 13.7337C15.9871 13.8744 15.9081 14.0652 15.9081 14.2641C15.9081 14.463 15.9871 14.6537 16.1278 14.7944C16.2684 14.935 16.4592 15.0141 16.6581 15.0141H18.8566C19.0555 15.0141 19.2462 14.935 19.3869 14.7944C19.5275 14.6537 19.6066 14.463 19.6066 14.2641C19.6066 14.0652 19.5275 13.8744 19.3869 13.7337C19.2462 13.5931 19.0555 13.5141 18.8566 13.5141ZM18.8566 17.0794H16.6581C16.4592 17.0794 16.2684 17.1584 16.1278 17.299C15.9871 17.4397 15.9081 17.6305 15.9081 17.8294C15.9081 18.0283 15.9871 18.2191 16.1278 18.3597C16.2684 18.5004 16.4592 18.5794 16.6581 18.5794H18.8566C19.0555 18.5794 19.2462 18.5004 19.3869 18.3597C19.5275 18.2191 19.6066 18.0283 19.6066 17.8294C19.6066 17.6305 19.5275 17.4397 19.3869 17.299C19.2462 17.1584 19.0555 17.0794 18.8566 17.0794Z"
                            fill="white" />
                    </svg>
                    {{ $country->day }} Days
                </span>
                <span class="z_infor_separator">|</span>
                <span class="z_infor_detail">
                    <svg width="24" height="18" viewBox="0 0 24 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.780281 16.9777H23.506V17.9658H0.780281V16.9777ZM23.1619 1.41233C21.5114 0.450394 19.636 0.961376 18.3537 1.55936L14.5309 3.34194L7.95626 0.0351562L4.04087 0.203376L9.46999 5.70734L6.01 7.35095L2.41021 5.98094L0 7.10477L2.17816 9.80957C1.94804 10.0841 1.7395 10.4706 1.92882 10.8766C2.17608 11.4068 2.90691 11.6741 4.10569 11.674C4.35152 11.674 4.61707 11.6628 4.90208 11.6403C6.21799 11.5363 7.64467 11.2004 8.53675 10.7845L22.2016 4.41242C23.3819 3.86201 23.9698 3.28409 23.9989 2.6455C24.014 2.3143 23.8811 1.83137 23.1619 1.41233ZM21.7839 3.51688L8.11915 9.88896C7.35912 10.2434 6.11133 10.5403 4.94027 10.6455C3.74331 10.7529 3.10334 10.618 2.89002 10.5034C2.93393 10.4433 3.01594 10.3489 3.16727 10.2157L3.52218 9.90329L1.56046 7.46729L2.44904 7.0529L6.05269 8.42449L11.1496 6.00327L6.30806 1.09491L7.7418 1.03331L14.5145 4.43964L18.7711 2.4548C20.3257 1.7299 21.6355 1.66647 22.6643 2.26593L22.6643 2.26598C22.9235 2.41701 23.0141 2.54876 23.0118 2.60044C23.0117 2.604 22.982 2.95832 21.7839 3.51688Z"
                            fill="white" />
                    </svg>
                    {{ \Carbon\Carbon::parse($country->created_at)->format('j M Y') }}
                </span>
                <span class="z_infor_separator">|</span>
                <a href="#" class="z_infor_detail z_infor_pdf_link" id="downloadTourDetails">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21 18.5V15.5C21 15.3011 20.921 15.1103 20.7803 14.9697C20.6397 14.829 20.4489 14.75 20.25 14.75C20.0511 14.75 19.8603 14.829 19.7197 14.9697C19.579 15.1103 19.5 15.3011 19.5 15.5V18.5C19.5 18.6989 19.421 18.8897 19.2803 19.0303C19.1397 19.171 18.9489 19.25 18.75 19.25H5.25C5.05109 19.25 4.86032 19.171 4.71967 19.0303C4.57902 18.8897 4.5 18.6989 4.5 18.5V15.5C4.5 15.3011 4.42098 15.1103 4.28033 14.9697C4.13968 14.829 3.94891 14.75 3.75 14.75C3.55109 14.75 3.36032 14.829 3.21967 14.9697C3.07902 15.1103 3 15.3011 3 15.5V18.5C3 19.0967 3.23705 19.669 3.65901 20.091C4.08097 20.5129 4.65326 20.75 5.25 20.75H18.75C19.3467 20.75 19.919 20.5129 20.341 20.091C20.7629 19.669 21 19.0967 21 18.5ZM16.215 14.585L12.465 17.585C12.3326 17.6896 12.1688 17.7465 12 17.7465C11.8312 17.7465 11.6674 17.6896 11.535 17.585L7.785 14.585C7.64836 14.456 7.56511 14.2805 7.55173 14.093C7.53834 13.9056 7.59578 13.72 7.7127 13.5729C7.82962 13.4258 7.99749 13.328 8.18309 13.2987C8.3687 13.2695 8.55852 13.311 8.715 13.415L11.25 15.44V5C11.25 4.80109 11.329 4.61032 11.4697 4.46967C11.6103 4.32902 11.8011 4.25 12 4.25C12.1989 4.25 12.3897 4.32902 12.5303 4.46967C12.671 4.61032 12.75 4.80109 12.75 5V15.44L15.285 13.415C15.3605 13.3437 15.45 13.2889 15.5478 13.254C15.6457 13.2191 15.7497 13.2049 15.8533 13.2123C15.9569 13.2197 16.0578 13.2485 16.1496 13.297C16.2415 13.3454 16.3223 13.4124 16.3869 13.4937C16.4516 13.575 16.4986 13.6689 16.5251 13.7693C16.5515 13.8697 16.5568 13.9745 16.5407 14.0771C16.5245 14.1797 16.4872 14.2778 16.4312 14.3653C16.3751 14.4527 16.3015 14.5275 16.215 14.585Z"
                            fill="white" />
                    </svg>
                    Download PDF
                </a>
            </div>
        </div>
    </section>

    <!-- Navigation Tabs -->
    <div class="z_tour_tabs_container">
        <div class="z_tour_tabs">
            @foreach($informations as $index => $tab)
                <button class="z_tour_tab_btn {{ $loop->first ? 'active' : '' }}" 
                        data-tab="{{ $tab->tab_key }}">
                    {{ $tab->type }}
                </button>
            @endforeach
        </div>
    </div>

    <!-- Tab Content -->
    <div class="z_tour_content">
        <!-- Tour Details Tab -->
        <div class="z_tour_tab_content active" id="tour-details">
            <div class="z_tour_day_item">
                <h3 class="z_tour_day_title"> <span class="fw-normal">Day 1 :</span>Lorem Ipsum is simply dummy</h3>
                <p class="z_tour_day_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's stan Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's stan Lorem Ipsum is simply dummy text of
                    the printing and typesetting industry. Lorem Ipsum has been the industry's stan</p>
            </div>
            <div class="z_tour_day_item">
                <h3 class="z_tour_day_title"><span class="fw-normal">Day 2 :</span> Lorem Ipsum is simply dummy text
                </h3>
                <p class="z_tour_day_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's stan Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's stan Lorem Ipsum is simply dummy text of
                    the printing and typesetting industry. Lorem Ipsum has been the industry's stan Lorem Ipsum is
                    simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stan
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <div class="z_tour_day_item">
                <h3 class="z_tour_day_title"><span class="fw-normal">Day 3 :</span> Lorem Ipsum is simply</h3>
                <p class="z_tour_day_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's stan Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's stan Lorem Ipsum is simply dummy text of
                    the printing and typesetting industry. Lorem Ipsum has been the industry's stan</p>
            </div>
            <div class="z_tour_day_item">
                <h3 class="z_tour_day_title"><span class="fw-normal">Day 4 :</span> Lorem Ipsum is simply</h3>
                <p class="z_tour_day_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's stan Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's stan Lorem Ipsum is simply dummy text of
                    the printing and typesetting industry. Lorem Ipsum has been the industry's stan</p>
            </div>
            <div class="z_tour_day_item">
                <h3 class="z_tour_day_title"><span class="fw-normal">Day 5 :</span> Lorem Ipsum is simply</h3>
                <p class="z_tour_day_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's stan Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's stan Lorem Ipsum is simply dummy text of
                    the printing and typesetting industry. Lorem Ipsum has been the industry's stan</p>
            </div>
            <div class="z_tour_day_item">
                <h3 class="z_tour_day_title"><span class="fw-normal">Day 6 :</span> Lorem Ipsum is simply dummy text</h3>
                <p class="z_tour_day_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's stan Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's stan Lorem Ipsum is simply dummy text of
                    the printing and typesetting industry. Lorem Ipsum has been the industry's stan Lorem Ipsum is
                    simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stan
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <div class="z_tour_day_item">
                <h3 class="z_tour_day_title"><span class="fw-normal">Day 7 :</span> Lorem Ipsum is simply</h3>
                <p class="z_tour_day_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's stan Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's stan Lorem Ipsum is simply dummy text of
                    the printing and typesetting industry. Lorem Ipsum has been the industry's stan</p>
            </div>
        </div>

        <!-- Package Details Tab -->
        <div class="z_tour_tab_content" id="package-details">
            <div class="z_tour_section">
                <h3 class="z_tour_section_title">Travelling Details</h3>
                <ul class="z_tour_list">
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                </ul>
            </div>
            <div class="z_tour_section">
                <h3 class="z_tour_section_title">Package Includes</h3>
                <ul class="z_tour_list">
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                </ul>
            </div>
            <div class="z_tour_section">
                <h3 class="z_tour_section_title">Package Excludes</h3>
                <ul class="z_tour_list">
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                </ul>
            </div>
        </div>

        <!-- Visa Details Tab -->
        <div class="z_tour_tab_content" id="visa-details">
            <ul class="z_tour_list">
                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
            </ul>
        </div>

        <!-- Media Tab -->
        <div class="z_tour_tab_content" id="media">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 mb-3">
                        <div class="z_tour_media_item" onclick="openImageModal(0)">
                            <img src="{{ asset('frontend/Image/1.png')}}" alt="Travel Scene 1" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 mb-3">
                        <div class="z_tour_media_item" onclick="openImageModal(1)">
                            <img src="{{ asset('frontend/Image/2.png')}}" alt="Travel Scene 2" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 mb-3">
                        <div class="z_tour_media_item" onclick="openImageModal(2)">
                            <img src="{{ asset('frontend/Image/3.png')}}" alt="Travel Scene 3" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 mb-3">
                        <div class="z_tour_media_item" onclick="openImageModal(3)">
                            <img src="{{ asset('frontend/Image/4.png')}}" alt="Travel Scene 4" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 mb-3">
                        <div class="z_tour_media_item" onclick="openImageModal(4)">
                            <img src="{{ asset('frontend/Image/5.png')}}" alt="Travel Scene 5" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 mb-3">
                        <div class="z_tour_media_item" onclick="openImageModal(5)">
                            <img src="{{ asset('frontend/Image/6.png')}}" alt="Travel Scene 6" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 mb-3">
                        <div class="z_tour_media_item" onclick="openImageModal(6)">
                            <img src="{{ asset('frontend/Image/2.png')}}" alt="Travel Scene 7" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 mb-3">
                        <div class="z_tour_media_item" onclick="openImageModal(7)">
                            <img src="{{ asset('frontend/Image/4.png')}}" alt="Travel Scene 8" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image Preview Modal -->
        <div id="imageModal" class="z_image_modal">
            <div class="z_image_modal_content">
                <span class="z_image_modal_close" onclick="closeImageModal()">&times;</span>

                <!-- Main Image Container -->
                <div class="z_image_main_container">
                    <button class="z_image_nav_btn z_image_prev" onclick="changeImage(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <div class="z_image_main">
                        <img id="modalMainImage" src="" alt="Main Image">
                    </div>

                    <button class="z_image_nav_btn z_image_next" onclick="changeImage(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Thumbnail Gallery -->
                <div class="z_image_thumbnails">
                    <div class="z_image_thumb active" onclick="selectImage(0)">
                        <img src="{{ asset('frontend/Image/1.png')}}" alt="Thumbnail 1">
                    </div>
                    <div class="z_image_thumb" onclick="selectImage(1)">
                        <img src="{{ asset('frontend/Image/2.png')}}" alt="Thumbnail 2">
                    </div>
                    <div class="z_image_thumb" onclick="selectImage(2)">
                        <img src="{{ asset('frontend/Image/3.png')}}" alt="Thumbnail 3">
                    </div>
                    <div class="z_image_thumb" onclick="selectImage(3)">
                        <img src="{{ asset('frontend/Image/4.png')}}" alt="Thumbnail 4">
                    </div>
                    <div class="z_image_thumb" onclick="selectImage(4)">
                        <img src="{{ asset('frontend/Image/5.png')}}" alt="Thumbnail 5">
                    </div>
                    <div class="z_image_thumb" onclick="selectImage(5)">
                        <img src="{{ asset('frontend/Image/6.png')}}" alt="Thumbnail 6">
                    </div>
                    <div class="z_image_thumb" onclick="selectImage(6)">
                        <img src="{{ asset('frontend/Image/2.png')}}" alt="Thumbnail 7">
                    </div>
                    <div class="z_image_thumb" onclick="selectImage(7)">
                        <img src="{{ asset('frontend/Image/4.png')}}" alt="Thumbnail 8">
                    </div>
                </div>
            </div>
        </div>

        <!-- Terms & Conditions Tab -->
        <div class="z_tour_tab_content" id="terms">
            <div class="z_tour_section">
                <h3 class="z_tour_section_title">Remarks</h3>
                <ul class="z_tour_list">
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                </ul>
            </div>
            <div class="z_tour_section">
                <h3 class="z_tour_section_title">Cancellation Policy</h3>
                <ul class="z_tour_list">
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                </ul>
            </div>
            <div class="z_tour_section">
                <h3 class="z_tour_section_title">Terms & Conditions</h3>
                <ul class="z_tour_list">
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's stan Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- slider -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
        // Tab functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.z_tour_tab_btn');
            const tabContents = document.querySelectorAll('.z_tour_tab_content');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));

                    // Add active class to clicked button
                    this.classList.add('active');

                    // Show corresponding content
                    const targetTab = this.getAttribute('data-tab');
                    const targetContent = document.getElementById(targetTab);
                    if (targetContent) {
                        targetContent.classList.add('active');
                    }
                });
            });
        });

        // Image Modal Functionality
        let currentImageIndex = 0;
        const images = [
            '../Image/1.png',
            '../Image/2.png',
            '../Image/3.png',
            '../Image/4.png',
            '../Image/5.png',
            '../Image/6.png',
            '../Image/2.png',
            '../Image/4.png'
        ];

        function openImageModal(index) {
            currentImageIndex = index;
            const modal = document.getElementById('imageModal');
            const mainImage = document.getElementById('modalMainImage');

            mainImage.src = images[index];
            modal.style.display = 'block';

            // Update thumbnail active state
            updateThumbnailActive();

            // Prevent body scroll
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.style.display = 'none';

            // Restore body scroll
            document.body.style.overflow = 'auto';
        }

        function changeImage(direction) {
            currentImageIndex += direction;

            // Loop through images
            if (currentImageIndex >= images.length) {
                currentImageIndex = 0;
            } else if (currentImageIndex < 0) {
                currentImageIndex = images.length - 1;
            }

            const mainImage = document.getElementById('modalMainImage');
            mainImage.src = images[currentImageIndex];

            // Update thumbnail active state
            updateThumbnailActive();
        }

        function selectImage(index) {
            currentImageIndex = index;
            const mainImage = document.getElementById('modalMainImage');
            mainImage.src = images[index];

            // Update thumbnail active state
            updateThumbnailActive();
        }

        function updateThumbnailActive() {
            const thumbs = document.querySelectorAll('.z_image_thumb');
            thumbs.forEach((thumb, index) => {
                if (index === currentImageIndex) {
                    thumb.classList.add('active');
                } else {
                    thumb.classList.remove('active');
                }
            });
        }

        // Close modal when clicking outside
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeImageModal();
            }
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('imageModal');
            if (modal.style.display === 'block') {
                if (e.key === 'Escape') {
                    closeImageModal();
                } else if (e.key === 'ArrowLeft') {
                    changeImage(-1);
                } else if (e.key === 'ArrowRight') {
                    changeImage(1);
                }
            }
        });
    </script>
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

    <!-- jsPDF and html2canvas CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        document.getElementById('downloadTourDetails').addEventListener('click', function(e) {
            e.preventDefault();
            var tourDetails = document.getElementById('tour-details');
            var placeNameElem = document.querySelector('.z_infor_hero_title');
            var placeName = placeNameElem ? placeNameElem.textContent.trim() : 'Tour Place';
            if (!tourDetails) return;
            html2canvas(tourDetails, {
                scale: 2
            }).then(function(canvas) {
                var imgData = canvas.toDataURL('image/png');
                var pdf = new window.jspdf.jsPDF('p', 'mm', 'a4');
                var pageWidth = pdf.internal.pageSize.getWidth();
                var pageHeight = pdf.internal.pageSize.getHeight();
                var margin = 10;
                var y = margin + 10; // Start a bit lower for the heading
                // Add place name as heading
                pdf.setFontSize(20);
                pdf.text(placeName, pageWidth / 2, y, {
                    align: 'center'
                });
                y += 10; // Space after heading
                // Calculate image size
                var imgWidth = pageWidth - 2 * margin;
                var imgHeight = canvas.height * imgWidth / canvas.width;
                y += 5; // Small gap between heading and image
                // If image is too tall, scale it to fit the page
                if (y + imgHeight > pageHeight - margin) {
                    imgHeight = pageHeight - y - margin;
                }
                pdf.addImage(imgData, 'PNG', margin, y, imgWidth, imgHeight);
                pdf.save('TourDetails.pdf');
            });
        });
    </script>
@endpush
