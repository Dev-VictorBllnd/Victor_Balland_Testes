<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Cadastro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container painel-principal">

    <div class="text-center cabecalho mb-4">
        <h1>U.C Testes de Sistemas - SENAI SC</h1>
        <h4 class="text-success">Resultado do Cadastro</h4>
    </div>

    <hr class="linha-divisoria">

    <div class="row justify-content-center my-5">
        <div class="col-md-6 text-center">

            <?php
            if (isset($_POST["Nome"]) && isset($_POST["DataNasc"]) && isset($_POST["NomePai"]) && isset($_POST["NomeMae"]) && isset($_POST["Telefone"]) && isset($_POST["Email"]) && isset($_POST["Sexo"]) && $_POST["Bairro"] != ''){
                
                $nome = $_POST["Nome"];
                $datanasci = $_POST["DataNasc"];
                $nomepai = $_POST["NomePai"];
                $nomemae = $_POST["NomeMae"];
                $telefone = $_POST["Telefone"];
                $email = $_POST["Email"];
                $sexo = $_POST["Sexo"];
                $bairro = $_POST["Bairro"];

                if(strlen($datanasci) < 10){
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

                        // Muito bem por usar prepared statements! É muito mais seguro.
                        $stmt = $conexao->prepare("INSERT INTO `aluno`(`nome`,`dataNascimento`,`nomePai`,`nomeMae`,`telefone`,`email`,`sexo`,`bairro`) VALUES(?,?,?,?,?,?,?,?)");
                        $stmt->bind_param('ssssssss', $nome, $datanasci, $nomepai, $nomemae, $telefone, $email, $sexo, $bairro);

                        if(!$stmt->execute()){
                            $erro = "Erro no banco de dados: " . $stmt->error;
                        } else {
                            $sucesso = "Dados cadastrados com sucesso!";
                        }
                    }
                }
            } else {
                $erro = "Algum campo obrigatório não foi preenchido.";
            }

            // 3. Alertas Modernos (Substituindo os antigos <div style="color:#F00">)
            if(isset($erro)) {
                echo '<div class="alert alert-danger fs-5 shadow-sm" role="alert">';
                echo '<strong>Atenção!</strong> ' . $erro;
                echo '</div>';
            }

            if(isset($sucesso)) {
                echo '<div class="alert alert-success fs-5 shadow-sm" role="alert">';
                echo '<strong>Muito bem!</strong> ' . $sucesso;
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