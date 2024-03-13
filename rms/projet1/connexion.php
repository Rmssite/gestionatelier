<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
</head>
<body>
    <?php
        $serveur="localhost";
        $log="root";
        $passw="";

        try{
            $connection= new PDO("mysql:host=$serveur; dbname=rmsbd",$log,$passw);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo'connection reussie </br>';
        }
        catch(PDOException $e){
            echo 'echec de la connection: '.$e->getMessage();
        }
    ?>
    
</body>
</html>