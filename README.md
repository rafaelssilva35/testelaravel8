# Teste laravel 8

##### Clone do repositório

-   git clone https://github.com/rafaelssilva35/testelaravel8.git

##### Configurações iniciais Laravel

-   criando arquivo .env
    -   comando: cp .env.example .env

#### docker

-   levantar containers
    -   comando: docker-compose up -d

#### composer

-   Para rodar o composer precisamos entrar no container segue os comandos
    -   docker exec docker-laravel8-teste composer install

#### Banco

-   Foi utilizado um banco simples SQLITE segue a baixo o comando para criar os arquivos na pasta correta
    -   comando: touch database/database.sqlite

#### Permissões de arquivo

-   temos que dar permissões em alguns arquivos
    -   sudo chmod 777 -R bootstrap/cache/
    -   sudo chmod 777 -R storage/
    -   sudo chmod 777 -R database/

#### Migrations

-   docker exec docker-laravel8-teste php artisan migrate
