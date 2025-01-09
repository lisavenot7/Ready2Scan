<!DOCTYPE html>
<html lang="en">
    <head>
    <?php session_start(); ?>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gestion des hyperliens</title>
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
                        if ($pro['pro_statut']=='G'){
                            echo"<nav class='navbar navbar-expand-lg navbar-light fixed-top' id='mainNav'><div class='container px-4 px-lg-5'><a class='navbar-brand' href='#page-top'>Espace administrateur</a>";
                            echo"<ul class='navbar-nav ms-auto'>";
                            echo"<li class='nav-item'><a class='nav-link' href='admin_accueil.php'>Accueil & profil  </a></li>";
                        echo"<li class='nav-item'><a class='nav-link' href='admin_act.php'>Gestion des actualités</a></li>";
                        echo"<li class='nav-item'><a class='nav-link' href='admin_sujet.php'>Gestion des sujets & fiches </a></li>";
                        
                        echo"<li class='nav-item'><a class='nav-link' href='deconnection.php'>Deconnexion</a></li>";
                
            echo"</ul></div></div></nav>";
                        }
                        else{
                            echo"<nav class='navbar navbar-expand-lg navbar-light fixed-top' id='mainNav'><div class='container px-4 px-lg-5'><a class='navbar-brand' href='#page-top'>Espace administrateur</a>";
                            echo"<ul class='navbar-nav ms-auto'>";
                            echo"<li class='nav-item'><a class='nav-link' href='admin_accueil.php'>Accueil</a></li>";
                        echo"<li class='nav-item'><a class='nav-link' href='admin_sujet.php'>Gestion des sujets & fiches </a></li>";
                        echo"<li class='nav-item'><a class='nav-link' href='deconnection.php'>Deconnexion</a></li>";
                
                        echo"</ul></div></div></nav>";
                        }
        ?>
        
        
        <!-- Masthead-->
        <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="text-center">
            <form action="action/ajout_hyp.php" method="post">
                        <fieldset>
                        <h4 class='text-white-50 mx-auto mt-2 mb-5'>
                        <div class="text-center">
                        <h4 class='text-white mb-4' >
                            Pour ajouter un hyperlien :
                            </h4>
                        </div>
                                
                                <p>Nom du lien :
                                <input type="text" name="nom" placeholder="nom" required="required"/>
                                </p>
                                
                                <p>URL : 
                                <input type="text" name="url" placeholder="url" size=50 required="required"/>
                             
                                
                                
                                
                                <input type="submit" class="btn btn-outline-primary btn-sm" value="Ajouter">   </p>
                            </h2>
                        </fieldset>
                    </form>
                    <form action="action/ajout_hypfic.php" method="post">
                        <fieldset>
                        <h4 class='text-white-50 mx-auto mt-2 mb-5'>
                        <div class="text-center">
                        <h4 class='text-white mb-4' >
                            Pour ajouter un hyperlien sur une fiche :
                            </h4>
                        </div>
                                
                                <p>Nom du lien :
                                <input type="text" name="nom" placeholder="nom" required="required"/>
                                </p>
                                
                                <p>Code de la fiche : 
                                
                                <input type="text" name="fic" placeholder="code" required="required"/>
                               
                                
                                
                                
                                <input type="submit" class="btn btn-outline-primary btn-sm" value="Ajouter"> </p>
                            </h2>
                        </fieldset>
                    </form>

                <a class='btn btn-primary' href='#about'>Gestion des hyperliens</a>
            </div>

                    
                    
                    </div>
                    </div>
            </div>
            
        </header>
        <section  id="about">
        <footer class="footer bg-black small text-center text-white-50">
            <div class="container px-4 px-lg-5">
            <?php
                    
                    $requete="SELECT* FROM T_HYPERLIEN_HYP ";
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
                            echo "Nom:";
                            echo"</th>";
                            echo "<th >";
                            echo "URL:";
                            echo"</th>";
                            echo "<th >";
                            echo "Fiches associée(s):";
                            echo"</th>";
                            echo "<th >";
                            echo "Action(s):";
                            echo"</th>";
                           
                            while ($hyp = $res->fetch_assoc())
                            {
                                echo "<tr><td>";
                                echo ($hyp['hyp_nom']);
                                echo"</td><td>";
                                echo ($hyp['hyp_url']);
                                echo"</td><td>";
                                $requete2="SELECT * FROM T_FICHE_FIC JOIN T_ASSOCIATION_ASS USING(fic_id) WHERE hyp_id=".$hyp['hyp_id'].";";
                            
                                $result2 = $mysqli->query($requete2);
                                if ($result2 == false) { 
                                    echo "Error: La requête a echoué \n";
                                    echo "Errno: " . $mysqli->errno . "\n";
                                    echo "Error: " . $mysqli->error . "\n";
                                    exit();
                                }
                                else if($result2->num_rows==0){
                                    echo"Aucune fiche reliés";
                                }
                 
                                else{
                                while ($fic = $result2->fetch_assoc())
                                {   echo "<table class='table table-hover table-dark'>";
                                    echo "<tr><td>";
                                    echo"-";
                                echo($fic['fic_code']."     ");
                                echo"<br/>";
                                $chemin='../images/'.$fic['fic_image'];
                                echo("<img src=$chemin style='height: 2rem;' />");
                                echo "</td><td >";
                                echo"<form action='action/del_hypfic.php' method='POST'>";
                                echo"<input type='hidden' name='fic' value='".$fic['fic_id']."'/>";
                                echo"<input type='hidden' name='hyp' value='".$hyp['hyp_id']."'/>";
                                echo("<button type='submit' class='btn btn-primary' name='sup'>Supprimer le lien de la fiche</button>");
                                echo"</form>";
                                echo "</td></tr>";}
                                echo"</table>";
                            }echo "</td><td >";
                                echo"<form action='action/del_hyp.php' method='POST'>";
                                echo"<input type='hidden' name='hyp' value='".$hyp['hyp_id']."'/>";
                                echo("<button type='submit' class='btn btn-primary' name='supprimer'>Supprimer le lien</button>");
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