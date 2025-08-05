markdown
# Игровая витрина на Yii2 и React
## 📦 Состав проекта
- **Backend**: Yii2 REST API (PHP 7.4+)
- **Frontend**: React + TypeScript
- **База данных**: MySQL

## 🚀 Быстрый старт

### Backend
```bash
cd backend
composer install
# Настройте БД в config/db.php
php yii migrate/up
php -S localhost:8080 -t web
Frontend
bash
cd frontend
npm install
npm start
Доступ к API
Логин: admin

Пароль: password

Пример запроса:

bash
curl -H "Authorization: Basic YWRtaW46cGFzc3dvcmQ=" http://localhost:8080/games
Ключевые особенности
Каталог игр с сортировкой по рейтингу

Детальные страницы игр

Адаптивный дизайн (mobile-first)

Basic Auth для всех запросов

Структура API
Endpoint	Метод	Описание
/games	GET	Список всех игр
/game/{slug}	GET	Детали конкретной игры
Технологии
Backend: Yii2, MySQL

Frontend: React, TypeScript, Webpack

Авторизация: HTTP Basic Auth