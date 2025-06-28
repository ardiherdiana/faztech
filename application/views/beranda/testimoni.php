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

<!-- Hero Section untuk Halaman Testimoni -->
<section class="py-24 bg-gradient-to-br from-primary/10 via-blue-50 to-gray-100 relative overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12" data-aos="fade-up">
            <nav class="text-sm text-gray-600 mb-4">
                <a href="<?= base_url() ?>" class="hover:text-primary transition-colors">Beranda</a>
                <span class="mx-2">/</span>
                <span class="text-primary font-medium">Testimoni</span>
            </nav>
            
            <!-- Stats Header -->
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Cerita dari <span class="text-primary"><?= count($testimoni) ?> Pelanggan</span> Puas
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Pengalaman nyata dari pelanggan yang telah merasakan keamanan terbaik bersama FazTech
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Testimoni Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <?php if(empty($testimoni)): ?>
            <div class="text-center py-20">
                <div class="flex flex-col items-center">
                    <i class="ri-chat-smile-line ri-4x text-gray-300 mb-6"></i>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Belum Ada Testimoni</h3>
                    <p class="text-gray-600 mb-6 max-w-md">
                        Testimoni pelanggan sedang dalam proses pengembangan. Silakan hubungi kami untuk informasi lebih lanjut.
                    </p>
                    <a href="<?= base_url('beranda#kontak') ?>" 
                       class="bg-primary text-white px-6 py-3 rounded-xl hover:bg-primary/90 transition-colors font-medium">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        <?php else: ?>
            <!-- Rating & Statistik Section -->
            <div class="text-center mb-8" data-aos="fade-up">
                <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-4">
                    Rating & <span class="text-primary">Statistik</span>
                </h3>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12" data-aos="fade-up" data-aos-delay="200">
                <!-- 5 Star -->
                <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                    <div class="flex justify-center mb-2">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <i class="ri-star-fill text-yellow-400 text-sm"></i>
                        <?php endfor; ?>
                    </div>
                    <div class="text-xl font-bold text-gray-900">
                        <?php 
                        $rating_5 = 0;
                        foreach($testimoni as $t) {
                            if($t->rating == 5) $rating_5++;
                        }
                        echo $rating_5;
                        ?>
                    </div>
                    <div class="text-xs text-gray-600">Testimoni</div>
                </div>

                <!-- 4 Star -->
                <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                    <div class="flex justify-center mb-2">
                        <?php for($i = 1; $i <= 4; $i++): ?>
                            <i class="ri-star-fill text-yellow-400 text-sm"></i>
                        <?php endfor; ?>
                        <i class="ri-star-line text-gray-300 text-sm"></i>
                    </div>
                    <div class="text-xl font-bold text-gray-900">
                        <?php 
                        $rating_4 = 0;
                        foreach($testimoni as $t) {
                            if($t->rating == 4) $rating_4++;
                        }
                        echo $rating_4;
                        ?>
                    </div>
                    <div class="text-xs text-gray-600">Testimoni</div>
                </div>

                <!-- 3 Star -->
                <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                    <div class="flex justify-center mb-2">
                        <?php for($i = 1; $i <= 3; $i++): ?>
                            <i class="ri-star-fill text-yellow-400 text-sm"></i>
                        <?php endfor; ?>
                        <?php for($i = 4; $i <= 5; $i++): ?>
                            <i class="ri-star-line text-gray-300 text-sm"></i>
                        <?php endfor; ?>
                    </div>
                    <div class="text-xl font-bold text-gray-900">
                        <?php 
                        $rating_3 = 0;
                        foreach($testimoni as $t) {
                            if($t->rating == 3) $rating_3++;
                        }
                        echo $rating_3;
                        ?>
                    </div>
                    <div class="text-xs text-gray-600">Testimoni</div>
                </div>

                <!-- Average Rating -->
                <div class="bg-primary rounded-xl p-6 text-center text-white shadow-lg">
                    <div class="flex justify-center mb-2">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                        <?php endfor; ?>
                    </div>
                    <div class="text-xl font-bold">
                        <?php 
                        $total_rating = 0;
                        $total_testimoni = count($testimoni);
                        foreach($testimoni as $t) {
                            $total_rating += $t->rating;
                        }
                        $average = $total_testimoni > 0 ? round($total_rating / $total_testimoni, 1) : 0;
                        echo $average;
                        ?>
                    </div>
                    <div class="text-xs text-white/80">Rating Rata-rata</div>
                </div>
            </div>

            <!-- Divider -->
            <div class="flex items-center my-12">
                <div class="flex-1 h-px bg-gradient-to-r from-transparent to-gray-300"></div>
                <div class="flex items-center px-6">
                    <i class="ri-chat-quote-line text-primary ri-2x"></i>
                    <span class="mx-3 text-gray-600 font-medium">Testimoni Pelanggan</span>
                    <i class="ri-chat-quote-line text-primary ri-2x"></i>
                </div>
                <div class="flex-1 h-px bg-gradient-to-l from-transparent to-gray-300"></div>
            </div>

            <!-- Testimoni Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($testimoni as $index => $item): ?>
                    <div class="testimoni-card bg-white rounded-xl shadow-lg p-8 hover:cursor-pointer transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-primary/10 hover:-translate-y-2 hover:bg-gradient-to-br hover:from-white hover:to-primary/5 group"
                         data-aos="fade-up" data-aos-delay="<?= 100 + ($index * 100) ?>">
                        
                        <!-- Quote Icon -->
                        <div class="text-primary/20 group-hover:text-primary/30 mb-4 transition-all duration-300">
                            <i class="ri-double-quotes-l ri-3x"></i>
                        </div>

                        <!-- Testimoni Text -->
                        <p class="text-gray-700 group-hover:text-gray-800 italic mb-6 flex-grow transition-all duration-300">
                            "<?= $item->deskripsi ?>"
                        </p>

                        <!-- Rating -->
                        <div class="flex items-center mb-4">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <?php if ($i <= $item->rating): ?>
                                    <i class="ri-star-fill text-yellow-400 group-hover:text-yellow-500 transition-all duration-300 group-hover:scale-110"></i>
                                <?php else: ?>
                                    <i class="ri-star-line text-gray-300 group-hover:text-gray-400 transition-all duration-300"></i>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>

                        <!-- Author -->
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full overflow-hidden mr-4 group-hover:scale-110 transition-all duration-300 group-hover:shadow-lg">
                                <?php if (!empty($item->gambar) && file_exists('./uploads/testimonials/' . $item->gambar)): ?>
                                    <img src="<?= base_url('uploads/testimonials/' . $item->gambar) ?>"
                                        alt="<?= $item->nama ?>"
                                        class="w-full h-full object-cover group-hover:brightness-110 transition-all duration-300">
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center bg-gray-200 rounded-full group-hover:bg-primary/10 transition-all duration-300">
                                        <i class="ri-user-line text-gray-400 group-hover:text-primary transition-all duration-300"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 group-hover:text-primary transition-all duration-300"><?= $item->nama ?></h4>
                                <p class="text-sm text-gray-600 group-hover:text-gray-700 transition-all duration-300"><?= $item->jabatan ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Summary Stats -->
            <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="300">
                <div class="inline-flex items-center bg-white px-6 py-3 rounded-xl shadow-md">
                    <i class="ri-check-line text-primary mr-2"></i>
                    <span class="text-gray-700 font-medium">Menampilkan <?= count($testimoni) ?> testimoni</span>
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
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true
    });

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

    // Enhanced hover effects for testimonial cards
    const testimoniCards = document.querySelectorAll('.testimoni-card');
    
    testimoniCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.boxShadow = '0 25px 50px rgba(0, 0, 0, 0.15), 0 0 30px rgba(59, 130, 246, 0.1)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.boxShadow = '';
        });
    });

    // Parallax effect for hero section
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5;
        const heroElements = document.querySelectorAll('.absolute.inset-0 > div');
        
        heroElements.forEach(element => {
            element.style.transform = `translateY(${rate}px)`;
        });
    });
});
</script>

<style>
/* Custom styles untuk testimoni gallery */
.testimoni-card {
    transition: all 0.3s ease-out;
    will-change: transform, box-shadow;
}

/* Smooth scroll behavior */
html {
    scroll-behavior: smooth;
}

/* Enhanced testimonial card effects */
.testimoni-card:hover {
    z-index: 10;
}

/* Rating stars animation */
.testimoni-card:hover .ri-star-fill {
    animation: starGlow 0.3s ease-in-out;
}

@keyframes starGlow {
    0%, 100% { 
        transform: scale(1); 
    }
    50% { 
        transform: scale(1.1); 
    }
}

/* Quote animation */
.testimoni-card:hover .ri-double-quotes-l {
    animation: quoteFloat 2s ease-in-out infinite;
}

@keyframes quoteFloat {
    0%, 100% { 
        transform: translateY(0px); 
    }
    50% { 
        transform: translateY(-5px); 
    }
}

/* Enhanced profile image hover */
.testimoni-card:hover img {
    filter: brightness(110%) contrast(105%);
}
</style> 