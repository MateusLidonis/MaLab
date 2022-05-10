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
    <title>Cadastro</title>
</head>
<body>

    <!--Crio um Main Container para conter todas as informações da página-->
    <main class="container">
    
    <!--Adiciono o logo da empresa-->
    <img src="IMAGES/icone.png" alt="" width="130" height="60">

        <!--Inicio o formulário de Cadastro de paciente-->
        <h2>Cadastrar</h2>
        <form method="POST" action="cadastrar.php">
            <div class="input-field">
                <input type="text" name="nome" placeholder="Nome completo" maxlength="30">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="email" name="email" placeholder="E-mail" maxlength="40">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="senha" placeholder="Senha" maxlength="25">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="confiSenha" placeholder="Confirmar senha" maxlength="25">
                <div class="underline"></div>
            </div>

            <!--Verifico se o email cadastrado já existe no banco de dados, em caso positivo uma mensagem de erro é mostrada-->
            <?php
                if(isset($_SESSION['usuario_existe'])):
            ?>
            <div class="erro-existe">
                <p>Erro: Email já cadastrado.</p>
            </div>
            <?php
                endif;
                unset($_SESSION['usuario_existe']);
            ?>

            <!--Verifico se existe algum campo em branco, caso positivo uma mensagem de erro é mostrada-->
            <?php
                if(isset($_SESSION['campo_vazio'])):
            ?>
            <div class="erro-vazio">
                <p>Erro: Preencha todos os campos.</p>
            </div>
            <?php
                endif;
                unset($_SESSION['campo_vazio']);
            ?>

            <!--Verifico se as senhas inseridas são iguais, em caso negativo uma mensagem de erro é mostrada-->
            <?php
                if(isset($_SESSION['senhas_diferentes'])):
            ?>
            <div class="erro-senha">
                <p>Erro: Senhas estão diferentes.</p>
            </div>
            <?php
                endif;
                unset($_SESSION['senhas_diferentes']);
            ?>

            <!--Caso o cadastro esteja de acordo, aparecerá uma mensagem indicando que o paciente foi cadastrado com sucesso-->
            <?php
                if(isset($_SESSION['status_cadastro'])):
            ?>
            <div class="sucesso">
                <p>Usuário criado com sucesso!<br>Volte à pagina de Login</p>                
            </div>
            <?php                
                endif;
                unset($_SESSION['status_cadastro']);
            ?>

            <input type="submit" value="Cadastrar" class="entrar">
        </form>

        <!--Link para ir à página de Login-->
        <div class="footer">
            <a href="index.php">Voltar para login</a>
        </div>       
    </main>
</body>
</html>