<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Alunos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    
</head>
<body>

    <div class="container painel-principal">

        <div class="text-center cabecalho mb-4">
            <h1>U.C Testes de Sistemas - SENAI SC</h1>
            <h4 class="text-success">Listagem de Alunos</h4>
        </div>

        <hr class="linha-divisoria">
        
        <?php
            $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
            if($conexao->connect_errno){
                $erro = "Ocorreu um erro na conexão com o banco de dados.";
                exit;
            }

            $conexao->set_charset("utf8");

            $sql = "SELECT * FROM `aluno`;";
            $result = $conexao->query($sql);

            if($result->num_rows > 0){
                echo '<div class="table-responsive">';
                echo '<table class="table table-bordered table-striped table-hover">';
                
                
                echo '<thead class="table-primary">';
                echo '<tr>';
                echo '<th>Id</th>';
                echo '<th>Nome</th>';
                echo '<th>Data Nasc.</th>';
                echo '<th>Pai</th>';
                echo '<th>Mãe</th>';
                echo '<th>Telefone</th>';
                echo '<th>Email</th>';
                echo '<th>Sexo</th>';
                echo '<th>Bairro</th>';
                echo '</tr>';
                echo '</thead>';


                echo '<tbody>';

                while($linha = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" . $linha["id"] . "</td>";
                    echo "<td>" . $linha["nome"] . "</td>";
                    echo "<td>" . $linha["dataNascimento"] . "</td>";
                    echo "<td>" . $linha["nomePai"] . "</td>";
                    echo "<td>" . $linha["nomeMae"] . "</td>";
                    echo "<td>" . $linha["telefone"] . "</td>";
                    echo "<td>" . $linha["email"] . "</td>";
                    echo "<td>" . $linha["sexo"] . "</td>";
                    echo "<td>" . $linha["bairro"] . "</td>";
                    echo "</tr>";
                }

                
                echo '</tbody>';
                echo '</table>';
                echo '</div>'; 
            } else {
                echo '<div class="alert alert-warning text-center" role="alert">';
                echo 'Nenhum aluno encontrado no banco de dados.';
                echo '</div>';
            }

            $conexao->close();
        ?>

        <hr class="linha-divisoria">

        <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
            <form method="POST" action="formAluno.php">
                <button type="submit" class="btn btn-outline-success">Registrar Novo Aluno</button>
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
            <a href="formMatricula.php" class="text-decoration-none fw-bold">Matrícula</a>
        </nav>

        <hr class="linha-divisoria">
        <p class="text-center rodape">Prof. Sergio Luiz da Silveira</p> 

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>