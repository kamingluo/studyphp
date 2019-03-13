#!bin/bash
#把所有修改暂存仓库
git add .

#提交说明
git commit -m 'kaming提交的修改'

#把修改推送到远程仓库
git push -u origin master

echo "------推送成功--------"