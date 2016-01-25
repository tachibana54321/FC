#include <stdio.h>
#include <stdlib.h>
#include <string.h>

void setOriNeuroArray(char neuro_array[22835][20]) {
    FILE *neuro_list;
    char c;
    int buffer_index;
    neuro_list = fopen("neuro_list.txt","r");
    for(int i=0; i<22835; i++) {
        buffer_index = 0;
        c = 0;
        while(true) {
            c = fgetc(neuro_list);
            if( c == '\n' ) break;
      		neuro_array[i][buffer_index] = c;
      		buffer_index++;
        }
        neuro_array[i][buffer_index] = '\0';
    }
    fclose(neuro_list);
}

struct connectionObject {
	char direction; //0=none 1=down 2=up
	int neuronA;
	int neuronB;
	int zone;
	connectionObject *next;
};

char getdirection(FILE *connectiontable, char connectionbuffer[50], char **directionToAll, int neuronOfThisCycle, char zoneContent[60][2]) {
	int objectA, objectB, zone;
	char statusA[10], statusB[10], direction;
	connectionObject *head = NULL, *current = NULL, *prev = NULL;
	
	
	if( strcmp(connectionbuffer, "NULL") != 0 ) {
		do {
			sscanf(connectionbuffer, "%d %s %d %d %s\n", &objectA, &statusA, &zone, &objectB, &statusB);
			if( objectA != neuronOfThisCycle ) return 0;
			if( strcmp(statusA, "Axon") == 0 && strcmp(statusB, "None") != 0 ) { //down
				direction = 1;
			}
			else if( strcmp(statusA, "Dendrite") == 0 && strcmp(statusB, "Axon") == 0 ) { //up
				direction = 2;
			}
			else break;
			current = (connectionObject *)malloc(sizeof(connectionObject));
			current->direction = direction;
			current->neuronA = objectA;
			current->neuronB = objectB;
			current->zone = zone;
			current->next = NULL;
			head = current;
			prev = current;
		} while(false);
	}
	while( fgets(connectionbuffer, 50, connectiontable) != NULL ) {
		sscanf(connectionbuffer, "%d %s %d %d %s\n", &objectA, &statusA, &zone, &objectB, &statusB);
		if( objectA != neuronOfThisCycle ) break;
		if( strcmp(statusA, "Axon") == 0 && strcmp(statusB, "None") != 0 ) { //down
			direction = 1;
		}
		else if( strcmp(statusA, "Dendrite") == 0 && strcmp(statusB, "Axon") == 0 ) { //up
			direction = 2;
		}
		else continue;
		current = (connectionObject *)malloc(sizeof(connectionObject));
		current->direction = direction;
		current->neuronA = objectA;
		current->neuronB = objectB;
		current->zone = zone;
		current->next = NULL;
		if( head == NULL ) head = current;
		else prev->next = current;
		prev = current;
	}
	//printf("directionToAll start\n");
	for(int i=0; i<60; i++) {
		zoneContent[i][0] = 0;
		zoneContent[i][1] = 0;
		for(int j=0; j<22835; j++) {
			directionToAll[i][j] = 0;
			directionToAll[i+60][j] = 0;
		}
	}
	//printf("directionToAll done\n");
	current = head;
	while( current != NULL ) {
		//directionToAll[current->zone][current->neuronB] = current->direction;
		if( current->direction == 1 ) directionToAll[current->zone][current->neuronB] = 1;
		else if ( current->direction == 2 ) directionToAll[(current->zone)+60][current->neuronB] = 1;
		zoneContent[current->zone][(current->direction)-1] = 1;
		//printf("%d → %d in zone %d direction is %c\n", current->neuronA, current->neuronB, current->zone, current->direction);
		prev = current;
		current = current->next;
		free(prev);
	}
	printf("getdirection done\n");
	return 1;
}

int SearchID(char neurolist[22835][20], char target[20]) {
	for(int i=0; i<22835; i++) {
		if( strcmp(neurolist[i], target) == 0 ) return i;
	}
	printf("SearchID Error neuron「%s」is not found\n", target);
	system("pause");
	exit(1);
	return 0;
}

int main() {
	FILE *input, *connectiontable, *down, *up;
	char neurolist[22835][20], filename[25], buffer[50], connectionbuffer[50], downfilename[40], upfilename[40];
	char object1[20], object2[20];
	char thisneuron[20], zoneContent[60][2];
	char **directionToAll, *pData;
	//char connectiontablestartflag = 0;
	char zoneisempty = 0;
	int i, object3, id;
	setOriNeuroArray(neurolist);
	connectiontable = fopen("connectable_F_1041025fix.txt","r");
	strcpy(connectionbuffer, "NULL");
	
	directionToAll = (char **)malloc(120*sizeof(char *));
	pData = (char *)malloc(120*22835*sizeof(char));
	for(i=0; i<120; i++, pData+=22835) directionToAll[i] = pData;
	
	for(i=0; i<22835; i++) {
		sprintf(filename, "%s.txt",neurolist[i]);
		sprintf(downfilename, ".\\downStream\\%s",filename);
		sprintf(upfilename, ".\\upStream\\%s", filename);
		printf("%s start\n", filename);
		input = fopen(filename, "r");
		down = fopen(downfilename, "w");
		up = fopen(upfilename, "w");
		if( getdirection(connectiontable, connectionbuffer, directionToAll, i, zoneContent) == 0 ) {
			fprintf(down,"\n");
			fprintf(up,"\n");
			fclose(down);
			fclose(up);
			fclose(input);
			printf("%s is empty\n", filename);
			continue;
		}
		while( fgets(buffer, 50, input) != NULL ) {
			sscanf(buffer, "%s %s %d\n", &object1, &object2, &object3);
			if( strcmp(neurolist[i], object1) == 0 ) {
				if( zoneContent[object3][0] == 0 && zoneContent[object3][1] == 0 ) {
					zoneisempty = 1;
					continue;
				}
				if( zoneContent[object3][0] == 1 ) fprintf(down, "%s %s %d\n", object1, object2, object3);
				if( zoneContent[object3][1] == 1 ) fprintf(up, "%s %s %d\n", object1, object2, object3);
				zoneisempty = 0;
			}
			else {
				if( zoneisempty == 1 ) continue;
				id = SearchID(neurolist, object2);
				if( directionToAll[object3][id] == 1 ) {
					fprintf(down, "%s %s %d\n", object1, object2, object3);
					//printf("write file downStream %s %s %d\n", object1, object2, object3);
				}
				if( directionToAll[object3+60][id] == 1 ) {
					fprintf(up, "%s %s %d\n", object1, object2, object3);
					//printf("write file upStream %s %s %d\n", object1, object2, object3);
				}
			}
		}
		fclose(down);
		fclose(up);
		fclose(input);
	}
	free(directionToAll);
}
