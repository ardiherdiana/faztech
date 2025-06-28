<!-- Footer dengan desain modern -->
<footer class="pt-24 pb-12 bg-gray-900 text-white relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-primary/10 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-secondary/10 rounded-full filter blur-3xl"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
            <!-- Brand and Description -->
            <div class="md:col-span-4" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10">
                        <img src="<?= base_url('assets/img/faztech.png') ?>" alt="FazTech Logo" class="w-full h-full">
                    </div>
                    <div class="ml-3">
                        <span class="font-display font-bold text-xl text-white">FazTech</span>
                        <span class="text-primary ml-1 font-bold">Security</span>
                    </div>
                </div>

                <p class="text-gray-400 mb-8">Solusi keamanan terpercaya untuk rumah dan bisnis Anda. Kami menyediakan layanan lengkap dari konsultasi, pemasangan, hingga perawatan sistem keamanan.</p>

            </div>

            <!-- Quick Links -->
            <div class="md:col-span-2" data-aos="fade-up" data-aos-delay="200">
                <h3 class="text-lg font-bold mb-6 relative">
                    <span class="relative z-10">Menu</span>
                    <span class="absolute bottom-0 left-0 w-10 h-1 bg-primary"></span>
                </h3>

                <ul class="space-y-3">
                    <li><a href="<?= base_url() ?>" class="text-gray-400 hover:text-white transition-colors inline-flex items-center"><i class="ri-arrow-right-s-line mr-2"></i> Tentang Kami</a></li>
                    <li><a href="<?= base_url('produk') ?>" class="text-gray-400 hover:text-white transition-colors inline-flex items-center"><i class="ri-arrow-right-s-line mr-2"></i> Produk</a></li>
                    <li><a href="<?= base_url('testimoni') ?>" class="text-gray-400 hover:text-white transition-colors inline-flex items-center"><i class="ri-arrow-right-s-line mr-2"></i> Testimoni</a></li>
                    <li><a href="<?= base_url('pekerjaan') ?>" class="text-gray-400 hover:text-white transition-colors inline-flex items-center"><i class="ri-arrow-right-s-line mr-2"></i> Pekerjaan</a></li>
                </ul>
            </div>

            <!-- Layanan -->
            <div class="md:col-span-2" data-aos="fade-up" data-aos-delay="300">
                <h3 class="text-lg font-bold mb-6 relative">
                    <span class="relative z-10">Layanan</span>
                    <span class="absolute bottom-0 left-0 w-10 h-1 bg-primary"></span>
                </h3>

                <ul class="space-y-3">

                    <li><a href="<?= base_url('produk') ?>" class="text-gray-400 hover:text-white transition-colors inline-flex items-center"><i class="ri-arrow-right-s-line mr-2"></i> Akses Control</a></li>
                    <li><a href="<?= base_url('produk') ?>" class="text-gray-400 hover:text-white transition-colors inline-flex items-center"><i class="ri-arrow-right-s-line mr-2"></i> CCTV</a></li>
                    <li><a href="<?= base_url('produk') ?>" class="text-gray-400 hover:text-white transition-colors inline-flex items-center"><i class="ri-arrow-right-s-line mr-2"></i> Kabel</a></li>
                    <li><a href="<?= base_url('produk') ?>" class="text-gray-400 hover:text-white transition-colors inline-flex items-center"><i class="ri-arrow-right-s-line mr-2"></i> Router</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="md:col-span-4" data-aos="fade-up" data-aos-delay="400">
                <h3 class="text-lg font-bold mb-6 relative">
                    <span class="relative z-10">Kontak Kami</span>
                    <span class="absolute bottom-0 left-0 w-10 h-1 bg-primary"></span>
                </h3>

                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="w-10 h-10 flex items-center justify-center rounded-full bg-primary/20 text-primary mt-1 mr-4 flex-shrink-0">
                            <i class="ri-map-pin-line"></i>
                        </div>
                        <p class="text-gray-400">Jl. Keamanan No.123, Jakarta Selatan, 12120 Indonesia</p>
                    </div>

                    <div class="flex items-start">
                        <div class="w-10 h-10 flex items-center justify-center rounded-full bg-primary/20 text-primary mt-1 mr-4 flex-shrink-0">
                            <i class="ri-phone-line"></i>
                        </div>
                        <div>
                            <p class="text-white font-medium">+62 856-9474-3168</p>
                            <p class="text-gray-500 text-sm">Senin - Jumat, 08:00 - 17:00 WIB</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-10 h-10 flex items-center justify-center rounded-full bg-primary/20 text-primary mt-1 mr-4 flex-shrink-0">
                            <i class="ri-mail-line"></i>
                        </div>
                        <p class="text-gray-400">info@faztech.com</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-16 pt-8 border-t border-gray-800 flex flex-col md:flex-row md:justify-between items-center">
            <p class="text-gray-500 mb-4 md:mb-0">&copy; <?= date('Y') ?> FazTech Security. Hak Cipta Dilindungi Undang-Undang.</p>

            <div class="flex flex-wrap justify-center gap-x-8 gap-y-2">
                <a href="#" class="text-gray-500 hover:text-white transition-colors">Syarat & Ketentuan</a>
                <a href="#" class="text-gray-500 hover:text-white transition-colors">Kebijakan Privasi</a>
                <a href="#" class="text-gray-500 hover:text-white transition-colors">FAQ</a>
            </div>
        </div>
    </div>
</footer>

<!-- WhatsApp Floating Button -->
<a href="https://wa.me/6285694743168?text=Halo%20FazTech,%20saya%20ingin%20konsultasi%20tentang%20layanan%20keamanan"
    class="fixed bottom-6 right-6 w-16 h-16 bg-green-500 rounded-full flex items-center justify-center shadow-lg hover:bg-green-600 transition-all duration-300 z-40">
    <i class="ri-whatsapp-line text-2xl text-white"></i>
    <span class="absolute top-0 right-0 w-4 h-4 bg-red-500 rounded-full border-2 border-white"></span>
</a>

<!-- Tombol Scroll ke Atas -->
<button id="scrollTopBtn"
    class="fixed bottom-24 right-6 w-16 h-16 bg-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary/90 transition-all duration-300 z-40 scroll-top-btn opacity-0 invisible">
    <i class="ri-arrow-up-line text-2xl text-white"></i>
</button>

<!-- JavaScript untuk fungsi-fungsi landing page -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi AOS (Animate on Scroll)
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });

        // Navbar Scroll Effect
        const navbar = document.getElementById('navbar');

        function updateNavbar() {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white', 'shadow-lg');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('bg-white', 'shadow-lg');
                navbar.classList.add('bg-transparent');
            }
        }

        // Call on page load
        updateNavbar();

        // Add event listener
        window.addEventListener('scroll', updateNavbar);

        // Toggle Menu Mobile
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');

                // Toggle icon
                const icon = mobileMenuBtn.querySelector('i');
                if (icon.classList.contains('ri-menu-line')) {
                    icon.classList.remove('ri-menu-line');
                    icon.classList.add('ri-close-line');
                } else {
                    icon.classList.remove('ri-close-line');
                    icon.classList.add('ri-menu-line');
                }
            });
        }

        // Tombol Scroll ke Atas
        const scrollTopBtn = document.getElementById('scrollTopBtn');

        if (scrollTopBtn) {
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    scrollTopBtn.classList.remove('opacity-0', 'invisible');
                    scrollTopBtn.classList.add('opacity-100', 'visible');
                } else {
                    scrollTopBtn.classList.add('opacity-0', 'invisible');
                    scrollTopBtn.classList.remove('opacity-100', 'visible');
                }
            });

            scrollTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }

        // Smooth scroll untuk anchor links
        document.querySelectorAll('a.nav-link').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');

                if (!targetId.startsWith('#')) {
                    return;
                }

                e.preventDefault();

                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });

                    if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                        const icon = mobileMenuBtn.querySelector('i');
                        icon.classList.remove('ri-close-line');
                        icon.classList.add('ri-menu-line');
                    }
                }
            });
        });

        // Active section highlighting
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link');

        function highlightNavLink() {
            const scrollPosition = window.scrollY + 100;

            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.offsetHeight;
                const sectionId = section.getAttribute('id');

                if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    navLinks.forEach(link => {
                        link.classList.remove('text-primary', 'font-semibold');

                        if (link.getAttribute('href') === '#' + sectionId) {
                            link.classList.add('text-primary', 'font-semibold');
                        }
                    });
                }
            });
        }

        window.addEventListener('scroll', highlightNavLink);
        highlightNavLink();
    });
</script>
</body>

</html>