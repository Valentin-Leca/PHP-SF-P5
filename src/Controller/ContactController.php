<?php

namespace Valen\P5\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class ContactController {

    private FilesystemLoader $loader;
    private Environment $twig;

    public function __construct() {
        $this->loader = new FilesystemLoader('templates');
        $this->twig = new Environment($this->loader);
    }

    public function getContactForm() {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['message'])) {

            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=utf-8';
            $headers[]= "De : " . $email;

            $to = "valentin.val78@hotmail.fr";
            $subject = "Prise de contact de : " . $name;
            $mailContent = "
        <html lang=\"fr\">
                        <body>
                            <div align=\"center\">
                                <p>Bonjour ! Je suis $name :)</p><br />
                                <p>Mon adresse mail est : $email </p>
                                <p>Mon téléphone : $phone</p><br><br>
                                <p>$message</p>                                
                            </div>
                        </body>
                    </html>
        ";

            mail($to, $subject, $mailContent, implode("\r\n", $headers));
            try {
                echo $this->twig->render('home.html.twig');
            } catch (LoaderError $e) {
            } catch (RuntimeError $e) {
            } catch (SyntaxError $e) {
            }

        } else {
            try {
                echo $this->twig->render('contact.html.twig');
            } catch (LoaderError $e) {
            } catch (RuntimeError $e) {
            } catch (SyntaxError $e) {
            }

        }


    }

}