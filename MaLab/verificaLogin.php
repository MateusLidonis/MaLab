<!--
Nome: Mateus Lidonis Blanco
Matrícula: 321831
Data da entrega: 18/06/2021
Projeto: Formulário de cadastro para triagem de COVID-19
-->

<?php
/*Inicio uma sessão PHP e a conexão com o banco de dados*/
session_start();
include('conexao.php');

/*Guardo todos os campos preenchidos na tela de Login nas seguintes variáveis*/
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

/*Crio uma query no banco de dados para verificar se o email e a senha digitadas estão cadastrados*/
$query = "SELECT * from usuario where email = '{$email}' and senha = md5('{$senha}')";

/*Executo a query acima estabelecendo uma conexão com o banco de dados*/
$result = mysqli_query($conexao, $query);

/*Faço uma contagem de linhas referente ao resultado retornado da query*/
$row = mysqli_num_rows($result);

/*Caso o resultado for igual à 1, existe o email e senha digitados, portanto o paciente entra na página de Painel*/
if($row == 1) 
{
	$_SESSION['email'] = $email;
	header('Location: painel.php');
	exit();
}

/*Caso contrário, será criada uma sessão de erro dizendo que o usuário ou senha estão inválidos*/
else 
{
	$_SESSION['nao_autenticado'] = true;
	header('Location: login.php');    
	exit();
}
?>