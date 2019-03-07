#!bin/bash
git add .


time3=$(date "+%Y-%m-%d %H:%M:%S")
git commit -m '$time3'
echo $time3

git push -u origin master