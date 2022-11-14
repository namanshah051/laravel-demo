# laravel8-project-setup
jkg

https://www.getpostman.com/collections/7f9511123fb385cabd02


go to 45 server:
/etc/httpd/conf.d/welcome.conf

add allias: 	```Alias /PROJECT-NAME /var/www/html/PROJECT-NAME/public```

then: ```sudo service httpd restart```

==================================

follow below for style your admin panel:

https://adminlte.io/docs/3.0/
===================================


composer install && php artisan key:generate && php artisan jwt:secret && php artisan config:cache && php artisan cache:clear && php artisan route:clear && php artisan view:clear && composer clear-cache && composer dump-autoload && php artisan migrate && php artisan db:seed && php artisan serve



php artisan storage:link 
