<?php
namespace models;

use models\base\SQL;

class AuthModel extends SQL
{
    public function __construct()
    {
        parent::__construct('compte', 'id_Compte');
    }

    function login($email, $password){

        $stmt = $this->getPdo()->prepare("SELECT MotDePasse, id_Compte FROM compte WHERE ? = Email");
        $stmt->execute([$email]);
        $result = $stmt->fetch(\PDO::FETCH_OBJ);

        if (password_verify($password, $result->MotDePasse)) {
            return $result->id_Compte;
        }
        return "";
    }

    function creation($nom, $prenom, $email, $motDePasse) {
        $stmt = $this->getPdo()->prepare("INSERT INTO Compte (MotDePasse, Email, NomCompte, PrenomCompte) VALUES (?,?,?,?)");
        $hash = password_hash($motDePasse, PASSWORD_BCRYPT);
        $stmt->execute([$hash, $email, $nom, $prenom]);
    }
}