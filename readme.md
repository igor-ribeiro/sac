# Sistema de Chamados

## Instalação

```
composer install
bower install
```
Renomear o arquivo ```.env.example``` para ```.env``` e colocar os dados de acesso ao Banco de Dados
```
php artisan key:generate
php artisan migrate --seed
```
