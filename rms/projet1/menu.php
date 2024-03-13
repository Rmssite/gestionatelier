<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    
</head>
<body>
<div class="container">
    <div class="row text_center bg-warning ">
    <div class="btn col-3">
            <a class="dropdown-item" href="accueil.php?pag=saisi">Saisie</a>
        </div>
        <div class="dropdown col-3">
            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
                Documents
            </button>
            <ul class="dropdown-menu bg-warning">
                <li><a class="dropdown-item" href="accueil.php?pag=affdoc">devis</a></li>
                <li><a class="dropdown-item"href="accueil.php?pag=doc">Bon de commande</a></li>
                <li><a class="dropdown-item"href="accueil.php?pag=bliv">Bon de Livraison</a></li>
            </ul>
        </div>
        <div class="dropdown col-3">
            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
                Consultations
            </button>
            <ul class="dropdown-menu bg-warning">
                <li><a class="btn  dropdown-item" href="accueil.php?pag=bdc">Commandes</a></li>
                <li><a class="dropdown-item" href="accueil.php?pag=mch">Materiels</a></li>
                <li><a class="btn dropdown-item" href="accueil.php?pag=clt">Clients</a></li>

            </ul>
        </div>
        
        <div class="dropdown col-3">
            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
                Utilisateur
            </button>
            <ul class="dropdown-menu bg-warning">
                <li><a class="btn  dropdown-item" href="accueil.php?pag=prof">profil</a></li>
                <li><a class="dropdown-item" href="index.php">Deconnexion</a></li>
            </ul>
        </div>
    </div>
</div>

</body>
<script src="js/bootstrap.bundle.min.js" ></script>
</html>