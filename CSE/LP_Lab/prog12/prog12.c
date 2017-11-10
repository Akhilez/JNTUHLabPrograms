#include<stdio.h>
#include<sys/stat.h>
#include<dirent.h>
#include<stdlib.h>
void main()
{
DIR *dp;
struct dirent *p;
char dname[20];
printf("Enter the directory name:");
scanf("%s",dname);
dp=opendir(dname);
printf("List of Files\n");
while((p=readdir(dp))!=NULL)
{
printf("%s\n",p->d_name);
}
}