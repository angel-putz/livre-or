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
    
    $pdo = Database::connect();
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST["login"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
    
        if ($password != $confirm_password) {
            echo "Passwords do not match.";
        } else {
            // 
            $sql="INSERT INTO utilisateurs (login, password) VALUES ('$login','$password')";
            $stmt = $pdo->prepare($sql); //on prépare la requête SQL
            $stmt->execute(); //on exécute la requête SQL
            header("Location: connexion.php");
            exit();
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
    <div class="fond-inscription">
    <div class="blanc">
    <h1>Inscription</h1>
    <p>Vous pouvez vous inscrire ici</p>
    </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Login: <input type="text" name="login" required><br>
        Password: <input type="password" name="password" required><br>
        Confirm Password: <input type="password" name="confirm_password" required><br>
        <input type="submit">
    </form>
    </div>
    </body>
    </html>