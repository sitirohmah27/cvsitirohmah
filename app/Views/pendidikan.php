<?= $this->include('templates/header') ?>

<!-- Page Header -->
<section class="gradient-bg text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            <i class="fas fa-graduation-cap mr-3"></i>Riwayat Pendidikan
        </h1>
        <p class="text-xl text-gray-100">Perjalanan akademik dan pendidikan formal</p>
    </div>
</section>

<!-- Education Timeline -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <?php foreach ($pendidikan as $index => $pend): ?>
            <div class="relative mb-12 <?= ($index < count($pendidikan) - 1) ? 'pb-12 border-l-4 border-purple-200 ml-6' : '' ?>">
                <!-- Timeline dot -->
                <div class="absolute -left-8 top-0 w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center shadow-lg">
                    <i class="fas fa-graduation-cap text-white text-xl"></i>
                </div>
                
                <!-- Content Card -->
                <div class="ml-8 bg-white rounded-xl shadow-lg p-6 card-hover">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2"><?= esc($pend['institusi']) ?></h3>
                            <p class="text-lg text-purple-600 font-semibold">
                                <?= esc($pend['jenjang']) ?> 
                                <?php if (!empty($pend['jurusan'])): ?>
                                    - <?= esc($pend['jurusan']) ?>
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="mt-2 md:mt-0">
                            <span class="inline-block bg-purple-100 text-purple-800 px-4 py-2 rounded-full font-semibold">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                <?= esc($pend['tahun_mulai']) ?> - <?= esc($pend['tahun_selesai']) ?>
                            </span>
                        </div>
                    </div>
                    
                    <?php if (!empty($pend['ipk'])): ?>
                    <div class="mb-4">
                        <span class="inline-flex items-center bg-green-100 text-green-800 px-3 py-1 rounded-lg text-sm font-semibold">
                            <i class="fas fa-star mr-2"></i>
                            IPK: <?= number_format($pend['ipk'], 2) ?>
                        </span>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($pend['deskripsi'])): ?>
                    <div class="border-t pt-4">
                        <p class="text-gray-700 leading-relaxed"><?= nl2br(esc($pend['deskripsi'])) ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Statistics -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12 gradient-text">Statistik Pendidikan</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-6 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl shadow-lg text-white">
                    <i class="fas fa-graduation-cap text-5xl mb-4 opacity-80"></i>
                    <p class="text-4xl font-bold mb-2"><?= count($pendidikan) ?></p>
                    <p class="text-lg">Jenjang Pendidikan</p>
                </div>
                
                <div class="text-center p-6 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl shadow-lg text-white">
                    <i class="fas fa-calendar-check text-5xl mb-4 opacity-80"></i>
                    <p class="text-4xl font-bold mb-2">
                        <?php 
                        $totalYears = 0;
                        foreach ($pendidikan as $pend) {
                            $totalYears += ($pend['tahun_selesai'] - $pend['tahun_mulai']);
                        }
                        echo $totalYears;
                        ?>
                    </p>
                    <p class="text-lg">Total Tahun Belajar</p>
                </div>
                
                <div class="text-center p-6 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl shadow-lg text-white">
                    <i class="fas fa-star text-5xl mb-4 opacity-80"></i>
                    <p class="text-4xl font-bold mb-2">
                        <?php 
                        $avgIpk = 0;
                        $countIpk = 0;
                        foreach ($pendidikan as $pend) {
                            if (!empty($pend['ipk'])) {
                                $avgIpk += $pend['ipk'];
                                $countIpk++;
                            }
                        }
                        echo $countIpk > 0 ? number_format($avgIpk / $countIpk, 2) : '-';
                        ?>
                    </p>
                    <p class="text-lg">Rata-rata IPK</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('templates/footer') ?>
