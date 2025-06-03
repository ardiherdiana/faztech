<?php
// application/views/admin/testimoni/edit.php
$this->load->view('templates/admin_header' );
?>

<div class="bg-white rounded-lg shadow-md">
    <!-- Header -->
    <div class="p-6 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <h3 class="text-xl font-semibold text-gray-800">Edit Testimoni: <?= $testimoni->nama ?></h3>
            <a href="<?= base_url('testimoni') ?>" 
               class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </div>

    <!-- Form -->
    <div class="p-6">
        <?= form_open_multipart('testimoni/edit/' . $testimoni->id, ['class' => 'space-y-6']) ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nama" name="nama" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secom-blue-light focus:border-transparent outline-none"
                           placeholder="Masukkan nama lengkap" 
                           value="<?= set_value('nama', $testimoni->nama) ?>" required>
                    <?= form_error('nama', '<p class="text-red-500 text-sm mt-1">', '</p>') ?>
                </div>

                <div>
                    <label for="jabatan" class="block text-sm font-medium text-gray-700 mb-2">
                        Jabatan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="jabatan" name="jabatan" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secom-blue-light focus:border-transparent outline-none"
                           placeholder="Contoh: Web Developer" 
                           value="<?= set_value('jabatan', $testimoni->jabatan) ?>" required>
                    <?= form_error('jabatan', '<p class="text-red-500 text-sm mt-1">', '</p>') ?>
                </div>

                <div class="md:col-span-2">
                    <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">
                        Rating <span class="text-red-500">*</span>
                    </label>
                    <div class="flex items-center space-x-2">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <label class="cursor-pointer">
                                <input type="radio" name="rating" value="<?= $i ?>" class="sr-only rating-input" <?= set_radio('rating', $i, $testimoni->rating == $i) ?>>
                                <i class="fas fa-star text-2xl rating-star text-gray-300 hover:text-yellow-400 transition-colors duration-200"></i>
                            </label>
                        <?php endfor; ?>
                        <span class="ml-4 text-sm text-gray-600">Pilih rating (1-5 bintang)</span>
                    </div>
                    <?= form_error('rating', '<p class="text-red-500 text-sm mt-1">', '</p>') ?>
                </div>
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                    Deskripsi Testimoni <span class="text-red-500">*</span>
                </label>
                <textarea id="deskripsi" name="deskripsi" rows="5"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secom-blue-light focus:border-transparent outline-none"
                          placeholder="Masukkan testimoni atau review" required><?= set_value('deskripsi', $testimoni->deskripsi) ?></textarea>
                <?= form_error('deskripsi', '<p class="text-red-500 text-sm mt-1">', '</p>') ?>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Foto Profil
                </label>
                
                <!-- Current Image -->
                <?php if ($testimoni->gambar && file_exists('./uploads/testimonials/' . $testimoni->gambar)): ?>
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 mb-2">Foto Saat Ini:</p>
                        <div class="w-24 h-24 bg-secom-gray rounded-full overflow-hidden">
                            <img src="<?= base_url('uploads/testimonials/' . $testimoni->gambar) ?>" 
                                 alt="<?= $testimoni->nama ?>" 
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
                <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah foto</p>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="<?= base_url('testimoni') ?>" 
                   class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition-colors duration-200">
                    Batal
                </a>
                <button type="submit" 
                        class="bg-secom-blue-dark text-white px-6 py-3 rounded-lg hover:bg-secom-blue-light transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>Update Testimoni
                </button>
            </div>
        <?= form_close() ?>
    </div>
</div>

<script>
// Rating star functionality untuk edit
document.addEventListener('DOMContentLoaded', function() {
    const ratingInputs = document.querySelectorAll('.rating-input');
    const ratingStars = document.querySelectorAll('.rating-star');
    
    // Event listener untuk radio buttons
    ratingInputs.forEach((input, index) => {
        input.addEventListener('change', function() {
            updateStars(index + 1);
        });
    });
    
    // Event listener untuk star icons
    ratingStars.forEach((star, index) => {
        star.addEventListener('click', function() {
            ratingInputs[index].checked = true;
            updateStars(index + 1);
        });
    });
    
    // Function untuk update tampilan stars
    function updateStars(rating) {
        ratingStars.forEach((star, index) => {
            if (index < rating) {
                star.classList.remove('text-gray-300');
                star.classList.add('text-yellow-400');
            } else {
                star.classList.remove('text-yellow-400');
                star.classList.add('text-gray-300');
            }
        });
    }
    
    // Set initial state berdasarkan rating yang sudah dipilih
    const checkedInput = document.querySelector('.rating-input:checked');
    if (checkedInput) {
        updateStars(parseInt(checkedInput.value));
    }
});
</script>

<?php $this->load->view('templates/admin_footer'); ?>