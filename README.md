## Установка
Для работы вам понадобится Docker
* Перейти в папку приложения
* Запустить Docker Compose: `docker-compose up --build -d`
* Войти в контейнер бекенда: `docker exec -ti major_backend_1 /bin/bash`
* Перейти: `cd /var/www/html`
* Измененить права доступа к файлам и директориям: `chmod -R 777 bootstrap/cache storage`
* Выйти из контейнера бекенда: `exit`
* **PROFIT**
