# skeleton-laravel-api
Esqueleto com uma estrutura pronta para desenvolver API´s com Laravel

## Configuração para rodar o docker
- No diretório **/docker**, abra o arquivo **ENV** e altere o parametro **PROJECT_PATH** para o caminho do seu projeto
- Mais informações leia no README que tá dentro da pasta docker.

## Inicialização do projeto
- composer install
- Configure a conexão do banco no **.env** (Exemplo abaixo):
```PHP
  DB_CONNECTION=mysql
  DB_HOST=mysql
  DB_PORT=3306
  DB_DATABASE=laradock
  DB_USERNAME=root
  DB_PASSWORD=secret
```
- php artisan migrate
- php artisan serve

## Gravando dados com a API

- Para gravar estudantes é necessário ter pelo menos uma sala, pode adicionar direto na tabela para testes.
- Corpo para gravar um estudante:

```JSON
  {
    "nome": "Alex",
    "nascimento": "1993-03-29",
    "sala_id": 1
  }
```

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

## Algumas possíveis ações

- Gerar o key application: **php artisan key:generate**
- Para verificar Erros do Laravel é necessário comentar na classe Handle o seguinte trecho:
    ```PHP
    if( $request->is('api/*') )
    {
        return $this->getJsonException( $request, $exception );
    }
    ```