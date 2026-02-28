<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CadMatricula</title>
</head>
<body style="font-family: helvetica;">
    <form>
        <p align="center">
            <font size="7" face="Arial">U.C Teste de Sistemas - U.C Testes de Sistemas - SENAI SC</font>
        </p>
    </form>
    <h4>
         <font color="red">
            <center>Formulário de Cadastro de Matricula</center>
        </font>   
    </h4>

    <hr width="100%" align="center" size="3" color="blue">


<?php

if (isset($_POST["nivel"]) && isset($_POST["turno"]) && isset($_POST["serie"]) && isset($_POST["extraCurso"]) != ''){
    
    $nivel = $_POST["nivel"];
    $turno = $_POST["turno"];
    $serie = $_POST["serie"];
    $extraCurso = $_POST["extraCurso"];


            $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
            if($conexao->connect_errno){
                $erro = "Ocorreu um erro na conexão com o banco de dados.";
                exit;
            }

            $stmt = $conexao->prepare("INSERT INTO `matricula`(`nivel`,`turno`,`serie`,`cursoExtra`) VALUES(?,?,?,?)");
            $stmt->bind_param('ssss', $nivel, $turno, $serie, $extraCurso);

            if(!$stmt->execute()){
                $erro = $stmt->error;
            } else {
                $sucesso = "Matricula cadastrado com sucesso!";
            }

    }
 else {
    $erro = "Campo obrigatório não preenchido";
}


if(isset($erro)) echo '<div style="color:#F00" align="center">'.$erro.'</div><br><br>';

if(isset($sucesso)) echo '<div style="color:#00F" align="center">'.$sucesso.'</div><br><br>';


?>

<hr width="100%" align="center" size="3" color="blue">
        <table width="400" border="0" cellspacing="0" cellspading="0" align="center">
            <tr>
            <td>
                <form method="POST" action="listarMatricula.php">
                    <center>
                        <input type="submit" value="Listar Matriculas">
                    </center>
                </form>
            </td>
            <td>
                <form method="POST" action="procurarMatricula.php">
                    <center>
                        <input type="submit" value="Consultar Matricula">
                    </center>
                </form>
            </td>
            <td>
                <form method="POST" action="atualizarMatricula.php">
                    <center>
                        <input type="submit" value="Atualizar Dados da Matricula Matricula">
                    </center>
                </form>
            </td>
            <td>
                <form method="POST" action="apagarMatricula.php">
                    <center>
                        <input type="submit" value="Excluir Dados da Matricula Matricula">
                    </center>
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