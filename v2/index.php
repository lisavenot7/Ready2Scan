<!-- 
 VENOT Lisa
 5 mars 2024
 application web sur une exposition de tableaux de villes bretonnes
 -->
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Exposition tableau de villes bretonnes</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Exposition à l'Atelier des Capucins</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">Actualités</a></li>
                        <li class="nav-item"><a class="nav-link" href="#projects">L'Exposition</a></li>
                        <li class="nav-item"><a class="nav-link" href="#signup">Nous contacter</a></li>
                        <li class="nav-item"><a class="nav-link" href="recapitulatif/fichier_recapitulatif.php">Recapitulatif</a></li>
                        <li class="nav-item"><a class="nav-link" href="inscriptions/inscription.php">Inscription</a></li>
                        <li class="nav-item"><a class="nav-link" href="session/session.php">Connexion</a></li>
                    
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">Expositon 2024</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Expositon de tableaux représentant des villes bretonnes</h2>
                        <a class="btn btn-primary" href="#about">Bienvenue</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
        
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
            <div class="container px-4 px-lg-5">
            <p class="mb-0 text-white-50">
            





            <?php
                
                //Préparation de la requête récupérant tous les profils
                $requete2="SELECT COUNT(*)  AS nb_fiche FROM T_FICHE_FIC WHERE fic_etat='E';";
                $requete1="SELECT COUNT(*)  AS nb_sujet FROM T_SUJET_SUJ;";
                //Affichage de la requête préparée
                $result3 = $mysqli->query($requete2);
                if ($result3 == false) //Erreur lors de l’exécution de la requête
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
                echo(" <div class='container px-4 px-lg-5'>
                <div class='row gx-4 gx-lg-5'>");
                $fic = $result3->fetch_assoc();
                echo("<div class='col'>");
                
                echo"<div class='card py-4 h-100'>";
                echo "<div class='card-body text-center'>";
                echo"<i class='fa-solid fa-sheet-plastic text-primary mb-2'></i>";
                echo("<h4 class='text-uppercase m-0'>");
                echo("Fiches");
                echo("</h4>");
                echo("<hr class='my-4 mx-auto'/>"); 
                echo("<h4 class='text-uppercase m-0'>");
                echo($fic['nb_fiche']);
                echo"</h4>";
                echo"</div>";
                echo"</div>";
               
                echo"</div>";
                }

                $result2 = $mysqli->query($requete1);
                if ($result2 == false) //Erreur lors de l’exécuiction de la requête
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
                
                
                $suj = $result2->fetch_assoc();
                echo("<div class='col'>");
                echo"<div class='card py-4 h-100'>";
                echo "<div class='card-body text-center'>";
                echo"<i class='fa-solid fa-book text-primary mb-2'></i>";
                echo("<h4 class='text-uppercase m-0'>");
                echo("Sujets");
                echo("</h4>");
                echo("<hr class='my-4 mx-auto'/>"); 
                echo("<h4 class='text-uppercase m-0'>");
                echo($suj['nb_sujet']);
                echo"</h4>";
                echo"</div>";
                echo"</div>";
                echo"</div>";
                                
                
                echo"</div>";echo"</div>";
                
                }

                ?>
               </p> 




                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <br/>
                        <h2 class="text-white mb-4">Actualités en temps réel</h2>
                    </div>
                </div>
                
                <?php
                //Préparation de la requête récupérant tous les profils
                $requete="SELECT * FROM T_ACTUALITE_ACT WHERE act_etat='E' LIMIT 10;";
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
                if($result1->num_rows==0){
                    echo("<h2 class='text-white-50 mx-auto mt-2 mb-5'>");
                    echo("Aucune actualité pour le moment pour le moment");
                    echo("</h2>");
                } 
                echo "<table class='table table-hover table-dark'>";
                echo "<th >";
                echo "Titre:";
                echo"</th>";
                echo "<th >";
                echo "Texte:";
                echo"</th>";
                echo "<th >";
                echo "Posté par:";
                echo"</th>";
                echo "<th >";
                echo "le:";
                echo"</th>";
                while ($actu = $result1->fetch_assoc())
                {
                echo "<tr >";
                echo"<td>";
                echo($actu['act_titre']);
                echo"</td><td>";
                echo($actu['act_texte'] );
                echo"</td>";
                echo"<td>";
                echo ($actu['com_pseudo'] );
                echo"</td><td>";
                echo ($actu['act_date']);
                echo"</td>";
                //echo "<br />";
                echo "</tr >";
                }
                echo "</table>";
                }
                //Ferme la connexion avec la base MariaDB
                
                ?>
                
                <img class="img-fluid" src="assets/img/silhouette.png" alt="..." />
            </div>
        </section>
        <!-- Projects-->
        
        <section class="projects-section bg-light" id="projects">
            <div class="container px-4 px-lg-5">
                <!-- Featured Project Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets/img/image2.jpg" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Contenue de l'exposition</h4>
                            <p class="text-black-50 mb-0">L'exposition de cette année comptera des tableaux représentant 3 grandes villes bretonnes. Ces villes ne sont 
                                autres que Brest, Concarneau et Lorient  </p>
                        </div>
                    </div>
                </div>
                <!-- Project One Row-->
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="assets/img/image1.jpg" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Hétérogénéité de l'exposition</h4>
                                    <p class="mb-0 text-white-50">Certains des tableaux exposés ont plusieurs siècle tandis que d'autres datent de seulement quelques années. Ceci 
                                        rend l'expositon très intéressantes puisqu'elle montre l'évolution de la perseption de ces villes ainsi leurs évolutions.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project Two Row-->
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="assets/img/image3.jpg" alt="..." /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white">Provenance</h4>
                                    <p class="mb-0 text-white-50">Les tableaux présent lors de cette exposition nous ont soit été prêtés par de musée célèbres ou non ou par les artistes eux-mêmes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Signup-->
        <section class="signup-section" id="signup">
            
        </section>
        <!-- Contact-->
        <section class="contact-section bg-black">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Adresse</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">25 Rue de Pontaniou, 29200 Brest</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="#!">venot.lisa.lv@gmail.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Téléphone</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">0633823898</div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
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