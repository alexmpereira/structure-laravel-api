# skeleton-laravel-api
Esqueleto com uma estrutura pronta para desenvolver API´s com Laravel

## Inicialização do projeto
- composer install
- Configure a conexão do banco no **.env**
- php artisan migrate
- php artisan serve

## Comandos básicos do dia a dia
- Criar um model e uma migration: **php artisan make:model Estudante -m**
- Criar um Controller: **php artisan make:controller EstudanteController --api**
- Comando para criar as validações de requests: **php artisan make:request EstudanteRequest**