<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar Dados</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container painel-principal">

    <div class="text-center cabecalho mb-4">
        <h1>U.C Testes de Sistemas - SENAI SC</h1>
        <h4 class="text-danger">Exclusão de Cadastro</h4>
    </div>

    <hr class="linha-divisoria">

    <div class="row justify-content-center my-5">
        <div class="col-md-6 text-center">

            <?php
            if (isset($_POST["ID"])){
                
                $ID = $_POST["ID"];
                
                $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
                if($conexao->connect_errno){
                    $erro = "Ocorreu um erro na conexão com o banco de dados.";
                } else {
                    $conexao->set_charset("utf8");

                    // Comando para deletar o aluno
                    $sql = "DELETE FROM `aluno` WHERE id='$ID';";
                    
                    // Mostrando o SQL de forma discreta para fins de debug
                    echo '<p class="text-muted small font-monospace mb-4">DEBUG SQL: ' . $sql . '</p>';

                    if($conexao->query($sql) === TRUE){
                        $sucesso = "Deletado com sucesso!";
                    } else {
                        $erro = "Erro :".$sql."<br>".$conexao->error;
                    }
                    $conexao->close();
                }
            } else {
                $erro = "Campo obrigatório não preenchido.";
            }

            // Nossa regra nº 3: Alertas modernos do Bootstrap
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

    <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
        <form method="POST" action="formAluno.php">
            <button type="submit" class="btn btn-outline-success">Registrar Novo Aluno</button>
        </form>
        <form method="POST" action="listar.php">
            <button type="submit" class="btn btn-outline-primary">Listar Alunos</button>
        </form>
        <form method="POST" action="procurar.php">
            <button type="submit" class="btn btn-outline-info">Consultar Aluno</button>
        </form>
        <form method="POST" action="atualizar.php">
            <button type="submit" class="btn btn-outline-warning">Atualizar Dados</button>
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