{{-- resources/views/siswa/materi/alat_ukur_jaringan_komputer.blade.php --}}

@extends('siswa.siswa_master')

@section('siswa')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemeliharaan Alat Ukur Jaringan Komputer</title>
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" xintegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWtIXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #000000ec; /* Dark purple background */
            color: #ebe0e7; /* Light grey text */
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
            background: radial-gradient(ellipse at center, #0b0b0c 0%, #000000 100%); /* Dark purple gradient */
            border-bottom: 1px solid rgb(0, 230, 230); /* Teal accent */
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
                linear-gradient(rgba(0, 230, 230, 0.05) 1px, transparent 1px), /* Teal accent */
                linear-gradient(90deg, rgba(0, 230, 230, 0.05) 1px, transparent 1px); /* Teal accent */
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
        }
        .title-word {
            display: inline-block;
            margin: 5px 5px;            /* perbaikan penulisan margin */
            font-size: 3.5rem;          /* ukuran besar untuk judul */
            animation: titleWord 4s infinite ease-in-out;
            transform-origin: bottom;   /* untuk efek bounce */
            text-shadow: 2px 2px 4px rgba(0, 255, 234, 0.548); /* bayangan hitam */
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
            font-size: 1.35rem;
            max-width: 700px;
            margin: 0 auto;
            position: relative;
            opacity: 0; /* Start hidden */
            animation: fade-in-up 1s ease-out 1s forwards;
        }
        .text-gradient {
            background: linear-gradient(90deg, #7df1da, #fcfcfc); /* Teal gradient */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
            font-weight: 500;
        }

        .btn-neon {
            background: linear-gradient(45deg, rgba(4, 4, 5, 0.966), rgba(0, 179, 179, 0.2)); /* Teal gradient */
            color: #00e6e6; /* Teal color */
            border: 1px solid #ffffff; /* Teal border */
            box-shadow: 0 0 15px rgba(0, 230, 230, 0.6); /* Teal glow */
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
            background: linear-gradient(45deg, rgba(0, 230, 230, 0.4), rgba(0, 179, 179, 0.4)); /* Teal gradient */
            box-shadow: 0 0 25px rgba(0, 230, 230, 0.9), 0 0 40px rgba(0, 179, 179, 0.5); /* Teal glow */
            transform: translateY(-3px) scale(1.02);
            color: #ffffff; /* White text on hover */
        }
        
        .btn-outline-neon {
            color: #00d9ff; /* Magenta accent */
            border: 1px solid #ffffff; /* Magenta border */
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
            background: rgba(241, 237, 237, 0.096); /* Magenta background */
            box-shadow: 0 0 15px rgb(241, 238, 241); /* Magenta glow */
            transform: translateY(-3px) scale(1.02);
            color: #fff; /* White text on hover */
        }
        
        .tags-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 40px;
        }
        .tag-bubble {
            padding: 8px 20px;
            background: rgb(0, 0, 0); /* Magenta background */
            color: #ffffff; /* Magenta color */
            border-radius: 50px;
            border: 1px solid rgba(7, 233, 233, 0.3); /* Magenta border */
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

        /* --- Main Content Section Styles --- */
        .breadcrumb {
            opacity: 0; /* Start hidden for animation */
            animation: fade-in-down 0.8s ease-out 0.2s forwards;
        }
        
        .section-title {
            font-size: 2.5rem; /* Larger section titles */
            font-weight: 700;
            color: #00e6e6; /* Teal for titles */
            margin-bottom: 2.5rem;
            text-align: center;
            position: relative;
            padding-bottom: 0.75rem;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Teal shadow */
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
            background-color: #00e6e6; /* Teal for underline */
            border-radius: 3px;
            box-shadow: 0 0 10px #71b8c2; /* Teal shadow */
        }

        .card {
            background: rgba(22, 22, 22, 0.76); /* Slightly lighter dark purple for cards */
            border: 1px solid rgba(0, 230, 199, 0.534); /* Teal accent */
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.445);
            margin-bottom: 2rem; /* Consistent spacing */
        }
        .card:hover {
            transform: translateY(-5px) scale(1.01);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6), 0 0 20px rgba(0, 230, 230, 0.4); /* Teal accent */
        }

        .card-header {
            background: rgba(2, 155, 142, 0.137); /* Lighter header for cards with teal accent */
            border-bottom: 1px solid rgb(255, 255, 255); /* Teal accent */
            color: #00e6e6; /* Teal color */
            font-weight: 600;
            padding: 1.2rem 1.5rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
        .card-header h2, .card-header .fas {
            color: #00e6e6 !important; /* Teal color */
            text-shadow: 0 0 5px rgba(0, 0, 0, 0.582); /* Teal shadow */
        }
        .card-header .badge {
            background-color: rgba(22, 19, 22, 0.2) !important; /* Magenta accent */
            color: #b9b5b5 !important; /* Magenta accent */
            border: 1px solid rgba(245, 241, 245, 0.4); /* Magenta border */
            font-weight: 500;
            padding: 0.5em 1em;
            border-radius: 0.5rem;
        }

        .card-body {
            color: #ffffff;
            padding: 1.5rem;
        }
        .card-body h5, .card-body h6 {
            color: #00e6e6; /* Teal color */
            text-shadow: 0 0 3px rgba(0, 230, 230, 0.2); /* Teal shadow */
        }
        .card-body p, .card-body ul, .card-body ol, .card-body li, .card-body span {
            /* Initial opacity for reveal-item-child elements. Will be dynamically managed by JS */
        }
        .card-body .fas {
            color: #00e6e6; /* Teal color */
        }

        .alert-info {
            background-color: rgba(0, 179, 179, 0.1); /* Teal accent */
            border-color: rgba(0, 179, 179, 0.3); /* Teal accent */
            color: #00b3b3; /* Teal color */
        }
        .alert-warning {
            background-color: rgba(255, 253, 255, 0.1); /* Magenta accent */
            border-color: rgb(230, 0, 230); /* Magenta accent */
            color: #e600ad; /* Magenta color */
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
            background: rgba(26, 10, 42, 0.8); /* Adjusted background */
            border: 1px solid rgba(0, 230, 230, 0.2); /* Teal accent */
            border-radius: 1rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
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
            color: rgba(0, 230, 230, 0.03); /* Teal accent */
            line-height: 1.2;
            pointer-events: none;
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
            background: rgba(36, 35, 35, 0.8); /* Adjusted background */
            border: 1px solid rgba(0, 230, 230, 0.74); /* Teal accent */
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            margin-bottom: 2rem;
            padding: 2rem;
            color: #ffffff;
        }

        .quiz-option {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(0, 230, 230, 0.1); /* Teal accent */
            border-radius: 0.75rem;
            padding: 1rem;
            margin-bottom: 0.75rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .quiz-option:hover {
            background: rgba(0, 230, 230, 0.08); /* Teal accent */
            border-color: rgba(0, 230, 230, 0.3); /* Teal accent */
        }

        .quiz-option.selected {
            background: rgba(0, 179, 179, 0.2); /* Teal accent */
            border-color: #00e6e6; /* Teal color */
            font-weight: bold;
        }

        .quiz-option.correct-answer {
            background: rgba(40, 167, 69, 0.2); /* Green */
            border-color: #28a745;
            font-weight: bold;
        }

        .quiz-option.incorrect {
            background: rgba(216, 49, 66, 0.2); /* Red */
            border-color: #dc3545;
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
            color: #28a745 !important;
        }
        #quiz-feedback.text-danger {
            color: #dc3545 !important;
        }
        #quiz-feedback.text-warning {
            color: #e600e6 !important; /* Magenta accent for warning */
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
                <li class="breadcrumb-item active text-white" aria-current="page">Pemeliharaan Alat Ukur Jaringan Komputer</li>
            </ol>
        </nav>

        <!-- Hero Section -->
        <section class="hero-section position-relative overflow-hidden mb-5">
            <!-- Canvas for dynamic background animation -->
            <canvas id="heroCanvas"></canvas>

            <div class="container position-relative z-2 h-100 d-flex align-items-center">
                <div class="row w-100 align-items-center">
                    <div class="col-lg-8 mx-auto text-center py-5">
                        <!-- Animated title -->
                        <h1 class="display-3 fw-bold mb-4 text-white" style="text-shadow: 0 0 10px rgba(0, 230, 230, 0.5);">
                            <span class="title-word">Pemeliharaan</span>
                            <span class="title-word">Alat</span>
                            <span class="title-word">Ukur</span>
                            <span class="title-word">Jaringan</span>
                        </h1>

                        <!-- Glowing description -->
                        <p class="lead mb-5 text-white-75">
                            <span class="text-gradient">Pastikan alat ukur Anda selalu dalam kondisi prima. Pelajari teknik perawatan, diagnosa, dan optimalisasi untuk kinerja terbaik.</span>
                        </p>

                        <!-- Interactive buttons -->
                        <div class="d-flex flex-wrap justify-content-center gap-3 mb-5">
                            <a href="#pengantar-pemeliharaan" class="btn btn-neon btn-lg px-4 fw-bold">
                                <i class="fas fa-screwdriver-wrench me-2"></i>Mulai Pelajari Pemeliharaan
                            </a>
                            <a href="#praktikum-section" class="btn btn-outline-neon btn-lg px-4 fw-bold">
                                <i class="fas fa-flask me-2"></i>Aktivitas Praktikum
                            </a>
                        </div>

                        <!-- Animated tags -->
                        <div class="tags-container">
                            <div class="tag-bubble">Preventif</div>
                            <div class="tag-bubble">Korektif</div>
                            <div class="tag-bubble">Kalibrasi</div>
                            <div class="tag-bubble">Diagnosa</div>
                            <div class="tag-bubble">Optimalisasi</div>
                            <div class="tag-bubble">Prosedur</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <main>
            <!-- Pengantar Pemeliharaan Alat Ukur Section -->
            <section id="pengantar-pemeliharaan" class="py-5 position-relative">
                <div class="binary-animation-bg" id="binary-bg-1"></div>
                <h2 class="section-title reveal-item hidden-initial">Pengantar Pemeliharaan Alat Ukur</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4 reveal-item hidden-initial">
                            <div class="card-header">
                                <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-info-circle me-2"></i>Pentingnya Pemeliharaan Alat Ukur</h2>
                            </div>
                            <div class="card-body">
                                <p class="reveal-item-child hidden-initial">Alat ukur yang kalian gunakan untuk praktikum di sekolah tentunya membutuhkan perawatan agar tetap awet dan selalu siap digunakan ketika dibutuhkan. Pada kenyataan di lapangan atau dunia kerja pun seperti itu, perawatan terhadap alat ukur dan alat lainnya wajib dilakukan. Peralatan yang selalu siap digunakan akan menjaga produktivitas dalam sebuah pekerjaan.</p>
                                <p class="reveal-item-child hidden-initial">Pemeliharaan merupakan sebuah kegiatan yang diperlukan untuk mempertahankan dan mengembalikan alat kerja ke suatu kondisi yang terbaik.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-4 reveal-item hidden-initial">
                            <div class="card-header">
                                <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-tools me-2"></i>Jenis-Jenis Pemeliharaan</h2>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li class="reveal-item-child hidden-initial"><strong>Preventif:</strong> Kegiatan pemeliharaan yang dilakukan sebelum terjadi kerusakan, biasanya secara berkala (mingguan, bulanan, tahunan).</li>
                                    <li class="reveal-item-child hidden-initial"><strong>Korektif:</strong> Kegiatan pemeliharaan yang dilakukan setelah muncul gangguan atau kerusakan pada alat ukur. Apabila terjadi kerusakan, sebaiknya segera lakukan perbaikan.</li>
                                    <li class="reveal-item-child hidden-initial"><strong>Kualitatif:</strong> Perawatan yang dilakukan dengan tujuan meningkatkan kualitas hasil pekerjaan, contohnya update/upgrade perangkat lunak pada alat ukur (misal OTDR) menggunakan versi terbaru, atau mengganti alat ukur dengan fasilitas lebih lengkap.</li>
                                </ul>
                                <p class="reveal-item-child hidden-initial">Cara melakukan perawatan adalah dengan memperhatikan prosedur manufaktur atau prosedur operasi kerja pada buku manual alat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-4 reveal-item hidden-initial">
                            <div class="card-header">
                                <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-warehouse me-2"></i>Penyimpanan & Penggunaan</h2>
                            </div>
                            <div class="card-body">
                                <p class="reveal-item-child hidden-initial">Penyimpanan peralatan pada tempat yang tepat akan membantu memperpanjang usia alat ukur. Pastikan:</p>
                                <ul>
                                    <li class="reveal-item-child hidden-initial">Sakelar pemilih dimatikan sebelum penyimpanan.</li>
                                    <li class="reveal-item-child hidden-initial">Hindari suhu ekstrem (terlalu panas/dingin), kelembapan tinggi.</li>
                                    <li class="reveal-item-child hidden-initial">Hindari tempat dengan medan magnet atau listrik statis berlebihan.</li>
                                    <li class="reveal-item-child hidden-initial">Hindari getaran yang terlalu banyak dan terus-menerus.</li>
                                </ul>
                                <p class="reveal-item-child hidden-initial">Pemeriksaan kondisi alat ukur perlu dilakukan sebelum digunakan untuk memastikan alat tersebut dapat bekerja dengan baik.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Keterampilan dan Sikap Kerja Section -->
            <section id="keterampilan-sikap-kerja" class="py-5 bg-dark position-relative">
                <div class="binary-animation-bg" id="binary-bg-firewall"></div>
                <div class="container">
                    <h2 class="section-title reveal-item hidden-initial">Keterampilan dan Sikap Kerja dalam Pemeliharaan</h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card mb-4 reveal-item hidden-initial">
                                <div class="card-header">
                                    <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-brain me-2"></i>Keterampilan yang Dibutuhkan</h2>
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <li class="reveal-item-child hidden-initial">Melakukan tugas-tugas rutin berdasarkan prosedur yang ditetapkan.</li>
                                        <li class="reveal-item-child hidden-initial">Melakukan tugas-tugas yang lebih luas dan kompleks dengan cara meningkatkan kemampuan dalam bekerja mandiri tanpa arahan dari atasan.</li>
                                        <li class="reveal-item-child hidden-initial">Melakukan pekerjaan yang kompleks dan tidak rutin, yang diatur sendiri, serta bertanggung jawab atas pekerjaan orang lain.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card mb-4 reveal-item hidden-initial">
                                <div class="card-header">
                                    <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-user-shield me-2"></i>Sikap Kerja yang Harus Diperhatikan</h2>
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <li class="reveal-item-child hidden-initial">Selalu cermat ketika menggunakan alat ukur, terutama saat menggunakan besaran listrik.</li>
                                        <li class="reveal-item-child hidden-initial">Memastikan kabel atau probe dalam kondisi baik, tidak terkelupas.</li>
                                        <li class="reveal-item-child hidden-initial">Memastikan kalibrasi alat sudah dilakukan dengan benar.</li>
                                        <li class="reveal-item-child hidden-initial">Memperhatikan keamanan kerja, baik bagi peralatan maupun bagi penggunanya.</li>
                                        <li class="reveal-item-child hidden-initial">Menggunakan catuan yang sesuai dengan ketentuan pada alat ukur.</li>
                                        <li class="reveal-item-child hidden-initial">Melakukan update perangkat lunak alat ukur agar dapat digunakan dengan maksimal.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Praktikum Section -->
            <section id="praktikum-section" class="py-5 position-relative">
                <div class="binary-animation-bg" id="binary-bg-backup"></div>
                <h2 class="section-title reveal-item hidden-initial">Aktivitas Praktikum Pemeliharaan Alat Ukur</h2>
                <div class="row">
                    <!-- Praktikum 1: Pengukuran Konektivitas Kabel LAN -->
                    <div class="col-lg-6">
                        <div class="card mb-4 reveal-item hidden-initial">
                            <div class="card-header">
                                <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-ethernet me-2"></i>1. Pengukuran Konektivitas Kabel LAN</h2>
                            </div>
                            <div class="card-body">
                                <p class="reveal-item-child hidden-initial"><strong>Tujuan:</strong> Peserta didik dapat melakukan pengukuran menggunakan LAN tester dan membuat kesimpulan terkait dengan kondisi kabel atau jaringan komputer yang diukur.</p>
                                <h6 class="reveal-item-child hidden-initial mt-3">Alat dan Bahan:</h6>
                                <ul class="reveal-item-child hidden-initial">
                                    <li>LAN tester</li>
                                    <li>Kabel LAN straight & cross</li>
                                    <li>Lembar kerja, alat tulis</li>
                                </ul>
                                <h6 class="reveal-item-child hidden-initial mt-3">Langkah Kerja (Singkat):</h6>
                                <ol class="reveal-item-child hidden-initial">
                                    <li>Persiapkan alat dan bahan.</li>
                                    <li>Siapkan kabel LAN (straight dan cross).</li>
                                    <li>Perhatikan keselamatan kerja.</li>
                                    <li>Lakukan uji konektivitas menggunakan LAN tester.</li>
                                    <li>Tuliskan hasil pengukuran.</li>
                                </ol>
                                <div class="text-center video-wrapper mt-3 reveal-item-child hidden-initial">
                                    <iframe src="https://www.youtube.com/embed/2x0Z1OwT0_4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                                <p class="text-center text-muted reveal-item-child hidden-initial"><small>Video: Panduan praktik pengukuran menggunakan LAN tester</small></p>
                            </div>
                        </div>
                    </div>
                    <!-- Praktikum 2: Pengukuran Menggunakan Multimeter -->
                    <div class="col-lg-6">
                        <div class="card mb-4 reveal-item hidden-initial">
                            <div class="card-header">
                                <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-lightbulb me-2"></i>2. Pengukuran Menggunakan Multimeter</h2>
                            </div>
                            <div class="card-body">
                                <p class="reveal-item-child hidden-initial"><strong>Tujuan:</strong> Peserta didik dapat melakukan pengukuran tegangan DC, arus DC, dan resistansi menggunakan multimeter.</p>
                                <h6 class="reveal-item-child hidden-initial mt-3">Alat dan Bahan:</h6>
                                <ul class="reveal-item-child hidden-initial">
                                    <li>Multimeter analog/digital</li>
                                    <li>Sumber tegangan/arus DC, Resistor</li>
                                    <li>Lembar kerja, alat tulis</li>
                                </ul>
                                <h6 class="reveal-item-child hidden-initial mt-3">Langkah Kerja (Singkat):</h6>
                                <ol class="reveal-item-child hidden-initial">
                                    <li>Persiapkan alat dan bahan.</li>
                                    <li>Perhatikan keselamatan kerja.</li>
                                    <li>Lakukan pengukuran sesuai prosedur.</li>
                                    <li>Tuliskan hasil pengukuran.</li>
                                </ol>
                                <div class="text-center video-wrapper mt-3 reveal-item-child hidden-initial">
                                    <iframe src="https://youtube.com/embed/ivKWwuOeVcE?si=AZat-UQRCshcyDO_" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                                <p class="text-center text-muted reveal-item-child hidden-initial"><small>Video: Panduan praktik pengukuran menggunakan multimeter</small></p>
                            </div>
                        </div>
                    </div>
                    <!-- Praktikum 3: Pengukuran Grounding Menggunakan Earth Tester -->
                    <div class="col-lg-6">
                        <div class="card mb-4 reveal-item hidden-initial">
                            <div class="card-header">
                                <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-globe-americas me-2"></i>3. Pengukuran Grounding Menggunakan Earth Tester</h2>
                            </div>
                            <div class="card-body">
                                <p class="reveal-item-child hidden-initial"><strong>Tujuan:</strong> Peserta didik dapat melakukan pengukuran grounding pada instalasi listrik gedung atau perangkat telekomunikasi.</p>
                                <h6 class="reveal-item-child hidden-initial mt-3">Alat dan Bahan:</h6>
                                <ul class="reveal-item-child hidden-initial">
                                    <li>Earth tester analog/digital</li>
                                    <li>Instalasi grounding, Palu</li>
                                    <li>Lembar kerja, alat tulis</li>
                                </ul>
                                <h6 class="reveal-item-child hidden-initial mt-3">Langkah Kerja (Singkat):</h6>
                                <ol class="reveal-item-child hidden-initial">
                                    <li>Tentukan lokasi grounding.</li>
                                    <li>Persiapkan alat dan bahan.</li>
                                    <li>Perhatikan keselamatan kerja.</li>
                                    <li>Lakukan pengukuran sesuai prosedur.</li>
                                    <li>Tuliskan hasil pengukuran.</li>
                                </ol>
                                <div class="text-center video-wrapper mt-3 reveal-item-child hidden-initial">
                                    <iframe src="https://www.youtube.com/embed/kq0Wfh-PSkA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                                <p class="text-center text-muted reveal-item-child hidden-initial"><small>Video: Panduan praktik pengukuran menggunakan earth tester</small></p>
                            </div>
                        </div>
                    </div>
                    <!-- Praktikum 4: Pengukuran Level Daya Optik Menggunakan OPM -->
                    <div class="col-lg-6">
                        <div class="card mb-4 reveal-item hidden-initial">
                            <div class="card-header">
                                <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-wave-square me-2"></i>4. Pengukuran Level Daya Optik Menggunakan OPM</h2>
                            </div>
                            <div class="card-body">
                                <p class="reveal-item-child hidden-initial"><strong>Tujuan:</strong> Peserta didik dapat melakukan pengukuran level daya pada sebuah saluran optik, baik saluran online maupun offline.</p>
                                <h6 class="reveal-item-child hidden-initial mt-3">Alat dan Bahan:</h6>
                                <ul class="reveal-item-child hidden-initial">
                                    <li>Optical Power Meter (OPM), Optical Light Source (OLS)</li>
                                    <li>Patch cord, One click cleaner, Kacamata safety</li>
                                    <li>Kabel optik, Adapter, Lembar kerja, alat tulis</li>
                                </ul>
                                <h6 class="reveal-item-child hidden-initial mt-3">Langkah Kerja (Singkat):</h6>
                                <ol class="reveal-item-child hidden-initial">
                                    <li>Persiapkan alat dan bahan.</li>
                                    <li>Perhatikan keselamatan kerja.</li>
                                    <li>Lakukan pengukuran (metode online/offline).</li>
                                    <li>Catat hasilnya.</li>
                                </ol>
                                <div class="text-center video-wrapper mt-3 reveal-item-child hidden-initial">
                                    <iframe src="https://www.youtube.com/embed/yHgYNlFOboc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                                <p class="text-center text-muted reveal-item-child hidden-initial"><small>Video: Panduan praktik pengukuran menggunakan OPM</small></p>
                            </div>
                        </div>
                    </div>
                    <!-- Praktikum 5: Pengukuran Menggunakan Optical Time Domain Reflectometer (OTDR) -->
                    <div class="col-lg-6">
                        <div class="card mb-4 reveal-item hidden-initial">
                            <div class="card-header">
                                <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-chart-area me-2"></i>5. Pengukuran Menggunakan OTDR</h2>
                            </div>
                            <div class="card-body">
                                <p class="reveal-item-child hidden-initial"><strong>Tujuan:</strong> Peserta didik dapat melakukan pengukuran jarak gangguan menggunakan Optical Time Domain Reflectometer (OTDR).</p>
                                <h6 class="reveal-item-child hidden-initial mt-3">Alat dan Bahan:</h6>
                                <ul class="reveal-item-child hidden-initial">
                                    <li>Optical Time Domain Reflectometer (OTDR)</li>
                                    <li>Patch cord, One click cleaner, Kacamata safety</li>
                                    <li>Lembar kerja, alat tulis</li>
                                </ul>
                                <h6 class="reveal-item-child hidden-initial mt-3">Langkah Kerja (Singkat):</h6>
                                <ol class="reveal-item-child hidden-initial">
                                    <li>Persiapkan alat dan bahan.</li>
                                    <li>Lakukan pengaturan parameter pada OTDR.</li>
                                    <li>Perhatikan keselamatan kerja.</li>
                                    <li>Lakukan pada beberapa saluran optik dengan panjang bervariasi.</li>
                                    <li>Tuliskan hasil pengukuran.</li>
                                </ol>
                                <div class="text-center video-wrapper mt-3 reveal-item-child hidden-initial">
                                    <iframe src="https://www.youtube.com/embed/ZcPGSHAYs3k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                                <p class="text-center text-muted reveal-item-child hidden-initial"><small>Video: Panduan praktik pengukuran menggunakan OTDR</small></p>
                            </div>
                        </div>
                    </div>

                    <!-- Praktikum 6: Pemeliharaan Fusion Splicer -->
                    <div class="col-lg-6">
                        <div class="card mb-4 reveal-item hidden-initial">
                            <div class="card-header">
                                <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-fire me-2"></i>6. Pemeliharaan Fusion Splicer</h2>
                            </div>
                            <div class="card-body">
                                <p class="reveal-item-child hidden-initial"><strong>Tujuan:</strong> Peserta didik dapat melakukan pemeliharaan rutin dan kalibrasi pada Fusion Splicer untuk memastikan kualitas penyambungan serat optik yang optimal.</p>
                                <h6 class="reveal-item-child hidden-initial mt-3">Alat dan Bahan:</h6>
                                <ul class="reveal-item-child hidden-initial">
                                    <li>Fusion Splicer</li>
                                    <li>Sikat pembersih, kapas alkohol (IPA)</li>
                                    <li>Serat optik sisa, Lembar kerja, alat tulis</li>
                                </ul>
                                <h6 class="reveal-item-child hidden-initial mt-3">Langkah Kerja:</h6>
                                <ol class="reveal-item-child hidden-initial">
                                    <li>Pastikan Fusion Splicer dalam keadaan mati dan dingin sebelum memulai pembersihan.</li>
                                    <li>Bersihkan area V-groove dan elektroda menggunakan sikat pembersih yang disediakan.</li>
                                    <li>Gunakan kapas yang dibasahi alkohol (IPA) untuk membersihkan permukaan cermin dan lensa kamera. Keringkan dengan hati-hati.</li>
                                    <li>Lakukan kalibrasi busur (arc calibration) sesuai panduan manual Fusion Splicer untuk memastikan stabilitas busur listrik.</li>
                                    <li>Lakukan uji penyambungan (splice test) pada serat optik sisa untuk memverifikasi kualitas sambungan.</li>
                                    <li>Catat hasil pemeliharaan dan kalibrasi pada lembar kerja.</li>
                                    <li>Simpan Fusion Splicer di tempat yang bersih, kering, dan aman setelah digunakan.</li>
                                </ol>
                                <div class="text-center video-wrapper mt-3 reveal-item-child hidden-initial">
                                    <iframe src="https://youtube.com/embed/ZP8iToJju18?si=awt1OvSe9p8aPtij" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                                <p class="text-center text-muted reveal-item-child hidden-initial"><small>Video: Panduan praktik pemeliharaan Fusion Splicer</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            

            <!-- Sumber Daya Tambahan Section -->
            <section id="sumber-daya-tambahan" class="py-5 bg-dark position-relative">
                <div class="binary-animation-bg" id="binary-bg-5"></div>
                <div class="container">
                    <h2 class="section-title reveal-item hidden-initial">Sumber Daya Tambahan</h2>
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4 reveal-item hidden-initial">
                                <div class="card-header">
                                    <h2 class="h5 mb-0 fw-bold reveal-item-child hidden-initial"><i class="fas fa-book me-2"></i>Pengayaan Materi</h2>
                                </div>
                                <div class="card-body">
                                    <p class="reveal-item-child hidden-initial">Untuk memperdalam pengetahuan Anda mengenai pemeliharaan alat ukur dan analisis hasil pengukuran, silakan jelajahi sumber daya berikut:</p>
                                    <ul>
                                        <li class="reveal-item-child hidden-initial">
                                            <i class="fas fa-video me-2"></i>
                                            Video Sertifikasi Jointer (OTDR & OPM): <a href="https://www.youtube.com/watch?v=LKACzAK2y8k" target="_blank" class="text-gradient">Lihat Video</a>
                                        </li>
                                        <li class="reveal-item-child hidden-initial">
                                            <i class="fas fa-vr-cardboard me-2"></i>
                                            Simulator Optik untuk Analisis Saluran: <a href="https://www.youtube.com/watch?v=AzWUjNv6QFs" target="_blank" class="text-gradient">Pelajari Simulator</a>
                                        </li>
                                        <li class="reveal-item-child hidden-initial">
                                            <i class="fas fa-microchip me-2"></i>
                                            Simulasi Fungsi Tombol Multimeter Digital: <a href="https://www.youtube.com/watch?v=ivKWwuOeVcE" target="_blank" class="text-gradient">Lihat Simulasi</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Quiz Sederhana Section -->
            <section id="quiz-section" class="mb-5">
                <div class="quiz-card reveal-item hidden-initial">
                    <h2 class="h3 mb-4 text-primary text-center reveal-item-child hidden-initial">
                        <i class="fas fa-question-circle me-3"></i>Uji Pemahaman: Kuis Pemeliharaan Alat Ukur
                    </h2>
                    <div id="quiz-container">
                        <!-- Question 1 -->
                        <div class="question-block mb-4">
                            <p class="mb-3 reveal-item-child hidden-initial"><strong>1. Kegiatan pemeliharaan yang dilakukan sebelum terjadi kerusakan pada alat ukur, dan biasanya dilakukan secara berkala, disebut pemeliharaan jenis apa?</strong></p>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q1" data-choice="a">
                                <label class="w-100 cursor-pointer">a. Korektif</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q1" data-choice="b">
                                <label class="w-100 cursor-pointer">b. Kualitatif</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q1" data-choice="c">
                                <label class="w-100 cursor-pointer">c. Preventif</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q1" data-choice="d">
                                <label class="w-100 cursor-pointer">d. Adaptif</label>
                            </div>
                        </div>

                        <!-- Question 2 -->
                        <div class="question-block mb-4">
                            <p class="mb-3 reveal-item-child hidden-initial"><strong>2. Salah satu sikap kerja penting dalam memelihara alat ukur, terutama saat menggunakan besaran listrik, adalah?</strong></p>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q2" data-choice="a">
                                <label class="w-100 cursor-pointer">a. Melakukan kalibrasi setiap hari</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q2" data-choice="b">
                                <label class="w-100 cursor-pointer">b. Selalu cermat saat menggunakan</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q2" data-choice="c">
                                <label class="w-100 cursor-pointer">c. Menyimpan di tempat lembap</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q2" data-choice="d">
                                <label class="w-100 cursor-pointer">d. Mengabaikan buku manual</label>
                            </div>
                        </div>

                        <!-- Question 3 -->
                        <div class="question-block mb-4">
                            <p class="mb-3 reveal-item-child hidden-initial"><strong>3. Meng-update perangkat lunak pada alat ukur OTDR menggunakan versi terbaru termasuk dalam jenis pemeliharaan apa?</strong></p>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q3" data-choice="a">
                                <label class="w-100 cursor-pointer">a. Preventif</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q3" data-choice="b">
                                <label class="w-100 cursor-pointer">b. Korektif</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q3" data-choice="c">
                                <label class="w-100 cursor-pointer">c. Kualitatif</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q3" data-choice="d">
                                <label class="w-100 cursor-pointer">d. Prediktif</label>
                            </div>
                        </div>

                        <!-- Question 4 -->
                        <div class="question-block mb-4">
                            <p class="mb-3 reveal-item-child hidden-initial"><strong>4. Mengapa penting untuk mematikan sakelar pemilih pada multimeter sebelum disimpan?</strong></p>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q4" data-choice="a">
                                <label class="w-100 cursor-pointer">a. Agar alat lebih ringan</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q4" data-choice="b">
                                <label class="w-100 cursor-pointer">b. Untuk menghemat baterai dan mencegah kerusakan</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q4" data-choice="c">
                                <label class="w-100 cursor-pointer">c. Agar mudah dibawa</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q4" data-choice="d">
                                <label class="w-100 cursor-pointer">d. Tidak ada alasan khusus</label>
                            </div>
                        </div>

                        <!-- Question 5 -->
                        <div class="question-block mb-4">
                            <p class="mb-3 reveal-item-child hidden-initial"><strong>5. Alat ukur yang digunakan untuk menyambung dua ujung serat optik dengan melelehkan keduanya menggunakan busur listrik adalah?</strong></p>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q5" data-choice="a">
                                <label class="w-100 cursor-pointer">a. Optical Power Meter (OPM)</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q5" data-choice="b">
                                <label class="w-100 cursor-pointer">b. Optical Time-Domain Reflectometer (OTDR)</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q5" data-choice="c">
                                <label class="w-100 cursor-pointer">c. Fusion Splicer</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q5" data-choice="d">
                                <label class="w-100 cursor-pointer">d. Cable Tester</label>
                            </div>
                        </div>

                        <!-- Question 6 (New) -->
                        <div class="question-block mb-4">
                            <p class="mb-3 reveal-item-child hidden-initial"><strong>6. Apa tujuan utama dari kalibrasi busur (arc calibration) pada Fusion Splicer?</strong></p>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q6" data-choice="a">
                                <label class="w-100 cursor-pointer">a. Membersihkan elektroda dari debu</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q6" data-choice="b">
                                <label class="w-100 cursor-pointer">b. Memastikan stabilitas busur listrik untuk penyambungan</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q6" data-choice="c">
                                <label class="w-100 cursor-pointer">c. Menghemat konsumsi daya baterai</label>
                            </div>
                            <div class="quiz-option reveal-item-child hidden-initial" data-question="q6" data-choice="d">
                                <label class="w-100 cursor-pointer">d. Mempercepat proses pemanasan serat</label>
                            </div>
                        </div>
                        
                        <button onclick="checkQuiz()" class="btn btn-neon w-100 mt-3 fw-bold reveal-item-child hidden-initial">Periksa Jawaban</button>
                        <p id="quiz-feedback" class="mt-4 font-weight-bold text-center reveal-item-child hidden-initial"></p>
                        <!-- Next Material Button - Hidden by default. Goes back to index after last quiz -->
                        <a href="{{ route('siswa.materi.index')}}" id="nextMaterialBtn" class="btn btn-outline-neon w-100 mt-3 d-none fw-bold reveal-item-child hidden-initial">Kembali ke Daftar Materi <i class="fas fa-arrow-right ms-2"></i></a>
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
<!-- Model Viewer for 3D GLB models -->
<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

<script>
    // --- Three.js Sphere Initialization ---
    // Removed the cyber-sphere div and its initialization code.

    // --- Dynamic Connection Lines Animation (REMOVED: Replaced by Canvas Logic) ---
    // The previous connection lines SVG logic is now handled by the main canvas animation.

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
                    const line = lines[randomLineLine];
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
        q1: 'c', // Preventif
        q2: 'b', // Selalu cermat saat menggunakan
        q3: 'c', // Kualitatif
        q4: 'b', // Untuk menghemat baterai dan mencegah kerusakan
        q5: 'c',  // Fusion Splicer
        q6: 'b'   // Memastikan stabilitas busur listrik untuk penyambungan (New question)
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

    function checkQuiz() {
        let score = 0;
        const totalQuestions = Object.keys(quizAnswers).length;
        const feedback = document.getElementById('quiz-feedback');
        const nextMaterialBtn = document.getElementById('nextMaterialBtn');

        // Clear previous results visually
        document.querySelectorAll('.quiz-option').forEach(option => {
            option.classList.remove('correct-answer', 'incorrect');
        });
        
        let allAnswered = true;

        for (const qId in quizAnswers) {
            const selectedOption = document.querySelector(`.quiz-option[data-question="${qId}"].selected`);
            const correctAnswer = quizAnswers[qId];

            if (!selectedOption) {
                allAnswered = false;
                break; // Exit loop if any question is not answered
            }

            const selectedChoice = selectedOption.dataset.choice;

            if (selectedChoice === correctAnswer) {
                score += 1;
                selectedOption.classList.add('correct-answer');
            } else {
                selectedOption.classList.add('incorrect');
                // Highlight the correct answer for clarity
                document.querySelector(`.quiz-option[data-question="${qId}"][data-choice="${correctAnswer}"]`).classList.add('correct-answer');
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
            
            // Reset quiz for retake after a short delay
            setTimeout(() => {
                resetQuizUI();
            }, 3000); // Reset after 3 seconds so user can see results briefly
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
                this.color = `rgba(0, 230, 230, ${Math.min(1, this.alpha * 2)})`; // Brighter Teal
            } else {
                // Shrink back to original size and fade out slightly when not hovered
                if (this.size > this.originalSize) {
                    this.size -= 0.05;
                }
                this.color = `rgba(0, 230, 230, ${this.alpha})`; // Back to original alpha (Teal)
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
                const color = `rgba(0, 230, 230, ${Math.random() * 0.5 + 0.3})`; // Teal gradient
                
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
                            ctx.strokeStyle = `rgba(0, 179, 179, ${Math.min(1, alpha * 2)})`; // Brighter Teal lines on hover
                            ctx.lineWidth = 1.5; // Thicker lines
                        } else {
                            ctx.strokeStyle = `rgba(0, 179, 179, ${alpha * 0.4})`; // Original subtle lines (Teal)
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
            ctx.fillStyle = 'rgba(26, 10, 42, 0.05)'; // Match new body background for trail effect
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
