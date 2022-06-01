<?php
$servidor = "localhost";
$banco = "id18842334_login_db";
$usuario = "id18842334_db_login";
$senha = "Alexandro_BD22";
$porta = "3306";

$conn = mysqli_connect($servidor, $usuario, $senha, $banco, $porta);

if (!$conn) {
    die ("A conexão falhou:" . mysqli_connect_error());
}

echo "A conexão foi efetuada com sucesso!";

?>