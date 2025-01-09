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
                    if($_POST['psd']){
                        $pseudo_choisi=$_POST['psd'];
                    }
                    $requete="SELECT * FROM T_PROFIL_PRO WHERE com_pseudo='". $pseudo_choisi."';";
                    $result1 = $mysqli->query($requete);
                    if ($result1 == false){
                        echo "Error: La requête a echoué \n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit();
                    }
                    else{
                        $l=$result1->fetch_assoc();
                        if($l['pro_validite']=='A'){
                            $requete2="UPDATE T_PROFIL_PRO SET pro_validite='D' WHERE com_pseudo='".$pseudo_choisi."';";
                        }
                        else{
                            $requete2="UPDATE T_PROFIL_PRO SET pro_validite='A' WHERE com_pseudo='".$pseudo_choisi."';";
                        }
                        $result2 = $mysqli->query($requete2);
                        if ($result2 == false){
                            echo "Error: La requête a echoué \n";
                            echo "Errno: " . $mysqli->errno . "\n";
                            echo "Error: " . $mysqli->error . "\n";
                            exit();
                        }
                        
                        else{
                            header("Location:../admin_accueil.php");
                        }
                    }
                    ?>

                    
           
        <?php
        $mysqli->close();
        ?>
    </body>
</html>
