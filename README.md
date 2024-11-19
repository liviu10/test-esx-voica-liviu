<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 1. Instalare Laravel
composer create-project --prefer-dist laravel/laravel nume_proiect

# 2. Navigare în directorul proiectului
cd nume_proiect

# 3. Instalare Laravel Breeze
composer require laravel/breeze --dev

# 4. Instalare Breeze cu React
php artisan breeze:install react

# 5. Instalare dependențe NPM
npm install

# 6. Construirea resurselor pentru dezvoltare
npm run dev

# 7. Migrarea bazei de date
php artisan migrate

# 8. Pornirea serverului de dezvoltare
php artisan serve

# 9. Construirea resurselor pentru producție
npm run build

# 10. Instalare dependențe pentru producție (pe serverul de producție)
composer install --optimize-autoloader --no-dev

# 11. Deploy pe serverul de producție
    Setează variabilele de mediu în fișierul .env (ex: APP_ENV=production).
    Generează cheia aplicației cu php artisan key:generate.
    Rulează migrațiile cu php artisan migrate --force.
    Instalează dependențele Composer pentru producție cu composer install --optimize-autoloader --no-dev.
    Instalează dependențele NPM cu npm install --production.
    Construiește resursele pentru producție cu npm run build.
    Setează permisiunile corecte pentru directoarele storage și bootstrap/cache.
    Verifică configurarea serverului web (Apache/Nginx) pentru a îndrepta către public/.
    Rulează serverul de producție (ex: php-fpm pentru Nginx sau apache2 pentru Apache).
    (Opțional) Activează caching-ul de rute și config cu:
        php artisan config:cache
        php artisan route:cache
        php artisan view:cache
    (Opțional) Activează optimizarea aplicației cu:
        php artisan optimize