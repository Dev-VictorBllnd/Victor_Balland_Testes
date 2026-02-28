<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar</title>
</head>
<body style="font-family: helvetica;">
        <p align="center">
            <font size="7" face="Arial">U.C Testes de Sistemas - SENAI SC</font>
        </p>
    <h4>
        <font color="red">
            <center>Apagar o Aluno</center>
        </font>   
    </h4>

    <hr width="100%" align="center" size="3" color="blue"> 

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

        $sql = "SELECT * FROM aluno WHERE id='$ID'";
        echo $sql."<hr>";

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
<br>

<form method="POST" action="apaga.php" align="center">
            <table width="500" border="0" cellspacing="0" cellspading="0" align="center">
                <input type="hidden" name="ID" value="<?=$ID?>">
                <tr>
                    <td align="left">Nome do Aluno(a):</td>
                    <td><input type="text" size="30" name="Nome" value="<?=$nome?>" disabled></td>
                </tr>
                <tr>
                    <td align="left">Data de Nascimento:</td>
                    <td><input type="text" size="30" name="DataNasc" placeholder="aaaa/mm/dd" maxlength="10" value="<?=$dataNasc?>" disabled onkeydown="javascript:fMasc(this,mData)"></td>
                </tr>
                <tr>
                    <td align="left">Nome do Pai:</td>
                    <td><input type="text" size="30" name="NomePai" value="<?=$nomePai?>" disabled></td>
                </tr>
                <tr>
                    <td align="left">Nome da Mãe:</td>
                    <td><input type="text" size="30" name="NomeMae" value="<?=$nomeMae?>" disabled></td>
                </tr>
                <tr>
                    <td align="left">Telefone:</td>
                    <td><input type="text" size="30" name="Telefone" maxlength="14" value="<?=$telefone?>" onkeydown="javascript:fMasc(this,mTel);" disabled></td>
                </tr>
                <tr>
                    <td align="left">E-Mail</td>
                    <td><input type="text" size="30" name="Email" value="<?=$email?>" disabled></td>
                </tr>
                <tr>
                    <td align="left">Sexo</td>
                    <td>
                        <input type="text" size="30" value="<?=$sexo?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td align="left">Bairro</td>
                    <td>
                        <input type="text" size="30" value="<?=$bairro?>" disabled>
                    </td>
                </tr>
            </table><br>
            <center>  
                Tem certeza que deseja deletar este aluno(a)? <br>
                <input type="submit" value="Deletar Aluno(a)">
            </center>
        </form>


<hr width="100%" align="center" size="3" color="blue">
        <table width="400" border="0" cellspacing="0" cellspading="0" align="center">
            <tr>
            <td>
                    <form method="POST" action="formAluno.php">
                        <center><input type="submit" value="Registrar Novo Aluno"></center>
                    </form>
                </td>
                <td>
                    <form method="POST" action="listar.php">
                        <center><input type="submit" value="Listar Alunos"></center>
                    </form>
                </td>
                <td>
                    <form method="POST" action="atualizar.php">
                        <center><input type="submit" value="Atualizar Dados do  Aluno"></center>
                    </form>
                </td>
                <td>
                    <form method="POST" action="procurar.php">
                        <center><input type="submit" value="Consultar Aluno"></center>
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