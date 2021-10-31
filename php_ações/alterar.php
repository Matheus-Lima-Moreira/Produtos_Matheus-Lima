<?php
  include "conexao.php";

  //pegando id do produto a ser alterado
  $id = $_GET["id"];

  //pasta que está com os arquivos de upload
  $pastaArquivos = 'backupImagens/';

  $comandoSql = "select * from tb_produto where id_produto=$id";

  $resultado = mysqli_query($con, $comandoSql);

  $dados = mysqli_fetch_assoc($resultado);

  $id = $dados["id_produto"];
  $d = $dados["descricao"];
  $iatual = $dados["imagem"];

  if (isset($_POST['alterar'])) {
    if ($_FILES['arquivo']['name'] != "") {
      $pastaArquivos = "backupImagens/";

      $nomeArquivo = $_FILES['arquivo']['name'];
      $nomeTemporario = $_FILES['arquivo']['tmp_name'];

      $save = (move_uploaded_file($nomeTemporario, $pastaArquivos . $nomeArquivo));

      unlink($pastaArquivos . $iatual);
    } else {
      $nomeArquivo = $iatual;
      $save = true;
    }

    if ($save) {
      if (($_POST['descricao']) != "") {

        $descricao = $_POST['descricao'];

        $comandoSQL = "UPDATE tb_produto set descricao='$descricao', imagem='$nomeArquivo' where id_produto=$id";

        $resultado = mysqli_query($con, $comandoSQL);

  if ($resultado) { 
?>
<script>
      swal({
        title: "Bom trabalho!",
        text: "Produto Alterado com sucesso!",
        icon: "success",
        button: "Fechar"
      }).then(
        () => {
          location.replace(location.href)
        }
      );
</script>
<?php
        } else {
?>
<script>
      swal({
        title: "Tente novamente!",
        text: "Produto não Alterado!",
        icon: "error",
        button: "Fechar"
      });
</script> 
<?php
      }
    }
  }
}
?>