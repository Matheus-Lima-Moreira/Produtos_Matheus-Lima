<?php
if (isset($_POST['cadastrar'])) {
  if (($_FILES['arquivo']['name'] != "") && ($_POST['descricao']) != "") {

    $pastaArquivos = "backupImagens/";

    $nomeArquivo = $_FILES['arquivo']['name'];
    $nomeTemporario = $_FILES['arquivo']['tmp_name'];

    if (move_uploaded_file($nomeTemporario, $pastaArquivos . $nomeArquivo)) {
      $descricao = $_POST['descricao'];
      include "conexao.php";

      $comandoSQL = "INSERT INTO tb_produto (`descricao`, `imagem`) VALUES ('$descricao', '$nomeArquivo')";

      $resultado = mysqli_query($con, $comandoSQL);
      // echo $resultado ? $resultado : mysqli_error($con);
?>
  <script>
    swal({
      title: "Bom trabalho!",
      text: "Produto cadastrado com sucesso!",
      icon: "success",
      button: "Fechar!",
    });
  </script>
<?php
    }
  } else {
?>
  <script>
    swal({
      title: "Tente novamente!",
      text: "Produto não foi cadastrado com sucesso!",
      icon: "error",
      button: "Fechar!",
    });
  </script>
<?php
  }
}
?>