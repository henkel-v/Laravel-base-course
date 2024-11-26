Установка и настройка локального окружения для разработки

Шаги по развертыванию проекта для локальной разработки (MacOS/Windows)
1. Клонировать проект из внешнего репозитория `git clone`
2. В папке проекта `сp .env.example .env`
3. В `.env` добавить доступы для подключения к бд
``` 
DB_CONNECTION=pgsql
DB_HOST=postgresql
DB_PORT=5432
DB_DATABASE=laravel_db
DB_USERNAME=laravel
DB_PASSWORD=password    
```
4. Запустить контейнеры для сборки `docker compose up nginx -d`
5. Установить зависимости командой `docker compose run --rm composer install`, `--rm` нужен для избежание накопления временных контейнеров (Также можно использовать `docker compose run --rm artisan vendor:publish --tag=laravel-assets --ansi --force`, команда публикует веб-ассеты (CSS, JS, изображения) из подключённых пакетов в директорию public, что необходимо для первоначальной настройки проекта или после обновления пакетов.)
6. Сгенерировать `APP_KEY` `docker compose run --rm artisan key:generate`
6. Сделать миграции `docker compose run --rm artisan migrate`
7. Добавить юзера для админки `docker compose run --rm artisan moonshine:user`
