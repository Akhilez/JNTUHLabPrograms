#include <sys/types.h>
#include <unistd.h>
#include <stdio.h>
#include<dirent.h>
#include<stdlib.h>
#include <fcntl.h>
void main()
{
DIR *dp;
struct dirent *p;
char dname[20];
struct stat x;
printf("Enter the directory name:");
scanf("%s",dname);
dp=opendir(dname);
printf("\n FILE NAME\t INODE NUMBER\n");
while((p=readdir(dp))!=NULL)
{
printf("%s\t %ld\n",p->d_name,x.st_ino);
}
}
