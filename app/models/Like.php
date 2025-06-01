<?php
require_once 'app/models/Database.php';

class Like {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    // Ajouter un like
    public function add($postId, $userId) {
        $query = "INSERT INTO likes (post_id, user_id) VALUES (:post_id, :user_id)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['post_id' => $postId, 'user_id' => $userId]);
    }

    // Supprimer un like
    public function remove($postId, $userId) {
        $query = "DELETE FROM likes WHERE post_id = :post_id AND user_id = :user_id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['post_id' => $postId, 'user_id' => $userId]);
    }

    // Vérifier si un utilisateur a liké un post
    public function isLiked($postId, $userId) {
        $query = "SELECT id FROM likes WHERE post_id = :post_id AND user_id = :user_id LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['post_id' => $postId, 'user_id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }

    // Compter les likes d'un post
    public function count($postId) {
        $query = "SELECT COUNT(*) as count FROM likes WHERE post_id = :post_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['post_id' => $postId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }
}