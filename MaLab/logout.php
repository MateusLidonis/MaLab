<!--
Nome: Mateus Lidonis Blanco
Matrícula: 321831
Data da entrega: 18/06/2021
Projeto: Formulário de cadastro para triagem de COVID-19
-->

<?php
/*É criada uma sessão e um destruídor de sessão que serão acionados por um botão no Painel, após isso o paciente será redirecionado para a tela de Login*/
session_start();
session_destroy();
header('Location: index.php');
exit();
?>