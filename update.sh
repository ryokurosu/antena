
cd `dirname $0`
for filename in `find antena_* -maxdepth 0 -type d`

do
cd $filename
echo $filename
~/opt/bin/git init
~/opt/bin/git remote rm origin
~/opt/bin/git remote add origin git://github.com/ryokurosu/antena.git
~/opt/bin/git fetch origin
~/opt/bin/git reset --hard origin/master
~/opt/bin/git submodule init
~/opt/bin/git submodule sync
~/opt/bin/git submodule foreach "(~/opt/bin/git checkout master; ~/opt/bin/git pull)"
~/opt/bin/git submodule update
/usr/bin/php7.1 artisan cache:clear
/usr/bin/php7.1 artisan config:clear
/usr/bin/php7.1 artisan route:clear
/usr/bin/php7.1 artisan view:clear
filepublic=${filename:7}
find public/images/* -type f -not -name "noimage.jpg" -mtime +7 -exec rm -f {} \;
find public/thumbnail/* -type f -not -name "noimage.jpg" -mtime +7 -exec rm -f {} \;
cd -
/usr/bin/mv $filename/schedule.sh schedule.sh
/usr/bin/mv $filename/update.sh update.sh
cd $filepublic
echo $filepublic
~/opt/bin/git init
~/opt/bin/git remote rm origin
~/opt/bin/git remote add origin git://github.com/ryokurosu/public.git
~/opt/bin/git fetch origin
~/opt/bin/git reset --hard origin/master
/usr/bin/mv index.php.template index.php
/usr/bin/sed -i -e "s/\.\.\/vendor\/autoload.php/\.\.\/antena_$filepublic\/vendor\/autoload.php/g" ./index.php
/usr/bin/sed -i -e "s/\.\.\/bootstrap\/app.php/\.\.\/antena_$filepublic\/bootstrap\/app.php/g" ./index.php
cd -
done
