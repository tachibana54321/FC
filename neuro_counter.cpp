#include <stdlib.h>
#include <stdio.h>
#include <string.h>
#include <iostream>
using namespace std;
void getID(char *buffer, int i, int *getcounter, char neuroList[25000][25], int counter[22835]) {
    bool a=true,b=true;
    char name[2][25];
    buffer[i] = '\0';
	sscanf(buffer, ">%[^_]%*[^|]|%[^_]", &name[0], &name[1]);
	//cout << name[0] << " | " << name[1] << endl;
	for(int j=0; j<*getcounter; j++) {
		if( strcmp(name[0],neuroList[j]) == 0 ) {
            counter[j]++;
            a = false;
            }
		if( strcmp(name[1],neuroList[j]) == 0 ) {
            counter[j]++;
            b = false;
            }
		if(!a && !b) break;
        }
    //cout << a << " | " << b << endl;
    if(a) {
        strcpy(neuroList[*getcounter],name[0]);
        counter[*getcounter]++;
        *getcounter = *getcounter+1;
        //printf("%d\t",*getcounter);
        //printf("%s\n",name[0]);
        system("pause");
        }
    if(b) {
        counter[*getcounter]++;
        strcpy(neuroList[*getcounter],name[1]);
        *getcounter = *getcounter+1;
        //printf("%d\n",*getcounter);
        //printf("%s\n",name[1]);
        }
     }

int main() {
    FILE *data;
    FILE *list;
    char *buffer;
    char file_name[15];
    char c;
    char neuroList[25000][25];
    bool close = false;
    int progress = 0;
    int getcounter = 0;
    int counter[22835] = {0};
    int counterb = 0;
    int buffer_index;
    list = fopen("neuro_list_count.txt","w");
	for(int i=0; i<5; i+=50) {
        close = false;
		sprintf(file_name,"output.%d.txt",i);
		data = fopen(file_name,"r");
		while(true) {
            c = 0;
            buffer = (char*)calloc(1500,sizeof(char));
            buffer_index = 0;
            if(progress == 8) progress = 0;
            while(c != '\n') {
        		if((c = fgetc(data)) == -1) {
                	close = true;
                    break;
                    }
        		buffer[buffer_index] = c;
        		buffer_index++;
        		//if(getcounter >= 22735) printf("%c",c);
            }
            if(close) break;
            switch(progress) {
            case 0:
            	getID(buffer, buffer_index-1, &getcounter, neuroList, counter);
             	progress++;
             	counterb++;
             	printf(".");
             	break;
            default:
                progress++;
                break;
            }
            free(buffer);
        }
        
        fclose(data);
	}
	//for(int i=0; i<getcounter; i++) {
            /*int j=0;
            while(true) {
                    c = neuroList[i][j];
                    if(c == '\n') break;
                    printf("%c",c);
                    fprintf(list,"%c",c);
                    j++;
                    }*/
           /* printf(" i = %d\tlen = %d",i,strlen(neuroList[i]));
            fwrite(neuroList[i],strlen(neuroList[i]),1,list);
            fprintf(list,"\n");
            //printf("\n");
            }*/
	
	free(data);
	free(list);
	for(int i=0; i<getcounter; i++) { 
        fwrite(neuroList[i],strlen(neuroList[i]),1,list);
        fprintf(list," %d\n",counter[i]);
        //if(counter[i] != 99) printf("%d ",counter[i]);
        }
	printf("data counter = %d \n",getcounter);
	printf("counterB = %d\n",counterb);
	fclose(data);
	fclose(list);
	system("pause");
	return 0;
}
