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

    $pdo = Database::connect();
$sql="SELECT * FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY date ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute(); //on exécute la requête SQL
$user = $stmt->fetchAll(); //on récupère les résultats de la requête SQL


Database::disconnect();

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="livre-or">

<h1>Livre d'or</h1>
    <table border='1'>
    <tr>
        <th>Commentaire</th>
        <th>ecrit par</th>
        <th>ecrit le</th>
    </tr>
   <?php
   foreach ($user as $row) {
   ?><tr>
   <td><?php echo $row["commentaire"]; ?></td>
   <td><?php echo $row["login"]; ?></td>
   <td><?php echo $row["date"]; ?></td>
   </tr><?php
   }
   ?>
    </table>
    <div class="milieu">
    <a class="btn btn-success" href ="commentaire.php" role="button">Poster un commentaire</a>
    <a class="btn btn-success" href ="profil.php" role="button">Modifier votre profil</a>
    <a class="btn btn-success" href ="deco.php" role="button">Se déconnecter</a>
    </div>
    </div>
</body>
</html>


