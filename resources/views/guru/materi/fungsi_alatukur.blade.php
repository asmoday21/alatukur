@extends('guru.guru_master')

@section('guru')    
    <!-- Scroll Progress Indicator -->
    <div class="scroll-indicator">
        <div class="scroll-progress" id="scrollProgress"></div>
    </div>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="network-grid"></div>
        <div class="particles" id="particles-js"></div> 
        
        <div class="container text-center position-relative z-3">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h1 class="display-2 fw-bold mb-4 fade-in" style="text-shadow: var(--neon-glow);">
                        Fungsi Alat Ukur <span style="background: linear-gradient(90deg, var(--secondary-color), var(--primary-color)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Jaringan & Telekomunikasi</span>
                    </h1>
                    
                    <p class="lead mb-5 fade-in" style="font-size: 1.5rem;">
                        Memahami Perangkat Keras dan Lunak untuk Pemeliharaan Jaringan
                    </p>
                    
                    <!-- Placeholder for Network Tool Illustrations/Icons -->
                    <div class="tool-icons fade-in mx-auto mb-5">
                        <i class="fas fa-ethernet me-3" style="font-size: 3rem; color: var(--primary-color);"></i>
                        <i class="fas fa-bolt me-3" style="font-size: 3rem; color: var(--secondary-color);"></i>
                        <i class="fas fa-wifi me-3" style="font-size: 3rem; color: var(--accent-color);"></i>
                        <i class="fas fa-signal" style="font-size: 3rem; color: var(--primary-color);"></i>
                    </div>

                    <div class="d-flex flex-wrap justify-content-center gap-3 mb-5 fade-in">
                        <button class="neon-btn" onclick="scrollToSection('introduction-section')">
                            <i class="fas fa-flask me-2"></i>Mulai Belajar Alat Ukur
                        </button>
                        <button class="neon-btn" onclick="scrollToSection('quiz-section')">
                            <i class="fas fa-cogs me-2"></i>Uji Pemahaman 
                        </button>
                    </div>

                    <!-- Tool Badges (Optional - can be populated dynamically later) -->
                    <div class="fade-in">
                        <div class="protocol-badge">LAN Tester</div>
                        <div class="protocol-badge">Multimeter</div>
                        <div class="protocol-badge">Earth Tester</div>
                        <div class="protocol-badge">OPM</div>
                        <div class="protocol-badge">OTDR</div>
                        <div class="protocol-badge">Fusion Splicer</div>
                        <div class="protocol-badge">Speed Test</div>
                        <div class="protocol-badge">Wi-Fi Analyzer</div>
                        <div class="protocol-badge">Ping Test</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal for Tool Info -->
    <div id="toolInfoModal" class="modal-custom">
        <div class="modal-content-custom">
            <span class="close-button-custom" onclick="closeToolInfoModal()">&times;</span>
            <h3 id="modalToolTitle" class="mb-3 text-primary"></h3>
            <p id="modalToolDescription"></p>
        </div>
    </div>


    <!-- Main Content -->
    <div class="container-fluid px-4" id="content">


        <div class="row justify-content-center">
            <!-- Main Content Area -->
            <div class="col-lg-10">
                <!-- Peta Konsep Section -->
                <section id="peta-konsep-section" class="mb-5 fade-in">
                    <div class="interactive-card">
                        <h2 class="h3 mb-4 text-center text-primary">
                            <i class="fas fa-toolbox me-3"></i>Peta Konsep Alat Ukur Jaringan
                        </h2>
                        <p class="text-center text-light mt-4 opacity-75">
                            Materi ini akan membahas berbagai alat ukur perangkat keras dan perangkat lunak yang esensial dalam pemeliharaan dan instalasi jaringan komputer serta telekomunikasi.
                        </p>
                    </div>
                </section>

                <!-- Introduction Section -->
                <section id="introduction-section" class="mb-5 fade-in">
                    <div class="interactive-card">
                        <h2 class="h3 mb-4 text-primary">
                            <i class="fas fa-info-circle me-3"></i>
                            Pentingnya Alat Ukur dalam Jaringan
                        </h2>
                        
                        <div class="alert alert-info border-0" style="background: rgba(0, 123, 255, 0.1); border-left: 4px solid var(--primary-color) !important; color: white;">
                            <h5 class="text-primary"><i class="fas fa-lightbulb me-2"></i>Definisi</h5>
                            <p class="mb-0">Alat ukur teknik jaringan komputer dan telekomunikasi adalah <strong>perangkat (hardware) atau aplikasi (software)</strong> yang digunakan untuk mengecek, menguji, menganalisis, dan memelihara infrastruktur jaringan agar selalu dalam kondisi optimal.</p>
                        </div>

                        <p class="lead mb-4 opacity-75">
                            Infrastruktur bidang Jaringan Komputer dan Telekomunikasi cukup beragam. Mulai dari perangkat, media transmisi, sampai dengan gedung tempat perangkat tersebut, harus selalu dalam kondisi prima. Kondisi yang selalu siap pakai harus dipastikan dengan melakukan pengecekan secara berkala. Pengecekan tersebut membutuhkan peranti berupa alat ukur, baik perangkat keras (hardware) maupun perangkat lunak (software).
                        </p>
                        <p class="opacity-75">
                            Sebelum menggunakan setiap alat ukur tersebut, sebaiknya kita memahami terlebih dahulu fungsi masing-masing agar tidak salah dalam penggunaannya.
                        </p>

                        <!-- Removed History Timeline as it's not relevant for this topic -->
                    </div>
                </section>
                
                <!-- LAN Tester Section -->
                <section id="lan-tester-section" class="mb-5 slide-in-left">
                    <div class="interactive-card">
                        <h2 class="h3 mb-4 text-primary">
                            <i class="fas fa-network-wired me-3"></i>1. LAN Tester
                        </h2>
                        <div class="row align-items-center mb-4">
                            <div class="col-md-4 text-center">
                                <img src="{{asset ('homepage/img/tester.png')}}" alt="LAN Tester" class="img-fluid rounded-lg shadow-lg mb-3">
                                <p class="small text-white-75">Gambar. LAN Tester</p>
                            </div>
                            <div class="col-md-8">
                                <p class="opacity-75">LAN tester adalah salah satu alat bantu dalam instalasi jaringan komputer yang berfungsi untuk mengecek koneksi kabel LAN RJ45 dan RJ11. LAN tester dilengkapi dengan lampu indikator, tombol pengatur kecepatan, dan pengecekan. LAN tester dapat digunakan untuk melakukan pengecekan kabel jenis cross dan straight. Adakalanya LAN tester dilengkapi dengan tone checker yang berfungsi untuk mengetahui letak kerusakan/putus dari kabel LAN, bahkan pada merek tertentu, memiliki fungsi yang disatukan dengan alat ukur multimeter.</p>
                            </div>
                        </div>

                        <h4 class="text-secondary mt-4 mb-3">a. Fungsi Utama</h4>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Mengecek koneksi kabel LAN RJ45 dan RJ11.</li>
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Mendeteksi urutan kabel (straight atau cross).</li>
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Beberapa model dilengkapi dengan tone checker untuk menemukan lokasi kerusakan.</li>
                        </ul>

                        <h4 class="text-secondary mt-4 mb-3">b. Cara Penggunaan (Ringkasan)</h4>
                        <p class="opacity-75">Secara umum, LAN tester terdiri dari dua bagian (master dan remote) yang dapat dipisahkan untuk menguji kabel yang membentang jauh. Lampu indikator akan menyala secara bergantian sesuai dengan urutan atau acak, bergantung pada jenis kabel yang diukur (straight atau cross).</p>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-angle-right text-secondary me-2"></i><strong>Menggunakan Satu Sisi (dengan bantuan Hub/Switch):</strong> Pasang satu ujung kabel ke port aktif (hub/switch) dan ujung lain ke LAN tester. Lampu akan menyala bergantian jika kabel normal.</li>
                            <li><i class="fas fa-angle-right text-secondary me-2"></i><strong>Menggunakan Dua Sisi:</strong> Pasang kedua ujung kabel LAN ke port RJ45 pada unit master dan remote. Lampu indikator akan menyala sesuai urutan kabel.</li>
                        </ul>

                        <h4 class="text-secondary mt-4 mb-3">c. Prosedur Keselamatan Kerja</h4>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Hindari meletakkan alat pada lokasi basah atau rawan terkena air.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Berikan catuan daya yang sesuai dengan spesifikasi peralatan.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Perhatikan bahaya sengatan listrik (meskipun arus DC).</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Hindari lingkungan kerja yang dapat menyebabkan peralatan mudah panas.</li>
                        </ul>
                    </div>
                </section>

                <!-- Multimeter Section -->
                <section id="multimeter-section" class="mb-5 slide-in-right">
                    <div class="interactive-card">
                        <h2 class="h3 mb-4 text-primary">
                            <i class="fas fa-charging-station me-3"></i>2. Multimeter
                        </h2>
                        <div class="row mb-4">
                            <div class="col-md-6 text-center mb-3">
                                <img src="{{asset ('homepage/img/analog.jpg')}}" alt="Multimeter Analog" class="img-fluid rounded-lg shadow-lg mb-2">
                                <p class="small text-white-75">Gambar. Multimeter Analog</p>
                            </div>
                            <div class="col-md-6 text-center mb-3">
                                <img src="{{asset ('homepage/img/digital.png')}}" alt="Multimeter Digital" class="img-fluid rounded-lg shadow-lg mb-2">
                                <p class="small text-white-75">Gambar. Multimeter Digital</p>
                            </div>
                        </div>
                        <p class="opacity-75">Multimeter merupakan alat ukur yang sering digunakan dalam bidang elektronika. Ada dua jenis multimeter, yaitu multimeter analog dan multimeter digital. Untuk menggunakan multimeter analog dibutuhkan keterampilan khusus dalam pembacaan skala, berbeda dengan multimeter digital yang langsung memunculkan hasil ketika pengukuran dilakukan.</p>

                        <h4 class="text-secondary mt-4 mb-3">a. Fungsi Utama</h4>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Mengukur tegangan (DCV, ACV).</li>
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Mengukur arus (DCmA, DCA).</li>
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Mengukur hambatan/resistansi (Ohm).</li>
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Beberapa multimeter digital memiliki kemampuan mengukur kapasitans dan frekuensi.</li>
                        </ul>

                        <h4 class="text-secondary mt-4 mb-3">b. Cara Penggunaan (Ringkasan)</h4>
                        <p class="opacity-75">Sebelum pengukuran, pastikan jarum multimeter analog menunjuk angka nol dan pilih batas ukur yang sesuai.</p>
                        <div class="accordion" id="multimeterAccordion">
                            <div class="accordion-item" style="background-color: transparent; border-color: var(--border-color);">
                                <h2 class="accordion-header" id="headingDCV">
                                    <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDCV" aria-expanded="false" aria-controls="collapseDCV" style="background-color: var(--glass-bg); color: var(--primary-color);">
                                        <i class="fas fa-arrow-circle-right me-2"></i> Mengukur Tegangan DC
                                    </button>
                                </h2>
                                <div id="collapseDCV" class="accordion-collapse collapse" aria-labelledby="headingDCV" data-bs-parent="#multimeterAccordion">
                                    <div class="accordion-body text-light opacity-75" style="background-color: rgba(0,0,0,0.2);">
                                        <p><strong>Analog:</strong> Atur sakelar ke DCV, pilih batas ukur (mulai dari terbesar). Hubungkan probe merah ke positif, hitam ke negatif. Baca jarum pada skala DCV. Gunakan rumus: $Hasil = (\text{Batas Ukur} / \text{Skala Meter}) \times \text{Penunjukan Jarum}$.</p>
                                        <p><strong>Digital:</strong> Atur sakelar ke DCV, pilih batas ukur. Hubungkan probe. Hasil langsung muncul di layar.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" style="background-color: transparent; border-color: var(--border-color);">
                                <h2 class="accordion-header" id="headingDCA">
                                    <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDCA" aria-expanded="false" aria-controls="collapseDCA" style="background-color: var(--glass-bg); color: var(--primary-color);">
                                        <i class="fas fa-arrow-circle-right me-2"></i> Mengukur Arus DC
                                    </button>
                                </h2>
                                <div id="collapseDCA" class="accordion-collapse collapse" aria-labelledby="headingDCA" data-bs-parent="#multimeterAccordion">
                                    <div class="accordion-body text-light opacity-75" style="background-color: rgba(0,0,0,0.2);">
                                        <p><strong>Analog:</strong> Atur sakelar ke DCmA/DCA, pilih batas ukur. Hubungkan probe seri ke sirkuit (merah ke arah masuk arus, hitam ke arah keluar arus). Baca jarum. Rumus sama dengan pengukuran tegangan DC.</p>
                                        <p><strong>Digital:</strong> Atur sakelar ke DCmA/DCA, pilih batas ukur. Hubungkan probe seri. Hasil langsung muncul di layar.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" style="background-color: transparent; border-color: var(--border-color);">
                                <h2 class="accordion-header" id="headingResistance">
                                    <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseResistance" aria-expanded="false" aria-controls="collapseResistance" style="background-color: var(--glass-bg); color: var(--primary-color);">
                                        <i class="fas fa-arrow-circle-right me-2"></i> Mengukur Tahanan (Resistansi)
                                    </button>
                                </h2>
                                <div id="collapseResistance" class="accordion-collapse collapse" aria-labelledby="headingResistance" data-bs-parent="#multimeterAccordion">
                                    <div class="accordion-body text-light opacity-75" style="background-color: rgba(0,0,0,0.2);">
                                        <p><strong>Analog:</strong> Putar sakelar ke Ohm ($\Omega$). Hubungkan probe hitam dan merah, atur jarum ke 0 Ohm. Hubungkan probe ke komponen (pastikan tidak ada tegangan). Baca skala dari kanan ke kiri, lalu kalikan dengan faktor pengali.</p>
                                        <p><strong>Digital:</strong> Putar sakelar ke Ohm ($\Omega$), pilih batas ukur. Hubungkan probe ke komponen. Hasil langsung muncul di layar.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" style="background-color: transparent; border-color: var(--border-color);">
                                <h2 class="accordion-header" id="headingACV">
                                    <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseACV" aria-expanded="false" aria-controls="collapseACV" style="background-color: var(--glass-bg); color: var(--primary-color);">
                                        <i class="fas fa-arrow-circle-right me-2"></i> Mengukur Tegangan AC
                                    </button>
                                </h2>
                                <div id="collapseACV" class="accordion-collapse collapse" aria-labelledby="headingACV" data-bs-parent="#multimeterAccordion">
                                    <div class="accordion-body text-light opacity-75" style="background-color: rgba(0,0,0,0.2);">
                                        <p><strong>Analog & Digital:</strong> Atur sakelar ke ACV, pilih batas ukur. Hubungkan probe ke terminal (polaritas tidak masalah untuk AC). Baca hasil (jarum untuk analog, angka untuk digital).</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="text-secondary mt-4 mb-3">c. Prosedur Keselamatan Kerja</h4>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Hindari meletakkan alat pada lokasi basah atau rawan air.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Berikan catuan daya yang sesuai.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Perhatikan bahaya sengatan listrik dan polaritas terminal ukur (untuk DC).</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Hindari lingkungan kerja yang panas dan jangan gunakan alat jika kondisi kurang prima.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Gunakan aksesori sesuai buku manual.</li>
                        </ul>
                    </div>
                </section>

                <!-- Earth Tester Section -->
                <section id="earth-tester-section" class="mb-5 slide-in-left">
                    <div class="interactive-card">
                        <h2 class="h3 mb-4 text-primary">
                            <i class="fas fa-globe-asia me-3"></i>3. Earth Tester
                        </h2>
                        <div class="row align-items-center mb-4">
                            <div class="col-md-4 text-center">
                                <img src="{{asset ('homepage/img/Earth1.png')}}" alt="Earth Tester" class="img-fluid rounded-lg shadow-lg mb-3">
                                <p class="small text-white-75">Gambar. Earth Tester</p>
                            </div>
                            <div class="col-md-8">
                                <p class="opacity-75">Earth tester merupakan alat ukur yang berfungsi untuk mengukur nilai pada sebuah instalasi grounding. Instalasi grounding ini biasanya dipasang pada gedung dan perangkat elektronik, seperti perangkat-perangkat komputer jaringan dan telekomunikasi. Dengan melakukan pengukuran nilai grounding, kita dapat mengetahui seberapa aman instalasi grounding yang sudah terpasang.</p>
                                <p class="opacity-75">Earth tester memiliki dua tipe, yaitu earth tester analog dan earth tester digital, seperti tipe pada multimeter.</p>
                            </div>
                        </div>

                        <h4 class="text-secondary mt-4 mb-3">a. Fungsi Utama</h4>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Mengukur nilai tahanan pentanahan (grounding).</li>
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Memastikan keamanan instalasi grounding.</li>
                        </ul>

                        <h4 class="text-secondary mt-4 mb-3">b. Cara Penggunaan (Ringkasan)</h4>
                        <p class="opacity-75">Tentukan lokasi, siapkan alat. Bersihkan bagian grounding. Hubungkan probe hijau ke grounding, probe kuning ke spike pertama (5-10m dari pusat), dan probe merah ke spike kedua (5-10m dari spike pertama). Pilih batas ukur yang sesuai. Baca hasil pengukuran.</p>

                        <h4 class="text-secondary mt-4 mb-3">c. Prosedur Keselamatan Kerja</h4>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Gunakan APD: helm, sarung tangan, sepatu safety.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Tempatkan peralatan dengan hati-hati.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Hindari tempat yang basah atau lembap dan panas matahari langsung.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Gunakan batas ukur yang sesuai.</li>
                        </ul>
                    </div>
                </section>

                <!-- Optical Power Meter (OPM) Section -->
                <section id="opm-section" class="mb-5 slide-in-right">
                    <div class="interactive-card">
                        <h2 class="h3 mb-4 text-primary">
                            <i class="fas fa-lightbulb me-3"></i>4. Optical Power Meter (OPM)
                        </h2>
                        <div class="row align-items-center mb-4">
                            <div class="col-md-4 text-center">
                                <img src="{{asset ('homepage/img/opm4.png')}}" alt="Optical Power Meter" class="img-fluid rounded-lg shadow-lg mb-3">
                                <p class="small text-white-75">Gambar. Optical Power Meter</p>
                            </div>
                            <div class="col-md-8">
                                <p class="opacity-75">Power meter adalah salah satu peralatan utama dalam pengukuran saluran fiber optik yang berfungsi untuk mengetahui level daya penerima. Level daya adalah sebuah kekuatan sinyal optik yang digunakan untuk membawa informasi dari satu tempat ke tempat lain melalui sebuah media transmisi, yaitu fiber optik. Satuan level daya dalam sistem komunikasi serat optik (SKSO) adalah dBm (desibel miliwatt).</p>
                            </div>
                        </div>

                        <h4 class="text-secondary mt-4 mb-3">a. Fungsi Utama</h4>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Mengukur level daya penerima sinyal optik.</li>
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Membantu mendeteksi gangguan pada saluran optik.</li>
                        </ul>

                        <h4 class="text-secondary mt-4 mb-3">b. Cara Penggunaan (Ringkasan)</h4>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-angle-right text-secondary me-2"></i><strong>Jaringan Offline:</strong> Siapkan OLS, OPM, kacamata safety, cleaner, dan kabel. Bersihkan konektor, pasang kabel ke OLS dan OPM. Nyalakan OLS dan OPM, samakan panjang gelombang. Baca hasil dalam dBm.</li>
                            <li><i class="fas fa-angle-right text-secondary me-2"></i><strong>Jaringan Online:</strong> Siapkan OPM, safety glasses, cleaner, dan titik terminasi. Nyalakan OPM, atur lamda sesuai downlink operator (misal 1490 nm). Baca hasil dalam dBm.</li>
                        </ul>

                        <h4 class="text-secondary mt-4 mb-3">c. Prosedur Keselamatan Kerja</h4>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-shield-alt text-success me-2"></i>TIDAK melihat langsung ujung serat optik (cahaya tidak tampak dan berbahaya).</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Gunakan kacamata safety.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Nyalakan OLS setelah kabel terpasang.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Periksa power yang digunakan secara saksama.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Simpan peralatan hati-hati, hindari getaran tinggi.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Pasang konektor dengan benar dan gunakan catuan tegangan yang sesuai.</li>
                        </ul>

                        {{-- <h4 class="text-center text-secondary mt-5 mb-3">Video Pendukung: Fungsi Tombol Optical Power Meter</h4>
                        <div class="ratio ratio-16x9 rounded-lg overflow-hidden shadow-lg">
                            <iframe src="https://youtube.com/embed/gg_npWoy3B4?si=nlmLQ0POhhPsNXY_" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div> --}}
                        {{-- <p class="text-center text-light mt-3 opacity-75 small">Sumber video: YouTube (dari channel "Joinwit")</p>
                    </div> --}}
                </section>

                <!-- Optical Time Domain Reflectometer (OTDR) Section -->
                <section id="otdr-section" class="mb-5 slide-in-left">
                    <div class="interactive-card">
                        <h2 class="h3 mb-4 text-primary">
                            <i class="fas fa-chart-line me-3"></i>5. Optical Time Domain Reflectometer (OTDR)
                        </h2>
                        <div class="row align-items-center mb-4">
                            <div class="col-md-4 text-center">
                                <img src="{{asset('homepage/img/otdr.png')}}" alt="OTDR" class="img-fluid rounded-lg shadow-lg mb-3">
                                <p class="small text-white-75">Gambar. Optical Time Domain Reflectometer (OTDR)</p>
                            </div>
                            <div class="col-md-8">
                                <p class="opacity-75">OTDR merupakan salah satu alat ukur penting yang digunakan untuk mengukur saluran optik, baik dalam kegiatan instalasi maupun saat pemeliharaan saluran fiber optik. Alat ini dipakai untuk mendapatkan visualisasi dari redaman fiber optik sepanjang saluran optik yang ditampilkan pada sebuah layar CRT, dengan jarak pada sumbu X dan level daya pada sumbu Y.</p>
                                <p class="opacity-75">Dengan menggunakan OTDR, sebuah link optik dapat diukur dari satu ujung. Pada sebuah uji terima saluran optik, pengukuran menggunakan OTDR dilakukan dari dua arah.</p>
                            </div>
                        </div>

                        <h4 class="text-secondary mt-4 mb-3">a. Fungsi Utama</h4>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Mengukur besar redaman fiber optik.</li>
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Mengukur redaman riil sambungan (fusion dan mekanik).</li>
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Mengukur loss antartitik yang diinginkan.</li>
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Mengukur panjang kabel atau saluran optik.</li>
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Menangani gangguan pada fiber optik (misal, kabel putus).</li>
                        </ul>

                        <h4 class="text-secondary mt-4 mb-3">b. Cara Penggunaan (Ringkasan)</h4>
                        <p class="opacity-75">Siapkan OTDR, kacamata safety, cleaner, dan kabel (min 100m). Bersihkan konektor. Pasang kabel ke OTDR. Lakukan penyetelan parameter (panjang gelombang, distance range, pulse width, duration, index of refraction). Tekan tombol Start dan baca hasil pada kolom distance.</p>

                        <h4 class="text-secondary mt-4 mb-3">c. Prosedur Keselamatan Kerja</h4>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-shield-alt text-success me-2"></i>TIDAK melihat langsung ujung serat optik.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Gunakan kacamata safety.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Tutup ujung jauh dari kabel untuk menghindari cahaya dari OTDR.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Simpan peralatan hati-hati, hindari getaran tinggi.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Pasang konektor dengan benar dan gunakan catuan tegangan yang sesuai.</li>
                        </ul>

                        {{-- <h5 class="text-center text-secondary mt-5 mb-3">Video Pendukung: Fungsi Tombol OTDR</h5>
                        <div class="ratio ratio-16x9 rounded-lg overflow-hidden shadow-lg">
                            <iframe src="https://www.youtube.com/embed/z6EYGTemM8M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                        <p class="text-center text-light mt-3 opacity-75 small">Sumber video: YouTube (dari channel "Teknisi Jaringan Optik")</p>
                    </div> --}}
                </section>

               <!-- Fusion Splicer Section -->
                <section id="fusion-splicer-section" class="mb-5 slide-in-right py-4"> <!-- Added py-4 -->
                    <div class="interactive-card">
                        <h2 class="h3 mb-4 text-primary">
                            <i class="fas fa-fire me-3"></i>6. Fusion Splicer
                        </h2>
                        <div class="row align-items-center mb-4">
                            <div class="col-md-6 text-center">
                                <!-- Embed model 3D dari Sketchfab -->
                                <div class="ratio ratio-4x3 rounded shadow-lg mb-3"> <!-- Adjusted ratio and added mb-3 -->
                                    <iframe 
                                        title="Fusion Splicer" 
                                        frameborder="0" 
                                        allow="autoplay; fullscreen; xr-spatial-tracking" 
                                        allowfullscreen 
                                        mozallowfullscreen="true" 
                                        webkitallowfullscreen="true" 
                                        xr-spatial-tracking 
                                        execution-while-out-of-viewport 
                                        execution-while-not-rendered 
                                        web-share 
                                        src="https://sketchfab.com/models/659519636425416cb6a15135ddc6102c/embed">
                                    </iframe>
                                </div>
                                <p class="small text-white-75 mt-2">Gambar: Model 3D Fusion Splicer dari Sketchfab</p>
                            </div>
                            
                            <div class="col-md-6">
                                <p class="opacity-75">Fusion Splicer adalah alat presisi yang digunakan untuk menyambung dua ujung serat optik dengan melelehkannya menggunakan busur listrik. Proses ini menciptakan sambungan permanen dengan kehilangan sinyal yang sangat rendah, penting dalam menjaga kualitas transmisi dalam jaringan fiber optik.</p>
                            </div>
                        </div>

                        <h4 class="text-secondary mt-4 mb-3">a. Fungsi Utama</h4>
                        <ul class="list-unstyled opacity-75 ps-3"> <!-- Added ps-3 -->
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Menyambung serat optik dengan fusi (leburan).</li>
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Menciptakan sambungan dengan loss sinyal minimal.</li>
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Penting untuk instalasi dan perbaikan kabel fiber optik.</li>
                        </ul>

                        <h4 class="text-secondary mt-4 mb-3">b. Cara Penggunaan (Ringkasan)</h4>
                        <p class="opacity-75">Persiapan serat optik (pengupasan, pembersihan, pemotongan presisi), penempatan serat di splicer, proses fusi otomatis oleh alat, dan perlindungan sambungan dengan heat shrink tube.</p>
                        <ul class="list-unstyled opacity-75 ps-3"> <!-- Added ps-3 -->
                            <li><i class="fas fa-angle-right text-secondary me-2"></i><strong>Persiapan Serat:</strong> Kupas jaket kabel, bersihkan serat, dan potong ujung serat menggunakan cleaver dengan sangat presisi.</li>
                            <li><i class="fas fa-angle-right text-secondary me-2"></i><strong>Penempatan:</strong> Letakkan kedua ujung serat yang telah dipersiapkan di dalam V-groove pada Fusion Splicer.</li>
                            <li><i class="fas fa-angle-right text-secondary me-2"></i><strong>Fusi:</strong> Alat akan secara otomatis menyelaraskan serat, membersihkan debu dengan busur singkat, dan kemudian melelehkan kedua ujung serat dengan busur listrik untuk menyambungnya.</li>
                            <li><i class="fas fa-angle-right text-secondary me-2"></i><strong>Proteksi:</strong> Sambungan yang sudah difusi kemudian dilindungi dengan sleeve pelindung (heat shrink tube) dan dipanaskan di dalam oven splicer.</li>
                        </ul>

                        {{-- <h5 class="text-center text-secondary mt-5 mb-3">Video Pendukung: Panduan Lengkap Splicing Fiber Optic</h5>
                        <div class="ratio ratio-16x9 rounded-lg overflow-hidden shadow-lg">
                            <iframe src="https://www.youtube.com/embed/oBGCq3yqiuQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div> --}}
                        <p class="text-center text-light mt-3 opacity-75 small">Sumber video: YouTube (dari channel "Teknik Elektro Universitas Surabaya")</p>

                        <h4 class="text-secondary mt-4 mb-3">c. Prosedur Keselamatan Kerja</h4>
                        <ul class="list-unstyled opacity-75 ps-3"> <!-- Added ps-3 -->
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Selalu gunakan kacamata safety untuk melindungi mata dari busur listrik dan pecahan serat.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Tangani serat optik dengan sangat hati-hati karena sangat rapuh dan ujungnya tajam.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Pastikan area kerja bersih dari debu dan kotoran.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Buang sisa potongan serat ke dalam wadah khusus (fiber waste container).</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Ikuti panduan penggunaan alat dari pabrikan dengan cermat.</li>
                        </ul>
                    </div>
                </section>
                
                <!-- Speed Test Section -->
                <section id="speed-test-section" class="mb-5 slide-in-right">
                    <div class="interactive-card">
                        <h2 class="h3 mb-4 text-primary">
                            <i class="fas fa-tachometer-alt me-3"></i>7. Speed Test
                        </h2>
                        <div class="row align-items-center mb-4">
                            <div class="col-md-4 text-center">
                                <img src="{{asset('homepage/img/speed.jpeg')}}" alt="Tampilan Speed Test" class="img-fluid rounded-lg shadow-lg mb-3">
                                <p class="small text-white-75">Gambar. Contoh Speed Test</p>
                            </div>
                            <div class="col-md-8">
                                <p class="opacity-75">Speed test adalah sebuah layanan berbentuk aplikasi berbasis web yang digunakan untuk menguji kecepatan performa koneksi internet, baik kabel, seluler, maupun Wi-Fi. Kapasitas maksimal jaringan internet yang kita gunakan untuk mengunggah (upload) dan mengunduh (download) data dapat dilakukan menggunakan aplikasi ini. Dengan melakukan pengetesan, kita akan mengetahui besarnya bandwidth dari koneksi internet yang sedang digunakan.</p>
                            </div>
                        </div>

                        <h4 class="text-secondary mt-4 mb-3">a. Fungsi Utama</h4>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Mengukur kecepatan download dan upload internet.</li>
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Mengetahui besarnya bandwidth koneksi internet.</li>
                        </ul>

                        <h4 class="text-secondary mt-4 mb-3">b. Cara Penggunaan (Ringkasan)</h4>
                        <p class="opacity-75">Buka browser, kunjungi situs speed test (contoh: speedtest.net). Tunggu hingga laman termuat, lalu klik tombol "GO" atau "Mulai". Tunggu hingga pengujian selesai dan hasilnya ditampilkan.</p>

                        <h4 class="text-secondary mt-4 mb-3">c. Prosedur Keselamatan Kerja</h4>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Pastikan tangan dalam kondisi bersih dan tidak basah/lembab.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Hindari bekerja sambil makan dan minum.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Hindari lingkungan kerja yang terlalu panas dan lembab.</li>
                        </ul>
                    </div>
                </section>

                <!-- Wi-Fi Analyzer Section -->
                <section id="wifi-analyzer-section" class="mb-5 slide-in-left">
                    <div class="interactive-card">
                        <h2 class="h3 mb-4 text-primary">
                            <i class="fas fa-wifi me-3"></i>8. Wi-Fi Analyzer
                        </h2>
                        <div class="row align-items-center mb-4">
                            <div class="col-md-4 text-center">
                                <img src="{{asset('homepage/img/wifi.png')}}" alt="Tampilan Wi-Fi Analyzer" class="img-fluid rounded-lg shadow-lg mb-3">
                                <p class="small text-white-75">Gambar. Contoh Tampilan Wi-Fi Analyzer</p>
                            </div>
                            <div class="col-md-8">
                                <p class="opacity-75">Wi-Fi Analyzer merupakan sebuah aplikasi yang dapat digunakan untuk mengetahui kekuatan sinyal Wi-Fi yang terletak pada suatu lokasi tertentu. Dengan menggunakan aplikasi ini, kita dapat memeriksa kualitas jaringan yang diterima oleh perangkat yang digunakan. Saat ini, sudah banyak aplikasi semacam ini yang dapat kita unduh dengan mudah untuk digunakan pada perangkat telepon seluler atau komputer.</p>
                            </div>
                        </div>

                        <h4 class="text-secondary mt-4 mb-3">a. Fungsi Utama</h4>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Mengetahui kekuatan sinyal Wi-Fi.</li>
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Memeriksa kualitas jaringan nirkabel.</li>
                        </ul>

                        <h4 class="text-secondary mt-4 mb-3">b. Cara Penggunaan (Ringkasan)</h4>
                        <p class="opacity-75">Unduh dan instal aplikasi Wi-Fi Analyzer dari Play Store (App Store). Jalankan aplikasi untuk menganalisis jaringan Wi-Fi di sekitar Anda, melihat kekuatan sinyal, channel, dan informasi lainnya.</p>

                        <h4 class="text-secondary mt-4 mb-3">c. Prosedur Keselamatan Kerja</h4>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Pastikan tangan bersih dan tidak basah/lembab.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Hindari bekerja sambil makan dan minum.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Hindari lingkungan kerja yang terlalu panas dan lembab.</li>
                        </ul>
                    </div>
                </section>

                <!-- Ping Test Section -->
                <section id="ping-test-section" class="mb-5 slide-in-right">
                    <div class="interactive-card">
                        <h2 class="h3 mb-4 text-primary">
                            <i class="fas fa-network-check me-3"></i>9. Ping Test
                        </h2>
                        <div class="row align-items-center mb-4">
                            <div class="col-md-4 text-center">
                                <img src="{{asset('homepage/img/ping.png')}}" alt="Tampilan Ping Test" class="img-fluid rounded-lg shadow-lg mb-3">
                                <p class="small text-white-75">Gambar. Contoh Tampilan Ping Test</p>
                            </div>
                            <div class="col-md-8">
                                <p class="opacity-75">Ping adalah singkatan dari Packet Internet Network Groper. Perintah ping digunakan untuk menguji kecepatan koneksi pada jaringan komputer kita. Jaringan komputer yang diperiksa tidak harus terhubung dengan internet. Dengan menggunakan ping test, kita dapat melihat seberapa cepat respons dari komputer lawan. Semakin cepat respons yang diberikan, semakin bagus kondisi jaringannya, demikian sebaliknya.</p>
                            </div>
                        </div>

                        <h4 class="text-secondary mt-4 mb-3">a. Fungsi Utama</h4>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Menguji konektivitas jaringan.</li>
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Mengukur waktu respons (latency) dari host tujuan.</li>
                            <li><i class="fas fa-check-circle text-secondary me-2"></i>Membantu mendiagnosis masalah dasar jaringan.</li>
                        </ul>

                        <h4 class="text-secondary mt-4 mb-3">b. Cara Penggunaan (Ringkasan)</h4>
                        <p class="opacity-75">Buka Command Prompt (CMD) di Windows atau Terminal di Linux/macOS. Ketik <code>ping</code> diikuti dengan alamat IP tujuan (contoh: <code>ping 192.168.1.1</code>). Tunggu hingga proses selesai dan lihat statistik ping.</p>
                        
                        <h4 class="text-secondary mt-4 mb-3">c. Troubleshooting Umum</h4>
                        <div class="accordion" id="pingTroubleshooting">
                            <div class="accordion-item" style="background-color: transparent; border-color: var(--border-color);">
                                <h2 class="accordion-header" id="headingGeneralFailure">
                                    <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGeneralFailure" aria-expanded="false" aria-controls="collapseGeneralFailure" style="background-color: var(--glass-bg); color: var(--primary-color);">
                                        <i class="fas fa-exclamation-circle me-2"></i> General Failure
                                    </button>
                                </h2>
                                <div id="collapseGeneralFailure" class="accordion-collapse collapse" aria-labelledby="headingGeneralFailure" data-bs-parent="#pingTroubleshooting">
                                    <div class="accordion-body text-light opacity-75" style="background-color: rgba(0,0,0,0.2);">
                                        <p>Terjadi ketika sistem tidak dapat mengirimkan paket ping, seringkali karena blocking firewall/antivirus atau kabel jaringan tidak terhubung. <strong>Tindakan:</strong> Matikan firewall/antivirus, periksa kabel dan slot LAN, serta lampu indikator hub/switch.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" style="background-color: transparent; border-color: var(--border-color);">
                                <h2 class="accordion-header" id="headingDHU">
                                    <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDHU" aria-expanded="false" aria-controls="collapseDHU" style="background-color: var(--glass-bg); color: var(--primary-color);">
                                        <i class="fas fa-exclamation-triangle me-2"></i> Destination Host Unreachable (DHU)
                                    </button>
                                </h2>
                                <div id="collapseDHU" class="accordion-collapse collapse" aria-labelledby="headingDHU" data-bs-parent="#pingTroubleshooting">
                                    <div class="accordion-body text-light opacity-75" style="background-color: rgba(0,0,0,0.2);">
                                        <p>Tidak ada respons dari host karena tidak dapat dijangkau. Penyebab: kabel/LAN card tidak terhubung, Local Area Connection disable, hub/switch panas, atau setting TCP/IP tidak sesuai. <strong>Tindakan:</strong> Periksa kondisi fisik, aktifkan LAN, pastikan hub/switch berfungsi.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" style="background-color: transparent; border-color: var(--border-color);">
                                <h2 class="accordion-header" id="headingRTO">
                                    <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRTO" aria-expanded="false" aria-controls="collapseRTO" style="background-color: var(--glass-bg); color: var(--primary-color);">
                                        <i class="fas fa-clock me-2"></i> Request Timed Out (RTO)
                                    </button>
                                </h2>
                                <div id="collapseRTO" class="accordion-collapse collapse" aria-labelledby="headingRTO" data-bs-parent="#pingTroubleshooting">
                                    <div class="accordion-body text-light opacity-75" style="background-color: rgba(0,0,0,0.2);">
                                        <p>Penyebab: bandwidth penuh, kualitas jaringan buruk, koneksi IP terputus (Wi-Fi mati/kabel putus), firewall aktif/salah konfigurasi. <strong>Tindakan:</strong> Periksa IP tujuan, konektivitas kabel/Wi-Fi, nonaktifkan firewall, periksa Network ID.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="text-secondary mt-4 mb-3">d. Prosedur Keselamatan Kerja</h4>
                        <ul class="list-unstyled opacity-75">
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Pastikan tangan bersih dan tidak basah/lembab.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Hindari bekerja sambil makan dan minum.</li>
                            <li><i class="fas fa-shield-alt text-success me-2"></i>Hindari lingkungan kerja yang terlalu panas dan lembab.</li>
                        </ul>
                    </div>
                </section>


                <!-- Quiz Sederhana Section -->
                <section id="quiz-section" class="mb-5">
                    <div class="quiz-card reveal-item hidden-initial">
                        <h2 class="h3 mb-4 text-primary text-center reveal-item-child hidden-initial">
                            <i class="fas fa-question-circle me-3"></i>Uji Pemahaman: Kuis Sederhana Alat Ukur
                        </h2>
                        <div id="quiz-container">
                            <!-- Question 1 -->
                            <div class="question-block mb-4">
                            <p class="mb-3 reveal-item-child hidden-initial"><strong>1. Alat ukur apa yang berfungsi untuk mengecek koneksi kabel LAN RJ45 dan RJ11?</strong></p>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q1" data-choice="a">
                                <label class="w-100 cursor-pointer">a. LAN Tester</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q1" data-choice="b">
                                <label class="w-100 cursor-pointer">b. Multimeter</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q1" data-choice="c">
                                <label class="w-100 cursor-pointer">c. Optical Power Meter</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q1" data-choice="d">
                                <label class="w-100 cursor-pointer">d. Earth Tester</label>
                                </div>
                            </div>

                            <!-- Question 2 -->
                            <div class="question-block mb-4">
                            <p class="mb-3 reveal-item-child hidden-initial"><strong>2. Alat presisi yang digunakan untuk menyambung dua ujung serat optik dengan melelehkannya menggunakan busur listrik adalah...</strong></p>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q2" data-choice="a">
                                <label class="w-100 cursor-pointer">a. OTDR</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q2" data-choice="b">
                                <label class="w-100 cursor-pointer">b. OPM</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q2" data-choice="c">
                                <label class="w-100 cursor-pointer">c. Multimeter</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q2" data-choice="d">
                                <label class="w-100 cursor-pointer">d. Fusion Splicer</label>
                                </div>
                            </div>

                            <!-- Question 3 -->
                            <div class="question-block mb-4">
                            <p class="mb-3 reveal-item-child hidden-initial"><strong>3. Alat ukur apa yang digunakan untuk mengetahui nilai level daya pada saluran fiber optik?</strong></p>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q3" data-choice="a">
                                <label class="w-100 cursor-pointer">a. OTDR</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q3" data-choice="b">
                                <label class="w-100 cursor-pointer">b. Speed Test</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q3" data-choice="c">
                                <label class="w-100 cursor-pointer">c. Optical Power Meter</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q3" data-choice="d">
                                <label class="w-100 cursor-pointer">d. Wi-Fi Analyzer</label>
                                </div>
                            </div>

                            <!-- Question 4 -->
                            <div class="question-block mb-4">
                            <p class="mb-3 reveal-item-child hidden-initial"><strong>4. Untuk mengukur arus DC menggunakan multimeter analog, setelah mengatur sakelar pemilih, langkah selanjutnya adalah...</strong></p>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q4" data-choice="a">
                                <label class="w-100 cursor-pointer">a. Hubungkan probe secara seri ke sirkuit.</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q4" data-choice="b">
                                <label class="w-100 cursor-pointer">b. Putar sekrup zero adjust.</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q4" data-choice="c">
                                <label class="w-100 cursor-pointer">c. Hubungkan probe secara paralel.</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q4" data-choice="d">
                                <label class="w-100 cursor-pointer">d. Pilih batas ukur terkecil.</label>
                                </div>
                            </div>

                            <!-- Question 5 -->
                            <div class="question-block mb-4">
                            <p class="mb-3 reveal-item-child hidden-initial"><strong>5. Mengapa penggunaan kacamata safety sangat dianjurkan saat menggunakan Fusion Splicer?</strong></p>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q5" data-choice="a">
                                <label class="w-100 cursor-pointer">a. Melindungi mata dari busur listrik dan pecahan serat yang tajam.</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q5" data-choice="b">
                                <label class="w-100 cursor-pointer">b. Untuk melihat dengan jelas hasil fusi.</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q5" data-choice="c">
                                <label class="w-100 cursor-pointer">c. Agar alat tidak mudah kotor.</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q5" data-choice="d">
                                <label class="w-100 cursor-pointer">d. Untuk mencegah kelelahan mata.</label>
                                </div>
                            </div>

                            <!-- Question 6 (newly re-added) -->
                            <div class="question-block mb-4">
                                <p class="mb-3"><strong>6. Layanan aplikasi berbasis web yang digunakan untuk menguji kecepatan performa koneksi internet adalah...</strong></p>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q6" data-choice="a">
                                    <label class="w-100 cursor-pointer">a. Speed Test</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q6" data-choice="b">
                                    <label class="w-100 cursor-pointer">b. Wi-Fi Analyzer</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q6" data-choice="c">
                                    <label class="w-100 cursor-pointer">c. Ping Test</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q6" data-choice="d">
                                    <label class="w-100 cursor-pointer">d. LAN Tester</label>
                                </div>
                            </div>

                            <!-- Question 7 (newly re-added) -->
                            <div class="question-block mb-4">
                                <p class="mb-3"><strong>7. Singkatan dari Packet Internet Network Groper adalah...</strong></p>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q7" data-choice="a">
                                    <label class="w-100 cursor-pointer">a. TCP</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q7" data-choice="b">
                                    <label class="w-100 cursor-pointer">b. Ping</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q7" data-choice="c">
                                    <label class="w-100 cursor-pointer">c. IP</label>
                                </div>
                                <div class="quiz-option reveal-item-child hidden-initial" data-question="q7" data-choice="d">
                                    <label class="w-100 cursor-pointer">d. HTTP</label>
                                </div>
                            </div>
                            
                            <button onclick="checkQuiz()" class="btn btn-primary w-100 mt-3 fw-bold">Periksa Jawaban</button>
                            <p id="quiz-feedback" class="mt-4 font-weight-bold text-center"></p>
                            <a href="{{ route('guru.materi.index') }}" id="nextMaterialBtn" class="btn btn-success w-100 mt-3 d-none fw-bold">Lanjut ke Materi Berikutnya <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

    <!-- Video Quiz Modal Structure (Placeholder - No video quiz for this context yet) -->
    <div id="videoQuizModal" class="video-quiz-modal-overlay">
        <div class="video-quiz-modal-content">
            <h4 id="videoQuizQuestion"></h4>
            <div id="videoQuizOptions" class="video-quiz-modal-options mb-3">
                <!-- Options will be dynamically loaded here -->
            </div>
            <p id="videoQuizFeedback" class="video-quiz-modal-feedback"></p>
            <button id="videoQuizContinueBtn" class="neon-btn mt-3 d-none" onclick="continueVideo()">Lanjutkan Video</button>
        </div>
    </div>

    <style>
        /* General Styles and Variables */
        :root {
            --primary-color: #00ccff; /* Blue */
            --secondary-color: #08a2df; /* Cyan */
            --accent-color: #ff6b35; /* Orange-Red */
            --dark-bg: #0a1929; /* Dark Blue-Grey */
            --darker-bg: #020c1b;
            /* --light-text: #e0e0e0; */
            --glass-bg: rgba(14, 13, 13, 0.08);
            --neon-glow: 0 0 10px rgba(0, 255, 204, 0.6), 0 0 20px rgba(0, 255, 204, 0.4), 0 0 30px rgba(0, 255, 204, 0.2);
            --neon-glow-primary: 0 0 10px rgba(0, 102, 255, 0.6), 0 0 20px rgba(0, 102, 255, 0.4);
            --transition-speed: 0.3s;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--dark-bg) 0%, var(--darker-bg) 100%);
            --text-light: #ffffff;
            line-height: 1.7;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        h1, h2, h3, h4, h5, h6 {
            color: white;
            font-weight: 700;
        }

        .text-primary { color: var(--primary-color) !important; }
        .text-secondary { color: var(--secondary-color) !important; }
        .text-accent { color: var(--accent-color) !important; }
        .opacity-75 { opacity: 0.75; }

        /* Scroll Progress Indicator */
        .scroll-indicator {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: rgba(255, 255, 255, 0.1);
            z-index: 1000;
        }

        .scroll-progress {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, var(--secondary-color), var(--primary-color));
            border-radius: 0 3px 3px 0;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            text-align: center;
            background: radial-gradient(circle at center, rgba(10, 25, 41, 0.9), rgba(0, 0, 0, 0.95));
            padding: 80px 0;
        }

        .network-grid {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(to right, rgba(0, 255, 204, 0.1) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(0, 255, 204, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            opacity: 0.2;
            animation: grid-movement 60s linear infinite;
            z-index: 1;
        }

        @keyframes grid-movement {
            from { background-position: 0 0; }
            to { background-position: 500px 500px; }
        }

        #particles-js { /* Changed from #particles to #particles-js for library compatibility */
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 2;
        }

        .hero-section h1 {
            font-size: 4rem;
            margin-bottom: 2rem;
            position: relative;
            z-index: 3;
        }

        .hero-section p.lead {
            font-size: 1.8rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            color: var(--light-text);
            position: relative;
            z-index: 3;
        }

        .tool-icons i {
            margin: 0 15px;
            text-shadow: var(--neon-glow);
        }

        /* Neon Buttons */
        .neon-btn {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 8px;
            padding: 12px 25px;
            color: white;
            font-weight: bold;
            font-size: 1.1rem;
            cursor: pointer;
            box-shadow: var(--neon-glow-primary);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none; /* For link buttons */
        }

        .neon-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 15px var(--primary-color), 0 0 25px var(--secondary-color);
            background: linear-gradient(45deg, var(--secondary-color), var(--primary-color));
        }

        /* Protocol Badges (repurposed for tool types) */
        .protocol-badge {
            display: inline-block;
            background-color: rgba(111, 66, 193, 0.2);
            border: 1px solid var(--secondary-color);
            border-radius: 20px;
            padding: 8px 15px;
            margin: 5px;
            font-size: 0.9rem;
            color: var(--light-text);
            box-shadow: 0 0 8px rgba(0, 255, 204, 0.2);
        }

        /* Custom Modal (repurposed for tool info) */
        .modal-custom {
            display: none; 
            position: fixed; 
            z-index: 1050; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0,0,0,0.7); 
            justify-content: center;
            align-items: center;
        }

        .modal-content-custom {
            background: linear-gradient(135deg, var(--dark-bg), var(--darker-bg));
            color: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 5px 25px rgba(0,0,0,0.5), var(--neon-glow);
            max-width: 90%;
            width: 600px;
            position: relative;
            text-align: center;
            border: 2px solid var(--secondary-color);
        }

        .close-button-custom {
            color: var(--secondary-color);
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .close-button-custom:hover,
        .close-button-custom:focus {
            color: white;
            text-decoration: none;
        }

        /* Interactive Cards */
        .interactive-card {
            background: var(--glass-bg);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2rem;
            margin: 1rem 0;
            backdrop-filter: blur(15px);
            transition: all 0.4s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            color: white;
        }

        .interactive-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: translateX(-100%);
            transition: transform 0.6s;
        }

        .interactive-card:hover::after {
            transform: translateX(100%);
        }

        .interactive-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border-color: var(--secondary-color);
        }

        /* Multimeter Accordion Styling */
        .accordion-item {
            background-color: transparent !important;
            border-color: var(--border-color) !important;
            margin-bottom: 10px;
            border-radius: 10px;
            overflow: hidden;
        }
        .accordion-button {
            background-color: var(--glass-bg) !important;
            color: var(--primary-color) !important;
            font-weight: bold;
            border-radius: 10px !important;
            padding: 15px 20px;
            transition: all 0.3s ease;
        }
        .accordion-button:not(.collapsed) {
            background-color: var(--primary-color) !important;
            color: white !important;
            box-shadow: var(--neon-glow-primary);
        }
        .accordion-button:focus {
            box-shadow: none !important;
            border-color: transparent !important;
        }
        .accordion-body {
            background-color: rgba(0,0,0,0.2) !important;
            border-top: 1px solid var(--border-color);
            color: var(--light-text);
            padding: 20px;
        }

        /* Quiz Section */
        .quiz-card {
            background: var(--glass-bg);
            border-radius: 20px;
            padding: 2rem;
            margin: 1rem 0;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }

        .quiz-option {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid transparent;
            border-radius: 15px;
            padding: 1rem;
            margin: 0.5rem 0;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .quiz-option:hover {
            border-color: var(--secondary-color);
            background: rgba(0, 255, 204, 0.1);
        }

        .quiz-option.selected {
            border-color: var(--primary-color);
            background: rgba(0, 102, 255, 0.2);
            font-weight: bold;
        }

        .quiz-option.correct {
            border-color: #28a745;
            background: rgba(40, 167, 69, 0.2);
        }

        .quiz-option.incorrect {
            border-color: #dc3545;
            background: rgba(220, 53, 69, 0.2);
        }

        /* Removed input[type="radio"] styling as it's no longer needed */

        .quiz-option label {
            /* Removed padding-left as input is removed */
            display: flex;
            align-items: center;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-section {
                min-height: 80vh;
            }
            
            .hero-section h1 {
                font-size: 2.5rem;
            }

            .hero-section p.lead {
                font-size: 1.2rem;
            }

            .tool-icons i {
                font-size: 2rem !important;
            }

            .neon-btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        /* Custom Alert Notification (for quiz feedback) */
        .alert.position-fixed {
            top: 20px;
            right: 20px;
            z-index: 1050;
            min-width: 300px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            opacity: 0; /* Hidden by default */
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform: translateY(-20px);
        }
        .alert.position-fixed.show {
            opacity: 1;
            transform: translateY(0);
        }
        .alert-success { background-color: #28a745; color: white; border-left: 5px solid #218838; }
        .alert-warning { background-color: #ffc107; color: #343a40; border-left: 5px solid #e0a800; }
        .alert-danger { background-color: #dc3545; color: white; border-left: 5px solid #c82333; }
        .alert-info { background-color: #17a2b8; color: white; border-left: 5px solid #138496; }
        .alert .btn-close { filter: invert(1); } /* Make close button visible on dark backgrounds */
    </style>

    <!-- Bootstrap JS and Custom JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome for icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <!-- particles.js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
    <!-- YouTube IFrame Player API -->
    <script src="https://www.youtube.com/iframe_api"></script>
    <script>
        // Data for interactive elements
        const toolInfoDetails = {
            'lan-tester-info': {
                title: 'LAN Tester',
                description: 'LAN Tester digunakan untuk mengecek koneksi kabel LAN RJ45 dan RJ11, serta mendeteksi urutan kabel (straight atau cross). Beberapa dilengkapi fitur tone checker untuk menemukan lokasi kerusakan.'
            },
            'multimeter-info': {
                title: 'Multimeter',
                description: 'Multimeter adalah alat serbaguna untuk mengukur tegangan (DC/AC), arus (DC/AC), dan hambatan. Terdapat dua jenis: analog (membutuhkan pembacaan skala manual) dan digital (menampilkan hasil langsung).'
            },
            'earth-tester-info': {
                title: 'Earth Tester',
                description: 'Earth Tester berfungsi untuk mengukur nilai resistansi instalasi grounding. Pengukuran ini penting untuk memastikan keamanan sistem kelistrikan dengan memastikan nilai tahanan pentanahan yang rendah.'
            },
            'opm-info': {
                title: 'Optical Power Meter (OPM)',
                description: 'OPM digunakan dalam jaringan fiber optik untuk mengukur level daya penerima sinyal optik. Hasil pengukuran dinyatakan dalam dBm dan penting untuk uji terima serta deteksi gangguan.'
            },
            'otdr-info': {
                title: 'Optical Time Domain Reflectometer (OTDR)',
                description: 'OTDR adalah alat canggih untuk mengukur saluran optik, menampilkan visualisasi redaman sepanjang kabel. Berguna untuk mengukur redaman sambungan, panjang kabel, dan menemukan lokasi kerusakan pada fiber optik.'
            },
            'fusion-splicer-info': {
                title: 'Fusion Splicer',
                description: 'Fusion Splicer adalah alat presisi untuk menyambung dua ujung serat optik dengan fusi (leleh). Ini menciptakan sambungan permanen dengan kehilangan sinyal yang sangat rendah, krusial untuk instalasi dan perbaikan fiber optik.'
            },
            'speed-test-info': {
                title: 'Speed Test',
                description: 'Speed test adalah sebuah layanan berbentuk aplikasi berbasis web yang digunakan untuk menguji kecepatan performa koneksi internet, baik kabel, seluler, maupun Wi-Fi. Kapasitas maksimal jaringan internet yang kita gunakan untuk mengunggah (upload) dan mengunduh (download) data dapat dilakukan menggunakan aplikasi ini. Dengan melakukan pengetesan, kita akan mengetahui besarnya bandwidth dari koneksi internet yang sedang digunakan.'
            },
            'wifi-analyzer-info': {
                title: 'Wi-Fi Analyzer',
                description: 'Wi-Fi Analyzer merupakan sebuah aplikasi yang dapat digunakan untuk mengetahui kekuatan sinyal Wi-Fi yang terletak pada suatu lokasi tertentu. Dengan menggunakan aplikasi ini, kita dapat memeriksa kualitas jaringan yang diterima oleh perangkat yang digunakan. Saat ini, sudah banyak aplikasi semacam ini yang dapat kita unduh dengan mudah untuk digunakan pada perangkat telepon seluler atau komputer.'
            },
            'ping-test-info': {
                title: 'Ping Test',
                description: 'Ping adalah singkatan dari Packet Internet Network Groper. Perintah ping digunakan untuk menguji kecepatan koneksi pada jaringan komputer kita. Jaringan komputer yang diperiksa tidak harus terhubung dengan internet. Dengan menggunakan ping test, kita dapat melihat seberapa cepat respons dari komputer lawan. Semakin cepat respons yang diberikan, semakin bagus kondisi jaringannya, demikian sebaliknya.'
            }
        };

        // Scroll Progress Indicator
        window.onscroll = function() { updateScrollProgress() };

        function updateScrollProgress() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("scrollProgress").style.width = scrolled + "%";
        }

        // particles.js configuration
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": ["#00ffcc", "#0066ff", "#ff6b35"]
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#00ffcc",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 3,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "grab"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 140,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });


        // Scroll to section function
        function scrollToSection(id) {
            const section = document.getElementById(id);
            if (section) {
                section.scrollIntoView({ behavior: 'smooth' });
            }
        }

        // Interactive Demo - simply scrolls to a specific section for now
        function startInteractiveDemo() {
            scrollToSection('multimeter-section'); 
        }

        // Tool Info Modal
        document.querySelectorAll('.tool-icon, .stack-layer, .model-layer').forEach(element => {
            element.addEventListener('click', function() {
                const toolId = this.dataset.toolId || this.dataset.layerId;
                const info = toolInfoDetails[toolId];
                if (info) {
                    document.getElementById('modalToolTitle').textContent = info.title;
                    document.getElementById('modalToolDescription').textContent = info.description;
                    document.getElementById('toolInfoModal').style.display = 'flex';
                }
            });
        });

        function closeToolInfoModal() {
            document.getElementById('toolInfoModal').style.display = 'none';
        }

        // Quiz functionality
        const quizAnswers = {
            q1: 'a', // LAN Tester
            q2: 'd', // Fusion Splicer
            q3: 'c', // Optical Power Meter
            q4: 'a', // Hubungkan probe secara seri ke sirkuit
            q5: 'a',  // Melindungi mata dari busur listrik dan pecahan serat yang tajam.
            q6: 'a', // Speed Test
            q7: 'b'  // Ping
        };

        // Minimum score to unlock next material
        const REQUIRED_SCORE = 80;

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
            opt.classList.remove('selected', 'correct', 'incorrect'); // Clear previous results
            });

            // Add 'selected' class to the clicked option
            selectedOption.classList.add('selected');
        }
        function resetQuizUI() {
            document.querySelectorAll('.quiz-option').forEach(option => {
                option.classList.remove('selected', 'correct', 'incorrect');
            });
            document.getElementById('quiz-feedback').textContent = "";
            document.getElementById('nextMaterialBtn').classList.add('d-none'); // Hide button
            document.getElementById('nextMaterialBtn').disabled = true; // Disable button
        }

        // Mapping of quiz questions to their full text and relevant material section IDs
        const quizQuestionsData = {
        q1: {
            question: "Alat ukur apa yang berfungsi untuk mengecek koneksi kabel LAN RJ45 dan RJ11?",
            correctAnswerText: "LAN Tester",
            materialSectionTitle: "LAN Tester"
        },
        q2: {
            question: "Alat presisi yang digunakan untuk menyambung dua ujung serat optik dengan melelehkannya menggunakan busur listrik adalah...",
            correctAnswerText: "Fusion Splicer",
            materialSectionTitle: "Fusion Splice"
        },
        q3: {
            question: "Alat ukur apa yang digunakan untuk mengetahui nilai level daya pada saluran fiber optik?",
            correctAnswerText: "Optical Power Meter",
            materialSectionTitle: "Fiber Optik" // Multimeter section, but resistance scale is not explicitly detailed
        },
        q4: {
            question: "Untuk mengukur arus DC menggunakan multimeter analog, setelah mengatur sakelar pemilih, langkah selanjutnya adalah...",
            correctAnswerText: "Hubungkan probe secara seri ke sirkuit",
            materialSectionTitle: "Multimeter"
        },
        q5: {
            question: "Mengapa penggunaan kacamata safety sangat dianjurkan saat menggunakan Fusion Splicer?",
            correctAnswerText: "Melindungi mata dari busur listrik dan pecahan serat yang tajam.",
            materialSectionTitle: "Fusion Splicer"
        },
        q6: {
            question: "Layanan aplikasi berbasis web yang digunakan untuk menguji kecepatan performa koneksi internet adalah...",
            correctAnswerText: "Speed Test",
            materialSectionTitle: "Speed Test"
        },
        q7: {
            question: "Singkatan dari Packet Internet Network Groper adalah...",
            correctAnswerText: "Ping",
            materialSectionTitle: "Ping Test"
        }
    };

    // Function to check quiz answers and provide feedback
    function checkQuiz() {
        let score = 0;
        const totalQuestions = Object.keys(quizAnswers).length;
        const feedback = document.getElementById('quiz-feedback');
        const nextMaterialBtn = document.getElementById('nextMaterialBtn');

        // Clear previous results visually
        document.querySelectorAll('.quiz-option').forEach(option => {
            option.classList.remove('correct', 'incorrect');
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
                selectedOption.classList.add('correct');
            } else {
                selectedOption.classList.add('incorrect');
                // Highlight the correct answer for clarity
                const correctOption = document.querySelector(`.quiz-option[data-question="${qId}"][data-choice="${correctAnswer}"]`);
                if (correctOption) {
                    correctOption.classList.add('correct');
                }
            }
        }

        if (!allAnswered) {
            showAlert("Mohon jawab semua pertanyaan sebelum memeriksa.", 'warning');
            nextMaterialBtn.classList.add('d-none'); // Hide button
            nextMaterialBtn.disabled = true;
            return;
        }
        
        const percentage = (score / totalQuestions) * 100;
        
        // Store the score for Material 1 in localStorage using the correct key
        localStorage.setItem('material_1_score', percentage.toFixed(0)); // Key for Material 1

        if (percentage >= REQUIRED_SCORE) { // Passing score
            showAlert(`Selamat! Anda berhasil memahami materi ini dengan baik dengan skor ${percentage.toFixed(0)}%. Semua materi telah diselesaikan!`, 'success');
            nextMaterialBtn.classList.remove('d-none'); // Show next material button
            nextMaterialBtn.disabled = false;
        } else {
            showAlert(`Skor Anda: ${percentage.toFixed(0)}%. Terus semangat belajar! Anda perlu mencapai setidaknya ${REQUIRED_SCORE}% untuk melanjutkan.`, 'danger');
            nextMaterialBtn.classList.add('d-none'); // Hide button
            nextMaterialBtn.disabled = true;
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
        const savedScore = parseInt(localStorage.getItem('material_1_score')) || 0;
        const nextMaterialBtn = document.getElementById('nextMaterialBtn');
        if (savedScore >= REQUIRED_SCORE) {
            nextMaterialBtn.classList.remove('d-none');
            nextMaterialBtn.disabled = false;
        } else {
            nextMaterialBtn.classList.add('d-none');
            nextMaterialBtn.disabled = true;
        }
    });

    </script>
@endsection
