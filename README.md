# structure-laravel-api
Structure ready to develop APIs with Laravel

## Project initialization
- composer install
- Database configuration **.env**:
  ```PHP
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=laradock
    DB_USERNAME=root
    DB_PASSWORD=
  ```
- Create a schema in the **SGBD**, with the same name configured in **DB_DATABASE**;
- Generate JWT KEY: **php artisan jwt:secret**
- Upload the database for the first time: **php artisan migrate --seed**
- The next times you need to upload the database: **php artisan migrate**
- Run the project: **php artisan serve**

## Generating authentication for apis

- Access the url: **http://127.0.0.1:8000/api/register**
    - The HTTP verb in the __postman__ must be of the type **POST**
    - In form-data add the following fields:
        - name (put the username that is in the seed)
        - email (put the email that is in the seed)
        - password (put the password that is in the seed)
    - Click send (must return 200 the status)
- Then go to a URL: **http://127.0.0.1:8000/api/login**
    - The HTTP verb in the __postman__ must be of the type **POST**
    - In form-data add the following fields:
      - name (put the username that is in the seed)
      - email (put the email that is in the seed)
      - password (put the password that is in the seed)
    - Click send (must return 200 the status)
    - Copy the token that is generated and use it in apis that have authentication

## Writing data with the API

- Body to record a student:

    ```JSON
      {
        "nome": "Alex",
        "nascimento": "1993-03-29",
        "sala_id": 1,
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU3Njc2OTg5NiwiZXhwIjoxNTc2NzczNDk2LCJuYmYiOjE1NzY3Njk4OTYsImp0aSI6Ikg2T3RPTTZMZ0tmeDBtb1kiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.70nU6mMSCTnbSyvv18pnhObd3VzJNPuo-FsqfvK1XQ4"
      }
    ```

- HTTP GET verb to return all students:

  > http://127.0.0.1:8000/api/estudantes?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU3Njc2OTg5NiwiZXhwIjoxNTc2NzczNDk2LCJuYmYiOjE1NzY3Njk4OTYsImp0aSI6Ikg2T3RPTTZMZ0tmeDBtb1kiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.70nU6mMSCTnbSyvv18pnhObd3VzJNPuo-FsqfvK1XQ4

## Basic day-to-day commands

- Create a model and a migration: **php artisan make:model Estudante -m**
- Create a Controller: **php artisan make:controller EstudanteController --api**
- Command to create request validations: **php artisan make:request EstudanteRequest**
- Command to create resources __(transformation layer)__: **php artisan make:resource Estudante**
- Command to create resource collections: **php artisan make:resource Estudantes --collection**

## Swagger

- Documentation: https://swagger.io/
- Package used in the project: https://github.com/DarkaOnLine/L5-Swagger
- In the **.Env** file, add the parameter somewhere: **SWAGGER_VERSION=2.0**
- To generate the documentation, enter the command: **php artisan l5-swagger:generate**
- To access Student API documentation as a test: **localhost:8000/api/documentation

## Documents

- CORS use and installation: https://github.com/barryvdh/laravel-cors
- Reference tutorial on authentication configuration for apis: https://tutsforweb.com/restful-api-in-laravel-56-using-jwt-authentication/

## Some possible actions

- Generate the key application: **php artisan key:generate**
- Update autoload (usually when creating new classes): **composer dump-autoload**
- To check Laravel Errors it is necessary to comment on the Handle class the following excerpt:
    ```PHP
    if( $request->is('api/*') )
    {
        return $this->getJsonException( $request, $exception );
    }
    ```

## Configuration to run the docker

- In the **/docker** directory, open the **ENV** file and change the **PROJECT_PATH** parameter to your project path
- Read more README inside the docker folder
- In configuration yet...
