<!DOCTYPE html>
<html lang="en">
    <head>
    <?php session_start(); ?>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Connexion</title>
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
                <a class="navbar-brand" href="#page-top">Connexion</a>
                
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="../index.php">Accueil</a></li>
                        
                        <li class="nav-item"><a class="nav-link" href="../recapitulatif/fichier_recapitulatif.php">Recapitulatif</a></li>
                        <li class="nav-item"><a class="nav-link" href="../inscriptions/inscription.php">Inscription</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                <h4 class='text-white-50 mx-auto mt-2 mb-5'>
                    
                <?php 
                if ($_POST["pseudo"] && $_POST["mdp"]){
                    $id= htmlspecialchars($_POST["pseudo"]);
                    $mdp=htmlspecialchars($_POST['mdp']);}

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
                
                $sql="SELECT* FROM T_COMPTE_COM JOIN T_PROFIL_PRO USING(com_pseudo) WHERE
                com_pseudo='" . $id . "' AND com_motdepasse=MD5('" . $mdp . "');";
            
                $resultat = $mysqli->query($sql);
                if ($resultat==false) {
                    echo "Error: Problème d'accès à la base \n";
                    echo "<br/>";
                    exit();
                }
                else {
                
                    $ligne=$resultat->fetch_assoc();
                    if($resultat->num_rows == 1 && $ligne["pro_validite"]=='A'){
                        $_SESSION['login']=$id;
                        $_SESSION['role']=$ligne["pro_statut"]; 
                        header("Location:admin_accueil.php");

                    }
                    else if($ligne["pro_validite"]!='A'){
                    echo "Votre profil n'est pas encore activé !";
                    echo "<br/>";
                    echo "<div class='text-center'>";
                    echo "<br /><a  class='btn btn-primary btn-sm' href=\"./session.php\">Revenir au formulaire</a>";
                    echo "</div>";
                    }
                
                    else{
                    echo "pseudo ou/et mot de passe incorrect(s) ou profil inconnu !";
                    echo "<br/>";
                    echo "<div class='text-center'>";
                    echo "<br /><a  class='btn btn-primary btn-sm' href=\"./session.php\">Revenir au formulaire</a>";
                    echo "</div>";}

                }
                   ?>
                    </h4>
                    
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
        <?php  $mysqli->close();     ?>
    </body>
</html>
