<?php
// application/views/admin/pekerjaan/index.php
$this->load->view('templates/admin_header');
?>

<div class="bg-white rounded-lg shadow-md">
    <!-- Header -->
    <div class="p-6 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <h3 class="text-xl font-semibold text-gray-800">Daftar Pekerjaan</h3>
            <a href="<?= base_url('pekerjaan/tambah') ?>" 
               class="bg-secom-blue-dark text-white px-4 py-2 rounded-lg hover:bg-secom-blue-light transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i>Tambah Pekerjaan
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-secom-gray">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pekerjaan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Dibuat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if (!empty($pekerjaan)): ?>
                    <?php foreach($pekerjaan as $item): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-16 h-16 bg-secom-gray rounded-lg flex items-center justify-center overflow-hidden">
                                    <?php if ($item->foto && file_exists('./uploads/jobs/' . $item->foto)): ?>
                                        <img src="<?= base_url('uploads/jobs/' . $item->foto) ?>" 
                                             alt="<?= $item->nama ?>" 
                                             class="w-full h-full object-cover">
                                    <?php else: ?>
                                        <i class="fas fa-briefcase text-gray-400 text-xl"></i>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900"><?= $item->nama ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <?= date('d/m/Y H:i', strtotime($item->tanggal_dibuat)) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="<?= base_url('pekerjaan/edit/' . $item->id) ?>"
                                       class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition-colors duration-200 mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button onclick="confirmDelete('<?= base_url('pekerjaan/hapus/' . $item->id) ?>')" 
                                            class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600 transition-colors duration-200">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-briefcase text-4xl mb-4 block"></i>
                            Belum ada pekerjaan. <a href="<?= base_url('pekerjaan/tambah') ?>" class="text-secom-blue-dark hover:underline">Tambah pekerjaan pertama</a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('templates/admin_footer'); ?> 