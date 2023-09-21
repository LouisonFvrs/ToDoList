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
        $stmt = $this->getPdo()->prepare("SELECT * FROM compte WHERE ? = Nom AND password(?) = MotDePasse");
        $stmt->execute([$email, $password]);

        if($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }
}