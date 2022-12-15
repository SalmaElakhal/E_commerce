<?php
session_start();
require 'db_conn.php';
include 'entete.php';

?>

<div class="home-content">
    <div class="container">
      <?php include('massage.php') ?>
      <a href="ajoutp.php" class="btn btn-outline-info mb-3">Add New</a>

      <table class="table table-striped table-hover text-center">
  <thead class="table-dark ">
    <tr>
      <th >RefProduit</th>
      <th>NomProduit</th>
      <th>PrixUnitaire</th>
      <th>QTE</th>
      <th>Indisponible</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    //code searching
    
    ?>
    <?php
    $query="SELECT * FROM produit";
    $query_run=mysqli_query($conn, $query);
    if(mysqli_num_rows($query_run) > 0){
      foreach($query_run as $produit){
//echo product name
?>
<tr>
      <td ><?=$produit["refproduit"]; ?></td>
      <td ><?=$produit["nomproduit"]; ?></td>
      <td ><?=$produit["prixunitaire"]; ?></td>
      <td ><?=$produit["qtestock"]; ?></td>
      <td ><?=$produit["indisponible"]; ?></td>

      <td>
        <a href="modifyp.php?refproduit=<?= $produit["refproduit"]; ?>" class="link-info"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
        <form action="code.php" method="post" class="d-inline">
          <button class="fa-solid fa-trash fs-5 me-3" class="link-dark" style="border:0;" type="submit" name="delete" value="<?=$produit['refproduit'];?>">
          
        </button>
        </form>
        
        <!--
          1<a href="" class="link-dark"><i class="fa-solid fa-trash fs-5 me-3"></i></a>
          2<a href="delete.php?refproduit=< " class="link-dark"><i class="fa-solid fa-trash fs-5 me-3"></i></a>
        -->

      </td>
      </tr>
<?php
      }
    }
    else{
      echo "<h5>No Record Found</h5>";
    }
    ?>
    
    
    
  </tbody>
</table>

      
    </div>  



      </div>
    </section>
    <?php
include 'pied.php';
?>