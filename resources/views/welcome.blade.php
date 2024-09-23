<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <!-- Incluye el enlace a Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div class="min-h-screen flex flex-col items-center justify-center">

    <img src="{{ asset('images/logo_community_links.png') }}" alt="Logo"
    class="w-16 h-auto sm:w-24 md:w-32 lg:w-40 mr-4">

        <!-- Main Content Section -->
        <main class="flex flex-col items-center justify-center text-center space-y-6">
            <h2 class="text-4xl font-bold">Welcome to My App</h2>
            <p class="text-lg text-gray-600 dark:text-gray-300">Join us today and explore awesome features!</p>

            @if (Route::has('register') && !Auth::check())
                <div class="space-x-4">
                    <a href="{{ route('register') }}"
                        class="rounded-md px-6 py-3 text-white bg-[#FF2D20] hover:bg-[#e1261b] transition focus:outline-none focus-visible:ring-2 focus-visible:ring-[#FF2D20] dark:bg-[#FF2D20] dark:hover:bg-[#e1261b]">
                        Register
                    </a>

                    <a href="{{ route('login') }}"
                        class="rounded-md px-6 py-3 text-white bg-gray-800 hover:bg-gray-700 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-700 dark:bg-gray-700 dark:hover:bg-gray-600">
                        Log in
                    </a>
                </div>
            @endif
        </main>
    </div>
</body>

</html>