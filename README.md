## Comenzando 🚀


#2 _generar un .env_

```zsh
cp .env.example .env
```
#3 _instalar dependencias_
````bash
$ composer install
````
#4 crear una base de datos y registrar en el .env

#5 ejecutar las migraciones & Seeders
```python
php artisan migrate:refresh --seed
```

#5 generar llaves
```
php artisan key:generate
```