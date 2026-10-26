<div>
    {{-- ============ EN-TÊTE ============ --}}
    <section class="bg-gradient-to-br from-brand-700 to-brand-900 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="text-sm text-blue-200 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white transition">Accueil</a>
                <span class="mx-2">/</span>
                <span class="text-white">Confidentialité</span>
            </nav>
            <h1 class="text-3xl md:text-5xl font-bold mb-4">Politique de confidentialité</h1>
            <p class="text-blue-100 text-lg">
                Protection de vos données personnelles
            </p>
            <p class="text-blue-200 text-sm mt-2">
                Dernière mise à jour : {{ now()->format('d/m/Y') }}
            </p>
        </div>
    </section>

    {{-- ============ CONTENU ============ --}}
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="prose prose-lg max-w-none">

            {{-- Introduction --}}
            <div class="bg-brand-50 border-l-4 border-brand-500 p-6 rounded-r-xl mb-10">
                <p class="text-brand-900 text-sm leading-relaxed">
                    <strong>Mada Fournitures</strong> accorde une grande importance à la protection de votre vie privée.
                    Cette politique de confidentialité explique quelles données nous collectons, comment nous les utilisons
                    et quels sont vos droits.
                </p>
            </div>

            {{-- 1. Données collectées --}}
            <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm font-bold">1</span>
                    Données personnelles collectées
                </h2>
                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-4 text-gray-700">
                    <p>Nous collectons les données suivantes lorsque vous utilisez nos services :</p>
                    <ul class="list-disc pl-6 space-y-2">
                        <li><strong>Formulaire de contact :</strong> nom, email, téléphone, sujet, message</li>
                        <li><strong>Demande de devis :</strong> nom, société, email, téléphone, adresse, message, produits sélectionnés</li>
                        <li><strong>Navigation :</strong> adresse IP, type de navigateur, pages visitées (via cookies analytiques, si acceptés)</li>
                    </ul>
                </div>
            </section>

            {{-- 2. Finalité du traitement --}}
            <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm font-bold">2</span>
                    Finalités du traitement
                </h2>
                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-4 text-gray-700">
                    <p>Vos données sont utilisées pour :</p>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>Répondre à vos demandes de contact et de devis</li>
                        <li>Vous envoyer des informations commerciales (uniquement avec votre consentement)</li>
                        <li>Améliorer nos services et notre site web</li>
                        <li>Respecter nos obligations légales et comptables</li>
                    </ul>
                </div>
            </section>

            {{-- 3. Base légale --}}
            <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm font-bold">3</span>
                    Base légale du traitement
                </h2>
                <div class="bg-white rounded-xl border border-gray-100 p-6 text-gray-700">
                    <p>
                        Le traitement de vos données est fondé sur :
                    </p>
                    <ul class="list-disc pl-6 mt-3 space-y-2">
                        <li><strong>Votre consentement</strong> (formulaires de contact et devis)</li>
                        <li><strong>L'exécution d'un contrat</strong> (traitement des commandes)</li>
                        <li><strong>Notre intérêt légitime</strong> (amélioration des services)</li>
                        <li><strong>Obligations légales</strong> (facturation, comptabilité)</li>
                    </ul>
                </div>
            </section>

            {{-- 4. Durée de conservation --}}
            <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm font-bold">4</span>
                    Durée de conservation
                </h2>
                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-2 text-gray-700">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div class="bg-gray-50 rounded-lg p-3">
                            <div class="text-xs text-gray-500 uppercase mb-1">Devis</div>
                            <div class="font-semibold">3 ans</div>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3">
                            <div class="text-xs text-gray-500 uppercase mb-1">Messages de contact</div>
                            <div class="font-semibold">2 ans</div>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3">
                            <div class="text-xs text-gray-500 uppercase mb-1">Documents comptables</div>
                            <div class="font-semibold">10 ans</div>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3">
                            <div class="text-xs text-gray-500 uppercase mb-1">Cookies analytiques</div>
                            <div class="font-semibold">13 mois maximum</div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- 5. Partage des données --}}
            <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm font-bold">5</span>
                    Partage des données
                </h2>
                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-4 text-gray-700">
                    <p>
                        Vos données personnelles ne sont <strong>jamais vendues</strong> à des tiers.
                    </p>
                    <p>Elles peuvent être partagées avec :</p>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>Notre hébergeur web (pour le stockage)</li>
                        <li>Notre service d'envoi d'emails</li>
                        <li>Les autorités compétentes (si la loi l'exige)</li>
                    </ul>
                </div>
            </section>

            {{-- 6. Vos droits --}}
            <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm font-bold">6</span>
                    Vos droits
                </h2>
                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-4 text-gray-700">
                    <p>Conformément à la loi malgache sur la protection des données, vous disposez des droits suivants :</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-3">
                        <div class="bg-gray-50 rounded-lg p-3 flex items-start gap-2">
                            <svg class="w-5 h-5 text-brand-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <div>
                                <div class="font-semibold text-sm">Droit d'accès</div>
                                <div class="text-xs text-gray-600">Consulter vos données</div>
                            </div>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3 flex items-start gap-2">
                            <svg class="w-5 h-5 text-brand-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            <div>
                                <div class="font-semibold text-sm">Droit de rectification</div>
                                <div class="text-xs text-gray-600">Corriger vos données</div>
                            </div>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3 flex items-start gap-2">
                            <svg class="w-5 h-5 text-brand-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3"/>
                            </svg>
                            <div>
                                <div class="font-semibold text-sm">Droit à l'effacement</div>
                                <div class="text-xs text-gray-600">Supprimer vos données</div>
                            </div>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3 flex items-start gap-2">
                            <svg class="w-5 h-5 text-brand-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                            </svg>
                            <div>
                                <div class="font-semibold text-sm">Droit d'opposition</div>
                                <div class="text-xs text-gray-600">Refuser le traitement</div>
                            </div>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3 flex items-start gap-2">
                            <svg class="w-5 h-5 text-brand-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                            </svg>
                            <div>
                                <div class="font-semibold text-sm">Droit à la portabilité</div>
                                <div class="text-xs text-gray-600">Récupérer vos données</div>
                            </div>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3 flex items-start gap-2">
                            <svg class="w-5 h-5 text-brand-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            <div>
                                <div class="font-semibold text-sm">Droit de limitation</div>
                                <div class="text-xs text-gray-600">Limiter le traitement</div>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-sm">
                        Pour exercer ces droits, contactez-nous à
                        <a href="mailto:contact@madafournitures.mg" class="text-brand-600 hover:underline font-medium">contact@madafournitures.mg</a>.
                        Une réponse vous sera apportée sous 30 jours.
                    </p>
                </div>
            </section>

            {{-- 7. Cookies --}}
            <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm font-bold">7</span>
                    Cookies
                </h2>
                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-4 text-gray-700">
                    <p>Notre site utilise des cookies pour :</p>
                    <ul class="list-disc pl-6 space-y-2">
                        <li><strong>Cookies essentiels :</strong> session, sécurité, préférences (obligatoires)</li>
                        <li><strong>Cookies analytiques :</strong> statistiques de visite (avec consentement)</li>
                    </ul>
                    <p class="text-sm text-gray-600 mt-3">
                        Vous pouvez à tout moment configurer votre navigateur pour refuser les cookies.
                        Attention : certains cookies essentiels ne peuvent pas être désactivés sans affecter
                        le fonctionnement du site.
                    </p>
                </div>
            </section>

            {{-- 8. Sécurité --}}
            <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm font-bold">8</span>
                    Sécurité des données
                </h2>
                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-4 text-gray-700">
                    <p>
                        Nous mettons en œuvre des mesures techniques et organisationnelles appropriées
                        pour protéger vos données contre tout accès non autorisé, modification,
                        divulgation ou destruction :
                    </p>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>Connexion HTTPS sécurisée (certificat SSL)</li>
                        <li>Mots de passe chiffrés</li>
                        <li>Accès restreint aux données personnelles</li>
                        <li>Sauvegardes régulières</li>
                    </ul>
                </div>
            </section>

            {{-- 9. Modifications --}}
            <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm font-bold">9</span>
                    Modifications de la politique
                </h2>
                <div class="bg-white rounded-xl border border-gray-100 p-6 text-gray-700">
                    <p>
                        Nous nous réservons le droit de modifier cette politique de confidentialité à tout moment.
                        La date de dernière mise à jour est indiquée en haut de cette page.
                        Nous vous invitons à la consulter régulièrement.
                    </p>
                </div>
            </section>

            {{-- Contact --}}
            <section class="bg-brand-50 border border-brand-100 rounded-xl p-6 mt-12">
                <h3 class="text-lg font-bold text-brand-900 mb-2">Contact - Délégué à la protection des données</h3>
                <p class="text-brand-800 text-sm">
                    Pour toute question relative à vos données personnelles, contactez-nous :
                </p>
                <ul class="mt-3 space-y-1 text-sm text-brand-800">
                    <li>📧 <a href="mailto:contact@madafournitures.mg" class="font-semibold underline">contact@madafournitures.mg</a></li>
                    <li>📞 <a href="tel:+261340000000" class="font-semibold underline">+261 34 00 000 00</a></li>
                    <li>📍 Antananarivo, Madagascar</li>
                </ul>
            </section>
        </div>
    </div>
</div>