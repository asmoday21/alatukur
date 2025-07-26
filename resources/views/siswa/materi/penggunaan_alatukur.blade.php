{{-- resources/views/siswa/materi/alat_ukur_jaringan_komputer.blade.php --}}

@extends('siswa.siswa_master')

@section('siswa')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penggunaan Alat Ukur Jaringan Komputer</title>
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" xintegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWtIXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Three.js for 3D sphere -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <style>
        /* New Color Palette: Dark background with vibrant green and yellow/orange accents */
        :root {
            --bg-primary: #030505; /* Very dark background, not pure black */
            --bg-secondary: #111111; /* Slightly lighter dark for cards */
            --accent-primary: #00e676; /* Vibrant Green for tech/measurement */
            --accent-primary-rgb: 0, 230, 118; /* RGB for primary accent */
            --accent-secondary: #ffcc00; /* Bright Yellow/Orange for warnings/highlights */
            --accent-secondary-rgb: 255, 204, 0; /* RGB for secondary accent */
            /* --text-light: #fafafa; Light gray for general text */
            --success-green: #28a745;
            --success-green-rgb: 40, 167, 69;
            --danger-red: #dc3545;
            --danger-red-rgb: 220, 53, 69;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-primary);
            --text-light: #ffffff;
            overflow-x: hidden; /* Prevent horizontal scroll due to animations */
        }

        .container {
            max-width: 1200px;
        }

        /* --- Global Animations --- */
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fade-in-down {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slide-in-left {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slide-in-right {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes scale-in {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }
        @keyframes float-node {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        /* Initial hidden state managed by this class */
        .hidden-initial {
            opacity: 0;
            transform: translateY(30px); /* Default animation start position */
        }
        /* Specific initial transforms for children that are set by JS, but if they get this class, it overrides */
        .hidden-initial.slide-in-left-initial {
            transform: translateX(-50px);
        }
        .hidden-initial.scale-in-initial {
            transform: scale(0.8);
        }

        /* Animation classes - these are added by JS when element becomes visible */
        .animate-fade-in-up {
            animation: fade-in-up 1s ease-out forwards;
        }
        .animate-fade-in-down {
            animation: fade-in-down 0.8s ease-out forwards;
        }
        .animate-slide-in-left {
            animation: slide-in-left 0.7s ease-out forwards;
        }
        .animate-slide-in-right {
            animation: slide-in-right 0.7s ease-out forwards;
        }
        .animate-fade-in {
            animation: fade-in 1.5s ease-out forwards;
        }
        .animate-scale-in {
            animation: scale-in 0.8s ease-out forwards;
        }

        /* --- Hero Section Specific Styles and Animations --- */
        .hero-section {
            min-height: 90vh;
            background: radial-gradient(ellipse at center, var(--bg-primary) 0%, #b8b6b6 100%); /* Darker gradient */
            border-bottom: 1px solid rgba(var(--accent-primary-rgb), 0.2); /* Primary accent border */
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fade-in 1.5s ease-out forwards;
        }

        @keyframes gridScroll {
            0% { background-position: 0 0; }
            100% { background-position: 1000px 1000px; } /* Increased distance for smoother, less repetitive scroll */
        }
        .hero-section > div:first-child { /* Animated grid background */
            background-image: 
                linear-gradient(rgba(var(--accent-primary-rgb), 0.05) 1px, transparent 1px), /* Primary accent grid */
                linear-gradient(90deg, rgba(var(--accent-primary-rgb), 0.05) 1px, transparent 1px); /* Primary accent grid */
            background-size: 40px 40px;
            animation: gridScroll 60s linear infinite; /* Faster scroll */
            z-index: 0; /* Ensure it's behind content */
        }
        
        /* Canvas will cover the entire hero background */
        #heroCanvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1; /* Below content */
        }

        /* Ensure content is above the canvas */
        .hero-section .container {
            position: relative;
            z-index: 10; 
        }

        .hero-section h1 {
            opacity: 0; /* Start hidden */
            animation: fade-in-up 1s ease-out 0.5s forwards;
            font-size: 3.5rem; /* Slightly larger for impact */
            text-align: left; /* Align left as per image */
            margin-left: 0; /* Ensure no auto margin */
            margin-right: auto; /* Push to left */
            max-width: 600px; /* Limit width to keep it compact */
            margin-bottom: 2.5rem; /* Adjusted for better spacing */
        }

        .title-word {
            display: inline-block;
            margin: 0 5px;
            animation: titleWord 4s infinite ease-in-out;
            transform-origin: bottom; /* For better bounce effect */
        }
        @keyframes titleWord {
            0% { transform: translateY(0); }
            50% { transform: translateY(-8px); } /* Stronger bounce */
            100% { transform: translateY(0); }
        }
        .title-word:nth-child(1) { animation-delay: 0s; }
        .title-word:nth-child(2) { animation-delay: 0.2s; }
        .title-word:nth-child(3) { animation-delay: 0.4s; }
        .title-word:nth-child(4) { animation-delay: 0.6s; }
        .title-word:nth-child(5) { animation-delay: 0.8s; }

        .hero-section .lead {
            font-size: 1.45rem; /* Slightly larger lead text */
            max-width: 700px;
            margin: 0 auto 3.5rem 0; /* Adjusted for better spacing */
            position: relative;
            opacity: 0; /* Start hidden */
            animation: fade-in-up 1s ease-out 1s forwards;
            text-align: left; /* Align left as per image */
        }
        .text-gradient {
            background: linear-gradient(90deg, var(--accent-primary), #05ee8dcc); /* Primary accent gradient */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
            font-weight: 500;
        }

        .btn-neon {
            background: linear-gradient(45deg, rgba(var(--accent-primary-rgb), 0.2), rgba(0, 179, 92, 0.2)); /* Primary accent background */
            color: var(--accent-primary);
            border: 1px solid var(--accent-primary);
            box-shadow: 0 0 15px rgba(var(--accent-primary-rgb), 0.6); /* Primary accent glow */
            transition: all 0.4s ease-out;
            padding: 12px 30px; /* Bigger button */
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            opacity: 0; /* Start hidden */
            animation: scale-in 0.8s ease-out 1.5s forwards;
        }
        .btn-neon:hover {
            background: linear-gradient(45deg, rgba(var(--accent-primary-rgb), 0.4), rgba(0, 179, 92, 0.4)); /* Primary accent background */
            box-shadow: 0 0 25px rgba(var(--accent-primary-rgb), 0.9), 0 0 40px rgba(0, 179, 92, 0.5); /* Primary accent glow */
            transform: translateY(-3px) scale(1.02);
            color: #fff; /* White text on hover */
        }
        
        .btn-outline-neon {
            color: var(--accent-secondary);
            border: 1px solid var(--accent-secondary);
            background: transparent;
            transition: all 0.4s ease-out;
            padding: 12px 30px; /* Bigger button */
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            opacity: 0; /* Start hidden */
            animation: scale-in 0.8s ease-out 1.7s forwards;
        }
        .btn-outline-neon:hover {
            background: rgba(var(--accent-secondary-rgb), 0.1); /* Secondary accent background */
            box-shadow: 0 0 15px rgba(var(--accent-secondary-rgb), 0.6); /* Secondary accent glow */
            transform: translateY(-3px) scale(1.02);
            color: #fff; /* White text on hover */
        }
        
        .tags-container {
            display: flex;
            justify-content: flex-start; /* Align tags to the left */
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 2.5rem; /* Adjusted for better spacing */
            max-width: 700px; /* Limit width */
        }
        .tag-bubble {
            padding: 8px 20px;
            background: rgba(var(--accent-secondary-rgb), 0.1); /* Secondary accent background */
            color: var(--accent-secondary);
            border-radius: 50px;
            border: 1px solid rgba(var(--accent-secondary-rgb), 0.3); /* Secondary accent border */
            font-size: 0.95rem; /* Slightly larger text */
            animation: float-node 6s infinite ease-in-out, fade-in 1s ease-out forwards; /* Combined animations */
            opacity: 0; /* Start hidden */
            animation-fill-mode: forwards;
        }
        .tag-bubble:nth-child(1) { animation-delay: 2.0s; }
        .tag-bubble:nth-child(2) { animation-delay: 2.2s; }
        .tag-bubble:nth-child(3) { animation-delay: 2.4s; }
        .tag-bubble:nth-child(4) { animation-delay: 2.6s; }
        .tag-bubble:nth-child(5) { animation-delay: 2.8s; }

        /* Three.js sphere container */
        #cyber-sphere {
            width: 300px; /* Fixed size for sphere */
            height: 300px;
            position: absolute; /* Absolute positioning */
            right: 5%; /* Adjusted from 10% */
            top: 5%; /* Adjusted from 10% */
            /* transform: translateY(-50%); REMOVE THIS */
            z-index: 1;
            opacity: 0; /* Start hidden */
            animation: fade-in 1.5s ease-out 1.8s forwards;
        }

        /* --- Main Content Section Styles --- */
        .breadcrumb {
            opacity: 0; /* Start hidden for animation */
            animation: fade-in-down 0.8s ease-out 0.2s forwards;
        }
        
        .section-title {
            font-size: 2.5rem; /* Larger section titles */
            font-weight: 700;
            color: var(--accent-primary); /* Primary accent for titles */
            margin-bottom: 2.5rem;
            text-align: center;
            position: relative;
            padding-bottom: 0.75rem;
            text-shadow: 0 0 10px rgba(var(--accent-primary-rgb), 0.3); /* Primary accent shadow */
            opacity: 0; /* Start hidden for animation */
            animation: fade-in-up 0.8s ease-out forwards;
        }
        .section-title::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 100px; /* Wider underline */
            height: 5px; /* Thicker underline */
            background-color: var(--accent-primary); /* Primary accent for underline */
            border-radius: 3px;
            box-shadow: 0 0 10px var(--accent-primary); /* Primary accent shadow */
        }

        .card {
            background: var(--bg-secondary); /* Secondary background for cards */
            border: 1px solid rgba(var(--accent-primary-rgb), 0.2); /* Primary accent border */
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            margin-bottom: 2rem; /* Consistent spacing */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px) scale(1.01);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6), 0 0 20px rgba(var(--accent-primary-rgb), 0.4); /* Primary accent glow */
        }

        .card-header {
            background: rgba(var(--accent-primary-rgb), 0.1); /* Lighter header for cards with primary accent */
            border-bottom: 1px solid rgba(var(--accent-primary-rgb), 0.3); /* Primary accent border */
            color: var(--accent-primary); /* Primary accent color */
            font-weight: 600;
            padding: 1.2rem 1.5rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap; /* Allow wrapping on small screens */
        }
        .card-header h2, .card-header .fas {
            color: var(--accent-primary) !important; /* Primary accent color */
            text-shadow: 0 0 5px rgba(var(--accent-primary-rgb), 0.5); /* Primary accent shadow */
        }
        .card-header .badge {
            background-color: rgba(var(--accent-secondary-rgb), 0.2) !important; /* Secondary accent */
            color: var(--accent-secondary) !important; /* Secondary accent */
            border: 1px solid rgba(var(--accent-secondary-rgb), 0.4); /* Secondary accent border */
            font-weight: 500;
            padding: 0.5em 1em;
            border-radius: 0.5rem;
            margin-left: 10px; /* Space between title and badge */
        }

        .card-body {
            color: var(--text-light);
            padding: 1.5rem;
        }
        .card-body h5, .card-body h6 {
            color: var(--accent-primary); /* Primary accent color */
            text-shadow: 0 0 3px rgba(var(--accent-primary-rgb), 0.2); /* Primary accent shadow */
        }
        .card-body p, .card-body ul, .card-body ol, .card-body li, .card-body span {
            /* Initial opacity for reveal-item-child elements. Will be dynamically managed by JS */
        }
        .card-body .fas {
            color: var(--accent-primary); /* Primary accent color */
        }

        .alert-info {
            background-color: rgba(var(--accent-primary-rgb), 0.1);
            border-color: rgba(var(--accent-primary-rgb), 0.3);
            color: var(--accent-primary);
        }
        .alert-warning {
            background-color: rgba(var(--accent-secondary-rgb), 0.1);
            border-color: rgba(var(--accent-secondary-rgb), 0.3);
            color: var(--accent-secondary);
        }
        .alert-info .fas, .alert-warning .fas {
            color: inherit; /* Inherit color from alert */
        }

        /* New styles for embedded videos */
        .video-wrapper {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
            border-radius: 0.75rem; /* Match card body border-radius */
            margin-top: 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .diagram-container {
            text-align: center;
            background: var(--bg-secondary); /* Secondary background */
            border: 1px solid rgba(var(--accent-primary-rgb), 0.2); /* Primary accent border */
            border-radius: 1rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            padding: 1.5rem; /* Added padding for diagrams */
            margin-top: 1.5rem; /* Space above diagram */
            margin-bottom: 1.5rem; /* Space below diagram */
        }
        .diagram-container img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin-top: 1rem;
        }
        .diagram-container p.text-muted {
            color: #a0aec0 !important;
            font-size: 0.9rem;
            margin-top: 1rem;
        }

        /* Three.js Model Viewer Styling */
        model-viewer {
            width: 100%;
            height: 500px;
            background-color: transparent; /* Keep transparent background */
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }
        .model-viewer-description {
            /* No specific initial opacity, controlled by JS reveal now */
        }

        /* Binary background animation for content sections */
        .binary-animation-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
            font-family: 'Consolas', 'Monaco', monospace;
            font-size: 0.8em;
            color: rgba(var(--accent-primary-rgb), 0.03); /* Primary accent for binary */
            line-height: 1.2;
            pointer-events: none;
        }
        .binary-animation-bg div {
            position: absolute;
            white-space: nowrap;
            animation: binaryFall linear infinite;
        }
        @keyframes binaryFall {
            0% { transform: translateY(-100%); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(100%); opacity: 0; }
        }

        /* Responsive Adjustments */
        @media (max-width: 991.98px) {
            .hero-section {
                min-height: 70vh;
            }
            .hero-section h1 {
                font-size: 2.5rem;
            }
            .hero-section .lead {
                font-size: 1.1rem;
            }
            .btn-neon, .btn-outline-neon {
                padding: 10px 25px;
                font-size: 0.9rem;
            }
            .tag-bubble {
                font-size: 0.85rem;
                padding: 6px 15px;
            }
            .hero-section .d-lg-block { /* Hide 3D sphere on small screens */
                display: none !important;
            }
            .section-title {
                font-size: 2rem;
            }
            .card-header h2 {
                font-size: 1.2rem;
            }
            .card-body {
                padding: 1rem;
            }
        }
        /* Quiz Section styles */
        .quiz-card {
            background: var(--bg-secondary); /* Secondary background */
            border: 1px solid rgba(var(--accent-primary-rgb), 0.2); /* Primary accent border */
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            margin-bottom: 2rem;
            padding: 2rem;
            color: var(--text-light);
        }

        .quiz-option {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(var(--accent-primary-rgb), 0.1); /* Primary accent border */
            border-radius: 0.75rem;
            padding: 1rem;
            margin-bottom: 0.75rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .quiz-option:hover {
            background: rgba(var(--accent-primary-rgb), 0.08); /* Primary accent hover */
            border-color: rgba(var(--accent-primary-rgb), 0.3); /* Primary accent border */
        }

        .quiz-option.selected {
            background: rgba(var(--accent-primary-rgb), 0.2); /* Primary accent selected */
            border-color: var(--accent-primary); /* Primary accent border */
            font-weight: bold;
        }

        .quiz-option.correct-answer {
            background: rgba(var(--success-green-rgb), 0.2); /* Green */
            border-color: var(--success-green);
            font-weight: bold;
        }

        .quiz-option.incorrect {
            background: rgba(var(--danger-red-rgb), 0.2); /* Red */
            border-color: var(--danger-red);
            font-weight: bold;
        }

        .quiz-option label {
            width: 100%;
            cursor: pointer;
            display: block;
        }

        .quiz-option input[type="radio"] {
            display: none; /* Hide default radio button */
        }
        
        #quiz-feedback {
            font-size: 1.1rem;
        }
        #quiz-feedback.text-success {
            color: var(--success-green) !important;
        }
        #quiz-feedback.text-danger {
            color: var(--danger-red) !important;
        }
        #quiz-feedback.text-warning {
            color: var(--accent-secondary) !important; /* Secondary accent for warning */
        }

    </style>
</head>
<body>

<div class="main-wrapper">
    <div class="container py-5">
        <!-- Header dengan Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('siswa.siswa_master')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('siswa.materi.index')}}">Materi</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Penggunaan Alat Ukur Jaringan Komputer</li>
            </ol>
        </nav>

        <!-- Hero Section -->
        <section class="hero-section position-relative overflow-hidden mb-5">
            <!-- Canvas for dynamic background animation -->
            <canvas id="heroCanvas"></canvas>

            <div class="container position-relative z-2 h-100 d-flex align-items-center">
                <div class="row w-100 align-items-center">
                    <div class="col-lg-8 py-5"> <!-- Removed mx-auto and text-center -->
                        <!-- Animated title -->
                        <h1 class="display-3 fw-bold mb-4 text-white" style="text-shadow: 0 0 10px rgba(var(--accent-primary-rgb), 0.5);">
                            <span class="title-word">Penggunaan</span>
                            <span class="title-word">Alat</span>
                            <span class="title-word">Ukur</span>
                            <span class="title-word">Jaringan</span>
                        </h1>

                        <!-- Glowing description -->
                        <p class="lead mb-5 text-white-75">
                            <span class="text-gradient">Pelajari cara menggunakan berbagai alat ukur untuk instalasi, diagnosa, dan pemeliharaan jaringan komputer dan telekomunikasi.</span>
                        </p>

                        <!-- Interactive buttons -->
                        <div class="d-flex flex-wrap justify-content-start gap-3 mb-5"> <!-- Changed to justify-content-start -->
                            <a href="#detail-alat-ukur" class="btn btn-neon btn-lg px-4 fw-bold">
                                <i class="fas fa-tools me-2"></i>Mulai Praktik Pengukuran
                            </a>
                            <a href="#quiz-section" class="btn btn-outline-neon btn-lg px-4 fw-bold">
                                <i class="fas fa-question-circle me-2"></i>Uji Pemahaman
                            </a>
                        </div>

                        <!-- Animated tags -->
                        <div class="tags-container">
                            <div class="tag-bubble">LAN Tester</div>
                            <div class="tag-bubble">Multimeter</div>
                            <div class="tag-bubble">Earth Tester</div>
                            <div class="tag-bubble">Optical Power Meter</div>
                            <div class="tag-bubble">OTDR</div>
                            <div class="tag-bubble">Fusion Splicer</div>
                            <div class="tag-bubble">Wi-Fi Analyzer</div>
                            <div class="tag-bubble">Ping Test</div>
                            <div class="tag-bubble">Speed Test</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Floating 3D sphere -->
            <div class="position-absolute d-none d-lg-block" style="
                width: 350px;
                height: 350px;
                right: 2%; /* Adjusted from 10% */
                top: 15%; /* Adjusted from 10% */
                z-index: 1;
            ">
                <div class="h-100 w-100" id="cyber-sphere"></div>
            </div>
        </section>

        <!-- Main Content -->
        <main>
            <!-- Pengantar Penggunaan Alat Ukur Section -->
            <section id="pengantar-penggunaan" class="py-5 position-relative">
                <div class="binary-animation-bg" id="binary-bg-1"></div>
                <h2 class="section-title reveal-item hidden-initial">Pengantar Penggunaan Alat Ukur</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4 reveal-item hidden-initial">
                            <div class="card-header">
                                <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-info-circle me-2"></i>Pentingnya Praktikum Alat Ukur</h2>
                            </div>
                            <div class="card-body">
                                <p class="reveal-item-child hidden-initial">Setelah kalian mempelajari fungsi dan menu/tombol pada alat ukur, sekarang saatnya kalian mencoba untuk melakukan praktik menggunakan alat-alat ukur yang sudah dipelajari sebelumnya. Praktikum dapat dilakukan dengan menggunakan peralatan riil atau simulator, bergantung pada kondisi sekolah masing-masing.</p>
                                <p class="reveal-item-child hidden-initial">Sebelum melaksanakan praktikum yang akan dikemas dalam aktivitas pembelajaran, pastikan kalian sudah memahami keselamatan kerja penggunaan alat di lingkungan tempat praktik kalian. Hal tersebut sudah dibahas pada bab sebelumnya.</p>
                                <p class="reveal-item-child hidden-initial">Berikut penjelasan singkat tentang hal-hal yang perlu diperhatikan pada saat melakukan pengukuran menggunakan alat ukur jaringan komputer dan telekomunikasi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Detail Alat Ukur & Penggunaan Section -->
            <section id="detail-alat-ukur" class="py-5 bg-dark position-relative">
                <div class="binary-animation-bg" id="binary-bg-firewall"></div>
                <div class="container">
                    <h2 class="section-title reveal-item hidden-initial">Detail Penggunaan Alat Ukur</h2>
                    
                    <!-- 1. LAN Tester -->
                    <div class="card mb-4 reveal-item hidden-initial" id="lan-tester-card">
                        <div class="card-header">
                            <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-ethernet me-2"></i>1. LAN Tester</h2>
                            <span class="badge bg-primary reveal-item-child hidden-initial">Uji Kabel Fisik</span>
                        </div>
                        <div class="card-body">
                            <p class="reveal-item-child hidden-initial">LAN tester digunakan untuk memeriksa kontinuitas kabel UTP/STP, mendeteksi sirkuit pendek, sirkuit terbuka, kabel terbalik, dan split pair. Alat ini terdiri dari dua bagian yang dapat dipisahkan.</p>
                            <h6 class="reveal-item-child hidden-initial mt-3">Indikator Lampu LAN Tester:</h6>
                            <ul class="reveal-item-child hidden-initial">
                                <li><strong>Kabel Cross:</strong> Lampu indikator akan menyala dengan urutan: nomor 1 dengan nomor 3, nomor 2 dengan nomor 6, nomor 4 dengan nomor 4, nomor 5 dengan nomor 5, nomor 7 dengan nomor 7, dan nomor 8 dengan nomor 8.</li>
                                <li><strong>Kabel Straight:</strong> Lampu akan menyala secara berurutan mulai dari nomor 1 sampai dengan 8, baik sisi kanan maupun sisi kiri.</li>
                                <li>Dapat juga digunakan untuk mengukur kabel RJ11 (telepon): 2 pin (LED 3 dan 5 menyala bersamaan), 4 pin (LED 3 dan 4, lalu 2 dan 5 menyala bersamaan).</li>
                            </ul>
                            <h6 class="reveal-item-child hidden-initial mt-3">Cara Menggunakan Satu Sisi LAN Tester:</h6>
                            <ol class="reveal-item-child hidden-initial">
                                <li>Pasang satu ujung kabel ke dalam port eternet yang aktif (misal hub/switch) dan ujung lain dimasukkan ke port LAN tester.</li>
                                <li>Nyalakan sakelar on/off pada alat ukur.</li>
                                <li>Apabila kondisi kabel normal, lampu indikator pada LAN tester akan menyala secara bergantian.</li>
                            </ol>
                            <div class="text-center diagram-container mt-3 reveal-item-child hidden-initial">
                                <img src="{{asset('homepage/img/lan 1.jpg')}}" alt="Penggunaan LAN Tester dengan Hub/Switch" class="img-fluid mt-3" onerror="this.onerror=null;this.src='https://placehold.co/600x350/00e676/ffffff?text=LAN+Tester+Satu+Sisi'">
                                <p class="text-center text-muted reveal-item-child hidden-initial"><small>Gambar: Pengetesan Kabel LAN dengan Bantuan Hub/Switch</small></p>
                            </div>
                            <h6 class="reveal-item-child hidden-initial mt-3">Cara Menggunakan Dua Sisi LAN Tester:</h6>
                            <ol class="reveal-item-child hidden-initial">
                                <li>Pasang ujung kabel LAN ke dalam port RJ45 yang sudah ada di kedua sisi alat (Master dan Remote).</li>
                                <li>Nyalakan sakelar on/off pada alat ukur.</li>
                                <li>Apabila kondisi kabel normal, lampu indikator pada alat ukur akan menyala secara bergantian sesuai dengan ketentuan yang sudah dijelaskan sebelumnya.</li>
                            </ol>
                            <div class="text-center diagram-container mt-3 reveal-item-child hidden-initial">
                                <img src="{{asset('homepage/img/sc1.jpg')}}" alt="Penggunaan LAN Tester Straight dan Cross" class="img-fluid mt-3" onerror="this.onerror=null;this.src='https://placehold.co/600x350/00e676/ffffff?text=LAN+Tester+Dua+Sisi'">
                                <p class="text-center text-muted reveal-item-child hidden-initial"><small>Gambar: Kabel LAN Straight dan Cross</small></p>
                            </div>
                             {{-- <div class="text-center diagram-container mt-3 reveal-item-child hidden-initial">
                                <img src="https://i.ibb.co/y1111B0/lan-tester-rj11.png" alt="Pengukuran Kabel RJ11" class="img-fluid mt-3" onerror="this.onerror=null;this.src='https://placehold.co/600x350/00e676/ffffff?text=Pengukuran+Kabel+RJ11'">
                                <p class="text-center text-muted reveal-item-child hidden-initial"><small>Gambar: Pengukuran Kabel RJ11</small></p>
                            </div> --}}
                            <!-- Video LAN Tester -->
                            <div class="row">
                                <div class="col-12 reveal-item-child hidden-initial">
                                    <h6 class="mt-3">Video Tutorial LAN Tester:</h6>
                                    <div class="video-wrapper">
                                        <iframe src="https://www.youtube.com/embed/UcL5iUEfwmU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            <h6 class="reveal-item-child hidden-initial mt-3">Prosedur Keselamatan Kerja:</h6>
                            <ul class="reveal-item-child hidden-initial">
                                <li>Jangan meletakkan alat pada lokasi basah atau rawan terkena air.</li>
                                <li>Berikan catuan yang sesuai dengan spesifikasi peralatan.</li>
                                <li>Perhatikan bahaya terhadap sengatan listrik meskipun arus dan tegangan yang digunakan berjenis searah (DC).</li>
                                <li>Hindari lingkungan kerja yang dapat menyebabkan peralatan mudah panas karena berpotensi meledak.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- 2. Multimeter -->
                    <div class="card mb-4 reveal-item hidden-initial">
                        <div class="card-header">
                            <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-lightbulb me-2"></i>2. Multimeter</h2>
                            <span class="badge bg-primary reveal-item-child hidden-initial">Ukur Listrik</span>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-start"> <!-- align-items-start to keep content at top -->
                                <div class="col-md-6 reveal-item-child hidden-initial">
                                    <div class="diagram-container">
                                        <img src="{{asset('homepage/img/AD.png')}}" alt="Penggunaan Multimeter" class="img-fluid mt-3" onerror="this.onerror=null;this.src='https://placehold.co/600x350/00e676/ffffff?text=Penggunaan+Multimeter'">
                                        <p class="text-center text-muted"><small>Gambar: Contoh Multimeter Analog dan Digital</small></p>
                                    </div>
                                </div>
                                <div class="col-md-6 reveal-item-child hidden-initial">
                                    <p>Multimeter atau multitester memiliki fungsi yang cukup beragam untuk mengukur properti listrik seperti tegangan (volt), arus (ampere), dan resistansi (ohm). Pemahaman cara pemakaian sangat dibutuhkan agar tidak terjadi kesalahan pembacaan dan kerusakan.</p>
                                    <h6 class="mt-3">Jenis-jenis Multimeter:</h6>
                                    <ul>
                                        <li><strong>Multimeter Analog:</strong> Menggunakan jarum penunjuk untuk menampilkan hasil pengukuran. Cocok untuk mengukur perubahan nilai yang cepat.</li>
                                        <li><strong>Multimeter Digital:</strong> Menampilkan hasil pengukuran dalam bentuk angka pada layar LCD. Lebih akurat dan mudah dibaca.</li>
                                    </ul>
                                    <h6 class="mt-3">Cara Menggunakan Multimeter (Umum):</h6>
                                    <ol>
                                        <li>Pilih jenis pengukuran (tegangan AC/DC, arus, resistansi) pada sakelar putar.</li>
                                        <li>Pilih rentang pengukuran yang sesuai (misal: 20V untuk tegangan DC). Jika tidak yakin, mulai dari rentang tertinggi.</li>
                                        <li>Hubungkan probe merah ke terminal positif (+) dan probe hitam ke terminal negatif (-) atau COM.</li>
                                        <li>Sentuhkan probe ke komponen yang akan diukur.</li>
                                        <li>Baca hasil pengukuran pada layar atau skala.</li>
                                    </ol>
                                </div>
                            </div>
                            <!-- Video Multimeter -->
                            <div class="row">
                                <div class="col-12 reveal-item-child hidden-initial">
                                    <h6 class="mt-3">Video Tutorial Multimeter:</h6>
                                    <div class="video-wrapper">
                                        <iframe src="https://youtube.com/embed/3x-ZGF6JcFc?si=TU8Cl-yUvfD7tGlR" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            <h6 class="reveal-item-child hidden-initial mt-3">Prosedur Keselamatan Kerja:</h6>
                            <ul class="reveal-item-child hidden-initial">
                                <li>Selalu pastikan multimeter dalam mode yang benar sebelum mengukur.</li>
                                <li>Jangan mengukur tegangan atau arus melebihi batas maksimal alat.</li>
                                <li>Gunakan sarung tangan isolasi saat bekerja dengan tegangan tinggi.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- NEW: 3. Earth Tester -->
                    <div class="card mb-4 reveal-item hidden-initial">
                        <div class="card-header">
                            <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-earth-americas me-2"></i>3. Earth Tester</h2>
                            <span class="badge bg-primary reveal-item-child hidden-initial">Ukur Tahanan Tanah</span>
                        </div>
                        <div class="card-body">
                            {{-- <div class="text-center diagram-container mt-3 reveal-item-child hidden-initial">
                                <img src="https://i.ibb.co/Wc131B0/earth-tester-diagram.png" alt="Gambar Instalasi Pengukuran Grounding" class="img-fluid mt-3" onerror="this.onerror=null;this.src='https://placehold.co/600x350/00e676/ffffff?text=Instalasi+Earth+Tester'">
                                <p class="text-center text-muted reveal-item-child hidden-initial"><small>Gambar: Instalasi Pengukuran Grounding</small></p>
                            </div> --}}
                             <div class="text-center diagram-container mt-3 reveal-item-child hidden-initial">
                                <img src="{{asset('homepage/img/Earth2.jpg')}}" alt="Hasil Pengukuran Earth Tester Digital" class="img-fluid mt-3" onerror="this.onerror=null;this.src='https://placehold.co/600x350/00e676/ffffff?text=Hasil+Earth+Tester+Digital'">
                                <p class="text-center text-muted reveal-item-child hidden-initial"><small>Gambar: Contoh Pengukuran Earth Tester </small></p>
                            </div>
                            <p class="reveal-item-child hidden-initial">Earth tester memiliki fungsi memastikan nilai tahanan pentanahan (grounding) pada sebuah rangkaian sistem grounding bernilai kecil atau mendekati nol. Nilai tahanan (resistansi) yang kecil akan mempermudah tegangan atau arus berlebih—yang disebabkan oleh sambaran petir dan kebocoran kelistrikan—mengalir dengan cepat ke tanah. Dengan demikian, peralatan elektronik yang kita miliki akan lebih terjaga.</p>
                            <p class="reveal-item-child hidden-initial">Pengukuran tahanan grounding perlu dilakukan secara berkala minimal 1 tahun sekali. Jika nilai grounding sudah tidak standar, kita harus segera melakukan perbaikan pada instalasinya. Nilai tahanan grounding yang dipersyaratkan berdasarkan National Fire Protection Association (NFPA) dan Institute of Electrical and Electronics Engineers (IEEE), maksimal adalah 5 ohm. Adapun Persyaratan Umum Instalasi Listrik (PUIL) menyatakan bahwa standar untuk nilai tahanan grounding adalah 5,0 ohm atau kurang.</p>
                            <h6 class="reveal-item-child hidden-initial mt-3">Langkah-langkah Pengukuran Grounding:</h6>
                            <ol class="reveal-item-child hidden-initial">
                                <li>Tentukan lokasi pengukuran.</li>
                                <li>Siapkan earth tester, palu, dan ampelas/sikat baja.</li>
                                <li>Ampelas terlebih dahulu bagian grounding (batang atau plat) agar terbebas dari tanah. Hal ini bertujuan agar konektivitas antara probe dan instalasi grounding dapat lebih maksimal.</li>
                                <li>Masukkan probe hijau, kuning, dan merah ke lubang yang terdapat pada earth tester.</li>
                                <li>Hubungkan kabel warna hijau ke kabel atau batang grounding yang akan diukur.</li>
                                <li>Sambungkan probe kuning ke besi/spike berbentuk T yang sudah ditancapkan ke tanah dengan jarak 5–10 meter dari pusat grounding.</li>
                                <li>Sambungkan probe merah ke besi/spike berbentuk T yang sudah ditancapkan ke tanah dengan jarak 5–10 meter dari besi/spike pertama.</li>
                                <li>Apabila menggunakan earth tester jenis analog, arahkan sakelar pemilih (knob) pada angka x1 atau x10 ohm. Jika menggunakan earth tester jenis digital, arahkan pada batas ukur 20 ohm.</li>
                                <li>Baca hasil pengukuran. Pada earth tester analog, hasil pengukuran dapat dilihat dari penunjukan jarum. Jika menggunakan x1, angka yang ditunjuk jarum dikalikan 1 Ω. Jika menggunakan x10, angka yang ditunjuk jarum dikalikan 10 Ω. Adapun pada jenis earth tester digital, kalian cukup melihat angka yang muncul pada layar.</li>
                            </ol>
                            <!-- Video Earth Tester -->
                            <div class="row">
                                <div class="col-12 reveal-item-child hidden-initial">
                                    <h6 class="mt-3">Video Tutorial Earth Tester:</h6>
                                    <div class="video-wrapper">
                                        <iframe src="https://youtube.com/embed/HbIeksuENK0?si=suhVRBbpmaGf4c8O" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- NEW: 4. Optical Power Meter (OPM) -->
                    <div class="card mb-4 reveal-item hidden-initial">
                        <div class="card-header">
                            <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-light-line me-2"></i>4. Optical Power Meter (OPM)</h2>
                            <span class="badge bg-primary reveal-item-child hidden-initial">Ukur Daya Optik</span>
                        </div>
                        <div class="card-body">
                            <h6 class="reveal-item-child hidden-initial mt-3">a. Pengukuran OPM pada Jaringan Offline:</h6>
                            <div class="text-center diagram-container mt-3 reveal-item-child hidden-initial">
                                <img src="{{asset('homepage/img/Opm11.jpg')}}" alt="Hasil Pengukuran OPM pada Saluran Offline (Patch Cord)" class="img-fluid mt-3" onerror="this.onerror=null;this.src='https://placehold.co/600x350/00e676/ffffff?text=OPM+Offline'">
                                <p class="text-center text-muted reveal-item-child hidden-initial"><small>Gambar: Hasil Pengukuran OPM pada Saluran Offline (Patch Cord)</small></p>
                            </div>
                            <p class="reveal-item-child hidden-initial">Power meter adalah alat yang wajib dimiliki dan dikuasai penggunaannya oleh teknisi yang bekerja di bidang Fiber Optik. Alat ini umumnya digunakan untuk uji terima pada akhir instalasi sebuah jaringan optik. Selain itu, alat ini juga digunakan untuk membantu mendeteksi gangguan yang terjadi pada saluran optik kabel optik dengan cara mengukur nilai level daya yang terletak pada titik terminasi tertentu.</p>
                            <p class="reveal-item-child hidden-initial">Pengukuran menggunakan power meter memiliki dua metode. Metode pertama adalah pengukuran pada jaringan offline atau belum mendapatkan catu daya dari Optical Line Terminal (sumber cahaya dari penyelenggara telekomunikasi). Metode kedua adalah pengukuran pada saluran optik yang sudah online (mendapatkan catu daya dari Optical Line Terminal).</p>
                            <ol class="reveal-item-child hidden-initial">
                                <li>Siapkan Optical Light Source (OLS), Optical Power Meter (OPM), kacamata safety, one click cleaner, dan kabel yang akan diukur (misal patch cord, dummy cable, atau drop core).</li>
                                <li>Gunakan kacamata safety sebelum melakukan pengukuran.</li>
                                <li>Bersihkan ujung konektor dan lubang adaptor menggunakan one click cleaner.</li>
                                <li>Pasang kabel yang akan diukur pada OLS dan OPM.</li>
                                <li>Nyalakan OLS dan atur panjang gelombangnya, misalkan 1.310 nm.</li>
                                <li>Nyalakan OPM dan samakan panjang gelombang dengan yang diatur pada OLS.</li>
                                <li>Baca hasil pengukuran pada angka yang memiliki satuan dBm.</li>
                                <li>Catat hasil pengukuran.</li>
                            </ol>
                            <h6 class="reveal-item-child hidden-initial mt-3">b. Pengukuran OPM pada Jaringan Online:</h6>
                            <div class="text-center diagram-container mt-3 reveal-item-child hidden-initial">
                                <img src="{{asset('homepage/img/opm15.jpg')}}" alt="Hasil Pengukuran OPM pada Saluran Online" class="img-fluid mt-3" onerror="this.onerror=null;this.src='https://placehold.co/600x350/00e676/ffffff?text=OPM+Online'">
                                <p class="text-center text-muted reveal-item-child hidden-initial"><small>Gambar: Hasil Pengukuran OPM pada Saluran Online</small></p>
                            </div>
                            <ol class="reveal-item-child hidden-initial">
                                <li>Siapkan Optical Power Meter (OPM), safety glasses, one click cleaner, dan titik terminasi yang akan diukur (misal roset optik).</li>
                                <li>Gunakan kacamata safety sebelum melakukan pengukuran.</li>
                                <li>Bersihkan ujung konektor dan lubang adaptor menggunakan one click cleaner.</li>
                                <li>Nyalakan OPM dan atur lamda sesuai dengan lamda downlink yang digunakan oleh operator telekomunikasinya, misalkan 1.490 nm.</li>
                                <li>Baca hasil pengukuran yang memiliki satuan dBm.</li>
                                <li>Catat hasil pengukuran.</li>
                            </ol>
                            <!-- Video OPM -->
                            <div class="row">
                                <div class="col-12 reveal-item-child hidden-initial">
                                    <h6 class="mt-3">Video Tutorial Optical Power Meter (OPM):</h6>
                                    <div class="video-wrapper">
                                        <iframe src="https://youtube.com/embed/gg_npWoy3B4?si=nlmLQ0POhhPsNXY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            <h6 class="reveal-item-child hidden-initial mt-3">Prosedur Keselamatan Kerja:</h6>
                            <ul class="reveal-item-child hidden-initial">
                                <li>Selalu gunakan kacamata safety saat bekerja dengan perangkat optik, karena cahaya laser dapat merusak mata.</li>
                                <li>Pastikan konektor optik bersih sebelum pengukuran untuk hasil yang akurat.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Existing: 5. OTDR (Optical Time Domain Reflectometer) -->
                    <div class="card mb-4 reveal-item hidden-initial">
                        <div class="card-header">
                            <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-wave-square me-2"></i>5. OTDR (Optical Time Domain Reflectometer)</h2>
                            <span class="badge bg-primary reveal-item-child hidden-initial">Uji Serat Optik</span>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-start"> <!-- align-items-start to keep content at top -->
                                <div class="col-md-6 reveal-item-child hidden-initial">
                                    <div class="diagram-container">
                                        <img src="{{asset('homepage/img/otdr1.jpg')}}" alt="Penggunaan OTDR" class="img-fluid mt-3" onerror="this.onerror=null;this.src='https://placehold.co/600x350/00e676/ffffff?text=Penggunaan+OTDR'">
                                        <p class="text-center text-muted"><small>Gambar: Contoh OTDR dan Tampilan Awal</small></p>
                                    </div>
                                </div>
                                <div class="col-md-6 reveal-item-child hidden-initial">
                                    <p>OTDR adalah alat ukur yang digunakan untuk menguji integritas kabel serat optik. Alat ini bekerja dengan menyuntikkan pulsa cahaya ke dalam serat dan mengukur pantulan cahaya yang kembali untuk mendeteksi kerusakan, sambungan, atau ujung serat.</p>
                                    <h6 class="mt-3">Cara Menggunakan OTDR:</h6>
                                    <ol>
                                        <li>Pastikan serat optik yang akan diuji bersih dan tidak ada kotoran pada konektor.</li>
                                        <li>Hubungkan ujung serat ke port OTDR.</li>
                                        <li>Atur parameter pengukuran (panjang gelombang, durasi pulsa, rentang) sesuai dengan jenis serat dan panjang kabel.</li>
                                        <li>Mulai pengukuran dan analisis grafik yang ditampilkan pada layar OTDR untuk mengidentifikasi event (sambungan, patahan, dll.).</li>
                                    </ol>
                                </div>
                            </div>
                            <!-- Video OTDR -->
                            <div class="row">
                                <div class="col-12 reveal-item-child hidden-initial">
                                    <h6 class="mt-3">Video Tutorial OTDR:</h6>
                                    <div class="video-wrapper">
                                        <iframe src="https://www.youtube.com/embed/MTWaEMehK2M" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            <h6 class="reveal-item-child hidden-initial mt-3">Prosedur Keselamatan Kerja:</h6>
                            <ul class="reveal-item-child hidden-initial">
                                <li>Jangan pernah melihat langsung ke port optik OTDR saat alat menyala, karena cahaya laser dapat merusak mata.</li>
                                <li>Pastikan serat optik tidak tertekuk tajam saat dihubungkan ke OTDR.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- NEW: 6. Fusion Splicer -->
                    <div class="card mb-4 reveal-item hidden-initial">
                        <div class="card-header">
                            <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-fire me-2"></i>6. Fusion Splicer</h2>
                            <span class="badge bg-primary reveal-item-child hidden-initial">Penyambungan Serat Optik</span>
                        </div>
                        <div class="card-body">
                            <div class="text-center diagram-container mt-3 reveal-item-child hidden-initial">
                                <img src="{{asset('homepage/img/splicer1.jpg')}}" alt="Gambar Fusion Splicer" class="img-fluid mt-3" onerror="this.onerror=null;this.src='https://placehold.co/600x350/00e676/ffffff?text=Fusion+Splicer'">
                                <p class="text-center text-muted reveal-item-child hidden-initial"><small>Gambar: Contoh Fusion Splicer</small></p>
                            </div>
                            <p class="reveal-item-child hidden-initial">Fusion Splicer adalah alat yang digunakan untuk menyambungkan dua ujung serat optik dengan cara meleburkannya menggunakan busur listrik. Proses ini menghasilkan sambungan yang sangat kuat dan memiliki redaman (loss) yang minimal, sehingga penting untuk menjaga kualitas transmisi data pada jaringan fiber optik.</p>
                            <h6 class="reveal-item-child hidden-initial mt-3">Langkah-langkah Penggunaan Fusion Splicer:</h6>
                            <ol class="reveal-item-child hidden-initial">
                                <li><strong>Persiapan Serat:</strong> Kupas lapisan pelindung serat optik menggunakan stripper khusus, lalu bersihkan serat telanjang dengan alkohol isopropil dan tisu bebas serat.</li>
                                <li><strong>Pemotongan Serat (Cleaving):</strong> Gunakan cleaver serat optik untuk memotong ujung serat dengan presisi tinggi pada sudut 90 derajat. Kualitas potongan sangat penting untuk hasil penyambungan yang baik.</li>
                                <li><strong>Penempatan Serat:</strong> Letakkan kedua ujung serat yang sudah dipotong pada V-groove di Fusion Splicer. Pastikan serat berada pada posisi yang benar dan klem serat mengunci dengan aman.</li>
                                <li><strong>Penyelarasan Otomatis:</strong> Fusion Splicer akan secara otomatis menyelaraskan kedua ujung serat menggunakan sistem kamera dan motor presisi.</li>
                                <li><strong>Penyambungan (Splicing):</strong> Setelah penyelarasan, alat akan mengeluarkan busur listrik yang meleburkan kedua ujung serat, menyatukannya menjadi satu. Alat akan menampilkan nilai redaman sambungan (splice loss).</li>
                                <li><strong>Pemanasan Heat Shrink Sleeve:</strong> Geser pelindung sambungan (heat shrink sleeve) ke atas area sambungan, lalu tempatkan di oven pemanas Fusion Splicer untuk mengerutkannya dan melindungi sambungan.</li>
                                <li><strong>Penyimpanan:</strong> Setelah sleeve mendingin, tempatkan sambungan di tray splice untuk penyimpanan yang aman.</li>
                            </ol>
                            <!-- Video Fusion Splicer -->
                            <div class="row">
                                <div class="col-12 reveal-item-child hidden-initial">
                                    <h6 class="mt-3">Video Tutorial Fusion Splicer:</h6>
                                    <div class="video-wrapper">
                                        <iframe src="https://www.youtube.com/embed/oBGCq3yqiuQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            <h6 class="reveal-item-child hidden-initial mt-3">Prosedur Keselamatan Kerja:</h6>
                            <ul class="reveal-item-child hidden-initial">
                                <li>Selalu gunakan kacamata pelindung saat mengoperasikan Fusion Splicer untuk melindungi mata dari busur listrik dan serpihan serat.</li>
                                <li>Pastikan area kerja bersih dan bebas dari debu atau kotoran yang dapat mengganggu kualitas sambungan.</li>
                                <li>Buang serpihan serat dengan hati-hati ke dalam wadah khusus, karena serpihan serat sangat tajam dan dapat melukai kulit atau mata.</li>
                                <li>Jangan menyentuh elektroda Fusion Splicer saat alat beroperasi.</li>
                            </ul>
                        </div>
                    </div>


                    <!-- Existing: 6. Wi-Fi Analyzer (now 7) -->
                    <div class="card mb-4 reveal-item hidden-initial">
                        <div class="card-header">
                            <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-wifi me-2"></i>7. Wi-Fi Analyzer</h2>
                            <span class="badge bg-primary reveal-item-child hidden-initial">Analisis Nirkabel</span>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-start"> <!-- align-items-start to keep content at top -->
                                <div class="col-md-6 reveal-item-child hidden-initial">
                                    <div class="diagram-container">
                                        <img src="{{asset('homepage/img/wifi.png')}}" alt="Tampilan Wi-Fi Analyzer" class="img-fluid mt-3" onerror="this.onerror=null;this.src='https://placehold.co/600x350/00e676/ffffff?text=Wi-Fi+Analyzer'">
                                        <p class="text-center text-muted reveal-item-child hidden-initial"><small>Gambar: Contoh Tampilan Aplikasi Wi-Fi Analyzer</small></p>
                                    </div>
                                </div>
                                <div class="col-md-6 reveal-item-child hidden-initial">
                                    <p>Wi-Fi Analyzer adalah perangkat lunak atau perangkat keras yang digunakan untuk menganalisis dan memecahkan masalah jaringan nirkabel. Alat ini menampilkan informasi tentang jaringan Wi-Fi di sekitar, seperti kekuatan sinyal, saluran yang digunakan, dan interferensi.</p>
                                    <h6 class="mt-3">Fungsi Utama Wi-Fi Analyzer:</h6>
                                    <ul>
                                        <li>Mendeteksi kekuatan sinyal (RSSI) dari berbagai AP.</li>
                                        <li>Mengidentifikasi saluran Wi-Fi yang paling sedikit terinterferensi.</li>
                                        <li>Menampilkan daftar jaringan Wi-Fi yang tersedia, termasuk SSID, keamanan, dan vendor.</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Video Wi-Fi Analyzer -->
                            <div class="row">
                                <div class="col-12 reveal-item-child hidden-initial">
                                    <h6 class="mt-3">Video Tutorial Wi-Fi Analyzer:</h6>
                                    <div class="video-wrapper">
                                        <iframe src="https://youtube.com/embed/UyadTn6DeBo?si=HaDWxe_oReetLcr8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            <h6 class="reveal-item-child hidden-initial mt-3">Tips Penggunaan:</h6>
                            <ul class="reveal-item-child hidden-initial">
                                <li>Gunakan di berbagai lokasi untuk mendapatkan gambaran kekuatan sinyal yang komprehensif.</li>
                                <li>Pilih saluran Wi-Fi yang paling kosong untuk performa terbaik.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Existing: 7. Ping Test (now 8) -->
                    <div class="card mb-4 reveal-item hidden-initial">
                        <div class="card-header">
                            <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-network-wired me-2"></i>8. Ping Test</h2>
                            <span class="badge bg-primary reveal-item-child hidden-initial">Uji Konektivitas</span>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-start"> <!-- align-items-start to keep content at top -->
                                <div class="col-md-6 reveal-item-child hidden-initial">
                                    <div class="diagram-container">
                                        <img src="{{asset('homepage/img/ping.png')}}" alt="Contoh Ping Test" class="img-fluid mt-3" onerror="this.onerror=null;this.src='https://placehold.co/600x350/00e676/ffffff?text=Ping+Test+Example'">
                                        <p class="text-center text-muted reveal-item-child hidden-initial"><small>Gambar: Contoh Hasil Ping Test di Command Prompt</small></p>
                                    </div>
                                </div>
                                <div class="col-md-6 reveal-item-child hidden-initial">
                                    <p>Ping adalah utilitas diagnostik jaringan yang digunakan untuk menguji jangkauan host pada jaringan IP. Ini mengukur waktu yang dibutuhkan paket untuk pergi dari satu host ke host lain dan kembali (RTT - Round Trip Time).</p>
                                    <h6 class="mt-3">Cara Melakukan Ping Test (Command Prompt/Terminal):</h6>
                                    <ol>
                                        <li>Buka Command Prompt (Windows) atau Terminal (Linux/macOS).</li>
                                        <li>Ketik <code>ping [alamat IP atau nama domain]</code>. Contoh: <code>ping 192.168.1.1</code> atau <code>ping google.com</code>.</li>
                                        <li>Tekan Enter. Hasil akan menampilkan waktu respons (ms) dan status paket (terkirim/hilang).</li>
                                    </ol>
                                </div>
                            </div>
                            <!-- Video Ping Test -->
                            <div class="row">
                                <div class="col-12 reveal-item-child hidden-initial">
                                    <h6 class="mt-3">Video Tutorial Ping Test:</h6>
                                    <div class="video-wrapper">
                                        <iframe src="https://youtube.com/embed/X4hBP51sMRc?si=-7oFLhuvppMXld_2" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            <h6 class="reveal-item-child hidden-initial mt-3">Interpretasi Hasil:</h6>
                            <ul class="reveal-item-child hidden-initial">
                                <li><strong>Reply from [IP Address]:</strong> Koneksi berhasil.</li>
                                <li><strong>Request timed out:</strong> Koneksi gagal atau ada masalah di jalur jaringan.</li>
                                <li><strong>Time (ms):</strong> Waktu respons, semakin kecil semakin baik.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Existing: 8. Speed Test (now 9) -->
                    <div class="card mb-4 reveal-item hidden-initial">
                        <div class="card-header">
                            <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-tachometer-alt me-2"></i>9. Speed Test</h2>
                            <span class="badge bg-primary reveal-item-child hidden-initial">Uji Kecepatan Internet</span>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-start"> <!-- align-items-start to keep content at top -->
                                <div class="col-md-6 reveal-item-child hidden-initial">
                                    <div class="diagram-container">
                                        <img src="{{asset('homepage/img/speed.jpeg')}}" alt="Contoh Speed Test" class="img-fluid mt-3" onerror="this.onerror=null;this.src='https://placehold.co/600x350/00e676/ffffff?text=Speed+Test+Example'">
                                        <p class="text-center text-muted reveal-item-child hidden-initial"><small>Gambar: Contoh Tampilan Hasil Speed Test</small></p>
                                    </div>
                                </div>
                                <div class="col-md-6 reveal-item-child hidden-initial">
                                    <p>Speed test adalah alat yang digunakan untuk mengukur kecepatan unduh (download), kecepatan unggah (upload), dan latensi (ping) koneksi internet Anda. Ini membantu memverifikasi apakah Anda mendapatkan kecepatan yang dijanjikan oleh penyedia layanan internet (ISP).</p>
                                    <h6 class="mt-3">Cara Melakukan Speed Test (Online):</h6>
                                    <ol>
                                        <li>Buka browser web dan kunjungi situs speed test populer (misal: Speedtest by Ookla, Fast.com).</li>
                                        <li>Klik tombol "Go" atau "Start" untuk memulai pengujian.</li>
                                        <li>Tunggu hingga pengujian selesai dan lihat hasilnya.</li>
                                    </ol>
                                </div>
                            </div>
                            <!-- Video Speed Test -->
                            <div class="row">
                                <div class="col-12 reveal-item-child hidden-initial">
                                    <h6 class="mt-3">Video Tutorial Speed Test:</h6>
                                    <div class="video-wrapper">
                                        <iframe src="https://youtube.com/embed/ixh0aQu0NA4?si=_nZC0O6aJmi39NNv" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                
                                </div>
                            </div>
                            <h6 class="reveal-item-child hidden-initial mt-3">Faktor yang Mempengaruhi Kecepatan:</h6>
                            <ul class="reveal-item-child hidden-initial">
                                <li>Kualitas koneksi internet (kabel, serat optik, nirkabel).</li>
                                <li>Beban jaringan pada saat pengujian.</li>
                                <li>Kinerja perangkat keras (router, kartu jaringan).</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Kesimpulan Section -->
            <section id="kesimpulan" class="py-5 position-relative">
                <div class="binary-animation-bg" id="binary-bg-2"></div>
                <h2 class="section-title reveal-item hidden-initial">Kesimpulan</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4 reveal-item hidden-initial">
                            <div class="card-body">
                                <p class="reveal-item-child hidden-initial">Memahami dan menguasai penggunaan alat ukur jaringan komputer dan telekomunikasi adalah keterampilan krusial bagi setiap teknisi jaringan. Dengan alat yang tepat dan pemahaman yang mendalam tentang cara kerjanya, Anda dapat melakukan instalasi yang akurat, mendiagnosis masalah dengan cepat, dan menjaga kinerja jaringan tetap optimal.</p>
                                <p class="reveal-item-child hidden-initial">Selalu prioritaskan keselamatan kerja dan pastikan Anda menggunakan alat sesuai dengan prosedur yang benar untuk menghindari kerusakan pada alat maupun cedera pada diri sendiri.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Quiz Sederhana Section -->
            <section id="quiz-section" class="mb-5">
                <div class="quiz-card reveal-item hidden-initial">
                    <h2 class="h3 mb-4 text-primary text-center reveal-item-child hidden-initial">
                        <i class="fas fa-question-circle me-3"></i>Uji Pemahaman: Kuis Penggunaan Alat Ukur Jaringan
                    </h2>
                    <div id="quiz-container">
                        <!-- Question 1 -->
                        <div class="question-block mb-4">
                            <p class="mb-3 reveal-item-child hidden-initial"><strong>1. Jika Anda mengukur kabel LAN cross dengan LAN tester, bagaimana urutan lampu indikator yang benar?</strong></p>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q1" data-choice="a">
                                <label class="w-100 cursor-pointer">a. Menyala berurutan dari 1 sampai 8</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q1" data-choice="b">
                                <label class="w-100 cursor-pointer">b. Nomor 1 dengan 3, 2 dengan 6, 4 dengan 4, 5 dengan 5, 7 dengan 7, 8 dengan 8</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q1" data-choice="c">
                                <label class="w-100 cursor-pointer">c. Semua lampu menyala bersamaan</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q1" data-choice="d">
                                <label class="w-100 cursor-pointer">d. Hanya lampu G yang menyala</label>
                            </div>
                        </div>

                        <!-- Question 2 -->
                        <div class="question-block mb-4">
                            <p class="mb-3 reveal-item-child hidden-initial"><strong>2. Saat menggunakan multimeter analog untuk mengukur tegangan DC, jika jarum bergerak ke arah kiri, apa artinya?</strong></p>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q2" data-choice="a">
                                <label class="w-100 cursor-pointer">a. Tegangan terlalu tinggi</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q2" data-choice="b">
                                <label class="w-100 cursor-pointer">b. Polaritas probe yang dihubungkan ke rangkaian terbalik</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q2" data-choice="c">
                                <label class="w-100 cursor-pointer">c. Multimeter rusak</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q2" data-choice="d">
                                <label class="w-100 cursor-pointer">d. Batas ukur terlalu besar</label>
                            </div>
                        </div>

                        <!-- Question 3 -->
                        <div class="question-block mb-4">
                            <p class="mb-3 reveal-item-child hidden-initial"><strong>3. Untuk pengukuran tahanan menggunakan multimeter analog, bagaimana arah pembacaan skala hasil pengukuran?</strong></p>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q3" data-choice="a">
                                <label class="w-100 cursor-pointer">a. Dari kiri ke kanan</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q3" data-choice="b">
                                <label class="w-100 cursor-pointer">b. Dari kanan ke kiri</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q3" data-choice="c">
                                <label class="w-100 cursor-pointer">c. Dari tengah ke samping</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q3" data-choice="d">
                                <label class="w-100 cursor-pointer">d. Tidak ada arah spesifik</label>
                            </div>
                        </div>

                        <!-- Question 4 -->
                        <div class="question-block mb-4">
                            <p class="mb-3 reveal-item-child hidden-initial"><strong>4. Apa fungsi utama Optical Power Meter (OPM) dalam lingkup pekerjaan Fiber Optik?</strong></p>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q4" data-choice="a">
                                <label class="w-100 cursor-pointer">a. Menyambung serat optik</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q4" data-choice="b">
                                <label class="w-100 cursor-pointer">b. Mengukur daya optik yang ditransmisikan</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q4" data-choice="c">
                                <label class="w-100 cursor-pointer">c. Mendeteksi lokasi putusnya kabel</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q4" data-choice="d">
                                <label class="w-100 cursor-pointer">d. Menganalisis spektrum sinyal Wi-Fi</label>
                            </div>
                        </div>

                        <!-- Question 5 -->
                        <div class="question-block mb-4">
                            <p class="mb-3 reveal-item-child hidden-initial"><strong>5. Apa yang harus Anda lakukan jika hasil ping test menunjukkan "General Failure"?</strong></p>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q5" data-choice="a">
                                <label class="w-100 cursor-pointer">a. Mengganti router Wi-Fi</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q5" data-choice="b">
                                <label class="w-100 cursor-pointer">b. Memeriksa kembali IP tujuan pada syntax ping</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q5" data-choice="c">
                                <label class="w-100 cursor-pointer">c. Mematikan firewall/antivirus atau memeriksa kabel jaringan</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q5" data-choice="d">
                                <label class="w-100 cursor-pointer">d. Melakukan kalibrasi ulang alat ukur</label>
                            </div>
                        </div>
                        
                        <button onclick="checkQuiz()" class="btn btn-neon w-100 mt-3 fw-bold reveal-item-child hidden-initial">Periksa Jawaban</button>
                        <p id="quiz-feedback" class="mt-4 font-weight-bold text-center reveal-item-child hidden-initial"></p>
                        <!-- Next Material Button - Hidden by default. Goes back to index after last quiz -->
                        <a href="{{ route('siswa.materi.index')}}" id="nextMaterialBtn" class="btn btn-outline-neon w-100 mt-3 d-none fw-bold reveal-item-child hidden-initial">Lanjut ke materi Selanjutnya <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </section>

        </main>
    </div>
</div>

<!-- Bootstrap JS Bundle (popper included) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eP7In6jI3RxhqQ" crossorigin="anonymous"></script>
<!-- Three.js (for the sphere) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<!-- Marked.js for Markdown rendering (no longer needed but kept for other potential markdown use) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/marked/4.0.0/marked.min.js"></script>
<!-- Model Viewer for 3D GLB models -->
<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

<script>
    // --- Three.js Sphere Initialization ---
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('cyber-sphere');
        if (container) {
            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(75, container.offsetWidth / container.offsetHeight, 0.1, 1000);
            const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
            
            renderer.setSize(container.offsetWidth, container.offsetHeight);
            container.appendChild(renderer.domElement);
            
            // Create wireframe sphere
            const geometry = new THREE.SphereGeometry(2, 24, 24); // Smaller sphere, more segments
            const material = new THREE.MeshBasicMaterial({ 
                color: 0x00e676, // Primary accent color (Vibrant Green)
                wireframe: true,
                transparent: true,
                opacity: 0.6
            });
            const sphere = new THREE.Mesh(geometry, material);
            scene.add(sphere);
            
            // Add glowing points (particles)
            const pointsGeometry = new THREE.BufferGeometry();
            const particlesCnt = 1000; // More particles
            
            const positions = new Float32Array(particlesCnt * 3);
            for(let i = 0; i < particlesCnt * 3; i++) {
                positions[i] = (Math.random() - 0.5) * 8; // Spread particles wider
            }
            pointsGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
            
            const pointsMaterial = new THREE.PointsMaterial({
                size: 0.03, // Smaller size
                color: 0xffcc00, // Secondary accent color glow (Bright Yellow/Orange)
                transparent: true,
                opacity: 0.7,
                blending: THREE.AdditiveBlending // For a stronger glow effect
            });
            
            const pointsMesh = new THREE.Points(pointsGeometry, pointsMaterial);
            scene.add(pointsMesh);
            
            camera.position.z = 5;
            
            // Animation loop
            function animate() {
                requestAnimationFrame(animate);
                sphere.rotation.x += 0.001;
                sphere.rotation.y += 0.002;
                pointsMesh.rotation.x += 0.0005;
                pointsMesh.rotation.y -= 0.001;
                renderer.render(scene, camera);
            }
            animate();

            // Handle window resize for Three.js
            window.addEventListener('resize', () => {
                const newWidth = container.offsetWidth;
                const newHeight = container.offsetHeight;
                camera.aspect = newWidth / newHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(newWidth, newHeight);
            });
        }
    });

    // --- Binary Background Animation ---
    function createBinaryBackground(elementId) {
        const container = document.getElementById(elementId);
        if (container) {
            const binaryChars = '01';
            let resizeTimer;

            const generateBinaryContent = () => {
                // Clear previous content
                container.innerHTML = '';
                const rect = container.getBoundingClientRect();
                const columns = Math.floor(rect.width / 14); // Approx width of a char + spacing
                const rows = Math.floor(rect.height / 18); // Approx height of a char + line-height

                let binaryText = '';
                for (let i = 0; i < rows; i++) {
                    let line = '';
                    for (let j = 0; j < columns; j++) {
                        line += binaryChars[Math.floor(Math.random() * binaryChars.length)];
                    }
                    binaryText += line + '<br>';
                }
                container.innerHTML = binaryText;
            };

            // Generate initial content
            generateBinaryContent();

            // Animate random character changes
            setInterval(() => {
                const lines = container.innerHTML.split('<br>');
                if (lines.length > 1) { // Ensure there are lines to animate
                    const randomLineIndex = Math.floor(Math.random() * (lines.length - 1)); // Avoid last empty line
                    const line = lines[randomLineIndex];
                    if (line) {
                        const lineArr = line.split('');
                        const randomCharIndex = Math.floor(Math.random() * lineArr.length);
                        lineArr[randomCharIndex] = binaryChars[Math.floor(Math.random() * binaryChars.length)];
                        lines[randomLineIndex] = lineArr.join('');
                        container.innerHTML = lines.join('<br>');
                    }
                }
            }, 70); // Slightly slower update for less frenetic feel

            // Recalculate on resize
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(generateBinaryContent, 200); // Debounce resize
            });
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Apply binary background to all relevant sections
        createBinaryBackground('binary-bg-1');
        createBinaryBackground('binary-bg-firewall');
        createBinaryBackground('binary-bg-backup');
        createBinaryBackground('binary-bg-fiber'); // New ID for fiber section
        createBinaryBackground('binary-bg-5'); // For video section
    });

    // --- Scroll Reveal Animations (Intersection Observer) ---
    document.addEventListener('DOMContentLoaded', function() {
        const revealItems = document.querySelectorAll('.reveal-item');

        // Apply hidden-initial class to all reveal items on load
        revealItems.forEach(item => {
            item.classList.add('hidden-initial');
            // Ensure children also start hidden
            const children = item.querySelectorAll('.reveal-item-child');
            children.forEach(child => {
                child.classList.add('hidden-initial');
            });
        });

        const observerOptions = {
            root: null, /* viewport */
            rootMargin: '0px',
            threshold: 0.1 /* 10% visible to trigger */
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const targetElement = entry.target;
                    let parentAnimationClass = 'animate-fade-in-up';
                    let parentAnimationDelay = parseFloat(targetElement.dataset.delay || 0);

                    // Remove hidden-initial and add parent animation class
                    targetElement.classList.remove('hidden-initial');
                    if (targetElement.classList.contains('card')) {
                        parentAnimationClass = 'animate-fade-in-up';
                    } else if (targetElement.tagName === 'H2' && targetElement.classList.contains('section-title')) {
                        parentAnimationClass = 'animate-fade-in-up';
                    } else if (targetElement.classList.contains('diagram-container') || targetElement.classList.contains('video-container') || targetElement.classList.contains('quiz-card')) {
                        parentAnimationClass = 'animate-fade-in-up';
                    }
                    targetElement.classList.add(parentAnimationClass);
                    targetElement.style.animationDelay = `${parentAnimationDelay}s`;
                    
                    // Animate its children with a staggered delay
                    const children = targetElement.querySelectorAll('.reveal-item-child');
                    children.forEach((child, index) => {
                        let childAnimationClass = 'animate-fade-in-up';
                        let baseChildDelay = 0.3; // Base delay for child after parent starts animating

                        if (child.tagName === 'LI') {
                            childAnimationClass = 'animate-slide-in-left';
                            baseChildDelay = 0.2;
                        } else if (child.tagName === 'IMG' || child.tagName === 'MODEL-VIEWER' || child.classList.contains('alert') || (child.classList.contains('p-3') && child.classList.contains('border'))) {
                            childAnimationClass = 'animate-scale-in';
                            baseChildDelay = 0.4;
                        } else if (child.tagName === 'H5' || child.tagName === 'H6') {
                            childAnimationClass = 'animate-fade-in-up'; 
                            baseChildDelay = 0.1; 
                        } else if (child.tagName === 'P' || child.tagName === 'SPAN' || child.tagName === 'LABEL' || child.tagName === 'BUTTON') { 
                            childAnimationClass = 'animate-fade-in-up';
                            baseChildDelay = 0.2;
                        } else if (child.classList.contains('title-word')) { // For hero section title words - special case, handled by existing CSS animation
                             return; 
                        }

                        const totalChildDelay = parentAnimationDelay + baseChildDelay + (index * 0.1); 

                        child.classList.remove('hidden-initial'); // Remove hidden state
                        child.classList.add(childAnimationClass);
                        child.style.animationDelay = `${totalChildDelay}s`;
                    });

                    targetElement.classList.remove('reveal-item'); // Remove class after animating
                    observer.unobserve(targetElement); // Stop observing after animation
                }
            });
        }, observerOptions);

        let cardDelay = 0;
        revealItems.forEach((item) => {
            if (item.classList.contains('card') || item.classList.contains('quiz-card') || item.classList.contains('section')) { // Added section for general staggering
                item.dataset.delay = cardDelay;
                cardDelay += 0.2; // Stagger animations for major sections/cards
            }
            observer.observe(item);
        });
    });

    // Function to scroll to a specific section
    function scrollToSection(id) {
        const element = document.getElementById(id);
        if (element) {
            element.scrollIntoView({ behavior: 'smooth' });
        }
    }

    // Quiz functionality
    const quizAnswers = {
        q1: 'b', // Nomor 1 dengan 3, 2 dengan 6, 4 dengan 4, 5 dengan 5, 7 dengan 7, 8 dengan 8
        q2: 'b', // Polaritas probe yang dihubungkan ke rangkaian terbalik
        q3: 'b', // Dari kanan ke kiri
        q4: 'b', // Mengukur daya optik yang ditransmisikan
        q5: 'c'  // Mematikan firewall/antivirus atau memeriksa kabel jaringan
    };

    // Minimum score to unlock next material
    const REQUIRED_SCORE = 80; // Assuming 80% is still the passing score

    // Attach event listeners to quiz options using delegation
    document.getElementById('quiz-container').addEventListener('click', function(event) {
        const option = event.target.closest('.quiz-option');
        if (option) {
            selectQuizOption(option);
        }
    });

    function selectQuizOption(selectedOption) {
        const questionBlock = selectedOption.closest('.question-block');
        
        // Remove 'selected' class from all options in this question block
        questionBlock.querySelectorAll('.quiz-option').forEach(opt => {
            opt.classList.remove('selected', 'correct-answer', 'incorrect'); // Clear previous results
        });

        // Add 'selected' class to the clicked option
        selectedOption.classList.add('selected');
    }

    function resetQuizUI() {
        document.querySelectorAll('.quiz-option').forEach(option => {
            option.classList.remove('selected', 'correct-answer', 'incorrect');
        });
        document.getElementById('quiz-feedback').textContent = "";
        document.getElementById('nextMaterialBtn').classList.add('d-none'); // Hide button
        document.getElementById('nextMaterialBtn').disabled = true; // Disable button
    }

    // Mapping of quiz questions to their full text and relevant material section IDs
    const quizQuestionsData = {
        q1: {
            question: "Jika Anda mengukur kabel LAN cross dengan LAN tester, bagaimana urutan lampu indikator yang benar?",
            correctAnswerText: "Nomor 1 dengan 3, 2 dengan 6, 4 dengan 4, 5 dengan 5, 7 dengan 7, 8 dengan 8",
            materialSectionTitle: "LAN Tester"
        },
        q2: {
            question: "Saat menggunakan multimeter analog untuk mengukur tegangan DC, jika jarum bergerak ke arah kiri, apa artinya?",
            correctAnswerText: "Polaritas probe yang dihubungkan ke rangkaian terbalik",
            materialSectionTitle: "Multimeter"
        },
        q3: {
            question: "Untuk pengukuran tahanan menggunakan multimeter analog, bagaimana arah pembacaan skala hasil pengukuran?",
            correctAnswerText: "Dari kanan ke kiri",
            materialSectionTitle: "Multimeter" // Multimeter section, but resistance scale is not explicitly detailed
        },
        q4: {
            question: "Apa fungsi utama Optical Power Meter (OPM) dalam lingkup pekerjaan Fiber Optik?",
            correctAnswerText: "Mengukur daya optik yang ditransmisikan",
            materialSectionTitle: "Optical Power Meter (OPM)"
        },
        q5: {
            question: "Apa yang harus Anda lakukan jika hasil ping test menunjukkan 'General Failure'?",
            correctAnswerText: "Mematikan firewall/antivirus atau memeriksa kabel jaringan",
            materialSectionTitle: "Ping Test"
        }
    };

    // Function to get the content of a material section (no longer needed for Gemini explanation, but kept for future use)
    function getMaterialSectionContent(sectionTitle) {
        let content = "";
        let element = null;
        switch (sectionTitle) {
            case "LAN Tester":
                element = document.getElementById('lan-tester-card');
                break;
            case "Multimeter":
                element = document.getElementById('multimeter-card');
                break;
            case "Optical Power Meter (OPM)":
                element = document.getElementById('opm-card');
                break;
            case "Ping Test":
                element = document.getElementById('ping-test-card');
                break;
            // Add other cases as needed for different sections
        }
        if (element) {
            content = element.querySelector('.card-body').innerText;
        }
        return content;
    }

    function checkQuiz() {
        let score = 0;
        const totalQuestions = Object.keys(quizAnswers).length;
        const feedback = document.getElementById('quiz-feedback');
        const nextMaterialBtn = document.getElementById('nextMaterialBtn');

        // Clear previous results visually and remove all explanation buttons
        document.querySelectorAll('.quiz-option').forEach(option => {
            option.classList.remove('correct-answer', 'incorrect');
        });
        // Removed the line that removes explanation buttons as they are no longer generated

        let allAnswered = true;

        for (const qId in quizAnswers) {
            const selectedOption = document.querySelector(`.quiz-option[data-question="${qId}"].selected`);
            const correctAnswer = quizAnswers[qId];

            if (!selectedOption) {
                allAnswered = false;
                break; // Exit loop if any question is not answered
            }

            const selectedChoice = selectedOption.dataset.choice;
            const questionBlock = selectedOption.closest('.question-block');

            if (selectedChoice === correctAnswer) {
                score += 1;
                selectedOption.classList.add('correct-answer');
            } else {
                selectedOption.classList.add('incorrect');
                // Highlight the correct answer for clarity
                const correctOption = document.querySelector(`.quiz-option[data-question="${qId}"][data-choice="${correctAnswer}"]`);
                if (correctOption) {
                    correctOption.classList.add('correct-answer');
                }
                // Removed the logic to add explanation button here
            }
        }

        if (!allAnswered) {
            showAlert("Mohon jawab semua pertanyaan sebelum memeriksa.", 'warning');
            nextMaterialBtn.classList.add('d-none'); // Hide button
            nextMaterialBtn.disabled = true;
            return;
        }

        const percentage = (score / totalQuestions) * 100;
        
        // Store the score for Material 3 in localStorage using the correct key
        localStorage.setItem('material_3_score', percentage.toFixed(0)); // Key for Material 3

        if (percentage >= REQUIRED_SCORE) { // Passing score
            showAlert(`Selamat! Anda berhasil memahami materi ini dengan baik dengan skor ${percentage.toFixed(0)}%. Semua materi telah diselesaikan!`, 'success');
            nextMaterialBtn.classList.remove('d-none'); // Show next material button
            nextMaterialBtn.disabled = false;
            // No need for a specific unlock animation flag as this is the last material
        } else {
            showAlert(`Skor Anda: ${percentage.toFixed(0)}%. Terus semangat belajar! Anda perlu mencapai setidaknya ${REQUIRED_SCORE}% untuk melanjutkan.`, 'danger');
            nextMaterialBtn.classList.add('d-none'); // Hide button
            nextMaterialBtn.disabled = true;
            
            // No auto-reset for retake, user can click options again and re-check.
        }
    }

    // Show a custom alert message (success, warning, danger, or info)
    function showAlert(message, type = 'success') {
        let alertDiv = document.getElementById('page-alert-notification');

        if (!alertDiv) {
            alertDiv = document.createElement('div');
            alertDiv.id = 'page-alert-notification';
            alertDiv.classList.add('alert', 'position-fixed', 'fade');
            alertDiv.style.top = '20px';
            alertDiv.style.right = '20px';
            alertDiv.style.zIndex = '1050';
            alertDiv.style.minWidth = '300px';
            alertDiv.style.display = 'flex';
            alertDiv.style.alignItems = 'center';
            alertDiv.innerHTML = `<i class="me-2"></i><span id="page-alert-message"></span><button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>`;
            document.body.appendChild(alertDiv);
            
            // Add click listener to close button
            alertDiv.querySelector('.btn-close').addEventListener('click', () => {
                alertDiv.classList.remove('show');
                setTimeout(() => {
                    alertDiv.style.display = 'none';
                }, 150);
            });
        }

        alertDiv.classList.remove('alert-success', 'alert-warning', 'alert-danger', 'alert-info', 'show');
        alertDiv.classList.add(`alert-${type}`);
        
        const messageElement = alertDiv.querySelector('#page-alert-message');
        const iconElement = alertDiv.querySelector('i');

        messageElement.textContent = message;
        
        if (type === 'success') {
            iconElement.className = 'fas fa-check-circle me-2';
        } else if (type === 'warning') {
            iconElement.className = 'fas fa-exclamation-triangle me-2';
        } else if (type === 'danger') {
            iconElement.className = 'fas fa-times-circle me-2';
        } else if (type === 'info') {
            iconElement.className = 'fas fa-info-circle me-2';
        }
        
        alertDiv.style.display = 'flex'; // Ensure it's displayed
        requestAnimationFrame(() => { // Use rAF for smooth transition
            alertDiv.classList.add('show');
        });

        setTimeout(() => {
            alertDiv.classList.remove('show');
            setTimeout(() => {
                alertDiv.style.display = 'none';
            }, 4000);
        }, 4000);
    }


    // On page load, check if quiz was already passed and show "next material" button
    document.addEventListener('DOMContentLoaded', function() {
        const savedScore = parseInt(localStorage.getItem('material_3_score')) || 0;
        const nextMaterialBtn = document.getElementById('nextMaterialBtn');
        if (savedScore >= REQUIRED_SCORE) {
            nextMaterialBtn.classList.remove('d-none');
            nextMaterialBtn.disabled = false;
        } else {
            nextMaterialBtn.classList.add('d-none');
            nextMaterialBtn.disabled = true;
        }
    });

    // Canvas animation logic
    window.onload = function() {
        const canvas = document.getElementById('heroCanvas');
        const ctx = canvas.getContext('2d');
        let particles = [];
        let animationFrameId;
        let mouse = { x: null, y: null, radius: 150 }; // Mouse interaction radius

        // Pre-defined Font Awesome icon classes for the theme
        const iconChars = [
            '\uf532', // fa-ethernet (Network)
            '\uf6ff', // fa-network-wired (Network Cables)
            '\uf0e4', // fa-microchip (Technology/Chips)
            '\uf2db', // fa-chart-bar (Data/Analysis)
            '\uf109', // fa-laptop-code (Laptop/Tools)
            '\uf6ee', // fa-satellite-dish (Telecommunication)
            '\uf0d1', // fa-rocket (Performance)
            '\uf126', // fa-code-branch (Connectivity)
            '\uf5a0', // fa-signal (Signal Strength)
            '\uf544', // fa-screwdriver-wrench (Tools)
            '\uf079', // fa-tachometer-alt (Measurement/Speed)
            '\uf021'  // fa-sync-alt (Diagnostics/Refresh)
        ];

        // Function to resize canvas
        function resizeCanvas() {
            canvas.width = canvas.offsetWidth;
            canvas.height = canvas.offsetHeight;
            initParticles(); // Re-initialize particles on resize
        }

        // Particle constructor
        function Particle(x, y, size, color, vx, vy, type, iconChar) {
            this.x = x;
            this.y = y;
            this.size = size; // Using size instead of radius for icons
            this.color = color;
            this.vx = vx;
            this.vy = vy;
            this.type = type; // 'circle' or 'icon'
            this.iconChar = iconChar;
            this.originalSize = size; // Store original size for hover effect
            this.alpha = parseFloat(color.match(/[\d\.]+\)$/)[0].slice(0, -1)); // Extract original alpha
        }

        // Draw particle or icon
        Particle.prototype.draw = function() {
            ctx.fillStyle = this.color;
            if (this.type === 'circle') {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2, false);
                ctx.fill();
            } else if (this.type === 'icon') {
                ctx.font = `${this.size}px "Font Awesome 6 Free"`; // Ensure Font Awesome font is used
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                ctx.fillText(this.iconChar, this.x, this.y);
            }
        };

        // Update particle position and hover effect
        Particle.prototype.update = function() {
            let dx = mouse.x - this.x;
            let dy = mouse.y - this.y;
            let distance = Math.sqrt(dx * dx + dy * dy);

            if (distance < mouse.radius) {
                // Particle/icon grows and brightens on hover
                if (this.size < this.originalSize * 1.5) { // Max 1.5 times original size
                    this.size += 0.1;
                }
                this.color = `rgba(var(--accent-primary-rgb), ${Math.min(1, this.alpha * 2)})`; // Brighter Primary Accent
            } else {
                // Shrink back to original size and fade out slightly when not hovered
                if (this.size > this.originalSize) {
                    this.size -= 0.05;
                }
                this.color = `rgba(var(--accent-primary-rgb), ${this.alpha})`; // Back to original alpha (Primary Accent)
            }

            this.x += this.vx;
            this.y += this.vy;

            // Bounce off edges
            const effectiveSize = this.type === 'circle' ? this.size : this.size / 2; // Approximate size for collision
            if (this.x + effectiveSize > canvas.width || this.x - effectiveSize < 0) {
                this.vx *= -1;
            }
            if (this.y + effectiveSize > canvas.height || this.y - effectiveSize < 0) {
                this.vy *= -1;
            }
        };

        // Initialize particles
        function initParticles() {
            particles = [];
            const maxParticles = Math.floor((canvas.width * canvas.height) / 10000); // Adjust density
            const numIcons = Math.floor(maxParticles * 0.15); // 15% of particles are icons

            for (let i = 0; i < maxParticles; i++) {
                const isIcon = i < numIcons;
                const size = isIcon ? (Math.random() * 10 + 15) : (Math.random() * 2 + 1); // Larger for icons
                const x = Math.random() * (canvas.width - size * 2) + size;
                const y = Math.random() * (canvas.height - size * 2) + size;
                const vx = (Math.random() - 0.5) * 0.7; // Slightly faster movement
                const vy = (Math.random() - 0.5) * 0.7;
                const color = `rgba(var(--accent-primary-rgb), ${Math.random() * 0.5 + 0.3})`; // Primary accent gradient
                
                let type = 'circle';
                let iconChar = null;

                if (isIcon) {
                    type = 'icon';
                    iconChar = iconChars[Math.floor(Math.random() * iconChars.length)];
                }
                particles.push(new Particle(x, y, size, color, vx, vy, type, iconChar));
            }
        }

        // Draw connections between particles
        function drawConnections() {
            const maxDistance = 120; // Max distance for lines
            for (let i = 0; i < particles.length; i++) {
                for (let j = i; j < particles.length; j++) {
                    const dist = Math.sqrt(Math.pow(particles[i].x - particles[j].x, 2) + Math.pow(particles[i].y - particles[j].y, 2));
                    
                    // Check if either particle is hovered
                    let isConnectedToMouse = (
                        (mouse.x !== null && mouse.y !== null) && (
                            Math.sqrt(Math.pow(mouse.x - particles[i].x, 2) + Math.pow(mouse.y - particles[i].y, 2)) < mouse.radius ||
                            Math.sqrt(Math.pow(mouse.x - particles[j].x, 2) + Math.pow(mouse.y - particles[j].y, 2)) < mouse.radius
                        )
                    );

                    if (dist < maxDistance) {
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        let alpha = 1 - (dist / maxDistance);

                        if (isConnectedToMouse) {
                            ctx.strokeStyle = `rgba(var(--accent-primary-rgb), ${Math.min(1, alpha * 2)})`; // Brighter Primary Accent lines on hover
                            ctx.lineWidth = 1.5; // Thicker lines
                        } else {
                            ctx.strokeStyle = `rgba(var(--accent-primary-rgb), ${alpha * 0.4})`; // Original subtle lines (Primary Accent)
                            ctx.lineWidth = 0.7;
                        }
                        ctx.stroke();
                    }
                }
            }
        }

        // Animation loop
        function animateCanvas() {
            animationFrameId = requestAnimationFrame(animateCanvas);
            // Partial clear to create a trail effect
            ctx.fillStyle = 'rgba(18, 18, 18, 0.05)'; // Match new body background for trail effect
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            drawConnections(); // Draw lines first
            for (let i = 0; i < particles.length; i++) {
                particles[i].update();
                particles[i].draw();
            }
        }

        // Mouse move listener
        canvas.addEventListener('mousemove', function(event) {
            const rect = canvas.getBoundingClientRect();
            mouse.x = event.clientX - rect.left;
            mouse.y = event.clientY - rect.top;
        });

        // Mouse leave listener to reset mouse position
        canvas.addEventListener('mouseleave', function() {
            mouse.x = null;
            mouse.y = null;
        });

        // Initial setup
        resizeCanvas();
        animateCanvas();

        // Handle window resize
        window.addEventListener('resize', () => {
            cancelAnimationFrame(animationFrameId); // Stop current animation frame
            resizeCanvas();
            animateCanvas();
        });
    };
</script>
</body>
</html>
@endsection
