<?php
$content = '
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-yinmn-blue">Fil d\'actualité</h1>
    <a href="/posts/create" class="new-post-btn bg-kelly-green text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-opacity-90 transition-all">
        <i class="fas fa-plus mr-2"></i>Nouveau post
    </a>
</div>

<div class="space-y-6" id="post-feed">';

foreach ($posts as $post) {
    $content .= '
    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all card-hover">
        <div class="p-6">
            <div class="flex items-center">
                <img class="h-10 w-10 rounded-full" src="'.($post['profile_picture'] ?? 'public/assets/images/default-profile.png').'" alt="'.$post['first_name'].' '.$post['last_name'].'">
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">'.$post['first_name'].' '.$post['last_name'].'</div>
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
                        <button class="like-btn inline-flex space-x-2 '.($post['is_liked'] ? 'text-kelly-green' : 'text-gray-400').' hover:text-kelly-green" data-post-id="'.$post['id'].'">
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
</div>';

// Fonction helper pour formater la taille des fichiers
function formatFileSize($bytes) {
    if ($bytes >= 1073741824) {
        return number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        return number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        return $bytes . ' bytes';
    } elseif ($bytes == 1) {
        return $bytes . ' byte';
    } else {
        return '0 bytes';
    }
}

// Inclure le layout principal
require 'layouts/main.php';