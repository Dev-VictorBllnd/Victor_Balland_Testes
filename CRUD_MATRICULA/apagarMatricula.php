<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar Aluno</title>
</head>
<body style="font-family: helvetica;">
<form>
        <p align="center">
            <font size="7" face="Arial">U.C Teste de Sistemas - U.C Testes de Sistemas - SENAI SC</font>
        </p>
    </form>
    <h4>
        <font color="red">
            <center>Apagar Dados de Matricula</center>
        </font>   
    </h4>

    <hr width="100%" align="center" size="3" color="blue">
<h1 align="center" style="color: red;">Apagar Matricula</h1>

<form method="POST" action="formApagarMatricula.php" align="center">
    ID de Matricula:
    <input type="text" size="30" name="ID" maxlength="6"><br><br>
    <input type="submit" value="Procurar">
    <input type="reset" value="Limpar Dados">
</form>

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
                    <form method="POST" action="atualizarMatricula.php">
                        <center><input type="submit" value="Atualizar Dados de Matricula"></center>
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