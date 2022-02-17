# CRUD

**Simple CRUD based on Laravel and Vue**

## Запуск приложения
Для запуска требуется:
1. Установленный Docker;   

2. В файле C:\Windows\System32\drivers\etc\hosts необходимо добавить строку:
```
127.0.0.1 crud.local
```

3. В корневой директории проекта запустить в консоли команду:
```
./up.sh
```

# Результат
> Автоматически Docker поднимет все необходимые контейнеры и приложение будет доступно по адресу **http://crud.local**

> PhpMyAdmin для работы с БД будет доступен по адресу: **http://crud.local:8080/**

> Для входа в контейнер с проектом используйте команду в консоли **./workspace.sh** 

> Для удаления контейнеров используйте команду в консоли **./down.sh**

***
Если при первом запуске будет ошибка "Class "Redis" not found", это означает, что требуется установить Redis:
* ./workspace.sh
* apt-get update && apt-get install php-redis
*** 

# Используемые технологии
* **Docker** (https://www.docker.com/products/docker-desktop)
* **Laravel** (https://laravel.com/)
* **Vue** (https://vuejs.org/)