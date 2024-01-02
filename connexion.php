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

if (isset($_POST['envoye'])){
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    if(!empty($login) AND !empty($password)){
        $requser = $pdo->prepare("SELECT * FROM utilisateurs WHERE login = ? AND password = ?");
        $requser->execute(array($login, $password));
        $userexist = $requser->rowCount();
        if($userexist == 1){ 
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['login'] = $userinfo['login'];
            $_SESSION['password'] = $userinfo['password'];
            header("Location: profil.php?id=".$_SESSION['id']);
        }
        else{
            echo "Mauvais login ou password";
        }
    }
    else{
        echo "Veuillez remplir tous les champs";
    }
}




if(isset($_POST['id']) AND $_POST['id'] > 0) {
    $getid = intval($_POST['id']);
    $pdo = Database::connect();
    $requser = $pdo->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

}



    if($_SERVER["REQUEST_METHOD"] =='POST'){
        $pdo = Database::connect();
        $login = $_POST["login"];
        $password = $_POST["password"];
        $sql="SELECT * FROM utilisateurs WHERE login='$login' AND password='$password'";
        $stmt = $pdo->prepare($sql); //on prépare la requête SQL
        $stmt->execute(); //on exécute la requête SQL
    }




    if (isset($_POST["login"])){
        $_SESSION["login"] = $login;
        $_SESSION["password"] = $password;
        header("Location: profil.php");
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
    <div class="fond-connexion">
        <div class="blanc">
        <h1>Connexion</h1>

        </div>
<form method="post" >
    Login: <input type="text" name="login" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit">
</form>
</div>
</body>
</html>




