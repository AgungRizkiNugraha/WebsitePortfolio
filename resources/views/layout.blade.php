<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800 font-sans">

    <header class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 flex justify-between items-center">
            <!-- Logo + Nama -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                <img src="{{ asset('Agung.jpg') }}"
                     alt="Logo"
                     class="w-10 h-10 rounded-full border border-gray-300 shadow-sm">
                <span class="text-lg sm:text-2xl font-bold -600">Agung Rizki Nugraha</span>
            </a>

            <!-- Hamburger (mobile) -->
            <button id="nav-toggle" class="sm:hidden flex flex-col justify-center items-center w-10 h-10 focus:outline-none relative z-50 group" aria-label="Toggle navigation">
                <span class="block w-6 h-0.5 bg-gray-800 mb-1 transition-all duration-300 group-[.active]:rotate-45 group-[.active]:translate-y-2"></span>
                <span class="block w-6 h-0.5 bg-gray-800 mb-1 transition-all duration-300 group-[.active]:opacity-0"></span>
                <span class="block w-6 h-0.5 bg-gray-800 transition-all duration-300 group-[.active]:-rotate-45 group-[.active]:-translate-y-2"></span>
            </button>

            <!-- Menu Navigasi -->
            <nav id="nav-menu" class="hidden sm:flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6 text-base font-semibold text-gray-600 absolute sm:static top-full left-0 w-full sm:w-auto bg-white sm:bg-transparent shadow sm:shadow-none z-40 sm:z-auto transition-all duration-300 ease-in-out origin-top transform scale-y-0 sm:scale-y-100">
                <a id="nav-home" href="{{ route('home') }}#home" class="menu-link block px-6 py-3 sm:p-0 hover:text-indigo-600 opacity-0 translate-x-8 sm:opacity-100 sm:translate-x-0 transition-all duration-300">Home</a>
                <a id="nav-about" href="{{ route('home') }}#about" class="menu-link block px-6 py-3 sm:p-0 hover:text-indigo-600 opacity-0 translate-x-8 sm:opacity-100 sm:translate-x-0 transition-all duration-300">About</a>
                <a id="nav-projects" href="{{ route('home') }}#projects" class="menu-link block px-6 py-3 sm:p-0 hover:text-indigo-600 opacity-0 translate-x-8 sm:opacity-100 sm:translate-x-0 transition-all duration-300">Projects</a>
                <a id="nav-contact" href="{{ route('home') }}#contact" class="menu-link block px-6 py-3 sm:p-0 hover:text-indigo-600 opacity-0 translate-x-8 sm:opacity-100 sm:translate-x-0 transition-all duration-300">Contact</a>
            </nav>
        </div>
        <script>
        // Hamburger menu toggle + animasi modern menu links
        document.addEventListener('DOMContentLoaded', function() {
            const navToggle = document.getElementById('nav-toggle');
            const navMenu = document.getElementById('nav-menu');
            const menuLinks = document.querySelectorAll('.menu-link');
            if(navToggle && navMenu) {
                navToggle.addEventListener('click', function() {
                    navMenu.classList.toggle('hidden');
                    navMenu.classList.toggle('scale-y-0');
                    navMenu.classList.toggle('scale-y-100');
                    navToggle.classList.toggle('active');
                    // Animate menu links (mobile only)
                    if(window.innerWidth < 640) {
                        if(!navMenu.classList.contains('hidden')) {
                            menuLinks.forEach((link, i) => {
                                setTimeout(() => {
                                    link.classList.remove('opacity-0','translate-x-8');
                                    link.classList.add('opacity-100','translate-x-0');
                                }, 80*i);
                            });
                        } else {
                            menuLinks.forEach((link) => {
                                link.classList.add('opacity-0','translate-x-8');
                                link.classList.remove('opacity-100','translate-x-0');
                            });
                        }
                    }
                });
            }
        });
        </script>
    </header>

    {{-- Konten --}}
    <main class="min-h-screen">
        @yield('content')
    </main>
<!-- Footer -->
<footer class="bg-gray-50 text-gray-800 mt-12 border-t border-gray-200">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-8 sm:py-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 text-center md:text-left">

            <!-- Logo & Deskripsi -->
            <div>
                <h2 class="text-lg sm:text-2xl font-bold text-indigo-600">Agung Rizki Nugraha</h2>
                <p class="mt-2 text-xs sm:text-sm text-gray-600 leading-relaxed">
                    Website portfolio & project showcase untuk menampilkan karya dan pengalaman saya.
                </p>
            </div>

            <!-- Sosial Media -->
            <div>
                <h3 class="text-base sm:text-lg font-semibold mb-3 sm:mb-4">Follow Me</h3>
                <div class="flex justify-center md:justify-start space-x-4 sm:space-x-5">
                    <a href="#" class="hover:scale-110 transition transform text-indigo-600 text-lg sm:text-xl">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="hover:scale-110 transition transform text-indigo-600 text-lg sm:text-xl">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="http://www.instagram.com/agungrizkin" class="hover:scale-110 transition transform text-indigo-600 text-lg sm:text-xl">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/agung-rizki-nugraha/" class="hover:scale-110 transition transform text-indigo-600 text-lg sm:text-xl">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Kontak -->
            <div>
                <h3 class="text-base sm:text-lg font-semibold mb-3 sm:mb-4">Kontak</h3>
                <p class="text-xs sm:text-sm text-gray-600">Email: agungrizki640@gmail.com</p>
                <p class="text-xs sm:text-sm text-gray-600">Telp: +6289638844323</p>
            </div>
        </div>

        <!-- Garis & Copyright -->
        <div class="border-t border-gray-200 mt-6 sm:mt-8 pt-3 sm:pt-4 text-center text-xs sm:text-sm text-gray-500">
            &copy; {{ date('Y') }} Agung Rizki Nugraha. All rights reserved.
        </div>
    </div>
</footer>

<!-- Font Awesome (Free CDN yang pasti muncul) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<script>
// Smooth scroll for anchor links (section navigation)
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('a[href^="{{ route('home') }}#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            // Only run if on home page
            if(window.location.pathname === '/' || window.location.pathname === '/projects') {
                const hash = this.getAttribute('href').split('#')[1];
                const target = document.getElementById(hash);
                if(target) {
                    e.preventDefault();
                    window.scrollTo({
                        top: target.offsetTop - 80, // adjust for sticky header
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
});
</script>

</body>
</html>
