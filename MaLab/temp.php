<!--
Nome: Mateus Lidonis Blanco
Matrícula: 321831
Data da entrega: 18/06/2021
Projeto: Formulário de cadastro para triagem de COVID-19
-->

<!--Inicio uma sessão PHP-->
<?php
session_start();

/*Utilizo PDO para realizar a conexão com o banco de dados*/
/*É necessário PDO para poder integrar o ESP32 ao banco de dados*/
try{
    $HOST = "localhost";
    $BANCO = "projeto_pi";
    $USUARIO = "root";
    $SENHA = "";

    $PDO = new PDO("mysql:host=" . $HOST . ";dbname=" . $BANCO . ";charset=utf8", $USUARIO, $SENHA);
} catch(PDOException $erro){
    echo "Erro de conexão";
}

/*Guardo a informação do sensor na variável $sensor*/
$sensor = $_GET['sensor'];

/*Crio a query que irá inserir o valor lido no sensor do ESP32 no banco de dados*/
$sql = "INSERT INTO temperatura (sensor) VALUES (:sensor)";

/*Preparo a conexão da query com o banco de dados*/
$stmt = $PDO->prepare($sql);

/*Atribuo o valor da variável no :sensor (que está na query para enviar a informação)*/
$stmt->bindParam(':sensor', $sensor);

/*Executo a query*/
if($stmt->execute())
{
    /*Em caso de sucesso, essa mensagem aparece*/
    echo "Salvo com sucesso";
}
else
{   
    /*Em caso de erro, essa mensagem aparece*/
    echo "Erro ao salvar";
}
?>