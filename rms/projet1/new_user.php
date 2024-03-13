<?php
   include("connexion.php");
   $chr=0;
   $aff="SELECT * FROM `utilisateur` "; 
   $rqtaffcmd = $connection->prepare($aff);
   $rqtaffcmd->execute(); 
   $resaff = $rqtaffcmd->fetchAll(); 

   @$act=$_GET['act'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New user</title>
</head>
<body>
    <form method="POST" action="traitement.php">
        <div class="container bg-dark text-warning text-center">

            <div class="figure w-100 mt-0 mb-3 px-2 border border-1 border-warning text-center pb-2">

                <div class="row g-2 text-warning">
                            
                    <div class="col-2">
                        <label for="materiel" class="col-sm-5 col-form-label mx-0">Matricule</label>
                        <input type="text" name="matricule"  class="form-control mb-2 border-dark" style="background-color:#DCDCDC;" id="infmat" value="" placeholder="...">
                    </div>
                    <div class="col-2">
                        <label for="client" class="col-sm-2 col-form-label">Nom</label>
                        <input type="text" name="nom"  class="form-control border-dark" style="background-color:#DCDCDC;"  id="infcli" value="" placeholder="..." >
                    </div>
                    <div class="col-3">
                        <label for="client" class="col-sm-2 col-form-label">Prénom</label>
                        <input type="text" name="prenom"  class="form-control border-dark" style="background-color:#DCDCDC;"  id="infcli" value="" placeholder="..." >
                    </div>
                    <div class="col-2">
                        <label for="client" class=" col-form-label">E-mail</label>
                        <input type="text" name="email"  class="form-control border-dark" style="background-color:#DCDCDC;"  id="infcli" value="" placeholder="..." >
                    </div>
                    <div class="col-2">
                        <label for="client" class="col-form-label">Mot de Passe</label>
                        <input type="text" name="psword"  class="form-control border-dark" style="background-color:#DCDCDC;"  id="infcli" value="" placeholder="..." >
                    </div>
                    <div class="col-1">
                        <label for="client" class="col-form-label">admin</label>
                        <select class="form-select text" name="ad" style="background-color:#DCDCDC;" aria-label="Default select example">
                            <option selected></option>
                            <option value="sadmin">sadmin</option>
                            <option value="user">user</option>
                            <option value="Administrateur">Administrateur</option>

                            
                        </select>                   
                    </div>
                </div>
                                
                <div class="row g-2">
                
                    <div class="col-12  text-center my-auto  ">
                        <button type="submit" name="btnuser"  class="btn btn-primary my-1 " >Ajouter</button>
                        <a href="accueil.php?pag=nuser" class="btn btn-primary my-1  ">Annuler</a>
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
                    <button type='submit' name='btnsupuser' class='btn btn-primary my-1 ' data-bs-placement='bottom' title='Modifier les donnees' value='envoyer'>Oui</button>
                    <a href="accueil.php?pag=nuser&act=4"  class="btn btn-primary btn-sm my-1 "  >Non</a>
                            
                </div>
            <?php } ?>

            <!--affichage des utilisateurs -->
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
                        foreach ($resaff as $eng){//affichage utilisateur
                    ?>
                        <tr>
                        <th scope="row">
                            <?php
                                 echo @$eng['mat'];
                            ?>
                        </th>
                        <td>
                            <?php
                                echo @$eng['non'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo @$eng['prenom'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo @$eng['email'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo @$eng['psword'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo @$eng['admin'];
                            ?>
                        </td>
                        <td>
                           
                            <a href="accueil.php?pag=nuser&act=1&num=<?php echo @$eng['mat'] ?>"  class="btn btn-primary btn-sm my-1 "  >Modifier</a>
                            <a href="accueil.php?pag=nuser&act=3&num=<?php echo @$eng['mat'] ?>"  class="btn btn-danger btn-sm my-1 "  ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                </svg>
                            </a>
                            
                        </td>
                        
                    </tr>
                    <tr>
                        
                    </tr>

                    <?php }?>
                </tbody>
            </table>




            <?php
            @$id=$_GET['id'];
            
            @$mod=$_GET['pagmod'];
            if($act=="1"){
                $num=$_GET['num'];
                @$_SESSION['num']=$num;
            $moduser="SELECT * FROM `utilisateur` WHERE `mat`=? ";
            $rqtmod=$connection->prepare($moduser);
            $rqtmod->execute(array($num));
            $resmod=$rqtmod->fetchAll();
            $matri= $resmod[0][0];
            $name= $resmod[0][1];
            $prenm= $resmod[0][2];
            $mail= $resmod[0][3];
            $mp= $resmod[0][4];
            $admn= $resmod[0][5];
        ?>
        <div class="row g-2">
                    
                    <div class="col-2">
                        <label for="" class="col-sm-5 col-form-label mx-0">Matricule</label>
                        <input type="text" name="mat"  class="form-control mb-2 border-dark" style="background-color:#DCDCDC;" id="infmat" value="<?php echo @$matri;?>" placeholder="...">
                    </div>
                    <div class="col-2">
                        <label for="" class="col-sm-2 col-form-label">Nom</label>
                        <input type="text" name="nom"  class="form-control border-dark" style="background-color:#DCDCDC;"  id="infcli" value="<?php echo @$name; ?>" placeholder="..." >
                    </div>
                    <div class="col-2">
                        <label for="" class="col-sm-2 col-form-label">Prénom</label>
                        <input type="text" name="prenom"  class="form-control border-dark" style="background-color:#DCDCDC;"  id="infcli" value="<?php echo @$prenm; ?>" placeholder="..." >
                    </div>
                    <div class="col-3">
                        <label for="" class=" col-form-label">E-mail</label>
                        <input type="text" name="email"  class="form-control border-dark" style="background-color:#DCDCDC;"  id="infcli" value="<?php echo @$mail; ?>" placeholder="..." >
                    </div>
                    <div class="col-2">
                        <label for="" class="col-form-label">Mot de Passe</label>
                        <input type="text" name="psword"  class="form-control border-dark" style="background-color:#DCDCDC;"  id="infcli" value="<?php echo @$mp; ?>" placeholder="..." >
                    </div>
                    <div class="col-1">
                    <label for="" class="col-form-label">admin</label>
                    <select class="form-select text" name="ad" style="background-color:#DCDCDC;" aria-label="Default select example">
                        <option value="<?php echo @$admn; ?>" selected><?php echo @$admn; ?></option>
                        <option value="sadmin">sadmin</option>
                        <option value="user">user</option>
                        <option value="Administrateur">Administrateur</option>

                        
                    </select>                   
                </div>
                </div>
               
                <div class="row g-2">
                
                    <div class="col-12  text-center my-auto  ">
                        <button type="submit" name="btnmodifuserbyad" class="btn btn-primary my-1 " data-bs-placement="bottom" title="Modifier les donnees" value="envoyer">Modifier</button>
                        <a href="accueil.php?pag=nuser" class="btn btn-primary my-1  ">Annuler</a>
                    </div>
                </div>
            </div>
        <?php }
        ?>
        </div>
    </form>
</body>
</html>