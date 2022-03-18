<?php

namespace Valen\P5;

session_start();

require 'vendor/autoload.php';
use Valen\P5\Controller\PageController;
use Valen\P5\Controller\UserController;
use Valen\P5\Controller\ContactController;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class Index {

    private PageController $pageController;
    private UserController $userController;
    private ContactController $contactController;

    public function __construct() {
        $this->pageController = new PageController();
        $this->userController = new UserController();
        $this->contactController = new ContactController();
    }

    public function router($get, $session) {

        try {
            if (isset($get['home'])) {
                $this->pageController->getHomePage();
            } elseif (isset($get['about'])) {
                $this->pageController->getAboutPage();
            } elseif (isset($get['article'])) {
                $this->pageController->getArticlePage();
            } elseif (isset($get['oneArticle'])) {
                $this->pageController->getOneArticlePage();
            } elseif (isset($get['contact'])) {
                $this->pageController->getContactPage();
            } elseif (isset($get['contactForm'])) {
                $this->contactController->getContactForm();
            } elseif (isset($get['cv'])) {
                $this->pageController->getCvPage();
            } elseif (isset($get['connexion'])) {
                $this->pageController->getConnexionPage();
            } elseif (isset($get['loginUser'])) {
                $this->userController->connectUserAccount();
            } elseif (isset($get['deconnexion'])) {
                $this->userController->disconnectUserAccount();
            } elseif (isset($get['account'])) {
                $this->pageController->getCreateAccountPage();
            } elseif (isset($get['createAccount'])) {
                $this->userController->createUserAccount();
            } elseif (isset($get['createComment'])) {
                $this->userController->createComment();
            } elseif (!isset($session['role']) || $session['role'] != 2) {
                $this->pageController->getErrorPage();
            } elseif (isset($session['role'])) {
                if ($session['role'] == "2") {
                 if (isset($get['admin'])) {
                    $this->pageController->getAdminPage();
                } elseif (isset($get['createArticlePage'])) {
                     $this->pageController->getCreateArticlePage();
                } elseif (isset($get['createArticle'])) {
                     $this->userController->createArticle();
                } elseif (isset($get['changeListArticlePage'])) {
                     $this->pageController->getChangeListArticlePage();
                } elseif (isset($get['updateArticlePage'])) {
                     $this->pageController->getUpdateArticlePage();
                } elseif (isset($get['updateArticle'])) {
                     $this->userController->updateArticle();
                } elseif (isset($get['deleteArticle'])) {
                     $this->userController->deleteArticle();
                } elseif (isset($get['changeCommentPage'])) {
                     $this->pageController->getChangeListCommentPage();
                } elseif (isset($get['updateComment'])) {
                     $this->userController->updateComment();
                } elseif (isset($get['deleteComment'])) {
                     $this->userController->deleteComment();
                } else {
                     $this->pageController->getErrorPage();
                }
              }
            }
        } catch (\Exception $e) {
            echo 'Erreur :' . $e->getMessage();
        }
    }
}

$index = new Index();
$index->router($_GET, $_SESSION);
