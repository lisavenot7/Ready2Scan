<!DOCTYPE html>
<html lang="en">
    <head>
    <?php session_start(); ?>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gestion des actualités</title>
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
    
        
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Espace administrateur</a>
                <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="admin_accueil.php">Accueil & profil </a></li>
                        <li class="nav-item"><a class="nav-link" href="admin_sujet.php">Gestion des sujets & fiches</a></li>
                        <li class="nav-item"><a class="nav-link" href="admin_hyp.php">Gestion des hyperliens </a></li>
                        <li class="nav-item"><a class="nav-link" href="deconnection.php">Deconnexion</a></li>
                    </ul>
                </div>
                
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="text-center">
                <div class="text-center">
            <form action="action/ajout_act.php" method="post">
                        <fieldset>
                        <h4 class='text-white-50 mx-auto mt-2 mb-5'>
                        <div class="text-center">
                        <h4 class='text-white mb-4' >
                            Pour ajouter une actualité :
                            </h4>
                        </div>
                                <br/>
                                <p>Titre de l'actualité : </br>
                                <input type="text" name="nom" placeholder="titre" required="required"/>
                                </p>
                                </br>
                                <p>Texte : 
                                </br>
                                <textarea class="fr-input" name="texte" placeholder="texte"  required="required"></textarea>
                                
                                </p>
                                </br>
                                
                                
                                <input type="submit" class="btn btn-outline-primary btn-sm" value="Ajouter">
                            </h2>
                        </fieldset>
                    </form>

                <a class='btn btn-primary' href='#about'>Gestion des actualités</a>
            </div>

                    
                    
                    </div>
                    </div>
            </div>
            
        </header>
        <section  id="about">
        <footer class="footer bg-black small text-center text-white-50">
            <div class="container px-4 px-lg-5">
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
                    if(!isset($_SESSION['login']))
                    {
                    header("Location:session.php");
                    }
                    $r="SELECT* FROM T_PROFIL_PRO WHERE com_pseudo='".$_SESSION['login']."';";
                        $rs1 = $mysqli->query($r);
                        if ($rs1== false){ // La requête a echoué
                            echo "Error: La requête a echoué \n";
                            echo "Errno: " . $mysqli->errno . "\n";
                            echo "Error: " . $mysqli->error . "\n";
                        exit();
                        }
                        $pro = $rs1->fetch_assoc();
                        if ($pro['pro_statut']!='G'){
                            header("Location:admin_accueil.php");
                        }
                    $requete="SELECT* FROM T_ACTUALITE_ACT ";
                        $res = $mysqli->query($requete);
                        if ($res == false){ // La requête a echoué
                            echo "Error: La requête a echoué \n";
                            echo "Errno: " . $mysqli->errno . "\n";
                            echo "Error: " . $mysqli->error . "\n";
                        exit();
                        }
                        else{
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
                            echo "<th >";
                            echo "Etat:";
                            echo"</th>";
                            echo "<th >";
                            echo "Action(s):";
                            echo"</th>";
                            echo"<th>";echo"</th>";
                           
                            while ($act = $res->fetch_assoc())
                            {
                                echo "<tr><td>";
                                echo ($act['act_titre']);
                                echo"</td><td>";
                                echo ($act['act_texte']);
                                echo"</td><td>";
                                echo ($act['com_pseudo']);
                                echo "</td><td >";
                                echo ($act['act_date']);
                                echo "</td><td >";
                                if($act['act_etat']=='E'){
                                    echo"En ligne";
                                }
                                else{echo"Caché";}
                                echo "</td><td >";
                                echo"<form action='action/cache.php' method='POST'>";
                                echo"<input type='hidden' name='act' value='".$act['act_id']."'/>";
                                echo("<button type='submit' class='btn btn-primary' name='changer'>Changer l etat</button>");
                                echo"</form>";
                                echo "</td><td >";
                                echo"<form action='action/del_act.php' method='POST'>";
                                echo"<input type='hidden' name='act' value='".$act['act_id']."'/>";
                                echo("<button type='submit' class='btn btn-primary' name='supprimer'>Supprimer</button>");
                                echo"</form>";
                                echo "</td></tr >";}
                            }
                            echo "</table>";

                         
                    
                   
                        
                    ?>
            
        </div></footer>
        
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