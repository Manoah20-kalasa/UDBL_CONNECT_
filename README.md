# UDBL_CONNECT_
projet pour mon cours de projet tutorer




# ARBORESCENCE_DU_PROJET

udbl-share/
├── app/
│   ├── controllers/
│   │   ├── AuthController.php
│   │   ├── PostController.php
│   │   ├── UserController.php
│   │   ├── CommentController.php
│   │   └── HomeController.php
│   ├── models/
│   │   ├── User.php
│   │   ├── Post.php
│   │   ├── Comment.php
│   │   ├── Like.php
│   │   └── Database.php
│   ├── views/
│   │   ├── auth/
│   │   │   ├── login.php
│   │   │   └── register.php
│   │   ├── posts/
│   │   │   ├── create.php
│   │   │   ├── show.php
│   │   │   └── index.php
│   │   ├── users/
│   │   │   ├── profile.php
│   │   │   └── edit.php
│   │   ├── home.php
│   │   ├── about.php
│   │   ├── contact.php
│   │   └── layouts/
│   │       ├── header.php
│   │       ├── footer.php
│   │       └── main.php
│   └── core/
│       ├── Router.php
│       ├── Controller.php
│       └── App.php
├── public/
│   ├── index.php
│   ├── assets/
│   │   ├── css/
│   │   ├── js/
│   │   └── images/
│   └── uploads/
│       ├── images/
│       ├── videos/
│       └── documents/
├── config/
│   ├── database.php
│   └── constants.php
└── vendor/


# CREATION_DES_BASE_DE_DONNEES

-- Création de la base de données
CREATE DATABASE udbl_share CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Table des utilisateurs
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    university VARCHAR(100) NOT NULL,
    study_level VARCHAR(50) NOT NULL,
    field VARCHAR(50) NOT NULL,
    specialization VARCHAR(100),
    year_entered INT,
    bio TEXT,
    profile_picture VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table des posts
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table des fichiers des posts
CREATE TABLE post_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    file_type ENUM('image', 'video', 'document') NOT NULL,
    file_name VARCHAR(255) NOT NULL,
    file_size INT NOT NULL,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);

-- Table des commentaires
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table des likes
CREATE TABLE likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unique_like (post_id, user_id),
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table des tags
CREATE TABLE tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

-- Table de liaison entre posts et tags
CREATE TABLE post_tags (
    post_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (post_id, tag_id),
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
);