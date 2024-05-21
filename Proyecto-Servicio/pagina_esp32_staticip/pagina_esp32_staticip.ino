#include <WiFi.h>

WiFiServer server(80);
const char* ssid = "Totalplay-F5A0";
const char* password = "F5A0BFBF39487jMh";
const char* host     = "serv.com";
const char* url      = "/index.html";
IPAddress locaIP(192, 168, 100, 90);
IPAddress gateway(192, 168, 1, 1);
IPAddress subnet(255, 255, 0, 0);

const int in1 = 12;
const int in2 = 14;
const int in3 = 27;
const int in4 = 26;
const int tim = 15;

int contconexion = 0;

String header; 

String estado = "";

String pagina = "<!DOCTYPE html>"

"<html>"
"<head>"
"<meta charset='utf-8' />"
"<style type='text/css'>body{ "
"background-image:url('https://gacetamedica.com/wp-content/uploads/2020/05/GettyImages-1163558249-1024x683.jpg');"
"background-size:cover;}"
"h1{FONT-SIZE: 40pt;}"
"h2{FONT-SIZE: 30px; margin-bottom:50px;}"
".boton{text-decoration:none;padding:15px;color:#ffffff;background-color:#53FF53;border-radius:6px;border:4px solid#00c700;border-style:ridge;}"
".boton:hover{color:#53FF53; background-color:#ffffff;}"
"</style>"
"<title>sembrador</title>"
"</head>"
"<body><center>"
"<h1><u><i><b> Dispositivo IoT Sembrador de Semillas </b></i></u></h1>"

"<h2><u> Control de Disparos </u></h2>"
"<h2><a href='/disparo' class='boton'>1 Diparo</button></a></h2>"
"<h2><a href='/3disparo' class='boton'>5 Diparos</button></a></h2>"
"<h2><a href='/stop'class='boton'>Paro</button></a></h2>"

"<h2> Descripcion </h2>"
"<h3><i> Dispositivo controlado por medio del microcontrolador ESP32 para el control de disparos de semillas, el cual tiene una conexión via WIFI </i></h3>"

"<h2> Diseño </h2>"

"</center></body>"
"</html>";

void setup() {
  Serial.begin(115200);
  Serial.println("");  

  if(!WiFi.config(locaIP, gateway, subnet)){
    Serial.println("error de configuracion");
  }
  
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED and contconexion <10) { 
    ++contconexion;
    delay(500);
    Serial.print(".");
  }
  if (contconexion <10) {
   
      Serial.println("");
      Serial.println("WiFi conectado :3");
      Serial.println("ESP32 IP: ");
      Serial.println(WiFi.localIP());
      server.begin(); 
  }
  else { 
      Serial.println(" ");
      Serial.println("Error de conexion");
      Serial.println("Reinicie el ESP32 ");
  }

  pinMode(in1, OUTPUT);
  pinMode(in2, OUTPUT);
  pinMode(in3, OUTPUT);
  pinMode(in4, OUTPUT);
}

void loop() {
  WiFiClient client = server.available();

  if(client){
    Serial.println("New Client");
    String currentLine = "";
    while(client.connected()){
      if(client.available()){
        char c = client.read();
        Serial.write(c);
        header += c;
        if(c == '\n'){
          if(currentLine.length()==0){
            client.println("HTTP/1.1 200 OK");
            client.println("Content-type:text/html");
            client.println("Connection: close");
            client.println();

            if(header.indexOf("GET /disparo") >=0){
              Serial.println("GPIO diparo");
              Serial.println("1 Disparo");
              Serial.print("Estado ON .... ");
              estado = "disparo";
              for(int i=0; i<=512;i++){
                //Primer paso
                digitalWrite(in1, HIGH);
                digitalWrite(in2, LOW);
                digitalWrite(in3, LOW);
                digitalWrite(in4, LOW);
                delay(tim);

                digitalWrite(in1, LOW);
                digitalWrite(in2, LOW);
                digitalWrite(in3, HIGH);
                digitalWrite(in4, LOW);
                delay(tim);
              }
            }else if(header.indexOf("GET /3disparo")>=0){
              Serial.println("GPIO 3diparo");
              Serial.println("5 Disparos");
              Serial.print("Estado ON .... ");
              estado = "3disparo";
              for(int i=0; i<=512;i++){
                //Primer paso
                digitalWrite(in1, HIGH);
                digitalWrite(in2, LOW);
                digitalWrite(in3, LOW);
                digitalWrite(in4, LOW);
                delay(tim);

                //segundo paso
                digitalWrite(in1, LOW);
                digitalWrite(in2, LOW);
                digitalWrite(in3, HIGH);
                digitalWrite(in4, LOW);
                delay(tim);

                //Primer paso
                digitalWrite(in1, HIGH);
                digitalWrite(in2, LOW);
                digitalWrite(in3, LOW);
                digitalWrite(in4, LOW);
                delay(tim);

                //segundo paso
                digitalWrite(in1, LOW);
                digitalWrite(in2, LOW);
                digitalWrite(in3, HIGH);
                digitalWrite(in4, LOW);
                delay(tim);

                 //Primer paso
                digitalWrite(in1, HIGH);
                digitalWrite(in2, LOW);
                digitalWrite(in3, LOW);
                digitalWrite(in4, LOW);
                delay(tim);                
              }              
            }else if(header.indexOf("GET /stop") >=0){
                Serial.println("GPIO stop");
                Serial.println("Presione nuevamente para disparar");
                Serial.print("Estado OFF .... ");
                estado="stop";
                for(int i=512; i>=0; i--){
                  digitalWrite(in1, LOW);
                  digitalWrite(in2, LOW);
                  digitalWrite(in3, LOW);
                  digitalWrite(in4, LOW);
                  delay(tim);
                }
              }
              client.println(pagina);
              client.println();
              break;
          }else{
            currentLine="";
          }
        }else if(c != '\r'){
          currentLine += c;
        }
      }
    }

    header = "";

    client.stop();
    Serial.println("Client Disconnected");
    Serial.println("");
  }
}
