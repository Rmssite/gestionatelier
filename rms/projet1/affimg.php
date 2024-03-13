<?php
session_start();

$cheminfic=$_SESSION['cheminfic'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>image</title>
</head>
<body >
    <div class="container bg-dark text-center">
        <div class="figure w-75 mt-0 mb-3 px-2 border border-1 border-warning text-center ">
            <img src="<?php echo @$cheminfic; ?>"  class="img-thumbnail w-75 mt-0 mb-3 px-2 border border-1 border-warning text-center " alt="<?php echo @$nomFichier;?>"> 
        </div>

    </div>

</body>
</html>