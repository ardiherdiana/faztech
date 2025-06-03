<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?? 'FazTech - Solusi Keamanan Profesional' ?></title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#0ea5e9",
                        secondary: "#0c4a6e",
                        'secom-blue-dark': '#004993',
                        'secom-blue-light': '#009ba4',
                        'secom-gray': '#e0e0e0'
                    },
                    borderRadius: {
                        'none': '0px',
                        'sm': '4px',
                        'DEFAULT': '8px',
                        'md': '12px',
                        'lg': '16px',
                        'xl': '20px',
                        '2xl': '24px',
                        '3xl': '32px',
                        'full': '9999px'
                    },
                    animation: {
                        'bounce-slow': 'bounce 3s infinite',
                        'pulse-slow': 'pulse 3s infinite',
                        'spin-slow': 'spin 8s linear infinite',
                    },
                    fontFamily: {
                        'sans': ['Inter', 'sans-serif'],
                        'display': ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    
    <!-- AOS Animate on Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }
        
        input:focus, button:focus, select:focus, textarea:focus {
            outline: none;
        }
        
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: rgba(14, 165, 233, 0.6);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(14, 165, 233, 0.8);
        }
        
        /* Modern glassmorphism effect */
        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        
        /* Gradient animated border */
        .gradient-border {
            position: relative;
        }
        
        .gradient-border::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 2px;
            background: linear-gradient(45deg, #0ea5e9, #0c4a6e, #0ea5e9);
            background-size: 200% 200%;
            animation: border-animation 3s ease infinite;
            -webkit-mask: 
                linear-gradient(#fff 0 0) content-box, 
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
        }
        
        @keyframes border-animation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        /* Styling for scroll to top button */
        .scroll-top-btn {
            transition: opacity 0.3s, visibility 0.3s;
        }
    </style>
</head>
<body class="text-gray-800 overflow-x-hidden">
    <!-- Navbar - Glass Effect with Shadow -->
    <header class="fixed top-0 w-full z-50 transition-all duration-300" id="navbar">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="<?= base_url() ?>" class="flex items-center">
                    <div class="relative">
                        <div class="absolute inset-0 bg-primary rounded-full opacity-20 blur-sm"></div>
                        <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center relative">
                            <i class="ri-shield-check-fill text-white"></i>
                        </div>
                    </div>
                    <div class="ml-3">
                        <span class="font-display font-bold text-xl text-gray-900">FazTech</span>
                        <span class="text-primary ml-1 font-bold">Security</span>
                    </div>
                </a>
                
                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="<?= base_url() ?>" class="text-gray-700 hover:text-primary font-medium transition-colors nav-link">Tentang</a>
                    <a href="<?= base_url("produk") ?>" class="text-gray-700 hover:text-primary font-medium transition-colors nav-link">Produk</a>
                    <a href="#testimoni" class="text-gray-700 hover:text-primary font-medium transition-colors nav-link">Testimoni</a>
                    <a href="#faq" class="text-gray-700 hover:text-primary font-medium transition-colors nav-link">FAQ</a>
                </nav>
                
                <!-- Authentication Buttons -->
                <div class="hidden md:flex items-center">
                    <?php if($sudah_login): ?>
                        <div class="flex items-center">
                            <div class="relative mr-6">
                                <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 border-2 border-primary">
                                    <span class="text-xs font-bold"><?= substr($nama_pengguna, 0, 1) ?></span>
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
                            </div>
                            
                            <div class="relative group">
                                <button class="flex items-center text-gray-700 font-medium group-hover:text-primary">
                                    <span><?= $nama_pengguna ?></span>
                                    <i class="ri-arrow-down-s-line ml-1"></i>
                                </button>
                                
                                <div class="absolute top-full right-0 mt-2 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right">
                                    <?php if($peran_pengguna == 'admin'): ?>
                                        <a href="<?= base_url('admin') ?>" class="flex items-center px-4 py-3 hover:bg-gray-50 border-b border-gray-100">
                                            <i class="ri-dashboard-line mr-2 text-primary"></i>
                                            <span>Dashboard Admin</span>
                                        </a>
                                    <?php endif; ?>
                                    
                                    <a href="<?= base_url('keluar') ?>" class="flex items-center px-4 py-3 hover:bg-gray-50 text-red-600">
                                        <i class="ri-logout-box-line mr-2"></i>
                                        <span>Keluar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="<?= base_url('masuk') ?>" class="text-gray-700 hover:text-primary font-medium mr-6 transition-colors">Masuk</a>
                        <a href="<?= base_url('daftar') ?>" class="bg-gradient-to-r from-primary to-primary/80 text-white px-5 py-2 rounded-lg hover:shadow-lg hover:shadow-primary/30 transition-all transform hover:-translate-y-0.5">
                            Daftar
                        </a>
                    <?php endif; ?>
                </div>
                
                <!-- Mobile menu button -->
                <button class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors" id="mobileMenuBtn">
                    <i class="ri-menu-line ri-lg"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile menu (hidden by default) -->
        <div class="md:hidden hidden bg-white shadow-lg rounded-b-xl mx-4 overflow-hidden transition-all duration-300" id="mobileMenu">
            <nav class="flex flex-col px-4 py-2">
                <a href="<?= base_url("produk") ?>" class="text-gray-700 hover:text-primary py-3 border-b border-gray-100 nav-link">Produk</a>
                <a href="#tentang" class="text-gray-700 hover:text-primary py-3 border-b border-gray-100 nav-link">Tentang</a>
                <a href="#testimoni" class="text-gray-700 hover:text-primary py-3 border-b border-gray-100 nav-link">Testimoni</a>
                <a href="#faq" class="text-gray-700 hover:text-primary py-3 border-b border-gray-100 nav-link">FAQ</a>
                
                <?php if($sudah_login): ?>
                    <div class="py-3 border-b border-gray-100">
                        <div class="flex items-center mb-2">
                            <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 border-2 border-primary mr-2">
                                <span class="text-xs font-bold"><?= substr($nama_pengguna, 0, 1) ?></span>
                            </div>
                            <span class="font-medium"><?= $nama_pengguna ?></span>
                        </div>
                        
                        <?php if($peran_pengguna == 'admin'): ?>
                            <a href="<?= base_url('admin') ?>" class="flex items-center py-2 text-primary hover:underline">
                                <i class="ri-dashboard-line mr-2"></i>
                                <span>Dashboard Admin</span>
                            </a>
                        <?php endif; ?>
                        
                        <a href="<?= base_url('keluar') ?>" class="flex items-center py-2 text-red-600 hover:underline">
                            <i class="ri-logout-box-line mr-2"></i>
                            <span>Keluar</span>
                        </a>
                    </div>
                <?php else: ?>
                    <div class="flex flex-col gap-3 py-4">
                        <a href="<?= base_url('masuk') ?>" class="bg-white border border-primary text-primary px-4 py-2 rounded-lg text-center hover:bg-primary/5 transition-colors">
                            Masuk
                        </a>
                        <a href="<?= base_url('daftar') ?>" class="bg-gradient-to-r from-primary to-primary/80 text-white px-4 py-2 rounded-lg text-center hover:shadow-lg hover:shadow-primary/30 transition-all">
                            Daftar
                        </a>
                    </div>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    
    <!-- Header Spacing -->
    <div class="h-20"></div>