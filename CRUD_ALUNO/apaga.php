<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar Dados</title>
</head>
<body style="font-family: helvetica;">
<form>
        <p align="center">
            <font size="7" face="Arial">U.C Testes de Sistemas - SENAI SC</font>
        </p>
    </form>
    <h4>
         <font color="red">
            <center>Exclusão de Cadastro</center>
        </font>   
    </h4>

    <hr width="100%" align="center" size="3" color="blue">


<?php

if (isset($_POST["ID"])){
    
    $ID = $_POST["ID"];
    
            $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
            if($conexao->connect_errno){
                $erro = "Ocorreu um erro na conexão com o banco de dados.";
                exit;
            }

            $conexao->set_charset("utf8");

            $sql = "DELETE FROM `aluno` WHERE id='$ID';";
            echo $sql."<br>";

            if($conexao->query($sql)=== TRUE){
                $sucesso = "Deletado com sucesso!";
            } else {
                $erro = "Erro :".$sql."<br>".$conexao->error;
            }
            $conexao->close();
} else {
    $erro = "Campo obrigatório não preenchido";
}


if(isset($erro)) echo '<div style="color:#F00" align="center">'.$erro.'</div><br><br>';

if(isset($sucesso)) echo '<div style="color:#00F" align="center">'.$sucesso.'</div><br><br>';


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
                    <form method="POST" action="procurar.php">
                        <center><input type="submit" value="Consultar Aluno"></center>
                    </form>
                </td>
                <td>
                    <form method="POST" action="atualizar.php">
                        <center><input type="submit" value="Atualizar Dados do  Aluno"></center>
                    </form>
                </td>
            </tr>
        </table><br>
        <nav align="center">
            <a href="index.php">| Home |</a>
            <a href="CRUD_MATRICULA/formMatricula.php"> Matricula |</a>
        </nav>
        <hr>
        <p align="center">Prof. Sergio Luiz da Silveira</p> 
    
</body>
</html>