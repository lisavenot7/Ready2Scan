<!DOCTYPE html>
<html lang="en">
    <head>
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
                    if($_POST['act']){
                        $act_choisi=$_POST['act'];
                    }
                    

                    $requete="DELETE FROM T_ACTUALITE_ACT WHERE act_id=".$act_choisi.";";
                    $result1 = $mysqli->query($requete);
                    if ($result1 == false){
                        echo "Error: La requête a echoué \n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit();
                    }
                    
                    else{
                       
                        header("Location:../admin_act.php");
                    }
                    ?>

                    
           
        <?php
        $mysqli->close();
        ?>
    </body>
</html>