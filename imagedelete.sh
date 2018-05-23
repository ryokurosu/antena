# rm `find public/images/* | grep -v "noimage.jpg" | tail -n+3001` 2> /dev/null
# find public/images/* -type f -not -name "noimage.jpg" -print0 | xargs -0 rm -rf
find public/images/* -type f -not -name "noimage.jpg" -mtime +7 -exec rm -f {} \;
# find public/images/* -type f -not -name "noimage.jpg" -print0 | xargs -0 rm -rf

