{{-- resources/views/guru/materi/prinsip_dasar_layanan_jaringan.blade.php --}}

@extends('guru.guru_master')

@section('guru')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alat Ukur Jaringan Komputer dan Telekomunikasi</title>
    <!-- Bootstrap CSS -->
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" xintegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWtIXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #fdfdfd 0%, #181717 100%); /* Light blueish gradient */
            color: #333;
        }

        .container {
            max-width: 1200px;
        }

        /* Header Section Styles */
        header {
            background: linear-gradient(135deg, #3c8db3 0%, #0f1316 50%, #3c8db3 100%); /* Deeper blue gradient */
            border-bottom: 5px solid #66ccff; /* Bright blue accent */
            min-height: 380px; /* Increased height for better visual impact */
            position: relative;
            overflow: hidden;
            border-radius: 1.5rem !important; /* Larger border-radius */
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5); /* Deeper shadow */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            flex-direction: column;
            animation: header-fade-in 1.2s ease-out forwards; /* Fade in header on load */
        }

        /* Animated network elements */
        .network-connection {
            position: absolute;
            border-radius: 50%;
            border: 2px dashed rgba(28, 32, 32, 0.678); /* Blueish dash line */
            animation: rotate 35s linear infinite, fade-in 1.5s ease-out forwards;
            opacity: 0; /* Start hidden for fade-in */
        }
        .network-connection:nth-child(1) { width: 280px; height: 280px; top: 10%; left: 5%; animation-duration: 30s; animation-delay: 0.5s; }
        .network-connection:nth-child(2) { width: 350px; height: 350px; bottom: 15%; right: 10%; animation-duration: 40s; animation-delay: 0.8s; }
        .network-connection:nth-child(3) { width: 220px; height: 220px; top: 20%; right: 25%; animation-duration: 33s; animation-delay: 1.1s; }
        .network-connection:nth-child(4) { width: 260px; height: 260px; bottom: 5%; left: 35%; animation-duration: 38s; animation-delay: 1.4s; }
        
        .node {
            width: 15px; /* Larger node */
            height: 15px;
            background: #66ccff; /* Bright blue */
            border-radius: 50%;
            box-shadow: 0 0 25px #66ccff, 0 0 10px rgba(102, 204, 255, 0.8); /* More intense glow */
            animation: pulse 2.5s infinite ease-in-out alternate, float-node 7s infinite ease-in-out, fade-in 1s ease-out forwards;
            z-index: 3; /* Ensure nodes are above connections */
            opacity: 0; /* Start hidden for fade-in */
            animation-fill-mode: forwards;
        }
        .node:nth-child(1) { top: 12%; left: 18%; animation-delay: 1s; }
        .node:nth-child(2) { top: 68%; left: 22%; animation-delay: 1.3s; }
        .node:nth-child(3) { top: 32%; right: 28%; animation-delay: 1.6s; }
        .node:nth-child(4) { top: 78%; right: 18%; animation-delay: 1.9s; }

        /* General Fade-in for basic elements */
        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Header specific animations */
        @keyframes header-fade-in {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes float {
            0% { transform: translateY(0) rotate(5deg); }
            50% { transform: translateY(-25px) rotate(-5deg); } /* More dynamic float */
            100% { transform: translateY(0) rotate(5deg); }
        }
        @keyframes float-node {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        @keyframes pulse {
            0% { opacity: 0.7; transform: scale(1); box-shadow: 0 0 10px #66ccff; }
            50% { opacity: 1; transform: scale(1.4); box-shadow: 0 0 30px #66ccff, 0 0 12px rgba(102, 204, 255, 0.9); }
            100% { opacity: 0.7; transform: scale(1); box-shadow: 0 0 10px #66ccff; }
        }
        @keyframes titleWord {
            0% { transform: translateY(0); opacity: 0; }
            30% { opacity: 1; }
            50% { transform: translateY(-10px); } /* Stronger bounce */
            100% { transform: translateY(0); opacity: 1; }
        }
        @keyframes text-fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Entrance animations for content */
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(30px); }
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


        .lead {
            font-weight: 300;
            color: rgba(255, 255, 255, 0.95) !important; /* Almost pure white */
            font-size: 1.3rem; /* Slightly larger lead text */
            animation: text-fade-in 1.2s ease-out 1.6s forwards;
            opacity: 0; /* Start hidden */
        }

        .badge {
            font-size: 0.95em;
            padding: 0.7em 1.2em;
            border-radius: 0.75rem;
            opacity: 0.9;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94); /* Smoother transition */
            font-weight: 500;
            animation: fade-in-up 0.8s ease-out forwards;
            opacity: 0; /* Start hidden */
        }
        .badge:nth-child(1) { animation-delay: 2s; }
        .badge:nth-child(2) { animation-delay: 2.2s; }
        .badge:nth-child(3) { animation-delay: 2.4s; }

        .badge:hover {
            opacity: 1;
            transform: translateY(-5px) scale(1.08); /* More pronounced effect */
            box-shadow: 0 8px 25px rgba(0,0,0,0.4);
        }

        .btn-neon {
            background: linear-gradient(45deg, #3d88ad, #1ab9ee); /* Blueish gradient */
            color: #1a2a3a; /* Dark text */
            border: none;
            border-radius: 50px;
            font-weight: 700;
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94); /* Smoother transition */
            box-shadow: 0 0 25px rgba(102, 204, 255, 0.6), 0 8px 20px rgba(0,0,0,0.4);
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.8rem 2rem; /* Larger button */
            animation: fade-in-up 1s ease-out 2.6s forwards;
            opacity: 0; /* Start hidden */
        }
        
        .btn-neon:hover {
            background: linear-gradient(45deg, #99e6ff, #007bb3);
            transform: translateY(-8px) scale(1.05); /* Even more pronounced lift */
            box-shadow: 0 0 40px rgba(102, 204, 255, 0.9), 0 12px 30px rgba(0,0,0,0.6);
            color: #1a2a3a;
        }

        /* Image illustration */
        header img {
            max-height: 250px !important; /* Even larger illustration */
            filter: drop-shadow(0 0 30px rgba(102, 204, 255, 0.8)); /* Stronger glow */
            animation: float 6s ease-in-out infinite, fade-in 1.5s ease-out 1.8s forwards;
            opacity: 0; /* Start hidden */
        }

        /* Card Sections */
        .card {
            border-radius: 1.5rem; /* More rounded corners for cards */
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94); /* Smoother transition */
            box-shadow: 0 8px 25px rgb(0, 0, 0);
            border: none; /* Remove default card border */
            opacity: 0; /* Start hidden for entrance animation */
            transform: translateY(20px); /* Start slightly below */
            animation: fade-in-up 1s ease-out forwards;
        }
        .card:hover {
            transform: translateY(-10px) scale(1.01); /* More pronounced lift and slight scale */
            box-shadow: 0 18px 45px rgba(0,0,0,0.25);
        }

        /* Staggered animation for cards */
        section.card:nth-of-type(1) { animation-delay: 0.5s; } /* LAN Tester */
        section.card:nth-of-type(2) { animation-delay: 0.7s; } /* OPM & OTDR */
        section.card:nth-of-type(3) { animation-delay: 0.9s; } /* Fusion Splicer */
        section.card:nth-of-type(4) { animation-delay: 1.1s; } /* Earth Res Tester */
        section.card:nth-of-type(5) { animation-delay: 1.3s; } /* Digital Multimeter */
        section.card:nth-of-type(6) { animation-delay: 1.5s; } /* Wi-Fi Survey Apps */
        section.card:nth-of-type(7) { animation-delay: 1.7s; } /* Video */
        section.card:nth-of-type(8) { animation-delay: 1.9s; } /* Comparison Table */
        section.card:nth-of-type(9) { animation-delay: 2.1s; } /* Quiz */



        .card-header h2 {
            opacity: 0; /* Start hidden */
            animation: slide-in-left 0.7s ease-out forwards;
        }
        .card-header .badge {
            opacity: 0; /* Start hidden */
            animation: slide-in-right 0.7s ease-out forwards;
        }

        .section-sub-title { /* For h3 elements */
            opacity: 0; /* Start hidden */
            animation: fade-in-up 0.6s ease-out forwards;
        }
        .card-body > p.text-dark:first-of-type { /* First paragraph in card body */
            opacity: 0; /* Start hidden */
            animation: fade-in-up 0.7s ease-out forwards;
        }
        .list-group-flush li {
            opacity: 0; /* Start hidden */
            animation: slide-in-left 0.5s ease-out forwards;
        }
        .list-group-flush li:nth-child(1) { animation-delay: 0.1s; }
        .list-group-flush li:nth-child(2) { animation-delay: 0.2s; }
        .list-group-flush li:nth-child(3) { animation-delay: 0.3s; }
        .list-group-flush li:nth-child(4) { animation-delay: 0.4s; }
        .list-group-flush li:nth-child(5) { animation-delay: 0.5s; }
        .list-group-flush li:nth-child(6) { animation-delay: 0.6s; }
        .list-group-flush li:nth-child(7) { animation-delay: 0.7s; }
        .list-group-flush li:nth-child(8) { animation-delay: 0.8s; }


        .content-box {
            opacity: 0; /* Start hidden */
            animation: fade-in-up 0.8s ease-out forwards;
        }
        .alert {
            opacity: 0; /* Start hidden */
            animation: slide-in-right 0.8s ease-out forwards;
        }
        .mermaid {
            opacity: 0; /* Start hidden */
            animation: fade-in 1s ease-out forwards;
        }
        .video-container {
            opacity: 0; /* Start hidden */
            animation: fade-in-up 0.9s ease-out forwards;
        }
        .table-responsive {
            opacity: 0; /* Start hidden */
            animation: fade-in-up 1s ease-out forwards;
        }

        /* Styling for other elements (unchanged from previous) */
        .section-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: #1a2a3a;
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
            padding-bottom: 0.75rem;
        }
        .section-title::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: #66ccff;
            border-radius: 2px;
        }
        
        .content-box {
            background-color: #ffffff;
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            border: 1px solid #e0e6ec;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .display-3 {
                font-size: 2rem;
            }
            .lead {
                font-size: 1.1rem;
            }
            .card-header h2 {
                font-size: 1.4rem;
            }
            .card-body {
                padding: 1.2rem;
            }
            .col-lg-4.d-none.d-lg-block {
                display: none !important;
            }
            .section-title {
                font-size: 1.8rem;
                margin-bottom: 1.5rem;
            }
            .title-word {
                margin-right: 8px; /* Reduce spacing on small screens */
            }
        }
        /* Quiz Section */
        .quiz-card {
            background: #ffffff;
            border-radius: 1.5rem;
            padding: 2rem;
            margin: 1rem 0;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border: 1px solid #e0e6ec;
            color: #333;
        }

        .quiz-option {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.75rem;
            padding: 1rem;
            margin-bottom: 0.75rem;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #333;
        }

        .quiz-option:hover {
            border-color: #66ccff;
            background: #e6f7ff;
        }

        /* Styles for selected, correct, and incorrect options */
        .quiz-option.selected {
            border-color: #007bff; /* Primary blue for selected */
            background: #e9f5ff; /* Light blue background */
            font-weight: bold;
        }
        .quiz-option.correct-answer { /* For showing the correct answer after check */
            border-color: #28a745; /* Green for correct */
            background: #e9f8ed; /* Light green background */
            font-weight: bold;
        }
        .quiz-option.incorrect { /* For incorrect answers */
            border-color: #dc3545; /* Red for incorrect */
            background: #fdf0f1; /* Light red background */
            font-weight: bold;
        }
        .quiz-option label {
            cursor: inherit; /* Ensure label cursor is consistent */
            width: 100%;
            display: block;
        }

        #quiz-feedback {
            font-size: 1.1rem;
        }
        #quiz-feedback.text-success {
            color: #28a745 !important;
        }
        #quiz-feedback.text-danger {
            color: #dc3545 !important;
        }
        #quiz-feedback.text-warning {
            color: #ffc107 !important;
        }

        /* Video Quiz Modal Styles */
        .video-quiz-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1060; /* Higher than Bootstrap modals */
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease;
        }

        .video-quiz-modal-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .video-quiz-modal-content {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 500px;
            text-align: center;
            transform: translateY(-20px);
            transition: transform 0.3s ease;
        }

        .video-quiz-modal-overlay.show .video-quiz-modal-content {
            transform: translateY(0);
        }

        .video-quiz-modal-options .quiz-option {
            margin-bottom: 10px;
        }

        .video-quiz-modal-feedback {
            font-weight: bold;
            margin-top: 15px;
        }

    </style>
</head>
<body>

<div class="bg-light min-h-screen">
    <div class="container py-5">
        <!-- Header dengan Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb" style="opacity: 0; animation: fade-in-up 0.6s ease-out forwards;">
                <li class="breadcrumb-item"><a href="{{ route('guru.guru_master')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('guru.materi.index')}}">Materi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Alat Ukur Jaringan Komputer dan Telekomunikasi</li>
            </ol>
        </nav>

        <!-- Header Utama -->
        <header class="position-relative overflow-hidden rounded-4 shadow-lg mb-5">
            <!-- Animated network connections -->
            <div class="position-absolute w-100 h-100" style="overflow: hidden;">
                <div class="network-connection"></div>
                <div class="network-connection"></div>
                <div class="network-connection"></div>
                <div class="network-connection"></div>
            </div>

            <!-- Floating nodes -->
            <div class="position-absolute node"></div>
            <div class="position-absolute node"></div>
            <div class="position-absolute node"></div>
            <div class="position-absolute node"></div>

            <div class="container h-100 position-relative" style="z-index: 2;">
                <div class="row align-items-center h-100 py-4">
                    <div class="col-lg-8 mx-auto"> {{-- Center content for header --}}
                        <h1 class="display-3 fw-bold text-white mb-3" style="text-shadow: 0 2px 8px rgba(0,0,0,0.3);">
                            <span class="title-word">Alat Ukur</span>
                            <span class="title-word">Jaringan</span>
                            <span class="title-word">Komputer</span>
                        </h1>
                        
                        <p class="lead mb-4">
                            Menganalisis Penggunaan Alat Ukur yang Tepat dalam Lingkup Teknik Jaringan Komputer dan Telekomunikasi
                        </p>
                        
                        <div class="d-flex flex-wrap gap-3 justify-content-center mt-4">
                            <span class="badge bg-dark bg-opacity-50 text-white border border-light border-opacity-10 py-2 px-3">
                                <i class="fas fa-tools me-2"></i>Troubleshooting Jaringan
                            </span>
                            <span class="badge bg-dark bg-opacity-50 text-white border border-light border-opacity-10 py-2 px-3">
                                <i class="fas fa-chart-line me-2"></i>Pengujian Performa
                            </span>
                            <span class="badge bg-dark bg-opacity-50 text-white border border-light border-opacity-10 py-2 px-3">
                                <i class="fas fa-wrench me-2"></i>Perawatan Infrastruktur
                            </span>
                        </div>
                        
                        <button class="btn btn-neon mt-4 px-4 py-2" onclick="scrollToSection('materi-content')">
                            <i class="fas fa-book-open me-2"></i>Mulai Belajar
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main id="materi-content">
            
            <!-- LAN Tester -->
            <section class="card mb-5 border-info border-2">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h2 class="h5 mb-0 fw-bold">
                        <i class="fas fa-network-wired me-2"></i>LAN Tester
                    </h2>
                    <span class="badge bg-white text-info">Menguji Konektivitas Kabel</span>
                </div>
                <div class="card-body">
                    <h3 class="h5 fw-bold text-info section-sub-title">Fungsi dan Bagian LAN Tester</h3>
                    <p class="text-dark">LAN Tester adalah alat ukur yang digunakan untuk memeriksa integritas dan konektivitas kabel jaringan (LAN) seperti kabel UTP, FTP, RJ11, dan coaxial. Alat ini membantu mendeteksi kesalahan seperti kabel putus, sirkuit pendek, kabel terbalik, atau kabel silang.</p>

                    <h3 class="h5 fw-bold text-info mt-4 section-sub-title">Spesifikasi Umum</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-cogs text-info me-2"></i>
                            <span><strong>Penggunaan:</strong> Untuk kabel UTP, FTP, RJ11, dan coaxial.</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-ruler-horizontal text-info me-2"></i>
                            <span><strong>Panjang Kabel Maksimal:</strong> 300 m (UTP, FTP, RJ11), 500 m (BNC).</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-cut text-info me-2"></i>
                            <span><strong>Deteksi:</strong> Mampu mendeteksi kabel putus di tengah.</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-display text-info me-2"></i>
                            <span><strong>Tampilan:</strong> LCD untuk menampilkan hasil pengujian.</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-wifi text-info me-2"></i>
                            <span><strong>Unit Jarak Jauh:</strong> Dilengkapi dengan remote unit untuk pengujian kabel jarak berjauhan.</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-battery-full text-info me-2"></i>
                            <span><strong>Catu Daya:</strong> Umumnya menggunakan baterai 9 volt (2 buah).</span>
                        </li>
                    </ul>
                    
                    <div class="mt-4 p-3 bg-light rounded shadow-sm">
                        <h4 class="h6 fw-bold text-info">Contoh Kasus Nyata:</h4>
                        <p class="text-dark">Seorang teknisi jaringan komputer sedang melakukan penanganan gangguan yang terjadi pada kabel LAN. Apabila dilihat dari penampakan fisik, semua kabel dalam kondisi normal, namun ada beberapa saluran yang tidak dapat digunakan (tidak terjadi koneksi). LAN tester yang memiliki fitur deteksi kabel putus di tengah dan tampilan LCD akan sangat membantu untuk menemukan letak pasti masalah pada kabel tersebut.</p>
                        <p class="text-dark mt-3">
                                                    </p>
                    </div>
                </div>
            </section>

            <!-- Optical Power Meter (OPM) dan Optical Time Domain Reflectometer (OTDR) -->
            <section class="card mb-5 border-success border-2">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h2 class="h5 mb-0 fw-bold">
                        <i class="fas fa-lightbulb me-2"></i>Optical Power Meter (OPM) & OTDR
                    </h2>
                    <span class="badge bg-white text-success">Pengujian Serat Optik</span>
                </div>
                <div class="card-body">
                    <h3 class="h5 fw-bold text-success section-sub-title">Optical Power Meter (OPM)</h3>
                    <p class="text-dark">OPM digunakan untuk mengukur kekuatan sinyal optik pada serat optik. Ini penting untuk memastikan bahwa daya optik berada dalam rentang yang dapat diterima untuk transmisi data yang andal.</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-wave-square text-success me-2"></i>
                            <span><strong>Pengukuran:</strong> Mengukur daya optik (dalam dBm atau Watt).</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-ruler-combined text-success me-2"></i>
                            <span><strong>Wavelength:</strong> Beberapa OPM mendukung berbagai panjang gelombang seperti 1310 nm, 1490 nm, 1550 nm, yang umum digunakan dalam jaringan optik.</span>
                        </li>
                    </ul>

                    <h4 class="h6 fw-bold text-success mt-4">Contoh Kasus OPM:</h4>
                    <p class="text-dark">Untuk melakukan pengukuran saluran optik aktif arah downlink pada salah satu provider telekomunikasi, dibutuhkan panjang gelombang sebesar 1.490 nm. OPM yang dapat mengukur pada panjang gelombang ini sangat dibutuhkan.</p>

                    <h3 class="h5 fw-bold text-success mt-4 section-sub-title">Optical Time Domain Reflectometer (OTDR)</h3>
                    <p class="text-dark">OTDR adalah instrumen optoelektronik yang digunakan untuk mengkarakterisasi serat optik. OTDR menyuntikkan serangkaian pulsa optik ke dalam serat dan mengekstrak, dari serat ujung yang sama, cahaya yang tersebar dan dipantulkan kembali dari titik-titik di sepanjang serat.</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-location-dot text-success me-2"></i>
                            <span><strong>Fungsi:</strong> Mendeteksi lokasi putus, sambungan, atau anomali lainnya pada serat optik.</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-globe text-success me-2"></i>
                            <span><strong>Aplikasi:</strong> Mengukur panjang serat, mengidentifikasi loss pada konektor dan splicing.</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-radiation text-success me-2"></i>
                            <span><strong>Pengukuran Tanpa Mematikan Koneksi:</strong> Beberapa OTDR canggih mampu melakukan pengukuran pada jaringan yang sedang online/aktif.</span>
                        </li>
                    </ul>

                    <h4 class="h6 fw-bold text-success mt-4">Contoh Kasus OTDR:</h4>
                    <p class="text-dark">Sebuah jaringan optik dengan panjang 260 km membentang dari Kota A ke Kota B. Dalam rangka melakukan pemeliharaan pada saluran optik tersebut, pengukuran secara rutin diperlukan tanpa mematikan koneksi dari jaringan yang sedang online. OTDR dengan kemampuan pengukuran online sangat cocok untuk pekerjaan ini.</p>
                </div>
            </section>

             <!-- Fusion Splicer -->
            <section class="card mb-5 border-primary border-2">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h2 class="h5 mb-0 fw-bold">
                        <i class="fas fa-fire me-2"></i>Fusion Splicer
                    </h2>
                    <span class="badge bg-white text-primary">Penyambungan Serat Optik</span>
                </div>
                <div class="card-body">
                    <h3 class="h5 fw-bold text-primary section-sub-title">Fungsi Fusion Splicer</h3>
                    <p class="text-dark">Fusion Splicer adalah alat presisi yang digunakan untuk menyambung dua ujung serat optik dengan melelehkannya bersama-sama menggunakan busur listrik. Proses ini menciptakan sambungan permanen dengan kehilangan sinyal yang sangat rendah, menjadikannya krusial dalam instalasi dan perbaikan jaringan serat optik.</p>
                    
                    <h3 class="h5 fw-bold text-primary mt-4 section-sub-title">Spesifikasi Umum</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-microchip text-primary me-2"></i>
                            <span><strong>Jenis Serat:</strong> Kompatibel dengan berbagai jenis serat optik (Single-mode, Multi-mode, DS, NZDS).</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-cogs text-primary me-2"></i>
                            <span><strong>Waktu Penyambungan:</strong> Cepat, biasanya dalam 6-15 detik.</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-temperature-high text-primary me-2"></i>
                            <span><strong>Waktu Pemanasan:</strong> Pemanas tabung pelindung sambungan (sleeve heater) dalam 15-30 detik.</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-battery-full text-primary me-2"></i>
                            <span><strong>Daya Tahan Baterai:</strong> Mampu melakukan ratusan siklus penyambungan dengan satu kali pengisian daya.</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-display text-primary me-2"></i>
                            <span><strong>Tampilan:</strong> Layar LCD berwarna untuk visualisasi proses penyambungan.</span>
                        </li>
                    </ul>

                    <div class="mt-4 p-3 bg-light rounded shadow-sm">
                        <h4 class="h6 fw-bold text-primary">Contoh Kasus Nyata:</h4>
                        <p class="text-dark">Setelah terjadi kerusakan pada kabel serat optik akibat penggalian di jalan, seorang teknisi perlu menyambung kembali serat-serat yang putus. Menggunakan Fusion Splicer, teknisi dapat dengan cepat dan akurat menyambungkan kembali serat optik, memastikan kehilangan sinyal minimal dan mengembalikan layanan jaringan dengan efisien. Kecepatan penyambungan alat ini sangat penting untuk meminimalkan waktu henti layanan.</p>
                    </div>
                </div>
            </section>

            <!-- Earth Resistance Tester (Pengukuran Tahanan Pentanahan) -->
            <section class="card mb-5 border-primary border-2">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h2 class="h5 mb-0 fw-bold">
                        <i class="fas fa-bolt me-2"></i>Earth Resistance Tester
                    </h2>
                    <span class="badge bg-white text-primary">Menguji Tahanan Pentanahan</span>
                </div>
                <div class="card-body">
                    <h3 class="h5 fw-bold text-primary section-sub-title">Fungsi Earth Resistance Tester</h3>
                    <p class="text-dark">Earth Resistance Tester (ERT) atau Penguji Tahanan Pentanahan digunakan untuk mengukur resistansi sistem pentanahan (grounding). Sistem pentanahan yang baik sangat krusial untuk keamanan peralatan elektronik dan personel, terutama pada infrastruktur telekomunikasi seperti menara BTS.</p>
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-check-circle text-primary me-2"></i>
                            <span><strong>Standar Keamanan:</strong> Memastikan nilai tahanan pentanahan sesuai standar (misalnya, maksimal 1 ohm untuk perangkat telekomunikasi).</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-clipboard-list text-primary me-2"></i>
                            <span><strong>Metode Pengukuran:</strong> Umumnya menggunakan metode 3-pole atau 4-pole untuk akurasi tinggi.</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-user-check text-primary me-2"></i>
                            <span><strong>Fitur Tambahan:</strong> Beberapa model memiliki fitur indikator baterai rendah, tampilan LCD besar, atau kemampuan penyimpanan data.</span>
                        </li>
                    </ul>

                    <div class="alert alert-info mt-4">
                        <i class="fas fa-info-circle fa-2x"></i>
                        <div>
                            <strong>Penting: Keselamatan Kerja</strong>
                            <p class="mb-0">Pengukuran tahanan pentanahan harus dilakukan dengan hati-hati oleh personel terlatih, mengingat potensi bahaya listrik.</p>
                        </div>
                    </div>

                    <div class="mt-4 p-3 bg-light rounded shadow-sm">
                        <h4 class="h6 fw-bold text-primary">Contoh Kasus Nyata:</h4>
                        <p class="text-dark">Salah satu menara telekomunikasi di wilayah X sedang dalam tahap pemeliharaan rutin untuk memastikan kondisi tahanan pentanahan di wilayah tersebut dalam keadaan baik. Standar yang ditetapkan untuk perangkat telekomunikasi di menara tersebut maksimal 1 ohm. Teknisi menggunakan Earth Resistance Tester untuk memastikan nilai ini terpenuhi, yang sangat penting untuk melindungi peralatan dari lonjakan tegangan dan sambaran petir.</p>
                    </div>
                </div>
            </section>

            <!-- Digital Multimeter (Pengukuran Frekuensi) -->
            <section class="card mb-5 border-danger border-2">
                <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                    <h2 class="h5 mb-0 fw-bold">
                        <i class="fas fa-tachometer-alt me-2"></i>Digital Multimeter
                    </h2>
                    <span class="badge bg-white text-danger">Pengukuran Umum Listrik</span>
                </div>
                <div class="card-body">
                    <h3 class="h5 fw-bold text-danger section-sub-title">Fungsi Digital Multimeter</h3>
                    <p class="text-dark">Digital Multimeter (DMM) adalah alat ukur elektronik yang dapat mengukur berbagai besaran listrik seperti tegangan (volt), arus (ampere), dan resistansi (ohm). Model yang lebih canggih juga dapat mengukur kapasitansi, frekuensi, suhu, dan melakukan uji dioda/kontinuitas.</p>

                    <h3 class="h5 fw-bold text-danger mt-4 section-sub-title">Pengukuran Frekuensi dengan Multimeter</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-waveform text-danger me-2"></i>
                            <span><strong>Fitur Frekuensi:</strong> Beberapa multimeter digital modern memiliki fungsi khusus untuk mengukur frekuensi (dalam Hertz, Hz).</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-clipboard-check text-danger me-2"></i>
                            <span><strong>Akurasi dan Rentang:</strong> Penting untuk memilih multimeter dengan rentang pengukuran frekuensi yang sesuai dan akurasi yang cukup untuk kebutuhan spesifik.</span>
                        </li>
                    </ul>

                    <div class="alert alert-warning mt-4">
                        <i class="fas fa-exclamation-triangle fa-2x"></i>
                        <div>
                            <strong>Perhatian: Batas Kemampuan Multimeter</strong>
                            <p class="mb-0">Tidak semua multimeter digital mampu mengukur frekuensi. Pastikan spesifikasi alat mendukung fitur ini, terutama untuk frekuensi tinggi atau sinyal non-sinusoidal.</p>
                        </div>
                    </div>

                    <div class="mt-4 p-3 bg-light rounded shadow-sm">
                        <h4 class="h6 fw-bold text-danger">Contoh Kasus Nyata:</h4>
                        <p class="text-dark">Seorang teknisi listrik sedang melakukan perbaikan pada jaringan di rumah pelanggan. Hasil analisis sementara, terjadi ketidakstabilan frekuensi saluran. Untuk mengecek frekuensi yang tidak stabil, teknisi memerlukan multimeter digital yang secara spesifik memiliki kemampuan pengukuran frekuensi. Jika multimeter yang ada tidak mendukung, rekomendasi alat dengan rentang frekuensi yang memadai menjadi penting.</p>
                    </div>
                </div>
            </section>

            <!-- Wi-Fi Survey Applications (Aplikasi Survei Wi-Fi) -->
            <section class="card mb-5 border-warning border-2">
                <div class="card-header bg-warning text-white d-flex justify-content-between align-items-center">
                    <h2 class="h5 mb-0 fw-bold">
                        <i class="fas fa-wifi me-2"></i>Aplikasi Survei Wi-Fi
                    </h2>
                    <span class="badge bg-white text-warning">Analisis Kekuatan Sinyal</span>
                </div>
                <div class="card-body">
                    <h3 class="h5 fw-bold text-warning section-sub-title">Fungsi Aplikasi Survei Wi-Fi</h3>
                    <p class="text-dark">Aplikasi survei Wi-Fi, yang sering tersedia di smartphone atau laptop, berfungsi untuk menganalisis kekuatan sinyal Wi-Fi, mengidentifikasi saluran yang padat, dan menemukan titik lemah dalam jangkauan jaringan nirkabel. Ini sangat berguna untuk optimasi jaringan dan pemecahan masalah.</p>

                    <h3 class="h5 fw-bold text-warning mt-4 section-sub-title">Fitur Penting Aplikasi Survei Wi-Fi</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-chart-area text-warning me-2"></i>
                            <span>Menampilkan kekuatan sinyal (RSSI) dari berbagai SSID.</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-chart-bar text-warning me-2"></i>
                            <span>Menganalisis penggunaan saluran Wi-Fi dan merekomendasikan saluran yang kurang padat.</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-map-marker-alt text-warning me-2"></i>
                            <span>Membuat peta panas (heatmap) kekuatan sinyal di suatu area.</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="fas fa-signal text-warning me-2"></i>
                            <span>Mengidentifikasi interferensi dan sumber masalah.</span>
                        </li>
                    </ul>

                    <div class="alert alert-info mt-4">
                        <i class="fas fa-mobile-alt fa-2x"></i>
                        <div>
                            <strong>Rekomendasi Aplikasi (Contoh):</strong>
                            <p class="mb-0">Untuk Android: Wi-Fi Analyzer, NetSpot. Untuk iOS: Airport Utility (terbatas), NetSpot. Untuk Desktop: NetSpot, inSSIDer.</p>
                        </div>
                    </div>

                    <div class="mt-4 p-3 bg-light rounded shadow-sm">
                        <h4 class="h6 fw-bold text-warning">Contoh Kasus Nyata:</h4>
                        <p class="text-dark">Pada mata pelajaran Dasar-Dasar Teknik Jaringan Komputer dan Telekomunikasi, siswa diminta untuk menyurvei kekuatan jaringan Wi-Fi di sekolah. Hasil survei akan dijadikan dasar teknisi jaringan dalam melakukan optimasi sinyal pada titik tertentu yang lemah. Aplikasi survei Wi-Fi di HP akan membantu siswa dan teknisi mengidentifikasi area dengan sinyal lemah dan saluran yang padat untuk perbaikan.</p>
                    </div>
                </div>
            </section>

            {{-- <!-- Video Pembelajaran Umum Jaringan -->
            <section class="card mb-5 border-dark border-2">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h2 class="h5 mb-0 fw-bold">
                        <i class="fas fa-video me-2"></i>Video Pembelajaran: Alat Ukur Jaringan
                    </h2>
                </div>
                <div class="card-body">
                    <h3 class="h5 fw-bold text-dark section-sub-title">Memahami Lebih Dalam Penggunaan Alat Ukur Jaringan</h3>
                    <p class="text-dark">Video ini memberikan gambaran umum tentang beberapa alat ukur penting yang digunakan dalam pemeliharaan dan troubleshooting jaringan komputer.</p>
                    <div class="video-container mt-3">
                        <div id="youtube-player-konsep-jaringan"></div>
                    </div>
                    <small class="text-muted mt-2 d-block">Sumber: (Placeholder - cari video yang relevan)</small>
                </div> --}}
            {{-- </section> --}}

            <!-- Tabel Perbandingan Alat Ukur -->
            <section class="card mb-4 border-0 shadow-sm">
                <div class="card-body">
                    <h2 class="card-title h4 fw-bold text-primary mb-3">
                        <i class="fas fa-table me-2"></i>Perbandingan Alat Ukur Jaringan Komputer
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th><strong>Alat Ukur</strong></th>
                                    <th><strong>Fungsi Utama</strong></th>
                                    <th><strong>Jenis Pengukuran</strong></th>
                                    <th><strong>Contoh Kasus</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>LAN Tester</td>
                                    <td>Menguji konektivitas kabel UTP/FTP/RJ11/Coaxial.</td>
                                    <td>Putus, short, cross, open.</td>
                                    <td>Mendeteksi kabel LAN putus di tengah.</td>
                                </tr>
                                <tr>
                                    <td>Optical Power Meter (OPM)</td>
                                    <td>Mengukur kekuatan sinyal optik pada serat.</td>
                                    <td>Daya optik (dBm), panjang gelombang.</td>
                                    <td>Mengukur daya downlink pada jaringan optik 1490 nm.</td>
                                </tr>
                                <tr>
                                    <td>Optical Time Domain Reflectometer (OTDR)</td>
                                    <td>Mendeteksi lokasi masalah pada serat optik, panjang.</td>
                                    <td>Jarak, loss, refleksi, splicing.</td>
                                    <td>Memeriksa jaringan optik 260 km tanpa mematikan koneksi.</td>
                                </tr>
                                <tr>
                                    <td>Fusion Splicer</td>
                                    <td>Menyambung serat optik dengan fusi.</td>
                                    <td>Instalasi, perbaikan, dan pemeliharaan serat optik.</td>
                                    <td>Fiber Optic (FTTH, FTTB)</td>
                                </tr>
                                <tr>
                                    <td>Earth Resistance Tester</td>
                                    <td>Mengukur tahanan pentanahan (grounding).</td>
                                    <td>Resistansi (ohm).</td>
                                    <td>Memastikan standar 1 ohm pada menara telekomunikasi.</td>
                                </tr>
                                <tr>
                                    <td>Digital Multimeter (dengan fitur frekuensi)</td>
                                    <td>Mengukur berbagai besaran listrik, termasuk frekuensi.</td>
                                    <td>Tegangan, arus, resistansi, frekuensi (Hz).</td>
                                    <td>Mengecek ketidakstabilan frekuensi saluran listrik.</td>
                                </tr>
                                <tr>
                                    <td>Aplikasi Survei Wi-Fi (HP)</td>
                                    <td>Menganalisis kekuatan sinyal dan kualitas Wi-Fi.</td>
                                    <td>Kekuatan sinyal (RSSI), penggunaan saluran.</td>
                                    <td>Menyurvei kekuatan jaringan Wi-Fi di sekolah.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Quiz Sederhana Section -->
            <section id="quiz-section" class="mb-5">
                <div class="quiz-card">
                    <h2 class="h3 mb-4 text-primary text-center">
                        <i class="fas fa-question-circle me-3"></i>Uji Pemahaman: Kuis Sederhana
                    </h2>
                    <div id="quiz-container">
                        <!-- Questions will be loaded here by JavaScript -->
                    </div>
                    
                    <button onclick="checkQuiz()" class="btn btn-primary w-100 mt-3 fw-bold">Periksa Jawaban</button>
                    <p id="quiz-feedback" class="mt-4 font-weight-bold text-center"></p>
                    <a href="{{ route('guru.materi.index') }}" id="nextMaterialBtn" class="btn btn-success w-100 mt-3 d-none fw-bold">Lanjut ke Materi Berikutnya <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
            </section>
        </main>
    </div>
</div>

<!-- Video Quiz Modal Structure -->
<div id="videoQuizModal" class="video-quiz-modal-overlay">
    <div class="video-quiz-modal-content">
        <h4 id="videoQuizQuestion"></h4>
        <div id="videoQuizOptions" class="video-quiz-modal-options mb-3">
            <!-- Options will be dynamically loaded here -->
        </div>
        <p id="videoQuizFeedback" class="video-quiz-modal-feedback"></p>
        <button id="videoQuizContinueBtn" class="btn btn-primary mt-3 d-none" onclick="continueVideo()">Lanjutkan Video</button>
    </div>
</div>


<!-- Bootstrap JS Bundle (popper included) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eP7In6jI3RxhqQ" crossorigin="anonymous"></script>
<!-- Mermaid JS -->
<script src="https://cdn.jsdelivr.net/npm/mermaid/dist/mermaid.min.js"></script>
<!-- YouTube IFrame Player API -->
<script>
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    var player; // YouTube Player object
    var videoQuizPoints = [
        // Example: at 20 seconds, a question about network cables
        {
            time: 20,
            question: "Alat apa yang umumnya digunakan untuk mendeteksi kabel LAN yang putus?",
            options: [
                "Multimeter Digital",
                "LAN Tester",
                "Optical Power Meter",
                "Wi-Fi Analyzer"
            ],
            correctAnswerIndex: 1,
            answered: false
        },
        // Example: at 45 seconds, a question about fiber optics
        {
            time: 45,
            question: "Untuk mengukur panjang dan mendeteksi kerusakan pada serat optik, alat apa yang paling tepat digunakan?",
            options: [
                "LAN Tester",
                "Digital Multimeter",
                "Optical Time Domain Reflectometer (OTDR)",
                "Earth Resistance Tester"
            ],
            correctAnswerIndex: 2,
            answered: false
        }
        // Add more quiz points as needed for the video
    ];
    var currentVideoQuizQuestion = null;
    var quizInterval;

    function onYouTubeIframeAPIReady() {
        player = new YT.Player('youtube-player-konsep-jaringan', {
            height: '315', // Bootstrap's responsive iframe usually handles width
            width: '100%',
            videoId: 'mYV9wB0m_F8', // Ganti dengan ID video YouTube yang relevan tentang alat ukur jaringan, contoh: "Jenis Jenis Alat Ukur Jaringan Komputer". Jika tidak ada yang cocok, gunakan placeholder atau hapus.
            playerVars: {
                'playsinline': 1,
                'autoplay': 0, // No autoplay initially
                'controls': 1,
                'rel': 0, // Do not show related videos
                'showinfo': 0, // Hide video title and uploader info
                'modestbranding': 1 // No YouTube logo in the control bar
            },
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    function onPlayerReady(event) {
        // Player is ready
    }

    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING) {
            // Start checking current time when video is playing
            quizInterval = setInterval(checkVideoTime, 1000); // Check every second
        } else {
            // Stop checking when video is paused, ended, etc.
            clearInterval(quizInterval);
        }
    }

    function checkVideoTime() {
        if (player && player.getCurrentTime) {
            var currentTime = player.getCurrentTime();
            for (let i = 0; i < videoQuizPoints.length; i++) {
                const quizPoint = videoQuizPoints[i];
                if (!quizPoint.answered && currentTime >= quizPoint.time && currentTime < quizPoint.time + 1) { // Trigger within a 1-second window
                    player.pauseVideo();
                    showVideoQuiz(quizPoint, i);
                    quizPoint.answered = true; // Mark as answered to prevent re-triggering
                    clearInterval(quizInterval); // Stop checking time until quiz is answered
                    break;
                }
            }
        }
    }

    function showVideoQuiz(quizData, index) {
        currentVideoQuizQuestion = { data: quizData, index: index };
        const modal = document.getElementById('videoQuizModal');
        const questionElement = document.getElementById('videoQuizQuestion');
        const optionsElement = document.getElementById('videoQuizOptions');
        const feedbackElement = document.getElementById('videoQuizFeedback');
        const continueBtn = document.getElementById('videoQuizContinueBtn');

        questionElement.textContent = quizData.question;
        optionsElement.innerHTML = ''; // Clear previous options
        feedbackElement.textContent = ''; // Clear previous feedback
        continueBtn.classList.add('d-none'); // Hide continue button initially

        quizData.options.forEach((optionText, idx) => {
            const optionDiv = document.createElement('div');
            optionDiv.classList.add('quiz-option');
            optionDiv.setAttribute('data-index', idx);
            optionDiv.innerHTML = `<label class="w-100 cursor-pointer">${String.fromCharCode(97 + idx)}. ${optionText}</label>`; // 'a.', 'b.', etc.
            optionDiv.onclick = () => selectVideoQuizOption(optionDiv, idx);
            optionsElement.appendChild(optionDiv);
        });

        modal.classList.add('show');
    }

    function selectVideoQuizOption(selectedOptionDiv, selectedIndex) {
        const optionsContainer = selectedOptionDiv.closest('.video-quiz-modal-options');
        optionsContainer.querySelectorAll('.quiz-option').forEach(opt => {
            opt.classList.remove('selected', 'correct-answer', 'incorrect');
        });

        selectedOptionDiv.classList.add('selected');

        // Immediately check answer
        const quizData = currentVideoQuizQuestion.data;
        const feedbackElement = document.getElementById('videoQuizFeedback');
        const continueBtn = document.getElementById('videoQuizContinueBtn');

        if (selectedIndex === quizData.correctAnswerIndex) {
            selectedOptionDiv.classList.add('correct-answer');
            feedbackElement.textContent = "Jawaban Benar!";
            feedbackElement.classList.remove('text-danger');
            feedbackElement.classList.add('text-success');
            continueBtn.classList.remove('d-none'); // Show continue button
        } else {
            selectedOptionDiv.classList.add('incorrect');
            // Highlight correct answer
            optionsContainer.querySelector(`.quiz-option[data-index="${quizData.correctAnswerIndex}"]`).classList.add('correct-answer');
            feedbackElement.textContent = "Jawaban Salah. Jawaban yang benar sudah ditandai.";
            feedbackElement.classList.remove('text-success');
            feedbackElement.classList.add('text-danger');
            continueBtn.classList.remove('d-none'); // Still show continue button to proceed
        }

        // Disable further clicks on options after answering
        optionsContainer.querySelectorAll('.quiz-option').forEach(opt => {
            opt.onclick = null;
            opt.style.cursor = 'default';
        });
    }

    function continueVideo() {
        const modal = document.getElementById('videoQuizModal');
        modal.classList.remove('show');
        if (player && player.playVideo) {
            player.playVideo();
            // Restart the time checking interval
            quizInterval = setInterval(checkVideoTime, 1000);
        }
    }


    // Initialize Mermaid
    mermaid.initialize({ startOnLoad: true });

    // Function to scroll to a specific section
    function scrollToSection(id) {
        const element = document.getElementById(id);
        if (element) {
            element.scrollIntoView({ behavior: 'smooth' });
        }
    }

    // Quiz Questions (for the main page quiz)
    const quizData = [
        {
            question: "Untuk pengukuran saluran optik aktif arah downlink pada panjang gelombang 1.490 nm, alat apa yang digunakan?",
            options: ["LAN Tester", "Optical Power Meter (OPM)", "OTDR", "Digital Multimeter"],
            answer: "Optical Power Meter (OPM)"
        },
        {
            question: "Alat yang tepat untuk mengukur jaringan optik sepanjang 260 km tanpa mematikan koneksi adalah?",
            options: ["OPM", "LAN Tester", "Optical Time Domain Reflectometer (OTDR)", "Wi-Fi Analyzer"],
            answer: "Optical Time Domain Reflectometer (OTDR)"
        },
        {
            question: "Untuk mendeteksi letak kabel LAN yang putus meskipun fisik kabel normal, rekomendasi alatnya adalah?",
            options: ["Multimeter Digital", "LAN Tester (dengan fitur deteksi putus)", "Earth Resistance Tester", "OPM"],
            answer: "LAN Tester (dengan fitur deteksi putus)"
        },
        {
            question: "Alat ukur yang direkomendasikan untuk membimbing teknisi baru dalam mengukur tahanan pentanahan di menara telekomunikasi (standar maks 1 ohm) adalah?",
            options: ["Digital Multimeter", "LAN Tester", "Earth Resistance Tester", "OTDR"],
            answer: "Earth Resistance Tester"
        },
        {
            question: "Alat yang digunakan untuk menyambung dua ujung serat optik dengan melelehkannya menggunakan busur listrik adalah...",
            options: ["LAN Tester", "Fusion Splicer", "Optical Power Meter", "Digital Multimeter"],
            answer: "Fusion Splicer"
        },
        {
            question: "Aplikasi terbaik yang dapat mendukung survei kekuatan jaringan Wi-Fi di sekolah untuk optimasi sinyal adalah?",
            options: ["Aplikasi editor teks", "Aplikasi survei Wi-Fi di HP", "Aplikasi pemutar musik", "Aplikasi pengelola file"],
            answer: "Aplikasi survei Wi-Fi di HP"
        }
    ];

    let currentQuestionIndex = 0; // For dynamic quiz generation
    const REQUIRED_SCORE = 80;

    function loadQuestion() {
        const quizContainer = document.getElementById('quiz-container');
        quizContainer.innerHTML = ''; // Clear previous questions
        quizData.forEach((q, qIndex) => {
            const questionBlock = document.createElement('div');
            questionBlock.classList.add('question-block', 'mb-4');
            questionBlock.innerHTML = `
                <p class="mb-3"><strong>${qIndex + 1}. ${q.question}</strong></p>
                <div class="options-group">
                    ${q.options.map((option, optIndex) => `
                        <div class="quiz-option" data-question="q${qIndex + 1}" data-choice="${String.fromCharCode(97 + optIndex)}">
                            <label class="w-100 cursor-pointer">${String.fromCharCode(97 + optIndex)}. ${option}</label>
                        </div>
                    `).join('')}
                </div>
            `;
            quizContainer.appendChild(questionBlock);
        });

        // Attach event listeners after loading questions
        document.querySelectorAll('.quiz-option').forEach(optionDiv => {
            optionDiv.addEventListener('click', function() {
                const questionBlock = this.closest('.question-block');
                questionBlock.querySelectorAll('.quiz-option').forEach(div => div.classList.remove('selected'));
                this.classList.add('selected');
            });
        });
    }

    function resetQuizUI() {
        document.querySelectorAll('.quiz-option').forEach(option => {
            option.classList.remove('selected', 'correct-answer', 'incorrect');
            option.style.pointerEvents = 'auto'; // Re-enable clicks
            option.style.cursor = 'pointer';
        });
        document.getElementById('quiz-feedback').textContent = "";
        document.getElementById('nextMaterialBtn').classList.add('d-none'); // Hide button
        document.getElementById('nextMaterialBtn').disabled = true; // Disable button
    }

    function checkQuiz() {
        let score = 0;
        const totalQuestions = quizData.length;
        const feedback = document.getElementById('quiz-feedback');
        const nextMaterialBtn = document.getElementById('nextMaterialBtn');

        let allAnswered = true;

        quizData.forEach((q, qIndex) => {
            const selectedOption = document.querySelector(`.quiz-option[data-question="q${qIndex + 1}"].selected`);
            
            if (!selectedOption) {
                allAnswered = false;
                return; // Skip this question, as it's not answered
            }

            const selectedChoiceChar = selectedOption.dataset.choice; // e.g., 'a', 'b'
            const selectedOptionText = q.options[selectedChoiceChar.charCodeAt(0) - 97]; // Convert 'a' to index 0, 'b' to 1, etc.

            if (selectedOptionText === q.answer) {
                score += 1;
                selectedOption.classList.add('correct-answer');
            } else {
                selectedOption.classList.add('incorrect');
                // Find and highlight the correct answer
                const correctAnswerIndex = q.options.indexOf(q.answer);
                document.querySelector(`.quiz-option[data-question="q${qIndex + 1}"][data-choice="${String.fromCharCode(97 + correctAnswerIndex)}"]`).classList.add('correct-answer');
            }
            // Disable clicks on options for this question after checking
            selectedOption.closest('.question-block').querySelectorAll('.quiz-option').forEach(opt => {
                opt.style.pointerEvents = 'none';
                opt.style.cursor = 'default';
            });
        });

        if (!allAnswered) {
            feedback.textContent = "Mohon jawab semua pertanyaan sebelum memeriksa.";
            feedback.className = "mt-4 fw-bold text-warning";
            nextMaterialBtn.classList.add('d-none'); // Hide button
            nextMaterialBtn.disabled = true;
            return;
        }

        const percentage = (score / totalQuestions) * 100;
        feedback.innerHTML = `Skor Anda: ${score} dari ${totalQuestions} (${percentage.toFixed(0)}%).<br>`;

        if (percentage >= REQUIRED_SCORE) { // Passing score
            feedback.innerHTML += `Selamat! Anda berhasil memahami materi ini dengan baik!`;
            feedback.className = "mt-4 fw-bold text-success";
            nextMaterialBtn.classList.remove('d-none'); // Show button
            nextMaterialBtn.disabled = false;
            localStorage.setItem('material_2_score', percentage.toFixed(0)); // Store the score
        } else {
            feedback.innerHTML += `Terus semangat belajar! Anda perlu mencapai setidaknya ${REQUIRED_SCORE}% untuk melanjutkan.`;
            feedback.className = "mt-4 fw-bold text-danger";
            nextMaterialBtn.classList.add('d-none'); // Hide button
            nextMaterialBtn.disabled = true;
            localStorage.setItem('material_2_score', percentage.toFixed(0)); // Store score, even if failed
            
            // Reset quiz for retake after a short delay
            setTimeout(() => {
                resetQuizUI();
                loadQuestion(); // Reload questions to clear selections
            }, 3000); // Reset after 3 seconds so user can see results briefly
        }
    }

    // Show a custom alert message (success, warning, danger, or info)
    function showAlert(message, type = 'success') {
        const alertContainer = document.querySelector('.container'); 
        let alertDiv = document.getElementById('page-alert-notification');

        if (!alertDiv) {
            alertDiv = document.createElement('div');
            alertDiv.id = 'page-alert-notification';
            alertDiv.classList.add('alert', 'position-fixed', 'fade', 'show'); 
            alertDiv.style.top = '20px';
            alertDiv.style.right = '20px';
            alertDiv.style.zIndex = '1050';
            alertDiv.style.minWidth = '300px';
            alertDiv.style.display = 'flex';
            alertDiv.style.alignItems = 'center';
            alertDiv.innerHTML = `<i class="me-2"></i><span id="page-alert-message"></span><button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>`;
            document.body.appendChild(alertDiv); 
        }

        alertDiv.classList.remove('alert-success', 'alert-warning', 'alert-danger', 'alert-info');
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
        
        alertDiv.style.display = 'flex'; 
        alertDiv.classList.add('show'); 

        setTimeout(() => {
            alertDiv.classList.remove('show');
            alertDiv.classList.add('fade');
            setTimeout(() => {
                alertDiv.style.display = 'none';
            }, 150); 
        }, 4000);
    }

    // Scroll reveal animations
    document.addEventListener('DOMContentLoaded', function() {
        const sections = document.querySelectorAll('main section.card'); 

        const observerOptions = {
            root: null, 
            rootMargin: '0px',
            threshold: 0.1 
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    entry.target.style.transition = 'opacity 0.8s ease-out, transform 0.8s ease-out';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        sections.forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(30px)';
            observer.observe(section);
        });

        // Specific animations for header elements that should not wait for scroll
        const headerContentElements = document.querySelectorAll('header h1, header p, header .badge, header .btn-neon');
        headerContentElements.forEach((el, index) => {
            setTimeout(() => {
                el.classList.add('header-content-visible');
            }, index * 100 + 500); // Staggered delay, starting after 0.5s
        });
        
        // Header title words animation
        const titleWords = document.querySelectorAll('.title-word');
        titleWords.forEach((word, index) => {
            word.style.opacity = '1'; 
        });

        // On page load, check if quiz was already passed and show "next material" button
        const savedScore = parseInt(localStorage.getItem('material_2_score')) || 0;
        const nextMaterialBtn = document.getElementById('nextMaterialBtn');
        if (savedScore >= REQUIRED_SCORE) {
            nextMaterialBtn.classList.remove('d-none');
        } else {
            nextMaterialBtn.classList.add('d-none');
        }

        // Initial load of main quiz questions
        loadQuestion();
    });
</script>
</body>
</html>
@endsection
