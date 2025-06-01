<?php
$content = '
<div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
    <div class="gradient-bg p-8 text-white text-center">
        <i class="fas fa-user-plus text-5xl mb-4"></i>
        <h1 class="text-3xl font-bold">Rejoignez UDBL Share</h1>
        <p class="mt-2">Créez votre profil étudiant</p>
    </div>
    <div class="p-8">
        <form class="space-y-6" action="/register" method="POST">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label for="first-name" class="block text-sm font-medium text-gray-700">Prénom</label>
                    <div class="mt-1">
                        <input type="text" name="first_name" id="first-name" autocomplete="given-name" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue">
                    </div>
                </div>
                <div>
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Nom</label>
                    <div class="mt-1">
                        <input type="text" name="last_name" id="last-name" autocomplete="family-name" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue">
                    </div>
                </div>
            </div>

            <div>
                <label for="university-email" class="block text-sm font-medium text-gray-700">Email universitaire</label>
                <div class="mt-1">
                    <input id="university-email" name="university_email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue">
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <div class="mt-1">
                    <input id="password" name="password" type="password" autocomplete="new-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue">
                </div>
            </div>

            <div>
                <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirmez le mot de passe</label>
                <div class="mt-1">
                    <input id="confirm-password" name="confirm_password" type="password" autocomplete="new-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue">
                </div>
            </div>

            <div>
                <label for="study-level" class="block text-sm font-medium text-gray-700">Niveau d\'études</label>
                <select id="study-level" name="study_level" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue sm:text-sm rounded-md">
                    <option value="">Sélectionnez</option>
                    <option>Licence 1</option>
                    <option>Licence 2</option>
                    <option>Licence 3</option>
                    <option>Master 1</option>
                    <option>Master 2</option>
                    <option>Doctorat</option>
                </select>
            </div>

            <div>
                <label for="field" class="block text-sm font-medium text-gray-700">Filière</label>
                <select id="field" name="field" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue sm:text-sm rounded-md">
                    <option value="">Sélectionnez</option>
                    <option>Informatique</option>
                    <option>Réseaux et Télécoms</option>
                    <option>Génie Logiciel</option>
                    <option>Intelligence Artificielle</option>
                    <option>Data Science</option>
                </select>
            </div>

            <div>
                <label for="specialization" class="block text-sm font-medium text-gray-700">Spécialisation (optionnel)</label>
                <input type="text" id="specialization" name="specialization" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue">
            </div>

            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="terms" name="terms" type="checkbox" required class="focus:ring-yinmn-blue h-4 w-4 text-yinmn-blue border-gray-300 rounded">
                </div>
                <div class="ml-3 text-sm">
                    <label for="terms" class="font-medium text-gray-700">J\'accepte les <a href="#" class="text-yinmn-blue hover:text-opacity-80">conditions d\'utilisation</a></label>
                </div>
            </div>

            <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-kelly-green hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kelly-green">
                    Créer mon compte
                </button>
            </div>
        </form>

        <div class="mt-6">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">Déjà membre?</span>
                </div>
            </div>

            <div class="mt-6">
                <a href="/login" class="login-link w-full flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yinmn-blue">
                    Se connecter
                </a>
            </div>
        </div>
    </div>
</div>';

require 'layouts/main.php';