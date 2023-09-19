<?php

Include_once '_db.php';

$acao = $_REQUEST['acao'];
$id = $_REQUEST['id'];

switch ($acao) {
    case 'excluir':
        $sql = "DELETE FROM pecas WHERE PecaID = ".$id;
        mysqli_query($conn,$sql);
        header('location: ./pecas-lista.php');
        break;
    
    case 'salvar':
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $link = $_POST['link'];
        $imagem = $_POST['imagem'];
        $categoria = $_POST['categorias'];

        if ($_FILES['foto']['size'] > 0){
            $uploaddir = '../imagens/';
            $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $nomearquivo = 'pecas-'.$imagem.'-'.$id.'.'.$extensao;
            $uploadfile = $uploaddir . $nomearquivo;
            move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile);
        }else {
            $nomearquivo = $_POST['imagem'];       
        }

        if (!isset($_POST['id']) || empty($_POST['id'])) {
           $sql = "INSERT INTO `pecas`(`Nome`, `Preco` , `Link`, `Imagem`, `CategoriaID`) VALUE ('".$nome."','".$preco."','".$link."','".$nomearquivo."','".$categoria."')";
        }else{
            $sql = "UPDATE `pecas` SET `Nome`='".$nome."', `Preco`='".$preco."', `Link`='".$link."', `Imagem`='".$nomearquivo."', `CategoriaID`='".$categoria."' WHERE `PecaID`='".$id."' ";
        }
        mysqli_query($conn,$sql);
        header('location: ./pecas-lista.php?senha=salva');
        break;
}