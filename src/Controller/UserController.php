<?php

namespace Valen\P5\Controller;

use Valen\P5\Model\UserModel;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class UserController {

    private FilesystemLoader $loader;
    private Environment $twig;

    public function __construct() {
        $this->loader = new FilesystemLoader('templates');
        $this->twig = new Environment($this->loader);
    }

    public function connectUserAccount() {

        $dataLogin = new UserModel();
        $data = $dataLogin->connectAccount($_POST['login']);

        $passwordVerify = password_verify($_POST['password'], $data['password']);

        if ($passwordVerify === true) {

            $_SESSION['login'] = $data['login'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['id'] = $data['id'];

            header('Location: index.php?home');
        } elseif ($passwordVerify === false) {
            try {
                echo $this->twig->render('connexion.html.twig');
            } catch (LoaderError $e) {
            } catch (RuntimeError $e) {
            } catch (SyntaxError $e) {
            }
        }
    }

    public function createUserAccount() {
        $password = $_POST['password'];
        $samePassword = $_POST['samePassword'];
        $loginForm = $_POST['login'];

        $compareLogin = new UserModel();
        $checkLogin = $compareLogin->compareLogin($loginForm);
        if ($checkLogin == true) {
            try {
                echo $this->twig->render('createAccount.html.twig');
            } catch (LoaderError $e) {
            } catch (RuntimeError $e) {
            } catch (SyntaxError $e) {
            }
        } elseif ($password == $samePassword) {
            $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $dataCreateUserAccount = new UserModel();
            $dataCreateUserAccount->dataCreateAccount($_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['email'], $passHash);
            try {
                echo $this->twig->render('connexion.html.twig');
            } catch (LoaderError $e) {
            } catch (RuntimeError $e) {
            } catch (SyntaxError $e) {
            }
        } else {
            try {
                echo $this->twig->render('createAccount.html.twig');
            } catch (LoaderError $e) {
            } catch (RuntimeError $e) {
            } catch (SyntaxError $e) {
            }
        }
    }

    public function createArticle() {
        $dataArticle = new UserModel();
        $dataArticle->createArticle($_POST['title'], $_POST['description'], $_SESSION['id']);
        try {
            echo $this->twig->render('admin.html.twig');
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function disconnectUserAccount() {
        session_destroy();
        header('Location: index.php?home');
    }

}