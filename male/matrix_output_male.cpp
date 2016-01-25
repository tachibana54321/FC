#include <stdlib.h>
#include <String.h>
#include <stdio.h>

void RangeCounter( double value, int range_counter[103]) {
    if( value == -1.0 ) range_counter[101]++;
    else if( value == 1.0 ) range_counter[100]++;
    else if( value == -2.0 ) range_counter[102]++;
    else {
         for( int i=99; i>=0; i--) {
              if( value + (0.01*(100-i)) >= 1.0 ) {
                  range_counter[i]++;
                  break;
                  }
              }
         }
    }

int main() {
    FILE *intable,*outtable,*rangetable;
    char file_name[50];
    char *buffer;
    char c;
    int n = 5738*5738;
    int counter;
    int index[2];
    int x,y,buffer_index,array_index,start,end;
    do{
       printf("Start(0~59):");
       scanf("%d",&start);
       } while(start < 0 || start > 59);
    
    do{
       printf("end(%d~59):",start);
       scanf("%d",&end);
       } while(end < start || end > 59);
    
    int range_counter[103];
    double *array;
    double value;
    array = (double *)malloc((n+1)*sizeof(double));
    for(int f=start; f<=end; f++) {
        for(int i=0; i<103; i++) range_counter[i] = 0;
        for(int i=1; i<=n; i++) array[i] = -2;
        sprintf(file_name,"H:\\n2n0_M\\matrix\\result_matrix%d.txt",f);
        outtable = fopen(file_name,"w");
        sprintf(file_name,"W:\\n2n0_M\\matrix\\range_counter%d.txt",f);
        rangetable = fopen(file_name,"w");
        counter = 0;
        printf("array ok\n");
        for(int ff=0; ff<2; ff++) {
            sprintf(file_name,"male_outtable%d.%d.txt",f,ff);
            intable = fopen(file_name,"r");
            int progress = 0;
            while(true) {
                c = 0;
                buffer = (char *)calloc(1500,sizeof(char));
                buffer_index = 0;
                if(progress == 2) {
                    x=index[0]+1;
                    y=index[1]+1;
                    array[x+(y-1)*5738] = value;
                    array[y+(x-1)*5738] = value;
                    progress = 0;
                    counter++;
                    //printf("matrix:%d x:%d y:%d %d\n",f,x,y,counter);
                    //if( counter > 200000000 )printf("matrix:%d x:%d y:%d %d\n",f,x,y,counter);
                    if( counter%100000000 == 0 )printf("matrix:%d x:%d y:%d %d\n",f,x,y,counter);
                    }
                //while(c != '\n' && !feof(intable)) {
                while(c != '\n' && c != '?') {
                    c = fgetc(intable);
                    buffer[buffer_index] = c;
                	buffer_index++;
                    }
                buffer[buffer_index] = '\0';
                if( c == '?' ) break;
                //if(feof(intable)) break;
                switch(progress) {
                case 0:
                     sscanf(buffer,">%d&%d",&index[0],&index[1]);
                     progress++;
                     break;
                case 1:
                     sscanf(buffer,"%lf ",&value);
                     progress++;
                     break;
                default:
                     printf("error progress>1");
                     system("pause");
                     }
                free(buffer);    
                }
            fclose(intable);
            } //for(0~4) end
        printf("writing\n");
        /*for(int i=0; i<5738; i++) {
            for(int j=0; j<22834; j++) {
                RangeCounter(array[j+i*22834],range_counter);
                fprintf(outtable,"%.12lf ",array[j+i*22834]);
                }
                fprintf(outtable,"\n");
            }*/
        for(int i=1; i<=n; i++) {
            RangeCounter(array[i],range_counter);
            fprintf(outtable,"%.12lf ",array[i]);
            if(i%5738 == 0) fprintf(outtable,"\n");
            }
        fclose(outtable);
        for(int i=0; i<100; i++) fprintf(rangetable,"%.4f~%.4f : %d\n",i*0.01,i*0.01+0.0099,range_counter[i]);
        fprintf(rangetable," 1.0 : %d\n",range_counter[100]);
        fprintf(rangetable,"-1.0 : %d\n",range_counter[101]);
        fprintf(rangetable,"-2.0 : %d",range_counter[102]);
        fclose(rangetable);
        } //for(staet2end) end
        

    free(array);
    return 0;
}
/*
       0 = 0.0000~0.0099
       1 = 0.0100~0.0199
              .
              .
              .
       9 = 0.0900~0.0999
      10 = 0.1000~0.1099
      11 = 0.1100~0.1199
              .
              .
              .
      99 = 0.9900~0.9999
      100 = -1
      101 = 1*/
