<?php
include_once "includes/_db.php";
include_once "includes/head.php";
include_once "includes/header.php";
?>

  <!-- The slideshow/carousel -->

<?php
$sql = "SELECT * FROM pecas WHERE CategoriaID= 10";
$pcpronto = "SELECT * FROM pecas WHERE CategoriaID= 11";
$resultado = mysqli_query($conn, $sql);
$resultado2 = mysqli_query($conn, $pcpronto);
?>        

<?php 
    if($row = mysqli_fetch_array($resultado)){ 
      echo '<br>';
      echo '<br>';
      echo'<center>'.'<h1>'.'Notebooks e PCs Montados'.'</h1>'.'</center>';
      echo '<br>';
    }
?>
  
<?php
         $pcs = 1;
         $fecha = 1;
         while($row = mysqli_fetch_array($resultado)){
          echo '<div class="card card2" style="width: 19rem; margin-left: 90px; margin-top:10px" class="col-sm-3 col-md-3 col-lg-3 col-xl-3">';   
          echo '<img class="card-img-top2"src="imagens/'.$row['Imagem'].'" alt="Imagem de capa do card">';
          echo '<div class="card-body2" style="height:265px; width:265px;">';
          echo '<h5 class="card-title2">'.$row['Nome'].'</h5><p class="card-text2-preco">R$ '.$row['Preco'].'</p>';
          echo '<a href="'.$row['Link'].'" class="btn btn-primary2">Comprar</a>';
          echo '</div>';
          echo '<br>';
          echo '<br>';
          echo '</div>';
          $fecha++;
          $pcs++; 
         };
?>

<?php
         $pcs = 1;
         $fecha = 1;
         while($row = mysqli_fetch_array($resultado2)){
          echo '<div class="card card2" style="width: 19rem; margin-left: 90px; margin-top:10px" class="col-sm-3 col-md-3 col-lg-3 col-xl-3">';   
          echo '<img class="card-img-top2"src="imagens/'.$row['Imagem'].'" alt="Imagem de capa do card">';
          echo '<div class="card-body2" style="height:265px; width:265px;">';
          echo '<h5 class="card-title2">'.$row['Nome'].'</h5><p class="card-text2-preco">R$ '.$row['Preco'].'</p>';
          echo '<a href="'.$row['Link'].'" class="btn btn-primary2">Comprar</a>';
          echo '</div>';
          echo '<br>';
          echo '<br>';
          echo '</div>';
          $fecha++;
          $pcs++; 
         };
?>

<div class="footer">
<?php
include_once "includes/footer.php";
?>
</div>