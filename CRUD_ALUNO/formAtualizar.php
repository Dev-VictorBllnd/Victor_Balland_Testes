<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Aluno</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <script>
        function fMasc(objeto,mascara){
            obj=objeto;
            masc=mascara;
            setTimeout("fMascEx()",1);
        }
        function fMascEx(){
            obj.value=masc(obj.value);
        }
        function mData(cpf){
            cpf=cpf.replace(/\D/g,"");
            cpf=cpf.replace(/(\d{6})(\d)/,"$1/$2");
            cpf=cpf.replace(/(\d{4})(\d)/,"$1/$2");
            return cpf;
        }
        function mTel(tel){
            tel=tel.replace(/\D/g,"");
            tel=tel.replace(/^(\d)/,"($1");
            tel=tel.replace(/(.{3})(\d)/,"$1)$2");
            if (tel.length == 9) {
                tel=tel.replace(/(.{1})$/,"-$1");
            }else if (tel.length == 10) {
                tel=tel.replace(/(.{2})$/,"-$1");
            }else if (tel.length == 11) {
                tel=tel.replace(/(.{3})$/,"-$1");
            }else if (tel.length >= 12) {
                tel=tel.replace(/(.{4})$/,"-$1");
            }
            return tel;
        }
    </script>
</head>
<body>   
<div class="container painel-principal">

    <div class="text-center cabecalho mb-4">
        <h1>U.C Testes de Sistemas - SENAI SC</h1>
        <h4 class="text-success">Formulário de Atualização do Aluno</h4>
    </div>

    <hr class="linha-divisoria"> 

    <?php 
        // Variáveis vazias por padrão para evitar erros se não achar o ID
        $ID = $nome = $dataNasc = $nomePai = $nomeMae = $telefone = $email = $sexo = $bairro = "";

        if(empty($_POST["ID"])){
            echo '<div class="alert alert-warning text-center">Por favor, preencha o campo ID na tela de busca.</div>';
        } else {
            $ID = $_POST["ID"];
            $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
            if($conexao->connect_errno){
                $erro = "Ocorreu um erro na conexão com o banco de dados.";
                exit;
            }
            $conexao->set_charset("utf8");

            $sql = "SELECT * FROM `aluno` WHERE id ='$ID'";
            $result = $conexao->query($sql);

            if($result){
                if($result->num_rows>0){
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
                } else {
                    echo '<div class="alert alert-danger text-center">ID não encontrado.</div>';
                } 
            } else {
                echo "Erro em ".$sql."<br>".$conexao->error;
            }
            $conexao->close();
        }   
    ?>

    <form method="POST" action="atualiza.php">
        
        <input type="hidden" name="ID" value="<?=$ID?>">

        <div class="row mb-3 mt-4">
            <div class="col-md-6">
                <label for="iNome" class="form-label">Nome do Aluno(a):</label>
                <input id="iNome" type="text" class="form-control" name="Nome" value="<?=$nome?>">
            </div>
            <div class="col-md-6">
                <label for="iDataNasc" class="form-label">Data de Nascimento:</label>
                <input id="iDataNasc" type="text" class="form-control" name="DataNasc" placeholder="aaaa/mm/dd" maxlength="10" value="<?=$dataNasc?>" onkeydown="javascript:fMasc(this,mData)">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="iNomePai" class="form-label">Nome do Pai:</label>
                <input id="iNomePai" type="text" class="form-control" name="NomePai" value="<?=$nomePai?>">
            </div>
            <div class="col-md-6">
                <label for="iNomeMae" class="form-label">Nome da Mãe:</label>
                <input id="iNomeMae" type="text" class="form-control" name="NomeMae" value="<?=$nomeMae?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="iTelefone" class="form-label">Telefone:</label>
                <input id="iTelefone" type="text" class="form-control" name="Telefone" maxlength="14" value="<?=$telefone?>" onkeydown="javascript:fMasc(this,mTel);">   
            </div>
            <div class="col-md-6">
                <label for="iEmail" class="form-label">E-Mail:</label>
                <input id="iEmail" type="email" class="form-control" name="Email" value="<?=$email?>">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label">Sexo:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Sexo" id="sexoM" value="Masculino" <?php echo($sexo == 'Masculino') ? "checked" : ""; ?>>
                    <label class="form-check-label" for="sexoM">Masculino</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Sexo" id="sexoF" value="Feminino" <?php echo($sexo == 'Feminino') ? "checked" : ""; ?>>
                    <label class="form-check-label" for="sexoF">Feminino</label>
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputBairro" class="form-label">Bairro:</label>
                <select id="inputBairro" class="form-select" name="Bairro">
                    <option disabled <?php echo(empty($bairro)) ? "selected" : ""; ?>>Selecione...</option>
                    <option <?php echo($bairro == 'Agua Verde') ? "selected" : ""; ?>>Agua Verde</option>
                    <option <?php echo($bairro == 'Alto da XV') ? "selected" : ""; ?>>Alto da XV</option>
                    <option <?php echo($bairro == 'Batel') ? "selected" : ""; ?>>Batel</option>
                    <option <?php echo($bairro == 'Cajuru') ? "selected" : ""; ?>>Cajuru</option>
                    <option <?php echo($bairro == 'Centro Civico') ? "selected" : ""; ?>>Centro Civico</option>
                    <option <?php echo($bairro == 'Ecoville') ? "selected" : ""; ?>>Ecoville</option>
                    <option <?php echo($bairro == 'Hauer') ? "selected" : ""; ?>>Hauer</option>
                    <option <?php echo($bairro == 'Jardim Botanico') ? "selected" : ""; ?>>Jardim Botanico</option>
                    <option <?php echo($bairro == 'Jardim das Americas') ? "selected" : ""; ?>>Jardim das Americas</option>
                    <option <?php echo($bairro == 'Portão') ? "selected" : ""; ?>>Portão</option>
                    <option <?php echo($bairro == 'Santa Candida') ? "selected" : ""; ?>>Santa Candida</option>
                    <option <?php echo($bairro == 'Sitio Cercado') ? "selected" : ""; ?>>Sitio Cercado</option>
                    <option <?php echo($bairro == 'Xaxim') ? "selected" : ""; ?>>Xaxim</option>
                    <option <?php echo($bairro == 'Boqueirão') ? "selected" : ""; ?>>Boqueirão</option>
                    <option <?php echo($bairro == 'CIC') ? "selected" : ""; ?>>CIC</option>
                </select>
            </div>
        </div>

        <div class="text-center mb-4">
            <button type="reset" class="btn btn-secondary me-2 px-4">Limpar Dados</button>
            <button type="submit" class="btn btn-success px-4">Atualizar Dados</button>
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