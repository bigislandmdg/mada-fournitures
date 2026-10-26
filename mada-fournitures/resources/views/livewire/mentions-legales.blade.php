<div>
    {{-- ============ EN-TÊTE ============ --}}
    <section class="bg-gradient-to-br from-brand-700 to-brand-900 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="text-sm text-blue-200 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white transition">Accueil</a>
                <span class="mx-2">/</span>
                <span class="text-white">Mentions légales</span>
            </nav>
            <h1 class="text-3xl md:text-5xl font-bold mb-4">Mentions légales</h1>
            <p class="text-blue-100 text-lg">
                Informations légales relatives au site Mada Fournitures
            </p>
            <p class="text-blue-200 text-sm mt-2">
                Dernière mise à jour : {{ now()->format('d/m/Y') }}
            </p>
        </div>
    </section>

    {{-- ============ CONTENU ============ --}}
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="prose prose-lg max-w-none">

            {{-- 1. Éditeur du site --}}
            <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm font-bold">1</span>
                    Éditeur du site
                </h2>
                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-3">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                        <div class="text-gray-500 text-sm">Raison sociale</div>
                        <div class="sm:col-span-2 font-medium text-gray-900">Mada Fournitures</div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                        <div class="text-gray-500 text-sm">Forme juridique</div>
                        <div class="sm:col-span-2 text-gray-900">SARL (à compléter)</div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                        <div class="text-gray-500 text-sm">Capital social</div>
                        <div class="sm:col-span-2 text-gray-900">XXX XXX XXX Ariary</div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                        <div class="text-gray-500 text-sm">NIF</div>
                        <div class="sm:col-span-2 text-gray-900">XXX XXX XXX</div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                        <div class="text-gray-500 text-sm">STAT</div>
                        <div class="sm:col-span-2 text-gray-900">XXX XXX XXX</div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                        <div class="text-gray-500 text-sm">RCS</div>
                        <div class="sm:col-span-2 text-gray-900">XXX XXX XXX - Antananarivo</div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                        <div class="text-gray-500 text-sm">Siège social</div>
                        <div class="sm:col-span-2 text-gray-900">Antananarivo, Madagascar</div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                        <div class="text-gray-500 text-sm">Téléphone</div>
                        <div class="sm:col-span-2">
                            <a href="tel:+261340000000" class="text-brand-600 hover:underline">+261 34 00 000 00</a>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                        <div class="text-gray-500 text-sm">Email</div>
                        <div class="sm:col-span-2">
                            <a href="mailto:contact@madafournitures.mg" class="text-brand-600 hover:underline">contact@madafournitures.mg</a>
                        </div>
                    </div>
                </div>
            </section>

            {{-- 2. Directeur de publication --}}
            <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm font-bold">2</span>
                    Directeur de la publication
                </h2>
                <div class="bg-white rounded-xl border border-gray-100 p-6">
                    <p class="text-gray-700">
                        Le directeur de la publication est le représentant légal de la société <strong>Mada Fournitures</strong>.
                        Il peut être contacté à l'adresse email
                        <a href="mailto:contact@madafournitures.mg" class="text-brand-600 hover:underline">contact@madafournitures.mg</a>.
                    </p>
                </div>
            </section>

            {{-- 3. Hébergeur --}}
            <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm font-bold">3</span>
                    Hébergeur du site
                </h2>
                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-2">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                        <div class="text-gray-500 text-sm">Nom</div>
                        <div class="sm:col-span-2 font-medium text-gray-900">(À compléter - nom de l'hébergeur)</div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                        <div class="text-gray-500 text-sm">Adresse</div>
                        <div class="sm:col-span-2 text-gray-900">(À compléter)</div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                        <div class="text-gray-500 text-sm">Site web</div>
                        <div class="sm:col-span-2">
                            <a href="#" class="text-brand-600 hover:underline">(À compléter)</a>
                        </div>
                    </div>
                </div>
            </section>

            {{-- 4. Propriété intellectuelle --}}
            <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm font-bold">4</span>
                    Propriété intellectuelle
                </h2>
                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-4 text-gray-700">
                    <p>
                        L'ensemble du contenu de ce site (textes, images, logos, vidéos, bases de données, structure)
                        est la propriété exclusive de <strong>Mada Fournitures</strong>, sauf mention contraire.
                    </p>
                    <p>
                        Toute reproduction, représentation, modification, publication ou adaptation de tout ou partie
                        des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite sans
                        autorisation écrite préalable de Mada Fournitures.
                    </p>
                    <p>
                        Toute exploitation non autorisée du site ou de son contenu sera considérée comme constitutive
                        d'une contrefaçon et poursuivie conformément aux dispositions du Code de la propriété
                        intellectuelle malgache.
                    </p>
                </div>
            </section>

            {{-- 5. Responsabilité --}}
            <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm font-bold">5</span>
                    Limitation de responsabilité
                </h2>
                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-4 text-gray-700">
                    <p>
                        Mada Fournitures s'efforce d'assurer au mieux l'exactitude et la mise à jour des informations
                        diffusées sur ce site. Toutefois, elle ne peut garantir l'exactitude, la précision ou
                        l'exhaustivité des informations mises à disposition.
                    </p>
                    <p>
                        Les photographies et descriptions des produits sont données à titre indicatif et ne sont pas
                        contractuelles. Les prix affichés sont indicatifs et peuvent varier selon la quantité,
                        la disponibilité et les conditions du marché.
                    </p>
                    <p>
                        Mada Fournitures ne saurait être tenue responsable des dommages directs ou indirects
                        résultant de l'utilisation de ce site ou de l'impossibilité d'y accéder.
                    </p>
                </div>
            </section>

            {{-- 6. Liens hypertextes --}}
            <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm font-bold">6</span>
                    Liens hypertextes
                </h2>
                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-4 text-gray-700">
                    <p>
                        Le site peut contenir des liens vers d'autres sites internet. Mada Fournitures n'exerce
                        aucun contrôle sur ces sites et décline toute responsabilité quant à leur contenu.
                    </p>
                    <p>
                        La mise en place de liens vers le site Mada Fournitures nécessite une autorisation préalable
                        écrite. Pour toute demande, contactez-nous à
                        <a href="mailto:contact@madafournitures.mg" class="text-brand-600 hover:underline">contact@madafournitures.mg</a>.
                    </p>
                </div>
            </section>

            {{-- 7. Droit applicable --}}
            <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm font-bold">7</span>
                    Droit applicable et juridiction
                </h2>
                <div class="bg-white rounded-xl border border-gray-100 p-6 text-gray-700">
                    <p>
                        Les présentes mentions légales sont régies par le droit malgache. En cas de litige,
                        les tribunaux d'Antananarivo seront seuls compétents.
                    </p>
                </div>
            </section>

            {{-- Contact --}}
            <section class="bg-brand-50 border border-brand-100 rounded-xl p-6 mt-12">
                <h3 class="text-lg font-bold text-brand-900 mb-2">Une question ?</h3>
                <p class="text-brand-800 text-sm">
                    Pour toute question relative aux mentions légales, contactez-nous à
                    <a href="mailto:contact@madafournitures.mg" class="font-semibold underline">contact@madafournitures.mg</a>
                    ou par téléphone au <a href="tel:+261340000000" class="font-semibold underline">+261 34 00 000 00</a>.
                </p>
            </section>
        </div>
    </div>
</div>