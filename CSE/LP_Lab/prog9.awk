{nc=nc+length($0);nw=nw+NF}
END { printf "The no of characters is %d \n no of words is %d \n no of lines is %d in a file",nc,nw,NR}