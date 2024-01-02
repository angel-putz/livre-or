<?php


class Database{

    private static $servername = 'localhost';
    private static $username = 'root';
    private static $password = '';
    private static $BDD ='livreor';
    private static $conn = null;
    
    
    public static function _construct(){
        die('Init function is not allowed');
    }
    
    public static function connect(){ //fonction de connexion à la BDD
        if (null == self::$conn){ //si la connexion est nulle
            try{ //on essaie de se connecter
                self::$conn = new PDO("mysql:host=".self::$servername.";"."dbname=".self::$BDD,self::$username,self::$password); //on se connecte à la BDD
            }catch(PDOException $e){
                die($e->getMessage());
            }
        }
        return self::$conn;
    }
    
    public static function disconnect(){
        self::$conn = null;
    }
    
    }

    session_start();

if(isset($_SESSION['login'])) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pdo = Database::connect();
        $commentaire = $_POST['commentaire'];

        $id_utilisateur = $pdo->prepare("SELECT id FROM utilisateurs WHERE login = '".$_SESSION['login']."'"); //on prépare la requête SQL
        $id_utilisateur->execute(); //on exécute la requête SQL
        $id_utilisateur = $id_utilisateur->fetch()['id']; //on récupère l'id de l'utilisateur

        
        
        $stmt = $pdo->prepare("INSERT INTO commentaires (id_utilisateur, commentaire , date) VALUES ('$id_utilisateur' , '$commentaire' ,NOW())");
        $stmt->execute();
        header("Location: livre-or.php");
        Database::disconnect();
    }

}



Database::disconnect();


?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body>
        <div class="fond-commentaire">
            <div class="blanc">
        <h1>Vous pouvez poster un commentaire ici</h1>
            </div>
        <div class="milieu">
        <a class="btn btn-success" href="livre-or.php" role="button">Retour au livre d'or</a>
        </div>        
        <form method="post">
            <label for="commentaire">Commentaire</label> 
            <input type="text" name="commentaire" id="commentaire">
            <input type="submit" value="Envoyer">
        </form>
        </div>
    </body>
</html>