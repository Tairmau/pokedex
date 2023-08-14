<?php

error_reporting(E_ALL); ini_set("display_errors", 1);

include("vues/entete.php") ;
require_once("util/class.PDO.pokedex.inc.php");


$pdo = PdoPokedex::getPdoPokedex();

if(!isset($_REQUEST['accueil']))
    $accueil = 'pokedex';
else
	$accueil = $_REQUEST['accueil'];


switch($accueil){

    case'pokedex':
        {               
            include('controler/pokecenter.php');

            include('vues/pokedex.php');

        }

}

?>