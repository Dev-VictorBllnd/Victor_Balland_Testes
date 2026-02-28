<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>
<body style="font-family: helvetica;">
        <p align="center">
            <font size="7" face="Arial">U.C Testes de Sistemas - SENAI SC</font>
        </p>
    <h4>
        <font color="red">
            <center>Dados do Aluno</center>
        </font>   
    </h4>

    <hr width="100%" align="center" size="3" color="blue"> 

<?php
    if(empty($_POST["Nome"])){
        echo "Por favor preencher o campo do Nome";
    } else {
        $nome = $_POST["Nome"];
        $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
        if($conexao->connect_errno){
            $erro = "Ocorreu um erro na conexão com o banco de dados.";
            exit;
        }
        $conexao->set_charset("utf8");

        $sql = "SELECT id,nome,dataNascimento,nomePai,nomeMae,telefone,email,sexo,bairro FROM aluno WHERE nome LIKE '%$nome%'";
        echo $sql."<hr>";

        $result = $conexao->query($sql);

        if($result->num_rows > 0){
            while($linha = $result->fetch_assoc()){
                echo "Id: ".$linha["id"]."<br>";
                echo "Nome: ".$linha["nome"]."<br>";
                echo "Data de Nascimento: ".$linha["dataNascimento"]."<br>";
                echo "Nome do Pai: ".$linha["nomePai"]."<br>";
                echo "Nome da Mãe: ".$linha["nomeMae"]."<br>";
                echo "Telefone: ".$linha["telefone"]."<br>";
                echo "Email: ".$linha["email"]."<br>";
                echo "Sexo: ".$linha["sexo"]."<br>";
                echo "Bairro: ".$linha["bairro"]."<br><hr>";
            }
        } else {
            echo "Sem resultado <br>";
        }
        $conexao->close();
    }
?>  


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