<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <style hrel="pagecss.css" rel="stylesheet"></style>
    
</head>
<body>


   <?php

        @$admin=$_SESSION['admin'];
        @$nom=$_SESSION['nom'];
        @$prenom=$_SESSION['prenom'];
        include("header.php");
        if($admin=="sadmin"){
            include("menu1.php");
        }elseif($admin=="Administrateur"){
            include("menuboss.php");
        }else{
            include("menu.php");
        }
       
    ?>
    <?php 
        $pag=@$_GET['pag'];
        if($pag==''){

    ?>
            <div class=" container text-center h-50 bg-dark " >
            <div class="figure w-100 h-50 x=0 text-light my-0 "style="font-family:High Tower Text; " >
            <h4><?php echo"Bienvenue Mme ".$nom." ".$prenom;  ?></h4>
            </div>
            </div>    
    <?php
        }elseif($pag=='saisi'){
            //saisie
            include("saisie.php");
        }elseif($pag=='bdc'){
            //commande
            include("bon_commande.php");
        }elseif($pag=='mch'){
            //materiel
            include("materiel.php");
        }elseif($pag=='clt'){
            //client
            include("client.php");
        }elseif($pag=='affdoc'){
            // devis
            include("affdoc.php");
        }elseif($pag=='dev'){
            include("affdoc.php");
            include("devis.php");
        }elseif($pag=='affdev'){
            if($admin!=="Administrateur"){
                include("affdoc.php");
            }
            
            include("affdev.php");
        }elseif($pag=='doc'){
            // affichage BC
            include("documents.php");
        }elseif($pag=='bcmd'){
            include("documents.php");
            include("bcmd.php");
        }elseif($pag=='affbcmd'){
            if($admin!=="Administrateur"){
                include("documents.php");
            }
            
            include("affbcmd.php");
        }elseif($pag=='bliv'){
            // affichage BLIV
            include("docbl.php");
        }elseif($pag=='bl'){
            include("docbl.php");
            include("bliv.php");
        }elseif($pag=='affbl'){
            if($admin!=="Administrateur"){
                include("docbl.php");   
            }
            
            include("affbl.php");
        }elseif($pag=='prof'){
            // user
            include("profil.php");
        }elseif($pag=='nuser'){
            include("new_user.php");
        
        }elseif($pag=='cat'){
            include("categorie.php");
        
        }
    ?>
  
</body>
<script src="js/bootstrap.bundle.min.js" ></script>
</html>