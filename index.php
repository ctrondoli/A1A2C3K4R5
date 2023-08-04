<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {
    
    if(strlen($_POST['email']) == 0){
        echo '<p class="erro1">',"Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo '<p class="erro2">',"Preencha sua senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução no código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];

            header("Location: site/index.php");

        } else {
            echo '<p class="erro3">', "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href=style.css>
</head>
<body>
    
    <div>
        <img src="site/image/LogocTitulo.svg" class=logologin>
    </div>

    <section>
    <form action="" method="POST" class=form>
        <p class="container">
            <label class=emailtext>E-mail</label>
            <input type="text" name="email" class=emailbox placeholder="Digite seu E-mail">
        </p>
        <p class="container">
            <label class=senhatext>Senha</label>
            <input type="password" name="senha" class=senhabox placeholder="Digite sua Senha">
        </p>
        <p>
            <button type="submit" class="entrar">Entrar</button>
        </p>
    </form> 
    </section>
</body>
</html>