<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php

//FUNCTIONS
    function test_input($data){
        $data = trim($data);
        $data = addslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }   

    //On crée les variables du formulaire vide
    $nom = "";
    $url = "";
    $rating = "";
    $commentaire = "";    

    //On crée les variables d'erreurs vides
    $codeErreur = "";

    //La variable qui permet de savoir s'il y a au moins une erreur dans le formulaire
    $erreur = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {        
        //Si on entre, on est dans l'envoie du formulaire
        
        if(empty($_POST['nom']) || empty($_POST['url']) || empty($_POST['rating'])|| empty($_POST['commentaire'])){
            $codeErreur = "Aucune zone doit être laissé vide";
            $erreur = true;            
        } elseif((int)$_POST['rating'] < 0 || (int)$_POST['rating'] > 10 ) {
            $codeErreur = "The rating must be between 1 and 10";
            $erreur = true;
        }       

        if(!$erreur)
        {
            $nom = test_input($_POST["nom"]); 
            $url = test_input($_POST["url"]);
            $rating = test_input($_POST["rating"]);
            $commentaire = test_input($_POST["commentaire"]); 
        
            // Inserer dans la base de données
            //SI erreurs, on réaffiche le formulaire 

            //Section php 
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $db = "cats";
            //create connection
            $conn = new mysqli($servername, $username, $password, $db);
            //Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }        

            $sql = "INSERT INTO images (nom, url, rating, commentaire)
            VALUES ('" . $nom . "', '" . $url . "', '" . $rating ."', '" . $commentaire . "')";
            $conn->query('SET NAMES utf8');            

            if(!mysqli_query($conn, $sql)){
                $codeErreur = "Erreur: " . $sql . "<br>" . mysqli_error($conn) ;
                $erreur = true;
            }

            mysqli_close($conn);   
        }     
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && !$erreur)
    {
    ?>
    <div class="px-3 py-3">
       <h1 class="">Insert succesfull</h1>
       <a href="index.php" class="mx-3 my-2 py-3 px-3 btn btn-secondary">To table !</a>
       <a href="ajouter.php" class="mx-3 my-2 py-3 px-3 btn btn-secondary">Insert more !</a>
    </div>       
    <?php
    }
    if($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
        echo $codeErreur;
    ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="px-2 py-2">
                Name of the cat : <input type="text" name="nom" size="25" maxlength="100">           
            </div>

            <div class="px-2 py-2">
                URL of cat image : <input type="text" name="url" maxlength="1000">
            </div>

            <div class="px-2 py-2">
                Rating out of 10 : <input type="text" name="rating">
            </div>

            <div class="px-2 py-2">
                Comment on the cat : <input type="text" name="commentaire">
            </div>

            <input type="submit" class="py-1 px-2 mx-2 btn btn-primary">
        </form>

    <a href="index.php" class="mx-3 my-2 py-3 px-3 btn btn-secondary">To table !</a>

    <?php 
    }?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>