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
- Comando para criar resources (camada de transformação): **php artisan make:resource Estudante**
- Comando para criar coleções de resources: **php artisan make:resource Estudantes --collection**

## Swagger

- Documentação: https://swagger.io/
- Package usado no projeto: https://github.com/DarkaOnLine/L5-Swagger
- No arquivo **.env** adicionar em algum lugar o parametro: **SWAGGER_VERSION=2.0**
- Para gerar a documentação, digite o comando: **php artisan l5-swagger:generate**
- Para acessar a documentação da API de estudante como teste: **localhost:8000/api/documentation

## Documentos

- Uso e instalação do CORS: https://github.com/barryvdh/laravel-cors