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
                    if($_POST['hyp']){
                        $hyp_choisi=$_POST['hyp'];
                    }
                    $r="SELECT * FROM T_FICHE_FIC WHERE suj_id=".$hyp_choisi.";";
                    $result2 = $mysqli->query($r);
                    if ($result2 == false){
                        echo "Error: La requête a echoué \n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit();
                    }
                    

                    
                    $r2="DELETE FROM T_ASSOCIATION_ASS WHERE hyp_id=".$hyp_choisi.";";
                    $requete="DELETE FROM T_HYPERLIEN_HYP WHERE hyp_id=".$hyp_choisi.";";
                     $result3 = $mysqli->query($r2);
                    $result1 = $mysqli->query($requete);
                   
                    if ($result1 == false || $result3==false){
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