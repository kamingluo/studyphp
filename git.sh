#!bin/bash
git add .


time3=$(date "+%Y-%m-%d %H:%M:%S")
git commit -m 'Hello, I know you are \"time3\"! \n'
echo $time3

git push -u origin master