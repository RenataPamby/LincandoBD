<?php
include 'conexao.php';
$vcod=$_POST['txtdeletar'];
if (isset($vcod))
{
    if ($vcod!='') //se na caixa de texto do código escolhido estiver diferente de vazio executa o bloco abaixo
        {                    
            //verificando se o código escolhido EXISTE na tabela                
            $pesq=$cmd-> query("select * from tbcrud where codi_cr='$vcod'");
            $total_registros =$pesq->rowCount();
            if ($total_registros > 0)
            {
                //vamos apagar o registro escolhido
                $excl=$cmd-> query("delete from tbcrud where codi_cr='$vcod'");
                echo "<script language=javascript>
                        window.alert('Registro excluído com sucesso!!! ');
                        location.reload();
                      </script>";
            }                        
            else
            {
                //o usuário escolheu um código que não foi apresentado na listagem
                echo "<script language=javascript>
                        window.alert('Registro inexistente!!! ');
                        location.reload();
                     </script>";
            }              
       }
    else  //o usuário deixou a caixa de texto em branco e clicou no botão “confirma”
           echo "<script language=javascript>
                    window.alert('Escolha um código da lista!!! ');  
                    document.getElementById('txtcodi').focus();  
                </script>";
    }
else // do 1º if
{
    echo "<script language=javascript>
            window.alert('Não existem registros para excluir!!!');
            window.history.back();
        </script>";
        echo "<meta http-equiv='refresh' content='0' />";
}
?>