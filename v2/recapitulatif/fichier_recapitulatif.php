
 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Recapitulatif du contenue de l'application</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
    <?php
                $mysqli = new mysqli('localhost','eXXXXXXXXsql','XXXXXXXX','eXXXXXXXX_db2');
                if ($mysqli->connect_errno)
                {
                    // Affichage d'un message d'erreur
                    echo "Error: Problème de connexion à la BDD \n";
                    echo "Errno: " . $mysqli->connect_errno . "\n";
                    echo "Error: " . $mysqli->connect_error . "\n";
                    // Arrêt du chargement de la page
                    exit();
                }
                // Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
                if (!$mysqli->set_charset("utf8")) {
                    printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
                    exit();
                }
                ?>
        
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Recapitulatif</a>
                
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="../index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="../inscriptions/inscription.php">Inscription</a></li>
                        <li class="nav-item"><a class="nav-link" href="../session/session.php">Connexion</a></li>
                    
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">

                    
                   <h2 class='text-white-50 mx-auto mt-2 mb-5'>
                    <?php
                            //Préparation de la requête récupérant tous les profils
                            $requete="SELECT * FROM T_SUJET_SUJ ;";
                            //Affichage de la requête préparée
                            //echo ($requete);
                            $result1 = $mysqli->query($requete);
                            if ($result1 == false) //Erreur lors de l’exécution de la requête
                            { // La requête a echoué
                            echo "Error: La requête a echoué \n";
                            echo "Errno: " . $mysqli->errno . "\n";
                            echo "Error: " . $mysqli->error . "\n";
                            exit();
                            }
                            else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
                            {
                            //echo "<br />";
                            //echo($result1->num_rows); //Donne le bon nombre de lignes récupérées
                            //echo "<br />";
                            while ($suj = $result1->fetch_assoc())
                            {
                            echo("<h2 class='text-white-50 mx-auto mt-2 mb-5'>");
                            
                            echo($suj['suj_nom']);
                            
                            echo("</h2>");
                            
                            $requete2="SELECT * FROM T_FICHE_FIC WHERE fic_etat='E' AND suj_id=".$suj['suj_id'].";";
                            
                            $result2 = $mysqli->query($requete2);
                            if ($result2 == false) //Erreur lors de l’exécution de la requête
                            { // La requête a echoué
                            echo "Error: La requête a echoué \n";
                            echo "Errno: " . $mysqli->errno . "\n";
                            echo "Error: " . $mysqli->error . "\n";
                            exit();
                            }
                           
                            else if($result2->num_rows==0){
                                echo("<h2 class='text-white-50 mx-auto mt-2 mb-5'>");
                                echo("Aucune fiche pour le moment");
                                echo("</h2>");
                            } 
                            else{
                             echo(" <div class='container px-4 px-lg-5'>
                                    <div class='row gx-4 gx-lg-5'>");
                                while ($fic = $result2->fetch_assoc())
                                {
                                
                                $detail='fiche.php?code='.$fic['fic_code'];
                                    
                                echo("<div class='col-3'>");
                                echo"<div class='card' style='width: 100%;'>";
                                echo "<a href=$detail>";
                                echo"<div class='card-body text-center'>";
                                
                                $chemin='../images/'.$fic['fic_image'];
                                
                                echo("<img src=$chemin style='height: 4rem;' />");
                                echo("<div class='small text-black-50' style='font-size: 12px;'>");
                                echo($fic['fic_label']);
                                echo"</div>";
                                
                                echo"</div>";
                                echo"</a>";
                                echo"</div>";
                                echo"</div>";
                                

                                }echo"</div>";
                                echo"</div>";
                                
                            }}
                            
                            }
                
                ?>
                    </div>
                </div>
            </div>
            
        </header>
        
        
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Exposition Tableau villes bretonnes</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <?php
        $mysqli->close();
        ?>
    </body>
</html>
