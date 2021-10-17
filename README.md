## Salla Start Kit

## Requirements

* Be Salla Partner on [Salla Partner Portal](https://salla.partners)
* Create your app on [Salla Partner Portal](https://salla.dev/blog/create-your-first-app-on-salla-developer-portal/)
* PHP >= 7.2
* Mysql

## Installation

1. Run the composer install

```bash  
$ composer install
```

2. Create a database with any name for example `laravel`

3. Fill the database connection details on the `.env` file

```dotenv  
DB_HOST=127.0.0.1  
DB_DATABASE=laravel  
DB_USERNAME=root  
DB_PASSWORD=root  
```  

4. Setup the callback url on [Salla Partner Portal](https://salla.partner) to `http://127.0.0.1:8000/oauth/callback`

5. Run setup command

```bash  
php artisan setup 
```

5. Run Serve command and go to http://127.0.0.1:8000  🎉

```bash  
php artisan serve  
```  

## Usage

- After visit http://127.0.0.1:8000 click on `Auth` from the Home
- Login in `Laravel App` with the demo account
    - Email: `awesome@salla.dev`
    - Password: `in ksa`
- The `Laravel App` will redirect you to `Merchent Auth Page`.
- Login using a `Merchent Account`.
- Give the access to your `Demo App`
- The browser will redirect your again to `Laravel App`

- npm install && npm run dev

