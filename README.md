# Visitor Panel

Vue 2.6 + Laravel 8 + Axios CRUD example app


<img src="demo.gif" width="416">

### Installation

1. Clone repo

2. Change to directory

````
cd visitor-panel
````   

3. Install dependencies

````
composer install
````

4. Copy .env file

```
cp .env.example .env
```

5. Modify `DB_*` value in `.env` with your database config.

6. Generate application key:

````
php artisan key:generate
````

7. Migrate
````
php artisan migrate
````

8. Install Node modules
````
npm install
````

9. Build

````
npm run dev
````

### Dummy Data

1. Run seeder

````
php artisan db:seed
````
