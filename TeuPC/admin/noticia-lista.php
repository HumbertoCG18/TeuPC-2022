<?php
 $senha = 'a';
    $senha = $_GET['senha'];
    switch ($senha) {
        case 'salva':
           echo '';
            
   
include_once '../includes/_db.php';
include_once '_head.php';

$sql= "SELECT * FROM noticias";
$resultado = mysqli_query($conn,$sql);
$total = mysqli_num_rows($resultado);

Include_once '_menu.php';
?>

    <main>
        <h2>Administração das Notícias</h2>

        <a href="noticia-salvar.php">inserir</a>
        <hr>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>

            <?php
            if($resultado ){
                while ($dado = mysqli_fetch_array($resultado)) {
            ?>
            <tr>
                <td><?php echo $dado['NoticiaID']; ?></td>
                <td><a href="noticia-salvar.php?acao=salvar&id=<?php echo $dado['NoticiaID']; ?>"><?php echo $dado['Titulo']; ?></a></td>
                <td><a href="noticia-processa.php?acao=excluir&id=<?php echo $dado['NoticiaID']; ?>">Excluir</a></td>
            </tr>
            <?php
                }
            }else{
                ?>
                <tr>
                    <td colspan="3">Resultado não encontrado</td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan="3">Total de Registros: <?php echo $total;?></td>
            </tr>
        </table>
    </main>
<?php
Include_once '_footer.php';
break;
default:
echo 'Senha incorreta';
        }
?>