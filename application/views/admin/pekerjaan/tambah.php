<?php
// application/views/admin/pekerjaan/tambah.php
$this->load->view('templates/admin_header' );
?>

<div class="bg-white rounded-lg shadow-md">
    <!-- Header -->
    <div class="p-6 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <h3 class="text-xl font-semibold text-gray-800">Tambah Pekerjaan Baru</h3>
            <a href="<?= base_url('admin/pekerjaan') ?>" 
               class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </div>

    <!-- Form -->
    <div class="p-6">
        <?= form_open_multipart('pekerjaan/tambah', ['class' => 'space-y-6']) ?>
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Pekerjaan <span class="text-red-500">*</span>
                </label>
                <input type="text" id="nama" name="nama" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secom-blue-light focus:border-transparent outline-none"
                       placeholder="Masukkan nama pekerjaan" 
                       value="<?= set_value('nama') ?>" required>
                <?= form_error('nama', '<p class="text-red-500 text-sm mt-1">', '</p>') ?>
            </div>

            <div>
                <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">
                    Foto Pekerjaan
                </label>
                <div class="flex items-center space-x-4">
                    <input type="file" id="foto" name="foto" 
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-secom-blue-light file:text-white hover:file:bg-secom-blue-dark"
                           accept="image/*">
                    <span class="text-xs text-gray-500">Max: 2MB (JPG, PNG, GIF)</span>
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="<?= base_url('admin/pekerjaan') ?>" 
                   class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition-colors duration-200">
                    Batal
                </a>
                <button type="submit" 
                        class="bg-secom-blue-dark text-white px-6 py-3 rounded-lg hover:bg-secom-blue-light transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>Simpan Pekerjaan
                </button>
            </div>
        <?= form_close() ?>
    </div>
</div>



<?php $this->load->view('templates/admin_footer'); ?> 