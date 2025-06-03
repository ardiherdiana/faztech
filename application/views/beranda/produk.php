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

<!-- Hero Section untuk Halaman Produk -->
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
                <span class="text-primary font-medium">Semua Produk</span>
            </nav>
            
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Koleksi <span class="text-primary">Produk Keamanan</span> Lengkap
            </h1>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Temukan solusi keamanan terbaik dari berbagai kategori dengan teknologi terdepan
            </p>
            
            <!-- Stats -->
            <div class="flex justify-center items-center space-x-8 mt-8">
                <div class="text-center">
                    <div class="text-2xl font-bold text-primary"><?= $total_semua_produk ?></div>
                    <div class="text-sm text-gray-600">Total Produk</div>
                </div>
                <div class="w-px h-12 bg-gray-300"></div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-primary"><?= count($kategori_produk) ?></div>
                    <div class="text-sm text-gray-600">Kategori</div>
                </div>
                <div class="w-px h-12 bg-gray-300"></div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-primary"><?= $total_pages ?></div>
                    <div class="text-sm text-gray-600">Halaman</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Filter dan Pencarian Section -->
<section class="py-8 bg-white border-b border-gray-200 sticky top-16 z-40 shadow-sm">
    <div class="container mx-auto px-4">
        <form method="GET" action="<?= base_url('produk') ?>" class="flex flex-col md:flex-row gap-4 items-center justify-between">
            <!-- Search Bar -->
            <div class="flex-1 max-w-md">
                <div class="relative">
                    <input type="text" name="search" 
                           value="<?= htmlspecialchars($kata_kunci) ?>"
                           placeholder="Cari produk keamanan..." 
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 bg-gray-50 hover:bg-white">
                    <i class="ri-search-line absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            
            <!-- Filter Controls -->
            <div class="flex flex-wrap gap-4 items-center">
                <!-- Kategori Filter -->
                <div class="relative">
                    <select name="kategori" 
                            class="appearance-none bg-white border border-gray-300 rounded-xl px-4 py-3 pr-8 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 min-w-[150px]">
                        <option value="">Semua Kategori</option>
                        <?php foreach($kategori_produk as $kategori): ?>
                            <option value="<?= $kategori->kategori ?>" <?= ($kategori_terpilih == $kategori->kategori) ? 'selected' : '' ?>>
                                <?= $kategori->kategori ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <i class="ri-arrow-down-s-line absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                </div>
                
                <!-- Urutan Filter -->
                <div class="relative">
                    <select name="urutan" 
                            class="appearance-none bg-white border border-gray-300 rounded-xl px-4 py-3 pr-8 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 min-w-[150px]">
                        <option value="terbaru" <?= ($urutan_terpilih == 'terbaru') ? 'selected' : '' ?>>Terbaru</option>
                        <option value="terlama" <?= ($urutan_terpilih == 'terlama') ? 'selected' : '' ?>>Terlama</option>
                        <option value="nama_asc" <?= ($urutan_terpilih == 'nama_asc') ? 'selected' : '' ?>>Nama A-Z</option>
                        <option value="nama_desc" <?= ($urutan_terpilih == 'nama_desc') ? 'selected' : '' ?>>Nama Z-A</option>
                        <option value="harga_asc" <?= ($urutan_terpilih == 'harga_asc') ? 'selected' : '' ?>>Harga Terendah</option>
                        <option value="harga_desc" <?= ($urutan_terpilih == 'harga_desc') ? 'selected' : '' ?>>Harga Tertinggi</option>
                    </select>
                    <i class="ri-arrow-down-s-line absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" 
                        class="bg-primary text-white px-6 py-3 rounded-xl hover:bg-primary/90 transition-all duration-200 font-medium flex items-center">
                    <i class="ri-search-line mr-2"></i>
                    Cari
                </button>
                
                <!-- Reset Button -->
                <a href="<?= base_url('produk') ?>" 
                   class="border border-gray-300 text-gray-700 px-6 py-3 rounded-xl hover:bg-gray-50 transition-all duration-200 font-medium flex items-center">
                    <i class="ri-refresh-line mr-2"></i>
                    Reset
                </a>
            </div>
        </form>
        
        <!-- Result Info -->
        <div class="mt-4 flex justify-between items-center text-sm text-gray-600">
            <div>
                <?php if(!empty($kata_kunci) || !empty($kategori_terpilih)): ?>
                    <span>Menampilkan hasil untuk:</span>
                    <?php if(!empty($kata_kunci)): ?>
                        <span class="bg-primary/10 text-primary px-2 py-1 rounded-md font-medium">"<?= htmlspecialchars($kata_kunci) ?>"</span>
                    <?php endif; ?>
                    <?php if(!empty($kategori_terpilih)): ?>
                        <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-md font-medium"><?= $kategori_terpilih ?></span>
                    <?php endif; ?>
                <?php else: ?>
                    <span>Menampilkan semua produk</span>
                <?php endif; ?>
            </div>
            <div>
                <span class="font-medium"><?= $total_produk ?></span> produk ditemukan
            </div>
        </div>
    </div>
</section>

<!-- Daftar Produk Section -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <?php if(empty($produk)): ?>
            <!-- No Products Found -->
            <div class="text-center py-20">
                <div class="flex flex-col items-center">
                    <i class="ri-search-line ri-4x text-gray-300 mb-6"></i>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Tidak Ada Produk Ditemukan</h3>
                    <p class="text-gray-600 mb-6 max-w-md">
                        Maaf, tidak ada produk yang sesuai dengan kriteria pencarian Anda. 
                        Coba ubah kata kunci atau filter yang digunakan.
                    </p>
                    <a href="<?= base_url('produk') ?>" 
                       class="bg-primary text-white px-6 py-3 rounded-xl hover:bg-primary/90 transition-colors font-medium">
                        Lihat Semua Produk
                    </a>
                </div>
            </div>
        <?php else: ?>
            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <?php foreach($produk as $index => $item): ?>
                    <div class="group bg-white rounded-xl overflow-hidden border border-gray-200 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" 
                         data-aos="fade-up" 
                         data-aos-delay="<?= 100 + ($index * 50) ?>">
                        <div class="h-48 overflow-hidden relative">
                            <?php if(!empty($item->gambar)): ?>
                                <img src="<?= base_url('uploads/products/' . $item->gambar) ?>" 
                                     alt="<?= $item->nama_produk ?>" 
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                    <i class="ri-image-line ri-3x text-gray-400"></i>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Badge -->
                            <div class="absolute top-3 left-3 bg-primary text-white text-xs font-bold uppercase px-2 py-1 rounded-md">
                                <?= $item->kategori ?>
                            </div>
                            
                            <!-- Quick action overlay -->
                            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <button class="bg-white text-primary p-2 rounded-full mx-2 hover:bg-primary hover:text-white transition-colors detail-btn"
                                      data-id="<?= $item->id ?>" title="Lihat Detail">
                                    <i class="ri-eye-line ri-lg"></i>
                                </button>
                                <a href="<?= 'https://wa.me/6281234567890?text=' . urlencode('Halo admin, saya tertarik dengan produk: ' . $item->nama_produk) ?>" 
                                   class="bg-white text-green-500 p-2 rounded-full mx-2 hover:bg-green-500 hover:text-white transition-colors"
                                   title="Beli via WhatsApp" target="_blank">
                                    <i class="ri-whatsapp-line ri-lg"></i>
                                </a>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg font-bold text-gray-900 group-hover:text-primary transition-colors"><?= $item->nama_produk ?></h3>
                                <?php if($item->stok > 0): ?>
                                    <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full">Tersedia</span>
                                <?php else: ?>
                                    <span class="bg-red-100 text-red-700 text-xs px-2 py-1 rounded-full">Habis</span>
                                <?php endif; ?>
                            </div>
                            <p class="text-gray-600 mb-4 text-sm line-clamp-2"><?= $item->deskripsi ?></p>
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-xl text-primary">Rp <?= number_format($item->harga, 0, ',', '.') ?></span>
                                <button class="text-sm px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition detail-btn"
                                        data-id="<?= $item->id ?>">
                                    Detail
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Pagination -->
            <?php if($total_pages > 1): ?>
                <div class="mt-16">
                    <?= $pagination_links ?>
                    
                    <!-- Page Info -->
                    <div class="text-center mt-4 text-sm text-gray-600">
                        Halaman <?= $current_page ?> dari <?= $total_pages ?> 
                        (<?= ($current_page - 1) * 12 + 1 ?>-<?= min($current_page * 12, $total_produk) ?> dari <?= $total_produk ?> produk)
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-20 bg-gradient-to-br from-primary/90 to-blue-600 text-white relative overflow-hidden">
    <!-- Background elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-10 right-10 w-64 h-64 bg-white/5 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-10 left-10 w-48 h-48 bg-white/10 rounded-full filter blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 text-center relative z-10">
        <div data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                Butuh Konsultasi Keamanan?
            </h2>
            <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto">
                Tim ahli kami siap membantu Anda memilih solusi keamanan yang tepat sesuai kebutuhan dan budget
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?= base_url('beranda#kontak') ?>" 
                   class="inline-flex items-center bg-white text-primary px-8 py-4 rounded-xl font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="ri-phone-line mr-3"></i>
                    Konsultasi Gratis
                </a>
                <a href="https://wa.me/6281234567890?text=Halo, saya ingin konsultasi tentang sistem keamanan" 
                   class="inline-flex items-center border-2 border-white/30 backdrop-blur-sm text-white px-8 py-4 rounded-xl font-semibold hover:bg-white/10 transition-all duration-300 transform hover:scale-105"
                   target="_blank">
                    <i class="ri-whatsapp-line mr-3"></i>
                    Chat WhatsApp
                </a>
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

<!-- JavaScript untuk Modal dan Interaksi -->
<script>
document.addEventListener('DOMContentLoaded', function() {
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

    // Modal functionality
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

    closeModal.addEventListener('click', closeModalFunction);
    modalOverlay.addEventListener('click', closeModalFunction);

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModalFunction();
        }
    });
});
</script>

<style>
/* Additional styles for better UX */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Smooth scroll behavior */
html {
    scroll-behavior: smooth;
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