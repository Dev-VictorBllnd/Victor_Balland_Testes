<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>
<body style="font-family: helvetica;">

    <p align="center">
        <font size="7" face="Arial">U.C Teste de Sistemas - U.C Testes de Sistemas - SENAI SC</font>
    </p>
    <h4>
        <font color="green">
            <center>Listagem de Matriculas</center>
        </font>   
    </h4>

    <hr width="100%" align="center" size="3" color="blue">
    
<?php
    $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
    if($conexao->connect_errno){
        $erro = "Ocorreu um erro na conexão com o banco de dados.";
        exit;
    }

    $conexao->set_charset("utf8");

    $sql = "SELECT * FROM `matricula`;";
    echo $sql."<hr>";
    $result = $conexao->query($sql);

    if($result->num_rows > 0){
        while($linha = $result->fetch_assoc()){
        echo "Id: ".$linha["id"]."<br>";
        echo "Nivel: ".$linha["nivel"]."<br>";
        echo "Turno: ".$linha["turno"]."<br>";
        echo "Série: ".$linha["serie"]."<br>";
        echo "Curso Extra Curricular: ".$linha["cursoExtra"]."<br><hr>";
        }
    } else {
        echo "Sem resultado <br>";
    }

    $conexao->close();
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
                    <form method="POST" action="procurarMatricula.php">
                        <center><input type="submit" value="Consultar Matricula"></center>
                    </form>
                </td>
                <td>
                    <form method="POST" action="atualizarMatricula.php">
                        <center><input type="submit" value="Atualizar Dados de Matricula"></center>
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