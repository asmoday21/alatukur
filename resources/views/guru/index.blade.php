@extends('guru.guru_master')

@section('guru')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru Dashboard</title>
    <!-- Load Material Design Icons -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom font for better aesthetics */
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Custom Colors for Tailwind */
        .bg-gradient-header {
            background: linear-gradient(135deg, #0A1931, #185ADB); /* Dark Navy to Royal Blue */
        }

        /* Custom Card Colors - Complementing Navy */
        .bg-card-materi { background-color: #04e963; } /* Emerald Green */
        .bg-card-tugas { background-color: #faa945; } /* Orange */
        .bg-card-nilai { background-color: #196cb1; } /* Light Blue */
        .bg-card-quiz { background-color: #e90549; } /* Amethyst */

        /* Card Hover Animation */
        .card-hover {
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            border-radius: 12px; /* Slightly more rounded */
            overflow: hidden; /* Ensure content stays within rounded corners */
        }
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02); /* More pronounced lift and slight scale */
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25) !important; /* Stronger shadow */
        }
        .card-hover .icon-rounded {
            transition: transform 0.3s ease-out;
        }
        .card-hover:hover .icon-rounded {
            transform: rotateY(180deg); /* Flip icon on hover */
        }

        /* Icon Styling */
        .icon-rounded {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Wave Shape Styling */
        .wave-shape {
            transform: rotate(180deg);
        }
        .wave-shape svg path {
            fill: rgba(255, 255, 255, 0.1); /* Lighter wave color for contrast */
        }

        /* Header Content Animation */
        @keyframes fadeInSlideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-slide-down {
            animation: fadeInSlideDown 1s ease-out forwards;
        }

        /* Badge Pulse Animation */
        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7);
            }
            70% {
                transform: scale(1.05);
                box-shadow: 0 0 0 10px rgba(255, 255, 255, 0);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
            }
        }
        .badge-pulse {
            animation: pulse 2s infinite;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .icon-rounded {
                width: 60px;
                height: 60px;
            }
            .icon-rounded i {
                font-size: 28px !important;
            }
            .header-content {
                text-align: center;
            }
        }

        /* Accordion specific styles */
        .accordion-header {
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .accordion-header:hover {
            background-color: #e0f2fe; /* Light Blue 50 - slightly more vibrant hover */
        }
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-out, padding 0.5s ease-out;
        }
        .accordion-content.active {
            max-height: 500px; /* Adjust as needed, should be larger than content */
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        .accordion-icon {
            transition: transform 0.3s ease;
        }
        .accordion-icon.rotate {
            transform: rotate(90deg);
        }
        /* Text Justification */
        .text-justify-custom {
            text-align: justify;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container-fluid px-0">
  <!-- Header dengan gradient dan ilustrasi -->
  <div class="w-100 py-4" style="background: linear-gradient(135deg, #02178a, #c40e59); position: relative; overflow: hidden;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8 py-4">
          <h2 class="fw-bold mb-2" style="font-size: 2.5rem; color: #fff;">
            Selamat Datang, {{ Auth::user()->name }}
          </h2>
          <p class="text-white mb-3" style="font-size: 1.1rem; opacity: 0.9;">
            Dashboard Guru - Kelola materi, nilai siswa, dan tugas dengan mudah
          </p>
          <div class="d-flex align-items-center">
            <div class="badge bg-white text-primary me-3 px-3 py-2 rounded-pill">
              <i class="mdi mdi-calendar-check mdi-18px me-2"></i>
              <span id="current-date"></span>
            </div>
            <div class="badge bg-white text-primary px-3 py-2 rounded-pill">
              <i class="mdi mdi-clock-outline mdi-18px me-2"></i>
              <span id="current-time"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="wave-shape" style="position: absolute; bottom: 0; left: 0; width: 100%; overflow: hidden; line-height: 0;">
      <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="width: 100%; height: 40px;">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="#ffffff"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="#ffffff"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="#ffffff"></path>
      </svg>
    </div>
  </div>

        <!-- Konten Utama -->
        <div class="main-panel">
            <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
                <!-- Bagian CP dan ATP -->
                <div class="mb-8">
                    <h4 class="font-bold mb-4 text-2xl text-gray-800">Capaian Pembelajaran & Tujuan Pembelajaran Fase E</h4>
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="accordion-item">
                            <div class="accordion-header flex justify-between items-center p-4 bg-gray-100 rounded-md shadow-sm hover:bg-blue-50" onclick="toggleAccordion('profesiKewirausahaan')">
                                <h5 class="font-semibold text-lg text-gray-800">Alat Ukur dan Pengukuran Bidang TJKT</h5>
                                <i class="mdi mdi-chevron-right mdi-24px text-gray-600 accordion-icon" id="icon-profesiKewirausahaan"></i>
                            </div>
                            <div class="accordion-content px-4" id="content-profesiKewirausahaan">
                                <h6 class="font-bold text-md mt-4 mb-2 text-gray-700">Capaian Pembelajaran (CP):</h6>
                                <p class="text-gray-600 text-sm mb-4 text-justify-custom">
                                    Pada akhir fase E, kamu mampu menggunakan dan merawat alat ukur jaringan komputer dan sistem telekomunikasi.
                                </p>
                                <h6 class="font-bold text-md mb-2 text-gray-700">Tujuan Pembelajaran (TP):</h6>
                                <p class="list-disc list-inside text-gray-600 text-sm text-justify-custom">
                                    Melalui pembelajaran ini, kamu diharapkan memahami jenis alat ukur dalam jaringan dan bisa memilih alat yang tepat untuk menyelesaikan masalah jaringan. Kamu juga akan belajar cara menggunakan serta merawatnya agar selalu siap digunakan.
                                <p>
                            </div>
                        </div>
                        <!-- Anda bisa menambahkan item CP/ATP lain di sini jika diperlukan -->
                    </div>
                </div>

                <!-- Menu Utama -->
                <div class="mb-8">
                    <h4 class="font-bold mb-4 text-2xl text-gray-800">Menu Utama</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Card Materi -->
                        <div class="col">
                            <a href="/guru/materi" class="card h-full border-0 shadow-lg card-hover text-decoration-none block">
                                <div class="card-body text-center p-6">
                                    <div class="icon-rounded mb-4 mx-auto bg-card-materi">
                                        <i class="mdi mdi-book-open-variant mdi-36px text-white"></i>
                                    </div>
                                    <h5 class="font-bold mb-2 text-xl text-gray-800">Materi</h5>
                                    <p class="text-gray-600 text-sm mb-0">Lihat dan pelajari materi</p>
                                </div>
                            </a>
                        </div>
                        <!-- Card Tugas -->
                        <div class="col">
                            <a href="/guru/tugas" class="card h-full border-0 shadow-lg card-hover text-decoration-none block">
                                <div class="card-body text-center p-6">
                                    <div class="icon-rounded mb-4 mx-auto bg-card-tugas">
                                        <i class="mdi mdi-file-document-edit mdi-36px text-white"></i>
                                    </div>
                                    <h5 class="font-bold mb-2 text-xl text-gray-800">Tugas</h5>
                                    <p class="text-gray-600 text-sm mb-0">Kerjakan tugas kamu</p>
                                </div>
                            </a>
                        </div>
                        <!-- Card Nilai -->
                        <div class="col">
                            <a href="/guru/nilai" class="card h-full border-0 shadow-lg card-hover text-decoration-none block">
                                <div class="card-body text-center p-6">
                                    <div class="icon-rounded mb-4 mx-auto bg-card-nilai">
                                        <i class="mdi mdi-chart-bar mdi-36px text-white"></i>
                                    </div>
                                    <h5 class="font-bold mb-2 text-xl text-gray-800">Nilai</h5>
                                    <p class="text-gray-600 text-sm mb-0">Lihat hasil penilaian</p>
                                </div>
                            </a>
                        </div>
                        <!-- Card Quiz & Evaluasi -->
                        <div class="col">
                            <a href="/guru/quiz" class="card h-full border-0 shadow-lg card-hover text-decoration-none block">
                                <div class="card-body text-center p-6">
                                    <div class="icon-rounded mb-4 mx-auto bg-card-quiz">
                                        <i class="mdi mdi-clipboard-text mdi-36px text-white"></i>
                                    </div>
                                    <h5 class="font-bold mb-2 text-xl text-gray-800">Quiz & Evaluasi</h5>
                                    <p class="text-gray-600 text-sm mb-0">Ikuti kuis interaktif</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk tanggal dan waktu -->
    <script>
        function updateDateTime() {
            const now = new Date();
            const optionsDate = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const optionsTime = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
            document.getElementById('current-date').textContent = now.toLocaleDateString('id-ID', optionsDate);
            document.getElementById('current-time').textContent = now.toLocaleTimeString('id-ID', optionsTime);
        }
        // Update immediately on load
        updateDateTime();
        // Then update every second
        setInterval(updateDateTime, 1000);

        // Fungsi untuk toggle accordion
        function toggleAccordion(id) {
            const content = document.getElementById(`content-${id}`);
            const icon = document.getElementById(`icon-${id}`);

            if (content.classList.contains('active')) {
                content.classList.remove('active');
                icon.classList.remove('rotate');
            } else {
                // Close all other open accordions if you want only one open at a time
                document.querySelectorAll('.accordion-content.active').forEach(item => {
                    item.classList.remove('active');
                    item.previousElementSibling.querySelector('.accordion-icon').classList.remove('rotate');
                });

                content.classList.add('active');
                icon.classList.add('rotate');
            }
        }
    </script>
</body>
</html>
@endsection