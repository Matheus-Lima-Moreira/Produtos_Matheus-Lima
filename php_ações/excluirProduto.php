<?php
include "conexao.php";

//pegando id do produto a ser excluido
$id = $_GET["id"];

//pasta que está com os arquivos de upload
$pastaArquivos = '../backupImagens/';

$comandoSql1 = "select * from tb_produto where id_produto=$id";

$resultado1 = mysqli_query($con, $comandoSql1);

$dados = mysqli_fetch_assoc($resultado1);

$i = $dados["imagem"];

$comandoSql2 = "delete from tb_produto where id_produto=$id";

$resultado2 = mysqli_query($con, $comandoSql2);

if ($resultado2) {
  //excluindo a imagem da pasta de imagens
  unlink($pastaArquivos . $i);
  header("Location:../listaProduto.php");
}