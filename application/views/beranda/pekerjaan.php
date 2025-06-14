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

<!-- Hero Section untuk Halaman Pekerjaan -->
<section class="py-24 bg-gradient-to-br from-primary/10 via-blue-50 to-gray-100 relative overflow-hidden">
    <!-- Background decoration -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-10 right-10 w-64 h-64 bg-primary/5 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-10 left-10 w-48 h-48 bg-blue-500/5 rounded-full filter blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12" data-aos="fade-up">
            <nav class="text-sm text-gray-600 mb-4">
                <a href="<?= base_url() ?>" class="hover:text-primary transition-colors">Beranda</a>
                <span class="mx-2">/</span>
                <span class="text-primary font-medium">Pekerjaan</span>
            </nav>

            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Hasil <span class="text-primary">Pekerjaan</span> Kami
            </h1>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Lihat berbagai proyek keamanan yang telah kami implementasikan dengan teknologi terdepan dan solusi inovatif
            </p>

            <!-- Stats -->
            <div class="flex justify-center items-center space-x-8 mt-8">
                <div class="text-center">
                    <div class="text-3xl font-bold text-primary"><?= $total_pekerjaan?></div>
                    <div class="text-sm text-gray-600">Total Proyek</div>
                </div>
                <div class="w-px h-12 bg-gray-300"></div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-primary">100%</div>
                    <div class="text-sm text-gray-600">Kepuasan Klien</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pekerjaan Gallery Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <?php if (empty($pekerjaan)): ?>
            <!-- No Pekerjaan Found -->
            <div class="text-center py-20">
                <div class="flex flex-col items-center">
                    <i class="ri-folder-image-line ri-4x text-gray-300 mb-6"></i>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Belum Ada Pekerjaan</h3>
                    <p class="text-gray-600 mb-6 max-w-md">
                        Perkerjaan sedang dalam proses pengembangan. Silakan hubungi kami untuk melihat contoh proyek terbaru.
                    </p>
                    <a href="<?= base_url('beranda#kontak') ?>"
                        class="bg-primary text-white px-6 py-3 rounded-xl hover:bg-primary/90 transition-colors font-medium">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        <?php else: ?>
            <!-- Pekerjaan Grid dengan Masonry Layout -->
            <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-6 space-y-6">
                <?php foreach ($pekerjaan as $index => $item): ?>
                    <div class="pekerjaan-item group break-inside-avoid relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3"
                        data-aos="fade-up"
                        data-aos-delay="<?= 100 + ($index * 100) ?>">

                        <!-- Pekerjaan Image Container dengan Aspect Ratio Konsisten -->
                        <div class="pekerjaan-image-container relative overflow-hidden aspect-square">

                            <?php if (!empty($item->foto) && file_exists('./uploads/jobs/' . $item->foto)): ?>
                                <img src="<?= base_url('uploads/jobs/' . $item->foto) ?>"
                                    alt="<?= $item->nama ?>"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:brightness-110">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-200 to-gray-300">
                                    <i class="ri-image-line ri-3x text-gray-400"></i>
                                </div>
                            <?php endif; ?>

                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>

                            <!-- Title Overlay with Creative Animation -->
                            <div class="absolute inset-0 flex items-end justify-center p-6 transform translate-y-full group-hover:translate-y-0 transition-all duration-500 ease-out">
                                <div class="text-center">
                                    <!-- Animated Title -->
                                    <h3 class="text-white font-bold text-lg sm:text-xl mb-2 transform translate-y-4 group-hover:translate-y-0 transition-all duration-700 delay-100">
                                        <?= $item->nama ?>
                                    </h3>

                                    <!-- Animated Line -->
                                    <div class="w-0 group-hover:w-full h-0.5 bg-primary transition-all duration-500 delay-200 mx-auto mb-3"></div>

                                    <!-- Date Badge with Animation -->
                                    <div class="inline-flex items-center bg-white/20 backdrop-blur-sm text-white text-xs px-3 py-1 rounded-full transform scale-0 group-hover:scale-100 transition-all duration-500 delay-300">
                                        <i class="ri-calendar-line mr-1"></i>
                                        <?= date('M Y', strtotime($item->tanggal_dibuat)) ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Corner Decoration -->
                            <div class="absolute top-4 right-4 w-8 h-8 bg-primary/20 backdrop-blur-sm rounded-full flex items-center justify-center transform scale-0 group-hover:scale-100 transition-all duration-500 delay-100">
                                <i class="ri-briefcase-line text-primary text-sm"></i>
                            </div>


                        </div>

                        <!-- Quick Info on Mobile (Always Visible) -->
                        <div class="md:hidden p-4 bg-white">
                            <h3 class="font-bold text-gray-900 text-sm"><?= $item->nama ?></h3>
                            <p class="text-xs text-gray-500 mt-1">
                                <i class="ri-calendar-line mr-1"></i>
                                <?= date('d M Y', strtotime($item->tanggal_dibuat)) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Load More atau Pagination jika diperlukan -->
            <div class="text-center mt-16">
                <div class="inline-flex items-center bg-white px-6 py-3 rounded-xl shadow-md">
                    <i class="ri-check-line text-primary mr-2"></i>
                    <span class="text-gray-700 font-medium">Menampilkan <?= count($pekerjaan) ?> pekerjaan</span>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Load Footer Template -->
<?php $this->load->view('templates/footer'); ?>

<!-- JavaScript untuk Animasi dan Interaksi -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Pekerjaan hover enhancement (reduce flicker)
        const pekerjaanItems = document.querySelectorAll('.pekerjaan-item');

        pekerjaanItems.forEach(item => {
            let hoverTimeout;

            item.addEventListener('mouseenter', function() {
                clearTimeout(hoverTimeout);
                this.style.transition = 'all 0.3s ease-out';
                this.style.boxShadow = '0 25px 50px rgba(0, 0, 0, 0.15), 0 0 30px rgba(59, 130, 246, 0.1)';
            });

            item.addEventListener('mouseleave', function() {
                hoverTimeout = setTimeout(() => {
                    this.style.boxShadow = '';
                }, 50);
            });
        });

        // Masonry layout adjustment for better spacing
        function adjustMasonryLayout() {
            const pekerjaanItems = document.querySelectorAll('.pekerjaan-item');
            pekerjaanItems.forEach((item, index) => {
                // Add random delay for staggered animation
                item.style.animationDelay = `${index * 0.1}s`;
            });
        }

        // Parallax effect for hero section only
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            // Target only hero section background elements, not pekerjaan
            const heroSection = document.querySelector('section.py-24.bg-gradient-to-br');
            if (heroSection) {
                const heroElements = heroSection.querySelectorAll('.absolute.inset-0 > div');
                heroElements.forEach(element => {
                    element.style.transform = `translateY(${rate}px)`;
                });
            }
        });
    });
</script>

<style>
    /* Custom styles untuk pekerjaan gallery */
    .pekerjaan-item {
        transition: transform 0.3s ease-out, box-shadow 0.3s ease-out;
        will-change: transform, box-shadow;
    }

    /* Masonry columns responsive */
    @media (max-width: 640px) {
        .columns-1 {
            columns: 1;
        }
    }

    @media (min-width: 640px) and (max-width: 1024px) {
        .columns-2 {
            columns: 2;
        }
    }

    @media (min-width: 1024px) and (max-width: 1280px) {
        .columns-3 {
            columns: 3;
        }
    }

    @media (min-width: 1280px) {
        .columns-4 {
            columns: 4;
        }
    }

    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
    }

    /* Custom hover effects */
    .pekerjaan-item:hover {
        z-index: 10;
    }

    /* Enhanced grid gap */
    .space-y-6>*+* {
        margin-top: 1.5rem;
    }

    /* Enhanced loading states */
    .pekerjaan-image-container {
        position: relative;
        background: #f3f4f6;
    }

    .skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }

    @keyframes loading {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }

    /* Smooth transitions */
    .transition-opacity {
        transition: opacity 0.5s ease-out;
    }

    /* Gallery fade in */
    .columns-1 {
        transition: opacity 0.5s ease-out;
    }
</style>