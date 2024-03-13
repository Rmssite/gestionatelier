<?php

   include("connexion.php");

   //affichage
   @$resaffcmd=$_SESSION['resaffallcmd'];

    // remplir champ modification

    $cli="SELECT * from client";
    $rqtcli=$connection->prepare($cli);
    $rqtcli->execute();
    $resrqtcli= $rqtcli->fetchall();

    $mat="SELECT * from materiel ORDER BY compt DESC ";
    $rqtmat=$connection->prepare($mat);
    $rqtmat->execute();
    $resrqtmat= $rqtmat->fetchall();

    $bc="SELECT * from bcommande";
    $rqtbc=$connection->prepare($bc);
    $rqtbc->execute();
    $resrqtbc= $rqtbc->fetchall();

    $bl="SELECT * from blivraison";
    $rqtbl=$connection->prepare($bl);
    $rqtbl->execute();
    $resrqtbl= $rqtbl->fetchall();

    $devis="SELECT * from devis";
    $rqtdevis=$connection->prepare($devis);
    $rqtdevis->execute();
    $resrqtdevis= $rqtdevis->fetchall();

    $act = @$_GET['act'] ;

    if($act==1){
        $num = @$_GET["num"] ;
        $_SESSION['num']=$num;
        $mod=("SELECT * FROM `commande` WHERE `numjob`=? ");
        $rqtmod= $connection->prepare($mod);
        $rqtmod->execute(array($num));
        $resrqtmod= $rqtmod->fetchall();

        // remplissage
        $nmjob=$resrqtmod[0][0];
        $date=$resrqtmod[0][1];
        $n°bl=$resrqtmod[0][2];
        $client=$resrqtmod[0][3];
        $matdp=$resrqtmod[0][4];
        $numdev=$resrqtmod[0][5];
        $n°bc=$resrqtmod[0][6];

        if($client!=""){
            $nm=("SELECT `nomcli` FROM `client` where numcli=?  ");
            $rqtnm= $connection->prepare($nm);
            $rqtnm->execute(array($client));
            $resrqtnm= $rqtnm->fetchall();
            $namecli=$resrqtnm[0][0];
        }

        if($matdp!=""){
            $nmmat=("SELECT * FROM `materiel` where nums=?  ");
            $rqtnmmat= $connection->prepare($nmmat);
            $rqtnmmat->execute(array($matdp));
            $resrqtnmmat= $rqtnmmat->fetchall();
            $marque=$resrqtnmmat[0][1];
            $type=$resrqtnmmat[0][2];
            $puissance=$resrqtnmmat[0][3];
            $vitesse=$resrqtnmmat[0][4];
            $nmcat=$resrqtnmmat[0][5];

            $numcat=("SELECT `nom` FROM `categorie` where numcat=?  ");
            $rqtnmcat= $connection->prepare($numcat);
            $rqtnmcat->execute(array($nmcat));
            $resrqtnmcat= $rqtnmcat->fetchall();
            $catg=$resrqtnmcat[0][0];
        }

        if($numdev!=""){
            $nmdev=("SELECT `numdev` FROM `devis` where numdev=?  ");
            $rqtnmdev= $connection->prepare($nmdev);
            $rqtnmdev->execute(array($numdev));
            $resrqtnmdev= $rqtnmdev->fetchall();
            $dev=$resrqtnmdev[0][0];
        }


        if($n°bl!=""){
            $nmbl=("SELECT `dateliv` FROM `blivraison` where numbl=?  ");//modifier date de livraison
            $rqtnmbl= $connection->prepare($nmbl);
            $rqtnmbl->execute(array($n°bl));
            $resrqtnmbl= $rqtnmbl->fetchall();
            $dl=$resrqtnmbl[0][0];
        }

    

        //affichage
        $affcmd = "SELECT * FROM `commande` WHERE  `date`=?  ORDER BY `numjob` DESC";
        $rqtaffcmd = $connection->prepare($affcmd);
        $rqtaffcmd->execute(array($date)); 
        $resaffcmd = $rqtaffcmd->fetchAll();

        
        

    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bon_commande</title>
    
    
</head>

<body style="background-color:#DCDCDC;">
    <form class="  " method="POST" action="traitement.php">
        <!--formulaire modification -->
        <div class="container bg-dark text-warning text-center">
            <div class="figure w-100 mt-0 mb-3 px-2 border border-1 border-warning text-center ">
                
                <div class="row g-3 ">
                    <div class="col-3">
                        <label for="numjob" class="col-sm-2 col-form-label ">N°JOB</label>
                        <input type="text" name="numjob"  class="form-control border-dark" style="background-color:#DCDCDC;" id="numjob" value="<?php echo @$nmjob; ?>"  placeholder="EX:24010000" disabled>
                    </div>
                    <div class="col-3 ">
                        <label for="date" class="col-sm-2 col-form-label mx-0">Date</label>
                        <input type="date" name="datjob"  class="form-control mb-2 border-dark" style="background-color:#DCDCDC;"  id="datjob" value="<?php echo @$date; ?>" >
                    </div>
                    <div class="col-6">
                        <label for="materiel" class="col-sm-5 col-form-label mx-0">Matériel Déposé</label>
                        <select class="form-select text" name="infmat" style="background-color:#DCDCDC;" aria-label="Default select example" >

                            <option value="<?php echo @$matdp;?>" selected>

                                <?php echo @$catg."--".@$matdp."--".@$marque."--".@$type."--".@$puissance."--".@$vitesse?>

                            </option>
                            <?php
                                // remplissage liste deroulante categorie materiel
                                foreach ($resrqtmat as $lign){
                                    $x=$x+1;
                                    
                            ?>
                            <option value="<?php echo $lign['nums'] ; ?>">
                                <?php
                                 
                                $nmcat=("SELECT `nom` FROM `categorie` where numcat=?  ");
                                $rqtnmcat= $connection->prepare($nmcat);
                                $rqtnmcat->execute(array($lign['numcat']));
                                $resrqtnmcat= $rqtnmcat->fetchall();
                                foreach ($resrqtnmcat as $engcat){
                                    echo $engcat['nom']." / ";
                                }
                                echo $lign['nums']." / ".$lign['marque']." / ".$lign['type']." / ".$lign['puissance']." / ". $lign['vitesse'];
                        
                                ?>
                            </option>
                                <?php }?>
                        </select>                                   
                    </div>
                    
                </div>
                <div class="row mb-2 g-3">
                    
                    
                    <div class="col-4">
                        <label for="client" class="col-sm-2 col-form-label">Client</label>
                        <select class="form-select text" name="infcli" style="background-color:#DCDCDC;" aria-label="Default select example" >

                            <option value="<?php echo @$client;?>" selected>

                                <?php echo @$client."--". @$namecli;?>

                            </option>
                            <?php
                                // remplissage liste deroulante client
                                foreach ($resrqtcli as $lign){
                                    //nombre de categorie
                                    $x=$x+1;
                            ?>
                            <option value="<?php echo $lign['numcli'] ; ?>">
                                <?php
                                echo $lign['numcli']."--".$lign['nomcli']  ;
                                ?>
                            </option>
                                <?php }?>
                        </select>                              
                    </div>
                    <div class="col-2">
                        <label for="" class="col-sm-2 col-form-label">N°Devis</label>
                        <select class="form-select text" name="numdev" style="background-color:#DCDCDC;" aria-label="Default select example" >

                            <option value="<?php echo @$numdev;?>" selected>

                                <?php echo @$numdev;?>

                            </option>
                            <?php
                                // remplissage liste deroulante categorie materiel
                                foreach ($resrqtdevis as $lign){
                                    //nombre de categorie
                                    $x=$x+1;
                            ?>
                            <option value="<?php echo $lign['numdev'] ; ?>">
                                <?php
                                echo $lign['numdev']  ;
                                ?>
                            </option>
                                <?php }?>
                        </select>            
                    </div>
                    <div class="col-2">
                        <label for="" class="col-sm-2 col-form-label mx-0">N°BC</label>
                        <select class="form-select text" name="numbc" style="background-color:#DCDCDC;" aria-label="Default select example" >

                            <option value="<?php echo @$n°bc;?>" selected><?php echo @$n°bc?></option>
                            <?php
                                // remplissage liste deroulante bc
                                foreach ($resrqtbc as $lign){
                                   
                            ?>
                            <option value="<?php echo $lign['numbc'] ; ?>">
                                <?php
                                echo $lign['numbc'];
                                ?>
                            </option>
                                <?php }?>
                        </select>          
                    </div>
                    <div class="col-4">
                        <label for="" class="col-sm-2 col-form-label mx-0">N°BL</label>
                        <select class="form-select text" name="numbl" style="background-color:#DCDCDC;" aria-label="Default select example" >

                            <option value="<?php echo @$n°bl;?>" selected>

                                <?php echo @$n°bl."--DL:".@$dl;?>

                            </option>
                            <?php
                                // remplissage liste deroulante bLIV
                                foreach ($resrqtbl as $lign){
                                    //nombre de categorie
                                    $x=$x+1;
                            ?>
                            <option value="<?php echo $lign['numbl'] ; ?>">
                                <?php
                                echo $lign['numbl']."--DL:"  ;
                                $nmbl=("SELECT `dateliv` FROM `blivraison` where numbl=?  ");//modifier date de livraison
                                $rqtnmbl= $connection->prepare($nmbl);
                                $rqtnmbl->execute(array($lign['numbl']));
                                $resrqtnmbl= $rqtnmbl->fetchall();
                                foreach ($resrqtnmbl as $engbc){
                                    echo $engbc['dateliv'];
                                }
                                
                                ?>
                            </option>
                                <?php }?>
                        </select>          
                    </div>
                    
                    
                </div>
                <div class="row g-2">
                    <div class="col-12  text-center my-auto  ">
                        <button type="submit" name="btnmodifcmd" class="btn btn-primary my-1 " data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">Modifier</button>
                        <a href="accueil.php?pag=bdc"  class="btn btn-primary my-1"  >Annuler</a>

                    </div>
                </div>
            </div>
        </div>

    
        <div class="container bg-dark mt-3 text-center table-size-5 table-responsive" >

            <!--filtrage -->
            <div class="figure w-75 mt-1 mb-2 px-2 text-warning border border-4  border-secondary text-center ">
                <div class="row g-3">
                    
                    <div class="col-3 text-start">
                        <button type="submit" name="btnaffallcmd" class="btn btn-primary my-2  " data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9"/>
                                <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
                            </svg>
                        </button>
                        <label for="date" class=" col-form-label mx-0 ">Actualiser</label>
                    
                    </div>
                    <div class="col-9 ">
                        <label for="date" class="col-sm-2 col-form-label mx-0">Filtrer</label>
                    </div>
                </div>
                <div class="figure w-100  mb-2 px-2 text-light border border-1 border-warning text-center ">
                        <div class="row mx-0 px-0">
                            <div class="col-9 ">
                                <label for="date" class=" col-form-label mx-0">Commande(s) comprise(s) Entre</label>
                            </div>
                            <div class="col-3 text-center px-0">
                                <label for="date" class=" col-form-label mx-0 ">Par Client</label>
                            </div>
                        </div>                    
                        <div class="row g-1">
                        <div class="col-1 ">
                            <label for="date" class=" col-form-label mx-0"> le</label>
                        </div>
                        <div class="col-2 ">
                            <input type="date" name="datdeb"  class="form-control mb-2 border-dark" style="background-color:#DCDCDC;"  id="datjob" >
                        </div>
                        <div class="col-1 ">
                            <label for="date" class="  col-form-label mx-0">Et le</label>
                        </div>
                        <div class="col-2">
                            <input type="date" name="datfin"  class="form-control  mb-2 border-dark" style="background-color:#DCDCDC;"  id="datjob" >
                        </div>
                        <div class="col-2 text-start">
                            <button type="submit" name="btnfiltrecmd" class="btn btn-primary mb-2  " data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                    <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
                                </svg>  
                            </button>                      
                        </div>
                        <div class="col-3 text-start">
                        <select class="form-select text" name="filtrecli" style="background-color:#DCDCDC;" aria-label="Default select example">

                            <option selected></option>
                            <?php
                            // remplissage liste deroulante categorie materiel
                            foreach ($resrqtcli as $lign){
                                //nombre de categorie
                                $x=$x+1;
                            ?>
                           <option value="<?php echo $lign['numcli'];?>">
                         
                            <?php
                            echo $lign['numcli']  ;
                                echo "--".$lign['nomcli']  ;
                            ?>
                            </option>
                            <?php }?>
                        </select>                      
                        </div>
                        <div class="col-1 text-start">
                            <button type="submit" name="btnfiltrecmdbycli" class="btn btn-primary mb-2  " data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                    <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
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
                    <label for="date" class=" col-form-label mx-0">voulez vous supprimer la commande?</label>
                    <button type='submit' name='btnsupcmd' class='btn btn-primary my-1 ' data-bs-placement='bottom' title='Modifier les donnees' value='envoyer'>Oui</button>
                    <a href="accueil.php?pag=bdc"  class="btn btn-primary btn-sm my-1 "  >Non</a>
                            
                </div>
        <?php } ?>
            <!--affichage des commandes -->
            <table class="table border-2  text-light ">
                <thead>
                    <tr>
                    <th scope="col">DATE</th>
                    <th scope="col">N°JOB</th>
                    <th scope="col">CLIENT</th>
                    <th scope="col">MATERIEL</th>
                    <th scope="col">N°DEVIS</th>
                    <th scope="col">N°BC</th>
                    <th scope="col">N°BL</th>
                    <th scope="col">D.LIVRASON</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($resaffcmd as $eng){
                        

                        
                    ?>
                        <tr>
                        <th scope="row">
                            <?php
                                echo $eng['date'];
                            ?>
                        </th>
                        <td>
                            <?php
                                echo $eng['numjob'];
                            ?>
                        </td>
                        <td>
                            <?php
                                $cli=("SELECT `nomcli`,`telephone` FROM `client` where numcli=?  ");
                                $rqtcli= $connection->prepare($cli);
                                $rqtcli->execute(array($eng['numcli']));
                                $resrqtcli= $rqtcli->fetchall();
                                foreach ($resrqtcli as $engcli){
                                    echo $eng['numcli']." / ".$engcli['nomcli']." / ".$engcli['telephone'];
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                //affichage materiel deposé
                                
                                $matd=("SELECT `marque`,`type`,`puissance`,`vitesse`,`numcat` FROM `materiel` where nums=?  ");
                                $rqtmatd= $connection->prepare($matd);
                                $rqtmatd->execute(array($eng['nums']));
                                $resrqtmatd= $rqtmatd->fetchall();
                                foreach ($resrqtmatd as $engmatd){
                                    $nmcat=("SELECT `nom` FROM `categorie` where numcat=?  ");
                                    $rqtnmcat= $connection->prepare($nmcat);
                                    $rqtnmcat->execute(array($engmatd['numcat']));
                                    $resrqtnmcat= $rqtnmcat->fetchall();
                                    foreach ($resrqtnmcat as $engcat){
                                        echo $engcat['nom']." / ";
                                    }
                                    echo "Serie: ".$eng['nums']." / ".$engmatd['marque']." / "."Type: ".$engmatd['type']." / ".$engmatd['puissance']." / ". $engmatd['vitesse'];
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $eng['numdev'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $eng['numbc'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $eng['numbl'];
                                $nmbl=("SELECT `dateliv` FROM `blivraison` where numbl=?  ");
                                $rqtnmbl= $connection->prepare($nmbl);
                                $rqtnmbl->execute(array($eng['numbl']));
                                $resrqtnmbl= $rqtnmbl->fetchall();
                                
                            ?>
                        </td>
                        <td>
                            <?php
                                foreach ($resrqtnmbl as $engdlv){
                                    echo $engdlv['dateliv'];
                                }
                                //print_r($resrqtnmbc);
                            ?>
                        </td>
                        <td>
                           
                            <a href="accueil.php?pag=bdc&act=1&num=<?php echo $eng['numjob'] ?>"  class="btn btn-primary btn-sm my-1 "  >Modifier</a>
                            <a href="accueil.php?pag=bdc&act=2&num=<?php echo $eng['numjob'] ?>"  class="btn btn-danger btn-sm my-1 "  ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                </svg>
                            </a>
                            
                        </td>
                    <?php } 
                    
                        echo $num;?>
                        
                        </tr>

                    
                </tbody>
            </table>
            
        </div>
    </form>
</body>
</html>