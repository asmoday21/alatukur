<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <style>
        /* CSS Variables for theme colors */
        :root {
            --primary-blue: #ff1100;
            --secondary-blue: #0072ff;
            --dark-background-start: #0f1c2c; /* Updated: Darker, more muted blue for industrial feel */
            --dark-background-end: #0a141e;   /* Updated: Even darker, almost black-blue */
            --text-light: #ffffff;
            --text-opacity-light: rgba(255, 255, 255, 0.75);
            --border-light: rgba(245, 7, 7, 0.25);
            --anomaly-red: #ff4d4d; /* Red for errors/anomalies */
            --indicator-green: #2ecc71; /* Green for "OK" or active status */

            --canvas-line: rgba(0, 198, 255, 0.5); /* Blue signal lines */
            --canvas-node: #00c6ff; /* Blue active nodes */
            --canvas-grid: #0a1e0b(0, 114, 255, 0.08); /* Faint grid for background */
            /* --canvas-background-fade: rgba(15, 28, 44, 0.8); /* This is now managed by the hero's background */
            --canvas-instrument-border: rgba(26, 25, 25, 0.15); /* Instrument screen border */
            --canvas-screen-glow: rgba(255, 0, 0, 0.3); /* Screen glow effect */
            --canvas-meter-text: #e0e0e0; /* Color for simulated meter text */
            --canvas-value-text: #00ff88; /* Color for actual numerical values */
        }

        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            overflow-x: hidden;
            font-family: 'Inter', sans-serif; /* Using Inter font as preferred */
        }

        .container-xxl {
            max-width: 100% !important;
            padding: 0;
        }

        .hero-header {
            width: 100vw; /* Menggunakan lebar penuh viewport */
            margin: 0;
        }

        /* Gaya khusus untuk hero section */
        .telecom-hero {
            min-height: 100vh; /* Memastikan hero section memenuhi tinggi viewport */
            display: flex; /* Menggunakan flexbox untuk penataan konten */
            align-items: center; /* Menyelaraskan item secara vertikal di tengah */
            justify-content: center; /* Menyelaraskan item secara horizontal di tengah */
            background: linear-gradient(152deg, var(--dark-background-start) 0%, var(--dark-background-end) 100%);
            overflow: hidden;
            position: relative; /* Container for its children */
            padding-top: 8rem; /* Memberi ruang untuk navbar */
            padding-bottom: 8rem; /* Memberi ruang di bagian bawah */
        }

        .text-gradient {
            background: linear-gradient(90deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-gradient {
            background: linear-gradient(90deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            border: none;
            color: var(--text-light);
            transition: all 0.3s ease;
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 255, 255, 0.3);
        }

        /* Canvas styling - now inside a column */
        #networkCanvas {
            display: block; /* Menghilangkan margin bawah default */
            background: transparent; /* Pastikan canvas transparan */
            width: 100%; /* Make canvas fill its parent column */
            height: auto; /* Allow height to adjust proportionally */
        }

        /* Animasi fade-in-up, delay-1s, delay-2s, dll. dari animate.css */
        .animate__animated {
            animation-duration: 1s;
            animation-fill-mode: both;
        }

        .animate__fadeInUp {
            animation-name: fadeInUp;
        }

        .animate__fadeIn {
            animation-name: fadeIn;
        }

        .animate__delay-1s {
            animation-delay: 1s;
        }

        .animate__delay-2s {
            animation-delay: 2s;
        }

        .animate__delay-3s {
            animation-delay: 3s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 100%, 0);
            }
            to {
                opacity: 1;
                transform: none;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Responsive adjustments for mobile devices */
        @media (max-width: 992px) {
            .telecom-hero {
                text-align: center;
                padding-top: 5rem;
                padding-bottom: 5rem;
                min-height: auto; /* Allow hero height to adjust to content */
            }

            .d-flex {
                justify-content: center;
            }

            .border-end {
                border-right: none !important;
            }

            /* Adjust text column padding for mobile */
            .col-lg-6 .pe-lg-5 {
                padding-right: 0 !important;
                padding-left: 1rem; /* Add some padding on mobile */
            }

            .col-lg-6 .ps-4 {
                padding-left: 1rem !important; /* Adjust padding on mobile */
            }

            /* Ensure text content is on top (now naturally flows above canvas on mobile) */
            .telecom-hero > .container {
                position: relative; /* Ensure it's positioned for z-index */
                z-index: 10;
            }

            /* Remove placeholder div for canvas on mobile if it was explicitly hidden */
            .col-lg-6.d-flex > div[style*="display: none;"] {
                display: block !important; /* Ensure canvas is shown */
                height: auto !important; /* Ensure it can resize */
            }
        }
    </style>

    <meta charset="utf-8">
    <title>NetPedia</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('homepage/img/logo.png')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&family=Inter:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('homepage/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('homepage/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('homepage/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('homepage/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('homepage/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">
                        <img src="{{ asset('homepage/img/logo.png') }}" alt="NetPedia Logo" style="height: 40px; margin-right: 10px;">
                        NetPedia<span class="fs-5"></span>
                    </h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="#" class="nav-item nav-link active">Home</a>
                        <a href="{{ route('cp-atp') }}" class="nav-item nav-link">CP/ATP</a>
                        <a href="{{ route('materi')}}" class="nav-item nav-link">Materi</a>
                        <a href="{{ route('referensi') }}" class="nav-item nav-link">Referensi</a>
                    </div>
                    <a href="{{ route('login')}}" class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Sign In</a>
                </div>
            </nav>
            <div class="telecom-hero bg-dark position-relative overflow-hidden">
                <!-- Konten utama -->
                <div class="container pt-5 pb-5" style="position: relative; z-index: 10;">
                    <div class="row align-items-center">
                        <!-- Text Content -->
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <div class="pe-lg-5">
                                <div class="hero-badge fade-in-up" style="color: var(--text-light);">
                                    <i class="fas fa-tools me-2"></i> <!-- Changed icon to tools -->
                                    Elemen Alat Ukur & Pengukuran TJKT
                                </div>
                                <h1 class="text-white mb-4 animate__animated animate__fadeInUp">
                                    <span class="text-gradient">Kuasai</span> Alat Ukur, Pastikan Jaringan Prima
                                </h1>
                                <p class="lead text-light mb-5 animate__animated animate__fadeInUp animate__delay-1s">
                                    Pahami fungsi, prinsip kerja, dan analisis hasil pengukuran berbagai alat ukur vital untuk instalasi dan pemeliharaan jaringan telekomunikasi dan komputer.
                                </p>
                                <div class="d-flex flex-wrap gap-3 animate__animated animate__fadeInUp animate__delay-2s">
                                    <a href="{{ route('register')}}" class="btn btn-gradient btn-lg rounded-pill px-4 py-3">
                                        Mulai Belajar <i class="fas fa-book-open ms-2"></i>
                                    </a>
                                    <a href="https://youtube.com/embed/7VMtulKQ6SA?si=pvR48uI5w-BuKp_0" class="btn btn-outline-light btn-lg rounded-pill px-4 py-3">
                                        <i class="fas fa-video me-2"></i> Materi Video
                                    </a>
                                </div>

                                <div class="d-flex mt-5 pt-2 animate__animated animate__fadeIn animate__delay-3s">
                                    <div class="pe-4 border-end border-light border-opacity-25">
                                        <h3 class="text-white mb-1">Beragam</h3>
                                        <p class="text-light opacity-75 mb-0 small">Jenis Alat Ukur</p>
                                    </div>
                                    <div class="px-4 border-end border-light border-opacity-25">
                                        <h3 class="text-white mb-1">Akurat</h3>
                                        <p class="text-light opacity-75 mb-0 small">Pengukuran Jaringan</p>
                                    </div>
                                    <div class="ps-4">
                                        <h3 class="text-white mb-1">Diagnosa</h3>
                                        <p class="text-light opacity-75 mb-0 small">Gangguan Cepat</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bagian kanan untuk canvas -->
                        <div class="col-lg-6 d-flex align-items-center justify-content-center animate__animated animate__fadeIn">
                            <canvas id="networkCanvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- About Start -->
        <div class="container-xxl py-5" id="about-us"> <!-- Menambahkan ID untuk tombol "Mulai Belajar" -->
            <div class="container px-lg-5">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="section-title position-relative mb-4 pb-2">
                            <h6 class="position-relative text-primary ps-4">Tentang Kami</h6>
                            <h2 class="mt-2">Mengenal NetPedia dalam Dunia Alat Ukur Jaringan </h2>
                        </div>
                        <p class="mb-4">NetPedia adalah platform pembelajaran digital yang berkomitmen untuk membekali calon teknisi jaringan dengan pengetahuan mendalam tentang alat ukur. Kami percaya penguasaan alat ukur adalah kunci keberhasilan dalam instalasi dan pemeliharaan jaringan komputer dan telekomunikasi. Kami menghadirkan materi yang komprehensif, dari teori hingga simulasi praktikum, agar Anda siap menghadapi tantangan di lapangan.</p>
                        <p class="mb-4">Melalui modul interaktif, simulasi canvas yang realistis, dan panduan praktis, kami mempermudah proses belajar tentang LAN Tester, Multimeter, OPM, OTDR, dan alat ukur penting lainnya. Tingkatkan keterampilan Anda, pastikan kualitas jaringan, dan jadilah ahli diagnosa gangguan yang Andal bersama NetPedia!</p>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Materi Komprehensif</h6>
                                <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Simulasi Interaktif</h6>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Fokus Alat Ukur</h6>
                                <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Akses Fleksibel</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <a class="btn btn-primary rounded-pill px-4 me-3" href="">Baca Selengkapnya</a>
                            <a class="btn btn-outline-primary btn-square me-3" href="https://web.facebook.com/smksatu.solsel.1?_rdc=1&_rdr#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary btn-square me-3" href="https://youtube.com/@smknegeri1solokselatan431?si=0dqstTjNwu0gD4AB"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-primary btn-square me-3" href="https://www.instagram.com/smkn1solsel/"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{asset ('homepage/img/ii.jpg')}}" onerror="this.onerror=null; this.src=">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Newsletter Start -->
        <div class="container-xxl bg-primary newsletter my-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container px-lg-5">
                <div class="row align-items-center" style="height: 250px;">
                    <div class="col-12 col-md-6">
                        <h3 class="text-white">Siap Memulai?</h3>
                        <small class="text-white">Dapatkan informasi terbaru dan panduan eksklusif tentang alat ukur.</small>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Masukkan Email Anda" style="height: 48px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
                        </div>
                    </div>
                    <div class="col-md-6 text-center mb-n5 d-none d-md-block">
                        <img class="img-fluid mt-5" style="height: 250px;" src="{{asset ('homepage/img/ICON (2).png')}}" onerror="this.onerror=null; this.src='https://placehold.co/300x250/0d1a2a/ffffff?text=Newsletter+Image';">
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter End -->
        
        <!-- Portfolio Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary ps-4">Proyek Kami</h6>
                    <h2 class="mt-2">Studi Kasus Penggunaan Alat Ukur</h2>
                </div>
                <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="col-12 text-center">
                        <ul class="list-inline mb-5" id="portfolio-flters">
                            <li class="btn px-3 pe-4 active" data-filter="*">Semua</li>
                            <li class="btn px-3 pe-4" data-filter=".first">Kabel & Sinyal</li>
                            <li class="btn px-3 pe-4" data-filter=".second">Optik & Redaman</li>
                        </ul>
                    </div>
                </div>

                <div class="row g-4 portfolio-container">
                    <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.1s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset ('homepage/img/lantes.png')}}" alt="LAN Tester" onerror="this.onerror=null; this.src='https:" {{asset ('homepage/img/lantes.png')}}">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="{{asset ('homepage/img/lantes.png')}}" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder me-2"></i>Diagnosa Kabel</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">Pengujian Kontinuitas Kabel LAN dengan LAN Tester</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.3s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset ('homepage/img/otdrr.png')}}" alt="Otdr" onerror="this.onerror=null; this.src='https://placehold.co/600x400/0d1a2a/ffffff?text=Multimeter';">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="{{asset ('homepage/img/otdrr.png')}}" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder me-2"></i>Diagnosa Jalur</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">Menganalisis Redaman Kabel Optik dengan OTDR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.6s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset ('homepage/img/earth.png')}}" alt="Earth Tester" onerror="this.onerror=null; this.src='https://placehold.co/600x400/0d1a2a/ffffff?text=Earth+Tester';">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="{{asset ('homepage/img/earth.png')}}" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder me-2"></i>Proteksi Sistem</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">Verifikasi Sistem Pentanahan dengan Earth Tester</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.1s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset ('homepage/img/oopm.png')}}" alt="OPM" onerror="this.onerror=null; this.src='https://placehold.co/600x400/0d1a2a/ffffff?text=OPM';">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="{{asset ('homepage/img/oopm.png')}}" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder me-2"></i>Fiber Optik</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">Pengukuran Level Daya Optik Menggunakan OPM</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.3s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset ('homepage/img/multii.png')}}" alt="Multimeter" onerror="this.onerror=null; this.src='https://placehold.co/600x400/0d1a2a/ffffff?text=OTDR';">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="{{asset ('homepage/img/multii.png')}}" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder me-2"></i>Listrik & Tegangan</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">Pengukuran Tegangan dan Arus Menggunakan Multimeter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.6s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset ('homepage/img/fusion.png')}}" alt="Fusion Splicer" onerror="this.onerror=null; this.src='https://placehold.co/600x400/0d1a2a/ffffff?text=WiFi+Analyzer';">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="{{asset ('homepage/img/fusion.png')}}" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder me-2"></i>Penyambung Fiber</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">Menggabungkan Dua Ujung Serat Optik</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Kontak</h5>
                        <p><i class="fa fa-map-marker-alt me-3"></i>Jl. Raya Koto Baru - Muaralabuh</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+62 075570135</p>
                        <p><i class="fa fa-envelope me-3"></i>info@smkn1solsel.sch.id</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://web.facebook.com/smksatu.solsel.1?_rdc=1&_rdr#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://youtube.com/@smknegeri1solokselatan431?si=0dqstTjNwu0gD4AB"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/smkn1solsel/"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Tautan Populer</h5>
                        <a class="btn btn-link" href="">Tentang Kami</a>
                        <a class="btn btn-link" href="">Kontak Kami</a>
                        <a class="btn btn-link" href="">Kebijakan Privasi</a>
                        <a class="btn btn-link" href="">Syarat & Ketentuan</a>
                        <a class="btn btn-link" href="">Karir</a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Galeri Proyek</h5>
                        <div class="row g-2">
                            <div class="col-4">
                                <img class="img-fluid" src="{{asset ('homepage/img/14.jpeg')}}" alt="Image" onerror="this.onerror=null; this.src='https://placehold.co/100x100/0d1a2a/ffffff?text=Image';">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{asset ('homepage/img/12.jpeg')}}" alt="Image" onerror="this.onerror=null; this.src='https://placehold.co/100x100/0d1a2a/ffffff?text=Image2';">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{asset ('homepage/img/16.jpeg')}}" alt="Image" onerror="this.onerror=null; this.src='https://placehold.co/100x100/0d1a2a/ffffff?text=Image3';">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{asset ('homepage/img/17.jpeg')}}" alt="Image" onerror="this.onerror=null; this.src='https://placehold.co/100x100/0d1a2a/ffffff?text=Image4';">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{asset ('homepage/img/15.jpeg')}}" alt="Image" onerror="this.onerror=null; this.src='https://placehold.co/100x100/0d1a2a/ffffff?text=Image5';">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{asset ('homepage/img/19.jpeg')}}" alt="Image" onerror="this.onerror=null; this.src='https://placehold.co/100x100/0d1a2a/ffffff?text=Image6';">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Newsletter 📢</h5>
                        <p>Gabung dengan ribuan pembelajar lainnya dan dapatkan konten eksklusif, info terbaru, serta tips belajar langsung di inbox kamu!</p>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" style="height: 48px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">NetPedia</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">Rifki Fuadi</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript untuk animasi Canvas -->
    <script>
        // Deklarasi variabel global untuk state canvas
        let currentMeasurementValue = 0.00;
        let simulatedTraceData = [];
        let traceOffset = 0;
        let faultDetected = false;
        let instrumentDisplayX, instrumentDisplayY, instrumentWidth, instrumentHeight;

        window.onload = function () {
            // Dapatkan elemen canvas dan konteks 2D
            const canvas = document.getElementById('networkCanvas');
            const ctx = canvas.getContext('2d');

            let centerX, centerY; // Pusat canvas
            const nodeCount = 20; // Jumlah node (titik data)
            let nodes = []; // Array untuk menyimpan data node
            let connections = []; // Array untuk menyimpan data koneksi
            let animationFrameId; // ID untuk requestAnimationFrame

            // Konfigurasi warna dari properti CSS variabel
            const backgroundColor = getComputedStyle(document.documentElement).getPropertyValue('--dark-background-end'); // Use a consistent background for the canvas
            const lineColor = getComputedStyle(document.documentElement).getPropertyValue('--canvas-line');
            const nodeColor = getComputedStyle(document.documentElement).getPropertyValue('--canvas-node');
            const gridColor = getComputedStyle(document.documentElement).getPropertyValue('--canvas-grid');
            const anomalyColor = getComputedStyle(document.documentElement).getPropertyValue('--anomaly-red');
            const indicatorGreen = getComputedStyle(document.documentElement).getPropertyValue('--indicator-green');
            const instrumentBorderColor = getComputedStyle(document.documentElement).getPropertyValue('--canvas-instrument-border');
            const screenGlowColor = getComputedStyle(document.documentElement).getPropertyValue('--canvas-screen-glow');
            const meterTextColor = getComputedStyle(document.documentElement).getPropertyValue('--canvas-meter-text');
            const valueTextColor = getComputedStyle(document.documentElement).getPropertyValue('--canvas-value-text');

            // Inisialisasi atau update ukuran canvas
            function resizeCanvas() {
                const parentCol = canvas.parentElement; // Ambil parent div (col-lg-6)
                canvas.width = parentCol.offsetWidth;
                // Tetapkan tinggi canvas responsif, misalnya 75% dari lebar, maksimal 400px
                canvas.height = Math.min(parentCol.offsetWidth * 0.75, 400); 
                // Pastikan ada tinggi minimum untuk visibilitas, terutama di layar sangat kecil
                if (canvas.height < 200) canvas.height = 200;

                centerX = canvas.width / 2;
                centerY = canvas.height / 2;

                // Sesuaikan ukuran instrumen agar responsif terhadap ukuran canvas baru
                instrumentWidth = canvas.width * 0.9; // 90% dari lebar canvas yang tersedia
                instrumentHeight = canvas.height * 0.7; // 70% dari tinggi canvas yang tersedia

                // Posisi instrumen di tengah canvas
                instrumentDisplayX = centerX - (instrumentWidth / 2);
                instrumentDisplayY = centerY - (instrumentHeight / 2);

                // Re-inisialisasi node dan koneksi setiap kali resize agar posisinya menyesuaikan
                nodes = []; 
                connections = []; 

                // Tambahkan node yang tersebar di sekitar area instrumen (simulasi layar alat ukur)
                for (let i = 0; i < nodeCount; i++) {
                    // Pastikan node berada dalam batas canvas yang diperbarui
                    const x = instrumentDisplayX + (Math.random() * instrumentWidth);
                    const y = instrumentDisplayY + (Math.random() * instrumentHeight);
                    nodes.push({
                        x: x,
                        y: y,
                        vx: (Math.random() - 0.5) * 0.6 * (canvas.width / 800), // Skala kecepatan dengan lebar canvas
                        vy: (Math.random() - 0.5) * 0.6 * (canvas.height / 400), // Skala kecepatan dengan tinggi canvas
                        radius: 2.5 + Math.random() * 1.5,
                        pulse: Math.random() * Math.PI * 2,
                        isAnomaly: Math.random() < 0.03
                    });
                }

                // Buat koneksi antar node yang berdekatan
                for (let i = 0; i < nodes.length; i++) {
                    for (let j = i + 1; j < nodes.length; j++) {
                        const node1 = nodes[i];
                        const node2 = nodes[j];
                        const dist = Math.sqrt(Math.pow(node1.x - node2.x, 2) + Math.pow(node1.y - node2.y, 2));
                        if (dist < (canvas.width / 800) * 100) { // Skala batas jarak koneksi
                            connections.push({ node1: node1, node2: node2, alpha: 0.05 });
                        }
                    }
                }
                
                // Inisialisasi ulang data sinyal trace agar menyesuaikan ukuran instrumen yang baru
                simulatedTraceData = [];
                for (let i = 0; i < instrumentWidth; i++) {
                    let value = Math.sin(i * 0.05 + Math.random() * 0.1) * (instrumentHeight * 0.2) + Math.cos(i * 0.02) * (instrumentHeight * 0.08);
                    if (i > instrumentWidth * 0.2 && i < instrumentWidth * 0.2 + 15) { 
                        value += Math.sin((i - instrumentWidth * 0.2) * Math.PI / 15) * instrumentHeight * 0.15;
                    }
                    if (i > instrumentWidth * 0.5 && i < instrumentWidth * 0.5 + 20) {
                        value -= Math.sin((i - instrumentWidth * 0.5) * Math.PI / 20) * instrumentHeight * 0.1;
                    }
                    if (i > instrumentWidth * 0.8) { 
                        value -= (i - instrumentWidth * 0.8) * (instrumentHeight * 0.005);
                    }
                    simulatedTraceData.push(value);
                }
            }

            // Fungsi untuk menggambar jaring latar belakang yang statis
            function drawGridBackground() {
                ctx.strokeStyle = gridColor;
                ctx.lineWidth = 0.5;

                const gridSize = Math.max(20, canvas.width / 20); // Sesuaikan ukuran grid
                for (let x = 0; x < canvas.width; x += gridSize) {
                    ctx.beginPath();
                    ctx.moveTo(x, 0);
                    ctx.lineTo(x, canvas.height);
                    ctx.stroke();
                }
                for (let y = 0; y < canvas.height; y += gridSize) {
                    ctx.beginPath();
                    ctx.moveTo(0, y);
                    ctx.lineTo(canvas.width, y); 
                    ctx.stroke();
                }
            }

            // Fungsi untuk menggambar jejak sinyal (mirip OTDR)
            function drawSignalTrace() {
                ctx.strokeStyle = nodeColor; 
                ctx.lineWidth = 2.5;

                ctx.beginPath();
                const initialDataIndex = Math.floor(traceOffset);
                ctx.moveTo(instrumentDisplayX, instrumentDisplayY + instrumentHeight / 2 + simulatedTraceData[initialDataIndex]);

                for (let i = 0; i < instrumentWidth; i++) {
                    const x = instrumentDisplayX + i;
                    const dataIndex = (i + initialDataIndex) % simulatedTraceData.length;
                    const y = instrumentDisplayY + instrumentHeight / 2 + simulatedTraceData[dataIndex];
                    ctx.lineTo(x, y);
                }
                ctx.stroke();

                traceOffset = (traceOffset + 0.8) % simulatedTraceData.length; 
            }

            // Fungsi untuk menggambar kursor pengukuran dan pembacaan
            let cursorPosition = 0;
            function drawMeasurementCursor() {
                ctx.strokeStyle = 'rgba(255, 255, 255, 0.6)'; 
                ctx.lineWidth = 1.5;

                cursorPosition = (cursorPosition + 1.2) % instrumentWidth; 
                const cursorX = instrumentDisplayX + cursorPosition;

                ctx.beginPath();
                ctx.moveTo(cursorX, instrumentDisplayY);
                ctx.lineTo(cursorX, instrumentDisplayY + instrumentHeight);
                ctx.stroke();

                const currentDataPoint = simulatedTraceData[(Math.floor(cursorPosition) + Math.floor(traceOffset)) % simulatedTraceData.length];
                currentMeasurementValue = (Math.abs(currentDataPoint / instrumentHeight) * 20 + 5).toFixed(2); 

                // Font size and position responsive for mobile
                let fontSize = (canvas.width < 500) ? 12 : 16; // Based on canvas width now
                ctx.font = `bold ${fontSize}px "Inter", sans-serif`;
                ctx.textAlign = 'center';
                ctx.fillStyle = valueTextColor;
                ctx.fillText(`${(cursorPosition / instrumentWidth * 100).toFixed(1)} m`, cursorX, instrumentDisplayY - (fontSize + 5)); 
                ctx.fillText(`${currentMeasurementValue} dB`, cursorX, instrumentDisplayY + instrumentHeight + (fontSize + 10)); 

                if (Math.random() < 0.002) {
                    faultDetected = !faultDetected;
                }
            }

            // Fungsi untuk menggambar pembacaan digital dan status
            let simulatedVoltage = 12.5;
            let simulatedCurrent = 0.35;
            function drawDigitalReadout() {
                let baseFontSize = (canvas.width < 500) ? 11 : 14;
                let valueFontSize = (canvas.width < 500) ? 13 : 16;

                ctx.fillStyle = meterTextColor;
                ctx.font = `${baseFontSize}px "Inter", sans-serif`;
                ctx.textAlign = 'left';
                const textPaddingX = (canvas.width < 500) ? 8 : 15;
                const textPaddingY = (canvas.height < 250) ? 10 : 25; // Adjusted padding based on canvas height
                const lineHeight = (canvas.height < 250) ? 18 : 25;
                const valueOffset = (canvas.width < 500) ? 45 : 50;


                // OPM
                ctx.fillText('OPM:', instrumentDisplayX + textPaddingX, instrumentDisplayY + textPaddingY);
                ctx.font = `bold ${valueFontSize}px "Inter", sans-serif`;
                ctx.fillStyle = valueTextColor;
                ctx.fillText(`${currentMeasurementValue} dBm`, instrumentDisplayX + textPaddingX + valueOffset, instrumentDisplayY + textPaddingY);

                // VOLT
                ctx.font = `${baseFontSize}px "Inter", sans-serif`;
                ctx.fillStyle = meterTextColor;
                ctx.fillText('VOLT:', instrumentDisplayX + textPaddingX, instrumentDisplayY + textPaddingY + lineHeight);
                ctx.font = `bold ${valueFontSize}px "Inter", sans-serif`;
                ctx.fillStyle = valueTextColor;
                ctx.fillText(`${simulatedVoltage.toFixed(1)} V`, instrumentDisplayX + textPaddingX + valueOffset, instrumentDisplayY + textPaddingY + lineHeight);

                // AMP
                ctx.font = `${baseFontSize}px "Inter", sans-serif`;
                ctx.fillStyle = meterTextColor;
                ctx.fillText('AMP:', instrumentDisplayX + textPaddingX, instrumentDisplayY + textPaddingY + (lineHeight * 2));
                ctx.font = `bold ${valueFontSize}px "Inter", sans-serif`;
                ctx.fillStyle = valueTextColor;
                ctx.fillText(`${simulatedCurrent.toFixed(2)} A`, instrumentDisplayX + textPaddingX + valueOffset, instrumentDisplayY + textPaddingY + (lineHeight * 2));

                simulatedVoltage = Math.max(11.8, Math.min(13.2, simulatedVoltage + (Math.random() - 0.5) * 0.1));
                simulatedCurrent = Math.max(0.25, Math.min(0.45, simulatedCurrent + (Math.random() - 0.5) * 0.01));

                // Status Indicator
                ctx.font = `${baseFontSize}px "Inter", sans-serif`;
                ctx.fillStyle = meterTextColor;
                ctx.textAlign = 'right';
                const statusOffset = (canvas.width < 500) ? 40 : 60; // Adjusted based on canvas width
                ctx.fillText('STATUS:', instrumentDisplayX + instrumentWidth - textPaddingX - statusOffset, instrumentDisplayY + textPaddingY);
                ctx.font = `bold ${valueFontSize}px "Inter", sans-serif`;
                ctx.fillStyle = faultDetected ? anomalyColor : indicatorGreen;
                ctx.fillText(faultDetected ? 'FAULT' : 'OK', instrumentDisplayX + instrumentWidth - textPaddingX, instrumentDisplayY + textPaddingY);
                
                // LAN Tester
                ctx.font = `${baseFontSize}px "Inter", sans-serif`;
                ctx.fillStyle = meterTextColor;
                ctx.fillText('LAN:', instrumentDisplayX + instrumentWidth - textPaddingX - statusOffset, instrumentDisplayY + textPaddingY + lineHeight);
                ctx.font = `bold ${valueFontSize}px "Inter", sans-serif`;
                ctx.fillStyle = Math.random() > 0.1 ? indicatorGreen : anomalyColor; 
                ctx.fillText(Math.random() > 0.1 ? 'PASS' : 'FAIL', instrumentDisplayX + instrumentWidth - textPaddingX, instrumentDisplayY + textPaddingY + lineHeight);
            }

            // Fungsi utama untuk menggambar tampilan instrumen
            function drawInstrumentDisplay() {
                const rectX = instrumentDisplayX;
                const rectY = instrumentDisplayY;
                const borderRadius = 10;

                // Gambar bingkai luar dengan sudut membulat dan efek glow
                ctx.beginPath();
                ctx.roundRect(rectX, rectY, instrumentWidth, instrumentHeight, borderRadius);
                ctx.strokeStyle = instrumentBorderColor;
                ctx.lineWidth = 2;
                ctx.shadowBlur = 20;
                ctx.shadowColor = screenGlowColor;
                ctx.stroke();
                ctx.shadowBlur = 0; // Reset shadow setelah stroke

                ctx.save();
                ctx.beginPath();
                ctx.roundRect(rectX, rectY, instrumentWidth, instrumentHeight, borderRadius);
                ctx.clip(); // Potong semua gambar di luar area ini

                // Gambar jejak sinyal (OTDR-like)
                drawSignalTrace();

                // Gambar kursor pengukuran
                drawMeasurementCursor();

                ctx.restore(); // Kembalikan clipping

                // Gambar pembacaan digital di luar area klip
                drawDigitalReadout();
            }

            // Fungsi untuk menggambar node dan koneksi di latar belakang
            function drawNodesAndConnections() {
                // Gambar koneksi
                ctx.lineWidth = 0.8;
                connections.forEach(conn => {
                    ctx.strokeStyle = `rgba(0, 198, 255, ${conn.alpha})`;
                    ctx.beginPath();
                    ctx.moveTo(conn.node1.x, conn.node1.y);
                    ctx.lineTo(conn.node2.x, conn.node2.y);
                    ctx.stroke();
                    conn.alpha = Math.min(0.15, conn.alpha + 0.001); // Fade in sangat lambat
                });

                // Gambar node
                nodes.forEach(node => {
                    node.x += node.vx;
                    node.y += node.vy;

                    // Pantulkan node dari batas area canvas (bukan instrumen)
                    const nodeMargin = (canvas.width < 992) ? 10 : 30; // Smaller margin on mobile based on canvas width
                    if (node.x < nodeMargin || node.x > canvas.width - nodeMargin) {
                        node.vx *= -1;
                        node.x = node.x < nodeMargin ? nodeMargin : canvas.width - nodeMargin;
                    }
                    if (node.y < nodeMargin || node.y > canvas.height - nodeMargin) {
                        node.vy *= -1;
                        node.y = node.y < nodeMargin ? nodeMargin : canvas.height - nodeMargin;
                    }

                    // Animasi denyut
                    node.pulse += 0.05;
                    const pulsatingRadius = node.radius * (1 + Math.sin(node.pulse) * 0.2);

                    ctx.fillStyle = node.isAnomaly ? anomalyColor : lineColor; 
                    ctx.beginPath();
                    ctx.arc(node.x, node.y, pulsatingRadius, 0, Math.PI * 2);
                    ctx.fill();

                    // Efek pendaran
                    ctx.shadowBlur = 8;
                    ctx.shadowColor = node.isAnomaly ? anomalyColor : lineColor;
                });
                ctx.shadowBlur = 0; // Reset shadow
            }

            // Loop animasi utama
            function animate() {
                // Background untuk canvas itu sendiri (di dalam kolom)
                ctx.fillStyle = backgroundColor;
                ctx.fillRect(0, 0, canvas.width, canvas.height);

                drawGridBackground();
                drawNodesAndConnections(); 
                drawInstrumentDisplay(); 

                animationFrameId = requestAnimationFrame(animate);
            }

            // Event listener untuk resize window
            window.addEventListener('resize', () => {
                cancelAnimationFrame(animationFrameId); 
                resizeCanvas(); 
                animate(); 
            });

            // Mulai inisialisasi dan animasi saat halaman dimuat
            resizeCanvas(); 
            animate(); 

            // Sembunyikan spinner setelah canvas siap
            const spinner = document.getElementById('spinner');
            if (spinner) {
                spinner.classList.remove('show');
                spinner.classList.add('fade'); 
            }
        };
    </script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('homepage/lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('homepage/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('homepage/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('homepage/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('homepage/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('homepage/lib/lightbox/js/lightbox.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('homepage/js/main.js')}}"></script>
</body>

</html>
