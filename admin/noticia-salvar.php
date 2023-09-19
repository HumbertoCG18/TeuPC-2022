<?php

include_once '../includes/_db.php';
include_once '_head.php';
 if (isset($_GET['id']) || !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM noticias WHERE NoticiaID = ".$id;
    $resultado = mysqli_query($conn,$sql);
    $dados = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
 }else{
     $id= '';
     $dados['Titulo'] = '';
     $dados['Subtitulo'] = '';
     $dados['Noticia'] = '';
     $dados['Imagem'] = '';
 }

 Include_once '_menu.php';
 ?>
    <main>
        <h2>Administração das Notícias</h2>
        <a href="noticia-lista.php?senha=salva">Listagem</a>
        <hr>
        <form action="noticia-processa.php" method="post" enctype="multipart/form-data">
            <input type="hidden" value="salvar" name="acao">
            <input type="text" value="<?php echo $dados['Imagem'];?>" name="imagem">
            <input type="text" name="id" value="<?php echo $id; ?>"><br>
            <label for="titulo">Título:</label><br>
            <input type="text" id="titulo" name="titulo" value="<?php echo $dados['Titulo']; ?>"><br>
            <label for="subtitulo">Subtítulo</label><br>
            <textarea id="subtitulo" name="subtitulo"><?php echo $dados['Subtitulo']; ?></textarea><br>
            <label for="noticia">Notícia</label><br>
            <textarea id="noticia" name="noticia"><?php echo $dados['Noticia']; ?></textarea><br>
            <label for="imagem">Imagem:</label><br>
            <?php
            if ( !empty($dados['Imagem']) ) {
            ?>
            <img src="../imagens/noticias/<?php echo $dados['Imagem']; ?>"  /><br>
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