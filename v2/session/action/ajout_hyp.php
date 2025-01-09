<!DOCTYPE html>
<html lang="en">
    <head>
    <?php session_start(); ?>
    </head>
    <body >
                <?php
                    $mysqli = new mysqli('localhost','e22200744sql','Ep#?q?Ho','e22200744_db2');
                    if ($mysqli->connect_errno)
                    {
                        // Affichage d'un message d'erreur
                        echo "Error: Problème de connexion à la BDD \n";
                        echo "Errno: " . $mysqli->connect_errno . "\n";
                        echo "Error: " . $mysqli->connect_error . "\n";
                        // Arrêt du chargement de la page
                        exit();
                    }
                    if($_POST["nom"] && $_POST["url"]){
                        $hyp=htmlspecialchars($_POST["nom"]);
                        $url=htmlspecialchars($_POST["url"]);
                        
                    }
                    
                    
                    $r="INSERT INTO T_HYPERLIEN_HYP (hyp_nom,hyp_url) VALUES('".$hyp."','".$url."');";
                    $res = $mysqli->query($r);
                    if ($res == false){
                        echo "Error: La requête a echoué \n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit();
                    }
                    
                    
                    else{
                       
                        header("Location:../admin_hyp.php");
                    }
                    ?>

                    
           
        <?php
        $mysqli->close();
        ?>
    </body>
</html>