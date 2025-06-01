<?php
require_once 'app/models/Database.php';

class Post {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    // Créer un nouveau post
    public function create($data) {
        $query = "INSERT INTO posts (user_id, title, content) VALUES (:user_id, :title, :content)";
        $stmt = $this->db->prepare($query);
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }

    // Ajouter un fichier à un post
    public function addFile($postId, $fileData) {
        $query = "INSERT INTO post_files (post_id, file_path, file_type, file_name, file_size) 
                  VALUES (:post_id, :file_path, :file_type, :file_name, :file_size)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            'post_id' => $postId,
            'file_path' => $fileData['path'],
            'file_type' => $fileData['type'],
            'file_name' => $fileData['name'],
            'file_size' => $fileData['size']
        ]);
    }

    // Ajouter des tags à un post
    public function addTags($postId, $tags) {
        // Vérifier et créer les tags s'ils n'existent pas
        foreach ($tags as $tagName) {
            $tagName = trim($tagName);
            if (!empty($tagName)) {
                // Vérifier si le tag existe
                $stmt = $this->db->prepare("SELECT id FROM tags WHERE name = :name");
                $stmt->execute(['name' => $tagName]);
                $tag = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if (!$tag) {
                    // Créer le tag
                    $stmt = $this->db->prepare("INSERT INTO tags (name) VALUES (:name)");
                    $stmt->execute(['name' => $tagName]);
                    $tagId = $this->db->lastInsertId();
                } else {
                    $tagId = $tag['id'];
                }
                
                // Lier le tag au post
                $stmt = $this->db->prepare("INSERT IGNORE INTO post_tags (post_id, tag_id) VALUES (:post_id, :tag_id)");
                $stmt->execute(['post_id' => $postId, 'tag_id' => $tagId]);
            }
        }
    }

    // Récupérer tous les posts
    public function getAll() {
        $query = "SELECT p.*, u.first_name, u.last_name, u.profile_picture 
                  FROM posts p 
                  JOIN users u ON p.user_id = u.id 
                  ORDER BY p.created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer les posts d'un utilisateur
    public function getByUser($userId) {
        $query = "SELECT p.*, u.first_name, u.last_name, u.profile_picture 
                  FROM posts p 
                  JOIN users u ON p.user_id = u.id 
                  WHERE p.user_id = :user_id 
                  ORDER BY p.created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un post par son ID
    public function getById($id) {
        $query = "SELECT p.*, u.first_name, u.last_name, u.profile_picture 
                  FROM posts p 
                  JOIN users u ON p.user_id = u.id 
                  WHERE p.id = :id LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Récupérer les fichiers d'un post
    public function getFiles($postId) {
        $query = "SELECT * FROM post_files WHERE post_id = :post_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['post_id' => $postId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer les tags d'un post
    public function getTags($postId) {
        $query = "SELECT t.name FROM post_tags pt 
                  JOIN tags t ON pt.tag_id = t.id 
                  WHERE pt.post_id = :post_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['post_id' => $postId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Supprimer un post
    public function delete($id) {
        $query = "DELETE FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id]);
    }
}