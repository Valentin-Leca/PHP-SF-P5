<?php

namespace Valen\P5\Model;

class BddModel {

    protected function connectBdd() {
        try {
            $bdd = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
            return $bdd;
        } catch (\Exception $e) {
            return 'Erreur :' . $e->getMessage();
        }
    }
}
