# 查看进程统计访问数
###cat tp6.mall.access.log | awk '{print $4}' | uniq -c | sort -r
###cat tp6.mall.access.log | grep "index/mmm" |awk '{print $4}' | uniq -c | sort -r

#vue 设置
###set NODE_OPTIONS=--openssl-legacy-provider