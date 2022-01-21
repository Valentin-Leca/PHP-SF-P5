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
            echo $this->twig->render('home.html.twig');
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function getAboutPage() {
        try {
            echo $this->twig->render('about.html.twig');
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function getArticlePage() {
        try {
            echo $this->twig->render('article.html.twig');
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function getContactPage() {
        try {
            echo $this->twig->render('contact.html.twig');
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function getConnexionPage() {
        try {
            echo $this->twig->render('connexion.html.twig');
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }

    public function getErrorPage() {
        try {
            echo $this->twig->render('error.html.twig');
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }
}