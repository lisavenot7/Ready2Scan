<!DOCTYPE html>
<html lang="en">
    <head>
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
                    
                <form action="session_action.php" method="post">
                        <fieldset>
                        <h4 class='text-white-50 mx-auto mt-2 mb-5'>
                        <div class="text-center">Veuillez saisir votre pseudo et votre mot de passe :</div>
                                </br></br>
                                
                                <div class="text-end">
                                <p>Pseudo : 
                                <input type="text" name="pseudo" placeholder="pseudo" required="required"/>
                                </p></br>
                                
                                <p>Mot de passe : 
                                <input type="password" name="mdp" placeholder="mot de passe" required="required" />
                                </p>
                                </br>
                                </br>
                                <input type="submit" class="btn btn-outline-primary btn-sm" value="Valider">
                            </h2>
                        </fieldset>
                    </form>
                    
                   
                    </h2>
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
        
    </body>
</html>