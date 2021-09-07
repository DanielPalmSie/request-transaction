Чтобы запустить проект выполниите команду docker-compose up (при этом убедитесь что у вас установлен докер)
Потом выполните команду docker-compose exec php composer-update
Потом накатите миграции выполнив команду docker-compose exec php php /var/www/html/artisan migrate
Главная страница после запуска будет доступна на http://localhost:8088/
