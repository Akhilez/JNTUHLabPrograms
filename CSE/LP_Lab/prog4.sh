for x in $*
do
if [ -d $x ]
then
echo " given name ‘$x’ is directory"
elif [ -f $x ]
then
echo " given name is file: $x"
lines=` wc -l < $x `
echo "No of lines in file are : $lines"
else
echo " given name is not a file or a directory"
fi
done