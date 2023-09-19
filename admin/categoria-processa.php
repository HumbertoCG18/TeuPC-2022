<?php

Include_once '../includes/_db.php';

$acao = $_REQUEST['acao'];
$id = $_REQUEST['id'];

switch ($acao) {
    case 'excluir':
        $sql = "DELETE FROM categoria WHERE CategoriaID = ".$id;
        mysqli_query($conn,$sql);
        header('location: ./categoria-lista.php?senha=salva');
        break;
    
    case 'salvar':
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];

        if ($_FILES['foto']['size'] > 0){
            $uploaddir = '../imagens/categorias/';
            $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $nomearquivo = 'categoria-'.$id.'-'.rand().'.'.$extensao;
            $uploadfile = $uploaddir . $nomearquivo;
            move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile);
        }else {
            $nomearquivo = $_POST['imagem'];       
        }

        if (!isset($_POST['id']) || empty($_POST['id'])) {
           $sql = "INSERT INTO `categoria`(`Nome`, `descricao` , `Imagem`) VALUE ('".$nome."','".$descricao."','".$nomearquivo."')";
        }else{
            $sql = "UPDATE `categoria` SET `Nome`='".$nome."', `descricao`='".$descricao."', `Imagem`='".$nomearquivo."' WHERE `CategoriaID`='".$id."' ";
        }
        mysqli_query($conn,$sql);
        header('location: ./categoria-lista.php?senha=salva');
        break;
}