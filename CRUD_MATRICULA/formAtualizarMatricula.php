<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar</title>
</head>
<body style="font-family: helvetica;">
    
        <form>
            <p align="center">
                <font size="7" face="Arial">U.C Testes de Sistemas - SENAI SC</font>
            </p>
        </form>
        <h4>
            <font color="green">
                <center>Formulário de Alteração de Dados de Matricula</center></font>
        </h4>

        <hr width="100%" align="center" size="3" color="blue"> <br>

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

            $sql = "SELECT * FROM `matricula` WHERE id ='$ID'";
            echo $sql."<br><br>";
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

        <form method="POST" action="atualizaMatricula.php" align="center">
            <table width="500" border="0" cellspacing="0" cellspading="0" align="center">
                <input type="hidden" name="ID" value="<?=$ID?>">
                <tr>
                    <td align="left">Nivel da Matricula:</td>
                    <td><input type="radio" name="nivel" value="Integrado" <?php echo($nivel == 'Integrado') ? "checked" : ""; ?>>Integrado
                    <input type="radio" name="nivel" value="Sub-Seq" <?php echo($nivel == 'Sub-Seq') ? "checked" : ""; ?>>Sub-Seq</td>
                </tr>
                <tr>
                    <td align="left">Turno:</td>
                    <td><input type="radio" name="turno" value="Manha" <?php echo($turno == 'Manha') ? "checked" : ""; ?>>Manha
                    <input type="radio" name="turno" value="Tarde" <?php echo($turno == 'Turno') ? "checked" : ""; ?>>Tarde
                    <input type="radio" name="turno" value="Noite" <?php echo($turno == 'Noite') ? "checked" : ""; ?>>Noite</td>
                </tr>
                <tr>
                    <td align="left">Série:</td>
                    <td>
                        <select name="serie" size="1">
                            <option></option>
                            <option <?php echo($serie == '1°') ? "selected" : ""; ?>>1°</option>
                            <option <?php echo($serie == '2°') ? "selected" : ""; ?>>2°</option>
                            <option <?php echo($serie == '3°') ? "selected" : ""; ?>>3°</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="left">Nome da Mãe:</td>
                    <td><input type="radio" name="cursoExtra" value="Musica" <?php echo($cursoExtra == 'Musica') ? "checked" : ""; ?>>Musica
                    <input type="radio" name="cursoExtra" value="Judo" <?php echo($cursoExtra == 'Judo') ? "checked" : ""; ?>>Judo
                    <input type="radio" name="cursoExtra" value="Balet" <?php echo($cursoExtra == 'Balet') ? "checked" : ""; ?>>Balet
                    <input type="radio" name="cursoExtra" value="Pintura" <?php echo($cursoExtra == 'Pintura') ? "checked" : ""; ?>>Pintura</td>
                </tr>
            </table><br>
            <center>  
                <input type="submit" value="Atualizar Dados">
                <input type="reset" value="Limpar Dados">
            </center>
        </form>
        
        <hr width="100%" align="center" size="3" color="blue">
        <table width="400" border="0" cellspacing="0" cellspading="0" align="center">
            <tr>
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