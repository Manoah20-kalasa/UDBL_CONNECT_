<?php
require_once 'app/models/Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    // Créer un nouvel utilisateur
    public function create($data) {
        $query = "INSERT INTO users (first_name, last_name, email, password, university, study_level, field, specialization, year_entered, bio, profile_picture) 
                  VALUES (:first_name, :last_name, :email, :password, :university, :study_level, :field, :specialization, :year_entered, :bio, :profile_picture)";
        
        $stmt = $this->db->prepare($query);
        
        // Hash du mot de passe
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        
        return $stmt->execute($data);
    }

    // Trouver un utilisateur par email
    public function findByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Trouver un utilisateur par ID
    public function findById($id) {
        $query = "SELECT * FROM users WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour le profil utilisateur
    public function update($id, $data) {
        $query = "UPDATE users SET 
                  first_name = :first_name, 
                  last_name = :last_name, 
                  university = :university, 
                  study_level = :study_level, 
                  field = :field, 
                  specialization = :specialization, 
                  year_entered = :year_entered, 
                  bio = :bio 
                  WHERE id = :id";
        
        $data['id'] = $id;
        $stmt = $this->db->prepare($query);
        return $stmt->execute($data);
    }

    // Mettre à jour l'image de profil
    public function updateProfilePicture($id, $imagePath) {
        $query = "UPDATE users SET profile_picture = :profile_picture WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id, 'profile_picture' => $imagePath]);
    }
}