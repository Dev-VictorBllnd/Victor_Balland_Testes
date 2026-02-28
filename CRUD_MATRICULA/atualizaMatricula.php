<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualiza Dados</title>
</head>
<body style="font-family: helvetica;">
    <form>
        <p align="center">
            <font size="7" face="Arial">U.C Testes de Sistemas - SENAI SC</font>
        </p>
    </form>
    <h4>
         <font color="red">
            <center>Alteração de Dados do Cadastro de Matricula</center>
        </font>   
    </h4>

    <hr width="100%" align="center" size="3" color="blue">


<?php

if (isset($_POST["ID"]) && isset($_POST["nivel"]) && isset($_POST["turno"]) && isset($_POST["serie"]) && isset($_POST["cursoExtra"]) != ''){
    
    $ID = $_POST["ID"];
    $nivel = $_POST["nivel"];
    $turno = $_POST["turno"];
    $serie = $_POST["serie"];
    $cursoExtra = $_POST["cursoExtra"];

            $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
            if($conexao->connect_errno){
                $erro = "Ocorreu um erro na conexão com o banco de dados.";
                exit;
            }
            $conexao->set_charset("utf8");

            $sql = "UPDATE `matricula` SET id = $ID, nivel = '$nivel', turno = '$turno', serie = '$serie', cursoExtra = '$cursoExtra' WHERE id='$ID'; ";

            echo $sql."<br><br>";

            
            if($conexao->query($sql)=== TRUE){
                $sucesso = "Dados alterados com sucesso!";
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
                    <form method="POST" action="formMatricula.php">
                        <center><input type="submit" value="Registrar Nova Matricula"></center>
                    </form>
                </td>
                <td>
                    <form method="POST" action="listarMatricula.php">
                        <center><input type="submit" value="Listar Matriculas"></center>
                    </form>
                </td>
                <td>
                    <form method="POST" action="procurarMatricula.php">
                        <center><input type="submit" value="Consultar Matricula"></center>
                    </form>
                </td>
                <td>
                    <form method="POST" action="apagarMatricula.php">
                        <center><input type="submit" value="Excluir Dados de Matricula"></center>
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