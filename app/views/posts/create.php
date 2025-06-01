<?php
$content = '
<div class="bg-white rounded-lg shadow-md overflow-hidden p-6">
    <h1 class="text-3xl font-bold text-yinmn-blue mb-6">Créer un nouveau post</h1>
    
    <form class="space-y-6" action="/posts/create" method="POST" enctype="multipart/form-data">
        <div>
            <label for="post-title" class="block text-sm font-medium text-gray-700">Titre du post</label>
            <input type="text" id="post-title" name="title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue" placeholder="Donnez un titre à votre post" required>
        </div>
        
        <div>
            <label for="post-content" class="block text-sm font-medium text-gray-700">Contenu</label>
            <textarea id="post-content" name="content" rows="5" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue" placeholder="Décrivez votre projet ou partagez vos réflexions..." required></textarea>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700">Ajouter des fichiers</label>
            <div class="mt-1 grid grid-cols-1 gap-4 sm:grid-cols-3">
                <label class="file-input-label">
                    <input type="file" class="hidden" accept="image/*" name="post_images[]" id="post-images" multiple>
                    <div class="text-center">
                        <i class="fas fa-image text-3xl text-yinmn-blue mb-2"></i>
                        <p class="text-sm text-gray-600">Ajouter des images</p>
                    </div>
                </label>
                <label class="file-input-label">
                    <input type="file" class="hidden" accept="video/*" name="post_videos[]" id="post-videos" multiple>
                    <div class="text-center">
                        <i class="fas fa-video text-3xl text-yinmn-blue mb-2"></i>
                        <p class="text-sm text-gray-600">Ajouter une vidéo</p>
                    </div>
                </label>
                <label class="file-input-label">
                    <input type="file" class="hidden" accept=".pdf,.doc,.docx,.ppt,.pptx" name="post_documents[]" id="post-documents" multiple>
                    <div class="text-center">
                        <i class="fas fa-file-pdf text-3xl text-yinmn-blue mb-2"></i>
                        <p class="text-sm text-gray-600">Ajouter un document</p>
                    </div>
                </label>
            </div>
            <div class="mt-2" id="file-previews">
                <!-- File previews will be shown here -->
            </div>
        </div>
        
        <div>
            <label for="post-tags" class="block text-sm font-medium text-gray-700">Tags</label>
            <input type="text" id="post-tags" name="tags" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue" placeholder="Ajoutez des tags séparés par des virgules (ex: Web, Python, Projet)">
        </div>
        
        <div class="flex justify-end space-x-3">
            <a href="/" class="cancel-post-btn bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yinmn-blue">
                Annuler
            </a>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-kelly-green hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kelly-green">
                <i class="fas fa-paper-plane mr-2"></i> Publier
            </button>
        </div>
    </form>
</div>';

require 'layouts/main.php';