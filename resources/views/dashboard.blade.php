@extends('layouts.app')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .dashboard-body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 20px;
    }

    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .dashboard-header {
        text-align: center;
        margin-bottom: 40px;
        color: #f8f9ff;
    }

    .dashboard-header h1 {
        font-size: 2.5rem;
        font-weight: 300;
        margin-bottom: 10px;
        color: white;
    }

    .dashboard-header p {
        font-size: 1.1rem;
        opacity: 0.9;
        color: #000
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: rgba(248, 249, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 30px;
        text-align: center;
        color: #f8f9ff;
        border: 1px solid rgba(248, 249, 255, 0.2);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(248,249,255,0.1) 0%, rgba(248,249,255,0.05) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,20,60,0.2);
    }

    .stat-card:hover::before {
        opacity: 1;
    }

    .stat-icon {
        font-size: 3rem;
        margin-bottom: 20px;
        background: linear-gradient(45deg, #FFD700, #FFA500);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        filter: drop-shadow(2px 2px 4px rgba(0,20,60,0.3));
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        text-shadow: 2px 2px 4px rgba(0,20,60,0.3);
    }

    .stat-label {
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        opacity: 0.9;
        font-weight: 500;
    }

    .quick-actions {
        background: rgba(248, 249, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 30px;
        border: 1px solid rgba(248, 249, 255, 0.2);
    }

    .quick-actions h2 {
        color: #f8f9ff;
        margin-bottom: 25px;
        font-size: 1.5rem;
        font-weight: 400;
    }

    .action-buttons {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }

    .action-btn {
        background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
        color: #f8f9ff;
        border: none;
        padding: 15px 25px;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .action-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,20,60,0.2);
        text-decoration: none;
        color: #f8f9ff;
    }

    .action-btn i {
        font-size: 1.1rem;
    }

    @keyframes countUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .stat-card {
        animation: countUp 0.6s ease-out forwards;
    }

    .stat-card:nth-child(1) { animation-delay: 0.1s; }
    .stat-card:nth-child(2) { animation-delay: 0.2s; }
    .stat-card:nth-child(3) { animation-delay: 0.3s; }
    .stat-card:nth-child(4) { animation-delay: 0.4s; }

    @media (max-width: 768px) {
        .dashboard-header h1 {
            font-size: 2rem;
        }

        .stat-number {
            font-size: 2rem;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .action-buttons {
            grid-template-columns: 1fr;
        }
    }
    .custom{
        color:#000!important;
    }
</style>
@section('content')
 <div class="dashboard-container">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <h1>Admin Dashboard</h1>
            <p>Welcome back! Here's an overview of your system</p>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <div class="stat-number custom" id="categories-count">{{ $categories }}</div>
                <div class="stat-label custom">Categories</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <div class="stat-number custom" id="services-count">{{ $services }}</div>
                <div class="stat-label custom">Services</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-number custom" id="testimonials-count">{{ $testimonial }}</div>
                <div class="stat-label custom">Testimonials</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="stat-number custom" id="information-count">{{ $infomation }}</div>
                <div class="stat-label custom">Information</div>
            </div>
        </div>
@endsection
