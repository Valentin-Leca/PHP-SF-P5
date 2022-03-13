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

    public function dataCreateArticle($title, $description, $contenu, $id) {
        $time = date("Y-m-d");
        $db = $this->connectBdd();
        $req = $db->prepare('INSERT INTO article VALUES(NULL, ?, ?, ?, ?, ?)');
        $req->execute(array($title, $description, $contenu, $time, $id));
    }

    public function getArticleHomePage() {
        $db = $this->connectBdd();
        $req = $db->prepare('SELECT *, article.id AS articleId,
        DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM article INNER JOIN utilisateur ON article.utilisateur_id = utilisateur.id ORDER BY article.id DESC LIMIT 3');
        $req->execute();
        return $req->fetchAll();
    }

    public function getOneArticle($id) {
        $db = $this->connectBdd();
        $req = $db->prepare('SELECT *, article.id AS article_id,
        DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM article INNER JOIN utilisateur ON article.utilisateur_id = utilisateur.id WHERE article.id = ?');
        $req->execute(array($id));
        return $req;
    }

    public function getAllArticle() {
        $db = $this->connectBdd();
        $req = $db->prepare('SELECT *, article.id AS articleId,
        DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM article INNER JOIN utilisateur ON article.utilisateur_id = utilisateur.id ORDER BY articleID DESC');
        $req->execute();
        return $req->fetchAll();
    }

    public function dataUpdateArticle($title, $description, $id) {
        $db = $this->connectBdd();
        $req = $db->prepare('UPDATE article SET titre = ?, description = ? WHERE id = ?');
        $req->execute(array($title, $description, $id));
    }

    public function deleteArticle($id) {
        $db = $this->connectBdd();
        $req = $db->prepare('DELETE FROM article WHERE id = ?');
        $req->execute(array($id));
    }

    public function getComment($id) {
        $db = $this->connectBdd();
        $req = $db->prepare('SELECT *,
       DATE_FORMAT(date_creation_com, \'%d/%m/%Y\') AS date_com FROM commentaire INNER JOIN utilisateur ON commentaire.utilisateur_id = utilisateur.id WHERE commentaire.article_id = ?');
        $req->execute(array($id));
        return $req->fetchAll();
    }

    public function getAllComment() {
        $db = $this->connectBdd();
        $req = $db->prepare('SELECT * FROM commentaire ORDER BY status ASC');
        $req->execute();
        return $req->fetchAll();
    }

    public function dataCreateComment($commentaire, $articleId, $utilisateurId) {
        $time = date("Y-m-d");
        $db = $this->connectBdd();
        $req = $db->prepare('INSERT INTO commentaire VALUES(NULL, ?, ?, ?, ?, 1)');
        $req->execute(array($commentaire, $articleId, $utilisateurId, $time));
    }

    public function dataUpdateComment($id) {
        $db = $this->connectBdd();
        $req = $db->prepare('UPDATE commentaire SET status = 2 WHERE id = ?');
        $req->execute(array($id));
    }

    public function deleteComment($id) {
        $db = $this->connectBdd();
        $req = $db->prepare('DELETE FROM commentaire WHERE id = ?');
        $req->execute(array($id));
    }
}
