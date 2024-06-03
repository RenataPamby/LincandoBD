<?php
    echo "<link rel='stylesheet' type='text/css' href='crud.css'/>";
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
        echo "<br/><br/>";
        echo "<button onClick='window.history.back();'>MENU</button>";
       }
    else
        {
        echo "<script language=javascript> window.alert('Não existem registros para exibir!!!'); window.history.back(); </script>";
        }
?>