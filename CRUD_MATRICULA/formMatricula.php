<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Matricula</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container painel-principal mt-4">

    <div class="text-center cabecalho mb-4">
        <h1>U.C Teste de Sistemas - U.C Testes de Sistemas - SENAI SC</h1>
        <h4 class="text-danger fw-bold">Formulário de Cadastro do Aluno</h4>
    </div>

    <hr class="linha-divisoria">
    
    <h2 class="text-center mb-4 display-6">Dados Pessoais</h2>

    <form method="POST" action="cadastroMatricula.php" class="bg-light p-4 rounded shadow-sm border mb-5">
        <div class="row g-4 text-start">
            
            <div class="col-md-3">
                <h5 class="fw-bold border-bottom pb-2">Nível</h5>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="nivel" value="Integrado" id="nivelIntegrado">
                    <label class="form-check-label" for="nivelIntegrado">Integrado</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="nivel" value="Sub-Seq" id="nivelSubSeq">
                    <label class="form-check-label" for="nivelSubSeq">Sub-Seq</label>
                </div>
            </div>

            <div class="col-md-3">
                <h5 class="fw-bold border-bottom pb-2">Turno</h5>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="turno" value="Manha" id="turnoManha">
                    <label class="form-check-label" for="turnoManha">Manhã</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="turno" value="Tarde" id="turnoTarde">
                    <label class="form-check-label" for="turnoTarde">Tarde</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="turno" value="Noite" id="turnoNoite">
                    <label class="form-check-label" for="turnoNoite">Noite</label>
                </div>
            </div>

            <div class="col-md-3">
                <h5 class="fw-bold border-bottom pb-2">Série</h5>
                <select name="serie" class="form-select mt-2">
                    <option value="" selected disabled>Selecione...</option>
                    <option value="1°">1°</option>
                    <option value="2°">2°</option>
                    <option value="3°">3°</option>
                </select>
            </div>

            <div class="col-md-3">
                <h5 class="fw-bold border-bottom pb-2">Cursos Extra Curriculares <span class="text-danger">*</span></h5>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="extraCurso" value="Musica" id="cursoMusica">
                    <label class="form-check-label" for="cursoMusica">Música</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="extraCurso" value="Judo" id="cursoJudo">
                    <label class="form-check-label" for="cursoJudo">Judô</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="extraCurso" value="Balet" id="cursoBalet">
                    <label class="form-check-label" for="cursoBalet">Balé</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="extraCurso" value="Pintura" id="cursoPintura">
                    <label class="form-check-label" for="cursoPintura">Pintura</label>
                </div>
                <small class="text-muted d-block mt-3 fw-bold"><span class="text-danger">*</span> Escolha apenas uma opção</small>
            </div>

        </div>

        <div class="text-center mt-4 pt-3 border-top">
            <button type="submit" class="btn btn-success btn-lg me-2 px-4 fw-bold">Cadastrar Matricula</button>
            <button type="reset" class="btn btn-secondary btn-lg px-4">Limpar Dados</button>
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
            <button type="submit" class="btn btn-outline-warning">Atualizar Dados da Matricula</button>
        </form>
        <form method="POST" action="apagarMatricula.php">
            <button type="submit" class="btn btn-outline-danger">Excluir Dados da Matricula</button>
        </form>
    </div>

    <nav class="text-center mb-3">
        <a href="../CRUD_ALUNO/index.php" class="text-decoration-none fw-bold me-3">Home</a>
        <a href="../CRUD_ALUNO/formAluno.php" class="text-decoration-none fw-bold">Aluno</a>
    </nav>
    
    <hr class="linha-divisoria">
    <p class="text-center rodape">Prof. Sergio Luiz da Silveira</p>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>