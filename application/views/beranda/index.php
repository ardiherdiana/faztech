<?php $this->load->view('templates/header'); ?>

<!-- Flash Messages -->
<?php if ($this->session->flashdata('sukses')): ?>
    <div class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50 mt-4">
        <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg shadow-lg flex items-center">
            <i class="ri-checkbox-circle-line mr-3 text-lg"></i>
            <span><?= $this->session->flashdata('sukses') ?></span>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-green-700 hover:text-green-900">
                <i class="ri-close-line"></i>
            </button>
        </div>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50 mt-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg shadow-lg flex items-center">
            <i class="ri-error-warning-line mr-3 text-lg"></i>
            <span><?= $this->session->flashdata('error') ?></span>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-red-700 hover:text-red-900">
                <i class="ri-close-line"></i>
            </button>
        </div>
    </div>
<?php endif; ?>

<!-- Hero Section dengan Carousel Gambar -->
<section class="relative min-h-screen flex items-center overflow-hidden">
    <!-- Carousel Slider -->
    <div class="absolute inset-0 z-0">
        <div class="carousel-container w-full h-full">
            <div class="carousel-slide absolute inset-0 bg-cover bg-center transition-opacity duration-1000" style="background-image: url('<?= base_url('assets/img/hikvision1.jpg') ?>');"></div>
            <div class="carousel-slide absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0" style="background-image: url('<?= base_url('assets/img/hikvision2.jpg') ?>');"></div>
            <div class="carousel-slide absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0" style="background-image: url('<?= base_url('assets/img/hikvision3.jpg') ?>');"></div>
        </div>

        <!-- Overlay gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-transparent"></div>
    </div>

    <!-- Konten Hero -->
    <div class="container mx-auto px-6 py-12 z-10 relative">
        <div class="max-w-xl text-white">
            <div data-aos="fade-up" data-aos-duration="800">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                    Inovasi Keamanan <span class="text-primary">Masa Depan</span> Bersama Faztech
                </h1>
                <p class="text-lg text-gray-300 mb-8 max-w-lg">
                    Faztech menghadirkan sistem pengawasan canggih dengan dukungan teknologi AI dan perangkat terbaik dari mitra terpercaya seperti Hikvision.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="<?= base_url('produk') ?>"
                        class="inline-flex items-center bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transform hover:-translate-y-1 transition-all duration-300 shadow-lg shadow-primary/30">
                        <i class="ri-eye-fill mr-2 ri-lg"></i>
                        Lihat Produk Keamanan
                    </a>
                    <a href="#produk"
                        class="inline-flex items-center border-2 border-white/30 backdrop-blur-sm text-white px-6 py-3 rounded-lg hover:bg-white/10 transform hover:-translate-y-1 transition-all duration-300">
                        <i class="ri-arrow-down-line mr-2 ri-lg"></i>
                        Jelajahi Layanan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Indicator dots -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
        <button class="w-3 h-3 rounded-full bg-white/70 carousel-indicator active" data-index="0"></button>
        <button class="w-3 h-3 rounded-full bg-white/30 carousel-indicator" data-index="1"></button>
        <button class="w-3 h-3 rounded-full bg-white/30 carousel-indicator" data-index="2"></button>
    </div>
</section>

<!-- Our Services Section -->
<section id="tentang" class="py-20 bg-gray-50 overflow-hidden relative">
    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-primary/5 to-transparent"></div>

    <!-- Floating circles decoration -->
    <div class="absolute top-10 right-10 w-32 h-32 bg-primary/5 rounded-full animate-pulse"></div>
    <div class="absolute bottom-20 left-20 w-20 h-20 bg-secondary/10 rounded-full animate-bounce"></div>

    <div class="container mx-auto px-4 relative">
        <!-- Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-block px-3 py-1 bg-primary/10 text-primary rounded-full text-sm font-semibold mb-3">LAYANAN KAMI</span>
            <h2 class="text-4xl font-bold text-gray-900">Solusi Keamanan <span class="text-primary">Terbaik</span></h2>
            <div class="w-24 h-1 bg-primary mx-auto mt-4 rounded-full"></div>
            <p class="text-gray-600 max-w-2xl mx-auto mt-4">Dari konsultasi hingga maintenance, kami menyediakan layanan lengkap untuk semua kebutuhan keamanan Anda</p>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            <!-- Service 1: Konsultasi -->
            <div class="group bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="ri-user-star-line text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Konsultasi Gratis</h3>
                <p class="text-gray-600 mb-4">Tim ahli kami siap memberikan konsultasi mendalam untuk merancang sistem keamanan yang tepat sesuai kebutuhan properti Anda.</p>

            </div>

            <!-- Service 2: Instalasi -->
            <div class="group bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-gradient-to-br from-secondary to-primary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="ri-tools-line text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Instalasi Profesional</h3>
                <p class="text-gray-600 mb-4">Teknisi berpengalaman melakukan pemasangan dengan standar internasional, memastikan sistem bekerja optimal dan tahan lama.</p>

            </div>

            <!-- Service 3: Monitoring -->
            <div class="group bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="ri-eye-line text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Monitoring 24/7</h3>
                <p class="text-gray-600 mb-4">Sistem pemantauan profesional yang aktif 24 jam untuk memastikan keamanan properti Anda terjaga setiap saat.</p>
            </div>

            <!-- Service 4: Maintenance -->
            <div class="group bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="400">
                <div class="w-16 h-16 bg-gradient-to-br from-secondary to-primary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="ri-settings-3-line text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Maintenance Rutin</h3>
                <p class="text-gray-600 mb-4">Perawatan berkala untuk menjaga performa optimal sistem keamanan dan memperpanjang usia perangkat.</p>
            </div>

            <!-- Service 5: Upgrade -->
            <div class="group bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="500">
                <div class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="ri-arrow-up-circle-line text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">System Upgrade</h3>
                <p class="text-gray-600 mb-4">Peningkatan sistem dengan teknologi terbaru untuk mengikuti perkembangan zaman dan meningkatkan keamanan.</p>
            </div>

            <!-- Service 6: Support -->
            <div class="group bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="600">
                <div class="w-16 h-16 bg-gradient-to-br from-secondary to-primary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="ri-customer-service-2-line text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Technical Support</h3>
                <p class="text-gray-600 mb-4">Dukungan teknis profesional siap membantu mengatasi masalah dan pertanyaan terkait sistem keamanan Anda.</p>

            </div>
        </div>

    </div>
</section>

<!-- Produk Section dengan Card Modern -->
<section id="produk" class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block px-3 py-1 bg-primary/10 text-primary rounded-full text-sm font-semibold mb-3">PRODUK KAMI</span>
            <h2 class="text-4xl font-bold text-gray-900">Produk Keamanan Premium</h2>
            <div class="w-24 h-1 bg-primary mx-auto mt-4 rounded-full"></div>
            <p class="text-gray-600 max-w-2xl mx-auto mt-4">Temukan berbagai solusi keamanan berkualitas tinggi dengan teknologi terbaru dari Hikvision</p>
        </div>

        <!-- Daftar Produk -->
        <div id="daftarProduk" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <?php if (empty($produk_unggulan)): ?>
                <div class="col-span-full text-center py-12">
                    <div class="flex flex-col items-center">
                        <i class="ri-shopping-bag-line ri-4x text-gray-300 mb-4"></i>
                        <p class="text-gray-500">Tidak ada produk yang tersedia saat ini.</p>
                        <p class="text-sm text-gray-400 mt-2">Silakan cek kembali nanti</p>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($produk_unggulan as $index => $produk): ?>
                    <div class="group bg-white rounded-xl overflow-hidden border border-gray-200 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 produk-item"
                        data-kategori="<?= $produk->kategori ?>"
                        data-nama="<?= $produk->nama_produk ?>"
                        data-aos="fade-up"
                        data-aos-delay="<?= 100 + ($index * 50) ?>">
                        <div class="h-48 overflow-hidden relative">
                            <?php if (!empty($produk->gambar)): ?>
                                <img src="<?= base_url('uploads/products/' . $produk->gambar) ?>"
                                    alt="<?= $produk->nama_produk ?>"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                    <i class="ri-image-line ri-3x text-gray-400"></i>
                                </div>
                            <?php endif; ?>

                            <!-- Badge -->
                            <div class="absolute top-3 left-3 bg-primary text-white text-xs font-bold uppercase px-2 py-1 rounded-md">
                                <?= $produk->kategori ?>
                            </div>

                            <!-- Quick action overlay -->
                            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <button class="bg-white text-primary p-2 rounded-full mx-2 hover:bg-primary hover:text-white transition-colors detail-btn"
                                    data-id="<?= $produk->id ?>" title="Lihat Detail">
                                    <i class="ri-eye-line ri-lg"></i>
                                </button>
                                <a href="<?= 'https://wa.me/6281234567890?text=' . urlencode('Halo admin, saya tertarik dengan produk: ' . $produk->nama_produk) ?>"
                                    class="bg-white text-green-500 p-2 rounded-full mx-2 hover:bg-green-500 hover:text-white transition-colors"
                                    title="Beli via WhatsApp" target="_blank">
                                    <i class="ri-whatsapp-line ri-lg"></i>
                                </a>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg font-bold text-gray-900 group-hover:text-primary transition-colors"><?= $produk->nama_produk ?></h3>
                                <?php if ($produk->stok > 0): ?>
                                    <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full">Tersedia</span>
                                <?php else: ?>
                                    <span class="bg-red-100 text-red-700 text-xs px-2 py-1 rounded-full">Habis</span>
                                <?php endif; ?>
                            </div>
                            <p class="text-gray-600 mb-4 text-sm line-clamp-2"><?= $produk->deskripsi ?></p>
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-xl text-primary">Rp <?= number_format($produk->harga, 0, ',', '.') ?></span>
                                <button class="text-sm px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition detail-btn"
                                    data-id="<?= $produk->id ?>">
                                    Detail
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Tombol Lihat Produk Selengkapnya -->
        <?php if ($total_produk > 8): ?>
            <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="700">
                <a href="<?= base_url('produk') ?>"
                    class="inline-flex items-center bg-primary text-white px-8 py-4 rounded-xl font-semibold text-lg hover:from-blue-600 hover:to-primary transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                    <span>Lihat Produk Selengkapnya</span>
                    <span class="ml-2 bg-white/20 text-white text-sm px-2 py-1 rounded-full"><?= $total_produk ?> Produk</span>
                    <i class="ri-arrow-right-line ml-3 ri-lg"></i>
                </a>
                <p class="text-gray-500 text-sm mt-3">Jelajahi koleksi lengkap produk keamanan kami</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Fitur-Fitur Keamanan Modern Section -->
<section class="py-20 bg-gradient-to-br from-blue-900 to-primary text-white relative overflow-hidden">
    <!-- Background elements -->
    <div class="absolute inset-0 overflow-hidden">
        <svg class="absolute top-0 left-0 w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="rgba(255, 255, 255, 0.05)" fill-opacity="1" d="M0,96L48,122.7C96,149,192,203,288,208C384,213,480,171,576,165.3C672,160,768,192,864,197.3C960,203,1056,181,1152,170.7C1248,160,1344,160,1392,160L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
        <div class="absolute top-10 right-10 w-64 h-64 bg-blue-500/10 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-10 left-10 w-64 h-64 bg-white/5 rounded-full filter blur-3xl"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-block px-3 py-1 bg-white/10 text-white rounded-full text-sm font-semibold mb-3 backdrop-blur-sm">TEKNOLOGI CANGGIH</span>
            <h2 class="text-4xl font-bold">Fitur Keamanan Terdepan</h2>
            <div class="w-24 h-1 bg-white/50 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white/10 backdrop-blur-md rounded-xl p-8 border border-white/20 transform transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center mb-6">
                    <i class="ri-eye-fill ri-2x text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Smart Facial Recognition</h3>
                <p class="text-white/80">Teknologi pengenalan wajah untuk identifikasi akurat dan keamanan tingkat tinggi. Dapat mengenali wajah bahkan dalam kondisi pencahayaan minim.</p>
                <div class="mt-6 flex gap-2 flex-wrap">
                    <span class="text-xs bg-white/20 px-2 py-1 rounded">Multi-Face Detection</span>
                    <span class="text-xs bg-white/20 px-2 py-1 rounded">Deep Learning</span>
                    <span class="text-xs bg-white/20 px-2 py-1 rounded">High Accuracy</span>
                </div>
            </div>

            <div class="bg-white/10 backdrop-blur-md rounded-xl p-8 border border-white/20 transform transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center mb-6">
                    <i class="ri-radar-fill ri-2x text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Advanced Motion Detection</h3>
                <p class="text-white/80">Deteksi gerakan canggih dengan algoritma cerdas untuk mengurangi false alarm. Mampu membedakan manusia, hewan, dan kendaraan.</p>
                <div class="mt-6 flex gap-2 flex-wrap">
                    <span class="text-xs bg-white/20 px-2 py-1 rounded">Human Detection</span>
                    <span class="text-xs bg-white/20 px-2 py-1 rounded">Vehicle Tracking</span>
                    <span class="text-xs bg-white/20 px-2 py-1 rounded">AI Filtering</span>
                </div>
            </div>

            <div class="bg-white/10 backdrop-blur-md rounded-xl p-8 border border-white/20 transform transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center mb-6">
                    <i class="ri-cloud-fill ri-2x text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Cloud Storage & Backup</h3>
                <p class="text-white/80">Penyimpanan rekaman di cloud dengan enkripsi tingkat tinggi. Akses data kapan saja, di mana saja dengan keamanan maksimal.</p>
                <div class="mt-6 flex gap-2 flex-wrap">
                    <span class="text-xs bg-white/20 px-2 py-1 rounded">End-to-End Encryption</span>
                    <span class="text-xs bg-white/20 px-2 py-1 rounded">Auto Backup</span>
                    <span class="text-xs bg-white/20 px-2 py-1 rounded">Remote Access</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimoni Section dengan Card Modular -->
<section id="testimoni" class="py-24 bg-gray-50 overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block px-3 py-1 bg-primary/10 text-primary rounded-full text-sm font-semibold mb-3">Testimoni</span>
            <h2 class="text-4xl font-bold text-gray-900">Apa Kata Mereka</h2>
            <div class="w-24 h-1 bg-primary mx-auto mt-4 rounded-full"></div>
            <p class="text-gray-600 max-w-2xl mx-auto mt-4">Lihat bagaimana sistem keamanan kami membantu pelanggan merasa aman dan tenang</p>
        </div>
        <?php if (empty($testimoni_terbaru)): ?>
            <div class="text-center py-12">
                <div class="flex flex-col items-center">
                    <i class="ri-chat-smile-line ri-4x text-gray-300 mb-4"></i>
                    <p class="text-gray-500">Belum ada testimoni saat ini.</p>
                    <p class="text-sm text-gray-400 mt-2">Jadilah yang pertama memberikan ulasan</p>
                </div>
            </div>
        <?php else: ?>
            <!-- Testimoni Infinite Scroll -->
            <div class="relative" data-aos="fade-up" data-aos-delay="200">
                <!-- Gradient overlay left -->
                <div class="absolute left-0 top-0 w-20 h-full bg-gradient-to-r from-gray-50 to-transparent z-10"></div>

                <!-- Gradient overlay right -->
                <div class="absolute right-0 top-0 w-20 h-full bg-gradient-to-l from-gray-50 to-transparent z-10"></div>

                <!-- Testimoni Container -->
                <div class="overflow-hidden">
                    <div class="testimoni-scroll flex space-x-8 items-stretch animate-testimoni-scroll">
                        <?php foreach ($testimoni_terbaru as $testimoni): ?>
                            <div class="flex-shrink-0 w-80">
                                <div class="bg-white rounded-xl shadow-lg p-8 h-full flex flex-col">
                                    <!-- Quote Icon -->
                                    <div class="text-primary/20 mb-4">
                                        <i class="ri-double-quotes-l ri-3x"></i>
                                    </div>

                                    <!-- Testimoni Text -->
                                    <p class="text-gray-700 italic mb-6 flex-grow">"<?= $testimoni->deskripsi ?>"</p>

                                    <!-- Rating -->
                                    <div class="flex items-center mb-4">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <?php if ($i <= $testimoni->rating): ?>
                                                <i class="ri-star-fill text-yellow-400"></i>
                                            <?php else: ?>
                                                <i class="ri-star-line text-gray-300"></i>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </div>

                                    <!-- Author -->
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                            <?php if (!empty($testimoni->gambar)): ?>
                                                <img src="<?= base_url('uploads/testimonials/' . $testimoni->gambar) ?>"
                                                    alt="<?= $testimoni->nama ?>"
                                                    class="w-full h-full object-cover">
                                            <?php else: ?>
                                                <div class="w-full h-full flex items-center justify-center bg-gray-200 rounded-full">
                                                    <i class="ri-user-line text-gray-400"></i>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-gray-900"><?= $testimoni->nama ?></h4>
                                            <p class="text-sm text-gray-600"><?= $testimoni->jabatan ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Trusted Partners Section dengan Auto Scroll -->
<section class="py-16 bg-white relative overflow-hidden">
    <div class="container mx-auto px-4">
        <!-- Auto Scrolling Logos -->
        <div class="relative" data-aos="fade-up" data-aos-delay="200">
            <!-- Gradient overlay left -->
            <div class="absolute left-0 top-0 w-20 h-full bg-gradient-to-r from-white to-transparent z-10"></div>

            <!-- Gradient overlay right -->
            <div class="absolute right-0 top-0 w-20 h-full bg-gradient-to-l from-white to-transparent z-10"></div>

            <!-- Scrolling container -->
            <div class="overflow-hidden">
                <div class="logos-scroll flex space-x-16 items-center animate-scroll-infinite">
                    <!-- Logo 1 -->
                    <div class="flex-shrink-0 w-36 h-20 flex items-center justify-center bg-white rounded-lg border border-gray-200 hover:shadow-md transition-shadow group">
                        <img src="<?= base_url('assets/img/cli1.webp') ?>"
                            alt="Client 1"
                            class="max-w-28 max-h-14 object-contain filter grayscale group-hover:grayscale-0 transition-all duration-300"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="hidden w-28 h-14 bg-gradient-to-r from-blue-500 to-blue-600 rounded flex items-center justify-center">
                            <span class="text-white font-bold text-xs">CLIENT 1</span>
                        </div>
                    </div>

                    <!-- Logo 2 -->
                    <div class="flex-shrink-0 w-36 h-20 flex items-center justify-center bg-white rounded-lg border border-gray-200 hover:shadow-md transition-shadow group">
                        <img src="<?= base_url('assets/img/cli1.webp') ?>"
                            alt="Client 2"
                            class="max-w-28 max-h-14 object-contain filter grayscale group-hover:grayscale-0 transition-all duration-300"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="hidden w-28 h-14 bg-gradient-to-r from-green-500 to-green-600 rounded flex items-center justify-center">
                            <span class="text-white font-bold text-xs">CLIENT 2</span>
                        </div>
                    </div>

                    <!-- Logo 3 -->
                    <div class="flex-shrink-0 w-36 h-20 flex items-center justify-center bg-white rounded-lg border border-gray-200 hover:shadow-md transition-shadow group">
                        <img src="<?= base_url('assets/img/cli1.webp') ?>"
                            alt="Client 3"
                            class="max-w-28 max-h-14 object-contain filter grayscale group-hover:grayscale-0 transition-all duration-300"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="hidden w-28 h-14 bg-gradient-to-r from-purple-500 to-purple-600 rounded flex items-center justify-center">
                            <span class="text-white font-bold text-xs">CLIENT 3</span>
                        </div>
                    </div>

                    <!-- Logo 4 -->
                    <div class="flex-shrink-0 w-36 h-20 flex items-center justify-center bg-white rounded-lg border border-gray-200 hover:shadow-md transition-shadow group">
                        <img src="<?= base_url('assets/img/cli1.webp') ?>"
                            alt="Client 4"
                            class="max-w-28 max-h-14 object-contain filter grayscale group-hover:grayscale-0 transition-all duration-300"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="hidden w-28 h-14 bg-gradient-to-r from-red-500 to-red-600 rounded flex items-center justify-center">
                            <span class="text-white font-bold text-xs">CLIENT 4</span>
                        </div>
                    </div>

                    <!-- Logo 5 -->
                    <div class="flex-shrink-0 w-36 h-20 flex items-center justify-center bg-white rounded-lg border border-gray-200 hover:shadow-md transition-shadow group">
                        <img src="<?= base_url('assets/img/cli1.webp') ?>"
                            alt="Client 5"
                            class="max-w-28 max-h-14 object-contain filter grayscale group-hover:grayscale-0 transition-all duration-300"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="hidden w-28 h-14 bg-gradient-to-r from-indigo-500 to-indigo-600 rounded flex items-center justify-center">
                            <span class="text-white font-bold text-xs">CLIENT 5</span>
                        </div>
                    </div>

                    <!-- Logo 6 -->
                    <div class="flex-shrink-0 w-36 h-20 flex items-center justify-center bg-white rounded-lg border border-gray-200 hover:shadow-md transition-shadow group">
                        <img src="<?= base_url('assets/img/cli1.webp') ?>"
                            alt="Client 6"
                            class="max-w-28 max-h-14 object-contain filter grayscale group-hover:grayscale-0 transition-all duration-300"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="hidden w-28 h-14 bg-gradient-to-r from-orange-500 to-orange-600 rounded flex items-center justify-center">
                            <span class="text-white font-bold text-xs">CLIENT 6</span>
                        </div>
                    </div>

                    <!-- Logo 7 -->
                    <div class="flex-shrink-0 w-36 h-20 flex items-center justify-center bg-white rounded-lg border border-gray-200 hover:shadow-md transition-shadow group">
                        <img src="<?= base_url('assets/img/cli1.webp') ?>"
                            alt="Client 7"
                            class="max-w-28 max-h-14 object-contain filter grayscale group-hover:grayscale-0 transition-all duration-300"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="hidden w-28 h-14 bg-gradient-to-r from-teal-500 to-teal-600 rounded flex items-center justify-center">
                            <span class="text-white font-bold text-xs">CLIENT 7</span>
                        </div>
                    </div>

                    <!-- Logo 8 -->
                    <div class="flex-shrink-0 w-36 h-20 flex items-center justify-center bg-white rounded-lg border border-gray-200 hover:shadow-md transition-shadow group">
                        <img src="<?= base_url('assets/img/cli1.webp') ?>"
                            alt="Client 8"
                            class="max-w-28 max-h-14 object-contain filter grayscale group-hover:grayscale-0 transition-all duration-300"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="hidden w-28 h-14 bg-gradient-to-r from-pink-500 to-pink-600 rounded flex items-center justify-center">
                            <span class="text-white font-bold text-xs">CLIENT 8</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section dengan Accordion -->
<section id="faq" class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-block px-3 py-1 bg-primary/10 text-primary rounded-full text-sm font-semibold mb-3">FAQ</span>
            <h2 class="text-4xl font-bold text-gray-900">Pertanyaan Umum</h2>
            <div class="w-24 h-1 bg-primary mx-auto mt-4 rounded-full"></div>
            <p class="text-gray-600 max-w-2xl mx-auto mt-4">Temukan jawaban atas pertanyaan yang sering diajukan tentang layanan keamanan kami</p>
        </div>

        <div class="max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            <div class="space-y-4" id="accordionFaq">
                <!-- FAQ Item 1 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button class="w-full flex justify-between items-center p-5 text-left bg-white hover:bg-gray-50 transition-colors faq-button" data-target="faq1">
                        <span class="font-bold text-gray-900">Berapa lama waktu instalasi sistem CCTV?</span>
                        <i class="ri-arrow-down-s-line ri-lg text-primary transition-transform"></i>
                    </button>
                    <div class="bg-gray-50 px-5 overflow-hidden transition-all duration-300 max-h-0 faq-content" id="faq1">
                        <div class="py-5 text-gray-700">
                            Waktu instalasi bervariasi tergantung pada ukuran properti dan kompleksitas sistem. Untuk rumah kecil hingga menengah, instalasi biasanya memakan waktu 1-2 hari. Untuk bisnis atau properti yang lebih besar, mungkin memerlukan 2-5 hari. Tim kami akan memberikan estimasi waktu yang lebih akurat setelah survei lokasi.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button class="w-full flex justify-between items-center p-5 text-left bg-white hover:bg-gray-50 transition-colors faq-button" data-target="faq2">
                        <span class="font-bold text-gray-900">Apakah sistem CCTV dapat diakses dari jarak jauh?</span>
                        <i class="ri-arrow-down-s-line ri-lg text-primary transition-transform"></i>
                    </button>
                    <div class="bg-gray-50 px-5 overflow-hidden transition-all duration-300 max-h-0 faq-content" id="faq2">
                        <div class="py-5 text-gray-700">
                            Ya, semua sistem CCTV modern yang kami tawarkan dapat diakses dari jarak jauh melalui smartphone, tablet, atau komputer. Anda dapat memantau properti Anda kapan saja dan di mana saja melalui aplikasi khusus dengan koneksi internet. Fitur ini memungkinkan Anda untuk melihat feed langsung, memutar rekaman, dan menerima notifikasi ketika ada gerakan yang terdeteksi.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button class="w-full flex justify-between items-center p-5 text-left bg-white hover:bg-gray-50 transition-colors faq-button" data-target="faq3">
                        <span class="font-bold text-gray-900">Apa saja paket layanan maintenance yang tersedia?</span>
                        <i class="ri-arrow-down-s-line ri-lg text-primary transition-transform"></i>
                    </button>
                    <div class="bg-gray-50 px-5 overflow-hidden transition-all duration-300 max-h-0 faq-content" id="faq3">
                        <div class="py-5 text-gray-700">
                            Kami menawarkan beberapa paket maintenance, mulai dari pemeriksaan rutin bulanan hingga paket premium dengan dukungan 24/7 dan waktu respons cepat. Paket dasar mencakup pemeriksaan perangkat keras, pembersihan kamera, dan pembaruan perangkat lunak. Paket yang lebih tinggi mencakup penggantian komponen, cadangan cloud, dan dukungan prioritas. Semua paket dapat disesuaikan dengan kebutuhan spesifik Anda.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button class="w-full flex justify-between items-center p-5 text-left bg-white hover:bg-gray-50 transition-colors faq-button" data-target="faq4">
                        <span class="font-bold text-gray-900">Berapa lama rekaman CCTV dapat disimpan?</span>
                        <i class="ri-arrow-down-s-line ri-lg text-primary transition-transform"></i>
                    </button>
                    <div class="bg-gray-50 px-5 overflow-hidden transition-all duration-300 max-h-0 faq-content" id="faq4">
                        <div class="py-5 text-gray-700">
                            Masa penyimpanan rekaman tergantung pada kapasitas hard drive DVR/NVR, jumlah kamera, resolusi rekaman, dan pengaturan rekaman (terus-menerus atau berdasarkan gerakan). Sistem standar biasanya dapat menyimpan rekaman 7-30 hari. Kami juga menawarkan solusi penyimpanan cloud yang dapat menyimpan rekaman lebih lama. Tim teknis kami dapat membantu Anda menentukan solusi penyimpanan terbaik berdasarkan kebutuhan Anda.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button class="w-full flex justify-between items-center p-5 text-left bg-white hover:bg-gray-50 transition-colors faq-button" data-target="faq5">
                        <span class="font-bold text-gray-900">Apakah sistem keamanan dapat diintegrasikan dengan smart home?</span>
                        <i class="ri-arrow-down-s-line ri-lg text-primary transition-transform"></i>
                    </button>
                    <div class="bg-gray-50 px-5 overflow-hidden transition-all duration-300 max-h-0 faq-content" id="faq5">
                        <div class="py-5 text-gray-700">
                            Ya, banyak sistem keamanan modern kami yang dapat diintegrasikan dengan platform smart home seperti Google Home, Amazon Alexa, atau Apple HomeKit. Integrasi ini memungkinkan Anda mengontrol sistem keamanan dengan perintah suara, mengotomatiskan perangkat berdasarkan aktivitas keamanan, dan menciptakan pengalaman rumah pintar yang lebih terpadu. Konsultan kami dapat membantu Anda memilih sistem yang kompatibel dengan ekosistem smart home Anda.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kontak Form Section -->
<section id="kontak" class="py-24 bg-gradient-to-br from-gray-50 via-blue-50 to-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block px-3 py-1 bg-primary/10 text-primary rounded-full text-sm font-semibold mb-3">Hubungi Kami</span>
            <h2 class="text-4xl font-bold text-gray-900">Lindungi Lokasi Anda Sekarang!</h2>
            <div class="w-24 h-1 bg-primary mx-auto mt-4 rounded-full"></div>
            <p class="text-gray-600 max-w-2xl mx-auto mt-4">Silahkan isi form di bawah ini, kami akan segera menghubungi Anda.</p>
        </div>

        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-2xl shadow-2xl p-8 md:p-12" data-aos="fade-up" data-aos-delay="200">
                <?= form_open('beranda/kirim_kontak', ['class' => 'space-y-6', 'id' => 'kontakForm']) ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">Nama</label>
                        <input type="text" id="nama" name="nama" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 bg-gray-50 hover:bg-white"
                            placeholder="Masukkan nama Anda">
                    </div>

                    <div>
                        <label for="telepon" class="block text-sm font-semibold text-gray-700 mb-2">Telepon</label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-xl">+62</span>
                            <input type="tel" id="telepon" name="telepon" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-r-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 bg-gray-50 hover:bg-white"
                                placeholder="812345678">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 bg-gray-50 hover:bg-white"
                            placeholder="nama@email.com">
                    </div>

                    <div>
                        <label for="jenis_properti" class="block text-sm font-semibold text-gray-700 mb-2">Jenis Properti</label>
                        <select id="jenis_properti" name="jenis_properti" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 bg-gray-50 hover:bg-white">
                            <option value="">-- Pilih Properti --</option>
                            <option value="Rumah Tinggal">Rumah Tinggal</option>
                            <option value="Apartemen">Apartemen</option>
                            <option value="Kantor">Kantor</option>
                            <option value="Toko/Ruko">Toko/Ruko</option>
                            <option value="Gudang">Gudang</option>
                            <option value="Pabrik">Pabrik</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="catatan" class="block text-sm font-semibold text-gray-700 mb-2">Catatan</label>
                    <textarea id="catatan" name="catatan" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 bg-gray-50 hover:bg-white resize-none"
                        placeholder="Ceritakan kebutuhan keamanan Anda, berapa titik CCTV yang diinginkan, atau pertanyaan lainnya..."></textarea>
                </div>

                <div class="flex items-center justify-center">
                    <div class="g-recaptcha" data-sitekey="YOUR_RECAPTCHA_SITE_KEY"></div>
                </div>

                <button type="submit"
                    class="w-full bg-primary text-white py-4 px-8 rounded-xl font-semibold text-lg hover:from-blue-600 hover:to-primary transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2">
                    <i class="ri-send-plane-fill"></i>
                    <span>Kirim Sekarang</span>
                </button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</section>

<!-- Modal Detail Produk dengan Desain Modern -->
<div id="modalDetailProduk" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm" id="modalOverlay"></div>

    <div class="bg-white rounded-2xl w-full max-w-4xl mx-4 relative z-10 overflow-hidden" id="modalContent">
        <button class="absolute top-4 right-4 z-20 bg-white rounded-full p-2 shadow-md text-gray-600 hover:text-primary transition-colors" id="closeModal">
            <i class="ri-close-line ri-xl"></i>
        </button>

        <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-1/2 bg-gray-100 p-6 md:p-8 relative">
                <div id="produkGambarModal" class="w-full h-64 md:h-80 flex items-center justify-center">
                    <!-- Gambar produk akan ditampilkan di sini -->
                </div>

                <!-- Badge -->
                <div id="produkKategoriModal" class="absolute top-8 left-8 bg-primary text-white text-xs font-bold uppercase px-3 py-1 rounded-full shadow-md">
                    <!-- Kategori -->
                </div>
            </div>

            <div class="w-full md:w-1/2 p-6 md:p-8">
                <div class="h-full flex flex-col">
                    <h3 id="produkNamaModal" class="text-2xl font-bold text-gray-900 mb-2"><!-- Nama produk --></h3>

                    <div class="flex items-center mb-4">
                        <div class="flex items-center">
                            <span class="text-sm font-medium mr-2">Stok:</span>
                            <div id="stokIndicator" class="flex items-center">
                                <span id="stokStatus" class="w-3 h-3 rounded-full mr-2"></span>
                                <span id="produkStokModal" class="text-sm"></span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-100 rounded-xl p-4 mb-6">
                        <p class="text-3xl font-bold text-primary" id="produkHargaModal"><!-- Harga --></p>
                        <p class="text-xs text-gray-500 mt-1">Harga sudah termasuk pajak</p>
                    </div>

                    <div class="mb-6 flex-grow">
                        <h4 class="text-lg font-medium mb-3">Deskripsi</h4>
                        <div id="produkDeskripsiModal" class="text-gray-700 prose"><!-- Deskripsi --></div>
                    </div>

                    <div class="flex flex-col space-y-3">
                        <a href="#" id="produkBeliBtn" class="inline-block bg-primary text-white px-6 py-3 rounded-xl hover:bg-primary/90 transition text-center w-full font-medium">
                            <i class="ri-shopping-cart-line mr-2"></i> Beli Sekarang
                        </a>
                        <a href="#" id="produkWhatsappBtn" class="inline-block bg-green-500 text-white px-6 py-3 rounded-xl hover:bg-green-600 transition text-center w-full font-medium">
                            <i class="ri-whatsapp-line mr-2"></i> Tanya via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load Footer Template -->
<?php $this->load->view('templates/footer'); ?>

<!-- Script untuk carousel hero -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.carousel-slide');
        const indicators = document.querySelectorAll('.carousel-indicator');
        let currentIndex = 0;
        const interval = 5000;

        function showSlide(index) {
            slides.forEach(slide => {
                slide.classList.add('opacity-0');
            });

            indicators.forEach(indicator => {
                indicator.classList.remove('active');
                indicator.classList.remove('bg-white/70');
                indicator.classList.add('bg-white/30');
            });

            slides[index].classList.remove('opacity-0');

            indicators[index].classList.add('active');
            indicators[index].classList.remove('bg-white/30');
            indicators[index].classList.add('bg-white/70');

            // Update current index
            currentIndex = index;
        }

        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                showSlide(index);
                resetTimer();
            });
        });

        let timer = setInterval(nextSlide, interval);

        function nextSlide() {
            let nextIndex = (currentIndex + 1) % slides.length;
            showSlide(nextIndex);
        }

        function resetTimer() {
            clearInterval(timer);
            timer = setInterval(nextSlide, interval);
        }

        showSlide(0);

        // Auto-hide flash messages after 5 seconds
        setTimeout(function() {
            const flashMessages = document.querySelectorAll('[class*="fixed top-20"]');
            flashMessages.forEach(function(message) {
                message.style.opacity = '0';
                message.style.transform = 'translate(-50%, -100%)';
                setTimeout(function() {
                    message.remove();
                }, 300);
            });
        }, 5000);

        const faqButtons = document.querySelectorAll('.faq-button');

        faqButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const targetContent = document.getElementById(targetId);
                const arrow = this.querySelector('i');

                faqButtons.forEach(otherButton => {
                    if (otherButton !== this) {
                        const otherTargetId = otherButton.getAttribute('data-target');
                        const otherContent = document.getElementById(otherTargetId);
                        const otherArrow = otherButton.querySelector('i');

                        otherContent.style.maxHeight = '0px';
                        otherContent.classList.remove('open');

                        otherArrow.style.transform = 'rotate(0deg)';
                    }
                });

                if (targetContent.classList.contains('open')) {
                    targetContent.style.maxHeight = '0px';
                    targetContent.classList.remove('open');
                    arrow.style.transform = 'rotate(0deg)';
                } else {
                    targetContent.style.maxHeight = targetContent.scrollHeight + 'px';
                    targetContent.classList.add('open');
                    arrow.style.transform = 'rotate(180deg)';
                }
            });
        });

        // Modal functionality untuk detail produk
        const modal = document.getElementById('modalDetailProduk');
        const modalOverlay = document.getElementById('modalOverlay');
        const closeModal = document.getElementById('closeModal');
        const detailButtons = document.querySelectorAll('.detail-btn');

        // Open modal
        detailButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const produkId = this.getAttribute('data-id');

                // Fetch product details via AJAX
                fetch(`<?= base_url('beranda/detail_produk/') ?>${produkId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            alert('Produk tidak ditemukan');
                            return;
                        }

                        // Populate modal with product data
                        document.getElementById('produkNamaModal').textContent = data.nama_produk;
                        document.getElementById('produkKategoriModal').textContent = data.kategori;
                        document.getElementById('produkHargaModal').textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(data.harga);
                        document.getElementById('produkDeskripsiModal').innerHTML = data.deskripsi;
                        document.getElementById('produkStokModal').textContent = data.stok > 0 ? `${data.stok} unit` : 'Habis';

                        // Stock indicator
                        const stokStatus = document.getElementById('stokStatus');
                        if (data.stok > 0) {
                            stokStatus.className = 'w-3 h-3 rounded-full mr-2 bg-green-500';
                        } else {
                            stokStatus.className = 'w-3 h-3 rounded-full mr-2 bg-red-500';
                        }

                        // Product image
                        const gambarContainer = document.getElementById('produkGambarModal');
                        if (data.gambar) {
                            gambarContainer.innerHTML = `<img src="<?= base_url('uploads/products/') ?>${data.gambar}" alt="${data.nama_produk}" class="w-full h-full object-cover rounded-lg">`;
                        } else {
                            gambarContainer.innerHTML = '<div class="w-full h-full flex items-center justify-center bg-gray-200 rounded-lg"><i class="ri-image-line ri-4x text-gray-400"></i></div>';
                        }

                        // WhatsApp button
                        const whatsappMessage = encodeURIComponent(`Halo admin, saya tertarik dengan produk: ${data.nama_produk} dengan harga Rp ${new Intl.NumberFormat('id-ID').format(data.harga)}`);
                        document.getElementById('produkWhatsappBtn').href = `https://wa.me/6281234567890?text=${whatsappMessage}`;
                        document.getElementById('produkBeliBtn').href = `https://wa.me/6281234567890?text=${whatsappMessage}`;

                        // Show modal
                        modal.classList.remove('hidden');
                        document.body.style.overflow = 'hidden';
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat memuat detail produk');
                    });
            });
        });

        // Close modal
        function closeModalFunction() {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        if (closeModal) {
            closeModal.addEventListener('click', closeModalFunction);
        }

        if (modalOverlay) {
            modalOverlay.addEventListener('click', closeModalFunction);
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
                closeModalFunction();
            }
        });

        // Initialize infinite scroll for partners
        const logosContainer = document.querySelector('.logos-scroll');
        if (logosContainer) {
            // Clone all logos and append them for seamless loop
            const originalLogos = logosContainer.innerHTML;
            logosContainer.innerHTML = originalLogos + originalLogos;
        }

        // Initialize infinite scroll for testimonials
        const testimoniContainer = document.querySelector('.testimoni-scroll');
        if (testimoniContainer) {
            // Clone all testimonials and prepend them for left-to-right scroll
            const originalTestimoni = testimoniContainer.innerHTML;
            testimoniContainer.innerHTML = originalTestimoni + originalTestimoni;
        }
    });
</script>

<style>
    @keyframes float {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    .animate-float {
        animation: float 4s ease-in-out infinite;
    }

    @keyframes ping-slow {

        75%,
        100% {
            transform: scale(1.5);
            opacity: 0;
        }
    }

    .animate-ping-slow {
        animation: ping-slow 2s cubic-bezier(0, 0, 0.2, 1) infinite;
    }

    @keyframes slide {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-50%);
        }
    }

    .logo-slider {
        animation: slide 20s linear infinite;
    }

    .pulse-dot {
        position: relative;
    }

    .pulse-dot::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: currentColor;
        border-radius: 50%;
        animation: ping-slow 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        opacity: 0.7;
    }

    /* 3D Card effect */
    .feature-card {
        transition: transform 0.5s, box-shadow 0.5s;
        will-change: transform;
    }

    .feature-card:hover {
        transform: perspective(1000px) rotateX(2deg) rotateY(2deg) scale(1.05);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    /* Hero carousel styles */
    .carousel-slide {
        transition: opacity 1.5s ease;
    }

    .carousel-indicator {
        transition: all 0.3s ease;
    }

    .carousel-indicator.active {
        transform: scale(1.2);
    }

    /* Auto scroll animation for partners */
    @keyframes scroll-infinite {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .animate-scroll-infinite {
        animation: scroll-infinite 30s linear infinite;
        display: flex;
    }

    /* Pause animation on hover */
    .animate-scroll-infinite:hover {
        animation-play-state: paused;
    }

    /* Testimoni scroll animation */
    @keyframes testimoni-scroll {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(0);
        }
    }

    .animate-testimoni-scroll {
        animation: testimoni-scroll 30s linear infinite;
        display: flex;
    }

    /* Pause animation on hover */
    .animate-testimoni-scroll:hover {
        animation-play-state: paused;
    }

    /* Additional styles for better UX */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Custom scrollbar for modal */
    .prose {
        max-height: 200px;
        overflow-y: auto;
    }

    .prose::-webkit-scrollbar {
        width: 4px;
    }

    .prose::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 2px;
    }

    .prose::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 2px;
    }

    .prose::-webkit-scrollbar-thumb:hover {
        background: #a1a1a1;
    }
</style>