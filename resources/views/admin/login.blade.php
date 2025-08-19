<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 px-4">

    <div class="w-full max-w-md bg-white/30 backdrop-blur-lg shadow-2xl rounded-2xl p-8">
        <!-- Header -->
        <div class="flex flex-col items-center">
            <div class="bg-white p-3 rounded-full shadow-md">
                <svg class="h-10 w-10 text-indigo-600" fill="currentColor" viewBox="0 0 512 512">
                    <path d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z"/>
                </svg>
            </div>
            <h2 class="mt-4 text-2xl font-bold text-white drop-shadow">Welcome Back</h2>
            <p class="text-sm text-gray-100">Sign in to your dashboard</p>
        </div>

        <!-- Form -->
        <form action="/" method="POST" class="mt-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-white">Email</label>
                <input type="email" placeholder="Enter your email"
                    class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-white">Password</label>
                <input type="password" placeholder="Enter your password"
                    class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
            </div>

            <!-- Remember me & Forgot password -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center text-white">
                    <input type="checkbox" class="form-checkbox text-indigo-600 rounded">
                    <span class="ml-2">Remember me</span>
                </label>
                <a href="#" class="text-indigo-200 hover:text-white">Forgot password?</a>
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 rounded-lg text-white font-semibold shadow-lg transition">
                Sign In
            </button>
        </form>

        <!-- Register link -->
        <p class="mt-6 text-center text-sm text-white">
            Don’t have an account?
            <a href="#" class="text-indigo-200 hover:text-white font-semibold">Sign up</a>
        </p>
    </div>

</body>
</html>
