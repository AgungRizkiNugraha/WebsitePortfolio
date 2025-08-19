<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #020330 0%, #020330  100%); }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md mx-auto p-6 bg-white rounded-2xl shadow-2xl border border-gray-100 animate-fade-in">
        <div class="flex flex-col items-center mb-6">
            <div class="bg-indigo-100 rounded-full p-3 mb-2">
                <i class="fa fa-user-lock text-indigo-600 text-3xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 mb-1">Welcome Back</h1>
            <p class="text-gray-500 text-sm">Sign in to your dashboard</p>
        </div>
        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-green-600 text-sm text-center">{{ session('status') }}</div>
        @endif
        <form class="space-y-4" method="POST" action="{{ route('login') }}" autocomplete="off">
            @csrf
            <div>
                <label class="block text-gray-700 text-sm mb-1" for="email">Email</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"><i class="fa fa-envelope"></i></span>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="you@email.com" class="pl-10 pr-3 py-2 w-full rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition" required autofocus autocomplete="username">
                </div>
                @if ($errors->has('email'))
                    <div class="text-red-500 text-xs mt-1">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div>
                <label class="block text-gray-700 text-sm mb-1" for="password">Password</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"><i class="fa fa-lock"></i></span>
                    <input id="password" name="password" type="password" placeholder="Password" class="pl-10 pr-3 py-2 w-full rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition" required autocomplete="current-password">
                    <button type="button" id="togglePassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 focus:outline-none">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
                @if ($errors->has('password'))
                    <div class="text-red-500 text-xs mt-1">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="flex justify-between items-center text-xs">
                <label class="inline-flex items-center">
                    <input id="remember_me" name="remember" type="checkbox" class="form-checkbox text-indigo-600 rounded">
                    <span class="ml-2 text-gray-600">Remember me</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-indigo-600 hover:underline">Forgot password?</a>
                @endif
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition duration-200">Log in</button>
        </form>
    </div>
    <script>
    // Show/hide password
    document.getElementById('togglePassword').addEventListener('click', function() {
        const pwd = document.getElementById('password');
        const icon = this.querySelector('i');
        if (pwd.type === 'password') {
            pwd.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            pwd.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
    </script>
</body>
</html>
