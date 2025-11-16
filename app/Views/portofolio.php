<?= $this->include('templates/header') ?>

<!-- Page Header -->
<section class="gradient-bg text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            <i class="fas fa-folder-open mr-3"></i>Portofolio & Karya
        </h1>
        <p class="text-xl text-gray-100">Kumpulan proyek dan karya yang telah dikerjakan</p>
    </div>
</section>

<?php if (!empty($portofolio)): ?>
<!-- Portfolio Grid -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($portofolio as $porto): ?>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                <!-- Project Image/Icon -->
                <div class="h-56 bg-gradient-to-br from-purple-400 via-purple-600 to-indigo-700 flex items-center justify-center relative overflow-hidden">
                    <?php if (!empty($porto['gambar'])): ?>
                    <img src="<?= base_url('assets/images/portfolio/' . esc($porto['gambar'])) ?>" 
                         alt="<?= esc($porto['judul']) ?>" 
                         class="w-full h-full object-cover"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <?php endif; ?>
                    <div class="<?= !empty($porto['gambar']) ? 'hidden' : 'flex' ?> w-full h-full items-center justify-center">
                        <i class="fas fa-laptop-code text-white text-7xl opacity-60"></i>
                    </div>
                    
                    <!-- Year Badge -->
                    <?php if (!empty($porto['tahun'])): ?>
                    <div class="absolute top-4 right-4">
                        <span class="bg-white text-purple-600 px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                            <i class="fas fa-calendar mr-1"></i><?= esc($porto['tahun']) ?>
                        </span>
                    </div>
                    <?php endif; ?>
                </div>
                
                <!-- Project Info -->
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3"><?= esc($porto['judul']) ?></h3>
                    
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                        <?= esc($porto['deskripsi']) ?>
                    </p>
                    
                    <!-- Technologies -->
                    <?php if (!empty($porto['teknologi'])): ?>
                    <div class="mb-4">
                        <p class="text-xs text-gray-500 mb-2 font-semibold uppercase tracking-wide">
                            <i class="fas fa-cogs mr-1"></i>Teknologi:
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <?php 
                            $teknologiArray = explode(',', $porto['teknologi']);
                            foreach ($teknologiArray as $tech): 
                            ?>
                            <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-xs font-semibold">
                                <?= trim(esc($tech)) ?>
                            </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Links -->
                    <div class="flex gap-3 pt-4 border-t">
                        <?php if (!empty($porto['link_demo'])): ?>
                        <a href="<?= esc($porto['link_demo']) ?>" 
                           target="_blank" 
                           class="flex-1 text-center bg-purple-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-purple-700 transition duration-300">
                            <i class="fas fa-external-link-alt mr-2"></i>Demo
                        </a>
                        <?php endif; ?>
                        
                        <?php if (!empty($porto['link_github'])): ?>
                        <a href="<?= esc($porto['link_github']) ?>" 
                           target="_blank" 
                           class="flex-1 text-center bg-gray-800 text-white px-4 py-2 rounded-lg font-semibold hover:bg-gray-900 transition duration-300">
                            <i class="fab fa-github mr-2"></i>GitHub
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Portfolio Stats -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12 gradient-text">Statistik Portofolio</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Total Projects -->
                <div class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl shadow-lg p-8 text-white text-center">
                    <i class="fas fa-tasks text-5xl mb-4 opacity-80"></i>
                    <p class="text-4xl font-bold mb-2"><?= count($portofolio) ?></p>
                    <p class="text-lg">Total Proyek</p>
                </div>
                
                <!-- Technologies Used -->
                <div class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl shadow-lg p-8 text-white text-center">
                    <i class="fas fa-code-branch text-5xl mb-4 opacity-80"></i>
                    <p class="text-4xl font-bold mb-2">
                        <?php 
                        $allTech = [];
                        foreach ($portofolio as $porto) {
                            if (!empty($porto['teknologi'])) {
                                $techs = explode(',', $porto['teknologi']);
                                foreach ($techs as $tech) {
                                    $allTech[] = trim($tech);
                                }
                            }
                        }
                        echo count(array_unique($allTech));
                        ?>
                    </p>
                    <p class="text-lg">Teknologi Digunakan</p>
                </div>
                
                <!-- Years Active -->
                <div class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl shadow-lg p-8 text-white text-center">
                    <i class="fas fa-calendar-check text-5xl mb-4 opacity-80"></i>
                    <p class="text-4xl font-bold mb-2">
                        <?php 
                        $years = [];
                        foreach ($portofolio as $porto) {
                            if (!empty($porto['tahun'])) {
                                $years[] = $porto['tahun'];
                            }
                        }
                        $years = array_unique($years);
                        echo count($years);
                        ?>
                    </p>
                    <p class="text-lg">Tahun Aktif</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technology Cloud -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12 gradient-text">Teknologi yang Sering Digunakan</h2>
            
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="flex flex-wrap justify-center gap-3">
                    <?php 
                    $techCount = [];
                    foreach ($portofolio as $porto) {
                        if (!empty($porto['teknologi'])) {
                            $techs = explode(',', $porto['teknologi']);
                            foreach ($techs as $tech) {
                                $tech = trim($tech);
                                if (!isset($techCount[$tech])) {
                                    $techCount[$tech] = 0;
                                }
                                $techCount[$tech]++;
                            }
                        }
                    }
                    arsort($techCount);
                    
                    $colors = [
                        'bg-purple-100 text-purple-800',
                        'bg-blue-100 text-blue-800',
                        'bg-green-100 text-green-800',
                        'bg-orange-100 text-orange-800',
                        'bg-pink-100 text-pink-800',
                        'bg-indigo-100 text-indigo-800'
                    ];
                    
                    $index = 0;
                    foreach ($techCount as $tech => $count): 
                        $colorClass = $colors[$index % count($colors)];
                        $size = min(3, max(1, $count));
                        $sizeClasses = [
                            1 => 'text-sm px-3 py-1',
                            2 => 'text-base px-4 py-2',
                            3 => 'text-lg px-5 py-2'
                        ];
                    ?>
                    <span class="<?= $colorClass ?> <?= $sizeClasses[$size] ?> rounded-full font-semibold inline-flex items-center">
                        <?= esc($tech) ?>
                        <span class="ml-2 bg-white bg-opacity-50 rounded-full px-2 text-xs">
                            <?= $count ?>
                        </span>
                    </span>
                    <?php 
                        $index++;
                    endforeach; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php else: ?>
<!-- Empty State -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 text-center">
        <i class="fas fa-folder-open text-8xl text-gray-300 mb-6"></i>
        <h2 class="text-2xl font-bold text-gray-600 mb-4">Belum Ada Portofolio</h2>
        <p class="text-gray-500">Portofolio akan ditambahkan segera</p>
    </div>
</section>
<?php endif; ?>

<?= $this->include('templates/footer') ?>
