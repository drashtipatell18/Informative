<!DOCTYPE html>
<html>

<head>
    <title>{{ $country->name }} - Tour PDF</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Noto Color Emoji', 'Segoe UI Emoji', 'Apple Color Emoji', Arial, sans-serif;
            line-height: 1.5;
            color: #000;
            background: #fff;
        }

        .header {
            padding: 20px 30px 15px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-left {
            width: 40%;
            vertical-align: top;
        }

        .header-right {
            width: 60%;
            text-align: right;
            font-size: 11px;
            line-height: 1.4;
            font-weight: bold;
        }

        .logo-section img {
            max-width: 150px;
            height: auto;
        }

        /* Title Section */
        .title-section {
            margin: 10px 40px 12px;
            text-align: center;
            border-bottom: 1px solid #999;
            padding-bottom: 10px;
        }

        .tour-title-main {
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 0.3px;
            margin-bottom: 6px;
        }

        .tour-subtitle {
            font-size: 11.5px;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .tour-locations {
            font-size: 11px;
            font-weight: normal;
            margin-bottom: 6px;
        }

        .tour-dates {
            font-size: 11px;
            font-weight: bold;
            color: #d40000;
        }

        /* PDF Body */
        .pdf-body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 11px;
            color: #000;
        }

        .divider-line {
            border-top: 1px solid #999;
            margin: 10px 40px;
        }

        .journey-title {
            margin: 8px 40px 4px;
            font-weight: bold;
        }

        .journey-desc {
            margin: 0 40px 8px;
        }

        .section-heading {
            margin: 8px 40px;
            font-weight: bold;
        }

        .day-block {
            margin: 10px 40px;
        }

        .day-title {
            font-weight: bold;
            margin-bottom: 4px;
        }

        .day-list {
            margin-left: 18px;
        }

        .day-list li {
            margin-bottom: 4px;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="header">
        <table class="header-table">
            <tr>
                <td class="header-left">
                    <img src="{{ public_path('images/logo.png') }}" width="150" alt="Shreenathji Tourism">
                </td>
                <td class="header-right">
                    BHAVIK BAVADIYA : +91 9537632323<br>
                    JENISH BAVADIYA : +91 7096828255<br>
                    ALSO CALL US AT : +91 9033060035
                </td>
            </tr>
        </table>
    </div>

    <!-- Title Section -->
    <div class="title-section">
        <div class="tour-title-main">🛵✨ ROYAL {{ strtoupper($country->name) }} – SPECIAL HONEYMOON TOUR ✨🛵</div>
        @php
            $totalDays = (int) $country->day;
            $days = $totalDays - 2;   // 09
            $nights = $days - 1;      // 08
        @endphp

        <div class="tour-subtitle">
            {{ sprintf('%02d', $nights) }} NIGHT
            {{ sprintf('%02d', $days) }} DAYS =
            {{ $totalDays }} DAYS TOUR
        </div>
        <div class="tour-locations">Katra • Pahalgam • Gulmarg • Srinagar</div>
        <div class="tour-dates">GROUP TOUR DATES : 25 FEBRUARY 2026 / 10 MARCH 2026</div>
    </div>

    <!-- PDF Body -->
    <div class="pdf-body">
        <div class="journey-title">🏔️❤️ A Journey of Love in Kashmir – The Paradise on Earth</div>
        <div class="journey-desc">Specially designed for couples to enjoy comfort, romance, nature & unforgettable
            memories.</div>

        <div class="divider-line"></div>

        <div class="section-heading">📅 DAY–WISE ITINERARY (Beautiful & Easy-to-Read)</div>

        <div class="divider-line"></div>

        <div class="day-block">
            @php
                use Illuminate\Support\Str;
            @endphp

            @foreach($packageDetails as $detail)

                @php
                    // Description ne lines maa convert karo
                    $lines = array_values(array_filter(
                        array_map('trim', explode("\n", strip_tags($detail->description)))
                    ));

                    // First 3 unwanted lines remove
                    $lines = array_slice($lines, 3);
                @endphp

                {{-- Check if title contains "Day" --}}
                @if(Str::contains($detail->title, 'Day'))

                    <div class="day-block">
                        <div class="day-title">
                            <strong>{{ $detail->title }}</strong>
                        </div>

                        <ul class="day-list">
                            @foreach($lines as $line)
                                <li>{{ $line }}</li>
                            @endforeach
                        </ul>
                    </div>

                @else

                    <div class="info-section">
                        <h4>{{ $detail->title }}</h4>
                        {!! $detail->description !!}
                    </div>

                @endif

            @endforeach


            @if($visaDetails && $visaDetails->count())
                <hr>
                <div class="info-section">
                    <h3>🛂 Visa Information</h3>
                    <div class="content">
                        @foreach($visaDetails as $detail)
                            <h4>{{ $detail->title }}</h4>
                            {!! $detail->description !!}
                        @endforeach
                    </div>
                </div>
            @endif


            <div class="footer-address">
                411 Kyros Business Center, Sarthana Jakatnaka, Surat-395006
            </div>

        </div>






    </div>






</body>

</html>