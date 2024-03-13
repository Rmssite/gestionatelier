<?php
    session_start();
    include("connexion.php");    

    //_______________________________________________________fonction____________________________________________

    // securisation des formulaires
    $_SESSION['ctrl1']=1;
    function secu($donnees){
        $donnees= trim($donnees);
        $donnees= stripslashes($donnees);
        $donnees= strip_tags($donnees);
        return $donnees;
    }
    //format date
    function formatdatjob($datjob, $format) {
        return date($format, strtotime($datjob));
    }

    // filtre
    function filtrecmdbydate(){
        include("connexion.php"); 
        $datdeb=$_POST["datdeb"];
        $datfin=$_POST["datfin"];
        $aff = "SELECT * FROM `commande` WHERE `date` BETWEEN ? AND ? ORDER BY `numjob` DESC";
        $crits=array($datdeb, $datfin); 
        $rqtaffcmd = $connection->prepare($aff);
        $rqtaffcmd->execute($crits); 
        $resaff = $rqtaffcmd->fetchAll(); 
        return $resaff;
    }

    function filtrecmdbycli() {
        include("connexion.php");
    
        $crits = array($_POST["filtrecli"]);
        print_r($crits);
    
        $aff = "SELECT * FROM `commande` WHERE `numcli`=? ORDER BY `numjob` DESC";
            $rqtaffcmd = $connection->prepare($aff);
            $rqtaffcmd->execute($crits); 
            $resaff = $rqtaffcmd->fetchAll(); 
            return $resaff;
       
    }

    function filtre($crits,$aff) {
        include("connexion.php");
    
       /*  $crits = array($_POST["filtrecli"]);
        print_r($crits);
     */
        //$aff = "SELECT * FROM `commande` WHERE `numcli`=? ORDER BY `numjob` DESC";
        $rqtaffcmd = $connection->prepare($aff);
        $rqtaffcmd->execute($crits); 
        $resaff = $rqtaffcmd->fetchAll(); 
        return $resaff;
       
    }

    function affichall($aff){
        include("connexion.php");  
        $rqtaffcmd = $connection->prepare($aff);
        $rqtaffcmd->execute(); 
        $resaff = $rqtaffcmd->fetchAll(); 
        return $resaff;
    }

    //_______________________________________________________________bouton filtre__________________________________________

    //__________commandes_______

        // commande par client
    if(isset($_POST['btnfiltrecmdbycli'])){
        $resaffcmd =filtrecmdbycli();
        print_r($resaffcmd);
        $_SESSION['resaffallcmd']=$resaffcmd;
        header('location:accueil.php?pag=bdc');  
    }

        //commandes par date

    if(isset($_POST['btnfiltrecmd'])){
        $resaffcmd =filtrecmdbydate();
        $_SESSION['resaffallcmd']=$resaffcmd;
        header('location:accueil.php?pag=bdc');
    }

    //___________devis________
    if(isset($_POST['btnfiltredev'])){
        $critdev = array($_POST["filtredev"]);
        $affdev = "SELECT * FROM `devis` WHERE `numdev`=? ORDER BY `compt` DESC  ";
        $resaffcmd =filtre($critdev,$affdev);
        print_r($resaffcmd);
        $_SESSION['resaffalldev']=$resaffcmd;
        header('location:accueil.php?pag=affdev');  
    }

    //___________Bliv________
    if(isset($_POST['btnfiltrebl'])){
        $critdev = array($_POST["filtrebl"]);
        $affdev = "SELECT * FROM `blivraison` WHERE `numbl`=? ORDER BY `compt` DESC ";
        $resaffcmd =filtre($critdev,$affdev);
        print_r($resaffcmd);
        $_SESSION['resaffallbl']=$resaffcmd;
        header('location:accueil.php?pag=affbl');  
    }

     //___________BC________
     if(isset($_POST['btnfiltrebc'])){
        $critdev = array($_POST["filtrebc"]);
        $affdev = "SELECT * FROM `bcommande` WHERE `numbc`=? ORDER BY `compt` DESC ";
        $resaffcmd =filtre($critdev,$affdev);
        print_r($resaffcmd);
        $_SESSION['resaffallbc']=$resaffcmd;
        header('location:accueil.php?pag=affbcmd');  
    }
    //___________client________
    if(isset($_POST['btnfiltrecli'])){
        $critdev = array($_POST["filtrecli"]);
        $affdev = "SELECT * FROM `client` WHERE `numcli`=? ";
        $resaffcmd =filtre($critdev,$affdev);
        print_r($resaffcmd);
        $_SESSION['resaffallcli']=$resaffcmd;
        header('location:accueil.php?pag=clt');  
    }
    //___________materiel________
    if(isset($_POST['btnfiltremat'])){
        $critdev = array($_POST["filtremat"]);
        $affdev = "SELECT * FROM `materiel` WHERE `nums`=? ORDER BY `compt` DESC ";
        $resaffcmd =filtre($critdev,$affdev);
        print_r($resaffcmd);
        $_SESSION['resaffallmat']=$resaffcmd;
        header('location:accueil.php?pag=mch');  

    }
    // bon de commande par date
        
    if(isset($_POST['btnfiltre'])){

        $resaffcmd =filtrecmdbydate();
        $_SESSION['resaffcmd']=$resaffcmd;
        header('location:accueil.php?pag=bcmd');
   }

    


   // tout afficher

   if(isset($_POST['btnaffallcmd'])){
        $affcmd = "SELECT * FROM `commande` ORDER BY `numjob` DESC";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffallcmd']=$resaffcmd;
        header('location:accueil.php?pag=bdc');       
    }

    if(isset($_POST['btnaffall'])){
        $affcmd = "SELECT * FROM `commande` ORDER BY `numjob` DESC";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffcmd']=$resaffcmd;
        header('location:accueil.php?pag=bcmd');       
    }

    if(isset($_POST['btnaffalldev'])){
        $affcmd = "SELECT * FROM `devis` ORDER BY `compt` DESC ";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffalldev']=$resaffcmd;
        header('location:accueil.php?pag=affdev');       
    }

    if(isset($_POST['btnaffallbc'])){
        $affcmd = "SELECT * FROM `bcommande` ORDER BY `compt` DESC ";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffallbc']=$resaffcmd;
        header('location:accueil.php?pag=affbcmd');       
    }

    if(isset($_POST['btnaffallbl'])){
        $affcmd = "SELECT * FROM `blivraison` ORDER BY `compt` DESC ";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffallbl']=$resaffcmd;
        header('location:accueil.php?pag=affbl');       
    }

    if(isset($_POST['btnaffallcli'])){
        $affcmd = "SELECT * FROM `client` ORDER BY `numcli` DESC  ";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffallcli']=$resaffcmd;
        header('location:accueil.php?pag=clt');       
    }

    if(isset($_POST['btnaffallmat'])){
        $affcmd = "SELECT * FROM `materiel` ORDER BY `compt` DESC  ";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffallmat']=$resaffcmd;
        header('location:accueil.php?pag=mch');       
    }
        
  
    
    //_________________________________________________________________________Mise à jour________________________________________________________

    // ____________client_________
    $act = @$_GET['act'] ;

    if(isset($_POST['btnmodifitemcli']))
    {
        $num = $_SESSION['num'] ;

        $numcli=secu($_POST["numcli"]);
        $nomcli=secu($_POST["nomcli"]);
        $telcli=secu($_POST["telcli"]);

        $nbcli="SELECT `numcli` FROM `client` WHERE  `numcli`=? ";
        $rqtnbcli= $connection->prepare($nbcli);
        $rqtnbcli-> execute(array($numcli));
        $nbrecli=$rqtnbcli->fetchall();
        $cptcli=count($nbrecli);
        if($cptcli<1){
            if(($num=="") ){
                $moditems=("INSERT INTO `client`(`numcli`, `nomcli`, `telephone`) VALUES (?,?,?)");
                $chcli=array($numcli,$nomcli,$telcli);
                $rqtmodetems= $connection->prepare($moditems);
                $rqtmodetems->execute($chcli);
            }else{
                $moditems=("UPDATE `client` SET `numcli`=?,`nomcli`=?,`telephone`=?  WHERE `numcli`=? ");
                $chcli=array($numcli,$nomcli,$telcli,$num);
                $rqtmodetems= $connection->prepare($moditems);
                $rqtmodetems->execute($chcli);
                $resrqtmodetems= $rqtmodetems->fetchall();
                $_SESSION['num']="";
            } 
        }else{
            $nbcli="SELECT `numcli` FROM `client` WHERE  `numcli`=? ";
            $rqtnbcli= $connection->prepare($nbcli);
            $rqtnbcli-> execute(array($num));
            $nbrecli=$rqtnbcli->fetchall();
            if($cptcli>0){
                $cptcli=count($nbrecli);
                $moditems=("UPDATE `client` SET `numcli`=?,`nomcli`=?,`telephone`=?  WHERE `numcli`=? ");
                $chcli=array($numcli,$nomcli,$telcli,$num);
                $rqtmodetems= $connection->prepare($moditems);
                $rqtmodetems->execute($chcli);
                $resrqtmodetems= $rqtmodetems->fetchall();
                $_SESSION['num']="";
            }
           
        }

        $affcmd = "SELECT * FROM `client` ORDER BY `numcli` DESC  ";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffallcli']=$resaffcmd;
        header('location:accueil.php?pag=clt');
        
    }

    // __________commande______________
    if(isset($_POST['btnmodifcmd']))
    {
        $num = $_SESSION['num'] ;

        //$numjob=$num = $_SESSION['num'];
        $datjob=secu($_POST["datjob"]);
        $numcli=secu($_POST["infcli"]);
        $srlnum=secu($_POST["infmat"]);
        $numdev=secu($_POST["numdev"]);
        $numbc=secu($_POST["numbc"]);
        $numbl=secu($_POST["numbl"]);
        
        
        $moditems=("UPDATE `commande` SET `numjob`=?,`date`=?,`numbl`=?,`numcli`=?,`nums`=?,`numdev`=?,`numbc`=?  WHERE `numjob`=? ");
        $chbc=array($num,$datjob,$numbl,$numcli,$srlnum,$numdev,$numbc,$num);
        $rqtmodetems= $connection->prepare($moditems);
        $rqtmodetems->execute($chbc);
        $_SESSION['num']="";

        /* $affcmd = "SELECT * FROM `commande` ORDER BY `numjob` DESC";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffallcmd']=$resaffcmd; */

        $critdev = array($num);
        $affcmd = "SELECT * FROM `commande` where `numjob`=? ORDER BY `numjob` DESC";
        $resaffcmd =filtre($critdev,$affcmd);
        $_SESSION['resaffallcmd']=$resaffcmd;
        
        header('location:accueil.php?pag=bdc');

        


    }

    //_______________materiel__________
    if(isset($_POST['btnmodifitemat'])){
        $num = $_SESSION['num'] ;

        $srlnum=secu($_POST["srlnum"]);
        $catmat=secu($_POST["catmat"]) ;
        $tpmat=secu($_POST["tpmat"]);
        $mrqmat=secu($_POST["mrqmat"]);
        $puismat=secu($_POST["puismat"]);
        $vtsmat=secu($_POST["vtsmat"]);

        if ($srlnum==""){
            $comptmat="SELECT `compt` FROM `materiel` ORDER BY  `compt` DESC LIMIT 0, 1";
            $reqcomptmat=$connection->prepare($comptmat);
            $reqcomptmat->execute();
            $rescomptmat=$reqcomptmat->fetchALL();
            $srlnum="SPS".$rescomptmat[0][0]+1;
        }elseif($srlnum=="NL"){
            $comptmat="SELECT `compt` FROM `materiel` ORDER BY  `compt` DESC LIMIT 0, 1";
            $reqcomptmat=$connection->prepare($comptmat);
            $reqcomptmat->execute();
            $rescomptmat=$reqcomptmat->fetchAll();
            $srlnum="NL".$rescomptmat[0][0]+1;
        }

        $nbmat="SELECT `nums` FROM `materiel` WHERE  `nums`=? ";
        $rqtnbmat= $connection->prepare($nbmat);
        $rqtnbmat-> execute(array($srlnum));
        $nbremat=$rqtnbmat->fetchall();
        $cptmat=count($nbremat);
        if($cptmat<1){
            if(($num=="") ){
                $rqtmat="INSERT INTO `materiel`(`nums`, `marque`, `type`, `puissance`, `vitesse`, `numcat`)  VALUES (?,?,?,?,?,?)";
                $chmat=array($srlnum,$mrqmat,$tpmat,$puismat,$vtsmat,$catmat);
                $rqtadmat= $connection->prepare($rqtmat);
                $rqtadmat->execute($chmat);
            }else{
                $moditems=("UPDATE `materiel` SET `nums`=?,`marque`=?,`type`=?,`puissance`=?,`vitesse`=?,`numcat`=?  WHERE `nums`=? ");
                $chmat=array($srlnum,$mrqmat,$tpmat,$puismat,$vtsmat,$catmat,$num);
                $rqtmodetems= $connection->prepare($moditems);
                $rqtmodetems->execute($chmat);
                $_SESSION['num']="";
            }
            
        }else{
            $nbcli="SELECT `nums` FROM `materiel` WHERE  `nums`=? ";
            $rqtnbcli= $connection->prepare($nbcli);
            $rqtnbcli-> execute(array($num));
            $nbrecli=$rqtnbcli->fetchall();
            $cptcli=count($nbrecli);
            if($cptcli>0){
                $moditems=("UPDATE `materiel` SET `nums`=?,`marque`=?,`type`=?,`puissance`=?,`vitesse`=?,`numcat`=?  WHERE `nums`=? ");
                $chmat=array($srlnum,$mrqmat,$tpmat,$puismat,$vtsmat,$catmat,$num);
                $rqtmodetems= $connection->prepare($moditems);
                $rqtmodetems->execute($chmat);
                $_SESSION['num']="";
            }elseif(($num=="") ){
                $rqtmat="INSERT INTO `materiel`(`nums`, `marque`, `type`, `puissance`, `vitesse`, `numcat`)  VALUES (?,?,?,?,?,?)";
                $chmat=array($srlnum,$mrqmat,$tpmat,$puismat,$vtsmat,$catmat);
                $rqtadmat= $connection->prepare($rqtmat);
                $rqtadmat->execute($chmat);
            }
            
        
        }

        $affcmd = "SELECT * FROM `materiel` ORDER BY `compt` DESC  ";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffallmat']=$resaffcmd;
        header('location:accueil.php?pag=mch');
    }

    //update users
    if(isset($_POST['btnmodifuser'])){
        $id=secu($_SESSION['id']);
        $mat=secu($_POST['mat']);
        $nom=secu($_POST['nom']);
        $prenom=secu($_POST['prenom']);
        $email=secu($_POST['email']);
        $psword=secu($_POST['psword']);
        $ad=secu($_POST['ad']);
    
        if(($mat=="")or($nom=="")or($prenom=="")or($email=="")or($psword=="")){
            $err=" remplissez correctement les champs";
        }else{
            $adduser="UPDATE `utilisateur` SET `mat`=?,`non`=?,`prenom`=?,`email`=?,`psword`=?,`admin`=? WHERE `mat`=? ";
            $newuser=array($mat,$nom,$prenom,$email,$psword,$ad,$id);
            $rqpadduser= $connection->prepare($adduser);
            $rqpadduser->execute($newuser);
            @$_SESSION['mat']=$mat;
            @$_SESSION['nom']=$nom;
            @$_SESSION['prenom']=$prenom;
            @$_SESSION['email']=$email;
            @$_SESSION['psword']=$psword;
            @$_SESSION['admin']=$ad;
            header('location:accueil.php?pag=prof');
        }
            
       
    }

    if(isset($_POST['btnmodifuserbyad'])){
        $num=$_SESSION['num'];
        $mat=secu($_POST['mat']);
        $nom=secu($_POST['nom']);
        $prenom=secu($_POST['prenom']);
        $email=secu($_POST['email']);
        $psword=secu($_POST['psword']);
        $ad=secu($_POST['ad']);
    
        if(($mat=="")or($nom=="")or($prenom=="")or($email=="")or($psword=="")){
            $err=" remplissez correctement les champs";
        }else{
            $adduser="UPDATE `utilisateur` SET `mat`=?,`non`=?,`prenom`=?,`email`=?,`psword`=?,`admin`=? WHERE `mat`=? ";
            $newuser=array($mat,$nom,$prenom,$email,$psword,$ad,$num);
            $rqpadduser= $connection->prepare($adduser);
            $rqpadduser->execute($newuser);
            header('location:accueil.php?pag=nuser');
        }
            
       
    }

    //_______________________________________________________________suppression_______________________________________________________
     // commande
    if(isset($_POST['btnsupcmd'])){
        $num = $_SESSION['num'] ;
        $sup=("DELETE FROM `commande` WHERE `numjob`=? ");
        $rqtsup= $connection->prepare($sup);
        $rqtsup->execute(array($num));
        $_SESSION['num']="";

        $affcmd = "SELECT * FROM `commande` ORDER BY `numjob` DESC";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffcmd']=$resaffcmd;
        header('location:accueil.php?pag=bdc');
    } 

    // dev
    if(isset($_POST['btnsupdev'])){
        $num=$_SESSION['num'];
        $prenumdev="SELECT * FROM `commande` WHERE `numdev`=?  ";
            $rqtprenumdev= $connection->prepare($prenumdev);
            $rqtprenumdev-> execute(array($num));
            $resrqtprenumdev=$rqtprenumdev->fetchAll();
            $cptprenumdev= count($resrqtprenumdev);

                if ($cptprenumdev < 1 ){
                    $engdev="DELETE FROM `devis`  WHERE `numdev`=? ";
                    $rqtengdev= $connection->prepare($engdev);
                    $rqtengdev->execute(array($num));
                    $_SESSION['num']="";

                }elseif($cptprenumdev >= 1){

                    $sup="";
                    $engdev="UPDATE `commande`SET `numdev`=? WHERE `numdev`=? ";
                    $rqtengdev= $connection->prepare($engdev);
                    $rqtengdev->execute(array($sup,$num));
                        
                    $engdev="DELETE FROM `devis`  WHERE `numdev`=? ";
                    $rqtengdev= $connection->prepare($engdev);
                    $rqtengdev->execute(array($num));
                    $_SESSION['num']="";


                    
                   
                }

                $affcmd = "SELECT * FROM `devis` ORDER BY `compt` DESC ";
                $resaffcmd =affichall($affcmd);
                $_SESSION['resaffalldev']=$resaffcmd;
        header('location:accueil.php?pag=affdev');
    } 

    // bc
    if(isset($_POST['btnsupbc'])){
        $num=$_SESSION['num'];
        $prenumbc="SELECT * FROM `commande` WHERE `numbc`=?  ";
        $rqtprenumbc= $connection->prepare($prenumbc);
        $rqtprenumbc-> execute(array($num));
        $resrqtprenumbc=$rqtprenumbc->fetchAll();
        $cptprenumbc= count($resrqtprenumbc);
        if ($cptprenumbc < 1 ){
            $engbc="DELETE FROM `bcommande`  WHERE `numbc`=? ";
            $rqtengbc= $connection->prepare($engbc);
            $rqtengbc->execute(array($num));
            $_SESSION['num']="";

        }else{
            $sup="";
            $engbc="UPDATE `commande`SET `numbc`=?  WHERE `numbc`=? ";
            $rqtengbc= $connection->prepare($engbc);
            $rqtengbc->execute(array($sup,$num));
            $err="";

            $engbc="DELETE FROM `bcommande`  WHERE `numbc`=? ";
            $rqtengbc= $connection->prepare($engbc);
            $rqtengbc->execute(array($num));
            $_SESSION['num']="";


                
            
        }

        $affcmd = "SELECT * FROM `bcommande` ORDER BY `compt` DESC ";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffallbc']=$resaffcmd;
        header('location:accueil.php?pag=affbcmd');
    } 

    //Bliv
    if(isset($_POST['btnsupbl'])){
        $num=$_SESSION['num'];
        $prenumbc="SELECT * FROM `commande` WHERE `numbl`=?  ";
        $rqtprenumbc= $connection->prepare($prenumbc);
        $rqtprenumbc-> execute(array($num));
        $resrqtprenumbc=$rqtprenumbc->fetchAll();
        $cptprenumbc= count($resrqtprenumbc);
        if ($cptprenumbc < 1 ){
            $engbc="DELETE FROM `blivraison`  WHERE `numbl`=? ";
            $rqtengbc= $connection->prepare($engbc);
            $rqtengbc->execute(array($num));
            $_SESSION['num']="";

        }else{
            $sup="";
            $engbc="UPDATE `commande`SET `numbl`=?  WHERE `numbl`=? ";
            $rqtengbc= $connection->prepare($engbc);
            $rqtengbc->execute(array($sup,$num));
            $err="";

            $engbc="DELETE FROM `blivraison`  WHERE `numbl`=? ";
            $rqtengbc= $connection->prepare($engbc);
            $rqtengbc->execute(array($num));
            $_SESSION['num']="";


                
            
        }

        $affcmd = "SELECT * FROM `blivraison` ORDER BY `compt` DESC ";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffallbl']=$resaffcmd;
        header('location:accueil.php?pag=affbl');
    } 


    // client
    if(isset($_POST['btnsupcli'])){
        $num=$_SESSION['num'];
        $sup="SELECT * FROM `commande` WHERE `numcli`=?  ";
        $rqtsup= $connection->prepare($sup);
        $rqtsup-> execute(array($num));
        $resrqtsup=$rqtsup->fetchAll();
        $cptsup= count($resrqtsup);

        if ($cptsup < 1 ){
            $supcli="DELETE FROM `client`  WHERE `numcli`=? ";
            $rqtsupcli= $connection->prepare($supcli);
            $rqtsupcli->execute(array($num));
            $_SESSION['num']="";

        }elseif($cptsup >= 1){

            $sup1="";
            $engcli="UPDATE `commande`SET `numcli`=? WHERE `numcli`=? ";
            $rqtengcli= $connection->prepare($engcli);
            $rqtengcli->execute(array($sup1,$num));
                
            $supcli="DELETE FROM `client`  WHERE `numcli`=? ";
            $rqtsupcli= $connection->prepare($supcli);
            $rqtsupcli->execute(array($num));
            $_SESSION['num']="";


            $affcmd = "SELECT * FROM `client` ";
            $resaffcmd =affichall($affcmd);
            $_SESSION['resaffallcli']=$resaffcmd;
            
        }
        $affcmd = "SELECT * FROM `client` ORDER BY `numcli` DESC  ";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffallcli']=$resaffcmd;
        header('location:accueil.php?pag=clt');
    } 

    // materiel
    if(isset($_POST['btnsupmat'])){
        $num=$_SESSION['num'];
        $sup="SELECT * FROM `commande` WHERE `nums`=?  ";
        $rqtsup= $connection->prepare($sup);
        $rqtsup-> execute(array($num));
        $resrqtsup=$rqtsup->fetchAll();
        $cptsup= count($resrqtsup);

        if ($cptsup < 1 ){
            $supmat="DELETE FROM `materiel`  WHERE `nums`=? ";
            $rqtsupmat= $connection->prepare($supmat);
            $rqtsupmat->execute(array($num));
            $_SESSION['num']="";

        }elseif($cptsup >= 1){

            $sup1="";
            $engnmmat="UPDATE `commande`SET `nums`=? WHERE `nums`=? ";
            $rqtengnmmat= $connection->prepare($engnmmat);
            $rqtengnmmat->execute(array($sup1,$num));
                
            $supmat="DELETE FROM `materiel`  WHERE `nums`=? ";
            $rqtsupmat= $connection->prepare($supmat);
            $rqtsupmat->execute(array($num));
            $_SESSION['num']="";


            $affcmd = "SELECT * FROM `materiel` ORDER BY `compt` DESC  ";
            $resaffcmd =affichall($affcmd);
            $_SESSION['resaffallmat']=$resaffcmd;
            
        }
        $affcmd = "SELECT * FROM `materiel` ORDER BY `compt` DESC  ";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffallmat']=$resaffcmd;
        header('location:accueil.php?pag=mch');
    } 

    // users
    if(isset($_POST['btnsupuser'])){
        $num=$_SESSION['num'];
        $supmat="DELETE FROM `utilisateur`  WHERE `mat`=? ";
        $rqtsupmat= $connection->prepare($supmat);
         $rqtsupmat->execute(array($num));
         $_SESSION['num']="";
        header('location:accueil.php?pag=nuser');
    } 
    

    //_______________________________________________________AJOUT________________________________________________________________
    // add numero BC
    if (isset($_POST['btnaddbcmd'])) {
        if (isset($_POST['chkaddbc'])) {
            $selectedItems = $_POST['chkaddbc'];
           
            print_r($selectedItems);

            $numbc=secu($_POST['numbc']);
            $cptnumjob= count($selectedItems);
           for($i=0;$i<$cptnumjob;$i++){
            $addnumbc="UPDATE `commande` SET `numbc`=? WHERE `numjob`=? ";
            $reqaddnumbc= $connection->prepare($addnumbc);
            $reqaddnumbc->execute(array($numbc,$selectedItems[$i]));


            
           }
            
           
        }
        $affcmd = "SELECT * FROM `commande` ORDER BY `numjob` DESC";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffcmd']=$resaffcmd;
            
        header('location:accueil.php?pag=bcmd');


    }
    // add numero Bliv
    if (isset($_POST['btnaddbl'])) {
        if (isset($_POST['chkaddbl'])) {
            $selectedItems = $_POST['chkaddbl'];
           
            print_r($selectedItems);

            $numbl=secu($_POST['numbl']);
            $cptnumjob= count($selectedItems);
           for($i=0;$i<$cptnumjob;$i++){
            $addnumbc="UPDATE `commande` SET `numbl`=? WHERE `numjob`=? ";
            $reqaddnumbc= $connection->prepare($addnumbc);
            $reqaddnumbc->execute(array($numbl,$selectedItems[$i]));


            
           }
            
            
           
        }
        $affcmd = "SELECT * FROM `commande` ORDER BY `numjob` DESC";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffcmd']=$resaffcmd;
        header('location:accueil.php?pag=bl');


    }


    

    // add numero devis
    if (isset($_POST['btnaddev'])) {
        if (isset($_POST['chkaddbc'])) {
            $selectedItems = $_POST['chkaddbc'];
            print_r($selectedItems);
            $numdev=$_POST['numdev'];

            $cptnumjob= count($selectedItems);
           for($i=0;$i<$cptnumjob;$i++){
            $addnumdev="UPDATE `commande` SET `numdev`=? WHERE `numjob`=? ";
            $reqaddnumdev= $connection->prepare($addnumdev);
            $reqaddnumdev->execute(array($numdev,$selectedItems[$i]));


            
           }
            
        }
        $affcmd = "SELECT * FROM `commande` ORDER BY `numjob` DESC";
            $resaffcmd =affichall($affcmd);
            $_SESSION['resaffcmd']=$resaffcmd;
            header('location:accueil.php?pag=dev');
            $cheminfichier=$_FILES["cheminfic"]["tmp_name"];
            $newchemin=$repectoire . $nomfichier;
            move_uploaded_file($cheminfichier, $newchemin);
            $fic = "UPDATE  `devis` set`objet`=?,`physique`=? WHERE `numdev`=?  ";
            $rqtfic=$connection->prepare($fic);
            $rqtfic->execute(array( $nomfichier,$newchemin,$numdev)); 
           

    }

    // add user
    if(isset($_POST['btnuser'])){

        $mat=secu($_POST['matricule']);
        $nom=secu($_POST['nom']);
        $prenom=secu($_POST['prenom']);
        $email=secu($_POST['email']);
        $psword=secu($_POST['psword']);

        echo'erty';
    
        if(($mat=="")or($nom=="")or($prenom=="")or($email=="")or($psword=="")){
            $err=" remplissez correctement les champs";
            echo $err;
        }else{ 
            $adduser="INSERT INTO `utilisateur`(`mat`, `non`, `prenom`, `email`, `psword`) VALUES (?,?,?,?,?)";
            $newuser=array($mat,$nom,$prenom,$email,$psword);
            $rqpadduser= $connection->prepare($adduser);
            $rqpadduser->execute($newuser);
            header('location:accueil.php?pag=nuser');

        }
            
       
    }

    // add categorie materiel
    if(isset($_POST['btnaddcat'])){
        $nom=secu($_POST['nomcat']);

        $addcat="INSERT INTO `categorie`(`nom`) VALUES (?)";
            $newcat=array($nom);
            $rqpaddcat= $connection->prepare($addcat);
            $rqpaddcat->execute($newcat);
            header('location:accueil.php?pag=cat');
    }
    //__________________________________________________________SAISIE_____________________________________________________________________
    // champs de saisie

    
    if(isset($_POST['btnvalsaisi'])){
        $_SESSION['ctrl']=1;
        
       
        // valeurs champs client
        $numcli=secu($_POST["numcli"]);
        $nomcli=secu($_POST["nomcli"]);
        $telcli=secu($_POST["telcli"]);

        //valeurs champs matereiel
        $srlnum=secu($_POST["srlnum"]);
        $catmat=secu($_POST["catmat"]) ;
        $tpmat=secu($_POST["tpmat"]);
        $mrqmat=secu($_POST["mrqmat"]);
        $puismat=secu($_POST["puismat"]);
        $vtsmat=secu($_POST["vtsmat"]);

       
        //valeurs champs BC
    
        //$numjob=secu($_POST["numjob"]);
        $datjob=secu($_POST["datjob"]);
        $numdev="";
        $numbc="";

       

        // controle champ vide
       

        if(($numcli=="" ) )
        {
            $_SESSION['ctrl']=0;
            $err ="info client incomplet";
        }
        
       if($datjob=="" )
        {
            $_SESSION['ctrl']=0;
            $err ="entrez la date de la commande";
        }
       
       
       
        if( $_SESSION['ctrl']==1) 
        {
            $_SESSION['ctrl1']=0;

            // add client in BD
            $nbcli="SELECT `numcli` FROM `client` WHERE  `numcli`=? ";
            $rqtnbcli= $connection->prepare($nbcli);
            $rqtnbcli-> execute(array($numcli));
            $nbrecli=$rqtnbcli->fetchall();
            $cptcli=count($nbrecli);
            if($cptcli<1){

                $rqtcli="INSERT INTO `client`(`numcli`, `nomcli`, `telephone`) VALUES (?,?,?)";
                $chcli=array($numcli,$nomcli,$telcli);
                $rqtadcli= $connection->prepare($rqtcli);
                $rqtadcli->execute($chcli);
            }

            // add materiel in BD

            
            if ($srlnum==""){
                $comptmat="SELECT `compt` FROM `materiel` ORDER BY  `compt` DESC LIMIT 0, 1";
                $reqcomptmat=$connection->prepare($comptmat);
                $reqcomptmat->execute();
                $rescomptmat=$reqcomptmat->fetchAll();
                $srlnum="SPS".$rescomptmat[0][0]+1;
            }elseif($srlnum=="NL"){
                $comptmat="SELECT `compt` FROM `materiel` ORDER BY  `compt` DESC LIMIT 0, 1";
                $reqcomptmat=$connection->prepare($comptmat);
                $reqcomptmat->execute();
                $rescomptmat=$reqcomptmat->fetchAll();
                $srlnum="NL".$rescomptmat[0][0]+1;
            }
            $nbmat="SELECT `nums` FROM `materiel` WHERE  `nums`=? ";
            $rqtnbmat= $connection->prepare($nbmat);
            $rqtnbmat-> execute(array($srlnum));
            $nbremat=$rqtnbmat->fetchall();
            $cptmat=count($nbremat);
            if($cptmat<1){
                $rqtmat="INSERT INTO `materiel`(`nums`, `marque`, `type`, `puissance`, `vitesse`, `numcat`)  VALUES (?,?,?,?,?,?)";
                $chmat=array($srlnum,$mrqmat,$tpmat,$puismat,$vtsmat,$catmat);
                $rqtadmat= $connection->prepare($rqtmat);
                $rqtadmat->execute($chmat);
            }
            

            // add commande in BD
            $nbcmd = "SELECT `numjob`,`date`  FROM `commande` ORDER BY  `numjob` DESC LIMIT 0, 1";
            $rqtnbcmd = $connection->prepare($nbcmd);
            $rqtnbcmd->execute();
            $nbrecmd = $rqtnbcmd->fetchAll();

            print_r($nbrecmd);

            $cptcmd = count($nbrecmd);
            $lastdate=$nbrecmd[0][1];

            // les format datjob
            $formatym = formatdatjob($datjob, 'ym');
            $formatymd=formatdatjob($datjob, 'ymd');
            $formaty=formatdatjob($datjob, 'y');
            $formatylastdate= formatdatjob($lastdate, 'y');
            $formatymlastdate= formatdatjob($lastdate, 'ym');
            $formatymdlastdate= formatdatjob($lastdate, 'ymd');
            $_SESSION['datjob'] = $result;

            if ($formatymd>date('ymd') or ($formatymlastdate>$formatym) ){
                $err="verifier la date de la commande";
            } else{
                if ($cptcmd < 1 or ($formatylastdate<$formaty) ) {
                    $numjob = $formatym . "0001";
                } else {
    
                    $nbrecmd[0][0]++;
                    $numjob = $formatym.substr($nbrecmd[0][0], -4);
                   
                }
    
                //$_SESSION['numjob']=$numjob;
    
                $rqtbc="INSERT INTO `commande`(`numjob`, `date`, `numcli`, `nums`)   VALUES (?,?,?,?)";
                $chbc=array($numjob,$datjob,$numcli,$srlnum);
                $rqtadbc= $connection->prepare($rqtbc);
                $rqtadbc->execute($chbc);
                $err ="Enregistrement effectuer";
                   

            }
        }else{
            $_SESSION['ctrl1']=0;
            $_SESSION['datjob']="";
            
        }
        $_SESSION['err']=$err;

        
        
        //retour a la page
        header('location:accueil.php?pag=saisi');

     
    }
    /* if(isset($_POST['btnvaldev'])){
        $devis= fopen("logo.jpg","r+");
        $affdev= fread($devis,1000);
        echo $affdev;
        //fclose($devis);
    } */

    
    



    //_____________________________________________________fichier________________________________________
    //photo de profil
    if(isset($_POST['btnfic'])){
        $mat=$_SESSION['mat'];
        $repectoire='file/profil/';

        $nomfichier=$_FILES["cheminfic"]["name"];
        $cheminfichier=$_FILES["cheminfic"]["tmp_name"];
        $newchemin=$repectoire . $nomfichier;
        move_uploaded_file($cheminfichier, $newchemin);
        $fic = "UPDATE  `utilisateur` set `nonfic`=?,`cheminfic`=? WHERE `mat`=?  ";
        $rqtfic=$connection->prepare($fic);
        $rqtfic->execute(array($nomfichier,$newchemin,$mat));

       


        echo"$cheminfichier";
        $_SESSION['cheminfichier']=$cheminfichier;
        header('location:accueil.php?pag=prof');
        
    }

    // devis physique
    if(isset($_POST['btndevfic'])){
        $num=$_SESSION['num'];
       $numdev=$_POST['numdev'];

        $prenumdev="SELECT `numdev` FROM `devis` WHERE `numdev`=?  ";
        $rqtprenumdev= $connection->prepare($prenumdev);
        $rqtprenumdev-> execute(array($numdev));
        $resrqtprenumdev=$rqtprenumdev->fetchAll();
        $cptprenumdev= count($resrqtprenumdev);

        if (($cptprenumdev < 1) and ($numdev!="")){
            $engdev="INSERT INTO `devis`(`numdev`) VALUES (?)";
            $rqtengdev= $connection->prepare($engdev);
            $rqtengdev->execute(array($numdev));
       }else{
            $prenumdev="SELECT `numdev` FROM `commande` WHERE `numdev`=?  ";
            $rqtprenumdev= $connection->prepare($prenumdev);
            $rqtprenumdev-> execute(array($num));
            $resrqtprenumdev=$rqtprenumdev->fetchAll();
            $cptprenumdev= count($resrqtprenumdev);

                if ($cptprenumdev < 1 ){
                    $engdev="UPDATE `devis`SET `numdev`=? WHERE `numdev`=? ";
                    $rqtengdev= $connection->prepare($engdev);
                    $rqtengdev->execute(array($numdev,$num));
                    $_SESSION['num']="";

                }elseif($cptprenumdev >= 1){
                    $engdev="UPDATE `devis`SET `numdev`=? WHERE `numdev`=? ";
                    $rqtengdev= $connection->prepare($engdev);
                    $rqtengdev->execute(array($numdev,$num));

                    $engdev="UPDATE `commande`SET `numdev`=? WHERE `numdev`=? ";
                    $rqtengdev= $connection->prepare($engdev);
                    $rqtengdev->execute(array($numdev,$num));
                        $err="";
                        $_SESSION['num']="";

                   
                }
            
                
            
           
       }

        $repectoire='file/devis/';

        $nomfichier=$_FILES["cheminfic"]["name"];
        $cheminfichier=$_FILES["cheminfic"]["tmp_name"];
        $newchemin=$repectoire . $nomfichier;
        move_uploaded_file($cheminfichier, $newchemin);
        $fic = "UPDATE  `devis` set`objet`=?,`physique`=? WHERE `numdev`=?  ";
        $rqtfic=$connection->prepare($fic);
        $rqtfic->execute(array( $nomfichier,$newchemin,$numdev)); 

        
       

        echo"$cheminfichier";
        $_SESSION['cheminfichier']=$cheminfichier;

        $affcmd = "SELECT * FROM `devis` ORDER BY `compt` DESC ";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffalldev']=$resaffcmd;
        header('location:accueil.php?pag=affdev');
        
    }
    
    //bc physique
    if(isset($_POST['btnbcfic'])){
        $num=$_SESSION['num'];
        $numbc=$_POST['numbc'];
        

        $prenumbc="SELECT `numbc` FROM `bcommande` WHERE `numbc`=?  ";
        $rqtprenumbc= $connection->prepare($prenumbc);
        $rqtprenumbc-> execute(array($numbc));
        $resrqtprenumbc=$rqtprenumbc->fetchAll();
        $cptprenumbc= count($resrqtprenumbc);

        if (($cptprenumbc < 1 ) and $numbc!==""){
            $engbc="INSERT INTO `bcommande`(`numbc`) VALUES (?)";
            $rqtengbc= $connection->prepare($engbc);
            $rqtengbc->execute(array($numbc));
        }else{
           
                
            $prenumbc="SELECT `numbc` FROM `commande` WHERE `numbc`=?  ";
            $rqtprenumbc= $connection->prepare($prenumbc);
            $rqtprenumbc-> execute(array($num));
            $resrqtprenumbc=$rqtprenumbc->fetchAll();
            $cptprenumbc= count($resrqtprenumbc);

            if ($cptprenumbc < 1 ){
                $engbc="UPDATE `bcommande`SET `numbc`=?  WHERE `numbc`=? ";
                $rqtengbc= $connection->prepare($engbc);
                $rqtengbc->execute(array($numbc,$num));
                $_SESSION['num']="";

            }else{
                
                $engbc="UPDATE `bcommande`SET `numbc`=? WHERE `numbc`=? ";
                $rqtengbc= $connection->prepare($engbc);
                $rqtengbc->execute(array($numbc,$num));

                $engbc="UPDATE `commande`SET `numbc`=?  WHERE `numbc`=? ";
                $rqtengbc= $connection->prepare($engbc);
                $rqtengbc->execute(array($numbc,$num));
                $err="";
                $_SESSION['num']="";

                
            }
            
            
            
        }
        echo"$numbc";
        $repectoire='file/bc/';

        $nomfichier=$_FILES["cheminfic"]["name"];
        $cheminfichier=$_FILES["cheminfic"]["tmp_name"];
        $newchemin=$repectoire . $nomfichier;
        move_uploaded_file($cheminfichier, $newchemin);
        $fic = "UPDATE `bcommande` SET `nomfic`=?,`cheminfic`=? WHERE `numbc`=?  ";
        $rqtfic=$connection->prepare($fic);
        $rqtfic->execute(array( $nomfichier,$newchemin,$numbc)); 

        echo"$cheminfichier";
        $_SESSION['cheminfichier']=$cheminfichier;
        
        //affichage
        $affcmd = "SELECT * FROM `bcommande` ORDER BY `compt` DESC ";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffallbc']=$resaffcmd;
        header('location:accueil.php?pag=affbcmd');
         
     }

    //BL physique
    if(isset($_POST['btnblfic'])){
        $num=$_SESSION['num'];
        $numbl=secu($_POST['numbl']);
        $dlv=secu($_POST['dlv']);

        $prenumbc="SELECT `numbl` FROM `blivraison` WHERE `numbl`=?  ";
        $rqtprenumbc= $connection->prepare($prenumbc);
        $rqtprenumbc-> execute(array($numbl));
        $resrqtprenumbc=$rqtprenumbc->fetchAll();
        $cptprenumbl= count($resrqtprenumbc);

        if (($cptprenumbl < 1 ) and $numbl!==""){
            $engbc="INSERT INTO `blivraison`(`numbl`, `dateliv`) VALUES (?,?)";
            $rqtengbc= $connection->prepare($engbc);
            $rqtengbc->execute(array($numbl,$dlv));
        }else{
            if ($dlv!==""){
                
                $prenumbc="SELECT `numbl` FROM `commande` WHERE `numbl`=?  ";
                $rqtprenumbc= $connection->prepare($prenumbc);
                $rqtprenumbc-> execute(array($num));
                $resrqtprenumbc=$rqtprenumbc->fetchAll();
                $cptprenumbc= count($resrqtprenumbc);

                if ($cptprenumbc < 1 ){
                    $engbc="UPDATE `blivraison`SET `numbl`=? , `dateliv`=? WHERE `numbl`=? ";
                    $rqtengbc= $connection->prepare($engbc);
                    $rqtengbc->execute(array($numbl,$dlv,$num));
                    $_SESSION['num']="";

                }else{
                  
                    $engbc="UPDATE `blivraison`SET `numbl`=? , `dateliv`=? WHERE `numbl`=? ";
                    $rqtengbc= $connection->prepare($engbc);
                    $rqtengbc->execute(array($numbl,$dlv,$num));

                    $engbc="UPDATE `commande`SET `numbl`=?  WHERE `numbl`=? ";
                    $rqtengbc= $connection->prepare($engbc);
                    $rqtengbc->execute(array($numbl,$num));
                    $err="";
                    $_SESSION['num']="";

                   
                }
               
            }else{
                $att='N°BL existant!!';
                echo $att;
            }
            
        }
        echo"$numbl";
        $repectoire='file/bl/';

        $nomfichier=$_FILES["cheminfic"]["name"];
        $cheminfichier=$_FILES["cheminfic"]["tmp_name"];
        $newchemin=$repectoire . $nomfichier;
        move_uploaded_file($cheminfichier, $newchemin);
        $fic = "UPDATE `blivraison` SET `nonfic`=?,`cheminfic`=? WHERE `numbl`=?  ";
        $rqtfic=$connection->prepare($fic);
        $rqtfic->execute(array( $nomfichier,$newchemin,$numbl)); 

        echo"$cheminfichier";
        $_SESSION['cheminfichier']=$cheminfichier;
        
        //affichage
        $affcmd = "SELECT * FROM `blivraison` ORDER BY `compt` DESC ";
        $resaffcmd =affichall($affcmd);
        $_SESSION['resaffallbl']=$resaffcmd;
        header('location:accueil.php?pag=affbl');
         
     }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>body</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    
</head>
<body>
<h1>body</h1>
<?php
   // echo @$err;
?>
</body>
<script src="js/bootstrap.bundle.min.js" ></script>
</html>