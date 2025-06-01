<?php
class Controller {
    protected function view($view, $data = []) {
        extract($data);
        require_once "app/views/{$view}.php";
    }

    protected function redirect($url) {
        header("Location: {$url}");
        exit();
    }

    protected function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    protected function requireLogin() {
        if (!$this->isLoggedIn()) {
            $this->redirect('/login');
        }
    }

    protected function uploadFile($file, $type) {
        $uploadDir = "public/uploads/{$type}s/";
        
        // Créer le dossier s'il n'existe pas
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        // Générer un nom de fichier unique
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $extension;
        $targetPath = $uploadDir . $filename;
        
        // Déplacer le fichier uploadé
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return [
                'path' => $targetPath,
                'name' => $file['name'],
                'type' => $type,
                'size' => $file['size']
            ];
        }
        
        return false;
    }
}