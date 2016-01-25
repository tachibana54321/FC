void setArray(char neuro_array[22835][20]) {
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
     
struct neuro {
    char name[20];
    int positionPX;
    int positionNX;
    int positionPY;
    int positionNY;
    int positionPZ;
    int positionNZ;
    int none_zero;
    float range; //(PX+NX)*(PY+NY)*(PZ*NZ) 過0者+1 
    float area[59];
	};
	
struct RDATA {
    int positionPX;
    int positionNX;
    int positionPY;
    int positionNY;
    int positionPZ;
    int positionNZ;
    int none_zero;
    float range; //(PX+NX)*(PY+NY)*(PZ*NZ) 過0者+1 
    float area[59];
    };	
    
void getID(char *buffer,int i,neuro *neuro_data) {
    char name[2][20];
    buffer[i] = '\0';
	sscanf(buffer, ">%[^_]%*[^|]|%[^_]", &name[0], &name[1]);
	strcpy(neuro_data[0].name, name[0]);
	strcpy(neuro_data[1].name, name[1]);
    }
    	
void getBoundingBox(char *buffer,int i,int neuro_index,neuro *neuro_data) {
    buffer[i] = '\0';
    int position[6];
    int nonezero;
    int range;
	sscanf(buffer, "%*[^:]: %d %d %d %d %d %d|%d|%d", &position[0], &position[1], &position[2], &position[3], &position[4], &position[5], &nonezero, &range);
	neuro_data[neuro_index].positionNX = position[0];
	neuro_data[neuro_index].positionPX = position[1];
	neuro_data[neuro_index].positionNY = position[2];
	neuro_data[neuro_index].positionPY = position[3];
	neuro_data[neuro_index].positionNZ = position[4];
	neuro_data[neuro_index].positionPZ = position[5];
	neuro_data[neuro_index].none_zero = nonezero;
	neuro_data[neuro_index].range = range;
    }

void getArea(char *buffer,int i,int neuro_index,neuro *neuro_data) {
	buffer[i] = '\0';
	int area[59];
	sscanf(buffer,
    "%*[^:]: %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d",
    &area[0], &area[1], &area[2], &area[3], &area[4],&area[5], &area[6], &area[7], &area[8], &area[9],&area[10], &area[11], &area[12], &area[13],
    &area[14], &area[15], &area[16], &area[17], &area[18],&area[19], &area[20], &area[21], &area[22], &area[23],&area[24], &area[25], &area[26], &area[27], &area[28],
    &area[29], &area[30], &area[31], &area[32], &area[33],&area[34], &area[35], &area[36], &area[37], &area[38],&area[39], &area[40], &area[41], &area[42], &area[43],
    &area[44], &area[45], &area[46], &area[47], &area[48],&area[49], &area[50], &area[51], &area[52], &area[53],&area[54], &area[55], &area[56], &area[57], &area[58]);
    for(int k=0; k<59; k++) neuro_data[neuro_index].area[k] = area[k];
    }

void getBoundingBox(char *buffer, int i, RDATA *R_data) {
    buffer[i] = '\0';
    int position[6];
    int nonezero;
    int range;
	sscanf(buffer, "%*[^:]: %d %d %d %d %d %d|%d|%d", &position[0], &position[1], &position[2], &position[3], &position[4], &position[5], &nonezero, &range);
	R_data[0].positionNX = position[0];
	R_data[0].positionPX = position[1];
	R_data[0].positionNY = position[2];
	R_data[0].positionPY = position[3];
	R_data[0].positionNZ = position[4];
	R_data[0].positionPZ = position[5];
	R_data[0].none_zero = nonezero;
	R_data[0].range = range;
    }
 
void getArea(char *buffer,int i,RDATA *R_data) {
    buffer[i] = '\0';
	int area[59];
	sscanf(buffer,
    "%*[^:]: %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d",
    &area[0], &area[1], &area[2], &area[3], &area[4],&area[5], &area[6], &area[7], &area[8], &area[9],&area[10], &area[11], &area[12], &area[13],
    &area[14], &area[15], &area[16], &area[17], &area[18],&area[19], &area[20], &area[21], &area[22], &area[23],&area[24], &area[25], &area[26], &area[27], &area[28],
    &area[29], &area[30], &area[31], &area[32], &area[33],&area[34], &area[35], &area[36], &area[37], &area[38],&area[39], &area[40], &area[41], &area[42], &area[43],
    &area[44], &area[45], &area[46], &area[47], &area[48],&area[49], &area[50], &area[51], &area[52], &area[53],&area[54], &area[55], &area[56], &area[57], &area[58]);
    for(int k=0; k<59; k++) R_data[0].area[k] = area[k];
} 

int getArrayIndex(char neuro_array[22835][20], neuro *neuro_data, int index) {
    int i;
    int x=0;
    FILE *erroroutput;
    erroroutput = fopen("ERROR.txt","w");
    for(i=0; i<22835; i++) {
        if( strcmp(neuro_array[i], neuro_data[index].name) == 0 ) {
            x = 1;
            break;
        }
    }
    if( x == 0 ) {
        
        fprintf(erroroutput,"i : %d\n",i);
        fprintf(erroroutput,"neuro_data : %s\n",neuro_data[index].name);
        fprintf(erroroutput,"ERROR\n");
        
    }
    fclose(erroroutput);
    if( x == 0)system("pause");
    return i;
}

void caluate(neuro *neuro_data, RDATA *R_data, double result[60]) {
    //printf("R0 = %.1f A0 = %.1f B0 = %.1f \n",R_data[0].area[0],neuro_data[0].area[0],neuro_data[1].area[0]);
    for(int i=0; i<59; i++) {
        if(neuro_data[0].area[i]+neuro_data[1].area[i]-R_data[0].area[i] == 0) result[i] = 0;
        else {
             result[i] = (R_data[0].area[i]/(neuro_data[0].area[i]+neuro_data[1].area[i]-R_data[0].area[i]));
             
        }
	if(neuro_data[0].range+neuro_data[1].range-R_data[0].range == 0) result[59] = 0;
	result[59] = (R_data[0].range/(neuro_data[0].range+neuro_data[1].range-R_data[0].range));
    }
}
    
void outputtest(FILE *output,neuro *neuro_data, RDATA *R_data) {
     int i;
     fwrite(neuro_data[0].name,strlen(neuro_data[0].name),1,output);
     fprintf(output," | ");
     fwrite(neuro_data[1].name,strlen(neuro_data[1].name),1,output);
     fprintf(output,"\n A: ");
     for(i=0; i<59; i++) fprintf(output,"%d ",neuro_data[0].area[i]);
     fprintf(output,"\n B: ");
     for(i=0; i<59; i++) fprintf(output,"%d ",neuro_data[1].area[i]);
     fprintf(output,"\n R: ");
     for(i=0; i<59; i++) fprintf(output,"%d ",R_data[0].area[i]);
     fprintf(output,"\n");
    }
    
void output(FILE *table[60], int indexA, int indexB, double result[60]) {
	//printf("writing...\n");
	for(int i=0; i<60; i++) {
		fprintf(table[i],">%d&%d\n",indexA,indexB);
		fprintf(table[i],"%.12lf\n",result[i]);
		}
	}
/*	
backup space
void getBoundingBox(char *buffer, int i, RDATA *R_data, int R_index) {
    buffer[i] = '\0';
    int position[6];
    int nonezero;
    int range;
	sscanf(buffer, "%*[^:]: %d %d %d %d %d %d|%d|%d", &position[0], &position[1], &position[2], &position[3], &position[4], &position[5], &nonezero, &range);
	R_data[R_index].positionNX = position[0];
	R_data[R_index].positionPX = position[1];
	R_data[R_index].positionNY = position[2];
	R_data[R_index].positionPY = position[3];
	R_data[R_index].positionNZ = position[4];
	R_data[R_index].positionPZ = position[5];
	R_data[R_index].none_zero = nonezero;
	R_data[R_index].range = range;
    }
 
void getArea(char *buffer,int i,int R_index,RDATA *R_data) {
    buffer[i] = '\0';
	int area[59];
	sscanf(buffer,
    "%*[^:]: %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d %d",
    &area[0], &area[1], &area[2], &area[3], &area[4],&area[5], &area[6], &area[7], &area[8], &area[9],&area[10], &area[11], &area[12], &area[13],
    &area[14], &area[15], &area[16], &area[17], &area[18],&area[19], &area[20], &area[21], &area[22], &area[23],&area[24], &area[25], &area[26], &area[27], &area[28],
    &area[29], &area[30], &area[31], &area[32], &area[33],&area[34], &area[35], &area[36], &area[37], &area[38],&area[39], &area[40], &area[41], &area[42], &area[43],
    &area[44], &area[45], &area[46], &area[47], &area[48],&area[49], &area[50], &area[51], &area[52], &area[53],&area[54], &area[55], &area[56], &area[57], &area[58]);
    for(int k=0; k<59; k++) R_data[R_index].area[k] = area[k];
} 
*/
