<!DOCTYPE html>
<html>
<head>
    <title>{{ $country->name }} - Tour PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            line-height: 1.5;
            color: #222;
            margin: 20px;
        }

        h1, h2, h3 {
            color: #1a8a73;
        }

        .section {
            margin-bottom: 30px;
        }

        .title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .info {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .card {
            background: #f8f8f8;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 15px;
            box-shadow: 0 2px 3px rgba(0,0,0,0.05);
        }

        .card h3 {
            margin-top: 0;
        }

        .card p, .card ul {
            font-size: 14px;
        }

        hr {
            border: none;
            height: 1px;
            background: #ddd;
            margin: 20px 0;
        }

        /* Gallery styles */
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }

      .gallery img {
    width: 300px;
    height: 180px;
    border-radius: 5px;
    object-fit: cover;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
    </style>
</head>
<body>

    <!-- Country Info -->
    <div class="section">
        <div class="title">{{ $country->name }}</div>
        <div class="info">🕐 Duration: {{ $country->day }} Days</div>
        <div class="info">📅 Created On: {{ \Carbon\Carbon::parse($country->created_at)->format('d M Y') }}</div>
    </div>

    <hr>

    <!-- Gallery First -->
   @if(!empty($images))
    <div class="section">
        <div class="gallery">
            @foreach($images as $image)
                <img src="{{ public_path('images/countries/' . $image) }}" alt="Tour Image">
            @endforeach
        </div>
    </div>
@endif

    <!-- Tour Details -->
    @if($tourDetails && $tourDetails->count())
        <div class="section">
            <h2>🧭 Tour Details</h2>
            @foreach($tourDetails as $detail)
                <div class="card">
                    <h3>{{ $detail->title }}</h3>
                    {!! $detail->description !!}
                </div>
            @endforeach
        </div>
    @endif

    <!-- Package Details -->
    @if($packageDetails && $packageDetails->count())
        <div class="section">
            <h2>📦 Package Details</h2>
            @foreach($packageDetails as $detail)
                <div class="card">
                    <h3>{{ $detail->title }}</h3>
                    {!! $detail->description !!}
                </div>
            @endforeach
        </div>
    @endif

    <!-- Visa Details -->
    @if($visaDetails && $visaDetails->count())
        <div class="section">
            <h2>🛂 Visa Information</h2>
            @foreach($visaDetails as $detail)
                <div class="card">
                    <h3>{{ $detail->title }}</h3>
                    {!! $detail->description !!}
                </div>
            @endforeach
        </div>
    @endif

</body>
</html>
