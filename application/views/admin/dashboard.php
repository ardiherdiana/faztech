<?php
$this->load->view('templates/admin_header');
?>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-secom-blue-dark">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Produk</h3>
                <p class="text-3xl font-bold text-secom-blue-dark"><?= $total_produk ?></p>
            </div>
            <div class="text-secom-blue-light">
                <i class="fas fa-box text-4xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-secom-blue-light">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Testimoni</h3>
                <p class="text-3xl font-bold text-secom-blue-light"><?= $total_testimoni ?></p>
            </div>
            <div class="text-secom-blue-dark">
                <i class="fas fa-star text-4xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-orange-500">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Kontak</h3>
                <p class="text-3xl font-bold text-orange-600"><?= $total_kontak ?></p>
            </div>
            <div class="text-orange-500">
                <i class="fas fa-envelope text-4xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Rating Rata-rata</h3>
                <p class="text-3xl font-bold text-green-600">
                    <?php
                    $total_rating = 0;
                    $jumlah = count($testimoni_terbaru);
                    if ($jumlah > 0) {
                        foreach ($testimoni_terbaru as $t) {
                            $total_rating += $t->rating;
                        }
                        echo number_format($total_rating / $jumlah, 1);
                    } else {
                        echo '0.0';
                    }
                    ?>
                </p>
            </div>
            <div class="text-yellow-500">
                <i class="fas fa-star text-4xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Aksi Cepat</h3>
        <div class="space-y-3">
            <a href="<?= base_url('produk/tambah') ?>" class="flex items-center justify-between p-3 bg-secom-blue-dark text-white rounded-lg hover:bg-secom-blue-light transition-colors duration-200">
                <span><i class="fas fa-plus mr-2"></i>Tambah Produk</span>
                <i class="fas fa-arrow-right"></i>
            </a>
            <a href="<?= base_url('testimoni/tambah') ?>" class="flex items-center justify-between p-3 bg-secom-blue-light text-white rounded-lg hover:bg-secom-blue-dark transition-colors duration-200">
                <span><i class="fas fa-plus mr-2"></i>Tambah Testimoni</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Informasi Sistem</h3>
        <div class="space-y-2 text-sm text-gray-600">
            <div class="flex justify-between">
                <span>Pengguna Aktif:</span>
                <span class="font-semibold"><?= $this->session->userdata('nama_lengkap') ?></span>
            </div>
            <div class="flex justify-between">
                <span>Level Akses:</span>
                <span class="font-semibold text-secom-blue-dark">Administrator</span>
            </div>
            <div class="flex justify-between">
                <span>Login Terakhir:</span>
                <span class="font-semibold"><?= date('d/m/Y H:i') ?></span>
            </div>
        </div>
    </div>
</div>

<!-- Recent Data -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Recent Products -->
    <div class="bg-white rounded-lg shadow-md">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-700">Produk Terbaru</h3>
                <a href="<?= base_url('produk') ?>" class="text-secom-blue-dark hover:text-secom-blue-light text-sm">
                    Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
        <div class="p-6">
            <?php if (!empty($produk_terbaru)): ?>
                <div class="space-y-4">
                    <?php foreach (array_slice($produk_terbaru, 0, 3) as $produk): ?>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-secom-gray rounded-lg flex items-center justify-center">
                                <?php if ($produk->gambar && file_exists('./uploads/products/' . $produk->gambar)): ?>
                                    <img src="<?= base_url('uploads/products/' . $produk->gambar) ?>"
                                        alt="<?= $produk->nama_produk ?>"
                                        class="w-full h-full object-cover rounded-lg">
                                <?php else: ?>
                                    <i class="fas fa-box text-gray-400"></i>
                                <?php endif; ?>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-800"><?= $produk->nama_produk ?></h4>
                                <p class="text-sm text-gray-600"><?= $produk->kategori ?></p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-secom-blue-dark">Rp <?= number_format($produk->harga, 0, ',', '.') ?></p>
                                <p class="text-sm text-gray-600">Stok: <?= $produk->stok ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-gray-500 text-center py-8">Belum ada produk</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recent Testimonials -->
    <div class="bg-white rounded-lg shadow-md">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-700">Testimoni Terbaru</h3>
                <a href="<?= base_url('testimoni') ?>" class="text-secom-blue-dark hover:text-secom-blue-light text-sm">
                    Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
        <div class="p-6">
            <?php if (!empty($testimoni_terbaru)): ?>
                <div class="space-y-4">
                    <?php foreach (array_slice($testimoni_terbaru, 0, 3) as $testimoni): ?>
                        <div class="border-l-4 border-secom-blue-light pl-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-secom-gray rounded-full flex items-center justify-center">
                                    <?php if ($testimoni->gambar && file_exists('./uploads/testimonials/' . $testimoni->gambar)): ?>
                                        <img src="<?= base_url('uploads/testimonials/' . $testimoni->gambar) ?>"
                                            alt="<?= $testimoni->nama ?>"
                                            class="w-full h-full object-cover rounded-full">
                                    <?php else: ?>
                                        <i class="fas fa-user text-gray-400"></i>
                                    <?php endif; ?>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-medium text-gray-800"><?= $testimoni->nama ?></h4>
                                    <p class="text-sm text-gray-600"><?= $testimoni->jabatan ?></p>
                                    <div class="flex items-center mt-1">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <i class="fas fa-star text-xs <?= $i <= $testimoni->rating ? 'text-yellow-400' : 'text-gray-300' ?>"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <p class="text-sm text-gray-700 mt-2 line-clamp-2"><?= substr($testimoni->deskripsi, 0, 50) ?>...</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-gray-500 text-center py-8">Belum ada testimoni</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recent Contacts -->
    <div class="bg-white rounded-lg shadow-md">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-700">Kontak Terbaru</h3>
                <a href="<?= base_url('kontak') ?>" class="text-secom-blue-dark hover:text-secom-blue-light text-sm">
                    Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
        <div class="p-6">
            <?php if (!empty($kontak_terbaru)): ?>
                <div class="space-y-4">
                    <?php foreach (array_slice($kontak_terbaru, 0, 3) as $kontak): ?>
                        <div class="border-l-4 border-orange-500 pl-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-orange-500"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-medium text-gray-800"><?= $kontak->nama ?></h4>
                                    <p class="text-sm text-gray-600"><?= $kontak->jenis_properti ?></p>
                                    <p class="text-xs text-gray-500 mt-1"><?= date('d/m/Y H:i', strtotime($kontak->tanggal_dibuat)) ?></p>
                                    <div class="flex items-center mt-2 space-x-2">
                                        <a href="<?= 'https://wa.me/' . str_replace('+', '', $kontak->telepon) ?>" 
                                           class="text-xs bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600" 
                                           target="_blank" title="WhatsApp">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                        <a href="<?= base_url('kontak/detail/' . $kontak->id) ?>" 
                                           class="text-xs bg-secom-blue-light text-white px-2 py-1 rounded hover:bg-secom-blue-dark" 
                                           title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-gray-500 text-center py-8">Belum ada kontak masuk</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $this->load->view('templates/admin_footer'); ?>