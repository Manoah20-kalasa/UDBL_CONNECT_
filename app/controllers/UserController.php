<?php
require_once 'app/core/Controller.php';
require_once 'app/models/User.php';
require_once 'app/models/Post.php';

class UserController extends Controller {
    private $userModel;
    private $postModel;

    public function __construct() {
        $this->requireLogin();
        $this->userModel = new User();
        $this->postModel = new Post();
    }

    public function profile($id = null) {
        $userId = $id ?: $_SESSION['user_id'];
        $user = $this->userModel->findById($userId);
        
        if ($user) {
            $posts = $this->postModel->getByUser($userId);
            
            // Ajouter les fichiers et tags à chaque post
            foreach ($posts as &$post) {
                $post['files'] = $this->postModel->getFiles($post['id']);
                $post['tags'] = $this->postModel->getTags($post['id']);
            }
            
            $this->view('users/profile', [
                'user' => $user,
                'posts' => $posts,
                'is_owner' => ($userId == $_SESSION['user_id'])
            ]);
        } else {
            $this->redirect('/');
        }
    }

    public function edit() {
        $user = $this->userModel->findById($_SESSION['user_id']);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'university' => $_POST['university'],
                'study_level' => $_POST['study_level'],
                'field' => $_POST['field'],
                'specialization' => $_POST['specialization'],
                'year_entered' => $_POST['year_entered'],
                'bio' => $_POST['bio']
            ];
            
            // Gérer l'upload de l'image de profil
            if (!empty($_FILES['profile_picture']['name'])) {
                $uploadedFile = $this->uploadFile($_FILES['profile_picture'], 'image');
                
                if ($uploadedFile) {
                    $this->userModel->updateProfilePicture($_SESSION['user_id'], $uploadedFile['path']);
                    $_SESSION['profile_picture'] = $uploadedFile['path'];
                }
            }
            
            if ($this->userModel->update($_SESSION['user_id'], $data)) {
                $_SESSION['user_name'] = $data['first_name'] . ' ' . $data['last_name'];
                $this->redirect('/profile');
            }
        }
        
        $this->view('users/edit', ['user' => $user]);
    }
}