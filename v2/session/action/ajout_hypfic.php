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
        <link href="../../css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
    
        
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Espace administrateur</a>
                
                </div>
                
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="text-center">
                <h4 class='text-white-50 mx-auto mt-2 mb-5'>
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
                    if($_POST["nom"] && $_POST["fic"]){
                        $hyp=htmlspecialchars($_POST["nom"]);
                        $fic=htmlspecialchars($_POST["fic"]);
                        
                    }
                    
                    $requete="SELECT* FROM T_FICHE_FIC WHERE fic_code='".$fic."';";
                    $res1 = $mysqli->query($requete);
                    if ($res1 == false){
                        echo "Error: La requête a echoué \n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit();
                    }
                    else if($res1->num_rows==0){
                        echo"Ce code ne correspond a aucune fiche";
                        echo"<br/>";echo"<br/>";
                        echo("<form action='../admin_hyp.php' method='post'>");
                        echo("<input type='submit' class='btn btn-primary btn-sm' value='Retour au gestionnaire des hyperliens'>");
                        echo("</form>");
                    }
                    else{
                    $fiche = $res1->fetch_assoc();
                    $id=$fiche['fic_id'];
                    $requete2="SELECT* FROM T_HYPERLIEN_HYP WHERE hyp_nom='".$hyp."';";
                    $res2 = $mysqli->query($requete2);
                    if ($res2 == false){
                        echo "Error: La requête a echoué \n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit();
                    }
                    else if($res2->num_rows==0){
                        echo"Ce nom ne correspond a aucun hyperlien";
                        echo"<br/>";echo"<br/>";
                        echo("<form action='../admin_hyp.php' method='post'>");
                        echo("<input type='submit' class='btn btn-primary btn-sm' value='Retour au gestionnaire des hyperliens'>");
                        echo("</form>");
                    }
                    
                    else{
                        $h = $res2->fetch_assoc();
                        $hyp1=$h['hyp_id'];

                    
                    $r="INSERT INTO T_ASSOCIATION_ASS VALUES(".$hyp1.",".$id.");";
                    $res = $mysqli->query($r);
                    if ($res == false){
                        echo "Error: La requête a echoué \n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit();
                    }
                    
                    else{
                       
                        header("Location:../admin_hyp.php");
                    }}}
                    ?>

                    
                </h4></div></div>
                </section>
        
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