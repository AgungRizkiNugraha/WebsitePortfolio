<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio | Agung Rizki</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-white text-gray-800 font-sans">

    <!-- Navbar -->
    <header class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-600">Agung Rizki</h1>
            <nav class="space-x-6 text-sm font-semibold text-gray-600">
                <a href="#home" class="hover:text-indigo-600">Home</a>
                <a href="#about" class="hover:text-indigo-600">About</a>
                <a href="#projects" class="hover:text-indigo-600">Projects</a>
                <a href="#contact" class="hover:text-indigo-600">Contact</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="bg-indigo-50 py-20">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-indigo-700 mb-4">Hi, I'm Agung</h2>
            <p class="text-lg text-gray-600 mb-6">Full-Stack Developer | IT Enthusiast</p>
            <a href="#projects" class="px-6 py-3 bg-indigo-600 text-white rounded-full shadow hover:bg-indigo-700 transition">View My Work</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-semibold text-gray-800 mb-4">About Me</h3>
            <p class="text-gray-600 text-md leading-relaxed">
                Saya adalah mahasiswa Sistem Informasi yang aktif dan berprestasi, tertarik pada pengembangan web dan sistem informasi. Pernah aktif dalam banyak kegiatan kampus dan pengembangan proyek desa digital.
            </p>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="bg-gray-50 py-20">
        <div class="max-w-6xl mx-auto px-6">
            <h3 class="text-3xl font-semibold text-center text-gray-800 mb-10">My Projects</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($projects as $project)
                <div class="bg-white shadow-md rounded-xl overflow-hidden">
                    <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h4 class="text-xl font-bold mb-2">{{ $project->title }}</h4>
                        <p class="text-gray-600 text-sm">{{ $project->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20">
        <div class="max-w-2xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-semibold text-gray-800 mb-4">Get in Touch</h3>
            <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="name" placeholder="Name" class="w-full px-4 py-2 border rounded" required>
                <input type="email" name="email" placeholder="Email" class="w-full px-4 py-2 border rounded" required>
                <textarea name="message" rows="4" placeholder="Your Message" class="w-full px-4 py-2 border rounded" required></textarea>
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Send Message</button>
            </form>
        </div>
    </section>

    <footer class="bg-indigo-600 text-white text-center py-6 mt-12">
        <p>&copy; 2025 Agung Rizki. All rights reserved.</p>
    </footer>
</body>
</html>
