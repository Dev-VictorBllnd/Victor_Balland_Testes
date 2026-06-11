<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container painel-principal mt-4">

    <div class="text-center cabecalho mb-4">
        <h1>U.C Testes de Sistemas - SENAI SC</h1>
        <h4 class="text-success">Formulário de Alteração de Dados de Matricula</h4>
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

                    $sql = "SELECT * FROM `matricula` WHERE id ='$ID'";
                    
                    // Exibição do debug do SQL de forma discreta
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

    <form method="POST" action="atualizaMatricula.php" class="row justify-content-center mb-5">
        
        <input type="hidden" name="ID" value="<?=@$ID?>">
        
        <div class="col-md-6 bg-light p-4 rounded shadow-sm border">
            
            <div class="mb-3 row align-items-center">
                <label class="col-sm-4 col-form-label fw-bold text-end">Nivel da Matricula:</label>
                <div class="col-sm-8">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nivel" value="Integrado" id="nivelIntegrado" <?php echo(@$nivel == 'Integrado') ? "checked" : ""; ?>>
                        <label class="form-check-label" for="nivelIntegrado">Integrado</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nivel" value="Sub-Seq" id="nivelSubSeq" <?php echo(@$nivel == 'Sub-Seq') ? "checked" : ""; ?>>
                        <label class="form-check-label" for="nivelSubSeq">Sub-Seq</label>
                    </div>
                </div>
            </div>

            <div class="mb-3 row align-items-center">
                <label class="col-sm-4 col-form-label fw-bold text-end">Turno:</label>
                <div class="col-sm-8">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="turno" value="Manha" id="turnoManha" <?php echo(@$turno == 'Manha') ? "checked" : ""; ?>>
                        <label class="form-check-label" for="turnoManha">Manhã</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="turno" value="Tarde" id="turnoTarde" <?php echo(@$turno == 'Tarde') ? "checked" : ""; ?>>
                        <label class="form-check-label" for="turnoTarde">Tarde</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="turno" value="Noite" id="turnoNoite" <?php echo(@$turno == 'Noite') ? "checked" : ""; ?>>
                        <label class="form-check-label" for="turnoNoite">Noite</label>
                    </div>
                </div>
            </div>

            <div class="mb-3 row align-items-center">
                <label class="col-sm-4 col-form-label fw-bold text-end">Série:</label>
                <div class="col-sm-8">
                    <select name="serie" class="form-select">
                        <option value=""></option>
                        <option value="1°" <?php echo(@$serie == '1°') ? "selected" : ""; ?>>1°</option>
                        <option value="2°" <?php echo(@$serie == '2°') ? "selected" : ""; ?>>2°</option>
                        <option value="3°" <?php echo(@$serie == '3°') ? "selected" : ""; ?>>3°</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row align-items-center">
                <label class="col-sm-4 col-form-label fw-bold text-end">Curso Extra:</label>
                <div class="col-sm-8">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="cursoExtra" value="Musica" id="cursoMusica" <?php echo(@$cursoExtra == 'Musica') ? "checked" : ""; ?>>
                        <label class="form-check-label" for="cursoMusica">Música</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="cursoExtra" value="Judo" id="cursoJudo" <?php echo(@$cursoExtra == 'Judo') ? "checked" : ""; ?>>
                        <label class="form-check-label" for="cursoJudo">Judô</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="cursoExtra" value="Balet" id="cursoBalet" <?php echo(@$cursoExtra == 'Balet') ? "checked" : ""; ?>>
                        <label class="form-check-label" for="cursoBalet">Balé</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="cursoExtra" value="Pintura" id="cursoPintura" <?php echo(@$cursoExtra == 'Pintura') ? "checked" : ""; ?>>
                        <label class="form-check-label" for="cursoPintura">Pintura</label>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-success me-2 px-4 fw-bold">Atualizar Dados</button>
            <button type="reset" class="btn btn-secondary px-4">Limpar Dados</button>
        </div>

    </form>
        
    <hr class="linha-divisoria w-75 mx-auto">

    <div class="d-flex flex-wrap justify-content-center gap-3 mb-4 mt-4">
        <form method="POST" action="listarMatricula.php">
            <button type="submit" class="btn btn-outline-primary">Listar Matriculas</button>
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