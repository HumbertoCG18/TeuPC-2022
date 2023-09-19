<?php

include_once '../includes/_db.php';
include_once '_head.php';
 if (isset($_GET['id']) || !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM categorias WHERE CategoriaID = ".$id;
    $resultado = mysqli_query($conn,$sql);
    $dados = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
 }
 else{
     $id= '';
     $dados['CategoriaID'] = '';
     $dados['Nome'] = '';
 }

 Include_once '_menu.php';
 ?>
    <main>
        <h2>Administração das Categorias</h2>
        <a href="categoria-lista.php?senha=salva">Listagem</a>
        <hr>
        <form action="categoria-processa.php" method="post" enctype="multipart/form-data">
            <input type="hidden" value="salvar" name="acao">
            <input type="text" value="<?php echo $dados['imagem'];?>" name="imagem">
            <input type="text" name="id" value="<?php echo $id; ?>"><br>
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" value="<?php echo $dados['Nome']; ?>"><br>
            <label for="descricao">Descrição</label><br>
            <textarea id="descricao" name="descricao"><?php echo $dados['descricao']; ?></textarea><br>
            <label for="imagem">Imagem:</label><br>
            <?php
            if ( !empty($dados['imagem']) ) {
            ?>
            <img src="../imagens/categorias/<?php echo $dados['imagem']; ?>" width="150" /><br>
            <?php
            }
            ?>
            <input type="file" name="foto">
            <hr>
            <input type="submit" value="Enviar">
        </form>
    </main>
<?php
Include_once '_footer.php';
?>