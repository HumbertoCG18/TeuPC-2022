<?php
include_once "includes/_db.php";
include_once "includes/head.php";
include_once "includes/header.php";
?>



<div class= "main"> 
<div class="row">  
<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>

  <!-- The slideshow/carousel -->
  <div class="carousel-inner" class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
    <div class="carousel-item active">
      <img src="imagens/coisalinda.jpg" alt="Los Angeles" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="imagens/coisalinda2.jpg" alt="Chicago" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="imagens/coisalinda3.jpg" alt="New York" class="d-block w-100">
    </div>
  </div>

  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
</div>

<br>
<br>

<div class="card" style="height: 500px;" class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
  <img class="card-img-top" src="imagens/gamer1.jpg" alt="Imagem de capa do card" style="height: 300px;">
  <div class="card-body">
    <h5 class="card-title" style="color: white;">TEU PC - A maneira mais fácil de montar um!</h5>
    <p class="card-text">Conte conosco para montar o teu melhor PC de forma fácil e rápida. Mais de 100 peças selecionadas a dedo visando qualidade e confiança.
    </p>
    <a href="assistente.php" class="btn btn-primary">Teu Assistente!</a>
  </div>
</div>


</div>


<div class="Texto1">

<h2>O melhor assistente para você montar teu PC</h2>
<p>É possível fazer qualquer combinação, nossa ferramenta mostrará quais são os erros de compatibilidade dentre o que foi selecionado. Montar PC nunca foi tão fácil!</p>
<p>Não somos exclusivos de nenhuma loja, nós agregamos os preços de várias lojas brasileiras e mostramos os melhores preços do mercado.</p>

</div>

<div class="button1">
<a href="lista.php?cat=1" class="btn btn-primary">Monte Teu Pc</a>
</div>

<br>

<div class="Texto1">
<br>
<h2>Ofertas!</h2>

</div>
<?php
$sql = "SELECT * FROM pecas WHERE CategoriaID=1";
$resultado = mysqli_query($conn, $sql);
?>        
  
<?php
         $pecas = 1;
         $fecha = 1;
         while($row = mysqli_fetch_array($resultado)){
       echo '<div class="card2" style="width: 17.5rem; margin-left: 25px;" class="col-sm-3 col-md-3 col-lg-3 col-xl-3">';   
       echo '<img class="card-img-top2"src="imagens/'.$row['Imagem'].'" alt="Imagem de capa do card">';
       echo '<div class="card-body2" style="height:265px; width:265px">';
       echo '<h5 class="card-title2">'.$row['Nome'].'</h5><p class="card-text2-preco">R$ '.$row['Preco'].'</p>';
       echo '<a href="'.$row['Link'].'" class="btn btn-primary2">Comprar</a>';
       echo '</div>';
       echo '<br>';
       echo '<br>';
       echo '</div>';
       $pecas++; 
       $fecha++;

         };
          ?>
          
      

<div class="footer">
<?php
include_once "includes/footer.php";
?>
</div>

