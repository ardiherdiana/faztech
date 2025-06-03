<?php
$this->load->view('templates/admin_header');
?>

<div class="bg-white rounded-lg shadow-md w-full">
    <!-- Header -->
    <div class="p-6 border-b border-gray-200">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h3 class="text-xl font-semibold text-gray-800">Daftar Kontak</h3>
            <div class="flex items-center text-sm text-gray-600">
                <i class="fas fa-envelope mr-2"></i>
                Total: <span class="font-semibold ml-1"><?= count($kontak) ?></span> kontak
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto w-full">
        <table class="min-w-full">
            <thead class="bg-secom-gray">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telepon</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Properti</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if (!empty($kontak)): ?>
                    <?php foreach($kontak as $item): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900"><?= $item->nama ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    <a href="tel:<?= $item->telepon ?>" class="text-secom-blue-dark hover:underline">
                                        <?= $item->telepon ?>
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    <a href="mailto:<?= $item->email ?>" class="text-secom-blue-dark hover:underline">
                                        <?= $item->email ?>
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-secom-blue-light text-white">
                                    <?= $item->jenis_properti ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"><?= date('d/m/Y H:i', strtotime($item->tanggal_dibuat)) ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="<?= base_url('kontak/detail/' . $item->id) ?>" 
                                       class="bg-secom-blue-light text-white px-3 py-1 rounded text-xs hover:bg-secom-blue-dark transition-colors duration-200" 
                                       title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?= 'https://wa.me/' . str_replace('+', '', $item->telepon) . '?text=' . urlencode('Halo ' . $item->nama . ', terima kasih telah menghubungi FazTech!') ?>" 
                                       class="bg-green-500 text-white px-3 py-1 rounded text-xs hover:bg-green-600 transition-colors duration-200"
                                       title="WhatsApp" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                    <button onclick="confirmDelete('<?= base_url('kontak/hapus/' . $item->id) ?>')" 
                                            class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600 transition-colors duration-200"
                                            title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-envelope text-4xl mb-4 block"></i>
                            Belum ada kontak masuk.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('templates/admin_footer'); ?>

<script>
function confirmDelete(url) {
    if (confirm('Yakin ingin menghapus kontak ini?')) {
        window.location.href = url;
    }
}
</script> 