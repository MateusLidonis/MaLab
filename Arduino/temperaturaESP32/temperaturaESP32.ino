/*
Nome: Mateus Lidonis Blanco
Matrícula: 321831
Data da entrega: 18/06/2021
Projeto: Formulário de cadastro para triagem de COVID-19
*/

//Implementação para utilizar o sensor interno de temperatura do ESP32
#ifdef __cplusplus
extern "C" {
#endif
uint8_t temprature_sens_read();
#ifdef __cplusplus
}
#endif
uint8_t temprature_sens_read();

//Defino o botão de envio de dados no pino 5
#define botao 5

//Incluo a biblioteca de WiFi do ESP32
#include <WiFi.h>

//Credenciais da minha rede WiFi
const char* ssid = "Nome_Da_Rede";
const char* password = "*******";
const char* host = "192.168.0.10";

//Inicio o Setup
void setup()
{
  //Inicio o Monitor Serial
  Serial.begin(115200);

  //Defino o meu botão como entrada e utilizo o resistor de Pull Up interno da placa
  pinMode(botao, INPUT_PULLUP);

  //Conecto no WiFi
  Serial.println();
  Serial.println();
  Serial.print("Conectando no WiFi: ");
  Serial.println(ssid);

  //Inicializa as configurações de rede da biblioteca WiFi
  WiFi.begin(ssid, password);

  //Enquanto a placa não se conectar no WiFi são inseridos "pontos" no Monitor Serial
  while (WiFi.status() != WL_CONNECTED) {
      delay(500);
      Serial.print(".");
  }

  //Mostro no Monitor Serial que a conexão com o WiFi foi realizada e mostro meu IP Local
  Serial.println("");
  Serial.println("WiFi Conectado");
  Serial.println("Endereço IP: ");
  Serial.println(WiFi.localIP());
}


//Inicio o Loop
void loop()
{
 //Váriavel para armazenar o valor capturado pelo sensor de temperatura interno
 //-16.57 é um valor Hard Coded para diminuir a temperatura registrada pois o sensor interno marca aproximadamente 50ºC
 //E eu não possuo sensor externo, esse valor Hard Coded DEVE ser retirado caso utilize sensor externo 
 float temp = (temprature_sens_read() - 32) / 1.8 - 16.57;

 //Váriavel para controle do botão 
 static bool fb = 0;

 //Quando apertar o botão o valor de fb é 0
 //Lembrando qua ao utilizar o resistor interno de Pull Up o botão está em nível lógico alto
 //!digitalRead(botao) = quando o nível lógico for igual à 0
 if(!digitalRead(botao)){
  fb = 1;

  //Delay para evitar bouncing
  delay(100);
 }

 //Quando o botão for solto e fb for igual à 1
 if(digitalRead(botao) && fb){

  //Mostra a temperatura no Monitor Serial
  Serial.println("Temperatura: " + String(temp) + "º" + "C"); 

  //Se conecta com o Host
  Serial.print("Conectando com: ");
  Serial.println(host);

  //É criada uma conexão TCP através do WiFi Client
  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
      Serial.println("Conexão falhou!");
      return;
  }

  //É criada a URL que irá enviar o valor lido no sensor para o banco de dados MySQL
  String url = "/Projeto_PI/temp.php?";
  url += "sensor=";
  url += temp;
  url += "ºC";

  //Mostra no Monitor Serial a URL montada
  Serial.print("Requesting URL: ");
  Serial.println(url);

  //É enviada a requisição para o servidor
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n"); 
               
  //Reseto a Flag do botão
  //Váriavel de controle
  fb = 0;

  //Delay para evitar bouncing
  delay(100);
 }
}
