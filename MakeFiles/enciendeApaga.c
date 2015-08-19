#include <wiringPi.h>
#include <stdio.h>

int main(int argc, char *argv[])
{
	wiringPiSetup();
	printf("ECHO lectura: %i", digitalRead(7));
	if (digitalRead(7) == 0){
		pinMode(7, 1);
		digitalWrite(7, 1);
		printf("ECHO Enciende!");
	}else{
		digitalWrite(7, 0);
		pinMode(7, 1);
		printf("ECHO Apaga!");
	}
	return 0;
}
