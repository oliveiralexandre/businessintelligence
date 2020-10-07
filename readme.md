# Laravel

Laravel 7.0

## Requirements

- Laravel 7.0
- PHP >= 7.2.5
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension


## Installation

```
git clone https://github.com/oliveiralexandre/businessintelligence.git
cd businessintelligence
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
```
php artisan db:seed --class=DummyDataSeeder
```


