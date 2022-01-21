<?php

namespace Valen\P5;

require 'vendor/autoload.php';
use Valen\P5\Controller\PageController;

$pageController = new PageController();

try {
    if (isset($_GET['home'])) {
        $pageController->getHomePage();
    } elseif (isset($_GET['about'])) {
        $pageController->getAboutPage();
    } elseif (isset($_GET['article'])) {
        $pageController->getArticlePage();
    } elseif (isset($_GET['contact'])) {
        $pageController->getContactPage();
    } elseif (isset($_GET['connexion'])) {
        $pageController->getConnexionPage();
    } else {
        $pageController->getErrorPage();
    }
} catch (\Twig\Error\LoaderError $e) {
} catch (\Twig\Error\RuntimeError $e) {
} catch (\Twig\Error\SyntaxError $e) {
}