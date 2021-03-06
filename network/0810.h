#include <stdio.h>
#include <stdlib.h>
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

void matrix_file2array(int f, int *matrix) {
	FILE *input;
	char file_name[50];
	char c;
	char buffer[30];
	int buffer_index, value;
	int n = 22835*22835;
	sprintf(file_name,"8points_female_local_matrix.%d.txt",f);
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
	}
	fclose(input);
}
/*
void outputStatistic(int range_counter[103], double max, int f, int amount) {
	char file_name[50];
	double left, right, range;
	FILE *output;
	sprintf(file_name,"%d_statistc%d.txt", amount, f);
	output = fopen(file_name,"w");
	range = max/100;
	for(int i=0; i<100; i++) {
		left = range*i;
		right = range*(i+1);
		fprintf(output,"%f ~ %f : %d\n",left,right,range_counter[i]);
	}
	fprintf(output,"ZERO : %d\n",range_counter[102]);
	fprintf(output,"-1 : %d\n",range_counter[101]);
	fprintf(output,"MAX : %.12lf\n",max);
	fclose(output);
}


void RangeCounter( double value, int range_counter[103], double range) {
    if( value == 0 ) {
        range_counter[102]++;
        range_counter[0]++;
    }
    else if( value == -1.0 ) range_counter[101]++;
    else {
         for( int i=99; i>=0; i--) {
              if( value >= range*i ) {
                  range_counter[i]++;
                  break;
              }
         }
    }
}
*/
void output(int start, int end, int *neuroindex, int amount, char neuroListOri[22835][20]) {
	char name[][10] = {"sog_l", "sog_r", "ammc_l", "ammc_r", "al_l", "al_r", "mb_l", "mb_r", "sdfp_l", "sdfp_r", "fb_l", "fb_r", "lat_l", "lat_r", "eb_l", "eb_r", "nod_l", "nod_r", "dmp_l", "dmp_r", "pan_l", "pan_r", "idfp_l", "idfp_r", "cmp_l", "cmp_r", "cvlp_l", "cvlp_r", "vmp_l", "vmp_r", "ccp_l", "ccp_r", "pcb_l", "pcb_r", "cal_l", "cal_r", "fspp_l", "fspp_r", "spp_l", "spp_r", "vlp_l", "vlp_r", "optu_l", "optu_r", "dlp_l", "dlp_r", "idlp_l", "idlp_r", "lh_l", "lh_r", "og_l", "og_r", "lob_l", "lob_r", "lop_l", "lop_r", "med_l", "med_r"};
	int i, j, x, y, n_index, zone, counter, value, edges;
	int *matrix;
	int m=22835*22835;
	FILE *output;
	char file_name[50];
	for(zone=start; zone<=end; zone++) {
		if(zone == 59) break;
		matrix = (int *)malloc((m+1)*sizeof(int));
		printf("matrix_file2array start\n");
		matrix_file2array(zone, matrix);
		printf("matrix_file2array over\n");
		for(n_index=0; n_index<amount; n_index++) {
			edges = 0;
			sprintf(file_name, "%s.txt", neuroListOri[neuroindex[n_index]]);
			output = fopen(file_name, "a");
			x = neuroindex[n_index]+1;
			for(i=1; i<=22835; i++) {
				value = matrix[i+(x-1)*22835];
				if(value == 0) continue;
				fprintf(output, "%s %s %d %d\n", name[zone-1], neuroListOri[i-1], zone, value);
				edges += value;
			}
			if(edges > 0) fprintf(output, "%s %s %d %d\n", neuroListOri[x-1], name[zone-1], zone, edges); //A��ZONE �u�s1��
			//fprintf(output, "%s %s 60\n", neuroListOri[x-1], neuroListOri[x-1]);
			//if(zone == end) fprintf(output, "?");
			fclose(output);
		}
		free(matrix);
	}
	if(end == 59) {
		matrix = (int *)malloc((m+1)*sizeof(int));
		printf("matrix_file2array start\n");
		matrix_file2array(zone, matrix);
		printf("matrix_file2array over\n");
		for(n_index=0; n_index<amount; n_index++) {
			sprintf(file_name, "%s.txt", neuroListOri[neuroindex[n_index]]);
			output = fopen(file_name, "a");
			x = neuroindex[n_index]+1;
			for(i=1; i<=22835; i++) {
				value = matrix[i+(x-1)*22835];
				if(value == 0) continue;
				fprintf(output, "%s %s %d %d\n", neuroListOri[neuroindex[n_index]], neuroListOri[i-1], zone, value);
			}
			//if(zone == end) fprintf(output, "?");
			fclose(output);
		}
		free(matrix);
	}
	
}

void CytoscapeScriptCreater(int amount, int *neuroindex, char neuroListOri[22835][20]) {
	char file_name[50];
	char file_name2[50];
	FILE *output;
	output = fopen("CytoscapeScript.txt","w");
	for(int i=0; i<amount; i++) {
		sprintf(file_name, "%s.txt", neuroListOri[neuroindex[i]]);
		//sprintf(file_name, "%d_result_Name%d.txt", amount, i);
		fprintf(output,"network import file file=\"H:\\8point\\%s\" indexColumnSourceInteraction=1 indexColumnTargetInteraction=2 indexColumnTypeInteraction=3\n",file_name);
		sprintf(file_name2, "%s_picture", file_name);
		fprintf(output,"layout attribute-circle spacing=200\n");
		fprintf(output,"vizmap apply styles=01\n");
		fprintf(output,"view fit content\n");
		fprintf(output,"view export OutputFile=\"%s\" options=PNG\n", file_name);
		fprintf(output,"network destroy network=current\n");
	}
	/*
	sprintf(file_name, "%d_result_NameALL.txt", amount);
	fprintf(output,"network import file file=\"H:\\n2n0_matrix\\%s\" indexColumnSourceInteraction=1 indexColumnTargetInteraction=2 indexColumnTypeInteraction=3\n",file_name);
	sprintf(file_name, "%d_pictureALL", amount);
	fprintf(output,"layout attribute-circle spacing=200\n");
	fprintf(output,"vizmap apply styles=01\n");
	fprintf(output,"view export OutputFile=\"%s\" options=PNG\n", file_name);
	fprintf(output,"network destroy network=current\n");*/
	fprintf(output, "command quit");
	fclose(output);
}
