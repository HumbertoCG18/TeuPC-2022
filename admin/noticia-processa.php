<?php

Include_once '../includes/_db.php';

$acao = $_REQUEST['acao'];
$id = $_REQUEST['id'];

switch ($acao) {
    case 'excluir':
        $sql = "DELETE FROM noticias WHERE NoticiaID = ".$id;
        mysqli_query($conn,$sql);
        header('location: ./noticia-lista.php?senha=salva');
        break;
    
    case 'salvar':
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $noticia = $_POST['noticia'];
        $imagem = $_POST['imagem'];

        if ($_FILES['foto']['size'] > 0){
            $uploaddir = '../imagens/noticias/';
            $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $nomearquivo = 'noticia-'.$id.'-'.rand().'.'.$extensao;
            $uploadfile = $uploaddir . $nomearquivo;
            move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile);
        }else {
            $nomearquivo = $_POST['imagem'];       
        }

        if (!isset($_POST['id']) || empty($_POST['id'])) {
           $sql = "INSERT INTO `noticias`(`Titulo`, `Subtitulo` , `Noticia`, `Imagem`) VALUE ('".$titulo."','".$subtitulo."','".$noticia."','".$nomearquivo."')";
        }else{
            $sql = "UPDATE `noticias` SET `Titulo`='".$titulo."', `Subtitulo`='".$subtitulo."', `Noticia`='".$noticia."', `Imagem`='".$nomearquivo."' WHERE `NoticiaID`='".$id."' ";
        }
        mysqli_query($conn,$sql);
        header('location: ./noticia-lista.php?senha=salva');
        break;
}