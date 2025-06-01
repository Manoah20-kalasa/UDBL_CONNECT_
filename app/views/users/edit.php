<?php
$content = '
<div class="bg-white rounded-lg shadow-md overflow-hidden p-6">
    <h1 class="text-3xl font-bold text-yinmn-blue mb-6">Modifier le profil</h1>
    
    <form class="space-y-6" action="/profile/edit" method="POST" enctype="multipart/form-data">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <label for="first-name" class="block text-sm font-medium text-gray-700">Prénom</label>
                <input type="text" id="first-name" name="first_name" value="'.$user['first_name'].'" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue">
            </div>
            <div>
                <label for="last-name" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" id="last-name" name="last_name" value="'.$user['last_name'].'" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue">
            </div>
        </div>
        
        <div>
            <label for="university" class="block text-sm font-medium text-gray-700">Université</label>
            <input type="text" id="university" name="university" value="'.$user['university'].'" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue">
        </div>
        
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <label for="study-level" class="block text-sm font-medium text-gray-700">Niveau d\'études</label>
                <select id="study-level" name="study_level" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue">
                    <option value="Licence 1" '.($user['study_level'] === 'Licence 1' ? 'selected' : '').'>Licence 1</option>
                    <option value="Licence 2" '.($user['study_level'] === 'Licence 2' ? 'selected' : '').'>Licence 2</option>
                    <option value="Licence 3" '.($user['study_level'] === 'Licence 3' ? 'selected' : '').'>Licence 3</option>
                    <option value="Master 1" '.($user['study_level'] === 'Master 1' ? 'selected' : '').'>Master 1</option>
                    <option value="Master 2" '.($user['study_level'] === 'Master 2' ? 'selected' : '').'>Master 2</option>
                    <option value="Doctorat" '.($user['study_level'] === 'Doctorat' ? 'selected' : '').'>Doctorat</option>
                </select>
            </div>
            <div>
                <label for="field" class="block text-sm font-medium text-gray-700">Filière</label>
                <select id="field" name="field" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue">
                    <option value="Informatique" '.($user['field'] === 'Informatique' ? 'selected' : '').'>Informatique</option>
                    <option value="Réseaux et Télécoms" '.($user['field'] === 'Réseaux et Télécoms' ? 'selected' : '').'>Réseaux et Télécoms</option>
                    <option value="Génie Logiciel" '.($user['field'] === 'Génie Logiciel' ? 'selected' : '').'>Génie Logiciel</option>
                    <option value="Intelligence Artificielle" '.($user['field'] === 'Intelligence Artificielle' ? 'selected' : '').'>Intelligence Artificielle</option>
                    <option value="Data Science" '.($user['field'] === 'Data Science' ? 'selected' : '').'>Data Science</option>
                </select>
            </div>
        </div>
        
        <div>
            <label for="specialization" class="block text-sm font-medium text-gray-700">Spécialisation</label>
            <input type="text" id="specialization" name="specialization" value="'.$user['specialization'].'" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue">
        </div>
        
        <div>
            <label for="year-entered" class="block text-sm font-medium text-gray-700">Année d\'entrée</label>
            <input type="number" id="year-entered" name="year_entered" value="'.$user['year_entered'].'" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue">
        </div>
        
        <div>
            <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
            <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue">'.$user['bio'].'</textarea>
        </div>
        
        <div>
            <label for="profile-picture" class="block text-sm font-medium text-gray-700">Photo de profil</label>
            <div class="mt-1 flex items-center">
                <img id="profile-picture-preview" src="'.$user['profile_picture'].'" alt="Photo de profil actuelle" class="h-16 w-16 rounded-full object-cover">
                <input type="file" id="profile-picture" name="profile_picture" accept="image/*" class="ml-4">
            </div>
        </div>
        
        <div class="flex justify-end space-x-3">
            <a href="/profile" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yinmn-blue">
                Annuler
            </a>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-kelly-green hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kelly-green">
                Enregistrer les modifications
            </button>
        </div>
    </form>
</div>

<script>
// Prévisualisation de l\'image de profil
document.getElementById(\'profile-picture\').addEventListener(\'change\', function(e) {
    if (e.target.files.length > 0) {
        const reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById(\'profile-picture-preview\').src = event.target.result;
        };
        reader.readAsDataURL(e.target.files[0]);
    }
});
</script>';

require 'layouts/main.php';