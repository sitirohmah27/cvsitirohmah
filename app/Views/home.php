<?= $this->include('templates/header') ?>

<!-- Hero Section -->
<section class="gradient-bg text-white py-20">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    Halo, Saya<br>
                    <span class="text-5xl md:text-6xl"><?= esc($biodata['nama_lengkap']) ?></span>
                </h1>
                <p class="text-xl mb-6 text-gray-100"><?= esc($biodata['tentang_saya']) ?></p>
                
                <div class="flex flex-wrap gap-4 mb-6">
                    <?php if (!empty($biodata['linkedin'])): ?>
                    <a href="<?= esc($biodata['linkedin']) ?>" target="_blank" class="bg-white text-purple-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                        <i class="fab fa-linkedin mr-2"></i>LinkedIn
                    </a>
                    <?php endif; ?>
                    
                    <?php if (!empty($biodata['github'])): ?>
                    <a href="<?= esc($biodata['github']) ?>" target="_blank" class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-purple-600 transition duration-300">
                        <i class="fab fa-github mr-2"></i>GitHub
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="md:w-1/2 flex justify-center">
                <div class="w-64 h-64 md:w-80 md:h-80 rounded-full overflow-hidden border-8 border-white shadow-2xl">
                    <img src="<?= base_url('assets/images/' . ($biodata['foto'] ?? 'default-avatar.jpg')) ?>" 
                        alt="<?= esc($biodata['nama_lengkap']) ?>" 
                        class="w-full h-full object-cover"
                        onerror="this.src='https://ui-avatars.com/api/?name=<?= urlencode($biodata['nama_lengkap']) ?>&size=320&background=667eea&color=fff&bold=true'">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Personal Info Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12 gradient-text">Informasi Pribadi</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
            <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-calendar text-purple-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Tanggal Lahir</p>
                    <p class="font-semibold"><?= esc($biodata['tempat_lahir']) ?>, <?= date('d F Y', strtotime($biodata['tanggal_lahir'])) ?></p>
                </div>
            </div>
            
            <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-envelope text-purple-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Email</p>
                    <p class="font-semibold break-all"><?= esc($biodata['email']) ?></p>
                </div>
            </div>
            
            <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-phone text-purple-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Telepon</p>
                    <p class="font-semibold"><?= esc($biodata['no_telepon']) ?></p>
                </div>
            </div>
            
            <div class="flex items-center p-4 bg-gray-50 rounded-lg md:col-span-2 lg:col-span-3">
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-map-marker-alt text-purple-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Alamat</p>
                    <p class="font-semibold"><?= esc($biodata['alamat']) ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Overview -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Pendidikan -->
            <div class="bg-white rounded-xl shadow-lg p-6 card-hover">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-graduation-cap text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold">Pendidikan</h3>
                </div>
                <div class="space-y-3">
                    <?php foreach (array_slice($pendidikan, 0, 2) as $pend): ?>
                    <div class="border-l-4 border-purple-600 pl-3">
                        <p class="font-semibold text-gray-800"><?= esc($pend['institusi']) ?></p>
                        <p class="text-sm text-gray-600"><?= esc($pend['jenjang']) ?> - <?= esc($pend['jurusan']) ?></p>
                        <p class="text-xs text-gray-500"><?= esc($pend['tahun_mulai']) ?> - <?= esc($pend['tahun_selesai']) ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?= base_url('pendidikan') ?>" class="inline-block mt-4 text-purple-600 font-semibold hover:text-purple-800 transition">
                    Lihat Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            
            <!-- Pengalaman -->
            <div class="bg-white rounded-xl shadow-lg p-6 card-hover">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-briefcase text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold">Pengalaman</h3>
                </div>
                <div class="space-y-3">
                    <?php foreach (array_slice($pengalaman, 0, 2) as $peng): ?>
                    <div class="border-l-4 border-purple-600 pl-3">
                        <p class="font-semibold text-gray-800"><?= esc($peng['posisi']) ?></p>
                        <p class="text-sm text-gray-600"><?= esc($peng['nama_perusahaan']) ?></p>
                        <p class="text-xs text-gray-500">
                            <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-xs"><?= esc($peng['jenis']) ?></span>
                        </p>
                    </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?= base_url('pengalaman') ?>" class="inline-block mt-4 text-purple-600 font-semibold hover:text-purple-800 transition">
                    Lihat Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            
            <!-- Keahlian -->
            <div class="bg-white rounded-xl shadow-lg p-6 card-hover">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-code text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold">Keahlian</h3>
                </div>
                <div class="space-y-2">
                    <?php 
                    $allSkills = [];
                    foreach ($keahlian as $skills) {
                        $allSkills = array_merge($allSkills, $skills);
                    }
                    foreach (array_slice($allSkills, 0, 5) as $skill): 
                    ?>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium"><?= esc($skill['nama_skill']) ?></span>
                        <span class="text-xs text-gray-500"><?= esc($skill['tingkat_kemampuan']) ?>%</span>
                    </div>
                    <div class="bg-gray-200 rounded-full h-2">
                        <div class="bg-gradient-to-r from-purple-600 to-indigo-600 h-2 rounded-full" style="width: <?= esc($skill['tingkat_kemampuan']) ?>%"></div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?= base_url('keahlian') ?>" class="inline-block mt-4 text-purple-600 font-semibold hover:text-purple-800 transition">
                    Lihat Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Portofolio Preview -->
<?php if (!empty($portofolio)): ?>
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-4 gradient-text">Portofolio Terpilih</h2>
        <p class="text-center text-gray-600 mb-12">Beberapa karya dan proyek yang telah saya kerjakan</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach (array_slice($portofolio, 0, 3) as $porto): ?>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                <div class="h-48 bg-gradient-to-br from-purple-400 to-indigo-600 flex items-center justify-center">
                    <i class="fas fa-laptop-code text-white text-6xl"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2"><?= esc($porto['judul']) ?></h3>
                    <p class="text-gray-600 text-sm mb-4"><?= esc(substr($porto['deskripsi'], 0, 100)) ?>...</p>
                    <div class="mb-4">
                        <p class="text-xs text-gray-500 mb-2">Teknologi:</p>
                        <p class="text-sm text-purple-600 font-medium"><?= esc($porto['teknologi']) ?></p>
                    </div>
                    <div class="flex gap-2">
                        <?php if (!empty($porto['link_demo'])): ?>
                        <a href="<?= esc($porto['link_demo']) ?>" target="_blank" class="text-sm bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">
                            <i class="fas fa-external-link-alt mr-1"></i>Demo
                        </a>
                        <?php endif; ?>
                        <?php if (!empty($porto['link_github'])): ?>
                        <a href="<?= esc($porto['link_github']) ?>" target="_blank" class="text-sm bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-900 transition">
                            <i class="fab fa-github mr-1"></i>GitHub
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-8">
            <a href="<?= base_url('portofolio') ?>" class="inline-block bg-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-purple-700 transition duration-300">
                Lihat Semua Portofolio
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<?= $this->include('templates/footer') ?>
