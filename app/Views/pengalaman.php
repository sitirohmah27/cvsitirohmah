<?= $this->include('templates/header') ?>

<!-- Page Header -->
<section class="gradient-bg text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            <i class="fas fa-briefcase mr-3"></i>Pengalaman
        </h1>
        <p class="text-xl text-gray-100">Organisasi, Magang, Proyek, dan Pekerjaan</p>
    </div>
</section>

<!-- Filter Tabs -->
<section class="bg-white py-6 shadow-md sticky top-16 z-40">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center gap-3">
            <button onclick="filterPengalaman('all')" class="filter-btn active px-6 py-2 rounded-full font-semibold transition duration-300">
                <i class="fas fa-th mr-2"></i>Semua
            </button>
            <button onclick="filterPengalaman('Organisasi')" class="filter-btn px-6 py-2 rounded-full font-semibold transition duration-300">
                <i class="fas fa-users mr-2"></i>Organisasi
            </button>
            <button onclick="filterPengalaman('Magang')" class="filter-btn px-6 py-2 rounded-full font-semibold transition duration-300">
                <i class="fas fa-laptop-code mr-2"></i>Magang
            </button>
            <button onclick="filterPengalaman('Pekerjaan')" class="filter-btn px-6 py-2 rounded-full font-semibold transition duration-300">
                <i class="fas fa-building mr-2"></i>Pekerjaan
            </button>
            <button onclick="filterPengalaman('Proyek')" class="filter-btn px-6 py-2 rounded-full font-semibold transition duration-300">
                <i class="fas fa-project-diagram mr-2"></i>Proyek
            </button>
        </div>
    </div>
</section>

<!-- Experience Cards -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto grid grid-cols-1 gap-8" id="pengalaman-container">
            <?php foreach ($pengalaman as $peng): ?>
            <div class="pengalaman-item bg-white rounded-xl shadow-lg p-6 card-hover" data-jenis="<?= esc($peng['jenis']) ?>">
                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Icon -->
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 rounded-full flex items-center justify-center text-white text-2xl
                            <?php 
                            $bgColors = [
                                'Organisasi' => 'bg-blue-500',
                                'Magang' => 'bg-green-500',
                                'Pekerjaan' => 'bg-purple-500',
                                'Proyek' => 'bg-orange-500'
                            ];
                            echo $bgColors[$peng['jenis']] ?? 'bg-gray-500';
                            ?>">
                            <?php 
                            $icons = [
                                'Organisasi' => 'fas fa-users',
                                'Magang' => 'fas fa-laptop-code',
                                'Pekerjaan' => 'fas fa-building',
                                'Proyek' => 'fas fa-project-diagram'
                            ];
                            ?>
                            <i class="<?= $icons[$peng['jenis']] ?? 'fas fa-briefcase' ?>"></i>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="flex-grow">
                        <div class="flex flex-col md:flex-row md:items-start md:justify-between mb-3">
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800 mb-1"><?= esc($peng['posisi']) ?></h3>
                                <p class="text-lg text-gray-600 font-semibold"><?= esc($peng['nama_perusahaan']) ?></p>
                            </div>
                            <div class="mt-2 md:mt-0 flex flex-col items-start md:items-end gap-2">
                                <span class="inline-block px-4 py-1 rounded-full text-sm font-semibold
                                    <?php 
                                    $tagColors = [
                                        'Organisasi' => 'bg-blue-100 text-blue-800',
                                        'Magang' => 'bg-green-100 text-green-800',
                                        'Pekerjaan' => 'bg-purple-100 text-purple-800',
                                        'Proyek' => 'bg-orange-100 text-orange-800'
                                    ];
                                    echo $tagColors[$peng['jenis']] ?? 'bg-gray-100 text-gray-800';
                                    ?>">
                                    <?= esc($peng['jenis']) ?>
                                </span>
                                <span class="text-gray-600 text-sm">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    <?= esc($peng['tahun_mulai']) ?> - 
                                    <?= $peng['masih_aktif'] ? '<span class="text-green-600 font-semibold">Sekarang</span>' : esc($peng['tahun_selesai']) ?>
                                </span>
                            </div>
                        </div>
                        
                        <?php if (!empty($peng['deskripsi'])): ?>
                        <div class="border-t pt-4">
                            <p class="text-gray-700 leading-relaxed"><?= nl2br(esc($peng['deskripsi'])) ?></p>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($peng['masih_aktif']): ?>
                        <div class="mt-3">
                            <span class="inline-flex items-center bg-green-100 text-green-800 px-3 py-1 rounded-lg text-sm font-semibold">
                                <i class="fas fa-circle text-green-500 text-xs mr-2 animate-pulse"></i>
                                Sedang Aktif
                            </span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- No results message -->
        <div id="no-results" class="hidden text-center py-12">
            <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
            <p class="text-xl text-gray-500">Tidak ada pengalaman yang ditemukan untuk kategori ini</p>
        </div>
    </div>
</section>

<!-- Summary Statistics -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12 gradient-text">Ringkasan Pengalaman</h2>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <?php
                $stats = [
                    'Organisasi' => 0,
                    'Magang' => 0,
                    'Pekerjaan' => 0,
                    'Proyek' => 0
                ];
                foreach ($pengalaman as $peng) {
                    $stats[$peng['jenis']]++;
                }
                
                $statIcons = [
                    'Organisasi' => ['icon' => 'fas fa-users', 'color' => 'from-blue-500 to-blue-600'],
                    'Magang' => ['icon' => 'fas fa-laptop-code', 'color' => 'from-green-500 to-green-600'],
                    'Pekerjaan' => ['icon' => 'fas fa-building', 'color' => 'from-purple-500 to-purple-600'],
                    'Proyek' => ['icon' => 'fas fa-project-diagram', 'color' => 'from-orange-500 to-orange-600']
                ];
                ?>
                
                <?php foreach ($stats as $jenis => $count): ?>
                <div class="text-center p-6 bg-gradient-to-br <?= $statIcons[$jenis]['color'] ?> rounded-xl shadow-lg text-white">
                    <i class="<?= $statIcons[$jenis]['icon'] ?> text-4xl mb-3 opacity-80"></i>
                    <p class="text-3xl font-bold mb-1"><?= $count ?></p>
                    <p class="text-sm"><?= $jenis ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<style>
    .filter-btn {
        background-color: #e5e7eb;
        color: #4b5563;
    }
    
    .filter-btn:hover {
        background-color: #d1d5db;
    }
    
    .filter-btn.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
</style>

<script>
    function filterPengalaman(jenis) {
        const items = document.querySelectorAll('.pengalaman-item');
        const noResults = document.getElementById('no-results');
        const filterBtns = document.querySelectorAll('.filter-btn');
        let visibleCount = 0;
        
        // Update active button
        filterBtns.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
        
        // Filter items
        items.forEach(item => {
            if (jenis === 'all' || item.dataset.jenis === jenis) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });
        
        // Show/hide no results message
        if (visibleCount === 0) {
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
        }
    }
</script>

<?= $this->include('templates/footer') ?>
