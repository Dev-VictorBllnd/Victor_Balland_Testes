<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar Aluno</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container painel-principal">

    <div class="text-center cabecalho mb-4">
        <h1>U.C Testes de Sistemas - SENAI SC</h1>
        <h4 class="text-danger">Apagar o Aluno</h4> </div>

    <hr class="linha-divisoria"> 

    <div class="row justify-content-center my-4">
        <div class="col-12">
            <?php
                // Variáveis padrão vazias e flag de controle
                $ID = $nome = $dataNasc = $nomePai = $nomeMae = $telefone = $email = $sexo = $bairro = "";
                $alunoEncontrado = false;

                if(empty($_POST["ID"])){
                    echo '<div class="alert alert-warning text-center w-75 mx-auto fs-5"><strong>Atenção!</strong> Por favor, preencha o campo ID na tela de busca.</div>';
                } else {
                    $ID = $_POST["ID"];
                    $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
                    
                    if($conexao->connect_errno){
                        echo '<div class="alert alert-danger text-center w-75 mx-auto fs-5">Ocorreu um erro na conexão com o banco de dados.</div>';
                    } else {
                        $conexao->set_charset("utf8");

                        $sql = "SELECT * FROM aluno WHERE id='$ID'";
                        
                        // Debug discreto
                        echo '<p class="text-muted text-center small font-monospace mb-4">DEBUG SQL: ' . $sql . '</p>';

                        $result = $conexao->query($sql);

                        if($result){
                            if($result->num_rows > 0){
                                while($linha = $result->fetch_assoc()){
                                    $ID = $linha["id"];
                                    $nome = $linha["nome"];
                                    $dataNasc = $linha["dataNascimento"];
                                    $nomePai = $linha["nomePai"];
                                    $nomeMae =  $linha["nomeMae"];
                                    $telefone = $linha["telefone"];
                                    $email = $linha["email"];
                                    $sexo = $linha["sexo"];
                                    $bairro = $linha["bairro"];
                                }
                                $alunoEncontrado = true; // Achou o aluno, podemos mostrar o formulário!
                            } else {
                                echo '<div class="alert alert-danger text-center w-75 mx-auto fs-5"><strong>Erro:</strong> ID não encontrado.</div>';
                            } 
                        } else {
                            echo '<div class="alert alert-danger text-center w-75 mx-auto fs-5">Erro em '.$sql.'<br>'.$conexao->error.'</div>';
                        }
                        $conexao->close();
                    }
                }  
            ?> 
        </div>
    </div>

    <?php if($alunoEncontrado): ?>
        <form method="POST" action="apaga.php">
            
            <input type="hidden" name="ID" value="<?=$ID?>">

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Nome do Aluno(a):</label>
                    <input type="text" class="form-control bg-light" name="Nome" value="<?=$nome?>" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Data de Nascimento:</label>
                    <input type="text" class="form-control bg-light" name="DataNasc" value="<?=$dataNasc?>" disabled>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Nome do Pai:</label>
                    <input type="text" class="form-control bg-light" name="NomePai" value="<?=$nomePai?>" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nome da Mãe:</label>
                    <input type="text" class="form-control bg-light" name="NomeMae" value="<?=$nomeMae?>" disabled>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Telefone:</label>
                    <input type="text" class="form-control bg-light" name="Telefone" value="<?=$telefone?>" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">E-Mail:</label>
                    <input type="text" class="form-control bg-light" name="Email" value="<?=$email?>" disabled>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="form-label">Sexo:</label>
                    <input type="text" class="form-control bg-light" value="<?=$sexo?>" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Bairro:</label>
                    <input type="text" class="form-control bg-light" value="<?=$bairro?>" disabled>
                </div>
            </div>

            <div class="text-center mt-5 p-4 border border-danger rounded bg-white shadow-sm">
                <h5 class="text-danger mb-3 fw-bold">Tem certeza que deseja deletar este aluno(a)?</h5>
                <p class="text-muted mb-4">Esta ação não poderá ser desfeita.</p>
                <button type="submit" class="btn btn-danger btn-lg px-5">Deletar Aluno(a)</button>
            </div>
        </form>
    <?php endif; ?>

    <hr class="linha-divisoria mt-5">

    <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
        <form method="POST" action="formAluno.php">
            <button type="submit" class="btn btn-outline-success">Registrar Novo Aluno</button>
        </form>
        <form method="POST" action="listar.php">
            <button type="submit" class="btn btn-outline-primary">Listar Alunos</button>
        </form>
        <form method="POST" action="atualizar.php">
            <button type="submit" class="btn btn-outline-warning">Atualizar Dados</button>
        </form>
        <form method="POST" action="procurar.php">
            <button type="submit" class="btn btn-outline-info">Consultar Aluno</button>
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