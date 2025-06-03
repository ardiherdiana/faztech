<?php
// application/views/templates/admin_header.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($judul) ? $judul : 'Admin - FazTech' ?></title>
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
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-secom-blue-dark text-white shadow-lg fixed h-screen">
            <div class="p-6 border-b border-secom-blue-light">
                <h1 class="text-xl font-bold text-white">
                    <i class="fas fa-shield-alt mr-2"></i>FazTech Admin
                </h1>
            </div>
            
            <nav class="mt-6">
                <a href="<?= base_url('admin') ?>" class="flex items-center px-6 py-3 text-white hover:bg-secom-blue-light transition-colors duration-200 <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == '' ? 'bg-secom-blue-light' : '' ?>">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="<?= base_url('produk') ?>" class="flex items-center px-6 py-3 text-white hover:bg-secom-blue-light transition-colors duration-200 <?= $this->uri->segment(1) == 'produk' ? 'bg-secom-blue-light' : '' ?>">
                    <i class="fas fa-box mr-3"></i>
                    Produk
                </a>
                <a href="<?= base_url('testimoni') ?>" class="flex items-center px-6 py-3 text-white hover:bg-secom-blue-light transition-colors duration-200 <?= $this->uri->segment(1) == 'testimoni' ? 'bg-secom-blue-light' : '' ?>">
                    <i class="fas fa-star mr-3"></i>
                    Testimoni
                </a>
                <a href="<?= base_url('kontak') ?>" class="flex items-center px-6 py-3 text-white hover:bg-secom-blue-light transition-colors duration-200 <?= $this->uri->segment(1) == 'kontak' ? 'bg-secom-blue-light' : '' ?>">
                    <i class="fas fa-envelope mr-3"></i>
                    Kontak
                </a>
                <div class="border-t border-secom-blue-light mt-6 pt-6">
                    <a href="<?= base_url('auth/keluar') ?>" class="flex items-center px-6 py-3 text-white hover:bg-red-600 transition-colors duration-200" onclick="return confirm('Yakin ingin keluar?')">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Keluar
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col ml-64">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="px-6 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800"><?= isset($judul) ? str_replace(' - Admin', '', $judul) : 'Dashboard' ?></h2>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600">
                            <i class="fas fa-user-circle mr-2"></i>
                            <?= $this->session->userdata('nama_lengkap') ?>
                        </span>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 p-6">
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