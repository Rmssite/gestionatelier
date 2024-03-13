<?php
   include("connexion.php");

   @$resaffcmd=$_SESSION['resaffcmd'];

   $bc="SELECT * from bcommande";
    $rqtbc=$connection->prepare($bc);
    $rqtbc->execute();
    $resrqtbc= $rqtbc->fetchall();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bon_commande</title>
    
    
</head>

<body style="background-color:#DCDCDC;">
    <form class="  " method="POST" action="traitement.php"enctype="multipart/form-data">
        <!--formulaire modification -->
        <div class="container bg-dark text-warning text-center">
            <div class="figure w-50 mt-0 mb-3 px-2 border border-1 border-warning text-center ">
                
                <div class="row g-3">
                   
                    <div class="col-6">
                        <label for="client" class="col-sm-2 col-form-label mx-0">N°BC</label>
                        <select class="form-select text" name="numbc" style="background-color:#DCDCDC;" aria-label="Default select example">
                            <option selected></option>
                            <?php
                            // remplissage liste deroulante categorie materiel
                            foreach ($resrqtbc as $lign){
                               
                            ?>
                            <option value="<?php echo $lign['numbc'];?>">
                            <?php
                            echo $lign['numbc']  ;
                            ?>
                            </option>
                            <?php }?>
                        </select>          
                    </div>
                    <div class="col-6  text-start mt-5  ">
                        <button type="submit" name="btnaddbcmd" class="btn btn-primary my-1 " data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">Ajouter</button>
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
                <div class="figure w-100  mb-2 px-2 text-light border border-1 border-warning text-center ">
                        <div class="row">
                            <div class="col-9 ">
                                <label for="date" class=" col-form-label mx-0">Commande(s) comprise(s) Entre</label>
                            </div>
                            <div class="col-3 text-end">
                                <label for="date" class=" col-form-label mx-0 ">Actualiser</label>
                            </div>
                        </div>                    
                        <div class="row g-1">
                        <div class="col-1 ">
                            <label for="date" class=" col-form-label mx-0"> le</label>
                        </div>
                        <div class="col-3 ">
                            <input type="date" name="datdeb"  class="form-control mb-2 border-dark" style="background-color:#DCDCDC;"  id="datjob" >
                        </div>
                        <div class="col-1 ">
                            <label for="date" class="  col-form-label mx-0">Et le</label>
                        </div>
                        <div class="col-3">
                            <input type="date" name="datfin"  class="form-control  mb-2 border-dark" style="background-color:#DCDCDC;"  id="datjob" >
                        </div>
                        <div class="col-2 text-start">
                            <button type="submit" name="btnfiltre" class="btn btn-primary mb-2  " data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                    <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
                                </svg>  
                            </button>                      
                        </div>
                        <div class="col-2 text-end">
                            <button type="submit" name="btnaffall" class="btn btn-primary mb-2  " data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                    <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9"/>
                                    <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
                                </svg>                            
                            </button>                      
                        </div>
                    </div>
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
                        <td>
                        
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?php echo @$eng['numjob']?>" name="chkaddbc[]" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                Ajouter
                                </label>
                                
                               
                            </div>
                      
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