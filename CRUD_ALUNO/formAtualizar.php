<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar</title>
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
<body style="font-family: helvetica;">
    
        <form>
            <p align="center">
                <font size="7" face="Arial">U.C Testes de Sistemas - SENAI SC</font>
            </p>
        </form>
        <h4>
            <font color="green">
                <center>Formulário de Alteração de Dados do Aluno</center></font>
        </h4>

        <hr width="100%" align="center" size="3" color="blue"> <br>

        <?php 

        if(empty($_POST["ID"])){
            echo "Por favor preencher o campo ID";
        } else {
            $ID = $_POST["ID"];
            $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
            if($conexao->connect_errno){
                $erro = "Ocorreu um erro na conexão com o banco de dados.";
                exit;
            }
            $conexao->set_charset("utf8");

            $sql = "SELECT * FROM `aluno` WHERE id ='$ID'";
            echo $sql."<br><br>";
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
                    echo "ID não encontrado.<br><br>";
                } 
            } else {
                echo "Erro em ".$sql."<br>".$conexao->error;
            }
            $conexao->close();
        }   
?>

        <form method="POST" action="atualiza.php" align="center">
            <table width="500" border="0" cellspacing="0" cellspading="0" align="center">
                <input type="hidden" name="ID" value="<?=$ID?>">
                <tr>
                    <td align="left">Nome do Aluno(a):</td>
                    <td><input type="text" size="30" name="Nome" value="<?=$nome?>"></td>
                </tr>
                <tr>
                    <td align="left">Data de Nascimento:</td>
                    <td><input type="text" size="30" name="DataNasc" placeholder="aaaa/mm/dd" maxlength="10" value="<?=$dataNasc?>" onkeydown="javascript:fMasc(this,mData)"></td>
                </tr>
                <tr>
                    <td align="left">Nome do Pai:</td>
                    <td><input type="text" size="30" name="NomePai" value="<?=$nomePai?>"></td>
                </tr>
                <tr>
                    <td align="left">Nome da Mãe:</td>
                    <td><input type="text" size="30" name="NomeMae" value="<?=$nomeMae?>"></td>
                </tr>
                <tr>
                    <td align="left">Telefone:</td>
                    <td><input type="text" size="30" name="Telefone" maxlength="14" value="<?=$telefone?>" onkeydown="javascript:fMasc(this,mTel);"></td>
                </tr>
                <tr>
                    <td align="left">E-Mail</td>
                    <td><input type="text" size="30" name="Email" value="<?=$email?>"></td>
                </tr>
                <tr>
                    <td align="left">Sexo</td>
                    <td><input type="radio" name="Sexo" value="Masculino" <?php echo($sexo == 'Masculino') ? "checked" : ""; ?>>Masculino
                    <input type="radio" name="Sexo" value="Feminino" <?php echo($sexo == 'Feminino') ? "checked" : ""; ?>>Feminino</td>
                </tr>
                <tr>
                    <td align="left">Bairro</td>
                    <td>
                        <select name="Bairro" size="1">
                            <option></option>
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
                    </td>
                </tr>
            </table><br>
            <center>  
                <input type="submit" value="Atualizar Dados">
                <input type="reset" value="Limpar Dados">
            </center>
        </form>
        
        <hr width="100%" align="center" size="3" color="blue">
        <table width="400" border="0" cellspacing="0" cellspading="0" align="center">
            <tr>
                <td>
                    <form method="POST" action="listar.php">
                        <center><input type="submit" value="Listar Alunos"></center>
                    </form>
                </td>
                <td>
                    <form method="POST" action="procurar.php">
                        <center><input type="submit" value="Consultar Aluno"></center>
                    </form>
                </td>
                <td>
                    <form method="POST" action="atualizar.php">
                        <center><input type="submit" value="Atualizar Dados do  Aluno"></center>
                    </form>
                </td>
                <td>
                    <form method="POST" action="apagar.php">
                        <center><input type="submit" value="Excluir Dados do  Aluno"></center>
                    </form>
                </td>
            </tr>
        </table><br>
        <nav align="center">
            <a href="index.php">| Home |</a>
            <a href="formMatricula.php"> Matricula |</a>
        </nav>
        <hr>
        <p align="center">Prof. Sergio Luiz da Silveira</p> 
</body>
</html>