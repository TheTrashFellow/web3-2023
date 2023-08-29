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

        $sql = "SELECT * FROM images";

        $conn->query('SET NAMES utf8');

        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            //output data of each row
            echo "<table class='table table-dark'>
                  <thead> 
                    <tr>
                        <th scope='col'>id</th>
                        <th scope='col'>Name</th>
                        <th scope='col'>Image</th>
                        <th scope='col'>Rating</th>
                        <th scope='col'>Comment</th>
                        <th scope='col'>Actions</th>
                    </tr>
                  </thead>
                  <tbody>";
            while($row = $result->fetch_assoc()) {
                echo "
                    <tr>
                        <th scope='row'>" . $row["id"] . "</th>
                        <td>" . $row["nom"] . "</td>
                        <td> <img class='img-fluid' width='200px' src='" . $row["url"] . "'> </td>
                        <td>" . $row["rating"] . "/10 </td>
                        <td class='col-2'>" . $row["commentaire"] . "</td>
                        <td> 
                        
                        <a href='modifier.php' onClick>Modify</a> 
                        
                        </td>
                    </tr>";
            }
            echo "
                </tbody>
                </table>";
        }
    ?>

    <a href="ajouter.php" class="mx-3 my-2 py-3 px-3 btn btn-secondary">Insert more !</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>