<?php

Include_once '_db.php';

$acao = $_REQUEST['acao'];
$id = $_REQUEST['id'];

switch ($acao) {
    case 'excluir':
        $sql = "DELETE FROM usuarios WHERE UsuarioID = ".$id;
        mysqli_query($conn,$sql);
        header('location: ./usuario-lista.php');
        break;
    
    case 'salvar':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
  

        if (!isset($_POST['id']) || empty($_POST['id'])) {
           $sql = "INSERT INTO `usuarios`(`Nome`, `Email` , `Senha`) VALUE ('".$nome."','".$email."','".$senha."')";
        }else{
            $sql = "UPDATE `usuarios` SET `Nome`='".$nome."', `Email`='".$email."', `Senha`='".$senha."' WHERE `UsuarioID`='".$id."'";
        }
        mysqli_query($conn,$sql);
        header('location: ./usuario-lista.php?senha=salva');
        break;
}