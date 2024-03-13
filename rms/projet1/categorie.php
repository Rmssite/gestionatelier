<?php
    include("connexion.php");
    $chr=0;
    $aff="SELECT * FROM `categorie` where `numcat`> ? order by `nom`"; 
    $rqtaffcmd = $connection->prepare($aff);
    $rqtaffcmd->execute(array($chr)); 
    $resaff = $rqtaffcmd->fetchAll(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie Materiel</title>
</head>
<body style="background-color:#DCDCDC;">
    <form class=" " method="POST" action="traitement.php">
        <div class="container bg-dark py-3 text-warning text-center">
            <div class="figure rounded w-100 float-end mb-3  text-start ">
                <a href="accueil.php?pag=saisi"  class="btn btn-warning btn-sm my-1 "  >Retour</a>
            </div>
            <div class="figure w-50 mt-0 mb-3 px-2 border border-1 border-warning text-center ">
                <div class="col-12">
                    <label for="num" class="col-sm-2 col-form-label mx-0">Categorie</label>
                    <input type="text" name="nomcat"  class="form-control mb-2 border-dark" style="background-color:#DCDCDC;" id="numcli" value=""  placeholder="..">
                    <button type="submit"  name="btnaddcat" class="btn btn-primary " data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">valider</button>
                    <a href="accueil.php?pag=cat"  class="btn btn-primary my-1"  >Annuler</a>
                
                </div>
                <div class="col-6">
                    
                </div>
            </div>

        <!--affichage des commandes -->
            <table class="table border-2  text-light ">
                <thead>
                    <tr class="text-warning" >
                    <th scope="col">N°</th>
                    <th scope="col">Catégorie</th>
                    
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $x=1;
                        foreach ($resaff as $eng){//affichage categorie
                    ?>
                        <tr>
                        <th scope="row">
                            <?php
                                echo $x++;
                            ?>
                        </th>
                        <td>
                            <?php
                                echo @$eng['nom'];
                            ?>
                        </td>
                        <td>
                           
                            <a href="accueil.php?pag=affbl&act=1&num=<?php echo @$eng['numcat'] ?>"  class="btn btn-primary btn-sm my-1 "  >Modifier</a>
                            <a href="accueil.php?pag=affbl&act=3&num=<?php echo @$eng['numcat'] ?>"  class="btn btn-danger btn-sm my-1 "  ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                </svg>
                            </a>
                            
                        </td>
                        
                    </tr>

                    <?php }?>
                </tbody>
            </table>
            
        </div>
        
    </form>
</body>
</html>