<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Daletar</title>
</head>
<body>
    <form id="formDelt" name="formDelt" method="post" action="delet.php">
        <h1>Deletar</h1>
        <label for="txt">Digite o código para deletar</label>
        <input id="caixa" type="text" placeholder="Código" name="txtdeletar" required>
        <input class="botao" type="reset" value="Limpar" />
        <input class="botao" type="submit" value="Deletar">
        <input class="botao" type="button" value="Menu" onclick="location.href='menu.html'">
    </form>
    
</body>
</html>

<?php
include 'conexao.php';
$lista=$cmd->query("select * from tbcrud");
$total_registros =$lista->rowCount();
if ($total_registros > 0)
{
    echo "<table>";
    echo "<tr> <th colspan=6> Dados Cadastrados </th> </tr>";
    echo "<tr>
            <th> Código </th>
            <th> Nome </th>
            <th> e-Mail </th>
            <th> Senha </th>
            <th> Sexo </th>
            <th> Nascimento </th>
          </tr>";
               
    while($linha=$lista->fetch(PDO::FETCH_ASSOC))
    {
        $codigo=$linha['codi_cr'];
        $nome=$linha['nome_cr'];
        $ema=$linha['email_cr'];
        $senha=$linha['senh_cr'];
        $sexo=$linha['sexo_cr'];
        $data=$linha['atna_cr'];
        echo "<tr>
                <td>$codigo</td>
                <td>$nome</td>
                <td>$ema</td>
                <td>$senha</td>
                <td>$sexo</td>
                <td>$data</td>
            </tr>";
    }
    echo "</table>";
}

?>