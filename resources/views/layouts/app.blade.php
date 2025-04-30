  <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> 

 


{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3" defer></script>
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

  
  <!-- Sidebar -->
  <aside class="w-64 bg-gray-800 text-white p-6 space-y-6">
      <h1 class="text-2xl font-bold">Your App</h1>
      <nav class="space-y-4">
          <a  class="block hover:text-yellow-300">🏠 Dashboard</a>
          <a href="/profile" class="block hover:text-yellow-300">👤 Profile</a>
          <a href="/support" class="block hover:text-yellow-300">💬 Support</a>
          <a href="/roles" class="block hover:text-yellow-300">🛡️ Roles</a>
      </nav>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-8">
      @yield('content')
  </main>

</div>

</body>
</html> --}}
