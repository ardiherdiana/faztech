<?php
// application/views/auth/masuk.php
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
<body class="bg-gradient-to-br from-secom-blue-dark via-secom-blue-light to-secom-blue-dark min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md">
        <!-- Logo/Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center mb-4">
                <img src="<?= base_url('assets/img/faztech.png') ?>" alt="FazTech Logo" class="h-16 w-auto">
            </div>
            <p class="text-gray-600 mt-2">Masuk ke akun Anda</p>
        </div>

        <!-- Alert Messages -->
        <?php if ($this->session->flashdata('sukses')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                <i class="fas fa-check-circle mr-2"></i><?= $this->session->flashdata('sukses') ?>
            </div>
        <?php endif; ?>
        
        <?php if ($this->session->flashdata('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <i class="fas fa-exclamation-circle mr-2"></i><?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Form -->
        <?= form_open('auth/masuk', ['class' => 'space-y-6']) ?>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-envelope mr-2"></i>Email
                </label>
                <input type="email" id="email" name="email" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secom-blue-light focus:border-transparent outline-none transition-all duration-200"
                       placeholder="Masukkan email Anda" 
                       value="<?= set_value('email') ?>" required>
                <?= form_error('email', '<p class="text-red-500 text-sm mt-1">', '</p>') ?>
            </div>

            <div>
                <label for="kata_sandi" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-lock mr-2"></i>Kata Sandi
                </label>
                <div class="relative">
                    <input type="password" id="kata_sandi" name="kata_sandi" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secom-blue-light focus:border-transparent outline-none transition-all duration-200"
                           placeholder="Masukkan kata sandi" required>
                    <button type="button" onclick="togglePassword()" class="absolute right-3 top-3 text-gray-500 hover:text-gray-700">
                        <i class="fas fa-eye" id="toggleIcon"></i>
                    </button>
                </div>
                <?= form_error('kata_sandi', '<p class="text-red-500 text-sm mt-1">', '</p>') ?>
            </div>

            <button type="submit" 
                    class="w-full bg-secom-blue-dark text-white py-3 px-4 rounded-lg hover:bg-secom-blue-light transition-colors duration-200 font-medium">
                <i class="fas fa-sign-in-alt mr-2"></i>Masuk
            </button>
        <?= form_close() ?>

        <!-- Divider -->
        <div class="my-6 flex items-center">
            <div class="flex-1 border-t border-gray-300"></div>
            <div class="px-4 text-gray-500 text-sm">atau</div>
            <div class="flex-1 border-t border-gray-300"></div>
        </div>

        <!-- Register Link -->
        <div class="text-center">
            <p class="text-gray-600">Belum punya akun?</p>
            <a href="<?= base_url('auth/daftar') ?>" class="text-secom-blue-dark hover:text-secom-blue-light font-medium transition-colors duration-200">
                Daftar sekarang
            </a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('kata_sandi');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.className = 'fas fa-eye-slash';
            } else {
                passwordField.type = 'password';
                toggleIcon.className = 'fas fa-eye';
            }
        }

        // Auto hide alerts
        setTimeout(function() {
            const alerts = document.querySelectorAll('.bg-green-100, .bg-red-100');
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
