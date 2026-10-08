@php
    $menu = [
        ['route' => 'admin.dashboard',  'label' => 'Tableau de bord', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
        ['route' => 'admin.produits',   'label' => 'Produits',        'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
        ['route' => 'admin.categories', 'label' => 'Catégories',      'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z'],
        ['route' => 'admin.devis',      'label' => 'Devis',           'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
        ['route' => 'admin.messages',   'label' => 'Messages',        'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
    ];
@endphp

<aside :class="{
           'translate-x-0': sidebarOpen,
           '-translate-x-full': !sidebarOpen,
           'lg:translate-x-0': true,
           'w-64': !sidebarCollapsed,
           'lg:w-16': sidebarCollapsed && !sidebarOpen,
           'w-64': sidebarCollapsed && sidebarOpen
       }"
       class="fixed lg:static inset-y-0 left-0 z-40
              bg-white border-r border-gray-200 text-gray-700
              transition-all duration-300 ease-in-out
              flex flex-col flex-shrink-0 h-full">

    {{-- ============ EN-TÊTE ============ --}}
    <div class="h-14 flex items-center justify-between px-3 border-b border-gray-200 flex-shrink-0">

        {{-- Logo + nom --}}
        <a href="{{ route('admin.dashboard') }}"
           x-show="!sidebarCollapsed"
           x-transition:enter="transition-opacity duration-200"
           x-transition:enter-start="opacity-0"
           x-transition:enter-end="opacity-100"
           class="flex items-center gap-2 min-w-0">
            <div class="bg-gradient-to-br from-brand-500 to-brand-700 text-white font-bold rounded-lg w-8 h-8 flex items-center justify-center flex-shrink-0 text-xs">
                MF
            </div>
            <div class="min-w-0">
                <div class="font-semibold text-gray-900 text-sm truncate">Mada Fournitures</div>
                <div class="text-[10px] text-gray-500 uppercase tracking-wider">Admin</div>
            </div>
        </a>

        {{-- Logo seul --}}
        <a href="{{ route('admin.dashboard') }}"
           x-show="sidebarCollapsed"
           class="mx-auto">
            <div class="bg-gradient-to-br from-brand-500 to-brand-700 text-white font-bold rounded-lg w-8 h-8 flex items-center justify-center text-xs">
                MF
            </div>
        </a>

        {{-- Toggle desktop --}}
        <button @click="toggleSidebar()"
                x-show="!sidebarCollapsed"
                class="hidden lg:flex p-1.5 rounded-lg text-gray-400 hover:bg-gray-100 hover:text-brand-600 transition flex-shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"/>
            </svg>
        </button>
    </div>

    {{-- Toggle réduit --}}
    <button @click="toggleSidebar()"
            x-show="sidebarCollapsed"
            class="hidden lg:flex mx-auto my-2 p-1.5 rounded-lg text-gray-400 hover:bg-gray-100 hover:text-brand-600 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"/>
        </svg>
    </button>

    {{-- ============ NAVIGATION ============ --}}
    <nav class="flex-1 min-h-0 overflow-y-auto px-3 pb-3 space-y-1">

        <div x-show="!sidebarCollapsed"
             class="px-2 py-2 text-[10px] font-semibold text-gray-400 uppercase tracking-wider">
            Gestion
        </div>

        @foreach($menu as $item)
            @php $isActive = request()->routeIs($item['route']); @endphp
            <a href="{{ route($item['route']) }}"
               :class="sidebarCollapsed ? 'justify-center px-0' : 'justify-start px-3'"
               class="group relative flex items-center gap-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-200
                      {{ $isActive
                          ? 'bg-brand-50 text-brand-700'
                          : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"
               title="{{ $item['label'] }}">

                <svg class="w-5 h-5 flex-shrink-0 {{ $isActive ? 'text-brand-600' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                </svg>

                <span x-show="!sidebarCollapsed" x-transition class="truncate">
                    {{ $item['label'] }}
                </span>

                @if($isActive)
                    <span class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-6 bg-brand-500 rounded-r"></span>
                @endif

                {{-- Tooltip quand réduit --}}
                <div x-show="sidebarCollapsed"
                     class="absolute left-full ml-2 px-2 py-1 bg-gray-900 text-white text-xs rounded
                            opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity whitespace-nowrap z-50">
                    {{ $item['label'] }}
                </div>
            </a>
        @endforeach

        <div class="border-t border-gray-200 my-2"></div>

        <a href="{{ route('home') }}" target="_blank"
           :class="sidebarCollapsed ? 'justify-center px-0' : 'justify-start px-3'"
           class="group relative flex items-center gap-3 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-colors"
           title="Voir le site">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
            </svg>
            <span x-show="!sidebarCollapsed" x-transition class="truncate">Voir le site</span>

            <div x-show="sidebarCollapsed"
                 class="absolute left-full ml-2 px-2 py-1 bg-gray-900 text-white text-xs rounded
                        opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity whitespace-nowrap z-50">
                Voir le site
            </div>
        </a>
    </nav>

    {{-- ============ BLOC UTILISATEUR ============ --}}
    <div class="border-t border-gray-200 p-3 flex-shrink-0" x-data="{ userOpen: false }">
        <div class="relative">
            <button @click="userOpen = !userOpen"
                    :class="sidebarCollapsed ? 'justify-center px-0' : 'justify-start px-2'"
                    class="flex items-center gap-2.5 w-full py-2 rounded-lg hover:bg-gray-100 transition-colors">
                <div class="w-8 h-8 bg-gradient-to-br from-brand-500 to-brand-700 text-white rounded-full flex items-center justify-center font-bold text-xs flex-shrink-0">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div x-show="!sidebarCollapsed" x-transition class="min-w-0 flex-1 text-left">
                    <div class="text-sm font-medium text-gray-900 truncate">{{ auth()->user()->name }}</div>
                    <div class="text-[10px] text-gray-500 truncate">Administrateur</div>
                </div>
                <svg x-show="!sidebarCollapsed" x-transition class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <div x-show="userOpen"
                 @click.away="userOpen = false"
                 x-transition
                 class="absolute bottom-full left-0 mb-2 w-full bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-50">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full text-left px-3 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>