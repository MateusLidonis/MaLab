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

/*Guardo todos os campos preenchidos na tela de Triagem nas seguintes variáveis*/
$nome = utf8_decode(trim($_POST['nome']));
$email = utf8_decode(trim($_POST['email']));
$idade = mysqli_real_escape_string($conexao, trim($_POST['idade']));
$genero = utf8_decode(trim($_POST['genero']));
$sair = utf8_decode(trim($_POST['sair']));
$contato = utf8_decode(trim($_POST['contato']));
$cheiro = utf8_decode(trim($_POST['cheiro']));
$gripe = utf8_decode(trim($_POST['gripe']));
$corpo = utf8_decode(trim($_POST['corpo']));
$covid = utf8_decode(trim($_POST['covid']));
$prioridade = utf8_decode(trim($_POST['prioridade']));

/*Crio uma query no banco de dados para inserir na tabela os dados preenchidos*/
$sql = "INSERT INTO resultado (nome, email, idade, genero, sair, contato, cheiro, gripe, corpo, covid, prioridade) 
VALUES ('$nome', '$email', '$idade', '$genero', '$sair', '$contato', '$cheiro', '$gripe', '$corpo', '$covid', '$prioridade')";

/*Verifico se algum campo está vazio, em caso positivo, um erro aparece e as informações não são enviadas*/
if(isset($_POST['sair']) === false || isset($_POST['contato']) === false || isset($_POST['cheiro']) === false || isset($_POST['gripe']) === false || isset($_POST['corpo']) === false || isset($_POST['covid']) === false || isset($_POST['prioridade']) === false)
{
    $_SESSION['campo_vazio'] = true;
}
else if($nome == '' || $email == '' || $idade == '')
{
    $_SESSION['campo_vazio'] = true;
}
/*Caso tudo esteja preenchido, as informações são enviadas*/
else
{
/*Executo a query acima estabelecendo uma conexão com o banco de dados*/
mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
}

/*Redireciono o médico para a tela de cadastro da Triagem novamente*/
header('Location: painelMed.php');
exit;
?>