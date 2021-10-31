<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <title>Listagem de Produtos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <!--JQuery, Popper e Bootstrap.min.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  <!-- Header -->
  <?php include_once "header.html" ?>
  <?php require_once "php_ações/conexao.php" ?>

  <div class="container justify-content-center mt-5">

    <div class="col-md-12 mb-4">
      <h2>Listagem de Produtos</h2>
      <hr>
    </div>

    <table class="table table-striped table-light table-hover align-middle">
      <tr>
        <td>Id</td>
        <td>Descrição</td>
        <td>Imagem</td>
        <td>Ações</td>
      </tr>

      <?php
      $pastaArquivos = 'backupImagens/';
      $comandoSql = "SELECT * FROM tb_produto";
      $resultado = mysqli_query($con, $comandoSql);

      while ($dados = mysqli_fetch_assoc($resultado)) {
        $id = $dados["id_produto"];
        $d = $dados["descricao"];
        $i = $dados["imagem"];
      ?>
        <tr>
          <td> <?php echo $id; ?> </td>
          <td> <?php echo $d; ?> </td>
          <td> <img src=<?php echo "$pastaArquivos$i"; ?> width="50" height="50"> </td>
          <td> <a href=<?php echo "alterarProduto.php?id=$id" ?> style="text-decoration: none"> <button class="btn btn-primary">Editar</button> </a> <button class="btn btn-danger" id="delete">Excluir</button> </td>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>

<script> 
  $('#delete').click(function(){
  swal({
  title: "Você tem certeza?",
  text: "Uma vez deletado, você não poderá recuperar o arquivo!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      swal("Arquivo foi excluido com sucesso!", {
      icon: "success",
      }).then( () => location.replace('<?php echo "php_ações/excluirProduto.php?id=$id" ?>')) 
    } else {
      location.replace(location.href)
    }
  });
  });
</script>
</body>
</html>