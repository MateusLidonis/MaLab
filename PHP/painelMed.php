<!--
Nome: Mateus Lidonis Blanco
Matrícula: 321831
Data da entrega: 18/06/2021
Projeto: Formulário de cadastro para triagem de COVID-19
-->

<!--Inicio uma sessão PHP-->
<?php
session_start();
?>

<!--Insiro a configuração básica do HTML5-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estiloResult.css">
    <title>Triagem</title>    
</head>
<body>

<!--Crio um Main Container para conter todas as informações da página-->
<main class="container">

<!--Adiciono o logo da empresa-->
<img src="IMAGES/icone.png" alt="" width="130" height="60">

        <!--Inicio o formulário de Triagem do paciente-->
        <h2>Triagem Covid-19</h2>        
        <form method="POST" action="resultadoFinal.php">
            <div class="input-field">
                <input type="text" name="nome" placeholder="Nome completo" maxlength="30">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="email" name="email" placeholder="E-mail" maxlength="30">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="text" name="idade" placeholder="Idade" maxlength="3">
                <div class="underline"></div>
            </div>         
            
            <div class="input-radio">
                <p>Gênero</p>
                <input type="radio" name="genero" value="Masculino">Masculino<br>
                <input type="radio" name="genero" value="Feminino">Feminino<br>
                <input type="radio" name="genero" value="Outro" checked>Outro<br>
            </div>

            <div class="input-radio">
                <p>Saiu de casa nos últimos 14 dias?</p>
                <input type="radio" name="sair" value="Sim">Sim<br>
                <input type="radio" name="sair" value="Nao">Não<br>                
            </div>

            <div class="input-radio">
                <p>Teve contato com alguém que pegou COVID-19?</p>
                <input type="radio" name="contato" value="Sim">Sim<br>
                <input type="radio" name="contato" value="Nao">Não<br> 
            </div>
            <div class="input-radio">
                <p>Sente cheiro?</p>
                <input type="radio" name="cheiro" value="Sim">Sim<br>
                <input type="radio" name="cheiro" value="Nao">Não<br>  
            </div>

            <div class="input-radio">
                <p>Teve algum sintoma de gripe?</p>
                <input type="radio" name="gripe" value="Sim">Sim<br>
                <input type="radio" name="gripe" value="Nao">Não<br>                
            </div>

            <div class="input-radio">
                <p>Sente dor no corpo?</p>
                <input type="radio" name="corpo" value="Sim">Sim<br>
                <input type="radio" name="corpo" value="Nao">Não<br> 
            </div>

            <div class="input-radio">
                <p>Aparenta ter contraído COVID-19?</p>
                <input type="radio" name="covid" value="Sim">Sim<br>
                <input type="radio" name="covid" value="Nao">Não<br> 
                <input type="radio" name="covid" value="Grande">Muito provável<br>
                <input type="radio" name="covid" value="Pequena">Pouco provável
            </div>

            <div class="input-radio">
                <p>Paciente com prioridade?</p>
                <input type="radio" name="prioridade" value="Sim">Sim<br>
                <input type="radio" name="prioridade" value="Nao">Não<br> 
            </div>    

            <div class="term">
                <p class="termometro">*Utilize o termômetro após enviar o relatório*</p>
            </div>     

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
           
            <input type="submit" value="Enviar relatório" class="enviar">            
        </form>     
    </main>    
</body>
</html>