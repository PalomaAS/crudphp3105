<?php
include_once "conexao.php";
$acao = $_GET['acao'];

if (isset($_GET['id'])){
    $id = $_GET ['id'];
}

switch ($acao){
    case 'inserir':
        
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $data = $_POST['data'];
        $mensagem = $_POST['mensagem'];

        $sql = "INSERT INTO user (user_nome, user_email, user_data, user_mensagem) values('$nome','$email','$data','$mensagem')";
       
        if (!mysqli_query($conn, $sql)){
            die ("Erro ao inserir as informações do formulário na tabela user:".mysqli_error($conn));
        }else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados atualizados com sucesso!')
            window.location.href='crud.php?acao=selecionar'</script>";
        }
       
        break;
        
    case 'montar':
        $id= $_GET['id'];
        $sql='SELECT*FROM user WHERE id_user='.$id;
        $resultado=mysqli_query($conn,$sql) or die ("Erro ao retornar dados");
        
        echo "<form method='post' name = 'dados' action='crud.php?acao=atualizar' onSubmit='return enviardados();'>";
        echo "<table width='588' border='0' align='center'>";
        
        while($registro=mysqli_fetch_array($resultado)){
            echo " <tr>";
            echo " <td width='118'><font size='2' face= 'Verdana, Arial, Helvetica, sans-serif'>Código:</font></td>";
            echo " <td width='460'>";
            echo " <input name='id' type='text' class='formbutton' id='id' size='2' maxlength='10' value= '$id' readonly>";
            echo " </td>";
            echo " </tr>";
            
            echo "</tr>";
            echo "<td><font face='Verdana, Arial, Helvetica, sans-serif'><font size='2'>Nome:<strong>:</strong></font></font></td>";
            echo "<td rowspan='2'><font size='2'>";
            echo "<style>textarea{resize:nome;}</style>";
            echo "<textarea name='nome' cols='50' rows='1' class='formbutton'>" . htmlspecialchars ($registro['user_nome']) . "</textarea>"; 
            
           /* echo "<tr>
            <td width='118'>
               <font size='2' face='Verdana, Arial, Helvetica, sans-serif'>Nome completo:</font>
            </td>
            <td width='460'>
              <input name='nome' type='text' class='formbutton' id='nome' size='52' maxlength='150' value='".$registro['user_nome']."'>
            </td>
            </tr>";*/

            
            echo " <tr>";
            echo "   <tr>";
            echo " <td width='118'><font size='1' face= 'Verdana, Arial, Helvetica, sans-serif'>Data:</font></td>";
            echo " <td width='460'>";
            echo " <input name='data' type='text' class='formbutton' id='data' size='52' maxlength='150' value=".$registro['user_data'] ."";
            echo " </td>";
            echo " </tr>";
            
            echo " <tr>";
            echo "   <tr>";
            echo " <td width='118'><font size='2' face= 'Verdana, Arial, Helvetica, sans-serif'>Email:</font></td>";
            echo " <td width='460'>";
            echo " <input name='email' type='text' class='formbutton' id='email' size='52' maxlength='150' value=".$registro['user_email'] ."";
            echo " </td>";
            echo " </tr>";
            
            echo "</tr>";
            echo "<td><font face='Verdana, Arial, Helvetica, sans-serif'><font size='2'>Mensagem:<strong></strong></font></font></td>";
            echo "<td rowspan='2'><font size='2'>";
            echo "<textarea name='mensagem' cols='50' rows='3' class='formbutton'>" . htmlspecialchars ($registro['user_mensagem']) . "</textarea>";
            echo "</font></td>";
            echo " <tr>";
            echo "   <tr>";
            
            echo" <tr>";
            echo" <td height='22'></td>";
            echo" <td>";
            echo" <input name='Submit' type='submit' class='formobjects' value='Atualizar'>";
            echo" <button type='submit' formaction='crud.php?acao=selecionar'>Selecionar</button›";
            echo" <input name='Reset' type='reset' class='formobjects' value='Limpar campos'>";
            echo" </td>";
            echo "</tr>";

            echo "</table>";
            echo "</form>";
        }
            mysqli_close($conn);
        break;
        
    case 'atualizar':
        
        $codigo = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $data = $_POST['data'];
        $mensagem = $_POST['mensagem'];
        
       
       /* $sql = "UPDATE user SET user_nome='$nome', user_email='$email', user_data='$data', user_mensagem='$user_mensagem' WHERE id_user = '$codigo'";*/
        
        $sql = "UPDATE user SET user_nome = '" . $nome . "', user_email = '" . $email . "', user_data ='" . $data . "', user_mensagem = '" . $mensagem . "' WHERE id_user = '" . $codigo . "'";
       
        if (!mysqli_query($conn, $sql)){
            die ('Error: '. msqli_error($conn));
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados atualizados com sucesso!') 
            window.location.href='crud.php?acao=selecionar'</script>";
        }
        mysqli_close($conn);
        header("Location:crud.php?acao=selecionar");
        break;
        
        
    case 'deletar':
        $sql = " DELETE FROM user WHERE id_user = '". $id . "'";
        
        if(!mysqli_query($conn, $sql)){
            die('Error: '. mysqli_error($conn));
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados excluídos com sucesso!')
            window.location.href='crud.php?acao=selecionar'</script>";
        }
        
        mysqli_close($conn);
        header("Location:crud.php?acao=selecionar");
        break;
        
    case 'selecionar':
        date_default_timezone_set('America/São_Paulo');
        header("Contente-type: text/html; charset-uft-8");
        include_once "conexao_php";
        
        echo "<meta charset='UTF-8'>";
        echo "<center><table border=1>";
        echo "<tr>";
        echo "<th>CODIGO</th>";
        echo "<th>NOME</th>";
        echo "<th>EMAIL</th>";
        echo "<th>DATA CADASTRO</th>";
        echo "<th>MENSAGEM</th>";
        echo "<th>AÇÂO</th>";
        echo "</tr>";
        
        $sql = "SELECT * FROM user";
        $resultado= mysqli_query($conn, $sql) or die ("Erro ao retornar dados");
        
        echo "<CENTER>Registro cadastrados na base de dados.</br></CENTER> ";
        echo "</br>";
        
        while ($registro=mysqli_fetch_array($resultado)){
            
            $id = $registro['id_user'];
            $nome = $registro['user_nome'];
            $email = $registro['user_email'];
            $data = $registro['user_data'];
            $mensagem = $registro['user_mensagem'];
            
            echo "<tr>";
            echo "<td>". $id . "</td>";
            echo "<td>". $nome . "</td>";
            echo "<td>". $email . "</td>";
            echo "<td>". date("d/m/Y" , strtotime($data)) . "</td>";
            echo "<td>". $mensagem . "</td>";
            echo "<td><a href='crud.php?acao=deletar&id=$id'><img src='delete.png' alt='deletar' title='Deletar registro'></a>
            <a href='crud.php?acao=montar&id=$id'><img src='update.png' alt='atualizar' title='Atualizar registro'></a>
            <a href='index.php'><img src='insert.png' alt='inserir' title='Inserir registro'></a>'";
            echo "</tr>";
        }
        mysqli_close($conn);
        break;
        
    default:
        header("Location:crud.php?acao=selecionar");
        break;
}

