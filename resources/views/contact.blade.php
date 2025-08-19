@extends('layout')
@section('title', 'Contact')

@section('content')
<h2 class="text-3xl font-bold mb-6">Contact Me</h2>

@if (session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<form action="" method="POST" class="max-w-xl mx-auto space-y-4">
    @csrf
    <input type="text" name="name" placeholder="Your Name" class="w-full border px-4 py-2 rounded" required>
    <input type="email" name="email" placeholder="Your Email" class="w-full border px-4 py-2 rounded" required>
    <textarea name="message" placeholder="Your Message" class="w-full border px-4 py-2 rounded" rows="5" required></textarea>
    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Send Message</button>
</form>
@endsection
