<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container painel-principal mt-4">

    <div class="text-center cabecalho mb-4">
        <h1>U.C Testes de Sistemas - SENAI SC</h1>
        <h4 class="text-danger">Apagar a Matricula</h4>
    </div>

    <hr class="linha-divisoria">

    <div class="row justify-content-center mb-4">
        <div class="col-md-8 text-center">
            <?php
                // Lógica original mantida intacta
                if(empty($_POST["ID"])){
                    echo '<div class="alert alert-warning shadow-sm">Por favor preencher o campo ID</div>';
                } else {
                    $ID = $_POST["ID"];
                    $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
                    if($conexao->connect_errno){
                        echo '<div class="alert alert-danger shadow-sm">Ocorreu um erro na conexão com o banco de dados.</div>';
                        exit;
                    }
                    $conexao->set_charset("utf8");

                    $sql = "SELECT * FROM matricula WHERE id='$ID'";
                    
                    // Exibição do debug do SQL de forma mais sutil
                    echo '<p class="text-muted small font-monospace mb-3">DEBUG SQL: ' . $sql . '</p>';

                    $result = $conexao->query($sql);

                    if($result){
                        if($result->num_rows>0){
                            while($linha = $result->fetch_assoc()){
                                $ID = $linha["id"];
                                $nivel = $linha["nivel"];
                                $turno = $linha["turno"];
                                $serie = $linha["serie"];
                                $cursoExtra =  $linha["cursoExtra"];
                            } 
                        } else {
                            echo '<div class="alert alert-info shadow-sm">ID não encontrado.</div>';
                        } 
                    } else {
                        echo '<div class="alert alert-danger shadow-sm">Erro em '.$sql.'<br>'.$conexao->error.'</div>';
                    }
                    $conexao->close();
                }  
            ?> 
        </div>
    </div>

    <form method="POST" action="apagaMatricula.php" class="row justify-content-center mb-5">
        
        <input type="hidden" name="ID" value="<?=@$ID?>">
        
        <div class="col-md-6 bg-light p-4 rounded shadow-sm border">
            
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label fw-bold text-end">ID da Matricula:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="ID" value="<?=@$ID?>" disabled>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label fw-bold text-end">Nivel da Matricula:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="nivel" maxlength="10" value="<?=@$nivel?>" disabled>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label fw-bold text-end">Turno:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="turno" value="<?=@$turno?>" disabled>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label fw-bold text-end">Série:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="serie" value="<?=@$serie?>" disabled>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label fw-bold text-end">Curso Extra:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="cursoExtra" maxlength="20" value="<?=@$cursoExtra?>" disabled>
                </div>
            </div>

        </div>

        <div class="col-12 text-center mt-5">
            <div class="alert alert-danger d-inline-block px-5 py-4 border-danger shadow-sm">
                <h3 class="text-danger mb-4 fw-bold">Tem certeza que deseja deletar esta Matricula?</h3>
                <button type="submit" class="btn btn-danger btn-lg px-5 fw-bold">DELETAR MATRICULA</button>
            </div>
        </div>

    </form>

    <hr class="linha-divisoria w-75 mx-auto">

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
        <form method="POST" action="procurarMatricula.php">
            <button type="submit" class="btn btn-outline-info">Consultar Matricula</button>
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