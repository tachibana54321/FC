#include <stdlib.h>
#include <stdio.h>
#include <String.h>
/*
7/9
name_result_NameALL輸出格式更改 A&B zone → A B ZONE
*/
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
     

int main() {
    FILE *input,*output,*all;
    char neuro_array[22835][20];
    char file_name[50];
    char user_input[50];
    char c,*buffer;
    int progress, counter, buffer_index, none_zero_counter[60], index[2], amount, cycle, start, end;
    double value;
    printf("輸入檔案名稱(格式為%%s%%d.txt只需輸入%%s部份)：");
    scanf("%s",user_input);
    printf("輸入分割數量(沒分割則輸入1)\n");
    printf("最終檔名為%%s%%d.%%d.txt 分割為1時則為%%s%%d.txt：");
    scanf("%d",&cycle);
    printf("輸入啟始zone編號(0~59)：");
    scanf("%d",&start);
    printf("輸入結束zone編號(0~59)：");
    scanf("%d",&end);
    setArray(neuro_array);
    sprintf(file_name,"%s_NameALL.txt",user_input);
    all = fopen(file_name,"w");
    for(int f=start; f<=end; f++) {
        counter=0;
        none_zero_counter[f]=0;
        sprintf(file_name,"%s_Name%d.txt",user_input,f);
        output = fopen(file_name,"w");
        for(int ff=0; ff<cycle; ff++) {
            if( cycle > 1 ) sprintf(file_name,"%s%d.%d.txt",user_input,f,ff);
            else if ( cycle == 1 ) sprintf(file_name,"%s%d.txt",user_input,f);
            else {
                printf("cycle error");
                system("pause");
                return 0;
            }
            printf("%s\n",file_name);
            input = fopen(file_name,"r");
            progress = 0;
        	while(true) {
                c = 0;
                buffer = (char*)calloc(500,sizeof(char));
                buffer_index = 0;
                if(progress == 2) {
                    progress = 0;
                    counter++;
                    if( value != 0 ) {
                        //A&B point
                        fprintf(output,"%s&%s %.12lf\n",neuro_array[index[0]],neuro_array[index[1]],value);
                        //A&B zone
                        fprintf(all,"%s %s %d\n",neuro_array[index[0]],neuro_array[index[1]],f);
                        none_zero_counter[f]++;
                        }
                    if( counter%50000000 == 0 ) printf("outtable%d %d\n",f,counter);
                    }
                    
                    
                while(c != '\n' && c != '?') {
                    c = fgetc(input);
                    buffer[buffer_index] = c;
                	buffer_index++;
                    }
                buffer[buffer_index] = '\0';
                if( c == '?' ) break;
                switch(progress) {
                case 0:
                	sscanf(buffer,">%d&%d",&index[0],&index[1]);
                 	progress++;
                 	break;
                 	
                case 1:
                    progress++;
                    sscanf(buffer,"%lf ",&value);
                    break;
                    
                default:
                    printf("error outtable%d.%d.txt %d",f,ff,counter);
                    system("pause");
                    break;
                    }
                free(buffer);
                }
            fclose(input);
            }
        fclose(output);
        }
    sprintf(file_name,"%s_NenoZeroCounter.txt",user_input);
    output = fopen(file_name,"w");
    for(int i=0; i<60; i++) fprintf(output,"zone%d %d\n",i,none_zero_counter[i]);
    fclose(output);
    fclose(all);
    free(input);
    free(output);
    system("pause");
    return 0;
    }
