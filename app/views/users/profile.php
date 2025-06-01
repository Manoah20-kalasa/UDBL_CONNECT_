<?php
$content = '
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="gradient-bg h-32"></div>
    <div class="px-6 py-4 relative">
        <div class="absolute -top-16 left-6">
            <img class="h-32 w-32 rounded-full border-4 border-white" src="'.$user['profile_picture'].'" alt="'.$user['first_name'].' '.$user['last_name'].'">
        </div>
        <div class="ml-40">
            <h2 class="text-2xl font-bold text-gray-900">'.$user['first_name'].' '.$user['last_name'].'</h2>
            <p class="text-gray-600">'.$user['study_level'].' en '.$user['field'].'</p>
            <div class="mt-2 flex space-x-4">
                <span class="inline-flex items-center text-sm text-gray-500">
                    <i class="fas fa-university mr-1"></i> <span>'.$user['university'].'</span>
                </span>
                <span class="inline-flex items-center text-sm text-gray-500">
                    <i class="fas fa-map-marker-alt mr-1"></i> <span>Lubumbashi, RDC</span>
                </span>
            </div>
        </div>';
        
        if ($is_owner) {
            $content .= '
            <div class="mt-6 flex justify-end">
                <a href="/profile/edit" class="edit-profile-btn bg-yinmn-blue text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-opacity-90 transition-all">
                    <i class="fas fa-edit mr-2"></i>Modifier le profil
                </a>
            </div>';
        }
        
        $content .= '
    </div>
    <div class="border-t border-gray-200 px-6 py-4">
        <div class="flex space-x-8">
            <button class="profile-tab border-b-2 border-kelly-green text-gray-900 px-1 pt-1 pb-4 text-sm font-medium" data-tab="about">
                À propos
            </button>
            <button class="profile-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 px-1 pt-1 pb-4 text-sm font-medium" data-tab="posts">
                Mes posts
            </button>
        </div>
    </div>
    
    <!-- About Tab -->
    <div class="profile-tab-content px-6 py-4" data-tab-content="about">
        <h3 class="text-lg font-medium text-gray-900">Informations personnelles</h3>
        <div class="mt-4 grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nom complet</label>
                <p class="mt-1 text-sm text-gray-900">'.$user['first_name'].' '.$user['last_name'].'</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email universitaire</label>
                <p class="mt-1 text-sm text-gray-900">'.$user['email'].'</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Niveau d\'études</label>
                <p class="mt-1 text-sm text-gray-900">'.$user['study_level'].'</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Filière</label>
                <p class="mt-1 text-sm text-gray-900">'.$user['field'].'</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Année d\'entrée</label>
                <p class="mt-1 text-sm text-gray-900">'.$user['year_entered'].'</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Spécialisation</label>
                <p class="mt-1 text-sm text-gray-900">'.$user['specialization'].'</p>
            </div>
        </div>
        <div class="mt-6">
            <h3 class="text-lg font-medium text-gray-900">Bio</h3>
            <p class="mt-1 text-sm text-gray-900">'.$user['bio'].'</p>
        </div>
    </div>
    
    <!-- Posts Tab -->
    <div class="profile-tab-content hidden px-6 py-4" data-tab-content="posts">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Mes publications</h3>
        <div class="space-y-4">';

foreach ($posts as $post) {
    $content .= '
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all card-hover">
                <div class="p-6">
                    <div class="flex items-center">
                        <img class="h-10 w-10 rounded-full" src="'.$user['profile_picture'].'" alt="'.$user['first_name'].' '.$user['last_name'].'">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">'.$user['first_name'].' '.$user['last_name'].'</div>
                            <div class="text-sm text-gray-500">'.date('d/m/Y H:i', strtotime($post['created_at'])).'</div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-xl font-semibold text-gray-900">'.$post['title'].'</h3>
                        <p class="mt-2 text-gray-700">'.$post['content'].'</p>
                    </div>';
                    
                    // Afficher les fichiers
                    if (!empty($post['files'])) {
                        $content .= '<div class="mt-4">';
                        foreach ($post['files'] as $file) {
                            if ($file['file_type'] === 'image') {
                                $content .= '<img class="w-full h-48 object-cover rounded-lg mb-2" src="'.$file['file_path'].'" alt="Post image">';
                            } else {
                                $content .= '
                                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                    <i class="fas fa-file-pdf text-3xl text-red-500 mr-4"></i>
                                    <div>
                                        <div class="font-medium text-gray-900">'.$file['file_name'].'</div>
                                        <div class="text-sm text-gray-500">'.formatFileSize($file['file_size']).'</div>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="'.$file['file_path'].'" download class="text-yinmn-blue hover:text-yinmn-blue-dark">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </div>
                                </div>';
                            }
                        }
                        $content .= '</div>';
                    }
                    
                    // Afficher les tags
                    if (!empty($post['tags'])) {
                        $content .= '<div class="mt-4"><div class="flex space-x-4">';
                        foreach ($post['tags'] as $tag) {
                            $content .= '
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yinmn-blue bg-opacity-10 text-yinmn-blue">
                                #'.$tag['name'].'
                            </span>';
                        }
                        $content .= '</div></div>';
                    }
                    
                    $content .= '
                </div>
                <div class="bg-gray-50 px-6 py-4">
                    <div class="flex justify-between">
                        <div class="flex space-x-8">
                            <span class="inline-flex items-center text-sm">
                                <button class="like-btn inline-flex space-x-2 text-gray-400 hover:text-kelly-green" data-post-id="'.$post['id'].'">
                                    <i class="far fa-thumbs-up"></i>
                                    <span class="text-gray-600">'.$post['like_count'].'</span>
                                </button>
                            </span>
                            <span class="inline-flex items-center text-sm">
                                <a href="/posts/'.$post['id'].'" class="inline-flex space-x-2 text-gray-400 hover:text-yinmn-blue">
                                    <i class="far fa-comment"></i>
                                    <span class="text-gray-600">'.count($post['comments'] ?? []).'</span>
                                </a>
                            </span>
                        </div>
                        <div>
                            <button class="share-btn text-sm text-gray-500 hover:text-gray-700" data-post-id="'.$post['id'].'">
                                <i class="fas fa-share"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>';
}

$content .= '
        </div>
    </div>
</div>

<script>
// Gestion des onglets du profil
document.querySelectorAll(\'.profile-tab\').forEach(tab => {
    tab.addEventListener(\'click\', () => {
        const tabId = tab.dataset.tab;
        
        // Mettre à jour l\'apparence des onglets
        document.querySelectorAll(\'.profile-tab\').forEach(t => {
            if (t.dataset.tab === tabId) {
                t.classList.add(\'border-kelly-green\', \'text-gray-900\');
                t.classList.remove(\'border-transparent\', \'text-gray-500\');
            } else {
                t.classList.remove(\'border-kelly-green\', \'text-gray-900\');
                t.classList.add(\'border-transparent\', \'text-gray-500\');
            }
        });
        
        // Afficher le contenu correspondant
        document.querySelectorAll(\'.profile-tab-content\').forEach(content => {
            if (content.dataset.tabContent === tabId) {
                content.classList.remove(\'hidden\');
            } else {
                content.classList.add(\'hidden\');
            }
        });
    });
});
</script>';

require 'layouts/main.php';