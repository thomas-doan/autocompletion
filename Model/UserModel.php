<?php



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
    }



    public function findByEmail($email)
    {
        $sqlVerif = "SELECT * FROM utilisateurs WHERE email =:email";

        $requete = Database::connect_db()->prepare($sqlVerif);

        $requete->bindValue(":email", $email, PDO::PARAM_STR);


        $requete->execute();

        $select = $requete->fetchAll();

        return $select;
    }


    public function register($nom, $prenom, $email, $password)
    {

        $sql1 = "INSERT INTO `utilisateurs`(`nom`, `prenom`, `email`, `password`) VALUES ( :nom,:prenom , :email, :password)";

        $requete1 = Database::connect_db()->prepare($sql1);

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

        $requete = Database::connect_db()->prepare($sql);


        $requete->bindValue(":email", $email, PDO::PARAM_STR);
        $requete->bindValue(":password", $password, PDO::PARAM_STR);

        //ON EXECUTE LA REQUETE
        $requete->execute();

        $utilisateur = $requete->fetch();

        return $utilisateur;
    }
}
