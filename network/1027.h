#include <stdio.h>
#include <stdlib.h>
#include <String.h>
#include <Windows.h>
struct skip {
	int zone;
	skip *next;
};

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

void name2index(char neuroListOri[22835][20], char **neuroListCustom, int amount,int *neuroindex) {
	int i,j;
    for(i=0; i<amount; i++) {
        for(j=0; j<22835; j++) {
            if( strcmp(neuroListOri[j], neuroListCustom[i]) == 0 ) break;
            if( j == 22834 ) {
                printf("ERROR i=%d j=%d\n", i, j);
                printf("cus=%s ori=%s",neuroListCustom[i], neuroListOri[j]);
                system("pause");
            }
        }
        neuroindex[i] = j;
    }
}

void file2array(char **neuroListCustom, int amount, char file_name[50]) {
	int i, buffer_index;
	char c;
	FILE *input;
	input = fopen(file_name,"r");
    for(i=0; i<amount; i++) {
        c = 0;
        buffer_index = 0;
        while(true) {
            c = fgetc(input);
            if( c == '\n' ) break;
      		neuroListCustom[i][buffer_index] = c;
      		buffer_index++;
        }
        neuroListCustom[i][buffer_index] = '\0';
    }
	for(i=0; i<amount; i++) printf("%s\n",neuroListCustom[i]);
	fclose(input);
}

void matrix_file2array(int f, int *matrix, int direct) {
	FILE *input;
	char file_name[150];
	char c;
	char buffer[30];
	int buffer_index, value;
	int n = 22835*22835;
	if(direct == 0) strcpy(buffer, ".\\upStreamMatrix");
	else strcpy(buffer, ".\\downStreamMatrix");
	//sprintf(file_name,"H:\\8point\\connection\\%s\\connectable_F_matrix%d.txt", buffer2, f);
	//system("pause");
	sprintf(file_name,"%s\\connectable_F_matrix%d.txt", buffer, f);
	printf("%s\n", file_name);
	input = fopen(file_name,"r");
	for(int i=1; i<=n; i++) {
		c = 0;
		buffer_index = 0;
		while(c != ' ') {
			c = fgetc(input);
			if( c == '\n') continue;
			buffer[buffer_index] = c;
			buffer_index++;
		}
		buffer[buffer_index] = '\0';
		sscanf(buffer, "%d ", &value);
		matrix[i] = value;
		//if(value != 0 )printf("value = %d\n", value);
	}
	fclose(input);
}

void output(int start, int end, int *neuroindex, int amount, char neuroListOri[22835][20], int direct) {
	char name[][10] = {"sog_l", "sog_r", "ammc_l", "ammc_r", "al_l", "al_r", "mb_l", "mb_r", "sdfp_l", "sdfp_r", "fb_l", "fb_r", "lat_l", "lat_r", "eb_l", "eb_r", "nod_l", "nod_r", "dmp_l", "dmp_r", "pan_l", "pan_r", "idfp_l", "idfp_r", "cmp_l", "cmp_r", "cvlp_l", "cvlp_r", "vmp_l", "vmp_r", "ccp_l", "ccp_r", "pcb_l", "pcb_r", "cal_l", "cal_r", "fspp_l", "fspp_r", "spp_l", "spp_r", "vlp_l", "vlp_r", "optu_l", "optu_r", "dlp_l", "dlp_r", "idlp_l", "idlp_r", "lh_l", "lh_r", "og_l", "og_r", "lob_l", "lob_r", "lop_l", "lop_r", "med_l", "med_r"};
	char alreadyoutput, emptylistempty=0;
	char file_name[80], buffer[5], outputpath[50], emptylistpath[50];
	int i, j, x, y, n_index, zone, counter, value;
	int *matrix;
	int m=22835*22835;
	printf("amount = %d\n", amount);
	if(direct == 0) {
		strcpy(emptylistpath, ".\\upStreamMatrix");
		strcpy(outputpath, ".\\upStream");
	}
	else {
		strcpy(emptylistpath, ".\\downStreamMatrix");
		strcpy(outputpath, ".\\downStream");
	}
	FILE *output, *emptylist;
	skip *current = NULL, *head = NULL, *prev = NULL;
	sprintf(file_name, "%s\\connectable_F_matrix_empty.txt", emptylistpath);
	emptylist = fopen(file_name, "r");
	
	while( fgets(buffer, 5, emptylist) != NULL ) {
		sscanf(buffer, "%d\n", &value);
		if (value < start) continue;
		current = (skip *)malloc(sizeof(skip));
		current->zone = value;
		current->next = NULL;
		if( head == NULL ) head = current;
		else prev->next = current;
		prev = current;
	}
	fclose(emptylist);
	if(head != NULL) current = head;
	else emptylistempty = 1;
	for(zone=start; zone<=end; zone++) {
		if(emptylistempty != 1) {
			if(current->zone == zone) {
				if(current->next != NULL) current = current->next;
				else emptylistempty = 1;
				continue;
			}
		}
		if(zone == 59) break;
		matrix = (int *)malloc((m+1)*sizeof(int));
		printf("matrix_file2array start\n");
		matrix_file2array(zone, matrix, direct);
		printf("matrix_file2array over\n");
		for(n_index=0; n_index<amount; n_index++) {
			
			alreadyoutput = 0;
			sprintf(file_name, "%s\\%s.txt", outputpath, neuroListOri[neuroindex[n_index]]);
			//printf("%s\n",file_name);
			output = fopen(file_name, "a");
			x = neuroindex[n_index]+1;
			for(i=0; i<22835; i++) {
				value = matrix[x+i*22835];
				if(value == 0) continue;
				if(alreadyoutput == 0) {
					fprintf(output, "%s %s %d\n", neuroListOri[x-1], name[zone-1], zone); //A→ZONE 只連1條
					//printf("%s %s %d\n", neuroListOri[x-1], name[zone-1], zone); //A→ZONE 只連1條
					alreadyoutput = 1;
				}
				for(int k=0; k<value; k++) {
					fprintf(output, "%s %s %d\n", name[zone-1], neuroListOri[i], zone);
					//printf("%s %s %d\n", name[zone-1], neuroListOri[i], zone);
				}
			}
			fclose(output);
		}
		free(matrix);
	}
	if(end == 59) {
		matrix = (int *)malloc((m+1)*sizeof(int));
		printf("matrix_file2array start\n");
		matrix_file2array(zone, matrix, direct);
		printf("matrix_file2array over\n");
		for(n_index=0; n_index<amount; n_index++) {
			alreadyoutput = 0;
			sprintf(file_name, "%s\\%s.txt", outputpath, neuroListOri[neuroindex[n_index]]);
			output = fopen(file_name, "a");
			x = neuroindex[n_index]+1;
			for(i=0; i<22835; i++) {
				value = matrix[x+i*22835];
				if(value == 0) continue;
				fprintf(output, "%s %s %d\n", neuroListOri[neuroindex[n_index]], neuroListOri[i], zone);
			}
			fclose(output);
		}
		free(matrix);
	}
	
}