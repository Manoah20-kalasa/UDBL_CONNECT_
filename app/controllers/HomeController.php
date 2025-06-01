<?php
require_once 'app/core/Controller.php';

class HomeController extends Controller {
    public function index() {
        if (!$this->isLoggedIn()) {
            $this->redirect('/login');
        } else {
            $this->redirect('/posts');
        }
    }

    public function about() {
        $this->view('about');
    }

    public function contact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Traiter le formulaire de contact
            // Envoyer un email ou enregistrer en base de données
            $this->redirect('/contact?success=1');
        } else {
            $this->view('contact');
        }
    }
}