
<?php
include('connection.php');

if(isset($_POST['E-mail']) || isset($_POST['Senha'])){
    if(strlen($_POST['E-mail']) == 0){
        echo "Preencha com seu e-mail!";
    }else if(strlen($_POST['Senha']) == 0){
        echo "Preencha com sua senha";
    }else{
        $email = $mysqli->real_escape_string($_POST['E-mail']);
        $senha = $mysqli->real_escape_string($_POST['Senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução da query: ".$mysqli->error);
        
        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['email'] = $usuario['email'];

            header('Location: painel.php');

        }else{
            echo 'Falha ao logar! E-mail ou senha incorretos';
        }

    }

}else{
    echo  'nada aconteceu!';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedala - Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="" method="POST">
        <h1>Login</h1>
        <input type="email" placeholder="E-mail" name="E-mail">
        <br>
        <input type="password" placeholder="Senha" name="Senha">
        <br>
        <input type="submit" name="submit" id="submit">
    </form>
</body>
</html>
