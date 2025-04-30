<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}


    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-6 space-y-6">
            <h1 class="text-2xl font-bold">Your App</h1>
            <nav class="space-y-4">
                <a href="/admin-user" class="block hover:text-yellow-300">🏠 Dashboard</a>
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


</x-app-layout>
