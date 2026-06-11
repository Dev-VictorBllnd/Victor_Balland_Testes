<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Dados de Matrícula</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container painel-principal mt-4">

    <div class="text-center cabecalho mb-4">
        <h1>U.C Testes de Sistemas - SENAI SC</h1>
        <h4 class="text-danger">Dados da Matricula</h4>
    </div>

    <hr class="linha-divisoria">

    <div class="row justify-content-center my-5">
        <div class="col-md-8">

            <?php
            if(empty($_POST["id"])){
                echo '<div class="alert alert-warning text-center fs-5 shadow-sm" role="alert">';
                echo '<strong>Atenção!</strong> Por favor preencher o campo do ID';
                echo '</div>';
            } else {
                $id = $_POST["id"];
                $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
                if($conexao->connect_errno){
                    echo '<div class="alert alert-danger text-center shadow-sm">Ocorreu um erro na conexão com o banco de dados.</div>';
                    exit;
                }
                $conexao->set_charset("utf8");

                // Mantida a sua consulta SQL
                $sql = "SELECT id,nivel,turno,serie,cursoExtra FROM matricula WHERE id LIKE '%$id%'";
                
                // Debug do SQL alinhado de forma discreta
                echo '<p class="text-muted text-center small font-monospace mb-4">DEBUG SQL: ' . $sql . '</p>';

                $result = $conexao->query($sql);

                if($result->num_rows > 0){
                    // Organizando o echo dos resultados em Cards do Bootstrap
                    while($linha = $result->fetch_assoc()){
                        echo '<div class="card mb-3 shadow-sm border-0 bg-light">';
                        echo '<div class="card-body">';
                        echo '<p class="mb-1"><strong>Id:</strong> ' . $linha["id"] . '</p>';
                        echo '<p class="mb-1"><strong>Nível:</strong> ' . $linha["nivel"] . '</p>';
                        echo '<p class="mb-1"><strong>Turno:</strong> ' . $linha["turno"] . '</p>';
                        echo '<p class="mb-1"><strong>Série:</strong> ' . $linha["serie"] . '</p>';
                        echo '<p class="mb-0"><strong>Curso Extra Curricular:</strong> ' . $linha["cursoExtra"] . '</p>';
                        echo '</div></div>';
                    }
                } else {
                    echo '<div class="alert alert-info text-center shadow-sm" role="alert">';
                    echo 'Sem resultado encontrado para este ID.';
                    echo '</div>';
                }
                $conexao->close();
            }
            ?> 

        </div>
    </div>

    <hr class="linha-divisoria">

    <div class="d-flex flex-wrap justify-content-center gap-3 mb-4 mt-4">
        <form method="POST" action="formMatricula.php">
            <button type="submit" class="btn btn-outline-success">Registrar Nova Matricula</button>
        </form>
        <form method="POST" action="listarMatricula.php">
            <button type="submit" class="btn btn-outline-primary">Listar Matriculas</button>
        </form>
        <form method="POST" action="atualizarMatricula.php">
            <button type="submit" class="btn btn-outline-warning">Atualizar Dados de Matricula</button>
        </form>
        <form method="POST" action="apagarMatricula.php">
            <button type="submit" class="btn btn-outline-danger">Excluir Dados de Matricula</button>
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