<?php

namespace Valen\P5\Controller;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;
use Valen\P5\Model\UserModel;

class PageController {

    private FilesystemLoader $loader;
    private Environment $twig;
    private UserModel $article;

    public function __construct() {
        $this->loader = new FilesystemLoader('templates');
        $this->twig = new Environment($this->loader);
        $this->article = new UserModel();
    }

    public function getHomePage() {
        $dataArticle = $this->article->getArticleHomePage();
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('home.html.twig',
                ['dataArticles' => $dataArticle]);
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
        $dataAllArticle = $this->article->getAllArticle();
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('article.html.twig',
                ['dataAllArticles' => $dataAllArticle]);
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function getOneArticlePage() {
        $dataOneArticle = $this->article->getOneArticle($_GET['id']);
        $dataComment = $this->article->getComment($_GET['id']);
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('oneArticle.html.twig',
                ['dataOneArticle' => $dataOneArticle,
                 'dataComments' => $dataComment]);
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

    public function getChangeListArticlePage() {
        $dataAllArticle = $this->article->getAllArticle();
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('changeListArticle.html.twig',
                ['dataAllArticles' => $dataAllArticle]);
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function getChangeListCommentPage() {
        $dataAllComment = $this->article->getAllComment();
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('changeListComment.html.twig',
                ['dataAllComments' => $dataAllComment]);
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function getUpdateArticlePage() {
        $dataOneArticle = $this->article->getOneArticle($_GET['id']);
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('updateArticle.html.twig',
                ['dataOneArticle' => $dataOneArticle]);
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