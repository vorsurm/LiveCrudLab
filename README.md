# Laravel CRUD Function

## Technologies and libraries

- Laravel 7+, PHP 7+, MySQL 5.7
- jQuery & JavaScript
- PgSQL for Heroku
- DataTable, Bootstrap 4, fontawsome

## How to run the System

### Run on the development environment

- Open terminal window with your dev area
- Then run this below commands

```sh
$ git clone https://github.com/vorsurm/LiveCrudLab.git

$ cd LiveCrudLab
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ config .env file, below description
$ php artisan migrate --seed
$ php artisan serve
$ It`s open a browser window with http://localhost:8000/login

```

### Configure environment variables

- Add the .env variable name of the following below information.

```

MySQL Config:
==============
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=LiveCrudLab_db
DB_USERNAME=username
DB_PASSWORD=password


```

- Browser opens up and runs with URL: `http://localhost:8000`
- configure your own style .

---

## Questions and Answers

### Coming soon... 

## References

- https://getbootstrap.com/docs/4.0/getting-started/introduction/
- https://fontawesome.com/v4.7.0/get-started/
- https://laravel.com/docs/7.x/readme
- https://datatables.net/manual/
