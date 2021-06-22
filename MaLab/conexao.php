<!--
Nome: Mateus Lidonis Blanco
Matrícula: 321831
Data da entrega: 18/06/2021
Projeto: Formulário de cadastro para triagem de COVID-19
-->

<?php
/*Defino algumas constantes que serão utilizadas para realizar a conexão com o banco de dados*/
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'projeto_pi');

/*Crio uma váriavel que possui todos os parâmetros para a conexão com o banco de dados*/
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possivel conectar');
?>