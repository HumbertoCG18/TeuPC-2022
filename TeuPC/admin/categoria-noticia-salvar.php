<?php

include_once '../includes/_db.php';
include_once '_head.php';
 if (isset($_GET['id']) || !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM categorianoticias WHERE CategoriaNoticiaID = ".$id;
    $resultado = mysqli_query($conn,$sql);
    $dados = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
 }else{
     $id= '';
     $dados['Nome'] = '';
 }

 Include_once '_menu.php';
 ?>
    <main>
        <h2>Administração das Categorias das Notícias</h2>
        <a href="categoria-noticia-lista.php?senha=salva">Listagem</a>
        <hr>
        <form action="categoria-noticia-processa.php" method="post" enctype="multipart/form-data">
            <input type="hidden" value="salvar" name="acao">
            <input type="text" name="id" value="<?php echo $id; ?>"><br>
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" value="<?php echo $dados['Nome']; ?>"><br>
            <hr>
            <input type="submit" value="Enviar">
        </form>
    </main>
<?php
Include_once '_footer.php';
?>