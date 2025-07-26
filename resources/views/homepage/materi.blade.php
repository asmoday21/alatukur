<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Materi - Teknik Jaringan Komputer dan Telekomunikasi</title>
    <!-- Fonts: Poppins for headings, Inter for body -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Palet warna baru: Biru Teknik, Aksen Amber
                        'new-primary': '#1e3a8a',    // Darker Blue (Technical Blue)
                        'new-secondary': '#3b82f6',  // Brighter Blue (Data/Signal Blue)
                        'new-accent': '#f59e0b',     // Amber (Highlight/LEDs)
                        'new-success': '#10b981',    // Emerald Green (Success/Pass)
                        'new-warning': '#ef4444',    // Red (Error/Fail)
                        'new-light': '#f8fafc',      // Light Gray/Off-white
                        'new-dark': '#1f2937',       // Dark Gray/Almost Black
                        'new-gray': '#6b7280',       // Medium Gray
                        'new-muted': '#e5e7eb',      // Very Light Gray
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                        'inter': ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delayed': 'float 6s ease-in-out infinite 2s',
                        'gradient': 'gradient 8s ease infinite',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'bounce-gentle': 'bounceGentle 2s infinite',
                        'pulse-soft': 'pulseSoft 3s infinite',
                        'fade-in': 'fadeIn 1s ease-out forwards',
                        'scale-in': 'scaleIn 0.5s ease-out forwards',
                        'icon-float': 'float 8s ease-in-out infinite', // Animation for floating icons
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                            '50%': { transform: 'translateY(-20px) rotate(5deg)' },
                        },
                        gradient: {
                            '0%, 100%': { backgroundPosition: '0% 50%' },
                            '50%': { backgroundPosition: '100% 50%' },
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(50px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        bounceGentle: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        pulseSoft: {
                            '0%, 100%': { opacity: '0.6' },
                            '50%': { opacity: '1' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        scaleIn: {
                            '0%': { opacity: '0', transform: 'scale(0.9)' },
                            '100%': { opacity: '1', transform: 'scale(1)' },
                        }
                    },
                    backgroundSize: {
                        '400%': '400% 400%',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            opacity: 0; /* Initial opacity for fade-in effect */
        }
        
        /* Custom gradient background for hero section */
        .bg-gradient-education {
            background: linear-gradient(-45deg, #000000, #142655, #06a2a7cb, #000000); /* Updated gradient colors */
        }
        
        /* Glassmorphism effect for translucent elements */
        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        /* Navbar glass effect on scroll */
        .navbar-scrolled {
            background: rgba(255, 255, 255, 0.95) !important; /* Use !important to override inline style */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        }
        
        /* Card hover effect for interactive elements */
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 50px rgba(30, 58, 138, 0.25); /* Adjusted shadow color to new-primary */
        }
        
        /* Text gradient for headings */
        .text-gradient {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); /* Updated text gradient */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Floating background shapes for visual interest */
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }
        
        .shape {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.1), rgba(59, 130, 246, 0.1)); /* Adjusted shape colors to new-primary/secondary */
            animation: float 6s ease-in-out infinite;
        }
        
        .shape:nth-child(1) { width: 80px; height: 80px; top: 10%; left: 10%; animation-delay: 0s; }
        .shape:nth-child(2) { width: 120px; height: 120px; top: 20%; right: 10%; animation-delay: 2s; }
        .shape:nth-child(3) { width: 100px; height: 100px; bottom: 20%; left: 20%; animation-delay: 4s; }
        .shape:nth-child(4) { width: 60px; height: 60px; top: 60%; right: 30%; animation-delay: 1s; }
        .shape:nth-child(5) { width: 90px; height: 90px; bottom: 10%; right: 15%; animation-delay: 3s; }
        
        /* Navigation link hover effect */
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background: linear-gradient(90deg, #1e3a8a, #3b82f6); /* Adjusted underline color */
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after {
            width: 100%;
        }

        /* Responsive adjustments for the grid - simplified to standard Tailwind */
        @media (min-width: 1024px) {
            .lg\:grid-cols-3 { /* Using standard Tailwind class */
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        /* Custom text shadow for the header */
        .header-shadow {
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.8); /* Changed shadow color to black with more opacity */
        }

        /* Subtle open book shadow effect for the hero section */
        .hero-book-shadow {
            position: relative;
            box-shadow: 
                0 10px 20px rgba(0, 0, 0, 0.2), /* Main shadow */
                0 0 0 10px rgba(255, 255, 255, 0.05) inset; /* Inner glow/page effect */
            border-bottom-left-radius: 50% 20px; /* Curved bottom left */
            border-bottom-right-radius: 50% 20px; /* Curved bottom right */
            overflow: hidden; /* Hide overflow from border-radius */
        }
        .hero-book-shadow::before,
        .hero-book-shadow::after {
            content: '';
            position: absolute;
            bottom: -15px; /* Position below the section */
            width: 45%;
            height: 30px;
            background: rgba(0, 0, 0, 0.1);
            filter: blur(10px);
            z-index: -1;
        }
        .hero-book-shadow::before {
            left: 5%;
            transform: skewX(-20deg);
            border-radius: 0 0 50% 0;
        }
        .hero-book-shadow::after {
            right: 5%;
            transform: skewX(20deg);
            border-radius: 0 0 0 50%;
        }

        /* Hover effect for individual list items */
        .list-item-hover {
            transition: all 0.2s ease-in-out;
        }
        .list-item-hover:hover {
            background: rgba(255, 255, 255, 0.5); /* Slightly darker white on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05); /* Subtle shadow */
            transform: translateY(-2px); /* Slight lift */
        }
    </style>
</head>
<body class="bg-new-light font-inter overflow-x-hidden animate-fade-in">
    
    <!-- Floating Background Shapes -->
    <div class="floating-shapes fixed inset-0 z-0">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <!-- Fixed Logo in Top Right Corner -->
    <div class="fixed top-4 right-4 z-50">
        <div class="w-12 h-12 bg-gradient-to-r from-new-primary to-new-secondary rounded-xl flex items-center justify-center shadow-lg">
            <!-- SVG for an open book icon -->
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="glass-effect fixed w-full top-0 z-50 backdrop-blur-lg transition-all duration-300 ease-in-out" id="main-navbar">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo (original, kept for NetPedia branding in nav) -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-new-primary to-new-secondary rounded-xl flex items-center justify-center"> <!-- Removed animate-bounce-gentle -->
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-gradient font-poppins">NetPedia</span>
                </div>

                 <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/') }}" class="nav-link text-new-dark hover:text-new-primary font-medium flex items-center">
                        <svg class="w-5 h-5 mr-2 text-new-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8l2 2m-2-2l-2 2"/>
                        </svg>
                        Beranda
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg glass-effect" aria-label="Toggle mobile menu">
                    <svg class="w-6 h-6 text-new-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 p-4 glass-effect rounded-2xl">
                <div class="flex flex-col space-y-3">
                    <a href="{{ url('/') }}" class="text-new-dark hover:text-new-primary font-medium py-2">Beranda</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero-section" class="relative pt-28 pb-20 bg-gradient-education overflow-hidden hero-book-shadow">
        <div class="container mx-auto px-6 text-center relative z-10">
            <div class="animate-slide-up">
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight font-poppins header-shadow">
                    Daftar Materi
                    <span class="block text-3xl md:text-4xl font-medium opacity-90 mt-2">Pembelajaran</span>
                </h1>
                <p class="text-xl md:text-2xl text-white/90 mb-4 max-w-3xl mx-auto font-inter">
                    Dasar-Dasar Teknik Jaringan Komputer dan Telekomunikasi Elemen Alat Ukur dan Pengukuran
                </p>
                <p class="text-lg text-white/80 font-poppins">SMK/MAK Kelas X</p>
            </div>
            <!-- Icons will be injected here by JavaScript -->
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-16 relative z-10">
        <!-- Section Title -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gradient mb-4 font-poppins">Materi Pembelajaran</h2>
            <p class="text-xl text-new-gray max-w-2xl mx-auto font-inter">
                Jelajahi konsep dasar dan penggunaan alat ukur dalam jaringan komputer
            </p>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3-custom gap-8">
            
            <!-- Card 1: Fungsi Alat Ukur -->
            <div class="card-hover bg-white rounded-3xl p-8 shadow-xl border border-new-muted/30 animate-slide-up" style="animation-delay: 0.1s;">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-r from-new-primary to-new-success rounded-2xl flex items-center justify-center mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-new-dark font-poppins">Fungsi Alat Ukur</h3>
                        <p class="text-new-gray text-sm font-inter">Teknik Jaringan Komputer dan Telekomunikasi</p>
                    </div>
                </div>
                
                <p class="text-new-dark mb-6 leading-relaxed font-inter">
                    Mempelajari peran fundamental berbagai alat ukur, serta mengenali jenis-jenis utama yang digunakan dalam jaringan komputer dan telekomunikasi.
                </p>

                <div class="space-y-3">
                    <h4 class="font-semibold text-new-dark flex items-center font-poppins">
                        <span class="w-2 h-2 bg-new-success rounded-full mr-2"></span>
                        Poin Pembelajaran:
                    </h4>
                    <div class="space-y-2">
                        <div class="flex items-center p-3 bg-gradient-to-r from-new-light to-white rounded-xl border border-new-muted/20">
                            <span class="text-new-success font-bold mr-3">✓</span>
                            <span class="text-sm text-new-dark font-inter">Pengertian Alat Ukur Jaringan</span>
                        </div>
                        <div class="flex items-center p-3 bg-gradient-to-r from-new-light to-white rounded-xl border border-new-muted/20">
                            <span class="text-new-success font-bold mr-3">✓</span>
                            <span class="text-sm text-new-dark font-inter">Mengenali jenis-jenis alat ukur (LAN tester, Multimeter, OPM, OTDR, dll.)</span>
                        </div>
                        <div class="flex items-center p-3 bg-gradient-to-r from-new-light to-white rounded-xl border border-new-muted/20">
                            <span class="text-new-success font-bold mr-3">✓</span>
                            <span class="text-sm text-new-dark font-inter">Memahami kegunaan spesifik setiap alat.</span>
                        </div>
                        <div class="flex items-center p-3 bg-gradient-to-r from-new-light to-white rounded-xl border border-new-muted/20">
                            <span class="text-new-success font-bold mr-3">✓</span>
                            <span class="text-sm text-new-dark font-inter">Pentingnya penguasaan fungsi alat untuk pemeliharaan.</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Analisis Penggunaan Alat Ukur yang Tepat -->
            <div class="card-hover bg-white rounded-3xl p-8 shadow-xl border border-new-muted/30 animate-slide-up" style="animation-delay: 0.2s;">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-r from-new-secondary to-new-accent rounded-2xl flex items-center justify-center mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-new-dark font-poppins">Analisis Penggunaan Alat Ukur</h3>
                        <p class="text-new-gray text-sm font-inter">Pemilihan Alat yang Tepat</p>
                    </div>
                </div>
                
                <p class="text-new-dark mb-6 leading-relaxed font-inter">
                    Mempelajari cara menganalisis dan memilih alat ukur yang paling sesuai untuk mengatasi berbagai permasalahan umum dalam jaringan komputer dan telekomunikasi.
                </p>

                <div class="space-y-3">
                    <h4 class="font-semibold text-new-dark flex items-center font-poppins">
                        <span class="w-2 h-2 bg-new-accent rounded-full mr-2"></span>
                        Poin Pembelajaran:
                    </h4>
                    <div class="space-y-2">
                        <div class="flex items-center p-3 bg-gradient-to-r from-new-light to-white rounded-xl border border-new-muted/20">
                            <span class="text-new-accent font-bold mr-3">✓</span>
                            <span class="text-sm text-new-dark font-inter">Identifikasi masalah jaringan dan telekomunikasi.</span>
                        </div>
                        <div class="flex items-center p-3 bg-gradient-to-r from-new-light to-white rounded-xl border border-new-muted/20">
                            <span class="text-new-accent font-bold mr-3">✓</span>
                            <span class="text-sm text-new-dark font-inter">Pemilihan alat ukur berdasarkan spesifikasi.</span>
                        </div>
                        <div class="flex items-center p-3 bg-gradient-to-r from-new-light to-white rounded-xl border border-new-muted/20">
                            <span class="text-new-accent font-bold mr-3">✓</span>
                            <span class="text-sm text-new-dark font-inter">Studi kasus penerapan alat ukur.</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Penggunaan Alat Ukur dalam Lingkup Pekerjaan -->
            <div class="card-hover bg-white rounded-3xl p-8 shadow-xl border border-new-muted/30 lg:col-span-1-custom animate-slide-up" style="animation-delay: 0.3s;">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-r from-new-warning to-new-primary rounded-2xl flex items-center justify-center mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-new-dark font-poppins">Penggunaan Alat Ukur</h3>
                        <p class="text-new-gray text-sm font-inter">Pengoperasian dan Prosedur</p>
                    </div>
                </div>
                
                <p class="text-new-dark mb-6 leading-relaxed font-inter">
                    Menguasai prosedur operasional standar untuk menggunakan berbagai alat ukur, memastikan pengukuran yang akurat dan aman dalam setiap skenario pekerjaan.
                </p>

                <div class="space-y-3">
                    <h4 class="font-semibold text-new-dark flex items-center font-poppins">
                        <span class="w-2 h-2 bg-new-warning rounded-full mr-2"></span>
                        Poin Pembelajaran:
                    </h4>
                    <div class="space-y-2">
                        <div class="flex items-center p-3 bg-gradient-to-r from-new-light to-white rounded-xl border border-new-muted/20">
                            <span class="text-new-warning font-bold mr-3">✓</span>
                            <span class="text-sm text-new-dark font-inter">Prosedur penggunaan LAN tester, Multimeter, Earth Tester.</span>
                        </div>
                        <div class="flex items-center p-3 bg-gradient-to-r from-new-light to-white rounded-xl border border-new-muted/20">
                            <span class="text-new-warning font-bold mr-3">✓</span>
                            <span class="text-sm text-new-dark font-inter">Teknik pengukuran OPM dan OTDR.</span>
                        </div>
                        <div class="flex items-center p-3 bg-gradient-to-r from-new-light to-white rounded-xl border border-new-muted/20">
                            <span class="text-new-warning font-bold mr-3">✓</span>
                            <span class="text-sm text-new-dark font-inter">Aplikasi Speed Test, Wi-Fi Analyzer, dan Ping Test.</span>
                        </div>
                         <div class="flex items-center p-3 bg-gradient-to-r from-new-light to-white rounded-xl border border-new-muted/20">
                            <span class="text-new-warning font-bold mr-3">✓</span>
                            <span class="text-sm text-new-dark font-inter">Prosedur keselamatan kerja.</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4: Pemeliharaan Alat Ukur -->
            <div class="card-hover bg-white rounded-3xl p-8 shadow-xl border border-new-muted/30 animate-slide-up" style="animation-delay: 0.4s;">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-r from-new-accent to-new-success rounded-2xl flex items-center justify-center mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924-1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-new-dark font-poppins">Pemeliharaan Alat Ukur</h3>
                        <p class="text-new-gray text-sm font-inter">Menjaga Kualitas dan Umur Alat</p>
                    </div>
                </div>
                
                <p class="text-new-dark mb-6 leading-relaxed font-inter">
                     Memahami pentingnya perawatan berkala dan jenis-jenis pemeliharaan untuk menjaga akurasi dan memperpanjang usia pakai alat ukur.
                </p>

                <div class="space-y-3">
                    <h4 class="font-semibold text-new-dark flex items-center font-poppins">
                        <span class="w-2 h-2 bg-new-success rounded-full mr-2"></span>
                        Poin Pembelajaran:
                    </h4>
                    <div class="space-y-2">
                        <div class="flex items-center p-3 bg-gradient-to-r from-new-light to-white rounded-xl border border-new-muted/20">
                            <span class="text-new-success font-bold mr-3">✓</span>
                            <span class="text-sm text-new-dark font-inter">Jenis-jenis pemeliharaan alat ukur (Preventif, Korektif, Kualitatif).</span>
                        </div>
                        <div class="flex items-center p-3 bg-gradient-to-r from-new-light to-white rounded-xl border border-new-muted/20">
                            <span class="text-new-success font-bold mr-3">✓</span>
                            <span class="text-sm text-new-dark font-inter">Keterampilan dan sikap kerja dalam pemeliharaan.</span>
                        </div>
                        <div class="flex items-center p-3 bg-gradient-to-r from-new-light to-white rounded-xl border border-new-muted/20">
                            <span class="text-new-success font-bold mr-3">✓</span>
                            <span class="text-sm text-new-dark font-inter">Praktik perawatan rutin dan penyimpanan yang benar.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="mt-20 text-center">
            <div class="glass-effect rounded-3xl p-8 md:p-12 max-w-4xl mx-auto animate-scale-in">
                <h3 class="text-3xl md:text-4xl font-bold text-new-dark mb-4 font-poppins">
                    Siap Memulai Perjalanan Belajar?
                </h3>
                <p class="text-xl text-new-gray mb-8 max-w-2xl mx-auto font-inter">
                    Bergabunglah dengan ribuan siswa yang telah menguasai teknologi jaringan komputer
                </p>
                <a href="{{ route('login') }}" class="bg-gradient-to-r from-new-primary to-new-secondary text-white px-8 py-4 rounded-2xl font-semibold text-lg shadow-lg hover:shadow-xl transform transition-all duration-300 hover:scale-105">
                    Mulai Belajar Sekarang
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-new-dark to-gray-900 text-white py-12 mt-20">
        <div class="container mx-auto px-6 text-center">
            <div class="mb-8">
                <div class="flex items-center justify-center space-x-3 mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-new-primary to-new-secondary rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold font-poppins">NetPedia</span>
                </div>
                <p class="text-gray-300 max-w-2xl mx-auto font-inter">
                    Platform pembelajaran modern untuk Teknik Jaringan Komputer dan Telekomunikasi. 
                    Membangun masa depan teknologi Indonesia.
                </p>
            </div>
            
            <div class="border-t border-gray-700 pt-8">
                <p class="text-gray-400 font-inter">
                    &copy; 2025 NetPedia. Dibuat dengan ❤️ untuk pendidikan Indonesia.
                </p>
            </div>
        </div>
    </footer>

    <!-- JavaScript for dynamic icons -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const heroSection = document.getElementById('hero-section');

            const iconData = [
                // Row 1
                { name: 'LAN Tester', path: '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15H9v-2h2v2zm0-4H9v-2h2v2zm0-4H9V7h2v2zm4 8h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V7h2v2z"/>', top: '15%', left: '8%', delay: '0s' },
                { name: 'Multimeter', path: '<path d="M19 5h-2V3h-2v2h-2V3h-2v2H9V3H7v2H5c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 14H5V7h14v12zM7 9h10v2H7zm0 4h10v2H7z"/>', top: '15%', left: '28%', delay: '0.5s' },
                { name: 'OPM', path: '<path d="M20 5h-3.25c-.41 0-.75-.34-.75-.75V3c0-.41-.34-.75-.75-.75s-.75.34-.75.75v1.25c0 .41-.34.75-.75.75H4c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm-1 12H5c-.55 0-1-.45-1-1V8h16v8c0 .55-.45 1-1 1zM7 10h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z"/>', top: '15%', left: '48%', delay: '1s' },
                { name: 'OTDR', path: '<path d="M16 18H8c-1.1 0-2 .9-2 2s.9 2 2 2h8c1.1 0 2-.9 2-2s-.9-2-2-2zm2-16H6c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-1 12H7V6h10v8zM9 8h2v2H9zm4 0h2v2h-2z"/>', top: '15%', left: '68%', delay: '1.5s' },
                { name: 'Fusion Splicer', path: '<path d="M17 7h-4v2h4c1.65 0 3 1.35 3 3s-1.35 3-3 3h-4v2h4c2.76 0 5-2.24 5-5s-2.24-5-5-5zm-10 4h4V9H7c-1.65 0-3-1.35-3-3s1.35-3 3-3h4V2H7C4.24 2 2 4.24 2 7s2.24 5 5 5zm-3 5h4v-2H4c-1.65 0-3-1.35-3-3s1.35-3 3-3h4V9H4c-2.76 0-5 2.24-5 5s2.24 5 5 5zm10-4h-4v2h4c1.65 0 3 1.35 3 3s-1.35 3-3 3h-4v2h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/>', top: '15%', right: '8%', delay: '2s' },

                // Row 2
                { name: 'Wi-Fi', path: '<path d="M1 9L12 20L23 9H1ZM12 11.5L17 16H7L12 11.5ZM5.64 5.64L12 12L18.36 5.64C15.72 3.0 12.28 2 12 2C11.72 2 8.28 3.0 5.64 5.64Z"/>', top: '45%', left: '15%', delay: '2.5s' },
                // { name: 'Jaringan', path: '<path d="M20 5h-3.25c-.41 0-.75-.34-.75-.75V3c0-.41-.34-.75-.75-.75s-.75.34-.75.75v1.25c0 .41-.34.75-.75.75H4c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm-1 12H5c-.55 0-1-.45-1-1V8h16v8c0 .55-.45 1-1 1zM7 10h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z"/>', top: '45%', left: '40%', delay: '3s' },
                { name: 'RJ45', path: '<path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 16H6V6h12v13zM8 9h2v2H8zm0 4h2v2H8zm4-4h2v2h-2zm0 4h2v2h-2z"/>', top: '45%', right: '15%', delay: '3.5s' },

                // Row 3
                { name: 'LAN Cable', path: '<path d="M4 4h16v4H4zm0 6h16v10H4zM6 6h2v2H6zm0 6h2v2H6zm4-6h2v2h-2zm0 6h2v2h-2zm4-6h2v2h-2zm0 6h2v2h-2z"/>', top: '75%', left: '10%', delay: '4s' },
                { name: 'Komputer', path: '<path d="M20 18c1.1 0 1.99-.9 1.99-2L22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2H0v2h24v-2h-4zM4 6h16v10H4V6z"/>', top: '75%', left: '35%', delay: '4.5s' },
                { name: 'CPU', path: '<path d="M12 3C7 3 2.73 6.11 1 10.5L3.2 11.4C4.64 8.02 8.06 5.5 12 5.5s7.36 2.52 8.8 5.9l2.2-.9C21.27 6.11 17 3 12 3zm0 4c-3.03 0-5.64 1.64-7.1 4.1l2.21.9C8.18 10.52 9.97 9.5 12 9.5s3.82 1.02 4.89 2.5l2.21-.9C17.64 8.64 15.03 7 12 7zm0 4c-1.49 0-2.79.83-3.48 2.05l2.15.88c.36-.54.98-.93 1.67-.93s1.31.39 1.67.93l2.15-.88C14.79 11.83 13.49 11 12 11zm0 3c-.83 0-1.5.67-1.5 1.5S11.17 17 12 17s1.5-.67 1.5-1.5S12.83 14 12 14z"/>', top: '75%', left: '60%', delay: '5s' },
                { name: 'Akses', path: '<path d="M4 4h16v2H4zm0 3h16v13c0 1.1-.9 2-2 2H6c-1.1 0-2-.9-2-2V7zm8 3c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm-1 4c0 .55.45 1 1 1s1-.45 1-1-.45-1-1-1-1 .45-1 1z"/>', top: '75%', right: '10%', delay: '5.5s' },
                // { name: 'Antena', path: '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/>', top: '25%', right: '25%', delay: '6s' }
            ];

            iconData.forEach(icon => {
                const iconDiv = document.createElement('div');
                iconDiv.className = `absolute w-16 h-16 text-white/70 animate-icon-float`;
                iconDiv.style.top = icon.top;
                if (icon.left) {
                    iconDiv.style.left = icon.left;
                } else if (icon.right) {
                    iconDiv.style.right = icon.right;
                }
                iconDiv.style.animationDelay = icon.delay;
                iconDiv.innerHTML = `<svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">${icon.path}</svg>`;
                heroSection.querySelector('.container').appendChild(iconDiv);
            });
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Add scroll effect to navbar
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.style.background = 'rgba(255, 255, 255, 0.95)';
                nav.classList.add('shadow-md'); /* Add shadow on scroll */
            } else {
                nav.style.background = 'rgba(255, 255, 255, 0.25)';
                nav.classList.remove('shadow-md'); /* Remove shadow when at top */
            }
        });
    </script>
</body>
</html>
