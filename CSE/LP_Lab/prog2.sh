echo "Enter the file name"
read filename
echo "Enter word"
read word
echo "File content before delete the lines"
cat $filename
echo "\nFile content after delete the lines"
sed -e /$word/d $filename