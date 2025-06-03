<?php
// application/views/admin/produk/index.php
$this->load->view('templates/admin_header');
?>

<div class="bg-white rounded-lg shadow-md">
    <!-- Header -->
    <div class="p-6 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <h3 class="text-xl font-semibold text-gray-800">Daftar Produk</h3>
            <a href="<?= base_url('admin/produk/tambah') ?>" 
               class="bg-secom-blue-dark text-white px-4 py-2 rounded-lg hover:bg-secom-blue-light transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i>Tambah Produk
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-secom-gray">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Produk</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if (!empty($produk)): ?>
                    <?php foreach($produk as $item): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-16 h-16 bg-secom-gray rounded-lg flex items-center justify-center overflow-hidden">
                                    <?php if ($item->gambar && file_exists('./uploads/products/' . $item->gambar)): ?>
                                        <img src="<?= base_url('uploads/products/' . $item->gambar) ?>" 
                                             alt="<?= $item->nama_produk ?>" 
                                             class="w-full h-full object-cover">
                                    <?php else: ?>
                                        <i class="fas fa-box text-gray-400 text-xl"></i>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900"><?= $item->nama_produk ?></div>
                                <div class="text-sm text-gray-500"><?= substr($item->deskripsi, 0, 50) ?>...</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-secom-blue-light text-white">
                                    <?= $item->kategori ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                Rp <?= number_format($item->harga, 0, ',', '.') ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $item->stok > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                                    <?= $item->stok ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="<?= base_url('admin/produk/edit/' . $item->id) ?>"
                                       class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition-colors duration-200 mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button onclick="confirmDelete('<?= base_url('admin/produk/hapus/' . $item->id) ?>')" 
                                            class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600 transition-colors duration-200">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-box text-4xl mb-4 block"></i>
                            Belum ada produk. <a href="<?= base_url('admin/produk/tambah') ?>" class="text-secom-blue-dark hover:underline">Tambah produk pertama</a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('templates/admin_footer'); ?>
