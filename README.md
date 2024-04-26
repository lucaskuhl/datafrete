# Calculadora de Distância
> Cadastro de CEPs e Cálculo de distâncias

O seguinte projeto é um buscador de CEP que recebe dois CEPs e faz o cálculo da distância entre eles.

O projeto conta com o CRUD básico: criar, ler, atualizar e excluir. Recebendo um CEP de Origem e um CEP de Destino onde é feito o cálculo da distância entre eles. Usa como método de validação a API [CEP Aberto](https://cepaberto.com/) 

## Instalação

1. Clonar o projeto;
2. Após clonar o projeto instalar as dependências com o composer;
```
composer install
```
3. Iniciar o Phinx para rodar as migrations
```
vendor/bin/phinx init
```
4. Atualizar o arquivo phinx.php para utilizar o SQLite
```
'environments' => [
            'default_migration_table' => 'phinxlog',
            'default_environment' => 'development',
            'production' => [
                'adapter' => 'sqlite',
                'host' => 'localhost',
                'name' => 'datafrete',
                'mode' => 'rwc',
                'user' => 'root',
                'pass' => '',
                'port' => '3306',
                'charset' => 'utf8',
            ],
            'development' => [
                'adapter' => 'sqlite',
                'host' => 'localhost',
                'name' => 'datafrete',
                'mode' => 'rwc',
                'user' => 'root',
                'pass' => '',
                'port' => '3306',
                'charset' => 'utf8',
            ],
            'testing' => [
                'adapter' => 'sqlite',
                'host' => 'localhost',
                'name' => 'datafrete',
                'mode' => 'rwc',
                'user' => 'root',
                'pass' => '',
                'port' => '3306',
                'charset' => 'utf8',
            ]
        ],
        ...
```
5. Atualizar o arquivo app_local.php para usar o SQLite
   ```
   'Datasources' => [
        'default' => [
            'host' => 'localhost',
            'username' => 'datafrete',
            'password' => 'secret',
            'database' => 'datafrete', 
            'url' => env('DATABASE_URL', null),
        ],
       ...
   ```
6. Realizar as migrations
   ```
   vendor/bin/phinx migrate
   ```
7. Inicializar o servidor do cakephp e acessar em http://localhost:8080/cep-distancia
   ```
   bin/cake server -p 8080
   ```

## Requisitos

Para o projeto funcionar é preciso atender aos seguintes requisitos: 

1. PHP >= 8.1
2. Extensões ativas: mbstring, openssl, intl;
3. Composer instalado globalmente;

A key para a API de CEPs já se encontra no projeto, mas pode ser alterada em CepHandler.php
Para acessar a dashboard das APIs o login e senha estão dentro do seguinte arquivo: `info_keys.txt`


## Bibliotecas e Frameworks utilizados: 

1. [CakePHP](https://book.cakephp.org/5/en/index.html);
2. [Phinx](https://book.cakephp.org/phinx/0/en/intro.html);
3. [BootstrapUI](https://github.com/FriendsOfCake/bootstrap-ui);
