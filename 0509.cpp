#include <stdlib.h>
#include <stdio.h>
#include <String.h>
#include <math.h>
#include "0509.h"
#include <iostream>
using namespace std;
//��@�Ӥ��i��X�{���ӼƷ�result���w�]��
//�̫��ˬd�O�_�X�{�ӼƭȥH�T�{�O�_�����~
//0�]�n��X 
int main() {
	FILE *data, *table[60], *log;
	char neuro_array[22835][20];
	setArray(neuro_array); //neuro_array���x�}��xy�b 
	neuro *neuro_data;
	RDATA *R_data;
	R_data = new RDATA;
	neuro_data = new neuro[2];
	char *buffer,c;//Ū�ɼȦs�� �@��Ū�@�� 
	char file_name[50];
	int start,end,sequence;
	cout << "��J�_�l�ɮ׽s��(0~228)�G";
	cin >> start;
	cout << "��J�����ɮ׽s��(0~228)�G"; 
	cin >> end;
	cout << "�o�O�ĴX�]?(0~)�G";
	cin >> sequence;
	int buffer_index = 0;//buffer��index 
    int neuroA_ArrayIndex = -1; //neuroA�b�x�}����index 
    int neuroB_ArrayIndex = -1; //neuroB�b�x�}����index 
    int progress;//�C���U�@��Y+1 Ū���@����ƫ��k0 */
    int counter;
    double area_result[60];
   	for(int ii=0; ii<60; ii++) area_result[ii] = -1;
	for(int i=0; i<60; i++) {
		sprintf(file_name,"H:\\new60table\\outtable%d.%d.txt",i,sequence);
		table[i] = fopen(file_name,"w");
		}
	sprintf(file_name,"log%d.txt",sequence);	
	log = fopen(file_name,"w");
    for(int f=start; f<=end; f++) {
        printf("output.%d.txt start\n",f);
        fprintf(log,"output.%d.txt start\n",f);
        sprintf(file_name,"output.%d.txt",f);
        data = fopen(file_name,"r");
        progress = 0;
        counter = 0;
    	while(true) {
            c = 0;
            buffer = (char*)calloc(500,sizeof(char));
            buffer_index = 0;
            if(progress == 8) {
                progress = 0;
                neuroA_ArrayIndex = getArrayIndex(neuro_array,neuro_data,0);
                neuroB_ArrayIndex = getArrayIndex(neuro_array,neuro_data,1);
                caluate(neuro_data, R_data, area_result);
                output(table,neuroA_ArrayIndex,neuroB_ArrayIndex,area_result);
                counter++;
                //printf("%s | %s\n",neuro_data[0].name,neuro_data[1].name);
                //printf("%d %d  start:%d end:%d\n",f,counter,start,end);
                }
            while(c != '\n' && !feof(data)) {
        		c = fgetc(data);
        		buffer[buffer_index] = c;
        		buffer_index++;
            }
            if(feof(data)) break;
            switch(progress) {
            case 0:
            	getID(buffer, buffer_index-1, neuro_data);
             	progress++;
             	break;
             	
            case 1:
                progress++;
                getBoundingBox( buffer, buffer_index-1, 0, neuro_data);
                break;
                
            case 2:
                progress++;
                getBoundingBox( buffer, buffer_index-1, 1, neuro_data);
                break;
            case 3:
                getBoundingBox(buffer, buffer_index-1, R_data);
                progress++;
                break;
            case 4:
                progress++;
                getArea( buffer, buffer_index-1, 0, neuro_data);
                break;
            case 5:
                progress++;
                getArea( buffer, buffer_index-1, 1, neuro_data);
                break;
            case 6:
                progress++;
                getArea( buffer, buffer_index-1, R_data);
                break;
                
            case 7:
                progress++;
                break;
            default:
                progress++;
                break;
                
                }
            free(buffer);
    	}
    	fclose(data);
    	printf("output.%d.txt fin\n",f);
        fprintf(log,"output.%d.txt fin\n",f);
    }
	free(data);
    for(int i=0; i<60; i++) {
            fprintf(table[i],"?");
            fclose(table[i]);
            }
    fclose(log);
    printf("%d of 60table fin\n",sequence);
    /*for(int i=0; i<22735; i++) {
            printf("len = %d\t",strlen(neuro_array[i]));
            for(int j=0; j<strlen(neuro_array[i]); j++) printf("%c",neuro_array[i][j]);
        }*/
    /*FILE *range;
    range = fopen("range_counter.txt","w");
    for(float i=0.0; i<10.0; i++) {
        fprintf(range,"%.4f~%.4f: %d\n",i/10.0,i/10.0+0.0999,range_counter[(int)i]);
        printf("%.4f~%.4f: %d\n",i/10,i/10+0.0999,range_counter[(int)i]);
        }
    fprintf(range,"-1: %d\n",range_counter[10]);
    printf("-1: %d\n",range_counter[10]);
    fprintf(range,"1: %d\n",range_counter[11]);
    printf("1: %d\n",range_counter[11]);
    fclose(range);*/
    system("pause");
    return 0;
}
