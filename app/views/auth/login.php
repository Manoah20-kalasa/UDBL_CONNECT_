<?php
$content = '
<div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
    <div class="gradient-bg p-8 text-white text-center">
        <i class="fas fa-laptop-code text-5xl mb-4"></i>
        <h1 class="text-3xl font-bold">Connectez-vous à UDBL Share</h1>
        <p class="mt-2">Accédez à votre espace étudiant</p>
    </div>
    <div class="p-8">
        <form class="space-y-6" action="/login" method="POST">
            <div>
                <label for="login-email" class="block text-sm font-medium text-gray-700">Email universitaire</label>
                <div class="mt-1">
                    <input id="login-email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue">
                </div>
            </div>

            <div>
                <label for="login-password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <div class="mt-1">
                    <input id="login-password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-yinmn-blue focus:border-yinmn-blue">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-yinmn-blue focus:ring-yinmn-blue border-gray-300 rounded">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900">Se souvenir de moi</label>
                </div>

                <div class="text-sm">
                    <a href="#" class="font-medium text-yinmn-blue hover:text-opacity-80">Mot de passe oublié?</a>
                </div>
            </div>

            <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yinmn-blue hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yinmn-blue">
                    Se connecter
                </button>
            </div>
        </form>

        <div class="mt-6">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">Nouveau sur UDBL Share?</span>
                </div>
            </div>

            <div class="mt-6">
                <a href="/register" class="register-link w-full flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yinmn-blue">
                    Créer un compte
                </a>
            </div>
        </div>
    </div>
</div>';

require 'layouts/main.php';