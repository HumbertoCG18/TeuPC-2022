<header>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="topnav" id="myTopnav">
  <a href="index.php">TEU PC</a>
  <a href="assistente.php">Assistente</a>
  <a href="produtos.php">PCs e Notebooks</a>
  <div class="dropdown">
    <button class="dropbtn">Peças
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="lista.php?cat=1&cate=6">Processadores</a>
      <a href="lista.php?cat=2&cate=5">Placa Mãe</a>
      <a href="lista.php?cat=3&cate=3">Memoria Ram</a>
      <a href="lista.php?cat=4&cate=4">SSD</a>
      <a href="lista.php?cat=5&cate=5">HD</a>
      <a href="lista.php?cat=6&cate=6">Cooler</a>
      <a href="lista.php?cat=7&cate=7">Placa De Video</a>
      <a href="lista.php?cat=8&cate=5">Fontes</a>
      <a href="lista.php?cat=9&cate=3">Gabinete</a>
      <a href="lista.php?cat=10&cate=10">Notebook</a>
      <a href="lista.php?cat=11&cate=12">PC Montados</a>
    </div>
  </div>
  </a>
</div>
</header>

<?php
include_once "includes/_db.php";
?>
