<?php

include_once '_db.php';
include_once '_head.php';
 if (isset($_GET['id']) || !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT p.Nome, p.Preco, p.Link, p.Imagem, c.CategoriaID, c.Nome as Nomec, p.PecaID FROM pecas AS p INNER JOIN categorias as c ON p.CategoriaID = c.CategoriaID WHERE PecaID = ".$id;
    $resultado = mysqli_query($conn,$sql);
    $dados = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
 }else{
     $id= '';
     $dados['Nome'] = '';
     $dados['Preco'] = '';
     $dados['Link'] = '';
     $dados['Imagem'] = '';
     $dados['CategoriaID'] = '';

 }

 Include_once '_menu.php';
 ?>
    <main>
        <h2>Administração das Peças</h2>
        <a href="pecas-lista.php">Listagem</a>
        <hr>
        <form action="pecas-processa.php" method="post" enctype="multipart/form-data">
            <input type="hidden" value="salvar" name="acao">
            <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
            <label for="nome">Nome:</label><br>
            <textarea id="nome" name="nome"><?php echo $dados['Nome']; ?></textarea><br>
            <label for="preco">Preço:</label><br>
            <input type="text" id="preco" name="preco" value="<?php echo $dados['Preco']; ?>"><br>
            <label for="link">Link:</label><br>
            <textarea id="link" name="link"><?php echo $dados['Link']; ?></textarea><br>
            <label for="categorias">Categorias:</label><br>
            <select class="form-control" id="categorias" name="categorias">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      </select>
      <br>
            <label for="imagem">Imagem:</label><br>
            <?php
            if ( !empty($dados['Imagem']) ) {
            ?>
            <img src="../imagens/<?php echo $dados['Imagem']; ?>"  /><br>
            <?php
            }
            ?>
            <input type="text" value="<?php echo $dados['Imagem'];?>" name="imagem">
            <input type="file" name="foto">
            <hr>
            <input type="submit" value="Enviar">
        </form>
    </main>
<?php
Include_once '_footer.php';
?>