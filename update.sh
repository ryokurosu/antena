
cd `dirname $0`
for filename in `find antena_* -maxdepth 0 -type d`

do
cd $filename
echo $filename
if [ $(LANG=C date '+%a%H') == "Sat23" ]; then
echo public/images/* | xargs rm
echo public/thumbnail/* | xargs rm
fi
cd public
~/opt/bin/git fetch origin
~/opt/bin/git reset --hard origin/master
cd ..
~/opt/bin/git init
~/opt/bin/git remote rm origin
~/opt/bin/git remote add origin git://github.com/ryokurosu/antena.git
~/opt/bin/git fetch origin
~/opt/bin/git reset --hard origin/master
~/opt/bin/git submodule foreach git pull origin master
~/opt/bin/git submodule update
/usr/bin/php7.1 artisan cache:clear
/usr/bin/php7.1 artisan config:clear
/usr/bin/php7.1 artisan route:clear
/usr/bin/php7.1 artisan view:clear
filepublic=${filename:7}
cd -
mv $filename/schedule.sh schedule.sh
cd $filepublic
echo $filepublic
~/opt/bin/git init
~/opt/bin/git remote rm origin
~/opt/bin/git remote add origin git://github.com/ryokurosu/public.git
~/opt/bin/git fetch origin
~/opt/bin/git reset --hard origin/master
mv index.php.template index.php
sed -i -e "s/\.\.\/vendor\/autoload.php/\.\.\/antena_$filepublic\/vendor\/autoload.php/g" ./index.php
sed -i -e "s/\.\.\/bootstrap\/app.php/\.\.\/antena_$filepublic\/bootstrap\/app.php/g" ./index.php
cd -
done
