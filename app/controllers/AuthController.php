<?php
require_once 'app/core/Controller.php';
require_once 'app/models/User.php';

class AuthController extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $user = $this->userModel->findByEmail($email);
            
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
                $_SESSION['profile_picture'] = $user['profile_picture'];
                
                $this->redirect('/');
            } else {
                $error = "Email ou mot de passe incorrect";
                $this->view('auth/login', ['error' => $error]);
            }
        } else {
            $this->view('auth/login');
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['university_email'],
                'password' => $_POST['password'],
                'university' => 'UDBL Lubumbashi',
                'study_level' => $_POST['study_level'],
                'field' => $_POST['field'],
                'specialization' => $_POST['specialization'] ?? null,
                'year_entered' => date('Y'),
                'bio' => '',
                'profile_picture' => 'public/assets/images/default-profile.png'
            ];
            
            if ($this->userModel->create($data)) {
                $this->redirect('/login');
            } else {
                $error = "Une erreur s'est produite lors de l'inscription";
                $this->view('auth/register', ['error' => $error]);
            }
        } else {
            $this->view('auth/register');
        }
    }

    public function logout() {
        session_destroy();
        $this->redirect('/login');
    }
}