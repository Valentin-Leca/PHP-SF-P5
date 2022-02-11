<?php

namespace Valen\P5\Controller;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class PageController {

    private FilesystemLoader $loader;
    private Environment $twig;

    public function __construct() {
        $this->loader = new FilesystemLoader('templates');
        $this->twig = new Environment($this->loader);
    }

    public function getHomePage() {
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('home.html.twig');
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function getAboutPage() {
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('about.html.twig');
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function getArticlePage() {
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('article.html.twig');
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function getContactPage() {
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('contact.html.twig');
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function getConnexionPage() {
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('connexion.html.twig');
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function getCreateAccountPage() {
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('createAccount.html.twig');
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function getCvPage() {
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('cv.html.twig');
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function getAdminPage() {
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('admin.html.twig');
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function getCreateArticlePage() {
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('createArticle.html.twig');
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function getErrorPage() {
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('error.html.twig');
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }
}