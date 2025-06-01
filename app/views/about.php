<?php
$content = '
<div class="bg-white rounded-lg shadow-md overflow-hidden p-6">
    <h1 class="text-3xl font-bold text-yinmn-blue mb-6">À propos d\'UDBL Share</h1>
    
    <div class="prose max-w-none">
        <p class="text-gray-700 mb-4">
            UDBL Share est une plateforme de partage de projets conçue spécialement pour les étudiants en informatique de l\'Université UDBL à Lubumbashi. Notre mission est de fournir un espace où les étudiants peuvent partager leurs projets, collaborer et s\'inspirer mutuellement.
        </p>
        
        <div class="flex items-center bg-antiflash-white p-4 rounded-lg mb-6">
            <i class="fas fa-university text-4xl text-yinmn-blue mr-4"></i>
            <div>
                <h2 class="text-xl font-bold text-gray-900">Faculté d\'Informatique UDBL</h2>
                <p class="text-gray-600">Lubumbashi, République Démocratique du Congo</p>
            </div>
        </div>
        
        <h2 class="text-2xl font-bold text-gray-900 mt-6 mb-4">Notre vision</h2>
        <p class="text-gray-700 mb-4">
            Nous croyons que le partage des connaissances et des projets universitaires peut stimuler l\'innovation et créer des opportunités. UDBL Share vise à devenir le hub central pour la communauté étudiante en informatique de l\'UDBL, où les idées prennent vie et où les collaborations naissent.
        </p>
        
        <h2 class="text-2xl font-bold text-gray-900 mt-6 mb-4">Fonctionnalités clés</h2>
        <ul class="list-disc pl-5 space-y-2 text-gray-700">
            <li>Partage de projets sous forme de posts (texte, images, vidéos, PDF)</li>
            <li>Interaction avec les posts (commentaires, likes, partages)</li>
            <li>Profil étudiant professionnel avec portfolio</li>
            <li>Espace pour chaque étudiant pour gérer ses publications</li>
            <li>Plateforme simple et intuitive</li>
        </ul>
        
        <h2 class="text-2xl font-bold text-gray-900 mt-6 mb-4">Pour les étudiants</h2>
        <div class="grid md:grid-cols-2 gap-6 mt-4">
            <div class="bg-antiflash-white p-4 rounded-lg">
                <div class="flex items-center mb-2">
                    <div class="flex-shrink-0 bg-yinmn-blue bg-opacity-10 p-2 rounded-full">
                        <i class="fas fa-code text-yinmn-blue"></i>
                    </div>
                    <h3 class="ml-3 text-lg font-medium text-gray-900">Partage de projets</h3>
                </div>
                <p class="mt-1 text-sm text-gray-600">
                    Montrez vos réalisations en développement, vos projets académiques et vos recherches.
                </p>
            </div>
            <div class="bg-antiflash-white p-4 rounded-lg">
                <div class="flex items-center mb-2">
                    <div class="flex-shrink-0 bg-kelly-green bg-opacity-10 p-2 rounded-full">
                        <i class="fas fa-comments text-kelly-green"></i>
                    </div>
                    <h3 class="ml-3 text-lg font-medium text-gray-900">Feedback</h3>
                </div>
                <p class="mt-1 text-sm text-gray-600">
                    Recevez des commentaires constructifs de vos pairs et professeurs.
                </p>
            </div>
            <div class="bg-antiflash-white p-4 rounded-lg">
                <div class="flex items-center mb-2">
                    <div class="flex-shrink-0 bg-yinmn-blue bg-opacity-10 p-2 rounded-full">
                        <i class="fas fa-lightbulb text-yinmn-blue"></i>
                    </div>
                    <h3 class="ml-3 text-lg font-medium text-gray-900">Inspiration</h3>
                </div>
                <p class="mt-1 text-sm text-gray-600">
                    Découvrez des projets innovants qui pourraient inspirer vos propres travaux.
                </p>
            </div>
            <div class="bg-antiflash-white p-4 rounded-lg">
                <div class="flex items-center mb-2">
                    <div class="flex-shrink-0 bg-kelly-green bg-opacity-10 p-2 rounded-full">
                        <i class="fas fa-users text-kelly-green"></i>
                    </div>
                    <h3 class="ml-3 text-lg font-medium text-gray-900">Communauté</h3>
                </div>
                <p class="mt-1 text-sm text-gray-600">
                    Faites partie d\'une communauté dynamique d\'étudiants en informatique.
                </p>
            </div>
        </div>
    </div>
</div>';

require 'layouts/main.php';