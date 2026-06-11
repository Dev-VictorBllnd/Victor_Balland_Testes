<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CadMatricula</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container painel-principal mt-4">

    <div class="text-center cabecalho mb-4">
        <h1>U.C Teste de Sistemas - U.C Testes de Sistemas - SENAI SC</h1>
        <h4 class="text-danger">Formulário de Cadastro de Matricula</h4>
    </div>

    <hr class="linha-divisoria">

    <div class="row justify-content-center my-5">
        <div class="col-md-8 text-center">

            <?php
            // Lógica original de inserção mantida intacta
            if (isset($_POST["nivel"]) && isset($_POST["turno"]) && isset($_POST["serie"]) && isset($_POST["extraCurso"]) != ''){
                
                $nivel = $_POST["nivel"];
                $turno = $_POST["turno"];
                $serie = $_POST["serie"];
                $extraCurso = $_POST["extraCurso"];

                $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
                if($conexao->connect_errno){
                    $erro = "Ocorreu um erro na conexão com o banco de dados.";
                    exit;
                }

                $stmt = $conexao->prepare("INSERT INTO `matricula`(`nivel`,`turno`,`serie`,`cursoExtra`) VALUES(?,?,?,?)");
                $stmt->bind_param('ssss', $nivel, $turno, $serie, $extraCurso);

                if(!$stmt->execute()){
                    $erro = $stmt->error;
                } else {
                    $sucesso = "Matricula cadastrado com sucesso!";
                }

            } else {
                $erro = "Campo obrigatório não preenchido";
            }

            // Alertas visuais do Bootstrap substituindo as mensagens em texto puro
            if(isset($erro)) {
                echo '<div class="alert alert-danger fs-5 shadow-sm" role="alert">';
                echo '<strong>Atenção!</strong> ' . $erro;
                echo '</div>';
            }

            if(isset($sucesso)) {
                echo '<div class="alert alert-success fs-5 shadow-sm" role="alert">';
                echo '<strong>Concluído!</strong> ' . $sucesso;
                echo '</div>';
            }
            ?>

        </div>
    </div>

    <hr class="linha-divisoria">

    <div class="d-flex flex-wrap justify-content-center gap-3 mb-4 mt-4">
        <form method="POST" action="listarMatricula.php">
            <button type="submit" class="btn btn-outline-primary">Listar Matriculas</button>
        </form>
        <form method="POST" action="procurarMatricula.php">
            <button type="submit" class="btn btn-outline-info">Consultar Matricula</button>
        </form>
        <form method="POST" action="atualizarMatricula.php">
            <button type="submit" class="btn btn-outline-warning">Atualizar Dados da Matricula</button>
        </form>
        <form method="POST" action="apagarMatricula.php">
            <button type="submit" class="btn btn-outline-danger">Excluir Dados da Matricula</button>
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