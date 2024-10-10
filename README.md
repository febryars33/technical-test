# Backend Engineer Technical Tests

## Description

Design and implement a simple RESTful API for a library management system. The API should handle books and authors.

#### - Repository Pattern

##### Definisi

Pattern ini adalah sebuah pola design yang memisahkan antara logika bisnis dan query logic (CRUD).

##### Alasan

Repository Pattern menawarkan cara yang terstruktur dan terorganisir untuk mengelola akses data, meningkatkan keterbacaan, fleksibilitas, dan pemeliharaan kode. Dengan memisahkan logika akses data dari logika bisnis, pola ini membantu pengembang menciptakan aplikasi yang lebih baik dan lebih mudah untuk diuji.

#### - DTO Pattern

##### Definisi

DTO adalah objek yang hanya berisi data dan tidak memiliki logika bisnis.

##### Alasan

DTO pattern menawarkan cara yang efisien dan terstruktur untuk mengelola transfer data dalam aplikasi, meningkatkan kinerja, keterbacaan, dan pemeliharaan kode. Dengan memisahkan data dari logika, DTO membantu pengembang membuat aplikasi yang lebih baik dan lebih mudah untuk diatur.

## Prerequisites

-   PHP >= 8.2
-   Composer
-   Laravel >= 11.x
-   Database (MySQL, PostgreSQL, etc.)

## Getting Started

Follow these steps to set up and run the application locally.

### 1. Clone the Repository

Clone the repository to your local machine using Git:

```bash
git clone https://github.com/febryars33/technical-test.git
cd technical-test
```

### 2. Install Dependencies

Use Composer to install the required dependencies:

```bash
composer install
```

### 3. Rename .env.example

Copy the .env.example file to .env:

```bash
cp .env.example .env
```

### 4. Generate Application Key

Generate the application key:

```bash
php artisan key:generate
```

### 5. Run Migrations

Run the migrations to set up the database:

```bash
php artisan migrate
```

### 6. Seed the Database

(Optional) Seed the database with initial data:

```bash
php artisan db:seed
```

### 7. Serve the Application

Serve the application locally:

```bash
php artisan serve
```

Open your browser and navigate to http://localhost:8000.

### 8. Run Tests

Run the tests to ensure everything is working correctly:

```bash
php artisan test
```

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
