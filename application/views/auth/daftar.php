<?php
// application/views/auth/daftar.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'secom-blue-dark': '#004993',
                        'secom-blue-light': '#009ba4',
                        'secom-gray': '#e0e0e0'
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-secom-blue-dark via-secom-blue-light to-secom-blue-dark min-h-screen flex items-center justify-center py-8">
    <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md">
        <!-- Logo/Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center mb-4">
                <img src="<?= base_url('assets/img/faztech.png') ?>" alt="FazTech Logo" class="h-16 w-auto">
            </div>
            <p class="text-gray-600 mt-2">Buat akun baru</p>
        </div>

        <!-- Alert Messages -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <i class="fas fa-exclamation-circle mr-2"></i><?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Form -->
        <?= form_open('auth/daftar', ['class' => 'space-y-4']) ?>
            <div>
                <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-user mr-2"></i>Nama Lengkap
                </label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secom-blue-light focus:border-transparent outline-none transition-all duration-200"
                       placeholder="Masukkan nama lengkap" 
                       value="<?= set_value('nama_lengkap') ?>" required>
                <?= form_error('nama_lengkap', '<p class="text-red-500 text-sm mt-1">', '</p>') ?>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-envelope mr-2"></i>Email
                </label>
                <input type="email" id="email" name="email" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secom-blue-light focus:border-transparent outline-none transition-all duration-200"
                       placeholder="Masukkan email" 
                       value="<?= set_value('email') ?>" required>
                <?= form_error('email', '<p class="text-red-500 text-sm mt-1">', '</p>') ?>
            </div>

            <div>
                <label for="kata_sandi" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-lock mr-2"></i>Kata Sandi
                </label>
                <input type="password" id="kata_sandi" name="kata_sandi" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secom-blue-light focus:border-transparent outline-none transition-all duration-200"
                       placeholder="Minimal 6 karakter" required>
                <?= form_error('kata_sandi', '<p class="text-red-500 text-sm mt-1">', '</p>') ?>
            </div>

            <div>
                <label for="konfirmasi_kata_sandi" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-lock mr-2"></i>Konfirmasi Kata Sandi
                </label>
                <input type="password" id="konfirmasi_kata_sandi" name="konfirmasi_kata_sandi" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secom-blue-light focus:border-transparent outline-none transition-all duration-200"
                       placeholder="Ulangi kata sandi" required>
                <?= form_error('konfirmasi_kata_sandi', '<p class="text-red-500 text-sm mt-1">', '</p>') ?>
            </div>

            <button type="submit" 
                    class="w-full bg-secom-blue-dark text-white py-3 px-4 rounded-lg hover:bg-secom-blue-light transition-colors duration-200 font-medium">
                <i class="fas fa-user-plus mr-2"></i>Daftar
            </button>
        <?= form_close() ?>

        <!-- Divider -->
        <div class="my-6 flex items-center">
            <div class="flex-1 border-t border-gray-300"></div>
            <div class="px-4 text-gray-500 text-sm">atau</div>
            <div class="flex-1 border-t border-gray-300"></div>
        </div>

        <!-- Login Link -->
        <div class="text-center">
            <p class="text-gray-600">Sudah punya akun?</p>
            <a href="<?= base_url('auth/masuk') ?>" class="text-secom-blue-dark hover:text-secom-blue-light font-medium transition-colors duration-200">
                Masuk sekarang
            </a>
        </div>
    </div>

    <script>
        // Auto hide alerts
        setTimeout(function() {
            const alerts = document.querySelectorAll('.bg-red-100');
            alerts.forEach(function(alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(function() {
                    alert.remove();
                }, 500);
            });
        }, 5000);
    </script>
</body>
</html>