<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Formulário Matricula</title>
</head>
<body style="font-family: helvetica;">
    <form>
        <p align="center">
            <font size="7">U.C Teste de Sistemas - U.C Testes de Sistemas - SENAI SC</font>
        </p>
    </form>
    <h4>
        <font color="red">
            <center>Formulário de Cadastro do Aluno</center>
        </font>
    </h4>

    <hr width="100%" align="center" size="3" color="blue">
    <h1>Dados Pessoais</h1>

    <form method="POST" action="cadastroMatricula.php" align="center">
        <table width="500" border="3" cellspacing="0" cellpadding="0" align="center">
            <tr>
                <th>Nivel</th>
                <th>Turno</th>
                <th>Série</th>
                <th>* Cursos Extra Curriculares</th>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="nivel" value="Integrado">Integrado<br>
                    <input type="radio" name="nivel" value="Sub-Seq">Sub-Seq<br>
                </td>
                <td align="left">
                    <input type="radio" name="turno" value="Manha">Manhã<br>
                    <input type="radio" name="turno" value="Tarde">Tarde<br>
                    <input type="radio" name="turno" value="Noite">Noite<br>
                </td>
                <td>
                    <select name="serie" size="1">
                        <option></option>
                        <option>1°</option>
                        <option>2°</option>
                        <option>3°</option>
                    </select><br>
                </td>
                <td align="left">
                    <input type="radio" name="extraCurso" value="Musica">Musica<br>
                    <input type="radio" name="extraCurso" value="Judo">Judo<br>
                    <input type="radio" name="extraCurso" value="Balet">Balet<br>
                    <input type="radio" name="extraCurso" value="Pintura">Pintura<br>
                    <strong>* Escolha apenas uma opção</strong>
                </td>
            </tr>
        </table><br>
        <input type="submit" value="Cadastrar Matricula">
        <input type="reset" value="Limpar Dados">
    </form>
    <hr width="100%" align="center" size="3" color="blue">
    <table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
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
    </table> <br>

    <nav align="center">
        <a href="index.php">| Home | </a>
        <a href="formAluno.php">Aluno |</a>
    </nav>
    <hr>
    <p align="center">Prof. Sergio Luiz da Silveira</p>
</body>
</html>