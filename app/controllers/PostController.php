<?php
require_once 'app/core/Controller.php';
require_once 'app/models/Post.php';
require_once 'app/models/Comment.php';
require_once 'app/models/Like.php';

class PostController extends Controller {
    private $postModel;
    private $commentModel;
    private $likeModel;

    public function __construct() {
        $this->requireLogin();
        $this->postModel = new Post();
        $this->commentModel = new Comment();
        $this->likeModel = new Like();
    }

    public function index() {
        $posts = $this->postModel->getAll();
        
        // Ajouter les fichiers et tags à chaque post
        foreach ($posts as &$post) {
            $post['files'] = $this->postModel->getFiles($post['id']);
            $post['tags'] = $this->postModel->getTags($post['id']);
            $post['like_count'] = $this->likeModel->count($post['id']);
            $post['is_liked'] = $this->likeModel->isLiked($post['id'], $_SESSION['user_id']);
        }
        
        $this->view('posts/index', ['posts' => $posts]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => $_POST['title'],
                'content' => $_POST['content']
            ];
            
            // Créer le post
            $postId = $this->postModel->create($data);
            
            // Gérer les fichiers uploadés
            $this->handleFileUploads($postId);
            
            // Gérer les tags
            if (!empty($_POST['tags'])) {
                $tags = explode(',', $_POST['tags']);
                $this->postModel->addTags($postId, $tags);
            }
            
            $this->redirect('/');
        } else {
            $this->view('posts/create');
        }
    }

    private function handleFileUploads($postId) {
        $fileTypes = ['images', 'videos', 'documents'];
        
        foreach ($fileTypes as $type) {
            if (!empty($_FILES["post_{$type}"]['name'][0])) {
                foreach ($_FILES["post_{$type}"]['tmp_name'] as $key => $tmpName) {
                    $file = [
                        'name' => $_FILES["post_{$type}"]['name'][$key],
                        'type' => $_FILES["post_{$type}"]['type'][$key],
                        'tmp_name' => $tmpName,
                        'error' => $_FILES["post_{$type}"]['error'][$key],
                        'size' => $_FILES["post_{$type}"]['size'][$key]
                    ];
                    
                    $uploadedFile = $this->uploadFile($file, substr($type, 0, -1));
                    
                    if ($uploadedFile) {
                        $this->postModel->addFile($postId, $uploadedFile);
                    }
                }
            }
        }
    }

    public function show($id) {
        $post = $this->postModel->getById($id);
        
        if ($post) {
            $post['files'] = $this->postModel->getFiles($id);
            $post['tags'] = $this->postModel->getTags($id);
            $post['like_count'] = $this->likeModel->count($id);
            $post['is_liked'] = $this->likeModel->isLiked($id, $_SESSION['user_id']);
            $post['comments'] = $this->commentModel->getByPost($id);
            
            $this->view('posts/show', ['post' => $post]);
        } else {
            $this->redirect('/');
        }
    }

    public function delete($id) {
        $post = $this->postModel->getById($id);
        
        if ($post && $post['user_id'] == $_SESSION['user_id']) {
            $this->postModel->delete($id);
        }
        
        $this->redirect('/');
    }

    public function like($id) {
        if ($this->likeModel->isLiked($id, $_SESSION['user_id'])) {
            $this->likeModel->remove($id, $_SESSION['user_id']);
        } else {
            $this->likeModel->add($id, $_SESSION['user_id']);
        }
        
        header('Content-Type: application/json');
        echo json_encode(['count' => $this->likeModel->count($id)]);
    }

    public function comment($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'post_id' => $id,
                'user_id' => $_SESSION['user_id'],
                'content' => $_POST['content']
            ];
            
            $this->commentModel->create($data);
        }
        
        $this->redirect("/posts/{$id}");
    }
}