#include <stdlib.h>
#include <stdio.h>
#include <String.h>
#include "0810_M.h"
/*
備忘錄
amount=1時 回傳和該neuro有關的所有資料
*/
int main() {
	int *neuroindex;
	int start, end, i, amount;
	char neuroListOri[22835][20], **neuroListCustom; //所有neuro, 被選擇的neuro
	char file_name[50], *pData;
	
	//----------使用者輸入----------
	printf("輸入起始ZONE編號 59為GOBAL(0~59)：");
	scanf("%d", &start);
	do {
		printf("輸入結束ZONE編號(%d~59)：",start);
		scanf("%d", &end);
	} while(start > end);
	printf("輸入檔案名稱(<50char)：");
	scanf("%s", file_name);
	printf("輸入neuro數量：");
	scanf("%d", &amount);
	/*strcpy(file_name,"642ver.txt");
	amount = 642;*/
	//------------------------------
	
	//----------malloc----------
	printf("malloc start\n");
	//儲存來源檔案(neuro清單)中neuro名稱的二維字元陣列
	neuroListCustom = (char **)malloc(amount*sizeof(void *));
	for(i=0; i<amount; i++) neuroListCustom[i] = (char *)malloc(20*sizeof(char *));
	printf("malloc over\n");
	
	//儲存來源檔案(neuro清單)中neuro名稱對應的index
	neuroindex = (int *)malloc(amount*sizeof(int));
	printf("malloc over\n");
	//---------------------------
	printf("start setOriNeuroArray\n");
	setOriNeuroArray(neuroListOri);
	printf("start file2array\n");
	file2array(neuroListCustom, amount, file_name);
	printf("name2index\n");
	name2index(neuroListOri, neuroListCustom, amount, neuroindex);
	printf("neuro index %d\n",*neuroindex);
	printf("output\n");
	output(start, end, neuroindex, amount, neuroListOri);
	printf("output end\n");
	/*printf("convert neuro index to name start\n");
	outtable_converter(amount, 1, start, end);
	printf("convert neuro index to name end\n");
	printf("CytoscapeScriptCreate start\n");
	CytoscapeScriptCreater(amount, neuroindex, neuroListOri);
	printf("CytoscapeScriptCreate end\n");*/
	//free(pData);
	free(neuroListCustom);
	free(neuroindex);
	system("pause");
	return 0;
}
