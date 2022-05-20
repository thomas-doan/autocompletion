<?php
require_once '../Model/PokemonModel.php';


class indexController
{

    public function methodSearch($valeur)
    {
        $pokemon = new PokemonModel();
        $searchResult = $pokemon->find($valeur);
        // var_dump($searchResult);

        echo json_encode($searchResult);
    }
}
