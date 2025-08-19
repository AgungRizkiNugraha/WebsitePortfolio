@extends('layout')

@section('title', 'Home')

@section('content')
<section id="home" class="relative py-32 md:py-48 flex flex-col items-center text-center bg-pattern">

    <!-- Nama -->
    <h1 id="typewriter" class="text-3xl sm:text-5xl md:text-7xl font-extrabold text-gray-900 mb-6 leading-tight">HEY, I'M AGUNG RIZKI NUGRAHA</h1>

    <!-- Deskripsi -->
    <p class="text-base sm:text-lg md:text-xl text-gray-600 max-w-3xl leading-relaxed mb-10 px-2">
        A Result-Oriented Web Developer building and managing Websites and <br>
        Web Applications that lead to the success of the overall product
    </p>

    <!-- Tombol -->
    <a id="nav-projects" href="{{ route('home') }}#projects"
       class="px-6 py-3 sm:px-10 sm:py-4 bg-purple-600 text-white font-bold rounded-lg shadow hover:bg-purple-700 transition text-base sm:text-lg">
        PROJECTS
    </a>

</section>
<script>
// Modern looping typewriter effect for Nama
document.addEventListener('DOMContentLoaded', function() {
    const el = document.getElementById('typewriter');
    if(!el) return;
    const text = "HEY, I'M AGUNG RIZKI NUGRAHA";
    let i = 0;
    let isDeleting = false;
    function typeLoop() {
        if (!isDeleting) {
            el.textContent = text.substring(0, i+1);
            i++;
            if (i < text.length) {
                setTimeout(typeLoop, 60);
            } else {
                setTimeout(() => { isDeleting = true; typeLoop(); }, 1200);
            }
        } else {
            el.textContent = text.substring(0, i-1);
            i--;
            if (i > 0) {
                setTimeout(typeLoop, 30);
            } else {
                isDeleting = false;
                setTimeout(typeLoop, 500);
            }
        }
    }
    typeLoop();
});
</script>
</section>
<style>
   .bg-pattern {
    background: url('paternn.png');
    background-size: 40px 40px;
}

</style>


<!-- About Section -->
<section id="about" class="py-12 md:py-20 bg-white border-t">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <!-- Judul -->
    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-8 md:mb-12 text-center">About Me</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-10 items-start">
      <!-- Kolom Deskripsi -->
      <div>
    <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4">Get to know me!</h3>
        <p class="text-gray-600 leading-relaxed mb-4">
          I'm a Frontend Focused Web Developer building and managing the front-end of websites and web applications that lead to the success of the overall product. Check out some of my work in the Projects section.
        </p>
        <p class="text-gray-600 leading-relaxed mb-4">
          I also like sharing content related to what I have learned over the years in Web Development to help other people in the Dev Community. Feel free to
          <a href="https://linkedin.com/in/yourprofile" target="_blank" class="text-indigo-600 font-medium hover:underline">connect</a> or
          <a href="https://instagram.com/yourprofile" target="_blank" class="text-indigo-600 font-medium hover:underline">follow me on Instagram</a> where I post useful content related to Web Development and Programming.
        </p>
        <p class="text-gray-600 leading-relaxed mb-6">
          I'm open to job opportunities where I can contribute, learn and grow. If you have a good opportunity that matches my skills and experience, don't hesitate to
        <a id="nav-contact" href="{{ route('home') }}#contact" class="text-indigo-600 font-medium hover:underline">contact me</a>.
        </p>
    <a id="nav-contact" href="{{ route('home') }}#contact" class="inline-block px-4 py-2 sm:px-6 sm:py-3 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition text-base sm:text-lg">
          Contact
        </a>
      </div>

      <!-- Kolom Skills -->
            <div>
                <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4">My Skills</h3>
                <div class="flex flex-wrap gap-2 sm:gap-3">
          @php
            $skills = ['HTML','CSS','JavaScript','React','WordPress','PHP','SASS','GIT','GitHub','Responsive Design','SEO','Terminal'];
          @endphp
          @foreach($skills as $skill)
            <span class="px-3 py-1 sm:px-4 sm:py-2 bg-gray-100 border border-gray-300 rounded-full text-xs sm:text-sm text-gray-700 shadow-sm hover:bg-indigo-50 transition">
              {{ $skill }}
            </span>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>


<section id="projects" class="py-12 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 text-center mb-8 md:mb-12">Projects</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach($projects->take(3) as $project)
                <div class="group relative overflow-hidden rounded-lg shadow-lg">
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                    class="w-full h-48 sm:h-64 object-cover transform group-hover:scale-110 transition duration-500">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                    <div class="absolute bottom-0 left-0 right-0 p-3 sm:p-6 text-white opacity-0 group-hover:opacity-100 transition duration-500 text-xs sm:text-base">
                        <h3 class="text-base sm:text-xl font-semibold">{{ $project->title }}</h3>
                        <p class="text-xs sm:text-sm mb-2 sm:mb-4">{{ Str::limit($project->description, 60) }}</p>
                        <button
                            onclick="openModal({{ $project->id }})"
                            class="px-3 py-1 sm:px-4 sm:py-2 bg-indigo-600 hover:bg-indigo-700 rounded-md text-xs sm:text-sm font-medium">
                            Read More
                        </button>
                    </div>
                </div>

                <!-- Modal -->
                <div id="modal-{{ $project->id }}" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-2 sm:p-4">
                    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg sm:max-w-2xl relative max-h-[90vh] overflow-y-auto">
                        <!-- Close Button -->
                        <button onclick="closeModal({{ $project->id }})"
                                class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl font-bold">
                            ✖
                        </button>



                        <div class="p-3 sm:p-6">
                            <h3 class="text-lg sm:text-2xl font-semibold mb-2 sm:mb-4">{{ $project->title }}</h3>
                               <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                             class="w-full h-40 sm:h-64 object-cover rounded-t-lg">
                            <p class="text-gray-700 whitespace-pre-line leading-relaxed text-xs sm:text-base">
                                {{ $project->description }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
       <div class="pagination">
    {{ $projects->links() }}
</div>

    </div>
</section>



<!-- Modal -->
<div id="projectModal" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg max-w-2xl w-full p-6 relative overflow-y-auto max-h-[80vh]">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 hover:text-black text-2xl">&times;</button>
        <h2 id="modalTitle" class="text-2xl font-bold mb-4"></h2>
        <p id="modalDescription" class="text-gray-700 whitespace-pre-line"></p>
    </div>
</div>

</section>

<section id="contact" class="py-12 md:py-20 bg-gray-50 bg-pattern">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">

        <!-- Kiri - Info -->
        <div>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Let’s Work Together</h2>
            <p class="text-gray-600 leading-relaxed mb-8">
                Feel free to reach out if you’re looking for a developer, have a question, or just want to connect.
            </p>
            <div class="space-y-4">
                <p class="flex items-center text-gray-700">
                    📍 <span class="ml-3">Majalengka, Indonesia</span>
                </p>
                <p class="flex items-center text-gray-700">
                    ✉️ <a href="mailto:admin@sidesamancagar.id" class="ml-3 hover:underline">agungrizki640@gmail.com</a>
                </p>
            </div>
        </div>

        <!-- Kanan - Form -->
        <div class="bg-white contact-card p-8">
           <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
    @csrf
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
        <input type="text" id="name" name="name"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
               required>
    </div>
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
               required>
    </div>
    <div>
        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
        <textarea id="message" name="message" rows="4"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                  required></textarea>
    </div>
    <button type="submit"
            class="w-full py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition font-medium">
        Send Message
    </button>
</form>
        </div>

    </div>
</section>

<script>
    function openModal(id) {
        document.getElementById('modal-' + id).classList.remove('hidden');
        document.getElementById('modal-' + id).classList.add('flex');
    }

    function closeModal(id) {
        document.getElementById('modal-' + id).classList.add('hidden');
        document.getElementById('modal-' + id).classList.remove('flex');
    }
</script>


@endsection
