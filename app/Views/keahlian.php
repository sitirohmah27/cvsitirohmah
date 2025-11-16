<?= $this->include('templates/header') ?>

<!-- Page Header -->
<section class="gradient-bg text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            <i class="fas fa-code mr-3"></i>Keahlian & Skills
        </h1>
        <p class="text-xl text-gray-100">Kemampuan teknis dan profesional yang saya kuasai</p>
    </div>
</section>

<!-- Skills by Category -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <?php foreach ($keahlian as $kategori => $skills): ?>
            <div class="mb-12 skills-section">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center">
                    <div class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center mr-3">
                        <?php
                        $categoryIcons = [
                            'Programming' => 'fas fa-code',
                            'Framework' => 'fas fa-layer-group',
                            'Database' => 'fas fa-database',
                            'Tools' => 'fas fa-tools',
                            'Design' => 'fas fa-palette',
                            'Lainnya' => 'fas fa-cogs'
                        ];
                        $icon = $categoryIcons[$kategori] ?? 'fas fa-cogs';
                        ?>
                        <i class="<?= $icon ?> text-white"></i>
                    </div>
                    <?= esc($kategori) ?>
                </h2>
                
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="space-y-6">
                        <?php foreach ($skills as $skill): ?>
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-semibold text-gray-800"><?= esc($skill['nama_skill']) ?></span>
                                <span class="text-sm font-bold text-purple-600"><?= esc($skill['tingkat_kemampuan']) ?>%</span>
                            </div>
                            <div class="bg-gray-200 rounded-full h-3 overflow-hidden">
                                <div class="skill-bar bg-gradient-to-r from-purple-600 to-indigo-600 h-3 rounded-full transition-all duration-1000 ease-out" 
                                     data-width="<?= esc($skill['tingkat_kemampuan']) ?>" 
                                     style="width: 0%"></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Skills Summary -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12 gradient-text">Ringkasan Keahlian</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Total Skills -->
                <div class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl shadow-lg p-8 text-white text-center">
                    <i class="fas fa-list-check text-5xl mb-4 opacity-80"></i>
                    <p class="text-4xl font-bold mb-2">
                        <?php 
                        $totalSkills = 0;
                        foreach ($keahlian as $skills) {
                            $totalSkills += count($skills);
                        }
                        echo $totalSkills;
                        ?>
                    </p>
                    <p class="text-lg">Total Keahlian</p>
                </div>
                
                <!-- Categories -->
                <div class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl shadow-lg p-8 text-white text-center">
                    <i class="fas fa-folder-tree text-5xl mb-4 opacity-80"></i>
                    <p class="text-4xl font-bold mb-2"><?= count($keahlian) ?></p>
                    <p class="text-lg">Kategori</p>
                </div>
                
                <!-- Average Level -->
                <div class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl shadow-lg p-8 text-white text-center">
                    <i class="fas fa-chart-line text-5xl mb-4 opacity-80"></i>
                    <p class="text-4xl font-bold mb-2">
                        <?php 
                        $totalLevel = 0;
                        $count = 0;
                        foreach ($keahlian as $skills) {
                            foreach ($skills as $skill) {
                                $totalLevel += $skill['tingkat_kemampuan'];
                                $count++;
                            }
                        }
                        echo $count > 0 ? round($totalLevel / $count) : 0;
                        ?>%
                    </p>
                    <p class="text-lg">Rata-rata Tingkat</p>
                </div>
            </div>
            
            <!-- Top Skills -->
            <div class="mt-12">
                <h3 class="text-2xl font-bold text-center mb-8 text-gray-800">Top 5 Keahlian</h3>
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <?php 
                    $allSkills = [];
                    foreach ($keahlian as $skills) {
                        $allSkills = array_merge($allSkills, $skills);
                    }
                    usort($allSkills, function($a, $b) {
                        return $b['tingkat_kemampuan'] - $a['tingkat_kemampuan'];
                    });
                    $topSkills = array_slice($allSkills, 0, 5);
                    ?>
                    
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <?php foreach ($topSkills as $index => $skill): ?>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <div class="w-16 h-16 mx-auto mb-3 rounded-full flex items-center justify-center text-white text-xl font-bold
                                <?php 
                                $colors = [
                                    'bg-yellow-500',
                                    'bg-gray-400',
                                    'bg-orange-600',
                                    'bg-purple-500',
                                    'bg-indigo-500'
                                ];
                                echo $colors[$index] ?? 'bg-purple-500';
                                ?>">
                                #<?= $index + 1 ?>
                            </div>
                            <p class="font-bold text-gray-800 mb-1"><?= esc($skill['nama_skill']) ?></p>
                            <p class="text-sm text-gray-600"><?= esc($skill['kategori']) ?></p>
                            <div class="mt-2">
                                <span class="inline-block bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-xs font-bold">
                                    <?= esc($skill['tingkat_kemampuan']) ?>%
                                </span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skill Proficiency Legend -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg p-8">
            <h3 class="text-2xl font-bold text-center mb-6 text-gray-800">Tingkat Kemampuan</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center p-4 border-2 border-green-500 rounded-lg">
                    <div class="text-3xl font-bold text-green-600 mb-2">80% - 100%</div>
                    <p class="text-gray-700 font-semibold">Mahir</p>
                    <p class="text-sm text-gray-600 mt-1">Expert level, sering digunakan</p>
                </div>
                
                <div class="text-center p-4 border-2 border-blue-500 rounded-lg">
                    <div class="text-3xl font-bold text-blue-600 mb-2">60% - 79%</div>
                    <p class="text-gray-700 font-semibold">Menengah</p>
                    <p class="text-sm text-gray-600 mt-1">Comfortable, dapat bekerja mandiri</p>
                </div>
                
                <div class="text-center p-4 border-2 border-orange-500 rounded-lg">
                    <div class="text-3xl font-bold text-orange-600 mb-2">0% - 59%</div>
                    <p class="text-gray-700 font-semibold">Dasar</p>
                    <p class="text-sm text-gray-600 mt-1">Familiar, terus belajar</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('templates/footer') ?>
