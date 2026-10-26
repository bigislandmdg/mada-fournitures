<x-guest-layout>
    <div class="min-h-screen flex rounded-xl flex-col justify-center items-center px-4 py-8 bg-gray-50"
         x-data="{ step: 'email' }">

        <div class="w-full max-w-[440px]">

            {{-- Card blanche --}}
            <div class="bg-white border border-gray-300 shadow-sm px-10 py-10 rounded-xl">

                {{-- Logo --}}
       <div class="flex justify-start mb-6">
          <a href="{{ route('home') }}" class="flex items-center gap-3">
            <div class="bg-gradient-to-br from-brand-600 to-brand-800 text-white rounded-md font-bold w-12 h-12 flex items-center justify-center text-base shadow-md">
                MF
            </div>
            <span class="text-xl font-semibold text-gray-900">Mada Fournitures</span>
          </a>
        </div>

                {{-- Message session --}}
                <x-auth-session-status class="mb-4" :status="session('status')" />

                {{-- ============ ÉTAPE 1 : EMAIL ============ --}}
                <div x-show="step === 'email'" x-transition>
                    <h1 class="text-2xl font-semibold text-gray-900 mb-1">Connexion</h1>
                    <p class="text-sm text-gray-600 mb-6">pour continuer vers votre espace</p>

                    <div class="space-y-4">
                        <div>
                            <label for="email_step" class="block text-sm font-medium text-gray-900 mb-1.5">
                                Adresse email
                            </label>
                            <input id="email_step"
                                   type="email"
                                   x-model="$store.login.email"
                                   @keydown.enter.prevent="if ($store.login.email && $store.login.email.includes('@')) step = 'password'"
                                   required
                                   autofocus
                                   rounded-xl
                                   autocomplete="username"
                                   placeholder="nom@exemple.com"
                                   class="w-full px-2 py-2 border border-gray-400 border-b-gray-900
                                    focus:border-b-2 focus:border-[#0067b8] 
                                    focus:outline-none text-sm 
                                    text-gray-900 rounded-md bg-white">
                            @error('email')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pt-4">
                            <button type="button"
                                    @click="if ($store.login.email && $store.login.email.includes('@')) step = 'password'"
                                    class="w-full bg-[#0067b8] hover:bg-[#005da6] 
                                    text-white font-semibold py-2 px-4 text-sm 
                                    rounded-md transition-colors">
                                Suivant
                            </button>
                        </div>
                    </div>
                </div>

                {{-- ============ ÉTAPE 2 : MOT DE PASSE ============ --}}
                <div x-show="step === 'password'" x-cloak x-transition>

                    {{-- Retour + email affiché --}}
                    <div class="mb-4 flex items-center gap-2 text-sm">
                        <button type="button"
                                @click="step = 'email'"
                                class="text-[#0067b8] hover:underline">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <span class="text-gray-700 truncate" x-text="$store.login.email"></span>
                    </div>

                    <h1 class="text-2xl font-semibold text-gray-900 mb-1">Mot de passe</h1>
                    <p class="text-sm text-gray-600 mb-6">Saisissez le mot de passe de votre compte</p>

                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf

                        {{-- Email caché (obligatoire pour l'authentification) --}}
                        <input type="hidden" name="email" :value="$store.login.email">

                        {{-- Mot de passe --}}
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-900 mb-1.5">
                                Mot de passe
                            </label>
                            <input id="password"
                                   type="password"
                                   name="password"
                                   required
                                   autofocus
                                   autocomplete="current-password"
                                   placeholder="Mot de passe"
                                   class="w-full px-2 py-2 border border-gray-400 border-b-gray-900 focus:border-b-2 focus:border-[#0067b8] 
                                   focus:outline-none rounded-md text-sm text-gray-900 bg-white">
                            @error('password')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                            @error('email')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Rester connecté + Mot de passe oublié (même ligne) --}}
<div class="flex items-center justify-between gap-3 pt-1">

    {{-- Rester connecté (gauche) --}}
    <label for="remember_me" class="inline-flex items-center cursor-pointer">
        <input id="remember_me"
               type="checkbox"
               name="remember"
               class="w-4 h-4 border-gray-400 text-[#0067b8] focus:ring-[#0067b8] cursor-pointer">
        <span class="ms-2 text-sm text-gray-700">Rester connecté</span>
    </label>

    {{-- Mot de passe oublié (droite) --}}
    @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}"
           class="text-sm text-[#0067b8] hover:underline whitespace-nowrap">
            Mot de passe oublié ?
        </a>
    @endif
</div>

                        {{-- Bouton --}}
                        <div class="pt-4">
                            <button type="submit"
                                    class="w-full bg-[#0067b8] hover:bg-[#005da6] text-white font-semibold py-2 px-4 rounded-md text-sm transition-colors">
                                Se connecter
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Section alternative --}}
<div class="mt-8 pt-6 border-t border-gray-200">
    <div class="grid grid-cols-2 gap-2">
        <a href="{{ route('home') }}"
           class="text-sm text-[#0067b8] hover:underline text-left">
            Retour au site
        </a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}"
               class="text-sm text-[#0067b8] hover:underline text-right">
                Créer un compte
            </a>
        @endif
    </div>
</div>
            </div>

            {{-- Footer --}}
            <div class="mt-6 flex flex-col sm:flex-row justify-between items-center gap-3 text-xs text-gray-600">
                <div class="flex items-center gap-4">
                    <a href="{{ route('mentions-legales') }}" class="hover:underline">Conditions d'utilisation</a>
                    <a href="{{ route('confidentialite') }}" class="hover:underline">Confidentialité</a>
                </div>
                <div>© {{ date('Y') }} Mada Fournitures</div>
            </div>
        </div>
    </div>

    {{-- Store Alpine pour partager l'email entre étapes --}}
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('login', {
                email: '{{ old('email', '') }}'
            });
        });

        // Si erreur de validation, rester sur l'étape mot de passe
        @if($errors->has('password') || $errors->has('email'))
            document.addEventListener('DOMContentLoaded', () => {
                const root = document.querySelector('[x-data]');
                if (root && root.__x) {
                    root.__x.$data.step = 'password';
                }
            });
        @endif
    </script>
</x-guest-layout>
