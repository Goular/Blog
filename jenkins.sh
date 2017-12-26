# 2017-12-26 17:18
# 用于jenkin项目中，构建配置时"构建"环节的Execute shell,添加下面内容，$WORKSPACE为jenkins自带的环境变量
# cp /drnmp/www 需要chmod -R 777 www

cd $WORKSPACE
docker run -v $PWD:/app drnmp_composer
docker run -v $PWD:/app drnmp_composer php artisan storage:link
tar -zcvf blog.tar.gz *
chmod +777 blog.tar.gz
mv blog.tar.gz /drnmp/www/
cd /drnmp/www/
rm -rf ./blog
mkdir blog
chmod +777 blog
tar -zxvf blog.tar.gz -C ./blog
rm -rf blog.tar.gz
cd blog
chmod -R 777 ./public
chmod -R 777 ./storage
