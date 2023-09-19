<?php   
include_once '_valida.php';
include_once '_db.php';
include_once '_head.php';

$sql= "SELECT * FROM pecas";
$resultado = mysqli_query($conn,$sql);
$total = mysqli_num_rows($resultado);

Include_once '_menu.php';
?>

    <main>
        <h2>Administração das Peças</h2>

        <a href="pecas-salvar.php">inserir</a>
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
                <td><?php echo $dado['PecaID']; ?></td>
                <td><a href="pecas-salvar.php?acao=salvar&id=<?php echo $dado['PecaID']; ?>"><?php echo $dado['Nome']; ?></a></td>
                <td><a href="pecas-processa.php?acao=excluir&id=<?php echo $dado['PecaID']; ?>">Excluir</a></td>
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

      
?>