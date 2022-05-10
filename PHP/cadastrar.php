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

/*Guardo todos os campos preenchidos na tela de Cadastro nas seguintes variáveis*/
$nome = utf8_decode(trim($_POST['nome']));
$telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
$confirmarSenha = mysqli_real_escape_string($conexao, trim(md5($_POST['confiSenha'])));

/*Crio uma query no banco de dados para verificar se o email já está cadastrado*/
$sql = "SELECT count(*) AS total FROM usuario WHERE email = '$email'";

/*Executo a query acima estabelecendo uma conexão com o banco de dados*/
$result = mysqli_query($conexao, $sql);

/*Faço uma contagem de linhas referente ao resultado retornado da query*/
$row = mysqli_fetch_assoc($result);

/*Caso o resultado for igual à 1, existe o email cadastrado, portanto será criada uma sessão de erro dizendo que o usuário já existe e você será redirecionado para a pasta de cadastro, limpando os dados*/
if($row['total'] == 1)
{
    $_SESSION['usuario_existe'] = true;
    header('Location: cadastro.php');
    exit;
}

/*Caso a query retorne o valor de 0, significa que não existe esse email cadastrado então a seguinte query é criada*/
$sql = "INSERT INTO usuario (nome, telefone, email, senha) VALUES ('$nome', '$telefone', '$email', '$senha')";

/*Caso algum campo esteja vazio será criada uma sessão de erro dizendo que existe um campo vazio*/
if($nome == '' || $telefone == '' || $email == '' || $senha == '' || $confirmarSenha == '')
{
    $_SESSION['campo_vazio'] = true;
}

/*Se todos os campos forem preenchidos, o sistema irá verificar a igualdade das senhas, se forem iguais ele executa o INSERT no banco de dados e aparece uma mensagem de sucesso*/
else if($confirmarSenha == $senha)
{
    if($conexao->query($sql) === TRUE)
    {
        $_SESSION['status_cadastro'] = true;
    }
}
/*Caso as senhas sejam diferentes, será criada uma sessão de erro dizendo que as senhas são diferentes*/
else
{
    $_SESSION['senhas_diferentes'] = true;
}

/*Após tudo isso a conexão com o banco de dados é fechada e a tela de cadastro é limpa, mostrando apenas uma mensagem para ir à área de Login*/
$conexao->close();
header('Location: cadastro.php');
exit;
?>