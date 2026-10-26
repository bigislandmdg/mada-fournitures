<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center px-4 py-8 bg-gray-50">

        <div class="w-full max-w-[440px]">

            {{-- Card blanche --}}
            <div class="bg-white border border-gray-300 rounded-md shadow-sm px-10 py-10">

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

                {{-- Titre --}}
                <h1 class="text-2xl font-semibold text-gray-900 mb-1">Mot de passe oublié</h1>
                <p class="text-sm text-gray-600 mb-6">
                    Saisissez votre email pour recevoir un lien de réinitialisation
                </p>

                <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900 mb-1.5">
                            Adresse email
                        </label>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               autocomplete="username"
                               placeholder="nom@exemple.com"
                               class="w-full px-2 py-2 border border-gray-400
                                border-b-gray-900 focus:border-b-2 focus:border-[#0067b8] 
                                focus:outline-none text-sm text-gray-900 rounded-md bg-white">
                        @error('email')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Bouton --}}
                    <div class="pt-4">
                        <button type="submit"
                                class="w-full bg-[#0067b8] hover:bg-[#005da6] text-white
                                 font-semibold py-2 px-4 text-sm rounded-md transition-colors">
                            Envoyer le lien
                        </button>
                    </div>
                </form>

                {{-- Section alternative (liens alignés 2 à 2) --}}
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="grid grid-cols-2 gap-2">
                        <a href="{{ route('home') }}"
                           class="text-sm text-[#0067b8] hover:underline text-left">
                            Retour au site
                        </a>

                        @if (Route::has('login'))
                            <a href="{{ route('login') }}"
                               class="text-sm text-[#0067b8] hover:underline text-right">
                                Se connecter
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
</x-guest-layout>
