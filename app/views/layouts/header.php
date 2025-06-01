<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <i class="fas fa-laptop-code text-2xl text-yinmn-blue mr-2"></i>
                    <span class="text-xl font-bold text-yinmn-blue">UDBL Share</span>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="/" class="nav-link border-kelly-green text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Accueil
                    </a>
                    <a href="/profile" class="nav-link border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Profil
                    </a>
                    <a href="/about" class="nav-link border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        À propos
                    </a>
                    <a href="/contact" class="nav-link border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Contact
                    </a>
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="/posts/create" class="new-post-btn bg-yinmn-blue text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-opacity-90 transition-all">
                        <i class="fas fa-plus mr-2"></i>Nouveau post
                    </a>
                    <div class="ml-3 relative">
                        <div>
                            <button type="button" class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kelly-green" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Ouvrir le menu utilisateur</span>
                                <img class="h-8 w-8 rounded-full" src="<?= $_SESSION['profile_picture'] ?? 'public/assets/images/default-profile.png' ?>" alt="">
                            </button>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="/login" class="bg-yinmn-blue text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-opacity-90 transition-all">
                        <i class="fas fa-sign-in-alt mr-2"></i>Connexion
                    </a>
                <?php endif; ?>
            </div>
            <div class="-mr-2 flex items-center sm:hidden">
                <button type="button" class="mobile-menu-btn inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-kelly-green" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Ouvrir le menu principal</span>
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="sm:hidden hidden" id="mobile-menu">
        <div class="pt-2 pb-3 space-y-1">
            <a href="/" class="nav-link-mobile bg-kelly-green bg-opacity-10 border-kelly-green text-gray-900 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Accueil</a>
            <a href="/profile" class="nav-link-mobile border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Profil</a>
            <a href="/about" class="nav-link-mobile border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">À propos</a>
            <a href="/contact" class="nav-link-mobile border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Contact</a>
        </div>
        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="pt-4 pb-3 border-t border-gray-200">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="<?= $_SESSION['profile_picture'] ?? 'public/assets/images/default-profile.png' ?>" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-gray-800"><?= $_SESSION['user_name'] ?></div>
                        <div class="text-sm font-medium text-gray-500"><?= $_SESSION['user_email'] ?></div>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <a href="/profile" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Votre profil</a>
                    <a href="/profile/edit" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Paramètres</a>
                    <a href="/logout" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Déconnexion</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</nav>