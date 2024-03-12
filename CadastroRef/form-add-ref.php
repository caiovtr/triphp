<?php
    require_once 'init.php';
    $PDO = db_connect();
    $sql = "SELECT id, descricaoTipo FROM tipos ORDER BY descricaoTipo ASC";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <title>Refrigerantes</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="./index.html">Início</a>
      </nav>
      <div class="container">
        <div class="jumbotron">
            <p class="h3 text-center">Cadastro de Refrigerantes</p>
        </div>
        <form action="addRefri.php" method="post">
            <div class="form-group">
                <label for="descricao">Descrição: </label>
                <input type="text" class="form-control" name="descricao" id="descricao" required minlength="2" placeholder="Informe a descricao do refrigerante">
            </div>
            <div class="form-group">
                <label for="selectTipo">Selecione o tipo do refrigerante</label>
                <select class="form-control" name="selectTipo" id="selectTipo" required>

                  <?php while($dados = $stmt->fetch(PDO::FETCH_ASSOC)): ?>

                        <option value=" <?php echo $dados['id'] ?> "> <?php echo $dados['descricaoTipo'] ?> </option>
                      
                  <?php endwhile; ?>

                </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a class="btn btn-danger" href="index.html">Cancelar</a>
              </div>
          </form>
    </div>
</body>
</html>