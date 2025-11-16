<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'CV') ?> - <?= esc($biodata['nama_lengkap'] ?? 'Curriculum Vitae') ?></title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .skill-bar {
            transition: width 1s ease-in-out;
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        @media print {
            nav, .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold">
                        <?= strtoupper(substr($biodata['nama_lengkap'] ?? 'CV', 0, 1)) ?>
                    </div>
                    <span class="text-xl font-bold text-gray-800"><?= esc($biodata['nama_lengkap'] ?? 'CV') ?></span>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="lg:hidden text-gray-700 hover:text-purple-600">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                
                <!-- Desktop Menu -->
                <div class="hidden lg:flex space-x-8">
                    <a href="<?= base_url('/') ?>" class="nav-link text-gray-700 hover:text-purple-600 font-medium transition duration-300 <?= (current_url() == base_url('/')) ? 'text-purple-600' : '' ?>">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                    <a href="<?= base_url('pendidikan') ?>" class="nav-link text-gray-700 hover:text-purple-600 font-medium transition duration-300 <?= (current_url() == base_url('pendidikan')) ? 'text-purple-600' : '' ?>">
                        <i class="fas fa-graduation-cap mr-2"></i>Pendidikan
                    </a>
                    <a href="<?= base_url('pengalaman') ?>" class="nav-link text-gray-700 hover:text-purple-600 font-medium transition duration-300 <?= (current_url() == base_url('pengalaman')) ? 'text-purple-600' : '' ?>">
                        <i class="fas fa-briefcase mr-2"></i>Pengalaman
                    </a>
                    <a href="<?= base_url('keahlian') ?>" class="nav-link text-gray-700 hover:text-purple-600 font-medium transition duration-300 <?= (current_url() == base_url('keahlian')) ? 'text-purple-600' : '' ?>">
                        <i class="fas fa-code mr-2"></i>Keahlian
                    </a>
                    <a href="<?= base_url('portofolio') ?>" class="nav-link text-gray-700 hover:text-purple-600 font-medium transition duration-300 <?= (current_url() == base_url('portofolio')) ? 'text-purple-600' : '' ?>">
                        <i class="fas fa-folder-open mr-2"></i>Portofolio
                    </a>
                </div>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden lg:hidden pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="<?= base_url('/') ?>" class="nav-link text-gray-700 hover:text-purple-600 font-medium transition duration-300 py-2 <?= (current_url() == base_url('/')) ? 'text-purple-600' : '' ?>">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                    <a href="<?= base_url('pendidikan') ?>" class="nav-link text-gray-700 hover:text-purple-600 font-medium transition duration-300 py-2 <?= (current_url() == base_url('pendidikan')) ? 'text-purple-600' : '' ?>">
                        <i class="fas fa-graduation-cap mr-2"></i>Pendidikan
                    </a>
                    <a href="<?= base_url('pengalaman') ?>" class="nav-link text-gray-700 hover:text-purple-600 font-medium transition duration-300 py-2 <?= (current_url() == base_url('pengalaman')) ? 'text-purple-600' : '' ?>">
                        <i class="fas fa-briefcase mr-2"></i>Pengalaman
                    </a>
                    <a href="<?= base_url('keahlian') ?>" class="nav-link text-gray-700 hover:text-purple-600 font-medium transition duration-300 py-2 <?= (current_url() == base_url('keahlian')) ? 'text-purple-600' : '' ?>">
                        <i class="fas fa-code mr-2"></i>Keahlian
                    </a>
                    <a href="<?= base_url('portofolio') ?>" class="nav-link text-gray-700 hover:text-purple-600 font-medium transition duration-300 py-2 <?= (current_url() == base_url('portofolio')) ? 'text-purple-600' : '' ?>">
                        <i class="fas fa-folder-open mr-2"></i>Portofolio
                    </a>
                </div>
            </div>
        </div>
    </nav>
