<?php
    $pdo = PdoPokedex::getPdoPokedex();

    if(!isset($_REQUEST['action']))
    $action = 'pokedex';
    else
	$action = $_REQUEST['action'];


switch($action){

    case'pokeinfo':
        {
            $lespokemon = $pdo->pokemon();

            $pokemonName = $_REQUEST['name'];

            $infos = $pdo->pokeinfo($pokemonName);

        }

}

?>