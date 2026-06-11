<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Matrículas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container painel-principal mt-4">

    <div class="text-center cabecalho mb-4">
        <h1>U.C Testes de Sistemas - SENAI SC</h1>
        <h4 class="text-success">Listagem de Matriculas</h4>
    </div>

    <hr class="linha-divisoria">
    
    <div class="row mt-4 mb-5">
        
        <?php
            $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
            if($conexao->connect_errno){
                echo '<div class="col-12"><div class="alert alert-danger shadow-sm text-center">Ocorreu um erro na conexão com o banco de dados.</div></div>';
                exit;
            }

            $conexao->set_charset("utf8");

            $sql = "SELECT * FROM `matricula`;";
            
            echo '<div class="col-12"><p class="text-muted text-center small font-monospace mb-4">DEBUG SQL: ' . $sql . '</p></div>';
            
            $result = $conexao->query($sql);

            if($result->num_rows > 0){
                while($linha = $result->fetch_assoc()){
                    echo '<div class="col-md-6 col-lg-4 mb-4">';
                    echo '  <div class="card shadow-sm h-100 border-0 bg-light">';
                    echo '    <div class="card-body">';
                    echo '      <h5 class="card-title text-primary border-bottom pb-2 mb-3">ID: ' . $linha["id"] . '</h5>';
                    echo '      <p class="card-text mb-1"><strong>Nível:</strong> ' . $linha["nivel"] . '</p>';
                    echo '      <p class="card-text mb-1"><strong>Turno:</strong> ' . $linha["turno"] . '</p>';
                    echo '      <p class="card-text mb-1"><strong>Série:</strong> ' . $linha["serie"] . '</p>';
                    echo '      <p class="card-text mb-0"><strong>Curso Extra:</strong> ' . $linha["cursoExtra"] . '</p>';
                    echo '    </div>';
                    echo '  </div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-12"><div class="alert alert-info text-center shadow-sm">Sem resultado cadastrado.</div></div>';
            }

            $conexao->close();
        ?>

    </div>

    <hr class="linha-divisoria w-75 mx-auto">

    <div class="d-flex flex-wrap justify-content-center gap-3 mb-4 mt-4">
        <form method="POST" action="formMatricula.php">
            <button type="submit" class="btn btn-outline-success">Registrar Nova Matricula</button>
        </form>
        <form method="POST" action="procurarMatricula.php">
            <button type="submit" class="btn btn-outline-info">Consultar Matricula</button>
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

```