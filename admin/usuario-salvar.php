<?php

include_once '_db.php';
include_once '_head.php';
 if (isset($_GET['id']) || !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE UsuarioID = ".$id;
    $resultado = mysqli_query($conn,$sql);
    $dados = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
 }else{
     $id= '';
     $dados['Nome'] = '';
     $dados['Email'] = '';
     $dados['Senha'] = '';
 }

 Include_once '_menu.php';
 ?>
    <main>
        <h2>Administração dos Usuários</h2>
        <a href="usuario-lista.php">Listagem</a>
        <hr>
        <form action="usuario-processa.php" method="post" enctype="multipart/form-data">
            <input type="hidden" value="salvar" name="acao">
            <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" value="<?php echo $dados['Nome']; ?>"><br>
            <label for="email">E-mail:</label><br>
            <input type="text" id="email" name="email" value="<?php echo $dados['Email']; ?>"><br>
            <label for="senha">Senha:</label><br>
            <input type="password" id="senha" name="senha" value="<?php echo $dados['Senha']; ?>"><br>
            <hr>
            <input type="submit" value="Enviar">
        </form>
    </main>
<?php
Include_once '_footer.php';
?>