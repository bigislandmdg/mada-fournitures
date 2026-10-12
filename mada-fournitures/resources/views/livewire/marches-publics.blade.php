<div class="bg-gray-50">
    {{-- =========================================================
         HERO — MARCHÉS PUBLICS
    ========================================================== --}}
    <section class="relative isolate overflow-hidden bg-gradient-to-br from-brand-900 via-brand-800 to-brand-700 text-white">
        {{-- Décoration d'arrière-plan --}}
        <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute -top-24 -right-20 h-80 w-80 rounded-full bg-white/5 blur-3xl"></div>
            <div class="absolute -bottom-32 -left-20 h-80 w-80 rounded-full bg-brand-500/20 blur-3xl"></div>
            <div class="absolute inset-0 opacity-[0.06]"
                 style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 24px 24px;">
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 py-20 text-center sm:px-6 sm:py-24 lg:px-8 lg:py-28">
            <div class="mx-auto mb-6 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm font-medium text-white/90 shadow-sm backdrop-blur-sm">
                <svg class="h-4 w-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 3c-2.755 0-5.294.93-7.313 2.492A12.06 12.06 0 003 12c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.573-.302-3.076-.849-4.454z"/>
                </svg>
                <span>Solutions pour les organismes publics</span>
            </div>

            <h1 class="mx-auto max-w-4xl text-3xl font-bold tracking-tight sm:text-4xl md:text-5xl lg:text-6xl">
                Marchés publics
                <span class="mt-2 block text-emerald-200">Un partenaire fiable pour vos achats</span>
            </h1>

            <p class="mx-auto mt-6 max-w-2xl text-base leading-8 text-blue-100 sm:text-lg">
                Mada Fournitures vous accompagne dans vos besoins en fournitures professionnelles,
                de la préparation de votre demande jusqu'au suivi de vos commandes.
            </p>

            <div class="mt-9 flex flex-col items-center justify-center gap-3 sm:flex-row">
                <a href="{{ route('contact') }}"
                   class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-white px-6 py-3.5 text-sm font-semibold text-brand-800 shadow-lg shadow-black/10 transition duration-200 hover:-translate-y-0.5 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-brand-800 sm:w-auto">
                    Demander une soumission
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H3"/>
                    </svg>
                </a>

                <a href="#documents"
                   class="inline-flex w-full items-center justify-center rounded-xl border border-white/25 bg-white/5 px-6 py-3.5 text-sm font-semibold text-white transition duration-200 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white sm:w-auto">
                    Découvrir nos services
                </a>
            </div>

            <div class="mt-12 flex flex-wrap items-center justify-center gap-x-8 gap-y-3 text-sm text-blue-100/90">
                <span class="inline-flex items-center gap-2">
                    <svg class="h-4 w-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Approvisionnement professionnel
                </span>
                <span class="inline-flex items-center gap-2">
                    <svg class="h-4 w-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Suivi des commandes
                </span>
                <span class="inline-flex items-center gap-2">
                    <svg class="h-4 w-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Accompagnement personnalisé
                </span>
            </div>
        </div>
    </section>

    {{-- =========================================================
         CONTENU PRINCIPAL
    ========================================================== --}}
    <section class="py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Introduction --}}
            <div class="mx-auto mb-12 max-w-3xl text-center sm:mb-16">
                <span class="text-sm font-bold uppercase tracking-[0.18em] text-brand-700">
                    Notre accompagnement
                </span>

                <h2 class="mt-3 text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl lg:text-4xl">
                    Des solutions adaptées à vos exigences
                </h2>

                <p class="mt-4 text-base leading-7 text-gray-600 sm:text-lg">
                    Nous accordons une attention particulière à la clarté des offres,
                    à la préparation des documents et au suivi de vos besoins en fournitures.
                </p>
            </div>

            {{-- Cartes --}}
            <div id="documents" class="grid grid-cols-1 gap-6 lg:grid-cols-2 lg:gap-8">

                {{-- Documents fournis --}}
                <article class="group rounded-2xl border border-gray-200/80 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-xl hover:shadow-gray-200/60 sm:p-8 lg:p-10">
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-700 transition duration-300 group-hover:bg-brand-700 group-hover:text-white">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5l5 5v11a2 2 0 01-2 2z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v5h5"/>
                            </svg>
                        </div>

                        <div>
                            <h2 class="text-xl font-bold tracking-tight text-gray-900 sm:text-2xl">
                                Documents fournis
                            </h2>
                            <p class="mt-2 text-sm leading-6 text-gray-500">
                                Les pièces commerciales nécessaires au traitement de vos demandes,
                                selon les exigences applicables.
                            </p>
                        </div>
                    </div>

                    <ul class="mt-8 space-y-4">
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <div>
                                <p class="font-semibold text-gray-800">Facture conforme</p>
                                <p class="mt-1 text-sm leading-6 text-gray-500">
                                    Une facturation adaptée aux exigences convenues.
                                </p>
                            </div>
                        </li>

                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <div>
                                <p class="font-semibold text-gray-800">Devis proforma</p>
                                <p class="mt-1 text-sm leading-6 text-gray-500">
                                    Le détail des articles, quantités et prix proposés.
                                </p>
                            </div>
                        </li>

                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <div>
                                <p class="font-semibold text-gray-800">Bordereau de livraison</p>
                                <p class="mt-1 text-sm leading-6 text-gray-500">
                                    Un document pour faciliter le suivi des articles livrés.
                                </p>
                            </div>
                        </li>

                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <div>
                                <p class="font-semibold text-gray-800">Attestation de conformité</p>
                                <p class="mt-1 text-sm leading-6 text-gray-500">
                                    Selon la nature de la commande et les justificatifs requis.
                                </p>
                            </div>
                        </li>
                    </ul>
                </article>

                {{-- Notre expertise --}}
                <article class="group rounded-2xl border border-gray-200/80 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-xl hover:shadow-gray-200/60 sm:p-8 lg:p-10">
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-700 transition duration-300 group-hover:bg-brand-700 group-hover:text-white">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M12 8c-2.21 0-4 1.12-4 2.5S9.79 13 12 13s4 1.12 4 2.5S14.21 18 12 18m0-10V6m0 2v10m0 0v2m9-8a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>

                        <div>
                            <h2 class="text-xl font-bold tracking-tight text-gray-900 sm:text-2xl">
                                Notre expertise
                            </h2>
                            <p class="mt-2 text-sm leading-6 text-gray-500">
                                Un accompagnement commercial organisé, de la demande initiale
                                au suivi de la commande.
                            </p>
                        </div>
                    </div>

                    <p class="mt-8 text-base leading-8 text-gray-600">
                        Nous vous accompagnons dans la préparation de vos besoins en fournitures,
                        l'élaboration des propositions commerciales, la coordination des livraisons
                        et le suivi administratif associé à vos commandes.
                    </p>

                    <div class="mt-8 space-y-4">
                        <div class="flex items-center gap-3 rounded-xl bg-gray-50 p-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-white text-brand-700 shadow-sm">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5-2a9 9 0 11-16 0 9 9 0 0116 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Étude de vos besoins</p>
                                <p class="mt-1 text-sm text-gray-500">Analyse des articles et quantités demandés.</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 rounded-xl bg-gray-50 p-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-white text-brand-700 shadow-sm">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7h8m-8 4h8m-8 4h5m-8 5h14a2 2 0 002-2V7l-5-5H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Proposition commerciale</p>
                                <p class="mt-1 text-sm text-gray-500">Présentation claire des prix et conditions proposés.</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 rounded-xl bg-gray-50 p-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-white text-brand-700 shadow-sm">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 7h11v10H3zM14 10h4l3 3v4h-7zM7 20a2 2 0 100-4 2 2 0 000 4zm11 0a2 2 0 100-4 2 2 0 000 4z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Suivi des livraisons</p>
                                <p class="mt-1 text-sm text-gray-500">Coordination selon les modalités convenues.</p>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            {{-- =====================================================
                 ENGAGEMENTS
            ====================================================== --}}
            <div class="mt-16 grid grid-cols-1 gap-5 sm:grid-cols-3 lg:mt-20">
                <div class="rounded-2xl border border-gray-200/80 bg-white p-6 text-center shadow-sm">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-brand-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3l7 4v5c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V7l7-4z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 font-bold text-gray-900">Fiabilité</h3>
                    <p class="mt-2 text-sm leading-6 text-gray-600">
                        Des propositions claires et un suivi structuré de vos demandes.
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200/80 bg-white p-6 text-center shadow-sm">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-brand-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.2-2M17 20H7m10 0v-2c0-.7-.15-1.37-.42-1.97M7 20H2v-2a3 3 0 015.2-2M7 20v-2c0-.7.15-1.37.42-1.97m0 0a5 5 0 019.16 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 font-bold text-gray-900">Proximité</h3>
                    <p class="mt-2 text-sm leading-6 text-gray-600">
                        Une écoute attentive pour comprendre vos contraintes et priorités.
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200/80 bg-white p-6 text-center shadow-sm">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-brand-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 font-bold text-gray-900">Réactivité</h3>
                    <p class="mt-2 text-sm leading-6 text-gray-600">
                        Une prise en charge attentive de vos demandes de renseignements et de devis.
                    </p>
                </div>
            </div>

            {{-- =====================================================
                 CTA FINAL
            ====================================================== --}}
            <div class="relative isolate mt-16 overflow-hidden rounded-3xl bg-gradient-to-br from-brand-800 via-brand-700 to-brand-900 px-6 py-12 text-center shadow-xl shadow-brand-900/10 sm:px-10 sm:py-16 lg:mt-20 lg:px-16">
                <div class="pointer-events-none absolute -right-20 -top-24 -z-10 h-64 w-64 rounded-full bg-white/10 blur-3xl"></div>
                <div class="pointer-events-none absolute -bottom-24 -left-16 -z-10 h-64 w-64 rounded-full bg-emerald-400/10 blur-3xl"></div>

                <div class="mx-auto max-w-3xl">
                    <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-wider text-emerald-100">
                        Parlons de votre projet
                    </span>

                    <h2 class="mt-5 text-2xl font-bold tracking-tight text-white sm:text-3xl lg:text-4xl">
                        Un appel d'offres ou un besoin en fournitures ?
                    </h2>

                    <p class="mx-auto mt-4 max-w-2xl text-base leading-7 text-blue-100 sm:text-lg">
                        Présentez-nous votre demande. Notre équipe pourra étudier vos besoins
                        et vous orienter vers une proposition adaptée.
                    </p>

                    <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
                        <a href="{{ route('contact') }}"
                           class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-white px-7 py-3.5 text-sm font-bold text-brand-800 shadow-lg transition duration-200 hover:-translate-y-0.5 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-brand-800 sm:w-auto">
                            Nous contacter
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H3"/>
                            </svg>
                        </a>

                        <a href="{{ route('fournitures.index') }}"
                           class="inline-flex w-full items-center justify-center rounded-xl border border-white/25 px-7 py-3.5 text-sm font-semibold text-white transition duration-200 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white sm:w-auto">
                            Consulter les fournitures
                        </a>
                    </div>
                </div>
            </div>

            {{-- Note informative --}}
            <p class="mx-auto mt-6 max-w-3xl text-center text-xs leading-5 text-gray-500">
                Les documents et modalités applicables sont à confirmer selon les exigences
                de chaque consultation et les conditions convenues avec le client.
            </p>
        </div>
    </section>
</div>
