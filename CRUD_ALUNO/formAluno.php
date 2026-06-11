<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Aluno</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container painel-principal">

        <div class="text-center cabecalho mb-4">
            <h1>U.C Testes de Sistemas - SENAI SC</h1>
            <h4 class="text-success">Formulário de Cadastro do Aluno</h4>
        </div>
        
        <hr class="linha-divisoria"> 

        <h2 class="text-center mb-4">Dados Pessoais</h2>

        <form method="POST" action="cadastro.php">
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="iNome" class="form-label">Nome do Aluno(a):</label>
                    <input id="iNome" type="text" class="form-control" name="Nome">
                </div>
                <div class="col-md-6">
                    <label for="iDataNasc" class="form-label">Data de Nascimento:</label>
                    <input id="iDataNasc" type="text" class="form-control" name="DataNasc" placeholder="aaaa/mm/dd" maxlength="10" onkeydown="javascript:fMasc(this,mData)">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="iNomePai" class="form-label">Nome do Pai:</label>
                    <input id="iNomePai" type="text" class="form-control" name="NomePai">
                </div>
                <div class="col-md-6">
                    <label for="iNomeMae" class="form-label">Nome da Mãe:</label>
                    <input id="iNomeMae" type="text" class="form-control" name="NomeMae">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="iTelefone" class="form-label">Telefone:</label>
                    <input id="iTelefone" type="text" class="form-control" name="Telefone" maxlength="14" onkeydown="javascript:fMasc(this,mTel);">   
                </div>
                <div class="col-md-6">
                    <label for="iEmail" class="form-label">E-Mail:</label>
                    <input id="iEmail" type="email" class="form-control" name="Email">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="form-label">Sexo:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Sexo" id="sexoM" value="Masculino">
                        <label class="form-check-label" for="sexoM">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Sexo" id="sexoF" value="Feminino">
                        <label class="form-check-label" for="sexoF">Feminino</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputBairro" class="form-label">Bairro:</label>
                    <select id="inputBairro" class="form-select" name="Bairro">
                        <option selected disabled>Selecione...</option>
                        <option>Agua Verde</option>
                        <option>Alto da XV</option>
                        <option>Batel</option>
                        <option>Cajuru</option>
                        <option>Centro Civico</option>
                        <option>Ecoville</option>
                        <option>Hauer</option>
                        <option>Jardim Botanico</option>
                        <option>Jardim das Americas</option>
                        <option>Portão</option>
                        <option>Santa Candida</option>
                        <option>Sitio Cercado</option>
                        <option>Xaxim</option>
                        <option>Boqueirão</option>
                        <option>CIC</option>
                    </select>
                </div>
            </div>

            <div class="text-center mb-4">
                <button type="reset" class="btn btn-secondary me-2">Limpar Dados</button>
                <button type="submit" class="btn btn-success">Cadastrar Aluno</button>
            </div>
        </form>

        <hr class="linha-divisoria">

        <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
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