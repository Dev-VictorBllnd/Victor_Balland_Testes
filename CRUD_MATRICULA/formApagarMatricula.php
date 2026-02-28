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
            <center>Apagar a Matricula</center>
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

        $sql = "SELECT * FROM matricula WHERE id='$ID'";
        echo $sql."<hr>";

        $result = $conexao->query($sql);

        if($result){
            if($result->num_rows>0){
                while($linha = $result->fetch_assoc()){
                    $ID = $linha["id"];
                    $nivel = $linha["nivel"];
                    $turno = $linha["turno"];
                    $serie = $linha["serie"];
                    $cursoExtra =  $linha["cursoExtra"];
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

<form method="POST" action="apagaMatricula.php" align="center">
            <table width="500" border="0" cellspacing="0" cellspading="0" align="center">
                <input type="hidden" name="ID" value="<?=$ID?>">
                <tr>
                    <td align="left">ID da Matricula:</td>
                    <td><input type="text" size="30" name="ID" value="<?=$ID?>" disabled></td>
                </tr>
                <tr>
                    <td align="left">Nivel da Matricula:</td>
                    <td><input type="text" size="30" name="nivel"  maxlength="10" value="<?=$nivel?>" disabled ></td>
                </tr>
                <tr>
                    <td align="left">Turno:</td>
                    <td><input type="text" size="30" name="turno" value="<?=$turno?>" disabled></td>
                </tr>
                <tr>
                    <td align="left">Série:</td>
                    <td><input type="text" size="30" name="serie" value="<?=$serie?>" disabled></td>
                </tr>
                <tr>
                    <td align="left">Curso Extra Curricular:</td>
                    <td><input type="text" size="30" name="cursoExtra" maxlength="20" value="<?=$cursoExtra?>" disabled></td>
                </tr>
            </table><br>
            <center>  
                <h2 style="color:red;">Tem certeza que deseja deletar esta Matricula?</h2> <br>
                <input type="submit" value="DELETAR MATRICULA">
            </center>
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
                    <form method="POST" action="atualizarMatricula.php">
                        <center><input type="submit" value="Atualizar Dados de Matricula"></center>
                    </form>
                </td>
                <td>
                    <form method="POST" action="procurarMatricula.php">
                        <center><input type="submit" value="Consultar Matricula"></center>
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