<?php
 
   include("connexion.php");
   
   $cat="SELECT * from categorie";
    $rqtcat=$connection->prepare($cat);
    $rqtcat->execute();
    $catmat= $rqtcat->fetchall();
    
   $x=0;
   $affmat=("SELECT * FROM `materiel` ORDER BY `compt` DESC "); 
   $rqtaffmat= $connection->prepare($affmat);
   $rqtaffmat->execute();
    $resaffmat= $rqtaffmat->fetchall();

    $cat="SELECT * from categorie";
    $rqtcat=$connection->prepare($cat);
    $rqtcat->execute();
    $catmat= $rqtcat->fetchall();

    //affichage
    @$resaffmat=$_SESSION['resaffallmat'];
    // select filtre
    $mat="SELECT * from materiel";
    $rqtmat=$connection->prepare($mat);
    $rqtmat->execute();
    $resrqtmat= $rqtmat->fetchall();
    //print_r($catmat)

    // remplir champ modification
    $act = @$_GET['act'] ;

    if($act==1){
        $num = @$_GET["num"] ;
        $_SESSION['num']=$num;
        $mod=("SELECT * FROM `materiel` WHERE `nums`=? ");
        $rqtmod= $connection->prepare($mod);
        $rqtmod->execute(array($num));
        $resrqtmod= $rqtmod->fetchall();

        // remplissage
        $nums=$resrqtmod[0][0];
        $marque=$resrqtmod[0][1];
        $type=$resrqtmod[0][2];
        $puissance=$resrqtmod[0][3];
        $vitess=$resrqtmod[0][4];
        $numcat=$resrqtmod[0][5];
        $_SESSION['catmat']=$numcat;


        if($numcat!=""){
            $nmcat=("SELECT `nom` FROM `categorie` where numcat=?  ");
            $rqtnmcat= $connection->prepare($nmcat);
            $rqtnmcat->execute(array($numcat));
            $resrqtnmcat= $rqtnmcat->fetchall();
            $catg=$resrqtnmcat[0][0];
        }


        //affichage
        /* $affcmd = "SELECT * FROM `commande` WHERE  `date`=?  ORDER BY `numjob` DESC";
        $rqtaffcmd = $connection->prepare($affcmd);
        $rqtaffcmd->execute(array($date)); 
        $resaffcmd = $rqtaffcmd->fetchAll(); */

        
        

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>machine</title>
    
</head>
<body style="background-color:#DCDCDC;">
    <form class="  " method="POST" action="traitement.php">
        <div class="container bg-dark text-warning text-center">
            <div class="figure w-100  mt-0 mb-3  border border-1 border-warning text-center ">
                <div class="row g-2">
                    <div class="col-3">
                        <label for="srlnum" class=" col-form-label mx-0" >N° de Serie</label>
                        <input type="text" name="srlnum"  class="form-control mb-2 border-dark" style="background-color:#DCDCDC;" value="<?php echo @$nums;?>" id="srlnum" >
                    </div>
                    <div class="col-5">
                        <label for="categorie" class="col-sm-3 col-form-label mx-0">Catégorie </label>
                        <select class="form-select text" name="catmat" style="background-color:#DCDCDC;" aria-label="Default select example" >

                            <option value="<?php echo @$numcat;?>" selected>

                                <?php echo @$catg;?>
                        
                            </option>
                            <?php
                                // remplissage liste deroulante categorie materiel
                                foreach ($catmat as $lign){
                                    //nombre de categorie
                                    $x=$x+1;
                            ?>
                            <option value="<?php echo $lign['numcat'] ; ?>">
                                <?php
                                echo $lign['nom']  ;
                                ?>
                            </option>
                                <?php }?>
                            </select>                    
                    </div>
                    <div class="col-4">
                        <label for="tpmat" class="col-sm-2 col-form-label">Type</label>
                        <input type="text" name="tpmat"  class="form-control border-dark" style="background-color:#DCDCDC;"  id="tpmat" placeholder="..." value="<?php echo @$type;?>" >
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-4">
                        <label for="mrqmat" class="col-sm-2 col-form-label ">Marque</label>
                        <input type="text" name="mrqmat"  class="form-control border-dark" style="background-color:#DCDCDC;" id="mrqmat"  placeholder="..." value="<?php echo @$marque;?>">
                    </div>
                    <div class="col-4">
                        <label for="puissance" class="col-sm-2 col-form-label mx-0">Puissance</label>
                        <input type="text" name="puismat"  class="form-control mb-2 border-dark" style="background-color:#DCDCDC;" id="puismat" value="<?php echo @$puissance;?>" placeholder="EX:250KW">
                    </div>
                    <div class="col-4">
                        <label for="vitesse" class="col-sm-2 col-form-label ">Vitesse</label>
                        <input type="text" name="vtsmat"  class="form-control border-dark" style="background-color:#DCDCDC;" id="vtsmat" value="<?php echo @$vitess;?>"  placeholder="EX:1490RPM">
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-12  text-center my-auto  ">
                        <button type="submit" name="btnmodifitemat" class="btn btn-primary mt-4" data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">Valider</button>
                        <a href="accueil.php?pag=mch"  class="btn btn-primary mt-4"  >Annuler</a>

                    </div>
                </div>
                    
                    
                
                
            </div>

            
        </div>

        <?php
            $x=4;
        ?>
        <div class="container bg-dark mt-3 text-warning text-center table-responsive">
        <!--filtrage -->
            <div class="figure w-50 mt-1 mb-2 px-2 text-warning border border-4  border-secondary text-center ">
                <div class="row g-3">
                    <div class="col-12 ">
                        <label for="date" class="col-sm-2 col-form-label mx-0">Filtre</label>
                    </div>
                </div>
                <div class="figure w-100  mb-2 px-2 text-light border border-1 border-warning text-start ">
                        <div class="row">
                            <div class="col-9 ">
                                <label for="date" class=" col-form-label mx-0">N° de serie</label>
                            </div>
                            <div class="col-3 text-end">
                                <label for="date" class=" col-form-label mx-0 ">Actualiser</label>
                            </div>
                        </div>                    
                        <div class="row">    
                        <div class="col-6 text-start">
                            <select class="form-select text" name="filtremat" style="background-color:#DCDCDC;" aria-label="Default select example">
                    
                                <option selected></option>
                                <?php
                                // remplissage liste deroulante categorie materiel
                                foreach ($resrqtmat as $lign){
                                    //nombre de categorie
                                    $x=$x+1;
                                ?>
                            <option value="<?php echo $lign['nums'];?>">
                                <?php
                                echo $lign['nums']  ;
                                ?>
                                </option>
                                <?php }?>
                            </select>                      
                        </div>
                        <div class="col-3 text-start">
                            <button type="submit" name="btnfiltremat" class="btn btn-primary mb-2  " data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                    <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
                                </svg>  
                            </button>                      
                        </div>
                        <div class="col-3 text-end">
                            <button type="submit" name="btnaffallmat" class="btn btn-primary mb-2  " data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">
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
            <?php if($act==2){
                $num = @$_GET["num"] ;
                $_SESSION['num']=$num;
                ?>
                
                <div class='col-12  text-center my-auto text-light '>
                    <label for="date" class=" col-form-label mx-0">voulez vous supprimer la l'enregistrement ?</label>
                    <button type='submit' name='btnsupmat' class='btn btn-primary my-1 ' data-bs-placement='bottom' title='Modifier les donnees' value='envoyer'>Oui</button>
                    <a href="accueil.php?pag=mch"  class="btn btn-primary btn-sm my-1 "  >Non</a>
                            
                </div>
            <?php } ?>
        <!--affichage -->
            <table class="table text-light">
                <thead>
                    <tr>
                    <th scope="col">N° DE SERIE</th>
                    <th scope="col">CATEGORIE</th>
                    <th scope="col">TYPE</th>
                    <th scope="col">MARQUE</th>
                    <th scope="col">PUISSANCE</th>
                    <th scope="col">VITESSE</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if ($resaffmat !== null && (is_array($resaffmat) || is_object($resaffmat))) {
                        foreach ($resaffmat as $eng){
                            
                        
                    ?>
                        <tr>
                        <th scope="row">
                            <?php
                                echo $eng['nums'];
                                
                            ?>
                        </th>
                        <td>
                            <?php
                                $nmcat=("SELECT `nom` FROM `categorie` where numcat=?  ");
                                $rqtnmcat= $connection->prepare($nmcat);
                                $rqtnmcat->execute(array($eng['numcat']));
                                $resrqtnmcat= $rqtnmcat->fetchall();
                                
                                foreach ($resrqtnmcat as $engcat){
                                    echo $engcat['nom'];
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $eng['type'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $eng['marque'];
                            ?>
                        </td>
                        
                    
                        <td>
                            <?php
                                echo $eng['puissance'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $eng['vitesse'];
                            ?>
                        </td>
                        <td>
                            <a href="accueil.php?pag=mch&act=1&num=<?php echo $eng['nums'] ?>"  class="btn btn-primary btn-sm my-1 "  >Modifier</a>
                                <a href="accueil.php?pag=mch&act=2&num=<?php echo $eng['nums'] ?>"  class="btn btn-danger btn-sm my-1 "  ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                    </svg>
                                </a>
                        </td>
                    <?php }} ?>
                        
                        </tr>
                </tbody>
            </table>
        </div>
    </form>
</body>
</html>