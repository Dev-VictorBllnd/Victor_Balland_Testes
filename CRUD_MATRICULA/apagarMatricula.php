<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar Matrícula</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container painel-principal mt-4">

    <div class="text-center cabecalho mb-4">
        <h1>U.C Teste de Sistemas - U.C Testes de Sistemas - SENAI SC</h1>
        <h4 class="text-danger">Apagar Dados de Matricula</h4>
    </div>

    <hr class="linha-divisoria">

    <h2 class="text-center mb-4 display-6">Procurar Matrícula para Exclusão</h2>

    <form method="POST" action="formApagarMatricula.php" class="row justify-content-center mb-4 text-start">
        <div class="col-md-4">
            <label for="iID" class="form-label fw-bold">ID de Matricula:</label>
            <input id="iID" type="text" class="form-control" name="ID" maxlength="6" placeholder="Digite o ID numérico">
        </div>
        
        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-danger me-2 px-4">Procurar</button>
            <button type="reset" class="btn btn-secondary px-4">Limpar Dados</button>
        </div>
    </form>

    <hr class="linha-divisoria w-75 mx-auto">

    <div class="d-flex flex-wrap justify-content-center gap-3 mb-4 mt-4">
        <form method="POST" action="formMatricula.php">
            <button type="submit" class="btn btn-outline-success">Registrar Nova Matricula</button>
        </form>
        <form method="POST" action="listarMatricula.php">
            <button type="submit" class="btn btn-outline-primary">Listar Matriculas</button>
        </form>
        <form method="POST" action="procurarMatricula.php">
            <button type="submit" class="btn btn-outline-info">Consultar Matricula</button>
        </form>
        <form method="POST" action="atualizarMatricula.php">
            <button type="submit" class="btn btn-outline-warning">Atualizar Dados de Matricula</button>
        </form>
    </div>

    <nav class="text-center mb-3">
        <a href="../CRUD_ALUNO/index.php" class="text-decoration-none fw-bold me-3">Home</a>
        <a href="formMatricula.php" class="text-decoration-none fw-bold">Matricula</a>
    </nav>

    <hr class="linha-divisoria">
    <p class="text-center rodape">Prof. Sergio Luiz da Silveira</p> 

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>