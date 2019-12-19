# skeleton-laravel-api
Esqueleto com uma estrutura pronta para desenvolver API´s com Laravel

## Inicialização do projeto
- composer install
- Configure a conexão do banco no **.env** (Exemplo abaixo):
  ```PHP
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=laradock
    DB_USERNAME=root
    DB_PASSWORD=
  ```
- Criar o Schema no **SGBD** com o mesmo nome do **DB_DATABASE** configurado no **.env**
- Subir as migrations pela primeira vez é necessário passar o parametro seed: **php artisan migrate:refresh --seed**
- Subir as atualizações das migrations normalmente: **php artisan migrate**
- Rodar o projeto: **php artisan serve**

## Gerando tokens para autenticação nas API's

- Acesse a url: **http://127.0.0.1:8000/api/register**
    - O verbo HTTP no postman deve ser do tipo **POST**
    - Em form-data adicione os seguintes campos:
        - name (coloque o nome de usuário que tá no seed)
        - email (coloque o email que tá no seed)
        - password (coloque o password que tá no seed)
    - Clique em enviar (deve retornar 200 o status)
- Em seguida acesse a url: **http://127.0.0.1:8000/api/login**
    - O verbo HTTP no postman deve ser do tipo **POST**
    - Em form-data adicione os seguintes campos:
        - name (coloque o nome de usuário que tá no seed)
        - email (coloque o email que tá no seed)
        - password (coloque o password que tá no seed)
    - Clique em enviar
    - Copie o token que é gerado e use nas apis que estiverem com autenticação

## Gravando dados com a API

- Para gravar estudantes é necessário ter pelo menos uma sala, **pode adicionar direto na tabela para testes**.
- Corpo para gravar um estudante:

    ```JSON
      {
        "nome": "Alex",
        "nascimento": "1993-03-29",
        "sala_id": 1,
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU3Njc2OTg5NiwiZXhwIjoxNTc2NzczNDk2LCJuYmYiOjE1NzY3Njk4OTYsImp0aSI6Ikg2T3RPTTZMZ0tmeDBtb1kiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.70nU6mMSCTnbSyvv18pnhObd3VzJNPuo-FsqfvK1XQ4"
      }
    ```

- Verbo HTTP GET para retornar todos os estudantes:

  > http://127.0.0.1:8000/api/estudantes?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU3Njc2OTg5NiwiZXhwIjoxNTc2NzczNDk2LCJuYmYiOjE1NzY3Njk4OTYsImp0aSI6Ikg2T3RPTTZMZ0tmeDBtb1kiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.70nU6mMSCTnbSyvv18pnhObd3VzJNPuo-FsqfvK1XQ4

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
- Tutorial de referência da configuração de autenticação para as apis: https://tutsforweb.com/restful-api-in-laravel-56-using-jwt-authentication/

## Algumas possíveis ações

- Gerar o key application: **php artisan key:generate**
- Para verificar Erros do Laravel é necessário comentar na classe Handle o seguinte trecho:
    ```PHP
    if( $request->is('api/*') )
    {
        return $this->getJsonException( $request, $exception );
    }
    ```

## Configuração para rodar o docker
- No diretório **/docker**, abra o arquivo **ENV** e altere o parametro **PROJECT_PATH** para o caminho do seu projeto
- Mais informações leia no README que tá dentro da pasta docker.
- Em configuração ainda...