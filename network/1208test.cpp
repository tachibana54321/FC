#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int sss(FILE *test) {
	char connectionbuffer[50];
	fgets(connectionbuffer, 50, test);
	printf("%s\n", connectionbuffer);
	return 0;
}

int main() {
	FILE *test;
	int i;
	test = fopen("connectable_F_1041025fix.txt", "r");
	while(true) {
		i = sss(test);
	}
	return 0;
}