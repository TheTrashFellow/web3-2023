<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Résultats</title>
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
    ?>
    <div class="text-center py-3">
        <?php echo "<h1>" . $_POST['name'] . "</h1>"?>
    </div>
    <div>
        <?php echo "<img src='" . $_POST['url'] ."' alt='My super hero' class='mx-auto d-block img-fluid' width='800px'>"?>
    </div>

    <?php 
        }
        else {
            echo "Try completing the form <a href='http://localhost/Cours2ExerciseHero/'> here </a> first";
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>