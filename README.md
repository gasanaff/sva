## Требования
- make
- docker (docker-compose)

## Запуск
- `make build` - первичная сборка и запуск приложения
- `make up` - запуск приложения
- `make down` - остановка приложения

## Использование
- открыть в браузере http://localhost

## Описание
- Для упращения тестирования реализовал функцию m_pquery (в моей реализации возвращает массив) и добавил тестовые данные в БД (файл `docker/db/sql/start.sql`)
- Так как в ТЗ в описании таблиц не было указано поле servers.description, я не добавил в таблицу на фронте 