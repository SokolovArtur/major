## Установка
Для работы вам понадобится Docker
* Перейти в папку приложения
* Запустить Docker Compose: `docker-compose up --build -d`

Опционально:
* Войти в контейнер бекенда: `docker exec -ti major_backend_1 /bin/bash`
* Перейти: `cd /var/www/html`
* Измененить права доступа к файлам и директориям: `chmod -R 777 bootstrap/cache storage`
* Выйти из контейнера бекенда: `exit`

## Технические требования
Архитектура разделена на две сущности - backend и frontend. Бэк (вся бизнес-логика) написан на PHP + Laravel 5.8. Пользовательский интерфейс использует JavaScript-фреймворк Vue.Js.

## API
Клиент послает валидный JsonRpc2.0-запрос:
```
// /api/v1/jsonrpc

{
  "jsonrpc": "2.0", 
  "method": "palindrome_getAllPalindromes",
  "params": {
    "value": string
  },
  "id": 1
}
```

## На что посмотреть еще

* /frontend/src/views/Home.vue
* /backend/app/Http/Controllers/PalindromeController.php
* /backend/app/Palindrome.php
