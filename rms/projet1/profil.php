<?php
    //session_start();
    include("connexion.php");
    @$mat=$_SESSION['mat'];
    @$nom=$_SESSION['nom'];
    @$prenom=$_SESSION['prenom'];
    @$email=$_SESSION['email'];
    @$psword=$_SESSION['psword'];
    @$ad=$_SESSION['admin'];

    $idImage = $mat; 
    $affichimg = "SELECT `nonfic`,`cheminfic` FROM `utilisateur` WHERE `mat`= ?";
    $result = $connection->prepare($affichimg);
    $result->execute(array($idImage));
        $row = $result->fetchALL();
        //print_r($row);
        $nomFichier = $row[0][0];
        $cheminFichier = $row[0][1];
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil</title>
</head>
<body>
<form class="  " method="POST" action="traitement.php" enctype="multipart/form-data">
        <!--formulaire modification -->
        <div class="container bg-dark text-warning text-center">
            <div class="figure w-75 mt-0 mb-3 px-2 border border-1 border-warning text-center pb-2">
            <h3> Mon Profil</h3>
            <div class="row g-3 text-end ">  
                    
                <div class="col-12 h-100">
                
                    <img src="<?php echo $cheminFichier; ?>" class="img-thumbnail text-end w-25" alt="<?php echo $nomFichier;?>"> 
                </div>
                <div class="col-12 my-0 h-100">
                    <label for="image">Sélectionner une image :</label>
                    <input type="file" name="cheminfic" id="image" accept="image/jpeg, image/png" style="display: none;">
                    <button type="submit" class="btn btn-primary my-1 " name="btnfic">OK</button>
                </div>
            </div>
                <div class="row g-3 ">   
                    <div class="col-3">
                        <label for="" class="col-form-label ">Matricule :</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name=""  class="form-control border-dark mb-2 bg-dark text-light" style="background-color:#DCDCDC;" id="numjob" value="<?php echo @$mat; ?>"   disabled>
                    </div>
                </div>
                <div class="row g-3  ">
                    <div class="col-3">
                        <label for="" class="col-form-label ">Nom :</label>
                    </div>
                    <div class="col-9">
                    <input type="text" name=""  class="form-control mb-2 border-dark bg-dark text-light" style="background-color:#DCDCDC;"  id="datjob" value="<?php echo @$nom; ?>" disabled>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-3">
                        <label for="" class=" col-form-label ">Prénom :</label>
                    </div>
                    <div class="col-9">
                    <input type="text" name="" class="form-control mb-2 border-dark bg-dark text-light" style="background-color:#DCDCDC;" id="numbc" value="<?php echo @$prenom; ?>" disabled>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-3">
                        <label for="" class="col-form-label ">E-mail :</label>
                    </div>
                    <div class="col-9">
                    <input type="text" name="" class="form-control border-dark bg-dark text-light" style="background-color:#DCDCDC;" id="dlv" value="<?php echo @$email; ?>" disabled>
                    </div>
                </div>
                
                <div class="row ">
                    <div class="col-12  text-start my-auto  ">
                        <a href="accueil.php?pag=prof&pagmod=mod&id=<?php echo @$mat;?>" class="btn btn-primary my-1  ">Modifier</a>
                    </div>
                    
                </div>
                
        </div>

        <?php
            @$id=$_GET['id'];
            @$_SESSION['id']=$id;
            @$mod=$_GET['pagmod'];
            if($mod=="mod"){
        ?>
        <div class="row g-2">
                    
                    <div class="col-2">
                        <label for="" class="col-sm-5 col-form-label mx-0">Matricule</label>
                        <input type="text" name="mat"  class="form-control mb-2 border-dark" style="background-color:#DCDCDC;" id="infmat" value="<?php echo @$mat;?>" placeholder="...">
                    </div>
                    <div class="col-2">
                        <label for="" class="col-sm-2 col-form-label">Nom</label>
                        <input type="text" name="nom"  class="form-control border-dark" style="background-color:#DCDCDC;"  id="infcli" value="<?php echo @$nom; ?>" placeholder="..." >
                    </div>
                    <div class="col-2">
                        <label for="" class="col-sm-2 col-form-label">Prénom</label>
                        <input type="text" name="prenom"  class="form-control border-dark" style="background-color:#DCDCDC;"  id="infcli" value="<?php echo @$prenom; ?>" placeholder="..." >
                    </div>
                    <div class="col-3">
                        <label for="" class=" col-form-label">E-mail</label>
                        <input type="text" name="email"  class="form-control border-dark" style="background-color:#DCDCDC;"  id="infcli" value="<?php echo @$email; ?>" placeholder="..." >
                    </div>
                    <div class="col-2">
                        <label for="" class="col-form-label">Mot de Passe</label>
                        <input type="text" name="psword"  class="form-control border-dark" style="background-color:#DCDCDC;"  id="infcli" value="<?php echo @$psword; ?>" placeholder="..." >
                    </div>
                    <div class="col-1">
                    <label for="" class="col-form-label">admin</label>
                    <select class="form-select text" name="ad" style="background-color:#DCDCDC;" aria-label="Default select example">
                        <option value="<?php echo @$ad; ?>" selected><?php echo @$ad; ?></option>
                        <option value="sadmin">sadmin</option>
                        <option value="user">user</option>
                        <option value="Administrateur">Administrateur</option>

                        
                    </select>                   
                </div>
                </div>
               
                <div class="row g-2">
                
                    <div class="col-12  text-center my-auto  ">
                        <button type="submit" name="btnmodifuser" class="btn btn-primary my-1 " data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">Modifier</button>
                        <a href="accueil.php?pag=prof" class="btn btn-primary my-1  ">Annuler</a>
                    </div>
                </div>
            </div>
        <?php }
        ?>
</form>
    
</body>
</html>