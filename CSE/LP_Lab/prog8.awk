!/[aeiou]/ {++n}
END { printf "the number of lines that don't contain vowels is : %d",n }