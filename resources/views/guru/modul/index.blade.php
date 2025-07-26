<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Alat Ukur dan Pengukuran | Teknik Jaringan Komputer</title>

    <!-- Bootstrap CSS (if still needed, though Tailwind is primary) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (for some icons, or switch fully to Font Awesome/Lucide) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        /* Define custom CSS variables for consistent theming */
        :root {
            --primary-color: #005792; /* Deep Blue - for main elements, links */
            --secondary-color: #00C2D1; /* Bright Cyan/Teal - for accents, digital displays */
            --success-color: #4CAF50; /* Green - for success, completed */
            --danger-color: #F44336; /* Red - for errors, warnings (used cautiously) */
            --warning-color: #FFC107; /* Amber - for locked, caution */
            --info-color: #64f321; /* Medium Blue - for general info */

            --light-bg-start: #EFEFF1; /* Very subtle light grey background start */
            --light-bg-end: #D8DBDF; /* Slightly darker light grey background end */
            --card-bg-light: #FFFFFF; /* Pure White Card background */
            --border-light: #E0E0E0; /* Light grey border */
            --text-dark-primary: #212121; /* Deep dark grey for main text */
            --text-dark-secondary: #757575; /* Medium grey for secondary text */
            --shadow-light: 0 8px 25px rgba(0, 0, 0, 0.06); /* Softer shadow */
            --header-glow: 0 0 40px rgba(0, 87, 146, 0.2); /* Glow based on primary */
            --button-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* Softer button shadow */
        }

        /* General body styling */
        body {
            font-family: 'Inter', sans-serif; /* Prefer Inter as body font */
            background: linear-gradient(to right, var(--light-bg-start), var(--light-bg-end));
            color: var(--text-dark-primary);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased; /* Smoother fonts on WebKit browsers */
        }
        
        .header-bg {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .accordion-item.active .accordion-content {
            max-height: 500px; /* Adjust as needed */
            opacity: 1;
            padding-top: 1rem;
        }
        .accordion-content {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-out, opacity 0.5s ease-out, padding-top 0.5s ease-out;
        }
        .animated-underline {
            display: inline-block;
            position: relative;
            cursor: pointer;
        }
        .animated-underline::after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: var(--secondary-color); /* Highlight color */
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
        }
        .animated-underline:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }
        .progress-bar-container {
            width: 100%;
            background-color: #e0e0e0;
            border-radius: 9999px; /* Full rounded corners */
            overflow: hidden;
        }
        .progress-bar {
            height: 12px;
            background-color: var(--secondary-color); /* Teal color */
            width: 0%; /* Initial width */
            border-radius: 9999px;
            transition: width 0.5s ease-in-out;
        }
        /* Overriding specific Bootstrap styles to use custom variables or Poppins font */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark-primary);
        }
        .btn {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }
        .bg-white {
            background-color: var(--card-bg-light);
        }
        .text-gray-900 {
            color: var(--text-dark-primary);
        }
        .text-gray-700 {
            color: var(--text-dark-secondary);
        }
        .shadow-md {
            box-shadow: var(--shadow-light);
        }
        .shadow-lg {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15); /* Slightly stronger for header */
        }
        .rounded-lg {
            border-radius: 0.5rem; /* Consistent border radius */
        }
        .rounded-full {
            border-radius: 9999px; /* Full rounded for pills/buttons */
        }
        .bg-blue-50 { /* Custom color for 'Siap untuk Tantangan Berikutnya?' section */
            background-color: rgba(0, 87, 146, 0.05);
        }
        .bg-yellow-400 { /* Custom color for 'Mulai Belajar' button */
            background-color: var(--warning-color);
        }
        .hover\:bg-yellow-500:hover { /* Custom color for 'Mulai Belajar' button hover */
            background-color: #e6b300;
        }
        .text-gray-900 { /* For button text */
            color: #212121;
        }
        .bg-indigo-500 { /* Primary button on cards */
            background-color: var(--primary-color);
        }
        .hover\:bg-indigo-600:hover { /* Primary button hover on cards */
            background-color: #004573;
        }
        .bg-purple-500 { /* Secondary button on cards */
            background-color: #6a0dad; /* A different shade for distinction */
        }
        .hover\:bg-purple-600:hover { /* Secondary button hover on cards */
            background-color: #4a007a;
        }
        .bg-red-500 { /* Tertiary button on cards */
            background-color: var(--danger-color);
        }
        .hover\:bg-red-600:hover { /* Tertiary button hover on cards */
            background-color: #c02c20;
        }
        .bg-green-500 { /* New color for maintenance button */
            background-color: #4CAF50;
        }
        .hover\:bg-green-600:hover { /* New color for maintenance button hover */
            background-color: #388E3C;
        }
        .bg-blue-600 { /* Button in the "Siap untuk Tantangan Berikutnya?" section */
            background-color: var(--primary-color);
        }
        .hover\:bg-blue-700:hover { /* Button hover in the "Siap untuk Tantangan Berikutnya?" section */
            background-color: #004573;
        }

        /* Custom text shadow utilities for Tailwind CSS */
        .text-shadow-md {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }
        .text-shadow-lg {
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body>
    @extends('guru.guru_master')

    @section('guru')

    <header class="header-bg text-white py-8 shadow-lg rounded-b-lg">
        <div class="container mx-auto px-6 text-center">
            <!-- Added text-shadow-lg for a more prominent shadow -->
            <h1 class="text-4xl md:text-5xl font-extrabold mb-2 text-shadow-lg">Kuasai Alat Ukur Jaringan!</h1>
            <!-- Added text-shadow-md for a subtle shadow -->
            <p class="text-xl md:text-2xl font-light text-shadow-md">Materi Alat Ukur dan Pengukuran Jaringan Telekomunikasi</p>
            <div class="mt-4">
                <a href="#materi" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-3 px-8 rounded-full transition duration-300 ease-in-out transform hover:scale-105 shadow-md">Mulai Belajar <i class="fas fa-arrow-down ml-2"></i></a>
            </div>
        </div>
    </header>

    <main id="materi" class="container mx-auto px-6 py-12">
        <section class="mb-12 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Peta Konsep Pembelajaran</h2>
            <p class="text-lg text-gray-700 max-w-2xl mx-auto">
                Temukan alur pembelajaran Anda dalam dasar-dasar teknik jaringan komputer dan telekomunikasi. Setiap bagian akan membuka wawasan baru!
            </p>
        </section>

        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8"> <!-- Changed to lg:grid-cols-2 -->
            <div class="bg-white rounded-lg shadow-md p-6 card-hover transition duration-300 ease-in-out flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3 flex items-center">
                        <i class="fas fa-tachometer-alt text-indigo-500 mr-3"></i>
                        <span class="animated-underline">Fungsi Alat Ukur TJKT</span>
                    </h3>
                    <p class="text-gray-700 mb-4">
                        Mempelajari peran fundamental berbagai alat ukur, serta mengenali jenis-jenis utama yang digunakan dalam jaringan komputer dan telekomunikasi.
                    </p>
                </div>
                <div class="mt-4">
                    <button class="toggle-details bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg w-full transition duration-300 ease-in-out">
                        Lihat Detail <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                    <div class="details-content mt-4 hidden">
                        <ul class="list-disc list-inside text-gray-700">
                            <li>Pengertian Alat Ukur Jaringan</li>
                            <li>Jenis-jenis Alat Ukur Listrik (Multimeter, Tang Ampere, Earth Tester)</li>
                            <li>Jenis-jenis Alat Ukur Optik (OPM, OTDR)</li>
                            <li>Jenis-jenis Alat Ukur Jaringan Nirkabel (Wi-Fi Analyzer, Speed Test)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 card-hover transition duration-300 ease-in-out flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3 flex items-center">
                        <i class="fas fa-search-dollar text-purple-500 mr-3"></i>
                        <span class="animated-underline">Analisis Penggunaan Alat Ukur yang Tepat</span>
                    </h3>
                    <p class="text-gray-700 mb-4">
                        Mempelajari cara menganalisis dan memilih alat ukur yang paling sesuai untuk mengatasi berbagai permasalahan umum dalam jaringan komputer dan telekomunikasi.
                    </p>
                </div>
                <div class="mt-4">
                    <button class="toggle-details bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-lg w-full transition duration-300 ease-in-out">
                        Lihat Detail <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                    <div class="details-content mt-4 hidden">
                        <ul class="list-disc list-inside text-gray-700">
                            <li>Prosedur Penggunaan LAN Tester untuk Kabel UTP/Fiber</li>
                            <li>Prinsip Kerja dan Penggunaan OTDR untuk Serat Optik</li>
                            <li>Interpretasi Hasil Pengukuran OPM</li>
                            <li>Studi Kasus Penerapan Alat Ukur</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 card-hover transition duration-300 ease-in-out flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3 flex items-center">
                        <i class="fas fa-tools text-red-500 mr-3"></i> <!-- Changed icon to fa-tools -->
                        <span class="animated-underline">Penggunaan Alat Ukur</span>
                    </h3>
                    <p class="text-gray-700 mb-4">
                        Menguasai teknik penggunaan praktis berbagai alat ukur untuk memastikan pengukuran yang akurat dan aman dalam setiap skenario pekerjaan.
                    </p>
                </div>
                <div class="mt-4">
                    <button class="toggle-details bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg w-full transition duration-300 ease-in-out">
                        Lihat Detail <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                    <div class="details-content mt-4 hidden">
                        <ul class="list-disc list-inside text-gray-700">
                            <li>Prosedur penggunaan LAN tester</li>
                            <li>Teknik pengukuran OPM dan OTDR</li>
                            <li>Aplikasi Speed Test, Wi-Fi Analyzer, dan Ping Test</li>
                            <li>Prosedur keselamatan kerja</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 card-hover transition duration-300 ease-in-out flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3 flex items-center">
                        <i class="fas fa-sync-alt text-green-500 mr-3"></i> <!-- New icon for maintenance -->
                        <span class="animated-underline">Pemeliharaan Alat Ukur</span>
                    </h3>
                    <p class="text-gray-700 mb-4">
                        Memahami pentingnya perawatan berkala dan jenis-jenis pemeliharaan untuk menjaga akurasi dan memperpanjang usia pakai alat ukur.
                    </p>
                </div>
                <div class="mt-4">
                    <button class="toggle-details bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg w-full transition duration-300 ease-in-out">
                        Lihat Detail <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                    <div class="details-content mt-4 hidden">
                        <ul class="list-disc list-inside text-gray-700">
                            <li>Kalibrasi dan Verifikasi Alat Ukur</li>
                            <li>Pembersihan dan Penyimpanan yang Benar</li>
                            <li>Penanganan Alat Ukur Optik</li>
                            <li>Keselamatan dalam Penggunaan Alat Ukur</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-12 text-center bg-blue-50 p-8 rounded-lg shadow-inner">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Siap untuk Tantangan Berikutnya?</h2>
            <p class="text-lg text-gray-700 mb-6">
                Setelah mempelajari semua materi ini, Anda akan memiliki pemahaman kuat tentang dasar-dasar jaringan.
            </p>
            <a href="{{ route('guru.quiz.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                Uji Pemahaman Anda! <i class="fas fa-trophy ml-2"></i>
            </a>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.toggle-details');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const detailsContent = this.closest('.card-hover').querySelector('.details-content');
                    const icon = this.querySelector('i');

                    detailsContent.classList.toggle('hidden');
                    if (detailsContent.classList.contains('hidden')) {
                        icon.classList.remove('fa-chevron-up');
                        icon.classList.add('fa-chevron-down');
                        this.textContent = 'Lihat Detail ';
                        this.appendChild(icon); // Re-append icon after changing text
                    } else {
                        icon.classList.remove('fa-chevron-down');
                        icon.classList.add('fa-chevron-up');
                        this.textContent = 'Sembunyikan Detail ';
                        this.appendChild(icon); // Re-append icon after changing text
                    }
                    // Animate progress bar on show (if progress bars were added to this design)
                    // If this part refers to a progress bar not present in this design, it might need to be removed or adapted.
                    const progressBar = detailsContent.querySelector('.progress-bar');
                    if (progressBar) { // Only attempt if element exists
                        const progress = progressBar.dataset.progress;
                        setTimeout(() => {
                            progressBar.style.width = progress + '%';
                        }, 50); // Small delay for smoother animation
                    }
                });
            });
        });
    </script>
    @endsection
</body>
</html>
