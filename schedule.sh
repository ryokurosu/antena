
cd `dirname $0`
for filename in `find antena_* -maxdepth 0 -type d`

do
cd $filename
nohup /usr/bin/php7.1 artisan schedule:run &
cd ..
mv $filename/update.sh update.sh
done

MSG=`sh update.sh`
echo $MSG