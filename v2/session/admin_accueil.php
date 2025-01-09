<!DOCTYPE html>
<html lang="en">
    <head>
    <?php session_start(); 
    ?>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Accueil </title>
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
                    $requete="SELECT* FROM T_PROFIL_PRO WHERE com_pseudo='".$_SESSION['login']."';";
                        $res = $mysqli->query($requete);
                        if ($res == false){ // La requête a echoué
                            echo "Error: La requête a echoué \n";
                            echo "Errno: " . $mysqli->errno . "\n";
                            echo "Error: " . $mysqli->error . "\n";
                        exit();
                        }
                        $pro = $res->fetch_assoc();
                        if ($pro['pro_statut']=='G'){
                            echo"<nav class='navbar navbar-expand-lg navbar-light fixed-top' id='mainNav'><div class='container px-4 px-lg-5'><a class='navbar-brand' href='#page-top'>Espace administrateur</a>";
                            echo"<ul class='navbar-nav ms-auto'>";
                        echo"<li class='nav-item'><a class='nav-link' href='admin_act.php'>Gestion des actualités</a></li>";
                        echo"<li class='nav-item'><a class='nav-link' href='admin_sujet.php'>Gestion des sujets & fiches </a></li>";
                        echo"<li class='nav-item'><a class='nav-link' href='admin_hyp.php'>Gestion des hyperliens </a></li>";
                        echo"<li class='nav-item'><a class='nav-link' href='deconnection.php'>Deconnexion</a></li>";
                
            echo"</ul></div></div></nav>";
                        }
                        else{
                            echo"<nav class='navbar navbar-expand-lg navbar-light fixed-top' id='mainNav'><div class='container px-4 px-lg-5'><a class='navbar-brand' href='#page-top'>Espace administrateur</a>";
                            echo"<ul class='navbar-nav ms-auto'>";
                        echo"<li class='nav-item'><a class='nav-link' href='admin_sujet.php'>Gestion des sujets & fiches </a></li>";
                        echo"<li class='nav-item'><a class='nav-link' href='admin_hyp.php'>Gestion des hyperliens </a></li>";
                        echo"<li class='nav-item'><a class='nav-link' href='deconnection.php'>Deconnexion</a></li>";
                
                        echo"</ul></div></div></nav>";
                        }
        ?>
        

        <!-- Masthead-->
        <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="text-center">
                <?php
                    
                    
                        echo"<h4 class='text-white mb-4'>";
                        echo"BIENVENUE    ";
                        echo "<br/>";
                        echo($_SESSION['login']); 
                        echo"</h4>";
                        echo "<br />";
                       
                        
                        
                        
                        
                        
                            echo"<div class='text-start'>";
                            echo"<h4 class='text-white mb-4' >";
                            echo"VOTRE PROFIL:";
                            echo"</h4>";
                            echo"<h4 class='text-white-50 mx-auto mt-2 mb-5'>";
                            
                            echo($pro['pro_nom']." ".$pro['pro_prenom']);
                            echo"<br/>";
                            echo"Votre profil est ";
                            if ($pro['pro_validite']=='A'){
                                echo("activé");
                            }
                            else{echo("désactivé");}
                            echo"<br/>";
                            echo"Vous avez le statut de ";
                            if ($pro['pro_statut']=='G'){
                                echo("gestionnaire");
                            }
                            else{echo("membre");}
                            echo"<br/>";
                            echo("Votre profil à été crée le ".$pro['pro_date']);
                            echo"<br/>";echo"</h4>";
                            
                            echo"<br/>";
                            
                            echo"</div>";
                            if ($pro['pro_statut']=='G'){
                                echo("<a class='btn btn-primary' href='#about'>Gestion des profils</a>");
                            }
                            

                         
                        
                    ?>

                    </h2>
                    
                    </div>
                    </div>
            </div>
            
        </header>
        <section  id="about">
        <footer class="footer bg-black small text-center text-white-50">
            <div class="container px-4 px-lg-5">
            <div class="text-center">
                <?php
                    if($pro['pro_statut']=='G'){
                     $requete1="SELECT* FROM T_PROFIL_PRO ;";
                     $res1 = $mysqli->query($requete1);
                     if ($res1 == false){ // La requête a echoué
                         echo "Error: La requête a echoué \n";
                         echo "Errno: " . $mysqli->errno . "\n";
                         echo "Error: " . $mysqli->error . "\n";
                     exit();
                     }
                       
                     else{
                        $nb=$res1->num_rows;
                        
                        echo"<div class='text-center>";
                        echo"<div class='card' style='width: 25rem;'>";
                        echo"<i class='fa-solid fa-user text-primary mb-4'></i>";
                        echo("<h4 >");
                        echo("Nombre de profil(s)");
                        echo("<hr class='my-4 mx-auto'/>");
                        echo($nb);
                        echo"</h4>";
                        echo"</div>";
                        echo"</div>";
                        
                        echo"<br/> <br/>";


                        echo "<table class='table table-hover table-dark'>";
                        echo "<th >";
                        echo "Pseudo:";
                        echo"</th>";
                        echo "<th >";
                        echo "Nom:";
                        echo"</th>";
                        echo "<th >";
                        echo "Prenom:";
                        echo"</th>";
                        echo "<th >";
                        echo "Date:";
                        echo"</th>";
                        echo "<th >";
                        echo "Statut:";
                        echo"</th>";
                        echo "<th >";
                        echo "Validité:";
                        echo"</th>";
                        echo "<th >";
                        echo "Action(s):";
                        echo"</th>";
                        echo"<th>";
                        echo"</th>";
                        while ($pfl = $res1->fetch_assoc())
                        {
                            echo "<tr><td>";
                            echo ($pfl['com_pseudo']);
                            echo"</td><td>";
                            echo ($pfl['pro_nom']);
                            echo"</td><td>";
                            echo ($pfl['pro_prenom']);
                            echo"</td><td>";
                            echo ($pfl['pro_date']);
                            echo"</td><td>";
                            if($pfl['pro_statut']=='G'){
                                echo"Gestionnaire";
                            } 
                            else{echo"Membre";}
                            echo"</td><td>";
                            if($pfl['pro_validite']=='A'){
                                echo"Activé";
                            } 
                            else{echo"Désactivé";}
                            echo"</td><td>";
                            echo"<form action='action/act_des.php' method='POST'>";
                            echo"<input type='hidden' name='psd' value='".$pfl['com_pseudo']."'/>";
                            echo("<button type='submit' class='btn btn-primary' name='desactive'>Activé / Désactivé</button>");
                            echo"</form>";
                            echo"</td><td>";
                            echo"<form action='action/statut.php' method='POST'>";
                            echo"<input type='hidden' name='psd' value='".$pfl['com_pseudo']."'/>";
                            echo("<button type='submit' class='btn btn-primary' name='statut'>Changer le statut</button>");
                            echo"</form>";
                            echo"</td>";
                            echo "</tr >";
                        }
                        echo "</table>";

                     }}
                ?>
            </div>
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