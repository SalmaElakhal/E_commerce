<?php

use LDAP\Result;

include 'config.php';

$nomclient = "";
$raisonsocial = "";
$adresseclient = "";
$villeclient = "";
$pays = "";
$telephone = "";

$errorMessage = "";
$successMessage = "";
      
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomclient = $_POST["nomclient"];
    $raisonsocial = $_POST["raisonsocial"];
    $adresseclient = $_POST["adresseclient"];
    $villeclient = $_POST["villeclient"];
    $pays = $_POST["pays"];
    $telephone = $_POST["telephone"];

    do {
        if(empty($nomclient) || empty($raisonsocial) || empty($adresseclient) || empty($villeclient ) || empty($pays ) || empty($telephone )) {
            $errorMessage = "All the fields are required";
            break;
        }

        // add new client to database
        $sql = "INSERT INTO clients (nomclient, raisonsocial, adresseclient, villeclient, pays, telephone)".
           "VALUES('$nomclient', '$raisonsocial', '$adresseclient', '$villeclient', '$pays', '$telephone')";
           $Result = mysqli_query($conn, $sql);

        // $Result = $conn->query($sql);

        if (!$Result ) {
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }

        $nomclient = "";
        $raisonsocial = "";
        $adresseclient = "";
        $villeclient = "";
        $pays = "";
        $telephone = "";

        $successMessage = "Client added correctly";

        header("Location: client.php");
        exit;
    } while (false);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> <!-- //to close errorMessage -->
    <title>ADD Client</title>
</head>

<body>
<div class="home-content">
      <nav class="navbar navbar-light justify-content-center fs-1 mb-5 text-white" style="background:linear-gradient(19deg, #21D4FD 0%, #B721FF 100%);" >Informations sur Produit</nav>
<div class="container">
  <div class="text-center mb-4">
   
    <h4>Add New Client</h4>
    <p class="text-muted">Complete the form below to add a new client</p>
  </div>
  <div class="container d-flex justify-content-center"><form action="code.php" method="post" style="width:50vw; min-width:300px;">



<!-- test it it's empty -->
        <?php
        if ( !empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <stong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">

            <div class="mb-3">
                <label class="form-label">Name</label>
                <div class="col--sm-6">
                    <input type="text" placeholder="Entrer le nom de produit" class="form-control" name="nomclient" value="<?php echo $nomclient; ?> ">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Raison Sociale</label>
                <div class="col--sm-6">
                    <input type="text" class="form-control" name="raisonsocial" value="<?php echo $raisonsocial; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Adresse Client</label>
                <div class="col--sm-6">
                    <input type="text" class="form-control" name="adresseclient" value="<?php echo $adresseclient; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Ville Client</label>
                <div class="col--sm-6">
                    <input type="text" class="form-control" name="villeclient" value="<?php echo $villeclient; ?>">
                </div>

                <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Pays</label>
                <div class="col--sm-6">
                    <input type="text" class="form-control" name="pays" value="<?php echo $pays; ?>">
                </div>

                <div class="row mb-3">
                <label class="col-sm-3 col-form-label">telephone</label>
                <div class="col--sm-6">
                    <input type="text" class="form-control" name="telephone" value="<?php echo $telephone; ?>">
                </div>

            </div>

<!-- test if it's empty -->
            <?php
        if ( !empty($successMessage)) {
            echo "
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-3'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <stong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>
             </div>

            ";
        }
        ?>
 
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-success btn-lg ">Submit</button>
                </div>

                <div class="col-sm-3 d-grid">
                    <a class="btn btn-danger btn-lg " href="index.php">Cancel</a>
                </div>
            </div>

            


        </form>


    </div>
</body>
</html>