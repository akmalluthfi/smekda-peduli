# About Project

Smekda peduli adalah sebuah sistem donasi berupa website untuk melakukan donasi secara online, website ini dibuat untuk memudahkan donatur dalam melakukan donasi

# Tech Stack

-   [![Laravel][laravel.com]][laravel-url]

# Installation

Clone the project

```bash
  git clone https://github.com/akmalluthfi/smekda-peduli.git
```

Navigate to the application directory

```bash
    cd smekda-peduli
```

Install composer dependencies

```bash
  composer Install
```

Copy env.example

> Setting your database and email configuration

```bash
  cp .env-example .env
```

Generate application key

```bash
  php artisan key:generate
```

Migrate and seed the database

```bash
  php artisan migrate --seed
```

Run the project

```bash
  php artisan serve
```

[laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[laravel-url]: https://laravel.com
