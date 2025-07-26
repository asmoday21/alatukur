<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Referensi | Teknik Jaringan Komputer</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Updated color palette for blue and yellow theme */
            --primary-gradient: linear-gradient(135deg, #ff4800 0%, #0056b3 100%); /* Strong blue */
            --secondary-gradient: linear-gradient(135deg, #ff4800c0 0%, #0056b3 100%); /* Golden yellow */
            --accent-gradient: linear-gradient(135deg, #17a2b8 0%, #134c96 100%); /* Teal blue for accents */
            --success-gradient: linear-gradient(135deg, #28a745 0%, #218838 100%); /* Green (can be adjusted if needed for a full blue-yellow spectrum) */
            --dark-bg: #0f1419;
            --card-bg: rgba(255, 255, 255, 0.95);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --text-primary: #2d3748;
            --text-secondary: #718096;
            --shadow-light: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-medium: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-heavy: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            /* Updated background to blue-yellow gradient */
            background: linear-gradient(135deg, #007bff 0%, #ffc107 100%);
            background-attachment: fixed;
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            position: relative;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Updated radial gradients for background shapes */
            background: 
                radial-gradient(circle at 20% 80%, rgba(0, 123, 255, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 193, 7, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(23, 162, 184, 0.3) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }
        
        .navbar {
            background: var(--glass-bg) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-light);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            /* Changed to secondary gradient for yellow color */
            background: var(--secondary-gradient); 
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .navbar-brand i {
            /* Changed to secondary gradient for yellow color */
            background: var(--secondary-gradient); 
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 2rem;
        }

        /* Styling for the "Beranda" link and icon */
        .navbar-nav .nav-link {
            font-weight: 500;
            transition: all 0.3s ease;
            color: white; /* Default color for visibility before gradient */
        }

        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link:hover {
            background: var(--primary-gradient); /* Apply blue gradient for active/hover state */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .navbar-nav .nav-link i {
            background: var(--primary-gradient); /* Apply blue gradient to the icon */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hero-section {
            background: var(--glass-bg);
            backdrop-filter: blur(30px);
            color: white;
            padding: 4rem 0;
            border-radius: 0 0 40px 40px;
            margin-bottom: 3rem;
            box-shadow: var(--shadow-heavy);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: 
                radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero-section h1 {
            font-weight: 700;
            font-size: 3.5rem;
            margin-bottom: 1rem;
            /* Added text-shadow for "Koleksi Referensi" */
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5), 0 0 10px rgba(255, 255, 255, 0.3); 
        }
        
        .hero-section p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .search-section {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 3rem;
            box-shadow: var(--shadow-medium);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .form-control, .form-select {
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            padding: 0.75rem 1rem;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            /* Updated focus border color */
            border-color: #007bff; 
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            background: rgba(255, 255, 255, 0.9);
        }
        
        .input-group-text {
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-right: none;
            border-radius: 15px 0 0 15px;
        }
        
        .card-reference {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 25px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: var(--shadow-medium);
            height: 100%;
            position: relative;
        }
        
        .card-reference::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, transparent 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .card-reference:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: var(--shadow-heavy);
        }
        
        .card-reference:hover::before {
            opacity: 1;
        }
        
        .card-reference .card-body {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 2;
        }
        
        .card-reference .card-title {
            font-weight: 600;
            background: var(--primary-gradient); /* Uses primary gradient for title */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            min-height: 3.5rem;
            font-size: 1.25rem;
        }
        
        .card-reference .card-text {
            color: var(--text-secondary);
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        
        .btn-primary {
            background: var(--primary-gradient); /* Uses primary gradient for button */
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-primary:hover {
            /* Updated hover box-shadow color */
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 123, 255, 0.4);
        }
        
        .iframe-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: var(--shadow-medium);
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            margin-bottom: 1.5rem;
            border: 3px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        /* Fullscreen styles for the container */
        .iframe-container.fullscreen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            padding-bottom: 0; /* No padding-bottom needed when actual height is set */
            z-index: 9999; /* Ensure it's on top */
            border-radius: 0; /* Optional: remove border-radius in fullscreen */
            background: rgba(0, 0, 0, 0.9); /* Dark background for fullscreen */
        }
        
        .iframe-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 17px;
            border: none;
        }
        
        .fullscreen-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            border: none;
            padding: 0.75rem 1.25rem;
            border-radius: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            z-index: 10;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            font-weight: 500;
        }
        
        .fullscreen-btn:hover {
            background: rgba(0, 0, 0, 0.9);
            transform: scale(1.05);
        }
        
        .badge-category {
            background: var(--accent-gradient); /* Uses accent gradient for category badge */
            color: white;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            margin-bottom: 1rem;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: var(--shadow-light);
        }
        
        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        
        .shape {
            position: absolute;
            border-radius: 50%;
            animation: float-shapes 15s infinite ease-in-out; /* Adjusted animation duration and timing function */
        }
        
        .shape:nth-child(1) {
            background: rgba(0, 123, 255, 0.1); /* Blue shape */
            width: 100px;
            height: 100px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .shape:nth-child(2) {
            background: rgba(255, 193, 7, 0.1); /* Yellow shape */
            width: 60px;
            height: 60px;
            top: 60%;
            right: 20%;
            animation-delay: -5s;
        }
        
        .shape:nth-child(3) {
            background: rgba(23, 162, 184, 0.1); /* Teal blue shape */
            width: 80px;
            height: 80px;
            bottom: 30%;
            left: 20%;
            animation-delay: -10s;
        }
        
        /* Updated keyframes for floating shapes */
        @keyframes float-shapes {
            0%, 100% { 
                transform: translateY(0px) translateX(0px); 
                opacity: 0.8;
            }
            25% { 
                transform: translateY(-20px) translateX(10px); 
                opacity: 0.9;
            }
            50% { 
                transform: translateY(0px) translateX(0px); 
                opacity: 0.8;
            }
            75% { 
                transform: translateY(20px) translateX(-10px); 
                opacity: 0.9;
            }
        }
        
        .container {
            position: relative;
            z-index: 1;
        }
        
        @media (max-width: 768px) {
            .hero-section {
                padding: 2.5rem 0;
            }
            
            .hero-section h1 {
                font-size: 2.5rem;
            }
            
            .search-section {
                padding: 1.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .hero-section h1 {
                font-size: 2rem;
            }
            
            .card-reference .card-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-book-half"></i>Referensi
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"> <!-- Added ms-auto for right alignment -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">
                            <i class="bi bi-house-door-fill me-1"></i> Beranda
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center hero-content">
            <h1 class="display-4 fw-bold mb-3">Koleksi Referensi</h1>
            <p class="lead mb-4">
                Akses dokumen referensi untuk mendukung pembelajaran Teknik Jaringan Komputer dan Telekomunikasi Pada Elemen Alat Ukur dan Pengukuran
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container my-4">
        <!-- Search Section -->
        <div class="search-section">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" id="searchInput" placeholder="Cari referensi...">
                        <button class="btn btn-primary" id="searchButton">Cari</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <select class="form-select" id="categoryFilter">
                        <option value="Semua Kategori" selected>Semua Kategori</option>
                        <option value="Fungsi Alat Ukur">Fungsi Alat Ukur</option>
                        <option value="Menganalisis Alat Ukur">Menganalisis Alat Ukur</option>
                        <option value="Penggunaan Alat Ukur">Penggunaan Alat Ukur</option>
                        <option value="Pemeliharaan Alat Ukur">Pemeliharaan Alat Ukur</option>
                        <option value="Dasar-Dasar TJKT">Dasar-Dasar TJKT</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- References Grid -->
        <div class="row g-4" id="referencesGrid">
            <!-- Reference 1 -->
            <div class="col-md-6 col-lg-4 card-item" data-category="Fungsi Alat Ukur" data-title="Fungsi Alat Ukur Teknik Jaringan Komputer dan Telekomunikasi" data-description="Panduan materi tentang berbagai alat ukur, serta mengenali jenis-jenis utama yang digunakan dalam jaringan komputer.">
                <div class="card card-reference">
                    <div class="card-body">
                        <span class="badge-category">Fungsi</span>
                        <h5 class="card-title">Fungsi Alat Ukur Teknik Jaringan Komputer dan Telekomunikasi</h5>
                        <p class="card-text">Panduan materi tentang berbagai alat ukur, serta mengenali jenis-jenis utama yang digunakan dalam jaringan komputer.</p>
                        
                        <div class="iframe-container" id="ref2-container">
                            <iframe 
                                src="https://drive.google.com/file/d/1fAnlxJXoWYf1dKkrnc4egDSkdhOB6RLQ/preview"
                                allow="autoplay fullscreen"
                                loading="lazy">
                            </iframe>
                            <button class="fullscreen-btn" onclick="toggleFullscreen('ref2-container', this)">
                                <i class="bi bi-arrows-fullscreen"></i> <span class="btn-text">Layar Penuh</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Reference 2 -->
            <div class="col-md-6 col-lg-4 card-item" data-category="Menganalisis Alat Ukur" data-title="Menganalisis Penggunaan Alat Ukur Yang Tepat" data-description="Panduan materi tentang cara menganalisis dan memilih alat ukur yang paling sesuai untuk mengatasi berbagai permasalahan.">
                <div class="card card-reference">
                    <div class="card-body">
                        <span class="badge-category">Menganalisis</span>
                        <h5 class="card-title">Menganalisis Penggunaan Alat Ukur Yang Tepat</h5>
                        <p class="card-text">Panduan materi tentang cara menganalisis dan memilih alat ukur yang paling sesuai untuk mengatasi berbagai permasalahan </p>
                        
                        <div class="iframe-container" id="ref3-container">
                            <iframe 
                                src="https://drive.google.com/file/d/1x49hPOAHYuh3lx90rYGhJ9Jrm5h4RGqf/preview"
                                allow="autoplay fullscreen"
                                loading="lazy">
                            </iframe>
                            <button class="fullscreen-btn" onclick="toggleFullscreen('ref3-container', this)">
                                <i class="bi bi-arrows-fullscreen"></i> <span class="btn-text">Layar Penuh</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reference 3 -->
            <div class="col-md-6 col-lg-4 card-item" data-category="Penggunaan Alat Ukur" data-title="Penggunaan Alat Ukur Dalam Lingkup TJKT" data-description="Panduan materi tentang prosedur menggunakan berbagai alat ukur, memastikan pengukuran yang akurat dan aman dalam setiap pekerjaan.">
                <div class="card card-reference">
                    <div class="card-body">
                        <span class="badge-category">Penggunaan</span>
                        <h5 class="card-title">Penggunaan Alat Ukur Dalam Lingkup TJKT</h5>
                        <p class="card-text">Panduan materi tentang prosedur menggunakan berbagai alat ukur, memastikan pengukuran yang akurat dan aman dalam setiap pekerjaan.</p>
                        
                        <div class="iframe-container" id="ref4-container">
                            <iframe 
                                src="https://drive.google.com/file/d/1SsVemb7uShsQgIddpgEcyqbmlrT9dpcx/preview"
                                allow="autoplay fullscreen"
                                loading="lazy">
                            </iframe>
                            <button class="fullscreen-btn" onclick="toggleFullscreen('ref4-container', this)">
                                <i class="bi bi-arrows-fullscreen"></i> <span class="btn-text">Layar Penuh</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reference 4 -->
            <div class="col-md-6 col-lg-4 card-item" data-category="Pemeliharaan Alat Ukur" data-title="Melakukan pemeliharaan Alat Ukur Dalam Lingkup TJKT" data-description="Materi lengkap tentang keamanan jaringan, enkripsi, dan perlindungan sistem informasi.">
                <div class="card card-reference">
                    <div class="card-body">
                        <span class="badge-category">Pemeliharaan</span>
                        <h5 class="card-title">Melakukan pemeliharaan Alat Ukur Dalam Lingkup TJKT</h5>
                        <p class="card-text">Materi lengkap tentang keamanan jaringan, enkripsi, dan perlindungan sistem informasi.</p>
                        
                        <div class="iframe-container" id="ref5-container">
                            <iframe 
                                src="https://drive.google.com/file/d/1SR6-1h6i_e83GdtGT-CckNQALWYMmoLu/preview"
                                allow="autoplay fullscreen"
                                loading="lazy">
                            </iframe>
                            <button class="fullscreen-btn" onclick="toggleFullscreen('ref5-container', this)">
                                <i class="bi bi-arrows-fullscreen"></i> <span class="btn-text">Layar Penuh</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Reference 5 -->
            <div class="col-md-6 col-lg-4 card-item" data-category="Dasar-Dasar TJKT" data-title="Dasar-Dasar Teknik Jaringan Komputer dan Telekomunikasi" data-description="Referensi lengkap tentang konsep dasar jaringan komputer dan sistem telekomunikasi modern.">
                <div class="card card-reference">
                    <div class="card-body">
                        <span class="badge-category">Dasar-Dasar TJKT</span>
                        <h5 class="card-title">Dasar-Dasar Teknik Jaringan Komputer dan Telekomunikasi</h5>
                        <p class="card-text">Referensi lengkap tentang konsep dasar jaringan komputer dan sistem telekomunikasi modern.</p>
                        
                        <div class="iframe-container" id="ref1-container">
                            <iframe 
                                src="https://drive.google.com/file/d/1eTeH2jcGu8J930ishR0qHuhFXwneIyhw/preview"
                                allow="autoplay fullscreen"
                                loading="lazy">
                            </iframe>
                            <button class="fullscreen-btn" onclick="toggleFullscreen('ref1-container', this)">
                                <i class="bi bi-arrows-fullscreen"></i> <span class="btn-text">Layar Penuh</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        /**
         * Toggles fullscreen mode for a given iframe container.
         * @param {string} refId - The ID of the iframe container element.
         * @param {HTMLElement} buttonElement - The button element that triggered the fullscreen toggle.
         */
        function toggleFullscreen(refId, buttonElement) {
            const iframeContainer = document.getElementById(refId);
            const btnTextSpan = buttonElement.querySelector('.btn-text');
            const btnIcon = buttonElement.querySelector('i');

            if (!document.fullscreenElement &&    // standard
                !document.mozFullScreenElement && // Firefox
                !document.webkitFullscreenElement && // Chrome, Safari and Opera
                !document.msFullscreenElement) {  // IE/Edge
                // Enter fullscreen
                if (iframeContainer.requestFullscreen) {
                    iframeContainer.requestFullscreen();
                } else if (iframeContainer.mozRequestFullScreen) { // Firefox
                    iframeContainer.mozRequestFullScreen();
                } else if (iframeContainer.webkitRequestFullscreen) { // Chrome, Safari and Opera
                    iframeContainer.webkitRequestFullscreen();
                } else if (iframeContainer.msRequestFullscreen) { // IE/Edge
                    iframeContainer.msRequestFullscreen();
                }
                iframeContainer.classList.add('fullscreen');
                btnTextSpan.textContent = 'Keluar Layar Penuh';
                btnIcon.classList.remove('bi-arrows-fullscreen');
                btnIcon.classList.add('bi-fullscreen-exit');
            } else {
                // Exit fullscreen
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) { // Firefox
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) { // Chrome, Safari and Opera
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) { // IE/Edge
                    document.msExitFullscreen();
                }
                // Class removal and text change will be handled by the 'fullscreenchange' listener
            }
        }

        /**
         * Handles fullscreen change event to update UI and remove 'fullscreen' class.
         */
        function handleFullscreenChange() {
            const fullscreenElement = document.fullscreenElement || 
                                      document.webkitFullscreenElement || 
                                      document.mozFullScreenElement || 
                                      document.msFullscreenElement;
            
            if (!fullscreenElement) {
                // If no element is in fullscreen, remove 'fullscreen' class from all containers
                document.querySelectorAll('.iframe-container.fullscreen').forEach(function(container) {
                    container.classList.remove('fullscreen');
                    const button = container.querySelector('.fullscreen-btn');
                    if (button) {
                        const btnTextSpan = button.querySelector('.btn-text');
                        const btnIcon = button.querySelector('i');
                        btnTextSpan.textContent = 'Layar Penuh';
                        btnIcon.classList.remove('bi-fullscreen-exit');
                        btnIcon.classList.add('bi-arrows-fullscreen');
                    }
                });
            }
        }

        // Add smooth scrolling and entrance animations
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card-reference');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            });

            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(50px)';
                card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
                observer.observe(card);
            });

            // Get elements for search and filter
            const searchInput = document.getElementById('searchInput');
            const searchButton = document.getElementById('searchButton');
            const categoryFilter = document.getElementById('categoryFilter');
            const referencesGrid = document.getElementById('referencesGrid');
            const allCards = Array.from(document.querySelectorAll('.card-item')); // Store all cards initially

            /**
             * Filters the reference cards based on search input and category selection.
             */
            function filterReferences() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedCategory = categoryFilter.value;

                allCards.forEach(card => {
                    const cardTitle = card.dataset.title.toLowerCase();
                    const cardDescription = card.dataset.description.toLowerCase();
                    const cardCategory = card.dataset.category;

                    const matchesSearch = cardTitle.includes(searchTerm) || cardDescription.includes(searchTerm);
                    const matchesCategory = selectedCategory === 'Semua Kategori' || cardCategory === selectedCategory;

                    if (matchesSearch && matchesCategory) {
                        card.style.display = ''; // Show the card
                    } else {
                        card.style.display = 'none'; // Hide the card
                    }
                });
            }

            // Attach event listeners for search and filter
            searchButton.addEventListener('click', filterReferences);
            searchInput.addEventListener('keyup', filterReferences); // Live search as user types
            categoryFilter.addEventListener('change', filterReferences);
        });

        // Handle fullscreen change event to update UI
        document.addEventListener('fullscreenchange', handleFullscreenChange);
        document.addEventListener('webkitfullscreenchange', handleFullscreenChange);
        document.addEventListener('mozfullscreenchange', handleFullscreenChange);
        document.addEventListener('MSFullscreenChange', handleFullscreenChange);
    </script>
</body>
</html>
