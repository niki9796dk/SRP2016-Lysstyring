#include <Bridge.h> // Hjælper til at skabe en forbindelse mellem Arduino Yun skjoldet og Arduino Due.
#include <HttpClient.h> // Hjælper til at kunne forbinde og hente data online

//Settings:
#define LEDCOUNT 12   // Antal LED'er der skal styres
String ControlFile = "https://dl.dropboxusercontent.com/u/73239157/arduino.txt"; // API Fil

//Setup
String API[LEDCOUNT]; // Array til opbevaring af data fra API'en
int LED[LEDCOUNT];    // Array til opbevaring af pin ID til hver LED


void setup() {

  // Vi opretter forbindelse mellem Arduino Yun skjoldet og Arduino Due - Dette taget et par sekunder
  Bridge.begin();

  // Vi åbner en serial moniter
  SerialUSB.begin(9600);

  //Vi giver hver LED en port og sætter den til OUTPUT
  for (int i = 0; i < LEDCOUNT; i++){

      //Vi starter ved output port 2 da port 0 og 1 anvendes af arduinoer til andre handlinger.
      LED[i] = (2 + i);
    
    pinMode(LED[i], OUTPUT);
  }
  
}

void loop() {
  // Vi starter client biblioteket
  HttpClient client;

  // Vi opretter en HTTP anmodning til vores API og henter data
  client.get(ControlFile);

  // Hvis der blev oprettet forbindelse til API'en og der er data tilgænelig
  // Så skal det læses og behandles
  if (client.available()) {

    // For hver LED der styres læser vi et nyt datapunkt i vores API data.
    // Hvis dataen for den givne LED er lig med 1 tændes LED'en, ellers slukkes den.
    for (int i = 0; i < LEDCOUNT; i++){

      // API Format: ?:?:?:?:?:?:?:?:?:?:?:?
      // ? = 1 eller 0
      API[i] = client.readStringUntil(':');

      // BUG: Af ukendt årsag så sættes den sidste LED med et delay på 1 sekund.
      if (API[i] == "1"){
        digitalWrite(LED[i], HIGH);
      }else{
        digitalWrite(LED[i], LOW);
      }
      
    }
    
    
  }
  
  // Vi sletter alt overskydende data
  SerialUSB.flush();

  // Kort delay for ikke at overflow API'en
  delay(500);
}
