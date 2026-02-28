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
            <font size="7" face="Arial">U.C Testes de Sistemas - SENAI SC</font>
        </p>
    </form>
    <h4>
        <font color="red">
            <center>Apagar Dados do Aluno</center>
        </font>   
    </h4>

    <hr width="100%" align="center" size="3" color="blue">
<h1 align="center" style="color: red;">Apagar Aluno</h1>

<form method="POST" action="formApagar.php" align="center">
    ID do Aluno(a):
    <input type="text" size="30" name="ID" maxlength="6"><br><br>
    <input type="submit" value="Procurar">
    <input type="reset" value="Limpar Dados">
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
            <a href="../CRUD_MATRICULA/formMatricula.php"> Matricula |</a>
        </nav>

    <hr>
    <p align="center">Prof. Sergio Silveira</p> 
    
</body>
</html>