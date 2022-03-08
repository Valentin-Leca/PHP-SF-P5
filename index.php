<?php

namespace Valen\P5;

session_start();

require 'vendor/autoload.php';
use Valen\P5\Controller\PageController;
use Valen\P5\Controller\UserController;
use Valen\P5\Controller\ContactController;

class Index {

    private PageController $pageController;
    private UserController $userController;
    private ContactController $contactController;

    public function __construct() {
        $this->pageController = new PageController();
        $this->userController = new UserController();
        $this->contactController = new ContactController();
    }

    public function router() {

        try {
            if (isset($_GET['home'])) {
                $this->pageController->getHomePage();
            } elseif (isset($_GET['about'])) {
                $this->pageController->getAboutPage();
            } elseif (isset($_GET['article'])) {
                $this->pageController->getArticlePage();
            } elseif (isset($_GET['oneArticle'])) {
                $this->pageController->getOneArticlePage();
            } elseif (isset($_GET['contact'])) {
                $this->pageController->getContactPage();
            } elseif (isset($_GET['contactForm'])) {
                $this->contactController->getContactForm();
            } elseif (isset($_GET['cv'])) {
                $this->pageController->getCvPage();
            } elseif (isset($_GET['connexion'])) {
                $this->pageController->getConnexionPage();
            } elseif (isset($_GET['loginUser'])) {
                $this->userController->connectUserAccount();
            } elseif (isset($_GET['deconnexion'])) {
                $this->userController->disconnectUserAccount();
            } elseif (isset($_GET['account'])) {
                $this->pageController->getCreateAccountPage();
            } elseif (isset($_GET['createAccount'])) {
                $this->userController->createUserAccount();
            } elseif (isset($_GET['createComment'])) {
                $this->userController->createComment();
            } if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] == "2") {
                 if (isset($_GET['admin'])) {
                    $this->pageController->getAdminPage();
                } elseif (isset($_GET['createArticlePage'])) {
                     $this->pageController->getCreateArticlePage();
                } elseif (isset($_GET['createArticle'])) {
                     $this->userController->createArticle();
                } elseif (isset($_GET['changeListArticlePage'])) {
                     $this->pageController->getChangeListArticlePage();
                } elseif (isset($_GET['updateArticlePage'])) {
                     $this->pageController->getUpdateArticlePage();
                } elseif (isset($_GET['updateArticle'])) {
                     $this->userController->updateArticle();
                } elseif (isset($_GET['deleteArticle'])) {
                     $this->userController->deleteArticle();
                } elseif (isset($_GET['changeCommentPage'])) {
                     $this->pageController->getChangeListCommentPage();
                } elseif (isset($_GET['updateComment'])) {
                     $this->userController->updateComment();
                } elseif (isset($_GET['deleteComment'])) {
                     $this->userController->deleteComment();
                 }
              }
            }
//            else {
//                $this->pageController->getErrorPage();
//            }
        } catch (\Twig\Error\LoaderError $e) {
        } catch (\Twig\Error\RuntimeError $e) {
        } catch (\Twig\Error\SyntaxError $e) {
        }
    }
}

$index = new Index();
$index->router();