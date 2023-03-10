<?php
session_start();
include 'entete.php';

// if (isset($_SESSION["user_id"])) { 
//     header("Location: index.php");
//   }

//echo $_SESSION["user_id"];

?>
   
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="clientstyle.css" />
<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<title>Gestion Client</title>
</head>
<body>



  <a href="logout.php" class="logout" type="button">logout<i class="fa fa-sign-out"></i></a>


<div class="home-content">

  <div class="container" >
    <!-- <h2>List of Clients</h2> -->
    <a href="addclient.php" class="btn btn-outline-info mb-3" style=" border: 1px solid 	#00bfff  ;" >New Client</a>

  <div class="table-responsive container" >
    <table class="table table-striped table-hover text-center table-sm" >
      <thead class="table-dark ">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>RaisonSocial</th>
          <th>AddressClient</th>
          <th>Ville Client</th>
          <th>Pays</th>
          <th>Phone</th>
          <th>Action</th>
        </tr>
      </thead>


      <tbody>
        <?php
        include 'config.php';

        //read all row from database table
        $sql = "SELECT * FROM clients";
        $result = $conn->query($sql);

        if(!$result) {
          die("Invalid query: " . $conn->error);
        }

        //read data of each row
        while ($row = $result->fetch_assoc()) {
          echo "
          <tr>
          <td>$row[numclient]</td>
          <td>$row[nomclient]</td>
          <td>$row[raisonsocial]</td>
          <td>$row[adresseclient]</td>
          <td>$row[villeclient]</td>
          <td>$row[pays]</td>
          <td>$row[telephone]</td>
          <td>
            <a class='link-info' href='editclient.php?numclient=$row[numclient]'><i class='fa-solid fa-pen-to-square fs-5 me-3'></i></a>
            <a class='link-dark' style='border:0;' class='fa-solid fa-trash fs-5 me-3' href='deleteclient.php?numclient=$row[numclient]'><span class='glyphicon glyphicon-trash'></span></a>           

          </td>
        </tr>
          ";

        }
        ?>

       
      </tbody>
    </table>
  </div> 
  </div>

</div>



</body>
</html>

<?php
include 'pied.php';
?>