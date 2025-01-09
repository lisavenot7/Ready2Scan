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
                    if($_POST['suj']){
                        $suj_choisi=$_POST['suj'];
                    }
                    $r="SELECT * FROM T_FICHE_FIC WHERE suj_id=".$suj_choisi.";";
                    
                    $result2 = $mysqli->query($r);
                    $fic= $result2->fetch_assoc();
                    if ($result2 == false){
                        echo "Error: La requête a echoué \n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit();
                    }
                    if($result2->num_rows>0){
                        
                        $r1="DELETE FROM T_ASSOCIATION_ASS WHERE fic_id IN(
                        SELECT fic_id FROM T_ASSOCIATION_ASS JOIN T_FICHE_FIC USING (fic_id) WHERE suj_id=".$suj_choisi.");";
                        $result3 = $mysqli->query($r1);
                        if ($result3 == false){
                            echo "Error: La requête a echoué \n";
                            echo "Errno: " . $mysqli->errno . "\n";
                            echo "Error: " . $mysqli->error . "\n";
                            exit();
                    }
                        $r2="DELETE FROM T_FICHE_FIC WHERE suj_id=".$suj_choisi.";";
                        $result3 = $mysqli->query($r2);
                        if ($result3 == false){
                            echo "Error: La requête a echoué \n";
                            echo "Errno: " . $mysqli->errno . "\n";
                            echo "Error: " . $mysqli->error . "\n";
                            exit();
                    }

                    }

                    $requete="DELETE FROM T_SUJET_SUJ WHERE suj_id=".$suj_choisi.";";
                    $result1 = $mysqli->query($requete);
                    if ($result1 == false){
                        echo "Error: La requête a echoué \n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit();
                    }
                    
                    else{
                       
                        header("Location:../admin_sujet.php");
                    }
                    ?>

                    
           
        <?php
        $mysqli->close();
        ?>
    </body>
</html>