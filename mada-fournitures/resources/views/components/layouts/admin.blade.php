<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>{{ $title ?? 'Administration - Mada Fournitures' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900"
      x-data="{
          sidebarCollapsed: JSON.parse(localStorage.getItem('sidebarCollapsed') || 'false'),
          sidebarOpen: false,
          toggleSidebar() {
              if (window.innerWidth < 1024) {
                  this.sidebarOpen = !this.sidebarOpen;
              } else {
                  this.sidebarCollapsed = !this.sidebarCollapsed;
                  localStorage.setItem('sidebarCollapsed', this.sidebarCollapsed);
              }
          }
      }">

    <div class="flex h-screen overflow-hidden">

        {{-- ============ SIDEBAR ============ --}}
        <x-admin.sidebar />

        {{-- ============ OVERLAY MOBILE ============ --}}
        <div x-show="sidebarOpen"
             @click="sidebarOpen = false"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black/50 z-30 lg:hidden"></div>

        {{-- ============ ZONE DE CONTENU ============ --}}
        <main class="flex-1 min-w-0 flex flex-col overflow-hidden transition-all duration-300">

            {{-- Header mobile uniquement --}}
            <div class="lg:hidden h-14 flex items-center gap-3 px-4 bg-white border-b border-gray-200 flex-shrink-0">
                <button @click="toggleSidebar()"
                        class="p-2 rounded-lg text-gray-600 hover:bg-gray-100 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <span class="font-semibold text-gray-900 truncate">{{ $title ?? 'Administration' }}</span>
            </div>

            {{-- Contenu scrollable --}}
            <div class="flex-1 min-h-0 overflow-y-auto">
                <div class="w-full px-4 sm:px-6 lg:px-8 py-6 lg:py-8">
                    {{-- Titre desktop --}}
                    @if(isset($title))
                        <h1 class="hidden lg:block text-2xl font-bold text-gray-900 mb-6">{{ $title }}</h1>
                    @endif

                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    @livewireScripts
</body>
</html>