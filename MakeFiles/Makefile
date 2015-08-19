all: enciendeApaga

enciendeApaga: enciendeApaga.c
	gcc -o enciendeApaga enciendeApaga.c -lwiringPi

.c.o:
	gcc -c $< -o $@

clean: 
	rm enciendeApaga
