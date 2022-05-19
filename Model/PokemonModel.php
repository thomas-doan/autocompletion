<?php


define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "autocompletion");

class PokemonModel
{
    public function __construct()
    {
        $dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;

        try {
            $this->bdd = new PDO($dsn, DBUSER, DBPASS);

            $this->bdd->exec("SET NAMES utf8");

            $this->bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,  PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur de connexion a la base: " . $e->getMessage());
        }
        return $this->bdd;
    }

    /*     public function find($search)
    {
        $sqlVerif = "SELECT * FROM utilisateurs WHERE nom LIKE :nom";

        $requete = $this->bdd->prepare($sqlVerif);
        $requete->execute(array(
            ":nom => "%$search%", 
        ));

        $select = $requete->fetchAll();

        return $select;
    } */
}
