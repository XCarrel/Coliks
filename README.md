# Coliks

An application for managing winter sports equipment rentals

### Prerequisites

-   PHP >= 7.1.3 (`php -v` to check your version)
    
-   OpenSSL PHP Extension
    
-   PDO PHP Extension
    
-   Mbstring PHP Extension
    
-   Tokenizer PHP Extension
    
-   XML PHP Extension
    
-   Ctype PHP Extension
    
-   JSON PHP Extension
    
-   BCMath PHP Extension
    

### Installation

-   ``git clone <repository>``
    
-   run `composer install`
    
-   rename .env.example into .env (if necessary)
    
-   run `php artisan key:generate`
    

### .env specifications

```
DB_CONNECTION=mysql

DB_HOST=localhost

DB_PORT=3306

DB_DATABASE=Coliks

DB_USERNAME=<your database username>

DB_PASSWORD=<your database password>
```

### Database specifications

Import the file  [ColiksSeeder.sql](https://github.com/XCarrel/Coliks/blob/master/database/mysql/ColiksSeeder.sql) in your database

### Contributors

Anel Muminovic - Sacha Grenier - Xavier Schwab
