<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SuperHeroForm</title>
</head>
<body>

    <?php
        $nomErreur = "";
        $erreur = false;

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            //Si on rentre , on est dans l'envoie du formaulaire
            
            
            if(empty($_POST["name"]))
            {
                $nomErreur = "Le nom est requis";
                $erreur = true;
            }
            //Beaucoup de trucs à vérifier dans le futur
            else{
                $name = test_input($_POST["name"]);
            }
            $name = test_input($_POST["name"]);
            $url = test_input($_POST["url"]);
         
            //Insérer dans le bd !
            //SI erreurs, on réaffiche le formulaire avec les erreures 
        }
        elseif($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) 
        { 
    ?>

            <div class="col-3 py-3 px-5"> 
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    NomPOST : <input type="text" name="name" class="col-12 py-1">
                    URLPOST : <input type="text" name="url" class="col-12 py-1">

                    <input type="submit" class="btn btn-primary my-2 py-1">
                </form>
            </div>

    <?php 
        }
    
    function test_input($data){
        $data = trim($data);
        $data = addslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>   

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>