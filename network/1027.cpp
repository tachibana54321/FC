#include "1027.h"

using namespace std;
/*
�Ƨѿ�
amount=1�� �^�ǩM��neuro�������Ҧ����

20160408
�q�쥻��ܭn�]up��downstream�u���code�令�i�H�b��J�ɫ��w
��J���| .\upStreamMatrix\ �M .\downStreamMatrix\
��X���| .\upStream\ �M .\downStream\
��Ƨ��ݨƥ���ʫئn
*/
int main() {
	int *neuroindex;
	int start, end, i, amount, direct;
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
	printf("��J��V(0=up 1=down)�G");
	scanf("%d", &direct);
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
	output(start, end, neuroindex, amount, neuroListOri, direct);
	printf("output end\n");
	free(neuroListCustom);
	free(neuroindex);
	system("pause");
	return 0;
}
