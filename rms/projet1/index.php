<?php
    session_start();   
    include("connexion.php");  
  if(isset($_POST['btnval'])){
    // connexion a la base de donnee mysql  
    
    // nombre d'utilisateur
    $login=@$_POST['login'];
    $passwd = @$_POST['mps'];
    $req="SELECT * FROM `utilisateur` WHERE `email`=? and `psword`=?";
    $crt=array($login,$passwd);
    $rqtusernbre= $connection->prepare($req);
    $rqtusernbre-> execute($crt);
    $usernbre=$rqtusernbre->fetchall();
    $usercpt=count($usernbre);
    if($usercpt>0){
      header('location:accueil.php');
      $_SESSION['mat']=$usernbre[0][0];
      $_SESSION['nom']=$usernbre[0][1];
      $_SESSION['prenom']=$usernbre[0][2];
      $_SESSION['email']=$usernbre[0][3];
      $_SESSION['psword']=$usernbre[0][4];
      $_SESSION['admin']=$usernbre[0][5];
    }
    else{
      $err=" login ou mot de passe incorect";
    }
        
       
  }

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    
</head>
<body>
    <?php
        include("header.php");
    ?>
    <div class="container">
        <div class="row text_center bg-warning my-0 py-0 ">
            <div class="btn col-12"><b>RMS (R</b>EPARATION <b>M</b>AINTENANCE ET <b>S</b>ERVICES <b>)</b> </br> <p style="font-family:High Tower Text; ">Confiez nous le poids de votre maintenance electromécanique</p> </div>
        </div>
    </div>
    <div class="container text-center bg-dark ">
      <div class="figure rounded border-warning my-5 border ">
        <form class="row g-2 mx-auto" method="POST" action="">
          <div class="col-6 text-start mx-auto">
            <label for="login" class="col-sm-2 text-white  col-form-label">Login</label>
            <input type="Email" name="login"  class="form-control"  id="login"  placeholder="name@example.com">
          </div>
          <div class=" text-start col-6">
          <label for="Password" class="col-sm-2 text-white col-form-label">Password</label> 
          <input type="password" name="mps"  class="form-control"  id="lo"  placeholder="password">
       
          </div>
          <div class="row  col-6 mx-auto my-2 ">
            <button type="submit" name="btnval" class="btn btn-primary" value="envoyer">Connexion</button>
          </div>
    </div>
    
      <div class="container text-white"><?php echo @$err; ?></p> </div>
    </form>
    </div>
</body>
<script src="js/bootstrap.bundle.min.js" ></script>
</html>