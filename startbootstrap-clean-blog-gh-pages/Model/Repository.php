<?php
namespace gregdamp\Model;

class Repository
{
    protected function dbConnect()
    {
        try {
            $db = new \PDO('mysql:host=localhost;dbname=projet_mentor;charset=utf8', 'root', '');
            return $db;
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}

?>