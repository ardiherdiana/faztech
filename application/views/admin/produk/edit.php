
<?php
// application/views/admin/produk/edit.php
$this->load->view('templates/admin_header' );
?>

<div class="bg-white rounded-lg shadow-md">
    <!-- Header -->
    <div class="p-6 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <h3 class="text-xl font-semibold text-gray-800">Edit Produk: <?= $produk->nama_produk ?></h3>
            <a href="<?= base_url('produk') ?>" 
               class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </div>

    <!-- Form -->
    <div class="p-6">
        <?= form_open_multipart('produk/edit/' . $produk->id, ['class' => 'space-y-6']) ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nama_produk" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Produk <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nama_produk" name="nama_produk" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secom-blue-light focus:border-transparent outline-none"
                           placeholder="Masukkan nama produk" 
                           value="<?= set_value('nama_produk', $produk->nama_produk) ?>" required>
                    <?= form_error('nama_produk', '<p class="text-red-500 text-sm mt-1">', '</p>') ?>
                </div>

                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    <select id="kategori" name="kategori" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secom-blue-light focus:border-transparent outline-none" required>
                        <option value="">Pilih Kategori</option>
                        <option value="CCTV" <?= set_select('kategori', 'CCTV', $produk->kategori == 'CCTV') ?>>CCTV</option>
                        <option value="Akses Control" <?= set_select('kategori', 'Akses Control', $produk->kategori == 'Akses Control') ?>>Akses Control</option>
                        <option value="Router" <?= set_select('kategori', 'Router', $produk->kategori == 'Router') ?>>Router</option>
                        <option value="Kabel" <?= set_select('kategori', 'Kabel', $produk->kategori == 'Kabel') ?>>Kabel</option>
                        <option value="Lainnya" <?= set_select('kategori', 'Lainnya', $produk->kategori == 'Lainnya') ?>>Lainnya</option>
                    </select>
                    <?= form_error('kategori', '<p class="text-red-500 text-sm mt-1">', '</p>') ?>
                </div>

                <div>
                    <label for="harga" class="block text-sm font-medium text-gray-700 mb-2">
                        Harga (Rp) <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="harga" name="harga" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secom-blue-light focus:border-transparent outline-none"
                           placeholder="0" min="0" step="1000"
                           value="<?= set_value('harga', $produk->harga) ?>" required>
                    <?= form_error('harga', '<p class="text-red-500 text-sm mt-1">', '</p>') ?>
                </div>

                <div>
                    <label for="stok" class="block text-sm font-medium text-gray-700 mb-2">
                        Stok <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="stok" name="stok" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secom-blue-light focus:border-transparent outline-none"
                           placeholder="0" min="0"
                           value="<?= set_value('stok', $produk->stok) ?>" required>
                    <?= form_error('stok', '<p class="text-red-500 text-sm mt-1">', '</p>') ?>
                </div>
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                    Deskripsi <span class="text-red-500">*</span>
                </label>
                <textarea id="deskripsi" name="deskripsi" rows="4"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secom-blue-light focus:border-transparent outline-none"
                          placeholder="Masukkan deskripsi produk" required><?= set_value('deskripsi', $produk->deskripsi) ?></textarea>
                <?= form_error('deskripsi', '<p class="text-red-500 text-sm mt-1">', '</p>') ?>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Gambar Produk
                </label>
                
                <!-- Current Image -->
                <?php if ($produk->gambar && file_exists('./uploads/products/' . $produk->gambar)): ?>
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 mb-2">Gambar Saat Ini:</p>
                        <div class="w-32 h-32 bg-secom-gray rounded-lg overflow-hidden">
                            <img src="<?= base_url('uploads/products/' . $produk->gambar) ?>" 
                                 alt="<?= $produk->nama_produk ?>" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- New Image Upload -->
                <div class="flex items-center space-x-4">
                    <input type="file" id="gambar" name="gambar" 
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-secom-blue-light file:text-white hover:file:bg-secom-blue-dark"
                           accept="image/*">
                    <span class="text-xs text-gray-500">Max: 2MB (JPG, PNG, GIF)</span>
                </div>
                <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah gambar</p>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="<?= base_url('produk') ?>" 
                   class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition-colors duration-200">
                    Batal
                </a>
                <button type="submit" 
                        class="bg-secom-blue-dark text-white px-6 py-3 rounded-lg hover:bg-secom-blue-light transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>Update Produk
                </button>
            </div>
        <?= form_close() ?>
    </div>
</div>

<?php $this->load->view('templates/admin_footer'); ?>