    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-16">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- About -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Tentang</h3>
                    <p class="text-gray-300 text-sm">
                        <?= esc(substr($biodata['tentang_saya'] ?? 'Curriculum Vitae', 0, 150)) ?>...
                    </p>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="<?= base_url('/') ?>" class="text-gray-300 hover:text-purple-400 transition">Home</a></li>
                        <li><a href="<?= base_url('pendidikan') ?>" class="text-gray-300 hover:text-purple-400 transition">Pendidikan</a></li>
                        <li><a href="<?= base_url('pengalaman') ?>" class="text-gray-300 hover:text-purple-400 transition">Pengalaman</a></li>
                        <li><a href="<?= base_url('keahlian') ?>" class="text-gray-300 hover:text-purple-400 transition">Keahlian</a></li>
                        <li><a href="<?= base_url('portofolio') ?>" class="text-gray-300 hover:text-purple-400 transition">Portofolio</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Kontak</h3>
                    <ul class="space-y-3 text-sm">
                        <?php if (!empty($biodata['email'])): ?>
                        <li class="flex items-center">
                            <i class="fas fa-envelope w-6 text-purple-400"></i>
                            <a href="mailto:<?= esc($biodata['email']) ?>" class="text-gray-300 hover:text-purple-400 transition"><?= esc($biodata['email']) ?></a>
                        </li>
                        <?php endif; ?>
                        
                        <?php if (!empty($biodata['no_telepon'])): ?>
                        <li class="flex items-center">
                            <i class="fas fa-phone w-6 text-purple-400"></i>
                            <span class="text-gray-300"><?= esc($biodata['no_telepon']) ?></span>
                        </li>
                        <?php endif; ?>
                        
                        <?php if (!empty($biodata['linkedin'])): ?>
                        <li class="flex items-center">
                            <i class="fab fa-linkedin w-6 text-purple-400"></i>
                            <a href="<?= esc($biodata['linkedin']) ?>" target="_blank" class="text-gray-300 hover:text-purple-400 transition">LinkedIn</a>
                        </li>
                        <?php endif; ?>
                        
                        <?php if (!empty($biodata['github'])): ?>
                        <li class="flex items-center">
                            <i class="fab fa-github w-6 text-purple-400"></i>
                            <a href="<?= esc($biodata['github']) ?>" target="_blank" class="text-gray-300 hover:text-purple-400 transition">GitHub</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-sm text-gray-400">
                <p>&copy; <?= date('Y') ?> <?= esc($biodata['nama_lengkap'] ?? 'CV') ?>. All rights reserved.</p>
                <p class="mt-2">Built with <i class="fas fa-heart text-red-500"></i> using CodeIgniter 4 & Tailwind CSS</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
        
        // Skill bar animation on scroll
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -100px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const skillBars = entry.target.querySelectorAll('.skill-bar');
                    skillBars.forEach(bar => {
                        const width = bar.getAttribute('data-width');
                        bar.style.width = width + '%';
                    });
                }
            });
        }, observerOptions);
        
        const skillSections = document.querySelectorAll('.skills-section');
        skillSections.forEach(section => observer.observe(section));
        
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
