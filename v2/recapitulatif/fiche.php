<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Detail de la fiche</title>
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
                <a class="navbar-brand" href="#page-top">Detail de la Fiche</a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        >
                        <li class="nav-item"><a class="nav-link" href="../index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="fichier_recapitulatif.php">Recapitulatif</a></li>
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
                    <?php
                        if(isset($_GET['code'])){
                            
                            $code_fiche=$_GET['code'];
                            
                            }
                        else {
                            echo("<h2 class='text-white-50 mx-auto mt-2 mb-5'>");
                            
                            echo ("Vous avez oublié le paramètre !");
                            echo("</h2>");
                            exit();
                            }
                        if (strlen($code_fiche)!=12){
                            echo("<h2 class='text-white-50 mx-auto mt-2 mb-5'>");
                            
                            echo ("Ce code n'a pas 12 caractères");
                            echo("</h2>");
                            exit();
                        }

                        $requete="SELECT * FROM `T_FICHE_FIC` JOIN T_SUJET_SUJ USING(suj_id) WHERE fic_code='".$code_fiche."';";
                        $requete1="SELECT * FROM `T_FICHE_FIC` JOIN T_ASSOCIATION_ASS USING(fic_id) JOIN 
                        T_HYPERLIEN_HYP USING(hyp_id) WHERE fic_code='".$code_fiche."';";
                                    //Affichage de la requête préparée
                                    //echo ($requete);
                                    $result1 = $mysqli->query($requete);
                                    $result2 = $mysqli->query($requete1);
                                    if ($result1 == false || $result2 == false) //Erreur lors de l’exécution de la requête
                                    { // La requête a echoué
                                    echo "Error: La requête a echoué \n";
                                    echo "Errno: " . $mysqli->errno . "\n";
                                    echo "Error: " . $mysqli->error . "\n";
                                    exit();
                                    }
                                    else if($result1->num_rows==0){
                                        echo("<h4 class='text-white-50 mx-auto mt-2 mb-5'>");
                                        echo("Aucune fiche ne porte ce code");
                                        echo("</h4>");
                                    }
                                   
                                    else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
                                    {
                                        $fic = $result1->fetch_assoc();

                                            if($fic['fic_etat']!='E'){
                                                echo("<h4 class='text-white-50 mx-auto mt-2 mb-5'>");
                                                echo("Cette fiche n'est pas en ligne");
                                                echo("</h4>");
                                            }

                                            else{
                                                echo("<div class=text-center>");
                                                echo("<h3 class='text-white-50 mx-auto mt-2 mb-5'>");
                                                echo($fic['fic_label']);
                                                echo("</h3>");
                                                echo "<br />";
                                                echo "<br />";
                                                $chemin='../images/'.$fic['fic_image'];
                                    
                                                echo("<img src=$chemin style='height: 10rem;' />");
                                                echo "<br />";
                                                echo "<br />";
                                                echo("<h2 class='text-white-50 mx-auto mt-2 mb-5'>");
                                                echo($fic['fic_contenue']);
                                                echo "<br />";
                                                echo "<br />";
                                                echo("Code de la fiche: ");
                                                echo($fic['fic_code']);
                                                echo "<br />";
                                                echo "<br />";
                                                echo("Provient du sujet: ");
                                                echo($fic['suj_nom']);
                                                echo "<br />";
                                                echo "<br />";
                                                echo "<div style='border-radius: 5px; border: 1px solid#FFFFFF;'>";
                                                echo "<br />";
                                                echo("Lien(s) associé(s): ");
                                                echo "<br />";
                                                if($result2->num_rows==0){
                                                    
                                                    echo("Aucun lien pour cette fiche");
                                                    echo "<br />";
                                                } 
                                                while($hyp=$result2->fetch_assoc()){
                                                    $url=$hyp['hyp_url'];
                                                    $nom=$hyp['hyp_nom']; 
                                                    echo("<a href=$url target='blank'>$nom</a>");
                                                    echo "<br />";

                                                }
                                                echo "<br />";
                                                echo("</div>");
                                                echo("</h2>");
                                                echo("</div>");
                                       
                
                                        

                                    }}

                    ?>
                    
                    
                   
                    
                </div>
            </div>
            
        </header>
        
        
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Exposition 
            Tableau villes bretonnes</div></footer>
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




