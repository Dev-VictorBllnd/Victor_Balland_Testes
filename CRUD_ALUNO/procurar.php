<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procurar Aluno</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container painel-principal">
    <div class="text-center cabecalho mb-4">
            <h1>U.C Testes de Sistemas - SENAI SC</h1>
            <h4 class="text-success">Formulário de Procura de aluno</h4>
        </div>
        

    <h1 class="text-center mb-4">Procurar Aluno</h1>

    <hr class="linha-divisoria">

    <form method="POST" action="consulta.php" class="row justify-content-center mb-4">
        <div class="col-md-6">
            <label for="iNome" class="form-label">Nome do Aluno(a):</label>
            <input id="iNome" type="text" class="form-control" name="Nome">
        </div>
        <div class="text-center mb-4" style="margin-top: 40px;">
                <button type="submit" class="btn btn-success">Procurar</button>
                <button type="reset" class="btn btn-secondary me-2">Limpar Dados</button>
        </div>
    </form>

    <hr class="linha-divisoria">

        <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
            <form method="POST" action="listar.php">
                <button type="submit" class="btn btn-outline-primary">Listar Alunos</button>
            </form>
            <form method="POST" action="procurar.php">
                <button type="submit" class="btn btn-outline-info">Consultar Aluno</button>
            </form>
            <form method="POST" action="atualizar.php">
                <button type="submit" class="btn btn-outline-warning">Atualizar Dados</button>
            </form>
            <form method="POST" action="apagar.php">
                <button type="submit" class="btn btn-outline-danger">Excluir Aluno</button>
            </form>
        </div>

        <nav class="text-center mb-3">
            <a href="index.php" class="text-decoration-none fw-bold me-3">Home</a>
            <a href="../CRUD_MATRICULA/formMatricula.php" class="text-decoration-none fw-bold">Matrícula</a>
        </nav>
        
        <hr class="linha-divisoria">
        <p class="text-center rodape">Prof. Sergio Luiz da Silveira</p> 
    </div>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>