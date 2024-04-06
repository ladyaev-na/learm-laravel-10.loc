## Учебный проект
Для запуска проекта выполните следущие команды:
```sh
  git clone https://github.com/ladyaev-na/learm-laravel-10.loc
```

```sh
  cd learm-laravel-10.loc
```

```sh
  composer install
```

```sh
  php artisan key:generate
```

Переименуйте файл .env.example в .env и пропишите настройки подключения к БД

```sh
  php artisan migrate --seed
```
