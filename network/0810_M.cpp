#include <stdlib.h>
#include <stdio.h>
#include <String.h>
#include "0810_M.h"
/*
�Ƨѿ�
amount=1�� �^�ǩM��neuro�������Ҧ����
*/
int main() {
	int *neuroindex;
	int start, end, i, amount;
	char neuroListOri[22835][20], **neuroListCustom; //�Ҧ�neuro, �Q��ܪ�neuro
	char file_name[50], *pData;
	
	//----------�ϥΪ̿�J----------
	printf("��J�_�lZONE�s�� 59��GOBAL(0~59)�G");
	scanf("%d", &start);
	do {
		printf("��J����ZONE�s��(%d~59)�G",start);
		scanf("%d", &end);
	} while(start > end);
	printf("��J�ɮצW��(<50char)�G");
	scanf("%s", file_name);
	printf("��Jneuro�ƶq�G");
	scanf("%d", &amount);
	/*strcpy(file_name,"642ver.txt");
	amount = 642;*/
	//------------------------------
	
	//----------malloc----------
	printf("malloc start\n");
	//�x�s�ӷ��ɮ�(neuro�M��)��neuro�W�٪��G���r���}�C
	neuroListCustom = (char **)malloc(amount*sizeof(void *));
	for(i=0; i<amount; i++) neuroListCustom[i] = (char *)malloc(20*sizeof(char *));
	printf("malloc over\n");
	
	//�x�s�ӷ��ɮ�(neuro�M��)��neuro�W�ٹ�����index
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
