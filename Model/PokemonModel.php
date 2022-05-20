<?php




class PokemonModel
{
    public function __construct()
    {
    }

    public function find($search)
    {
        $sqlVerif = "SELECT * FROM pokemon WHERE nom LIKE :nom";

        $requete = Database::connect_db()->prepare($sqlVerif);
        $requete->execute(array(
            "nom" => "%$search%",
        ));


        $select = $requete->fetchAll();

        return $select;
    }
}
