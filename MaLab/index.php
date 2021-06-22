<!--
Nome: Mateus Lidonis Blanco
Matrícula: 321831
Data da entrega: 18/06/2021
Projeto: Formulário de cadastro para triagem de COVID-19
-->

<?php
/*Inicio uma sessão PHP*/
session_start();
?>

<!--Insiro a configuração básica do HTML5-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo.css">
    <title>Login</title>
</head>
<body>

    <!--Crio um main container para conter todas as informações da página-->
    <main class="container">
    
    <!--Adiciono o logo da empresa-->
    <img src="IMAGES/icone.png" alt="" width="130" height="60">

        <!--Inicio o formulário de Login do paciente-->
        <h2>Entrar</h2>
        <form method="POST" action="verificaLogin.php">
            <div class="input-field">
                <input type="email" name="email" placeholder="Digite seu E-mail">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="senha" placeholder="Digite sua senha">
                <div class="underline"></div>
            </div>

            <!--Verifico se o email e senha batem com os dados armazenados no banco de dados, em caso negativo uma mensagem de erro é mostrada-->
            <?php
                if(isset($_SESSION['nao_autenticado'])):
            ?>
            <div class="erro-login">
                <p>Erro: Usuário ou senha inválidos.</p>
            </div>
            <?php
                endif;
                unset($_SESSION['nao_autenticado']);
            ?>
                
            <input type="submit" value="Acessar" class="entrar">
        </form>

        <!--Link para ir à página de Cadastro-->
        <div class="footer">
            <a href="cadastro.php">Não possui uma conta? <strong>Cadastre-se</strong></a>
        </div>        
    </main>
</body>
</html>