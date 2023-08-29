<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Creation Usager</title>
</head>

<body>

    <?php
    $codeErreur = "";
    $erreur = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Si on rentre , on est dans l'envoie du formulaire

        if (empty($_POST["nom"]) || empty($_POST["pass"]) || empty($_POST["passConfirm"]) || empty($_POST["email"]) || empty($_POST["url"]) || empty($_POST["genre"]) || empty($_POST["birthday"]) || empty($_POST["transport"])) {
            $codeErreur = "Toutes les sections doivent êtrent remplies";
            $erreur = true;
        } elseif ($_POST["nom"] == "SLAY") {
            $codeErreur = "Ce nom est déja pris, veuillez en choisir un autre";
            $erreur = true;
        } elseif ($_POST["pass"] != $_POST["passConfirm"]) {
            $codeErreur = "Le mot de passe doit être identique dans les deux boites !";
            $erreur = true;
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $codeErreur = "Email non valide";
        } else {

            $nom = test_input($_POST["nom"]);
            $pass = test_input($_POST["pass"]);
            $email = test_input($_POST["email"]);
            $url = test_input($_POST["url"]);
            $genre = test_input($_POST["genre"]);
            $birthday = test_input($_POST["birthday"]);
            $transport = test_input($_POST["transport"]);
        }
        //Insérer dans le bd !
        //SI erreurs, on réaffiche le formulaire avec les erreures         
    }
    if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
        echo "<h3>" . $codeErreur . "</h3>"
    ?>

        <div class="col-3 py-3 px-5">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                Nom : <input type="text" name="nom" class="col-12 py-1">
                Mot de passe : <input type="password" name="pass" class="col-12 py-1">
                Confirmation mot de passe : <input type="password" name="passConfirm" class="col-12 py-1">
                Adresse courriel : <input type="email" name="email" class="col-12 py-1">
                Url image : <input type="text" name="url" class="col-12 py-1">
                Genre :
                <div class="row">
                    <div class="col-4">
                        <label for="masculin">Masculin</label>
                        <input type="radio" id="masculin" name="genre" value="masculin">
                    </div>
                    <div class="col-4">
                        <label for="feminin">Feminin</label>
                        <input type="radio" id="feminin" name="genre" value="masculin">
                    </div>
                    <div class="col-4">
                        <label for="nonGenre">Non Genré</label>
                        <input type="radio" id="nonGenre" name="genre" value="masculin">
                    </div>
                </div>
                Date de naissance : <input type="date" name="birthday" class="col-12 py-1">
                Moyen de transport :
                <div class="row">
                    <div class="col-6">
                        <label for="auto">Auto</label>
                        <input type="checkbox" id="auto" name="transport" value="auto">
                    </div>

                    <div class="col-6">
                        <label for="autobus">Autobus</label>
                        <input type="checkbox" id="autobus" name="transport" value="autobus">
                    </div>

                    <div class="col-6">
                        <label for="marche">Marche</label>
                        <input type="checkbox" id="marche" name="transport" value="marche">
                    </div>

                    <div class="col-6">
                        <label for="velo">Vélo</label>
                        <input type="checkbox" id="velo" name="transport" value="velo">
                    </div>

                </div>

                <input type="submit" class="btn btn-primary my-2 py-1">
            </form>
        </div>

    <?php
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = addslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>