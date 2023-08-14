<?php
/** 
 * Classe d'accès aux données pour l'application Pokedex. 
 * Utilise les services de la classe PDO.
 *
 * @package default
 * @version 1.0
 * @link http://www.php.net/manual/fr/book.pdo.php
 */

class PdoPokedex
{   		
    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=pokedex'; // Replace with your actual database name
    private static $user = 'root'; // Replace with your actual database username
    private static $mdp = ''; // Replace with your actual database password
    private static $monPdo;
    private static $monPdoPokedex = null;

    /**
     * Constructeur privé, crée l'instance de PDO qui sera sollicitée
     * pour toutes les méthodes de la classe
     */				
    private function __construct()
    {
        PdoPokedex::$monPdo = new PDO(PdoPokedex::$serveur.';'.PdoPokedex::$bdd, PdoPokedex::$user, PdoPokedex::$mdp); 
        PdoPokedex::$monPdo->query("SET CHARACTER SET utf8");
    }

    public function __destruct(){
        PdoPokedex::$monPdo = null;
    }

    /**
     * Fonction statique qui crée l'unique instance de la classe
     *
     * Appel : $instancePdoPokedex = PdoPokedex::getPdoPokedex();
     * @return l'unique objet de la classe PdoPokedex
     */
    public  static function getPdoPokedex()
    {
        if(PdoPokedex::$monPdoPokedex == null)
        {
            PdoPokedex::$monPdoPokedex = new PdoPokedex();
        }
        return PdoPokedex::$monPdoPokedex;  
    }

    /**
     * Fonction pour vérifier la connexion d'un utilisateur.
     *
     * @param string $nom
     * @param string $prenom
     * @param string $nlettre
     * @param string $classe
     * @param string $specialite
     * @param string $numclasse
     * @return int Nombre de résultats correspondants à la requête
     */

	 
    public function pokemon()
    {
        $req = "SELECT * FROM `pokemon` ORDER BY id ASC;";
        $res = PdoPokedex::$monPdo->prepare($req);
        $res->execute();
        
        $lespokemon = $res->fetchAll();
        return $lespokemon;
    }
    public function pokeinfo($pokemonName)
    {
        $req = "SELECT description,type1,type2,photo FROM pokemon WHERE pokemonName = '$pokemonName';";
        $res = PdoPokedex::$monPdo->prepare($req);
        $res->execute();

        $lespokemon = $res->fetchAll();
        return $lespokemon;
    }
}
?>
