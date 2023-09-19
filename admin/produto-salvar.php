<?php

include_once '../includes/_db.php';
include_once '_head.php';
 if (isset($_GET['id']) || !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM produto WHERE ProdutoID = ".$id;
    $resultado = mysqli_query($conn,$sql);
    $dados = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
 }else{
     $id= '';
     $dados['Nome'] = '';
     $dados['Descricao'] = '';
     $dados['Preco'] = '';
     $dados['CategoriaID'] = '';
     $dados['Imagem'] = '';
 }

 Include_once '_menu.php';
 ?>
    <main>
        <h2>Administração dos Produtos</h2>
        <a href="produto-lista.php?senha=salva">Listagem</a>
        <hr>
        <form action="produto-processa.php" method="post" enctype="multipart/form-data">
            <input type="hidden" value="salvar" name="acao">
            <input type="text" name="id" value="<?php echo $id; ?>"><br>
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" value="<?php echo $dados['Nome']; ?>"><br>
            <label for="descricao">Descrição</label><br>
            <textarea id="descricao" name="descricao"><?php echo $dados['Descricao']; ?></textarea><br>
            <label for="categoriaid">Categoria:</label><br>
            <input type="text" id="categoriaid" name="categoriaid" value="<?php echo $dados['CategoriaID']; ?>"><br>
            <label for="preco">Preço:</label><br>
            <input type="text" id="preco" name="preco" value="<?php echo $dados['Preco']; ?>"><br>
            <label for="imagem">Imagem:</label><br>
            <?php
            if ( !empty($dados['Imagem']) ) {
            ?>
            <img src="../imagens/produtos/<?php echo $dados['Imagem']; ?>" width="150" /><br>
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