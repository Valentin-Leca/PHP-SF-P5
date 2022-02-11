<?php

namespace Valen\P5\Model;

class BddModel {

    protected function connectBdd() {
        try {
            $bdd = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
            return $bdd;
        } catch (\Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}