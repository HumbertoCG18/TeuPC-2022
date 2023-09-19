<?php

Include_once '../includes/_db.php';

$acao = $_REQUEST['acao'];
$id = $_REQUEST['id'];

switch ($acao) {
    case 'excluir':
        $sql = "DELETE FROM produto WHERE ProdutoID = ".$id;
        mysqli_query($conn,$sql);
        header('location: ./produto-lista.php?senha=salva');
        break;
    
    case 'salvar':
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $catid = $_POST['categoriaid'];
        $imagem = $_POST['imagem'];

        if ($_FILES['foto']['size'] > 0){
            $uploaddir = '../imagens/produtos/';
            $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $nomearquivo = 'categoria-'.$id.'-'.rand().'.'.$extensao;
            $uploadfile = $uploaddir . $nomearquivo;
            move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile);
        }else {
            $nomearquivo = $_POST['imagem'];       
        }

        if (!isset($_POST['id']) || empty($_POST['id'])) {
           $sql = "INSERT INTO `produto`(`Nome`, `Descricao`,`Preco`,`CategoriaID`,`Imagem`) VALUE ('".$nome."','".$descricao."','".$preco."','".$catid."','".$nomearquivo."')";
        }else{
            $sql = "UPDATE `produto` SET `Nome`='".$nome."', `Descricao`='".$descricao."', `Preco`='".$preco."', `CategoriaID`='".$catid."',  `Imagem`='".$nomearquivo."' WHERE `ProdutoID`='".$id."' ";
        }
        mysqli_query($conn,$sql);
        header('location: ./produto-lista.php?senha=salva');
        break;
}