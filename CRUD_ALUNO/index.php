<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Testes de Sistemas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    
</head>
<body>

    <div class="container painel-principal">

        <div class="text-center cabecalho">
            <h1>U.C Testes de Sistemas - SENAI SC</h1>
            <h2>Formulário de Cadastro do Aluno</h2>
        </div>

        <hr class="linha-divisoria">

        <div class="d-flex justify-content-center gap-4 area-botoes">
            
            <form method="POST" action="formAluno.php">
                <button type="submit" class="btn btn-primary btn-lg px-4">
                    Cadastrar Aluno
                </button>
            </form>

            <form method="POST" action="../CRUD_MATRICULA/formMatricula.php">
                <button type="submit" class="btn btn-outline-primary btn-lg px-4">
                    Cadastrar Matrícula
                </button>
            </form>

        </div>

        <hr class="linha-divisoria">
        <p class="text-center rodape">Prof. Sergio Luiz da Silveira</p> 

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>