<?php
$this->load->view('templates/admin_header');
?>

<div class="bg-white rounded-lg shadow-md">
    <!-- Header -->
    <div class="p-6 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <h3 class="text-xl font-semibold text-gray-800">Detail Kontak</h3>
            <a href="<?= base_url('kontak') ?>" 
               class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </div>

    <!-- Content -->
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Info Kontak -->
            <div class="space-y-4">
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="font-semibold text-gray-700 mb-3">Informasi Kontak</h4>
                    
                    <div class="space-y-3">
                        <div>
                            <label class="text-sm font-medium text-gray-500">Nama</label>
                            <p class="text-gray-900 font-medium"><?= $kontak->nama ?></p>
                        </div>
                        
                        <div>
                            <label class="text-sm font-medium text-gray-500">Telepon</label>
                            <p class="text-gray-900">
                                <a href="tel:<?= $kontak->telepon ?>" class="text-secom-blue-dark hover:underline">
                                    <?= $kontak->telepon ?>
                                </a>
                            </p>
                        </div>
                        
                        <div>
                            <label class="text-sm font-medium text-gray-500">Email</label>
                            <p class="text-gray-900">
                                <a href="mailto:<?= $kontak->email ?>" class="text-secom-blue-dark hover:underline">
                                    <?= $kontak->email ?>
                                </a>
                            </p>
                        </div>
                        
                        <div>
                            <label class="text-sm font-medium text-gray-500">Jenis Properti</label>
                            <p class="text-gray-900">
                                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-secom-blue-light text-white">
                                    <?= $kontak->jenis_properti ?>
                                </span>
                            </p>
                        </div>
                        
                        <div>
                            <label class="text-sm font-medium text-gray-500">Tanggal Kontak</label>
                            <p class="text-gray-900"><?= date('d F Y, H:i', strtotime($kontak->tanggal_dibuat)) ?> WIB</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Catatan -->
            <div class="space-y-4">
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="font-semibold text-gray-700 mb-3">Catatan/Pesan</h4>
                    
                    <?php if (!empty($kontak->catatan)): ?>
                        <div class="bg-white rounded border border-gray-200 p-4">
                            <p class="text-gray-700 leading-relaxed"><?= nl2br($kontak->catatan) ?></p>
                        </div>
                    <?php else: ?>
                        <p class="text-gray-500 italic">Tidak ada catatan tambahan.</p>
                    <?php endif; ?>
                </div>

                <!-- Aksi -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="font-semibold text-gray-700 mb-3">Aksi</h4>
                    
                    <div class="space-y-2">
                        <a href="<?= 'https://wa.me/' . str_replace('+', '', $kontak->telepon) . '?text=' . urlencode('Halo ' . $kontak->nama . ', terima kasih telah menghubungi FazTech! Kami siap membantu kebutuhan keamanan Anda.') ?>" 
                           class="w-full bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors duration-200 inline-flex items-center justify-center"
                           target="_blank">
                            <i class="fab fa-whatsapp mr-2"></i>Hubungi via WhatsApp
                        </a>
                        
                        <a href="mailto:<?= $kontak->email ?>?subject=Re: Layanan Keamanan FazTech&body=Halo <?= $kontak->nama ?>,%0A%0ATerima kasih telah menghubungi FazTech." 
                           class="w-full bg-secom-blue-dark text-white px-4 py-2 rounded-lg hover:bg-secom-blue-light transition-colors duration-200 inline-flex items-center justify-center">
                            <i class="fas fa-envelope mr-2"></i>Kirim Email
                        </a>
                        
                        <button onclick="confirmDelete('<?= base_url('kontak/hapus/' . $kontak->id) ?>')" 
                                class="w-full bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors duration-200 inline-flex items-center justify-center">
                            <i class="fas fa-trash mr-2"></i>Hapus Kontak
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/admin_footer'); ?>

<script>
function confirmDelete(url) {
    if (confirm('Yakin ingin menghapus kontak ini? Data yang dihapus tidak dapat dikembalikan.')) {
        window.location.href = url;
    }
}
</script> 