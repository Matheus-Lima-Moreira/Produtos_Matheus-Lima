<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <title>Cadastro de Produto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <!--JQuery, Popper, Bootstrap.min.js e SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  <!-- Cadastro De Produto -->
  <?php require_once "php_ações/cadastrar.php" ?>

  <!-- Header -->
  <?php include_once "header.html" ?>

  <div class="container justify-content-center mt-5">
    <form action="" method="POST" enctype="multipart/form-data">
      <!-- Quando o objeto do tipo file (input type=file) é utilizado,se faz necessário usar a 
    codificação multipart/form-datano atributo enctype da criação do formulario-->

      <div class="col-md-12 mb-1">
        <h2>Cadastro de Produto</h2>
        <hr>
      </div>
      <div class="col-sm-12">
        <label for="descricao" class="form-label"> Descrição </label>
        <input type="text" id="descricao" name="descricao" class="form-control" value="" required />
      </div>

      <div class="col-sm-12 mt-3">
        <label for="arquivo" class="form-label"> Imagem </label>
        <input type="file" id="arquivo" name="arquivo" class="form-control" required />
        <img class="my-3" id="img" type="hidden" style="width: 250px" />
      </div>


      <button type="submit" class="btn btn-light btn-outline-dark w-100" id="cadastrar" name="cadastrar" value="Cadastrar">CADASTRAR</button>
    </form>
  </div>

  <!-- Preview imagem de cadastro -->
  <script>
    $(function() {
      $("#arquivo").change(function() {
        const file = $(this)[0].files[0];
        const fileReader = new FileReader();
        fileReader.onloadend = function() {
          $("#img").attr("src", fileReader.result);
        };
        fileReader.readAsDataURL(file);
      });
    });
  </script>
</body>
</html>