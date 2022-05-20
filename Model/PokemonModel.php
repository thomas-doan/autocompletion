<?php




class PokemonModel
{
    public function __construct()
    {
    }

    public function find($search)
    {
        $sqlVerif = "SELECT id_pokemon, nom FROM pokemon WHERE nom LIKE :nom";

        $requete = Database::connect_db()->prepare($sqlVerif);
        $requete->execute(array(
            "nom" => "%$search%",
        ));


        $select = $requete->fetchAll(PDO::FETCH_ASSOC);

        return $select;
    }
}
