<?php
   include("connexion.php");
   
   $x=0;
   $affcli=("SELECT * FROM `client` order by `nomcli`"); 
   $rqtaffcli= $connection->prepare($affcli);
   $rqtaffcli->execute();
    $resaffcli= $rqtaffcli->fetchall();

    @$resaffcli=@$_SESSION['resaffallcli'];
    
    $cli="SELECT * from client order by nomcli";
    $rqtcli=$connection->prepare($cli);
    $rqtcli->execute();
    $resrqtcli= $rqtcli->fetchall();

    // remplir champ modification
    $act = @$_GET['act'] ;

    if($act==1){
        $num = @$_GET["num"] ;
        $_SESSION['num']=$num;
        $mod=("SELECT * FROM `client` WHERE `numcli`=? ");
        $rqtmod= $connection->prepare($mod);
        $rqtmod->execute(array($num));
        $resrqtmod= $rqtmod->fetchall();

        // remplissage
        @$nmcli=$resrqtmod[0][0];
        @$nomcli=$resrqtmod[0][1];
        @$tel=$resrqtmod[0][2];

       /*  $_SESSION['nmcli']=$nmcli;
        $_SESSION['nomcli']=$nomcli;
        $_SESSION['tel']=$tel;
        */
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>client</title>
    
</head>
<body style="background-color:#DCDCDC;">
    <form class=" " method="POST" action="traitement.php">
        <div class="container bg-dark py-3 text-warning text-center">
        
            <div class="figure rounded w-100 float-end mb-3  text-start ">
                <a href="accueil.php?pag=saisi"  class="btn btn-warning btn-sm my-1 "  >Saisie</a>
            </div>
            <div class="figure w-100  row g-1 pb-2 border border-1 border-warning text-center ">
                <div class="col-3">
                    <label for="num" class="col-sm-2 col-form-label mx-0">N°</label>
                    <input type="text" name="numcli"  class="form-control mb-2 border-dark" style="background-color:#DCDCDC;" id="numcli" value="<?php echo @$nmcli;?>"  placeholder="EX:SUCA01">
                </div>
                <div class="col-5">
                    <label for="nom" class="col-sm-2 col-form-label mx-0">Nom</label>
                    <input type="text" name="nomcli"  class="form-control mb-2 border-dark"  id="nomcli" value="<?php echo @$nomcli;?>" placeholder="Entrez le nom du client">
                </div>
                
                <div class="col-2">
                    <label for="number" class="col-sm-2 col-form-label">N°TEL</label>
                    <input type="text" name="telcli"  class="form-control border-dark" style="background-color:#DCDCDC;" id="number" value="<?php echo @$tel;?>" placeholder="00000000">
                </div>
               
                <div class="col-2  text-start my-auto px-3 pt-2  mt-4 ">
                    <button type="submit"  name="btnmodifitemcli" class="btn btn-primary " data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">valider</button>
                    <a href="accueil.php?pag=clt"  class="btn btn-primary my-1"  >Annuler</a>
                
                </div>
            </div>


            
        </div>

    
    
        <div class="container bg-dark mt-3 text-warning text-center table-responsive">

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
                                    <label for="date" class=" col-form-label mx-0">N°Client</label>
                                </div>
                                <div class="col-3 text-end">
                                    <label for="date" class=" col-form-label mx-0 ">Actualiser</label>
                                </div>
                            </div>                    
                            <div class="row">    
                            <div class="col-6 text-start">
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
                                    echo $lign['nomcli']  ;
                                    ?>
                                    </option>
                                    <?php }?>
                                </select>                      
                            </div>
                            <div class="col-3 text-start">
                                <button type="submit" name="btnfiltrecli" class="btn btn-primary mb-2  " data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                        <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
                                    </svg>  
                                </button>                      
                            </div>
                            <div class="col-3 text-end">
                                <button type="submit" name="btnaffallcli" class="btn btn-primary mb-2  " data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9"/>
                                        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
                                    </svg>
                                </button>                      
                            </div>
                        </div>
                    </div>
                </div>

        <!--suppression  -->
        <?php if($act==2){
                $num = @$_GET["num"] ;
                $_SESSION['num']=$num;
                ?>
                
                <div class='col-12  text-center my-auto text-light '>
                    <label for="date" class=" col-form-label mx-0">voulez vous supprimer la l'enregistrement ?</label>
                    <button type='submit' name='btnsupcli' class='btn btn-primary my-1 ' data-bs-placement='bottom' title='Modifier les donnees' value='envoyer'>Oui</button>
                    <a href="accueil.php?pag=clt"  class="btn btn-primary btn-sm my-1 "  >Non</a>
                            
                </div>
            <?php } ?>
        <!--affichage -->
            <table class="table text-light">
                <thead>
                    <tr>
                    <th scope="col">N°</th>
                    <th scope="col">NOM</th>
                    <th scope="col">N°TEL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resaffcli !== null && (is_array($resaffcli) || is_object($resaffcli))) {
                        foreach ($resaffcli as $engcli){
                            $x= $x+1;

                        
                    ?>
                        <tr>
                        <th scope="row">
                            <?php
                                echo @$engcli['numcli'];
                            ?>
                        </th>
                        <td>
                            <?php
                                echo @$engcli['nomcli'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo @$engcli['telephone'];
                            ?>
                        </td>
                        <td>
                        <a href="accueil.php?pag=clt&act=1&num=<?php echo @$engcli['numcli']; ?>"  class="btn btn-primary btn-sm my-1 "  >Modifier</a>
                                <a href="accueil.php?pag=clt&act=2&num=<?php echo @$engcli['numcli']; ?>"  class="btn btn-danger btn-sm my-1 "  ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
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