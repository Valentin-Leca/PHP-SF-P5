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
    private UserModel $user;

    public function __construct() {
        $this->loader = new FilesystemLoader('templates');
        $this->twig = new Environment($this->loader);
        $this->user = new UserModel();
    }

    public function connectUserAccount() {
        $data = $this->user->connectAccount($_POST['login']);

        if ($data !== null) {
            $passwordVerify = password_verify($_POST['password'], $data['password']);

            if ($passwordVerify === true) {

                $_SESSION['login'] = $data['login'];
                $_SESSION['role'] = $data['role'];
                $_SESSION['id'] = $data['id'];

                header('Location: index.php?home');
            } elseif ($passwordVerify === false) {
                $messageSystem = "Mauvais identifiant ou mot de passe, veuillez réessayer.";
                try {
                    echo $this->twig->render('connexion.html.twig',
                        ['messageSystem' => $messageSystem]);
                } catch (LoaderError $e) {
                } catch (RuntimeError $e) {
                } catch (SyntaxError $e) {
                }
            }
        } else {
            $messageSystem = "Mauvais identifiant ou mot de passe, veuillez réessayer.";
            try {
                echo $this->twig->render('connexion.html.twig',
                    ['messageSystem' => $messageSystem]);
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

        $checkLogin = $this->user->compareLogin($loginForm);

        if ($checkLogin === true) {
            $messageSystem = "L'identifiant que vous avez choisi existe déjà. Veuillez en utiliser un autre.";
            try {
                echo $this->twig->render('createAccount.html.twig',
                    ['messageSystem' => $messageSystem]);
            } catch (LoaderError $e) {
            } catch (RuntimeError $e) {
            } catch (SyntaxError $e) {
            }
        } elseif ($password == $samePassword) {
            $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $this->user->dataCreateAccount($_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['email'], $passHash);

            $name = $_POST['nom'];
            $firstName = $_POST['prenom'];
            $email = $_POST['email'];

                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=utf-8';
                $headers[] = "De : " . $email;

                $to = "$email";
                $subject = "Création de votre compte";
                $mailContent = "
        <html lang=\"fr\">
                        <body>
                            <div align=\"center\">
                                <p>Bonjour $firstName $name !</p><br />
                                <p>Vous avez créé un compte sur le portfolio de Valentin Lecavelier Des Etangs</p>
                                <p>Pour rappel, votre identifiant est : \" $loginForm \" et votre mot de passe est celui que vous avez enregistré lors de la création de votre compte.</p><br>
                                <p>Si jamais vous ne vous en souvenez plus, n'hésitez pas à contacter l'administrateur du site.</p>                             
                            </div>
                        </body>
                    </html>
        ";

                mail($to, $subject, $mailContent, implode("\r\n", $headers));

            $accountCreateMessage = "Votre compte a bien été créé. Vous pouvez maintenant vous connecter.";
            try {
                echo $this->twig->render('connexion.html.twig',
                    ['accountCreateMessage' => $accountCreateMessage]);
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
        if (!empty($_POST['title']) && !empty($_POST['description'])) {
            $this->user->dataCreateArticle($_POST['title'], $_POST['description'], $_POST['contenu'], $_SESSION['id']);
            $messageSystem = "Article créé avec succès !";
            try {
                $this->twig->addGlobal('session', $_SESSION);
                echo $this->twig->render('admin.html.twig',
                    ['messageSystem' => $messageSystem]);
            } catch (LoaderError $e) {
            } catch (RuntimeError $e) {
            } catch (SyntaxError $e) {
            }
        } else {
            $messageSystem = "Pour poster un article, vous devez renseigner un titre et un contenu.";
            try {
                $this->twig->addGlobal('session', $_SESSION);
                echo $this->twig->render('createArticle.html.twig',
                    ['messageSystem' => $messageSystem]);
            } catch (LoaderError $e) {
            } catch (RuntimeError $e) {
            } catch (SyntaxError $e) {
            }
        }
    }

    public function updateArticle() {
        if (!empty($_POST['titre']) && !empty($_POST['description'] && !empty($_POST['contenu']))) {
            $this->user->dataUpdateArticle($_POST['titre'], $_POST['description'], $_POST['contenu'], $_GET['id']);
            $messageSystem = "Article modifié avec succès !";
            try {
                $this->twig->addGlobal('session', $_SESSION);
                echo $this->twig->render('admin.html.twig',
                    ['messageSystem' => $messageSystem]);
            } catch (LoaderError $e) {
            } catch (RuntimeError $e) {
            } catch (SyntaxError $e) {
            }
        } else {
            $errorSystem = "Pour modifier un article, vous devez renseigner un titre et un contenu.";
            try {
                $this->twig->addGlobal('session', $_SESSION);
                echo $this->twig->render('admin.html.twig',
                    ['errorSystem' => $errorSystem]);
            } catch (LoaderError $e) {
            } catch (RuntimeError $e) {
            } catch (SyntaxError $e) {
            }
        }
    }

    public function deleteArticle() {
        $this->user->deleteArticle($_GET['id']);
        try {
            $errorSystem = "Votre article a bien été supprimé !";
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('admin.html.twig',
                ['errorSystem' => $errorSystem]);
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function createComment() {
        if (!empty($_POST['commentaire'])) {
            $this->user->dataCreateComment($_POST['commentaire'], $_GET['id'], $_SESSION['id']);
            $messageSystem = "Votre commentaire a été envoyé et sera visible après validation par un administrateur.";
            try {
                $this->twig->addGlobal('session', $_SESSION);
                echo $this->twig->render('home.html.twig',
                    ['messageSystem' => $messageSystem]);
            } catch (LoaderError $e) {
            } catch (RuntimeError $e) {
            } catch (SyntaxError $e) {
            }
        } else {
            $errorSystem = "Vous ne pouvez pas envoyer un commentaire vide.";
            try {
                $this->twig->addGlobal('session', $_SESSION);
                echo $this->twig->render('home.html.twig',
                    ['errorSystem' => $errorSystem]);
            } catch (LoaderError $e) {
            } catch (RuntimeError $e) {
            } catch (SyntaxError $e) {
            }
        }

    }

    public function updateComment() {
        $this->user->dataUpdateComment($_GET['id']);
        $messageSystem = "Le commentaire est maintenant publié et visible de tous.";
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('admin.html.twig',
                ['messageSystem' => $messageSystem]);
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function deleteComment() {
        $this->user->deleteComment($_GET['id']);
        $messageSystem = "Le commentaire a été supprimé !";
        try {
            $this->twig->addGlobal('session', $_SESSION);
            echo $this->twig->render('admin.html.twig',
                ['messageSystem' => $messageSystem]);
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
