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
    //On crée les variables du formulaire vide
    $nom = "";
    $pass = "";
    $passConfirm = "";
    $email = "";
    $image = "";
    $genre = "";
    $date = "";
    $vehicule = [""];

    //On crée les variables d'erreurs vides
    $codeErreur = "";

    //La variable qui permet de savoir s'il y a au moins une erreur dans le formulaire
    $erreur = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {        
        //Si on entre, on est dans l'envoie du formulaire
        
        if(empty($_POST['nom']) || empty($_POST['pass']) || empty($_POST['passConfirm'])|| empty($_POST['email']) || empty($_POST['image']) || empty($_POST['genre']) || empty($_POST['date']) || empty($_POST['vehicule'])){
            $codeErreur = "Aucune zone doit être laissé vide";
            $erreur = true;            
        }
        elseif($_POST["nom"] == "SLAY")
        {
            $codeErreur = "Nom d'usager déja pris";
            $erreur = true;
        }
        elseif($_POST["pass"] != $_POST["passConfirm"])
        {
            $codeErreur = "Les deux entrées de mot de passes doivent être identiques";
            $erreur = true;
        }
        elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
        {
            $codeErreur = "Veuillez entrer une adresse courielle valide";
            $erreur = true;
        }

        if(!$erreur)
        {
            $nom = test_input($_POST["nom"]); 
            $pass = test_input($_POST["pass"]);
            $passConfirm = test_input($_POST["passConfirm"]);
            $email = test_input($_POST["email"]);
            $image = test_input($_POST["image"]);
            $genre = test_input($_POST["genre"]);
            $date = test_input($_POST["date"]);        

            $index = 0;            
            foreach($_POST["vehicule"] as $vroom){$vehicule[$index] = test_input($vroom); $index++;}            
        }
        // Inserer dans la base de données
        //SI erreurs, on réaffiche le formulaire 
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && !$erreur)
    {
    ?>
        <div class="card mx-5 my-5" style="width: 18rem;">
        <img class="card-img-top" src=<?php echo $image ?> alt="Card image cap">
        <div class="card-body">
            <h2 class="card-title border-bottom border-dark"><?php echo $nom ?></h2>

            <h4>Courriel</h4>
            <div class="card-text"><?php echo $email ?></div>

            <h4>Genre</h4>
            <div class="card-text"><?php echo $genre ?></div>

            <h4>Date de naissance</h4>
            <div class="card-text"><?php echo $date ?></div>

            <h4>Moyens de transport</h4>
            <div class="card-text"><?php foreach($vehicule as $vroom){echo $vroom; echo "\n ";} ?></div>
            
            <a href="index.php" class="btn btn-primary">Faire une autre carte !</a>
        </div>
        </div>
    <?php
    }
    if($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
        echo $codeErreur;

    ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="px-2 py-2">
            Nom usager : <input type="text" name="nom" size="25" maxlength="15">           
        </div>
            
        <div class="px-2 py-2">
            Mot de passe : 
            <input type="password" name="pass">
        </div>
            
        <div class="px-2 py-2">
            Confirmation mot de passe : 
            <input type="password" name="passConfirm">
        </div>
           
        <div class="px-2 py-2">
            Adresse courriel : 
            <input type="email" name="email">
        </div>
           
        <div class="px-2 py-2">
            URL Image : 
            <input type="text" name="image" value="<?php echo $image; ?>"><br>
        </div>
         
        <div class="px-2 py-2">
            Genre :  
            <div>
                <label for="masculin">Masculin</label>
                <input type="radio" id="masculin" name="genre" value="Masculin">
            </div>
           
            <div>
                <label for="feminin">Feminin</label>
                <input type="radio" id="feminin" name="genre" value="feminin">
            </div>
            
            <div>
                <label for="nonGenre">Non genré</label>
                <input type="radio" id="nonGenre" name="genre" value="nonGenre">
            </div>
            
        </div>

        <div class="px-2 py-2">
            Date de naissance : 
            <input type="date" name="date">
        </div>
            
        <div class="px-2 py-2">
            Transport :
            <div>
                <label for="vehicule1">Auto</label>
                <input type="checkbox" id="vehicule1" name="vehicule[]" value="Auto">
            </div>

            <div>
                <label for="vehicule2">Autobus</label>
                <input type="checkbox" id="vehicule2" name="vehicule[]" value="Autobus">
            </div>

            <div>
                <label for="vehicule3">Marche</label>
                <input type="checkbox" id="vehicule3" name="vehicule[]" value="Marche">
            </div>

            <div>
                <label for="vehicule4">Vélo</label>
                <input type="checkbox" id="vehicule4" name="vehicule[]" value="Vélo">
            </div>
        </div>
            
            <input type="submit" class="py-1 px-2 mx-2 btn btn-primary">
        </form>

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