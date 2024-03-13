<?php
    include("connexion.php");
//_____actuliser
    $mod=("SELECT * FROM `devis` limit 0,1 ");
        $rqtmod= $connection->prepare($mod);
        $rqtmod->execute();
        $resrqtmod= $rqtmod->fetchall();

        $n°dev=$resrqtmod[0][0];
        $ob=$resrqtmod[0][1];
        $cheminFichier =$resrqtmod[0][2];
//___________
    @$resaff=$_SESSION['resaffalldev'];//__affichage

//______modification et affichage
    $act = @$_GET['act'] ;
    if($act==1){
        $num = @$_GET["num"] ;
        $_SESSION['num']=$num;
        $mod=("SELECT * FROM `devis` WHERE `numdev`=? ");
        $rqtmod= $connection->prepare($mod);
        $rqtmod->execute(array($num));
        $resrqtmod= $rqtmod->fetchall();

        // remplissage
        $n°dev=$resrqtmod[0][0];
        $ob=$resrqtmod[0][1];
        

        $idImage = $num; 
    $affichimg = "SELECT `physique` FROM `devis` WHERE `numdev`= ?";
    $result = $connection->prepare($affichimg);
    $result->execute(array($idImage));
        $row = $result->fetchALL();
        //print_r($row);
        //$nomFichier = $row[0][0];
        $cheminFichier = $row[0][0];
    }
    if($act==2){//vider

        $n°dev="";
        $ob="";
        $cheminFichier ="";
        
    }
    if($act==4){//actualiser
        
        $mod=("SELECT * FROM `devis` limit 0,1 ");
        $rqtmod= $connection->prepare($mod);
        $rqtmod->execute();
        $resrqtmod= $rqtmod->fetchall();

        $n°dev=$resrqtmod[0][0];
        $ob=$resrqtmod[0][1];
        $cheminFichier =$resrqtmod[0][2];
        
    }

    $_SESSION['cheminfic']=$cheminFichier;

    //filtre
    $dev="SELECT * from devis ";
    $rqtdev=$connection->prepare($dev);
    $rqtdev->execute();
    $resrqtdev= $rqtdev->fetchall();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>devis</title>
</head>
<body style="background-color:#DCDCDC;">
<form class="  " method="POST" action="traitement.php" enctype="multipart/form-data">
        <!--formulaire modification -->
        <div class="container bg-dark text-warning text-center">
            <div class="figure w-75 mt-0 mb-3 px-2 border border-1 border-warning text-center ">
                
                <div class="row g-3">
                   
                    <div class="col-6">
                        <label for="client" class="col-sm-2 col-form-label mx-0">N°Devis</label>
                        <input type="text" name="numdev"  class="form-control mb-2 border-dark" style="background-color:#DCDCDC;" id="numdev" value="<?php echo @$n°dev; ?>" placeholder="...">
                    </div>
                    <div class="col-6 ">
                        <div class="col-12 h-100">
                            <a href="affimg.php">
                                <img src="<?php echo @$cheminFichier; ?>" width="300" height="200" class="img-thumbnail text-end " alt="<?php echo @$nomFichier;?>"> 
                            </a>
                        </div>
                        <div class="col-12 my-0 h-100">
                            <label for="image">Sélectionner une image :</label>
                            <input type="file" name="cheminfic" id="image" accept="image/jpeg, image/png" style="display: none;">
                        </div>
                    </div>
                    
                </div>
                <div class="row text-center g-3">
                    <div class="col-6  text-center mt-5  ">
                        <a href="accueil.php?pag=affdev&act=2" class="btn btn-warning my-1 " >Vider</a>
                        <button type="submit" class="btn btn-primary my-1 " name="btndevfic">Valider</button>
                        <a href="accueil.php?pag=affdev&act=4"  class="btn btn-primary my-1"  >Annuler</a>

                    </div>
                </div>
            </div>
        </div>

    
        <div class="container bg-dark mt-3 text-center table-size-5 table-responsive" >
        
            <!--filtrage -->
            <div class="figure w-50 mt-1 mb-2 px-2 text-warning border border-4  border-secondary text-center ">
                <div class="row g-3">
                    <div class="col-12 ">
                        <label for="date" class="col-sm-2 col-form-label mx-0">Filtre</label>
                    </div>
                </div>
                <div class="figure w-100  mb-2 px-2 text-light border border-1 border-warning t ">
                    <div class="row">
                        <div class="col-9 text-start ">
                            <label for="date" class=" col-form-label mx-0">Sélectionnez un N°Devis</label>
                        </div>
                        <div class="col-3 text-end">
                            <label for="date" class=" col-form-label mx-0 ">Actualiser</label>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="col-6 text-start">
                        <input type="text" name="filtredev"  class="form-control mb-2 border-dark" style="background-color:#DCDCDC;" id="numdev" value="<?php echo @$nmbc; ?>" placeholder="...">           
                        </div>
                        <div class="col-3 text-start">
                            <button type="submit" name="btnfiltredev" class="btn btn-primary mb-2  " data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                    <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
                                </svg>  
                            </button>                      
                        </div>
                        <div class="col-3 text-end">
                            <button type="submit" name="btnaffalldev" class="btn btn-primary mb-2  " data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                    <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9"/>
                                    <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
                                </svg>                            
                        </button>                      
                        </div>
                        
                    </div>   
                </div>
            </div>
            <!--suppression des commandes -->
            <?php if($act==3){
                $num = @$_GET["num"] ;
                $_SESSION['num']=$num;
                ?>
                
                <div class='col-12  text-center my-auto text-light '>
                    <label for="date" class=" col-form-label mx-0">voulez-vous supprimer l'enregistrement?</label>
                    <button type='submit' name='btnsupdev' class='btn btn-primary my-1 ' data-bs-placement='bottom' title='Modifier les donnees' value='envoyer'>Oui</button>
                    <a href="accueil.php?pag=affdev&act=4"  class="btn btn-primary btn-sm my-1 "  >Non</a>
                            
                </div>
            <?php } ?>
                       
            
 
            <!--affichage des commandes -->
            <table class="table border-2  text-light ">
                <thead>
                    <tr>
                    <th scope="col">N°Devis</th>
                    <th scope="col"></th>
                    
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $x=0;
                        foreach ($resaff as $eng){//affichage de Devis

                        

                        
                    ?>
                        <tr>
                        <th scope="row">
                            <?php
                                echo $eng['numdev'];
                            ?>
                        </th>
                       
                        <td>
                            
                            <div class="col-6 row-3">
                                <div class="col-12 h-100">
                            
                                    <img src="<?php echo @$eng['physique'];; ?>" width="100" height="50" class="img-thumbnail text-end " alt="<?php echo @$nomFichier;?>"> 
                                </div>
                               
                            </div>
                        </td>
                        <td>
                           
                            <a href="accueil.php?pag=affdev&act=1&num=<?php echo $eng['numdev'] ?>"  class="btn btn-primary btn-sm my-1 "  >Modifier</a>
                            <a href="accueil.php?pag=affdev&act=3&num=<?php echo $eng['numdev'] ?>"  class="btn btn-danger btn-sm my-1 "  ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                </svg>
                            </a>
                            
                        </td>
                        
                    </tr>

                    <?php }?>
                </tbody>
            
        </div>
    </form>
</body>
</html>