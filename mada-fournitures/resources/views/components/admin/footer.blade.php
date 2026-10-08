<footer class="border-t border-gray-200 bg-white px-4 sm:px-6 py-4">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-2 text-xs text-gray-500">
        <div>
            © {{ date('Y') }} <span class="font-semibold text-gray-700">Mada Fournitures</span> — Administration
        </div>
        <div class="flex items-center gap-3">
            <span>Version 1.0</span>
            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
            <a href="{{ route('home') }}" target="_blank" class="hover:text-brand-600 transition-colors">
                Voir le site public
            </a>
        </div>
    </div>
</footer>