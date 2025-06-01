<?php
require_once 'app/models/Database.php';

class Comment {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    // Ajouter un commentaire
    public function create($data) {
        $query = "INSERT INTO comments (post_id, user_id, content) VALUES (:post_id, :user_id, :content)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute($data);
    }

    // Récupérer les commentaires d'un post
    public function getByPost($postId) {
        $query = "SELECT c.*, u.first_name, u.last_name, u.profile_picture 
                  FROM comments c 
                  JOIN users u ON c.user_id = u.id 
                  WHERE c.post_id = :post_id 
                  ORDER BY c.created_at ASC";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['post_id' => $postId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Supprimer un commentaire
    public function delete($id) {
        $query = "DELETE FROM comments WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id]);
    }
}