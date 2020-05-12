#### Env file

- Create an env file and add the following parameters:
```PHP
PROJECT_PATH=/d/Users/projetos/structure-laravel-api
MYSQL_ROOT_PASSWORD=secret
MYSQL_PASSWORD=secret
MYSQL_DATABASE=laradock
MYSQL_USER=root
```

> Based on the above parameters you must configure the path for the project and the bank connection

#### start container
- type it: **docker-compose up -d**

#### Stop container
- type it: **docker-compose down**
