<?php

namespace Valen\P5\Model;

class UserModel extends BddModel {

    public function connectAccount($login) {
        $db = $this->connectBdd();
        $req = $db->prepare('SELECT * FROM utilisateur WHERE login = :login');
        $req->execute(array('login' => $login));
        return $data = $req->fetch();
    }

    public function compareLogin($loginForm) {
        $db = $this->connectBdd();
        $req = $db->prepare('SELECT * FROM utilisateur WHERE login = ?');
        $req->execute(array($loginForm));
        return $req->rowCount();
    }

    public function dataCreateAccount($nom, $prenom, $login, $email, $passHash) {
        $db = $this->connectBdd();
        $req = $db->prepare('INSERT INTO utilisateur VALUES(NULL, ?, ?, ?, ?, ?, 1)');
        $req->execute(array($nom, $prenom, $login, $email, $passHash));
    }

    public function createArticle($title, $description, $id) {
        $time = date("Y-m-d");
        $db = $this->connectBdd();
        $req = $db->prepare('INSERT INTO article VALUES(NULL, ?, ?, ?, ?)');
        $req->execute(array($title, $description, $time, $id));
    }
}