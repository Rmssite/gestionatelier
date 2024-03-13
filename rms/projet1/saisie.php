<?php
    include("connexion.php");

    $err2="";

    @$datjob=$_SESSION['datjob'];
    //categorie
    $x=0;
    $cat="SELECT * from categorie";
    $rqtcat=$connection->prepare($cat);
    $rqtcat->execute();
    $catmat= $rqtcat->fetchall();

    $cli="SELECT * from client ORDER BY nomcli";
    $rqtcli=$connection->prepare($cli);
    $rqtcli->execute();
    $resrqtcli= $rqtcli->fetchall();

    /* //client
    $x=0;
    $cli="SELECT * from client";
    $rqtcli=$connection->prepare($cli);
    $rqtcli->execute();
    $resrqtcli= $rqtcli->fetchall();
  */
// affichage derniere commande
   $affcmd = "SELECT * FROM `commande` ORDER BY `numjob` DESC LIMIT 0, 1";
    $rqtaffcmd = $connection->prepare($affcmd);
    $rqtaffcmd->execute(); 
    $resaffcmd = $rqtaffcmd->fetchAll();   
// affichage numjob  
   @$numjob=$resaffcmd[0][0];
   $numjob++;

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie</title>
    
</head>

<body style="background-color:#DCDCDC;">
    <div class="container bg-dark  text-warning text-center">
        
        <form class=" " method="POST" action="traitement.php">
            <div class="figure rounded w-100 float-end mb-3  text-start ">
                <a href="accueil.php?pag=clt"  class="btn btn-warning btn-sm my-1 "  >Client</a>
                <a href="accueil.php?pag=cat"  class="btn btn-warning btn-sm my-1 "  > Categorie materiel</a>
                
            </div>
            <!--espace commandes -->
            <div class="figure rounded w-75 float-end mt-3 mb-2  text-end ">
                <div class="row text-end g-1">
                    <div class="col-2  ">
                        <label for="date" class="col-form-label mx-0">Date :</label>
                    </div>
                    <div class="col-4  ">
                        <input type="date" name="datjob"  class="form-control mb-2 border-dark" style="background-color:#DCDCDC;"  id="datjob" >
                    </div>
                    <div class="col-2  ">
                        <label for="numjob" class=" col-form-label ">N°JOB :</label>
                    </div>
                    <div class="col-4  ">
                    <input type="text" name="numjob"  class="form-control border-dark bg-dark text-success "  id="numjob" style="background-color:#DCDCDC;"  value="<?php echo $numjob?>" disabled >
                    </div>
                </div>
                
            </div>

            <!--espace client -->
            <div class="figure rounded w-100 text-light float-end mt-3 mb-2  text-center ">
                <div class="row g-1">
                    <div class="col-12 text-center ">
                    Client 
                    </div>
                </div>
            </div>
            <div class="figure w-100  mb-3 row g-2 pb-2 px-2 border border-1 border-warning text-center ">
                <div class="col-12 text-center">
                <select class="form-select text" name="numcli" style="background-color:#DCDCDC;" aria-label="Default select example" >
                    <option  selected>
                    </option>
                    <?php
                        // remplissage liste deroulante categorie materiel
                        foreach ($resrqtcli as $lign){
                            //nombre de categorie
                           
                    ?>
                    <option value="<?php echo $lign['numcli'] ; ?>">
                        <?php
                        echo $lign['numcli']."--".$lign['nomcli']."--".$lign['telephone']  ;
                        ?>
                    </option>
                        <?php }?>
                </select>    
                </div>
            </div>
            
            <!--espace matériel -->
            <div class="figure rounded w-100 text-light float-end my-2  text-center ">
                <div class="row g-1">
                    <div class="col-12 text-center ">
                        Materiel
                    </div>
                </div>
            </div>
            <div class="figure w-100  mt-0 mb-3 px-2  border border-1 border-warning text-center ">
                <div class="row g-4">
                    <div class="col-3">
                        <label for="srlnum" class=" col-form-label mx-0">N° de Serie</label>
                        <input type="text" name="srlnum"  class="form-control mb-2 border-dark" style="background-color:#DCDCDC;" id="srlnum" >
                    </div>
                    <div class="col-5">
                        <label for="categorie" class="col-sm-3 col-form-label mx-0">Catégorie </label>
                        <select class="form-select text" name="catmat" style="background-color:#DCDCDC;" aria-label="Default select example">

                            <option selected></option>
                             <?php
                                // remplissage liste deroulante categorie materiel
                                foreach ($catmat as $lign){
                                    //nombre de categorie
                                    
                            ?>
                            <option value="<?php echo $lign['numcat'] ; ?>">
                                <?php
                                
                                 echo $lign['numcat']."..".$lign['nom']  ;
                                ?>
                            </option>
                                <?php }?>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="tpmat" class="col-sm-2 col-form-label">Type</label>
                        <input type="text" name="tpmat"  class="form-control border-dark"  id="tpmat" style="background-color:#DCDCDC;" placeholder="..." >
                        
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-4">
                        <label for="mrqmat" class="col-sm-2 col-form-label ">Marque</label>
                        <input type="text" name="mrqmat"  class="form-control border-dark"  id="mrqmat" style="background-color:#DCDCDC;" placeholder="...">
                    </div>
                    <div class="col-4">
                        <label for="puissance" class="col-sm-2 col-form-label mx-0">Puissance</label>
                        <input type="text" name="puismat"  class="form-control mb-2 border-dark"  id="puismat" style="background-color:#DCDCDC;"  placeholder="EX:250KW">
                    </div>
                    <div class="col-4">
                        <label for="vitesse" class="col-sm-2 col-form-label ">Vitesse</label>
                        <input type="text" name="vtsmat"  class="form-control border-dark"  id="vtsmat" style="background-color:#DCDCDC;" placeholder="EX:1490RPM">
                    </div>
                </div>
            </div>
             <!--bouton valider -->
            <div class="figure rounded w-100 mt-1 mb-2  text-center ">
                
                    <div class="col-12  text-center  ">
                        <button type="submit" name="btnvalsaisi" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enregistrer les donnees" value="envoyer">Enregistrer</button>
                    </div>
                
            </div>
           
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
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
        <?php
            
             if( @$_SESSION['ctrl1']==0)
             {
                $err2=@$_SESSION['err'];
             }else
             {
                
                $err2="";
             }
                echo "$err2";



        ?>

        
    
    
    </div>
  
</body>
</html>