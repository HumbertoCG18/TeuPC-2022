<?php
include_once "includes/_db.php";
include_once "includes/head.php";
include_once "includes/header.php";

$codigo = $_GET["cat"];
$codigo2 = $_GET["cate"];
$fr = $codigo2 +1;
$i=1;
$a=0;
$r=5;

$resultado = mysqli_query( $conn , "SELECT * FROM categorias WHERE CategoriaID = $codigo");
$resultado2 = mysqli_query( $conn , "SELECT
p.Imagem AS ImagemPeca,
p.Preco AS PrecoPeca,
p.Nome AS NomePeca,
c.Nome AS NomeCategoria,
c.CategoriaID AS CategoriaID, 
cp.Nome AS NomeCampo,
pc.DadoCampo AS DadoCampo,
pc.Descricao,
p.Link as Link
FROM pecascampos AS pc
INNER JOIN pecas AS p
ON pc.PecaID = p.PecaID
INNER JOIN categorias AS c
ON p.CategoriaID = c.CategoriaID
AND pc.CategoriaID = c.CategoriaID
INNER JOIN campos AS cp
ON cp.CampoID = pc.CampoID
WHERE c.CategoriaID = $codigo");

$resultado3 = mysqli_query( $conn , "SELECT
p.Imagem AS ImagemPeca,
p.Preco AS PrecoPeca,
p.Nome AS NomePeca,
c.Nome AS NomeCategoria,
c.CategoriaID AS CategoriaID, 
cp.Nome AS NomeCampo,
pc.DadoCampo AS DadoCampo,
pc.Descricao
FROM pecascampos AS pc
INNER JOIN pecas AS p
ON pc.PecaID = p.PecaID
INNER JOIN categorias AS c
ON p.CategoriaID = c.CategoriaID
AND pc.CategoriaID = c.CategoriaID
INNER JOIN campos AS cp
ON cp.CampoID = pc.CampoID
WHERE c.CategoriaID = $codigo");
?>

<br>
<div class="container"><table class="table" style="color: white">
<?php 
    if($row = mysqli_fetch_array($resultado)){ 
      echo'<center>'.'<h1>'.$row['Nome'].'</h1>'.'</center>';
      echo '<br>';
    }
?>
<thead>
<th scope="col">Nome</th>
  <?php 
  while($row2 = mysqli_fetch_array($resultado3)){ 
    if ($i <= $codigo2) { ?>
       <th scope="col">
        <?php switch ($row2['NomeCampo']) {
          case 'CpuID':
            echo 'Marca</th>';
            break;
          case 'GpuID':
            echo 'Marca</th>';
            break;
          default:
          echo $row2['NomeCampo']; ?></th><?php 
            break;
        }}?>
       <?php     $i++; 
    } 
    
?>
<th scope="col">Preço</th>
<th scope="col">Imagem</th>
</thead>
  <tbody>
    <tr>
    <?php 
    while ($row3 = mysqli_fetch_array($resultado2)) {   
      if ($a < 1) { ?>
        <td><a href="<?php echo $row3['Link']; ?>"><?php echo $row3['NomePeca']; ?></a></td>
     <?php }
    if ($a == $codigo2) {?>
<td><a href="<?php echo $row3['Link']; ?>"><?php echo $row3['NomePeca']; ?></a></td>
      <?php } 
    switch ($row3['NomeCampo']) {
      case 'CpuID':
        if ($row3['DadoCampo'] == 1) {
          echo '<td>Intel</td>';
        }else {
          echo '<td>AMD</td>';
        }
        break;
      case 'GpuID':
        if ($row3['DadoCampo'] == 1) {
          echo '<td>Nvidia</td>';
        }else {
          echo '<td>AMD</td>'; }
        break;
      default:
        echo '<td>'.$row3['DadoCampo'].'</td>';
        break;
    }
    $a++;
    
    if ($a == $codigo2) {
      ?><td><?php echo 'R$ '.$row3['PrecoPeca']; ?></td><td><img style="height:80px; width:80px; background-image:none ;" src="imagens/<?php echo $row3['ImagemPeca']; ?>"></td></tr><?php
    }if ($a == $fr) {
      $a = 1;
    }

       }
 ?>
  </tbody>
</table>
</div>
  
<?php
include_once "includes/footer.php";
?>