<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualiza Dados</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container painel-principal">

    <div class="text-center cabecalho mb-4">
        <h1>U.C Testes de Sistemas - SENAI SC</h1>
        <h4 class="text-danger">Alteração de Dados do Cadastro</h4>
    </div>

    <hr class="linha-divisoria">

    <div class="row justify-content-center my-5">
        <div class="col-md-6 text-center">
            
            <?php
            if (isset($_POST["ID"]) && isset($_POST["Nome"]) && isset($_POST["DataNasc"]) && isset($_POST["NomePai"]) && isset($_POST["NomeMae"]) && isset($_POST["Telefone"]) && isset($_POST["Email"]) && isset($_POST["Sexo"]) && $_POST["Bairro"] != ''){
                
                $ID = $_POST["ID"];
                $nome = $_POST["Nome"];
                $datanasc = $_POST["DataNasc"];
                $nomepai = $_POST["NomePai"];
                $nomemae = $_POST["NomeMae"];
                $telefone = $_POST["Telefone"];
                $email = $_POST["Email"];
                $sexo = $_POST["Sexo"];
                $bairro = $_POST["Bairro"];

                if(strlen($datanasc) < 10){
                    $erro = "Por Favor inserir uma data válida";
                } else {
                    if(strlen($telefone)<13){
                        $erro = "Por favor inserir um telefone válido";
                    } else {
                        $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
                        if($conexao->connect_errno){
                            $erro = "Ocorreu um erro na conexão com o banco de dados.";
                            exit;
                        }
                        $conexao->set_charset("utf8");

                        $sql = "UPDATE `aluno` SET id = $ID, nome = '$nome', dataNascimento = '$datanasc', nomePai = '$nomepai', nomeMae = '$nomemae', telefone = '$telefone', email = '$email', sexo = '$sexo', bairro = '$bairro' WHERE id='$ID'; ";

                        // Comando SQL impresso de forma bem discreta
                        echo '<p class="text-muted small font-monospace mb-4">DEBUG SQL: ' . $sql . '</p>';

                        if($conexao->query($sql)=== TRUE){
                            $sucesso = "Dados alterados com sucesso!";
                        } else {
                            $erro = "Erro :".$sql."<br>".$conexao->error;
                        }
                        $conexao->close();
                    }
                }
            } else {
                $erro = "Campo obrigatório não preenchido";
            }

            // Exibe os alertas esticando no máximo até o limite do col-md-6
            if(isset($erro)) {
                echo '<div class="alert alert-danger fs-5 shadow-sm" role="alert">';
                echo '<strong>Atenção!</strong> ' . $erro;
                echo '</div>';
            }

            if(isset($sucesso)) {
                echo '<div class="alert alert-success fs-5 shadow-sm" role="alert">';
                echo '<strong>Tudo certo!</strong> ' . $sucesso;
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
        <form method="POST" action="apagar.php">
            <button type="submit" class="btn btn-outline-danger">Excluir Aluno</button>
        </form>
    </div>

    <nav class="text-center mb-3">
        <a href="../CRUD_ALUNO/index.php" class="text-decoration-none fw-bold me-3">Home</a>
        <a href="../CRUD_MATRICULA/formMatricula.php" class="text-decoration-none fw-bold">Matrícula</a>
    </nav>
    
    <hr class="linha-divisoria">
    <p class="text-center rodape">Prof. Sergio Luiz da Silveira</p> 

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>