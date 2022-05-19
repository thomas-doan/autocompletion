<?php

//constante d'environnement
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "autocompletion");


class UserModel
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $password;

    protected $bdd;

    //le constructeur
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



    public function findByEmail($email)
    {
        $sqlVerif = "SELECT * FROM utilisateurs WHERE email =:email";

        $requete = $this->bdd->prepare($sqlVerif);

        $requete->bindValue(":email", $email, PDO::PARAM_STR);


        $requete->execute();

        $select = $requete->fetchAll();

        return $select;
    }


    public function register($nom, $prenom, $email, $password)
    {

        $sql1 = "INSERT INTO `utilisateurs`(`nom`, `prenom`, `email`, `password`) VALUES ( :nom,:prenom , :email, :password)";

        $requete1 = $this->bdd->prepare($sql1);

        $requete1->bindValue(":nom", $nom, PDO::PARAM_STR);
        $requete1->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $requete1->bindValue(":email", $email, PDO::PARAM_STR);
        $requete1->bindValue(":password", $password, PDO::PARAM_STR);

        //ON EXECUTE LA REQUETE
        $requete1->execute();
    }


    public function connect($email, $password)
    {

        $sql = "SELECT * FROM `utilisateurs` WHERE email = :email AND password = :password";

        $requete = $this->bdd->prepare($sql);


        $requete->bindValue(":email", $email, PDO::PARAM_STR);
        $requete->bindValue(":password", $password, PDO::PARAM_STR);

        //ON EXECUTE LA REQUETE
        $requete->execute();

        $utilisateur = $requete->fetch();

        return $utilisateur;
    }
}
