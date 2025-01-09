<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inscription</title>
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
    <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
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
                
        //1) On récupère et on teste les données saisies
if ($_POST["pseudo"] && $_POST["mdp1"] && $_POST["mdp2"] && $_POST["nom"] && $_POST["prenom"]) //2) Tester les autres saisies
{
$id= htmlspecialchars(addslashes($_POST["pseudo"]));
$mdp=htmlspecialchars($_POST['mdp1']);
$mdp2=htmlspecialchars($_POST['mdp2']);
$nom=addslashes(htmlspecialchars($_POST['nom']));
$prenom=addslashes(htmlspecialchars($_POST['prenom']));
if (!$mysqli->set_charset("utf8")) {
    printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
    exit();
    }
    //Préparation de la requête à partir des chaînes saisies =>
    //concaténation (avec le point) des différents éléments composant la
    //requête
    $m=MD5($mdp);
    $sql1="SELECT com_pseudo FROM T_COMPTE_COM WHERE com_pseudo='".$id."';";
    
    
    // Affichage de la requête constituée pour vérification
    
    //Exécution de la requête d'ajout d'un compte dans la table des comptes
    
    $result4=$mysqli->query($sql1);
   
    if ($result4 == false) //Erreur lors de l’exécution de la requête
    {
    // La requête a echoué
    echo("<form action='inscription.php' method='post'>");
    echo("<div class='text-center'>");
    echo "<h2 class='text-white-50 mx-auto mt-2 mb-5 fs-1'>";
    echo "Erreur: La requête a échoué \n";
    echo ("</h2>");
    
    echo("<input type='submit' class='btn btn-primary btn-sm' value='Retour au formulaire'>");
    echo("</form>");
     echo("</div>");
    exit;
    }
    else if ($result4->num_rows != 0){
        echo("<form action='../index.php' method='post'>");
        echo("<div class='text-center'>");
        echo "<h2 class='text-white-50 mx-auto mt-2 mb-5 fs-1'>";
        echo "Vous avez déja un compte !"."\n";
        echo ("</h2>");
        
        echo("<input type='submit' class='btn btn-primary btn-sm' value='Retour à l accueil'>");
        echo("</form>");
        echo("</div>");   
    }
    else if (strcmp($mdp,$mdp2)!=0){
        echo("<form action='inscription.php' method='post'>");
        echo("<div class='text-center'>");
        echo "<h2 class='text-white-50 mx-auto mt-2 mb-5 fs-1'>";
        echo "Les mots de passes rentrées ne sont pas identiques"."\n";
        echo ("</h2>");
        
        echo("<input type='submit' class='btn btn-primary btn-sm' value='Retour au formulaire'>");
        echo("</form>");
         echo("</div>");   
    }
    else{
        $sql="INSERT INTO T_COMPTE_COM VALUES('" .$id. "','" .$m. "');";
        $result3 = $mysqli->query($sql);




        
        $sql2="INSERT INTO T_PROFIL_PRO VALUES('" .$id. "','" .$nom. "','".$prenom. "','D','M',CURDATE());";




        $result5 = $mysqli->query($sql2);
     if (($result3 == false)||($result5 == false)) //Erreur lors de l’exécution de la requête
    {
    // La requête a echoué
    if (($result3 != false)&&($result5 == false)){
        $sql3="DELETE FROM T_COMPTE_COM WHERE com_pseudo='".$id."';";
        $result6 = $mysqli->query($sql3);
        if ($result6 == false) //Erreur lors de l’exécution de la requête
                { // La requête a echoué
                echo "Error: La requête a echoué \n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit();
                }
    }
    echo("<form action='inscription.php' method='post'>");
    echo("<div class='text-center'>");
    echo "<h2 class='text-white-50 mx-auto mt-2 mb-5 fs-1'>";
    echo "Erreur: La requête a échoué \n";
    echo ("</h2>");
    
    echo("<input type='submit' class='btn btn-primary btn-sm' value='Retour au formulaire'>");
    echo("</form>"); 
    echo("</div>");
    exit;

    }
    else //Requête réussie
    {
    echo("<form action='../index.php' method='post'>");
    echo("<div class='text-center'>");
    echo "<h2 class='text-white-50 mx-auto mt-2 mb-5 fs-1'>";
    echo "Inscription réussie !" . "\n";
    echo ("</h2>");
    
    echo("<input type='submit' class='btn btn-primary btn-sm' value='Retour à l accueil'>");
    echo("</form>");
    echo("</div>");                        
    }
}}
else
{
echo("<form action='inscription.php' method='post'>");
echo("<div class='text-center'>");
echo ("<h2 class='text-white-50 mx-auto mt-2 mb-5 fs-1'>");
echo("Tous les champs ne sont pas rempli");
echo ("</h2>");

echo("<input type='submit' class='btn btn-primary btn-sm' value='Retour au formulaire'>");
echo("</form>"); 
echo("</div>");
}
// Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères


?>
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
