#include <unistd.h>
            #include <stdio.h>
            #include <fcntl.h>
            int main(){
            int fd1, fd2;
            char buf[1024];
            int nread,ch;
            char src[20],dest[20];
            printf("1. cat\n2. mv\nEnter your choice\n");
            scanf("%d",&ch);
            switch(ch)
            {
                case 1:
                    printf("Enter filename to display\n");
                    scanf("%s",src);
                    fd1 = open (src, O_RDONLY);
                    printf("The contents of copied file are\n");
                    while ((nread = read (fd1, buf, sizeof (buf))) > 0)
                    write (1, buf, nread);
                    close(fd1);
                    break;
                case 2:
                    printf("Enter filename to move\n");
                    scanf("%s",src);
                    printf("Enter filename to store\n");
                    scanf("%s",dest);
                    fd1 = open(src, O_RDONLY);
                    fd2 = open(dest, O_CREAT|O_WRONLY|O_TRUNC,0666);
                    while((nread=read(fd1, buf, sizeof(buf))) > 0)
                    {
                        write(fd2, buf, nread);
                    }
                    close(fd2);
                    close(fd1);
                    nread=remove(src);
                    if(nread==0)
                    {
                        printf("%s renamed to %s\n",src,dest);
                    }
                    fd1 = open(dest, O_RDONLY);
                    while((nread=read(fd1, buf, sizeof(buf))) > 0)
                    {
                        write(1, buf, nread);
                    }
                    break;
                        default:
                    printf("Wrong Choice\n");
            }
            }