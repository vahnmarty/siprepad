<h1 align="center">
    <a href="https://toxsl.com" title="toxsl" target="_blank">
        <img width = "20%" height = "20%" src="https://toxsl.com/themes/base/images/web_logo.png" alt="toxsl Logo"/>
    </a>
    <br>
    <hr>
</h1>

This is the base project of laravel




##Installation

To install script module

```
git clone http://192.168.10.23/web/admission-portal-web-1854
```

Storage folder must have 
```
app, framework, logs
```
Rename .env.example file to .env and change db credentials 
```
databse credentials
```
To install specific Seed run this command

```
php artisan db:seed --class=AdminSeeder

```
To install Migration with Seed run this command

```
php artisan migrate:fresh --seed
```
To generate a key (No need if setup.sh command run)

```
php artisan key:generate 
``` 
If you have composer.json

```
composer install --prefer-dist 
```
Keep .env file 
```
Copy .env.example to .env (and change database name)
```
composer update --prefer-dist --prefer-stable
```

## Usage
Once setup is done you need to follow the final setup with the installer .

make sure you give READ/WRITE permission to your folder.
```

Then run following command

```
1) composer install
2) php artisan key:generate 
3) php artisan migrate
4) php artisan db:seed
```
```
composer dumpautoload
```

## License

**www.toxsl.com** 

