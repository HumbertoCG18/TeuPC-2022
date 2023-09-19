<?php
include_once "includes/_db.php";
include_once "includes/head.php";
include_once "includes/header.php";
?>
<?php
$x = 1;
$pre= 0;
$preto= 0;
$pr1 = ''; $pr2 = ''; $pr3 = ''; $pr4 = ''; $pr5 = ''; $pr6 = ''; $pr7 = ''; $pr8 = ''; $pr9 = ''; $pr10 = '';  $pr11 = '';
$sql="SELECT * FROM pecas"; 
$resultado = mysqli_query( $conn , $sql);
$cpu = $_POST['CPU'];
$preco = $_POST['preco'];
$jogos = $_POST['jogos'];
$npreco = '';

if ($cpu == 1) {
  if ($jogos == 'sim') {
    switch ($preco) {
        case '6':
          $pr1 = '2'; $pr2 = '29'; $pr3 = '34'; $pr4 = '44'; $pr5 = '54'; $pr6 = '67'; $pr7 = '73'; $pr8 = '86'; $pr9 = ''; $pr10 = '';  $pr11 = '';
          break;
          case '8':
            $pr1 = '5'; $pr2 = '26'; $pr3 = '34'; $pr4 = '44'; $pr5 = '54'; $pr6 = '62'; $pr7 = '73'; $pr8 = '86'; $pr9 = '40'; $pr10 = '';  $pr11 = '';
            break;
            case '11':
              $pr1 = '10'; $pr2 = '28'; $pr3 = '34'; $pr4 = '34'; $pr5 = '43'; $pr6 = '57'; $pr7 = '63'; $pr8 = '73'; $pr9 = '86'; $pr10 = '';  $pr11 = '';
              break;
    }
  }else {
    switch ($preco) {
        case '6':
          $pr1 = '2'; $pr2 = '29'; $pr3 = '34'; $pr4 = '44'; $pr5 = '54'; $pr6 = '67'; $pr7 = '73'; $pr8 = '86'; $pr9 = ''; $pr10 = '';  $pr11 = '';
          break;
          case '8':
            $pr1 = '5'; $pr2 = '26'; $pr3 = '34'; $pr4 = '44'; $pr5 = '54'; $pr6 = '62'; $pr7 = '73'; $pr8 = '86'; $pr9 = '40'; $pr10 = '';  $pr11 = '';
            break;
            case '11':
              $pr1 = '10'; $pr2 = '28'; $pr3 = '34'; $pr4 = '86'; $pr5 = '43'; $pr6 = '57'; $pr7 = '63'; $pr8 = '73'; $pr9 = ''; $pr10 = '';  $pr11 = '';
              break;
    }
  }
}else {
    if ($jogos == 'sim') {
      switch ($preco) {
          case '6':
            $pr1 = '13'; $pr2 = '21'; $pr3 = '34'; $pr4 = '44'; $pr5 = '54'; $pr6 = '60'; $pr7 = '73'; $pr8 = '86'; $pr9 = ''; $pr10 = '';  $pr11 = '';
            break;
            case '8':
              $pr1 = '19'; $pr2 = '30'; $pr3 = '34'; $pr4 = '44'; $pr5 = '57'; $pr6 = '62'; $pr7 = '73'; $pr8 = '86'; $pr9 = '40'; $pr10 = '';  $pr11 = '';
              break;
              case '11':
                $pr1 = '19'; $pr2 = '30'; $pr3 = '34'; $pr4 = '86'; $pr5 = '43'; $pr6 = '57'; $pr7 = '63'; $pr8 = '73'; $pr9 = ''; $pr10 = '';  $pr11 = '';
                break;
      }
    }else {
      switch ($preco) {
        case '6':
          $pr1 = '13'; $pr2 = '21'; $pr3 = '34'; $pr4 = '44'; $pr5 = '54'; $pr6 = '60'; $pr7 = '73'; $pr8 = '86'; $pr9 = ''; $pr10 = '';  $pr11 = '';
          break;
          case '8':
            $pr1 = '19'; $pr2 = '30'; $pr3 = '34'; $pr4 = '44'; $pr5 = '57'; $pr6 = '63'; $pr7 = '73'; $pr8 = '86'; $pr9 = '40'; $pr10 = '';  $pr11 = '';
            break;
            case '11':
              $pr1 = '19'; $pr2 = '30'; $pr3 = '34'; $pr4 = '34'; $pr5 = '43'; $pr6 = '57'; $pr7 = '63'; $pr8 = '73'; $pr9 = '86'; $pr10 = '';  $pr11 = '';
              break;
    }
    }
  }

?>
<div class="container"><table class="table" style="color: white">
<br>
<center><h1>Peças</h1></center>
<thead>
<th scope="col">Nome</th>
<th scope="col">Preço</th>
<th scope="col">Imagem</th>
</thead>
  <tbody>
    <tr>
    <?php 
while ($row = mysqli_fetch_array($resultado)) {
echo '<tr>';
if ($row['PecaID'] == $pr1 || $row['PecaID'] == $pr2 || $row['PecaID'] == $pr3 || $row['PecaID'] == $pr4 || $row['PecaID'] == $pr5 || $row['PecaID'] == $pr6 || $row['PecaID'] == $pr7 || $row['PecaID'] == $pr8 || $row['PecaID'] == $pr9 || $row['PecaID'] == $pr10 || $row['PecaID'] == $pr11) {
  $x++;
  echo '<td><a href="'.$row['Link'].'">'.$row['Nome'].'</a></td>';
  echo '<td>R$'.$row['Preco'].'</td>'; ?>
  <td><img style="height:80px; width:80px; background-image:none ;" src="imagens/<?php echo $row['Imagem']; ?>"></td> 
  <?php
 }
 echo '</tr>'; }?>
  </tbody>
</table>
</div>
<?php
include_once "includes/footer.php";
?>
</div>


