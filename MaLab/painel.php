<!--
Nome: Mateus Lidonis Blanco
Matrícula: 321831
Data da entrega: 18/06/2021
Projeto: Formulário de cadastro para triagem de COVID-19
-->

<?php
/*Inicio uma sessão PHP e a conexão com o banco de dados*/
session_start();
include("conexao.php");

/*Armazeno o que o usuário digitar no campo email da página de Login na variável $email*/
$email = $_SESSION['email'];

/*Crio uma query no banco de dados que verifica se existe algum registro de resultado para o email digitado*/
$consulta = "SELECT * FROM resultado WHERE email = '$email'";

/*Executo a query acima estabelecendo uma conexão com o banco de dados*/
$con = mysqli_query($conexao,$consulta) or die(mysqli_error($conexao));

/*Crio uma query no banco de dados que verifica o ID do resultado do email digitado*/
$consultaID = "SELECT id_resultado FROM resultado WHERE email = '$email'";

/*Executo a query acima estabelecendo uma conexão com o banco de dados*/
$conID = mysqli_query($conexao,$consultaID) or die(mysqli_error($conexao));

/*Pega todas as colunas da tabela e armazena na variável ID*/
$ID = $conID->fetch_array();

/*Crio uma query no banco de dados que verifica a temperatura enviada pelo termômetro referente ao ID do email digitado*/
$temperatura = "SELECT sensor FROM temperatura WHERE id = '$ID[0]'";

/*Executo a query acima estabelecendo uma conexão com o banco de dados*/
$conTemperatura = mysqli_query($conexao,$temperatura) or die(mysqli_error($conexao));
?>

<!--Insiro a configuração básica do HTML5-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estiloPainel.css">
    <title>Resultado</title>
</head>
<body>

<!--Crio um botão de sair-->
<main class="container">
<h2><a href="logout.php">Sair</a></h2>

<?php

/*Pego o resultado da query criada e armazeno na variável $result*/
$result = mysqli_query($conexao, $consulta);

/*Pego o resultado da query criada e armazeno na variável $resultID*/
$resultID = mysqli_query($conexao, $consultaID);

/*Pego o resultado da query criada e armazeno na variável $resultTemperatura*/
$resultTemperatura = mysqli_query($conexao, $temperatura);

/*Faço uma contagem de linhas referente ao resultado retornado da query*/
$row = mysqli_num_rows($result);


/*Caso o resultado for igual à 1, crio uma sessão de que existe um resultado para o usuário*/
if($row == 1)
{
    $_SESSION['resultado_true'] = true;
}

/*Caso contrário, crio uma sessão de que não existe um resultado*/
else
{
    $_SESSION['resultado_false'] = true;
}
?>

<!--Pega todas as colunas da tabela e armazena na variável dado-->
<?php while($dado = $con->fetch_array()){?>

<!--Pega todas as colunas da tabela e armazena na variável dadoTemperatura-->
<?php while($dadoTemperatura = $conTemperatura->fetch_array()){?>

<!--Se existir algum registro de resultado para o usuário logado, o conteúdo será exibido-->
<?php
    if(isset($_SESSION['resultado_true'])):
?>

<!--Título da tabela-->
<p class="relatorio">Relatório da Triagem</p>

<!--Início da tabela que vai receber os dados do banco de dados-->
<div class="tabela">
<table>

    

    <!--Linha 1 exibe o que está dentro do array dado na posição 1 - Nome-->
    <tr>
        <td class="col1">Nome:</td>
        <td><?php echo utf8_encode($dado[1]);?></td>
    </tr>

    <!--Linha 2 exibe o que está dentro do array dado na posição 2 - Email-->
    <tr>
        <td class="col1">Email:</td>
        <td class="col2"><?php echo($dado[2]);?></td>
    </tr>

    <!--Linha 3 exibe o que está dentro do array dado na posição 3 - Idade-->
    <tr>
        <td class="col1">Idade:</td>
        <td class="col2"><?php echo($dado[3]);?></td>
    </tr>

    <!--Linha 4 exibe o que está dentro do array dado na posição 0 - Temperatura-->
    <tr>
        <td class="col1">Temperatura:</td>
        <td class="col2"><?php echo utf8_encode($dadoTemperatura[0]);?></td>
    </tr>

    <!--Linha 5 exibe o que está dentro do array dado na posição 5 - Gênero-->
    <tr>
        <td class="col1">Gênero:</td>
        <td class="col2"><?php echo($dado[4]);?></td>
    </tr>

    <!--Linha 7 exibe o que está dentro do array dado na posição 12 - Prioridade-->
    <tr>
        <td class="col1">Prioridade?</td>
        <td class="col2"><?php echo($dado[11]);?></td>
    </tr>
</table>
    </div>
<!--Botão de download do PDF com o resultado-->
<div class="download">
<a href="PDF/resultado.pdf" download="PDF/resultado.pdf" class="download">Baixe seu resultado</a>
</div>

<!--Final do if caso exista algum registro de resultado para o usuário logado-->
<?php
    endif;
    unset($_SESSION['resultado_true']);
?>

<!--Final do while que pega as informações do banco de dados-->
<?php } ?>

<!--Final do while que pega as informações do banco de dados-->
<?php } ?>

<!--Caso não tenha nenhum resultado para o usuário logado, nada aparece na página-->
<?php
    if(isset($_SESSION['resultado_false'])):
?>
    <div class="resultado-false">
        <h3>Resultado não disponível.</h3>
    </div>
<?php
    endif;
    unset($_SESSION['resultado_false']);
?>
</main>
</body>
</html>