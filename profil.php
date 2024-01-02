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



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST["login"];
        $password = $_POST["password"];
        $pdo = Database::connect();
        $sql="UPDATE utilisateurs SET login = '$login', password = '$password' WHERE login = '$_SESSION[login]'";
        $stmt = $pdo->prepare($sql); //on prépare la requête SQL
        $stmt->execute(); //on exécute la requête SQL
        echo "Votre login et votre password ont bien été modifiés";
          
        ?>
        <?php
        exit();
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
    <div class="fond-profil">
<div class="blanc">
        <h1> Vous pouvez changer vos login et password ici ou poster un commentaire</h1>
</div>
    <form method="post">
        Nouveau login : <input type="text" name="login" required><br>
        Nouveau password : <input type="password" name="password" required><br>
        <div class="button" style="width: 190px;">
        <a class="btn btn-success" href ="commentaire.php" role="button">Poster un commentaire</a><br>
        </div>
        <input type="submit" name="envoye" style="margin-top: 10px;">
    </form>
    </div>
    </body>
    </html>